<?php

namespace App\Models;

use CodeIgniter\Model;

class VotingSessionModel extends Model {
  protected $table = 'voting_session';
  protected $primaryKey = 'voting_session_id';

  protected $returnType = 'array';
  protected $allowedFields = [
    'scope', 
    'session_start', 
    'session_end',
  ];
}