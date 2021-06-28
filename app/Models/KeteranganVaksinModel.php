<?php

namespace App\Models;

use CodeIgniter\Model;

class KeteranganVaksinModel extends Model
{
  protected $table            = 'keterangan_vaksinasi';
  protected $primaryKey       = 'id_ket_vaksinasi';
  protected $useAutoIncrement = true;
  protected $returnType       = 'array';
  protected $createdField     = 'created_at';
  protected $updatedField     = 'updated_at';
  protected $allowedFields    = ['id_warga', 'id_tempat_vaksin', 'status_vaksinasi'];
}
