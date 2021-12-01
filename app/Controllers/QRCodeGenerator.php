<?php

namespace chillerlan\QRCodeExamples;
namespace App\Controllers;

use chillerlan\QRCode\{QRCode, QROptions};
use \App\Models\VoterModel;
use \App\Models\StudentModel;
use CodeIgniter\I18n\Time;

class QRCodeGenerator extends BaseController {
  public function index() {
    helper('form');
    return view('signin');
  }

  public function generate() {
    // QR Code
    $qr_session = session()->getTempData('QR');
    if(isset($qr_session)) {
      $v_model = new VoterModel();
      $QR = new QRCode;
      $QRcode = $QR->render($qr_session);

      $data = [
        'QR'    => $QRcode,
        'voter' => $v_model->select('*')
                           ->join('students', 'students.student_id = voters.student_id')
                           ->getWhere(['qr_code' => $qr_session])
                           ->getResult()
      ];

      echo view('templates/header');
      echo view('templates/default_topnavbar');
      echo view('voter/generate_QR', $data);
      echo view('templates/footer');
    } else {
      if(session()->get('islogged_in')) {
        return redirect()->to('home');
      } else return redirect()->to('/');
    }
  }
}