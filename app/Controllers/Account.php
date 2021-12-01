<?php

namespace chillerlan\QRCodeExamples;
namespace App\Controllers;

use chillerlan\QRCode\{QRCode, QROptions};
use \App\Models\VoterModel;
use \App\Models\ClassModel;
use \App\Models\StudentModel;
use \App\Models\AccountModel;

class Account extends BaseController {
    public function index() {      
      $v_model = new VoterModel();
      $a_model = new AccountModel();
      $QR = new QRCode;
      $QRcode = $QR->render(session()->get('qr_code'));

      helper('form');
      session();
      echo view('templates/header');
      echo view('templates/topnavbar', [
        'QR'      => $QRcode,
        'student' => $a_model->select('fname, mname, lname, suffix, gender, email, image, uname, grade, section')
                             ->join('students', 'students.student_id = accounts.student_id')
                             ->join('class', 'class.class_id = students.class_id')
                             ->join('voters', 'students.student_id = voters.student_id')
                             ->find(session()->get('student_id'))
      ]);
      echo view('voter/account');
      echo view('templates/footer');
    }

    public function updatePic() {
      if($this->validate([
        'pr_pic' => 'uploaded[pr_pic]|is_image[pr_pic]'
      ])){
        $file = $this->request->getFile('pr_pic');
        $rand_name = $file->getRandomName();
        $path = site_url().'assets/students/'.$rand_name;
        $file->move('assets/students/', $rand_name);

        $s_model = new StudentModel();

        $s_model->save([
          'student_id' => session()->get('student_id'),
          'image' => esc($path)
        ]);
        session()->setTempData('success', 'Your Profile Picture was successfully updated!', 2);
        return redirect()->to('account');
      } else {
        session()->setTempData('error', 'Your Profile Picture was not Saved!', 2);
        return redirect()->to('account');
      }
    }

    public function displayNameModal() {     
      $v_model = new VoterModel();
      $a_model = new AccountModel();
      $QR = new QRCode;
      $QRcode = $QR->render(session()->get('qr_code'));

      helper('form');
      session();
      echo view('templates/header');
      echo view('templates/topnavbar', [
        'QR'      => $QRcode,
        'student' => $a_model->select('fname, mname, lname, suffix, gender, email, image, uname, grade, section')
                             ->join('students', 'students.student_id = accounts.student_id')
                             ->join('class', 'class.class_id = students.class_id')
                             ->join('voters', 'students.student_id = voters.student_id')
                             ->find(session()->get('student_id'))
      ]);
      echo view('voter/account');
      echo view('voter/update_profile/name');
      echo view('templates/footer');
    }

    public function displaySexModal() {     
      $v_model = new VoterModel();
      $a_model = new AccountModel();
      $QR = new QRCode;
      $QRcode = $QR->render(session()->get('qr_code'));

      helper('form');
      session();
      echo view('templates/header');
      echo view('templates/topnavbar', [
        'QR'      => $QRcode,
        'student' => $a_model->select('fname, mname, lname, suffix, gender, email, image, uname, grade, section')
                             ->join('students', 'students.student_id = accounts.student_id')
                             ->join('class', 'class.class_id = students.class_id')
                             ->join('voters', 'students.student_id = voters.student_id')
                             ->find(session()->get('student_id'))
      ]);
      echo view('voter/account');
      echo view('voter/update_profile/gender');
      echo view('templates/footer');
    }

    public function displayEmailModal() {     
      $v_model = new VoterModel();
      $a_model = new AccountModel();
      $QR = new QRCode;
      $QRcode = $QR->render(session()->get('qr_code'));

      helper('form');
      session();
      echo view('templates/header');
      echo view('templates/topnavbar', [
        'QR'      => $QRcode,
        'student' => $a_model->select('fname, mname, lname, suffix, gender, email, image, uname, grade, section')
                             ->join('students', 'students.student_id = accounts.student_id')
                             ->join('class', 'class.class_id = students.class_id')
                             ->join('voters', 'students.student_id = voters.student_id')
                             ->find(session()->get('student_id'))
      ]);
      echo view('voter/account');
      echo view('voter/update_profile/email');
      echo view('templates/footer');
    }

