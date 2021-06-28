<?php

namespace App\Models;

use CodeIgniter\Model;

class WargaModel extends Model
{
  protected $table            = 'warga';
  protected $primaryKey       = 'id';
  protected $useAutoIncrement = true;
  protected $returnType       = 'array';
  protected $createdField     = 'created_at';
  protected $updatedField     = 'updated_at';
  protected $allowedFields    = ['nik', 'nama', 'usia', 'jenis_kelamin', 'alamat', 'photo_url', 'rt', 'rw', 'desa', 'kecamatan', 'kabupaten', 'provinsi'];
}
