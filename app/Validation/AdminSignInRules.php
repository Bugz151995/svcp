<?php

namespace App\Validation;

use \App\Models\AdminModel;
// Spaghettified code in the <making class="__intentional"></making>
// Create another one or Take time to understand this!! XDDDDDD
class AdminSignInRules {
  public function verify_admin(string $str, string $fields, array $data) : bool {
    $a_model = new AdminModel();

    $student = $a_model->where('uname', $data['uname'])
                       ->first();

    return (!$student) ? FALSE : password_verify($data['pass'], $student['pass']);
  }

  public function signin_attempt(string $str) {
    $throttler = \Config\Services::throttler();
    $allow = $throttler->check('signin', 3, MINUTE);

    return $allow;
  }
}