<?php

namespace App\Controllers;

use \App\Models\VotingSessionModel;
use \App\Models\CandidateModel;
use \App\Models\PositionModel;

class VotingSession extends BaseController {
  public function index() {
    helper('form');
    $c_model = new CandidateModel();
    $p_model = new PositionModel();
    echo view('admin/templates/header');
    echo view('admin/templates/sidebar');
    echo view('admin/candidate', [
      'candidates' => $c_model->join('positions', 'positions.position_id = candidates.position_id')
                              ->join('voting_session', 'voting_session.voting_session_id = candidates.voting_session_id')
                              ->orderBy('voting_session.voting_session_id', 'DESC')
                              ->paginate(15),
      'pager'      => $c_model->pager,
      'positions'  => $p_model->findAll()
    ]);
    echo view('admin/candidate_mgt/create_session');
    echo view('admin/templates/footer');
  }

  public function create() {
    helper('form');
    if($this->validate([
      'scope' => 'required',
      'start_date' => 'required',
      'end_date'  => 'required',
    ])){
      $v_model = new VotingSessionModel();
      
      $v_model->save([
        'scope'         => esc($this->request->getPost('scope')),
        'session_start' => esc($this->request->getPost('start_date')),
        'session_end'   => esc($this->request->getPost('end_date'))
      ]);

      session()->setTempData('success', 'The Session was successfully addedd!', 2);
      return redirect()->to('admin/candidate');
    } else {
      $c_model = new CandidateModel();
      echo view('admin/templates/header');
      echo view('admin/templates/sidebar');
      echo view('admin/candidate', [
        'candidates'  => $c_model->join('positions', 'positions.position_id = candidates.position_id')
                                ->paginate(15),
        'pager'       => $c_model->pager,
        'validation' => $this->validator
      ]);
      echo view('admin/candidate_mgt/create_session');
      echo view('admin/templates/footer');
    }
  }
}