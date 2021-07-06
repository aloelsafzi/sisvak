<?php

namespace App\Controllers;

use App\Models\TempatVaksinModel;

class TempatVaksinasi extends BaseController
{
  protected $tempatVaksinModel;

  function __construct()
  {
    $this->tempatVaksinModel = new TempatVaksinModel();
  }

  public function index()
  {
    if (!$this->session->has('username')) {
      return redirect()->to("/");
    }

    $tempatVaksin = $this->tempatVaksinModel->findAll();
    $data = [
      "title" => "Tempat Vaksinasi",
      "tempatVaksin" => $tempatVaksin
    ];
    return view('tempat-vaksinasi', $data);
  }

  public function tambahTempat()
  {
    $data = [
      "title" => "Tambah Tempat Vaksinasi",
      "flashData" => $this->session->getFlashdata('message')
    ];
    return view('tambah-tempat', $data);
  }

  public function editTempat()
  {
    $id =  $this->requestData->getVar("id");
    $dataTempatVaksin = $this->tempatVaksinModel->find($id);
    $data = [
      "title" => "Edit Tempat Vaksinasi",
      "tempatVaksin" => $dataTempatVaksin
    ];
    return view('edit-tempat', $data);
  }

  public function saveData()
  {
    $data = [
      "nama_tempat" => $this->requestData->getVar("tempatVaksinasi"),
      "alamat" => $this->requestData->getVar("alamat"),
      "rt" => $this->requestData->getVar("rt"),
      "rw" => $this->requestData->getVar("rw"),
      "desa" => $this->requestData->getVar("desa"),
      "kecamatan" => $this->requestData->getVar("kecamatan"),
      "kabupaten" => $this->requestData->getVar("kabupaten"),
      "provinsi" => $this->requestData->getVar("provinsi")
    ];

    if ($this->checkTempatVaksinasiIsAvailable()) {
      $this->session->setFlashdata('message', '<div class="alert alert-danger" role="alert">Tempat Vaksinasi ' . $data["nama_tempat"] . ' Sudah terdaftar</div>');
      return redirect()->to('/TempatVaksinasi/tambahTempat');
    } else {
      $this->tempatVaksinModel->save($data);
      return redirect()->to("/TempatVaksinasi");
    }
  }

  public function updateTempat()
  {
    $id =  $this->requestData->getVar("id");
    $data = [
      "nama_tempat" => $this->requestData->getVar("tempatVaksinasi"),
      "alamat" => $this->requestData->getVar("alamat"),
      "rt" => $this->requestData->getVar("rt"),
      "rw" => $this->requestData->getVar("rw"),
      "desa" => $this->requestData->getVar("desa"),
      "kecamatan" => $this->requestData->getVar("kecamatan"),
      "kabupaten" => $this->requestData->getVar("kabupaten"),
      "provinsi" => $this->requestData->getVar("provinsi")
    ];
    $this->tempatVaksinModel->update($id, $data);
    return redirect()->to("/TempatVaksinasi");
  }

  public function deleteData()
  {
    $id =  $this->requestData->getVar("id");
    $this->tempatVaksinModel->delete($id);
    return redirect()->to("/TempatVaksinasi");
  }

  public function checkTempatVaksinasiIsAvailable()
  {
    $tempatVaksinVar = $this->requestData->getVar("tempatVaksinasi");
    $tempatVaksin = $this->tempatVaksinModel->where('nama_tempat', $tempatVaksinVar)->get()->getResultObject();
    if ($tempatVaksin) {
      return true;
    } else return false;
  }
}
