<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
  protected $table            = 'users';
  protected $primaryKey       = 'id_user';
  protected $useAutoIncrement = true;
  protected $returnType       = 'array';
  protected $createdField     = 'created_at';
  protected $updatedField     = 'updated_at';
  protected $allowedFields    = ['username', 'fullname', 'password', 'role'];
}
