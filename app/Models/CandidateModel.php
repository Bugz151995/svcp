<?php

namespace App\Models;

use CodeIgniter\Model;

class CandidateModel extends Model {
  protected $table = 'candidates';
  protected $primaryKey = 'candidate_id';

  protected $returnType = 'array';
  protected $allowedFields = [
    'fname',
    'mname',
    'lname',
    'suffix',
    'position_id',
    'registered_at',

  ];
}