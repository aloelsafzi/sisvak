<?php

namespace App\Controllers;

class KeteranganVaksinasi extends BaseController
{
  protected $db;

  function __construct()
  {
    $this->db = \Config\Database::connect();
  }
  public function index()
  {
    if (!$this->session->has('username')) {
      return redirect()->to("/");
    }

    $builder = $this->db->table('keterangan_vaksinasi');
    $builder->select('*');
    $builder->join('warga', 'warga.id = keterangan_vaksinasi.id_warga');
    $builder->join('tempat_vaksin', 'tempat_vaksin.id = keterangan_vaksinasi.id_tempat_vaksin');
    $query = $builder->get()->getResultArray();
    $data = [
      "title" => "Keterangan Vaksinasi",
      "dataKetVaksin" => $query
    ];

    return view('keterangan-vaksinasi', $data);
  }

  public function updateStatus()
  {
    $status = 0;
    if ($this->requestData->getVar("status")) {
      $status = 1;
    }
    $id = $this->requestData->getVar("id");
    $builder = $this->db->table('keterangan_vaksinasi');
    $builder->set('status_vaksinasi', $status);
    $builder->where('id_ket_vaksinasi', $id);
    $builder->update();
    return redirect()->to("/KeteranganVaksinasi");
  }
}
