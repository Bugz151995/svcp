<?php

namespace App\Models;

use CodeIgniter\Model;

class VoteModel extends Model {
  protected $table = 'votes';
  protected $primaryKey = 'vote_id';

  protected $returnType = 'array';
  protected $allowedFields = [
    'voted_at',
    'voter_id',
    'candidate_id'
  ];
}