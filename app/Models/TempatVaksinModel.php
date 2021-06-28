<?php

namespace App\Models;

use CodeIgniter\Model;

class TempatVaksinModel extends Model
{
  protected $table            = 'tempat_vaksin';
  protected $primaryKey       = 'id';
  protected $useAutoIncrement = true;
  protected $returnType       = 'array';
  protected $createdField     = 'created_at';
  protected $updatedField     = 'updated_at';
  protected $allowedFields    = ['nama_tempat', 'alamat', 'rt', 'rw', 'desa', 'kecamatan', 'kabupaten', 'provinsi'];
}
