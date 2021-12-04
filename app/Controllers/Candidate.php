<?php

namespace App\Controllers;

use \App\Models\CandidateModel;
use \App\Models\PositionModel;
use \App\Models\VotingSessionModel;

class Candidate extends BaseController {
  public function index() {
    helper('form');
    $c_model = new CandidateModel();
    echo view('admin/templates/header');
    echo view('admin/templates/sidebar');
    echo view('admin/candidate', [
      'candidates' => $c_model->join('positions', 'positions.position_id = candidates.position_id')
                              ->join('voting_session', 'voting_session.voting_session_id = candidates.voting_session_id')
                              ->orderBy('voting_session.voting_session_id', 'DESC')
                              ->paginate(15),
      'pager'      => $c_model->pager
    ]);
    echo view('admin/templates/footer');
  }

  public function displayAddCandidate() {
    helper('form');
    $c_model = new CandidateModel();
    $p_model = new PositionModel();
    $v_model = new VotingSessionModel();

    echo view('admin/templates/header');
    echo view('admin/templates/sidebar');
    echo view('admin/candidate', [
      'candidates' => $c_model->join('positions', 'positions.position_id = candidates.position_id')
                              ->join('voting_session', 'voting_session.voting_session_id = candidates.voting_session_id')
                              ->orderBy('voting_session.voting_session_id', 'DESC')
                              ->paginate(15),
      'pager'      => $c_model->pager,
      'positions'  => $p_model->findAll(),
      'v_sesh'     => $v_model->findAll()
    ]);
    echo view('admin/candidate_mgt/create');
    echo view('admin/templates/footer');
  }

  public function displayEditCandidate() {
    helper('form');
    helper('form');
    $c_model = new CandidateModel();
    $p_model = new PositionModel();
    $v_model = new VotingSessionModel();

    echo view('admin/templates/header');
    echo view('admin/templates/sidebar');
    echo view('admin/candidate', [
      'candidates' => $c_model->join('positions', 'positions.position_id = candidates.position_id')
                              ->join('voting_session', 'voting_session.voting_session_id = candidates.voting_session_id')
                              ->orderBy('voting_session.voting_session_id', 'DESC')
                              ->paginate(15),
      'pager'      => $c_model->pager,
      'positions'  => $p_model->findAll(),
      'candidate'  => $c_model->find(esc($this->request->getPost('c'))),
      'v_sesh'     => $v_model->findAll()
    ]);
    echo view('admin/candidate_mgt/edit');
    echo view('admin/templates/footer');
  }

  public function displayDeleteCandidate() {
    helper('form');
    helper('form');
    $c_model = new CandidateModel();
    $p_model = new PositionModel();
    $v_model = new VotingSessionModel();
    echo view('admin/templates/header');
    echo view('admin/templates/sidebar');
    echo view('admin/candidate', [
      'candidates' => $c_model->join('positions', 'positions.position_id = candidates.position_id')
                              ->join('voting_session', 'voting_session.voting_session_id = candidates.voting_session_id')
                              ->orderBy('voting_session.voting_session_id', 'DESC')
                              ->paginate(15),
      'pager'      => $c_model->pager,
      'candidate'  => $c_model->find(esc($this->request->getPost('c'))),
      'v_sesh'     => $v_model->findAll()
    ]);
    echo view('admin/candidate_mgt/confirm_delete');
    echo view('admin/templates/footer');
  }

  public function update() {
    if($this->validate([
      'fname' => 'required',
      'lname' => 'required',
      'post'  => 'required',
    ])){
      helper('form');
      $c_model = new CandidateModel();
      $p_model = new PositionModel();
      // count registered candidates in a position
      $registered_c = $c_model->selectCount('candidate_id', 'registered')
                              ->getWhere([
                                'position_id' => esc($this->request->getPost('post')),
                              ])
                              ->getRowArray();
      // get allowed candidates
      $allowed_num = $p_model->select('allowed_candidate')->find(esc($this->request->getPost('post')));

      if($registered_c['registered'] < $allowed_num['allowed_candidate']){
        $c_model->save([
          'candidate_id' => esc($this->request->getPost('c')),
          'fname'        => esc($this->request->getPost('fname')),
          'mname'        => esc($this->request->getPost('mname')),
          'lname'        => esc($this->request->getPost('lname')),
          'suffix'       => esc($this->request->getPost('suffix')),
          'position_id'  => esc($this->request->getPost('post')),
          'voting_session_id' => esc($this->request->getPost('sesh')),
        ]);

        session()->setTempData('success', 'The Candidate was successfully Updated!', 2);
        return redirect()->to('admin/candidate');
      } else {
        session()->setTempData('error', 'The Slot for the Position is fully occupied!', 2);
        return redirect()->to('admin/candidate');
      }
    } else {
      session()->setTempData('error', 'Please don\'t leave any fields with red asterisk(*) unanswered.', 2);
      return redirect()->to('admin/candidate');
    }
  }

  public function delete() {
    helper('form');
    $c_model = new CandidateModel();
    
    $c_model->delete([
      'candidate_id' => esc($this->request->getPost('c')),
    ]);

    session()->setTempData('success', 'The Candidate was successfully deleted!', 2);
    return redirect()->to('admin/candidate');
  }

  public function create() {
    if($this->validate([
      'fname' => 'required',
      'lname' => 'required',
      'post'  => 'required',
    ])){
      helper('form');
      $c_model = new CandidateModel();
      $p_model = new PositionModel();
      // count registered candidates in a position
      $registered_c = $c_model->selectCount('candidate_id', 'registered')
                              ->getWhere([
                                'position_id' => esc($this->request->getPost('post')),
                              ])
                              ->getRowArray();
      // get allowed candidates
      $allowed_num = $p_model->select('allowed_candidate')->find(esc($this->request->getPost('post')));

      if($registered_c['registered'] < $allowed_num['allowed_candidate']){
        $c_model->save([
          'fname'       => esc($this->request->getPost('fname')),
          'mname'       => esc($this->request->getPost('mname')),
          'lname'       => esc($this->request->getPost('lname')),
          'suffix'      => esc($this->request->getPost('suffix')),
          'position_id' => esc($this->request->getPost('post')),
          'voting_session_id' => esc($this->request->getPost('sesh')),
        ]);

        session()->setTempData('success', 'The Candidate was successfully addedd!', 2);
        return redirect()->to('admin/candidate');
      } else {
        session()->setTempData('error', 'The Slot for the Position is fully occupied!', 2);
        return redirect()->to('admin/candidate');
      }
    } else {
      session()->setTempData('error', 'Please don\'t leave any fields with red asterisk(*) unanswered.', 2);
      return redirect()->to('admin/candidate');
    }
  }
}