    public function displayClassModal() {     
      $v_model = new VoterModel();
      $a_model = new AccountModel();
      $c_model = new ClassModel();
      $QR = new QRCode;
      $QRcode = $QR->render(session()->get('qr_code'));

      helper('form');
      session();
      echo view('templates/header');
      echo view('templates/topnavbar', [
        'class'   => $c_model->findAll(),
        'QR'      => $QRcode,
        'student' => $a_model->select('fname, mname, lname, suffix, gender, email, image, uname, class.class_id, grade, section')
                             ->join('students', 'students.student_id = accounts.student_id')
                             ->join('class', 'class.class_id = students.class_id')
                             ->join('voters', 'students.student_id = voters.student_id')
                             ->find(session()->get('student_id'))
      ]);
      echo view('voter/account');
      echo view('voter/update_profile/class');
      echo view('templates/footer');
    }

    public function displayUnameModal() {     
      $v_model = new VoterModel();
      $a_model = new AccountModel();
      $QR = new QRCode;
      $QRcode = $QR->render(session()->get('qr_code'));

      helper('form');
      session();
      echo view('templates/header');
      echo view('templates/topnavbar', [
        'QR'      => $QRcode,
        'student' => $a_model->select('fname, mname, lname, suffix, gender, email, image, uname, grade, section')
                             ->join('students', 'students.student_id = accounts.student_id')
                             ->join('class', 'class.class_id = students.class_id')
                             ->join('voters', 'students.student_id = voters.student_id')
                             ->find(session()->get('student_id'))
      ]);
      echo view('voter/account');
      echo view('voter/update_profile/uname');
      echo view('templates/footer');
    }

    public function updateName() {
      if($this->validate([
        'fname' => 'required',
        'lname' => 'required',
      ])){
        $s_model = new StudentModel();

        $s_model->save([
          'student_id' => session()->get('student_id'),
          'fname'      => esc($this->request->getPost('fname')),
          'mname'      => esc($this->request->getPost('mname')),
          'lname'      => esc($this->request->getPost('lname')),
          'suffix'     => esc($this->request->getPost('suffix')),
        ]);

        session()->setTempData('success', 'Your Name was successfully updated!', 2);
        return redirect()->to('account');
      } else {
        session()->setTempData('error', 'Please don\'t leave any fields with red asterisk(*) unanswered.', 2);
        return redirect()->to('account');
      }
    }    

    public function updateSex() {
      if($this->validate([
        'sex' => 'required',
      ])){
        $s_model = new StudentModel();

        $s_model->save([
          'student_id' => session()->get('student_id'),
          'gender'     => esc($this->request->getPost('sex')),
        ]);

        session()->setTempData('success', 'Your Gender was successfully updated!', 2);
        return redirect()->to('account');
      } else {
        session()->setTempData('error', 'Please don\'t leave any fields with red asterisk(*) unanswered.', 2);
        return redirect()->to('account');
      }
    }

    public function updateEmail() {
      if($this->validate([
        'email' => 'required',
      ])){
        $s_model = new StudentModel();

        $s_model->save([
          'student_id' => session()->get('student_id'),
          'email'     => esc($this->request->getPost('email')),
        ]);

        session()->setTempData('success', 'Your Email was successfully updated!', 2);
        return redirect()->to('account');
      } else {
        session()->setTempData('error', 'Please don\'t leave any fields with red asterisk(*) unanswered.', 2);
        return redirect()->to('account');
      }
    }

    public function updateClass() {
      if($this->validate([
        'class' => 'required',
      ])){
        $s_model = new StudentModel();

        $s_model->save([
          'student_id' => session()->get('student_id'),
          'class_id'      => esc($this->request->getPost('class')),
        ]);

        session()->setTempData('success', 'Your Class was successfully updated!', 2);
        return redirect()->to('account');
      } else {
        session()->setTempData('error', 'Please don\'t leave any fields with red asterisk(*) unanswered.', 2);
        return redirect()->to('account');
      }
    }

    public function updateUname() {
      if($this->validate([
        'uname' => 'required|is_unique[accounts.uname]',
      ])){
        $a_model = new AccountModel();

        $a_model->save([
          'account_id' => session()->get('account_id'),
          'uname'      => esc($this->request->getPost('uname')),
        ]);

        session()->setTempData('success', 'Your Username was successfully updated!', 2);
        return redirect()->to('account');
      } else {
        session()->setTempData('error', 'The chosen username might be taken, or you have not filled up the form..', 2);
        return redirect()->to('account');
      }
    }
}