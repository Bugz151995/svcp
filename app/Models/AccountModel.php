<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model {
  protected $table = 'accounts';
  protected $primaryKey = 'account_id';

  protected $returnType = 'array';
  protected $allowedFields = [
    'student_id',
    'uname',
    'pass'
  ];
}