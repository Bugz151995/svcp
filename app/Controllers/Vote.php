<?php

namespace App\Controllers;

use \App\Models\AccountModel;
use \App\Models\VoterModel;
use \App\Models\VoteModel;
use \App\Models\CandidateModel;
use \App\Models\PositionModel;

class Vote extends BaseController {
  public function index() {
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

  public function voteForm($decoded_QR) {
    if($decoded_QR == session()->get('qr_code')) { 
      $a_model = new AccountModel();
      $c_model = new CandidateModel();
      $p_model = new PositionModel();

      helper('form');
      session();
      
      echo view('templates/header');
      echo view('templates/topnavbar', [
          'student'    => $a_model->select('fname, mname, lname, suffix, gender, email, image, uname, grade, section, voters.voter_id')
                                  ->join('students', 'students.student_id = accounts.student_id')
                                  ->join('class', 'class.class_id = students.class_id')
                                  ->join('voters', 'students.student_id = voters.student_id')
                                  ->find(session()->get('student_id')),
          'candidates' => $c_model->findAll(),
          'positions'  => $p_model->findAll(),
      ]);
      echo view('voter/voting_form');
      echo view('templates/footer');
    } else {
      session()->setTempData('error', 'Sorry your QR Code is not Valid! Please download the correct QR Code in My Account page.', 2);
      return redirect()->to('vote');
    }  
  }

  public function registerVote() {
    $p_model = new PositionModel();
    $v_model = new VoteModel();

    $res = $p_model->findAll();

    if(count($res) > 0){
      foreach ($res as $key => $r) {
        $rules[$r['position']] = 'required';
      }

      if(!$this->validate($rules)){
        session()->setTempData('error', 'Please vote one candidate in each Position/Category. Thank you!', 2);
        return redirect()->to('vote/form/'.session()->get('qr_code'));
      } else {
        for ($i=0; $i < count($res); $i++) {
          $v_model->save([
            'voter_id'     => esc($this->request->getPost('v')),
            'candidate_id' => esc($this->request->getPost($res[$i]['position'])),
          ]);
        }

        session()->setTempData('success', 'You have successfully voted, Thank you for your participation.', 2);
        return redirect()->to('vote');
      }
    } else {
      session()->setTempData('error', 'There are no candidates to vote as of this moment, Please come back again later.', 2);
      return redirect()->to('vote/form/'.session()->get('qr_code'));
    }
  }
}