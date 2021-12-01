<?php

namespace App\Models;

use CodeIgniter\Model;

class VoterModel extends Model {
  protected $table = 'voters';
  protected $primaryKey = 'voter_id';

  protected $returnType = 'array';
  protected $allowedFields = [
    'student_id',
    'qr_code'
  ];
}