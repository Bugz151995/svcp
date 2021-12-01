<?php

namespace App\Controllers;

use \App\Models\AccountModel;
use \App\Models\AdminModel;
use \App\Models\VoteModel;

class Admin extends BaseController {
  public function index() {
    helper('form');
    echo view('admin/signin');
  }

  public function home() {
    helper('form');
    $a_model = new AccountModel();
    $v_model = new VoteModel();
    echo view('admin/templates/header');
    echo view('admin/templates/sidebar');
    echo view('admin/home', [
      'registered' => $a_model->selectCount('account_id', 'count')
                              ->findAll(),
      'total_vote' => $v_model->selectCount('vote_id', 'count')
                              ->findAll(),
    ]);
    echo view('admin/templates/footer');
  }

  public function signin() {
    helper('form');
    $validation = \Config\Services::validation();

    if (!$this->validate($validation->getRuleGroup('a_signin'))) {
      echo view('admin/signin', [
        'validation' => $this->validator
      ]);
    } else {
      session()->set('admin_logged_in', TRUE);
      return redirect()->to('admin/home');
    }
  }

  public function logout() {
    session()->destroy();
    return redirect()->to('admin');
  }
}