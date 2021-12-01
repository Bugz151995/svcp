<?php

namespace App\Models;

use CodeIgniter\Model;

class PositionModel extends Model {
  protected $table = 'positions';
  protected $primaryKey = 'position_id';

  protected $returnType = 'array';
  protected $allowedFields = [
    'position',
    'allowed_candidate',
    'added_at'
  ];
}