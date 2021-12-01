<?php

namespace App\Controllers;

use \App\Models\AccountModel;
use \App\Models\CandidateModel;
use \App\Models\VoteModel;

class Poll extends BaseController {
  public function index() {
    $a_model = new AccountModel();
    $c_model = new CandidateModel();
    helper('form');
    session();
    echo view('templates/header');
    echo view('templates/topnavbar', [
      'student' => $a_model->select('fname, mname, lname, suffix, gender, email, image, uname, grade, section')
                            ->join('students', 'students.student_id = accounts.student_id')
                            ->join('class', 'class.class_id = students.class_id')
                            ->join('voters', 'students.student_id = voters.student_id')
                            ->find(session()->get('student_id')),
      'votes' => $c_model->selectCount('vote_id', 'votes')
                         ->select('fname, mname, lname, suffix, position')
                         ->join('votes', 'candidates.candidate_id = votes.candidate_id', 'left')
                         ->join('positions', 'positions.position_id = candidates.position_id')
                         ->groupBy('candidates.candidate_id')
                         ->get()
                         ->getResultArray()
    ]);
    echo view('voter/poll');
    echo view('templates/footer');
  }

  public function summary() {
    helper('form');
    $c_model = new CandidateModel();
    echo view('admin/templates/header');
    echo view('admin/templates/sidebar');
    echo view('admin/poll', [
      'votes' => $c_model->selectCount('vote_id', 'votes')
                         ->select('fname, mname, lname, suffix, position')
                         ->join('votes', 'candidates.candidate_id = votes.candidate_id', 'left')
                         ->join('positions', 'positions.position_id = candidates.position_id')
                         ->groupBy('candidates.candidate_id')
                         ->paginate(15),
      'pager' => $c_model->pager
    ]);
    echo view('admin/templates/footer');
  }
}