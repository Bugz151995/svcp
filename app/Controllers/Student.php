<?php

namespace App\Controllers;

use \App\Models\ClassModel;
use \App\Models\VoterModel;
use \App\Models\StudentModel;
use \App\Models\AccountModel;
use CodeIgniter\I18n\Time;

class Student extends BaseController {
    
  /**
   * Method index
   *
   * show login form
   * 
   * @return void
   */
  public function index() {
    helper('form');
    session()->destroy();
    echo view('templates/header');
    echo view('signin');
    echo view('templates/footer');
  }

  
  public function signup() {
    helper('form');
    $c_model = new ClassModel();
    $data = [
      'class' => $c_model->findAll()
    ];
    
    echo view('templates/header');
    echo view('signup', $data);
    echo view('templates/footer');
  }

  public function signin() {
    helper('form');
    $validation = \Config\Services::validation();

    if (!$this->validate($validation->getRuleGroup('signin'))) {
      echo view('templates/header');
      echo view('signin', [
        'validation' => $this->validator
      ]);
      echo view('templates/footer');
    } else {
      $a_model = new AccountModel();
      $data = $a_model->select('students.student_id, accounts.account_id, voters.qr_code, registered_at')
                      ->join('students', 'students.student_id = accounts.student_id')
                      ->join('class', 'class.class_id = students.class_id')
                      ->join('voters', 'students.student_id = voters.student_id')
                      ->getWhere([
                        'accounts.uname' => esc($this->request->getPost('uname'))
                      ])
                      ->getRowArray();
      
      session()->set($data);
      session()->set('logged_in', TRUE);
      return redirect()->to('home');
    }
  }

  public function register() {    
    helper('form');
    $validation = \Config\Services::validation();
    $myTime = new Time('now', 'Asia/Manila');

    if(!$this->validate($validation->getRuleGroup('signup'))) {
      $c_model = new ClassModel();
      
      echo view('templates/header');
      echo view('signup', [
        'validation' => $this->validator,
        'class' => $c_model->findAll()
      ]);
      echo view('templates/footer');
    } else {
      $s_model = new StudentModel();
      $v_model = new VoterModel();
      $a_model = new AccountModel();

      $s_model->save([
        'image'    => site_url().'dist/images/avatar.png',
        'fname'    => esc($this->request->getPost('fname')),
        'mname'    => esc($this->request->getPost('mname')),
        'lname'    => esc($this->request->getPost('lname')),
        'suffix'   => esc($this->request->getPost('suffix')),
        'class_id' => esc($this->request->getPost('class')),
        'gender'   => esc($this->request->getPost('sex')),
        'email'    => esc($this->request->getPost('email')),
      ]);

      $sid = $s_model->insertID();

      $a_model->save([
        'student_id' => esc($sid),
        'uname'      => esc($this->request->getPost('uname')),
        'pass'       => password_hash($this->request->getPost('pass'), PASSWORD_DEFAULT)
      ]);

      $qr = 'SV-'.strtotime($myTime);

      $v_model->save([
        'student_id' => esc($sid),
        'qr_code'    => esc($qr)
      ]);
      
      session()->setTempData('success', 'Account registration successful!', 2);
      // redirect to generated qr code page. with download button
      session()->setTempData('QR', $qr, 3600); //expires in 2 seconds.
      return redirect()->to('generateQR');
    }
  }

  public function signout() {
    session()->destroy();
    return redirect()->to('/');
  }
}