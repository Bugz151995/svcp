<?php

namespace App\Controllers;

use \App\Models\AccountModel;
use \App\Models\VoteModel;
use \App\Models\VoterModel;
use \App\Models\CandidateModel;
use \App\Models\PositionModel;
use \App\Models\VotingSessionModel;

class Vote extends BaseController
{
  public function index()
  {
    $a_model = new AccountModel();
    helper('form');
    session();

    echo view('templates/header');
    echo view('templates/topnavbar', [
      'student' => $a_model->select('fname, mname, lname, suffix, gender, email, image, uname, grade, section')
        ->join('students', 'students.student_id = accounts.student_id')
        ->join('class', 'class.class_id = students.class_id')
        ->join('voters', 'students.student_id = voters.student_id')
        ->find(session()->get('student_id'))
    ]);
    echo view('voter/vote');
    echo view('templates/footer');
  }

  public function voteSummary()
  {
    $a_model = new AccountModel();
    $c_model = new CandidateModel();
    $p_model = new PositionModel();
    $v_model = new VoteModel();
    $vs_model = new VoterModel();

    helper('form');
    session();

    $res = $vs_model->select('voter_id')->getWhere(['student_id' => session()->get('student_id')])->getRowArray();

    $data = [
      'voter_id' => $res['voter_id']
    ];

    echo view('templates/header');
    echo view('templates/topnavbar', [
      'student'    => $a_model->select('fname, mname, lname, suffix, gender, email, image, uname, grade, section, voters.voter_id')
        ->join('students', 'students.student_id = accounts.student_id')
        ->join('class', 'class.class_id = students.class_id')
        ->join('voters', 'students.student_id = voters.student_id')
        ->find(session()->get('student_id')),
      'candidates' => $v_model->where($data)
        ->join('candidates', 'candidates.candidate_id = votes.candidate_id')
        ->findAll(),
      'positions'  => $p_model->findAll(),
    ]);
    echo view('voter/vote_summary');
    echo view('templates/footer');
  }

  public function voteForm($decoded_QR)
  {
    if ($decoded_QR == session()->get('qr_code')) {
      $a_model = new AccountModel();
      $c_model = new CandidateModel();
      $p_model = new PositionModel();
      $v_model = new VoteModel();
      $v_model = new VoteModel();
      $model = new VotingSessionModel();

      helper('form');
      session()->setTempData('scanned_qr', $decoded_QR, 3600);

      $vote = $v_model->selectCount('vote_id', 'count')
        ->join('voters', 'voters.voter_id = votes.voter_id')
        ->where('qr_code', $decoded_QR)
        ->groupBy('votes.voter_id')
        ->first();

      if(isset($vote)){
        session()->setTempdata('error', 'You have already voted!', 1);
        return redirect()->to('vote');
      } else {
        echo view('templates/header');
        echo view('templates/topnavbar', [
          'student'    => $a_model->select('fname, mname, lname, suffix, gender, email, image, uname, grade, section, voters.voter_id')
            ->join('students', 'students.student_id = accounts.student_id')
            ->join('class', 'class.class_id = students.class_id')
            ->join('voters', 'students.student_id = voters.student_id')
            ->find(session()->get('student_id')),
          'candidates' => $c_model->findAll(),
          'positions'  => $p_model->findAll(),
          'limit'      => $model->findAll()
        ]);
        echo view('voter/voting_form');
        echo view('templates/footer');
      }
    } else {
      session()->setTempData('error', 'Sorry your QR Code is not Valid! Please download the correct QR Code in My Account page.', 2);
      return redirect()->to('vote');
    }
  }

  public function registerVote()
  {
    $p_model = new PositionModel();
    $v_model = new VoteModel();

    $res = $p_model->findAll();

    if (count($res) > 0) {
      foreach ($res as $key => $r) {
        $rules[$r['position']] = 'required';
      }

      if (!$this->validate($rules)) {
        session()->setTempData('error', 'Please vote one candidate in each Position/Category. Thank you!', 2);
        return redirect()->to('vote/form/select');
      } else {
        $valid_vote_count = 0;
        for ($i = 0; $i < count($res); $i++) {
          $vote_data = [
            'voter_id'     => esc($this->request->getPost('v')),
            'candidate_id' => esc($this->request->getPost($res[$i]['position']))
          ];
          $vote_valid = $v_model->selectCount('vote_id', 'count')
            ->getWhere($vote_data)
            ->getRowArray();
          if (isset($vote_valid) && $vote_valid['count'] > 0) {
            $valid_vote_count++;
          }

          if ($valid_vote_count === 0) {
            $v_model->save($vote_data);
          }
        }

        if ($valid_vote_count > 0) {
          session()->setTempData('error', 'You have already registered your vote in this session.', 2);
          session()->setTempData('info', 'Your previous vote is displayed below..', 2);
        } else {
          session()->setTempData('success', 'You have successfully voted, Thank you for your participation.', 2);
        }

        session()->setFlashData('voting_session', $this->request->getPost('vs'));
        return redirect()->to('vote/summary');
      }
    } else {
      session()->setTempData('error', 'There are no candidates to vote as of this moment, Please come back again later.', 2);
      return redirect()->to('vote/form/' . session()->get('qr_code'));
    }
  }
}
