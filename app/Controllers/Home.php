<?php

namespace App\Controllers;

use \App\Models\AccountModel;

class Home extends BaseController {
    public function index() {
        $a_model = new AccountModel();
        helper('form');
        echo view('templates/header');
        echo view('templates/topnavbar', [
            'student' => $a_model->select('fname, mname, lname, suffix, gender, email, image, uname, grade, section')
                                 ->join('students', 'students.student_id = accounts.student_id')
                                 ->join('class', 'class.class_id = students.class_id')
                                 ->join('voters', 'students.student_id = voters.student_id')
                                 ->find(session()->get('student_id'))
        ]);
        echo view('voter/index');
        echo view('templates/footer');
    }

    public function about() {
        $a_model = new AccountModel();
        helper('form');
        echo view('templates/header');
        echo view('templates/topnavbar', [
            'student' => $a_model->select('fname, mname, lname, suffix, gender, email, image, uname, grade, section')
                                 ->join('students', 'students.student_id = accounts.student_id')
                                 ->join('class', 'class.class_id = students.class_id')
                                 ->join('voters', 'students.student_id = voters.student_id')
                                 ->find(session()->get('student_id'))
        ]);
        echo view('voter/about');
        echo view('templates/footer');
    }
}