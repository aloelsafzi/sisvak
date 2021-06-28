<?php

namespace App\Controllers;

use App\Models\KeteranganVaksinModel;
use App\Models\TempatVaksinModel;
use App\Models\WargaModel;

class Warga extends BaseController
{
  protected $wargaModel;
  protected $tempatVaksin;
  protected $keteranganVaksinsaiModel;

  function __construct()
  {
    $this->wargaModel = new WargaModel();
    $this->tempatVaksinModel = new TempatVaksinModel();
    $this->keteranganVaksinsaiModel = new KeteranganVaksinModel();
  }

  public function index()
  {
    if (!$this->session->has('username')) {
      return redirect()->to("/");
    }
    $warga = $this->wargaModel->findAll();
    $data = [
      "title" => "Warga / Penduduk",
      "warga" => $warga
    ];

    return view('warga', $data);
  }

  public function tambahWarga()
  {
    $data = [
      "title" => "Tambah Warga / Penduduk",
      "tempatVaksin" => $this->tempatVaksinModel->findAll()
    ];
    return view('tambah-warga', $data);
  }

  public function editWarga()
  {
    $id =  $this->requestData->getVar("id");
    $dataKetVaksin = $this->keteranganVaksinsaiModel->where('id_warga', $id)->findAll();
    $warga = $this->wargaModel->find($id);
    $data = [
      "title" => "Edit Warga / Penduduk",
      "tempatVaksin" => $this->tempatVaksinModel->findAll(),
      "warga" => $warga,
      "dataVaksin" => $dataKetVaksin
    ];
    return view('edit-warga', $data);
  }

  public function saveWarga()
  {
    $data = $this->getRequestDataWargaToCreate();
    $idInsert = $this->wargaModel->insert($data);
    $dataKetVaksin = $this->getRequestKetVaksin($idInsert);
    $this->keteranganVaksinsaiModel->save($dataKetVaksin);
    return redirect()->to("/Warga");
  }

  public function updateWarga()
  {
    $id =  $this->requestData->getVar("id");
    $idKetVaksin = $this->keteranganVaksinsaiModel->where('id_warga', $id)->findAll();
    $data = $this->getRequestDataWargaToUpdate();
    $dataKetVaksin = $this->getRequestKetVaksin($id);
    $this->wargaModel->update($id, $data);

    if (!$idKetVaksin || count($idKetVaksin) == 0) {
      $this->keteranganVaksinsaiModel->save($dataKetVaksin);
    } else {
      $this->keteranganVaksinsaiModel->update($idKetVaksin[0]["id_ket_vaksinasi"], $dataKetVaksin);
    }

    return redirect()->to("/Warga");
  }

  public function deleteWarga()
  {
    $id =  $this->requestData->getVar("id");
    $this->wargaModel->delete($id);
    return redirect()->to("/Warga");
  }

  public function getRequestDataWargaToCreate()
  {
    $photoWarga = $this->requestData->getFile("photo_warga");
    $newNameFile = $photoWarga->getRandomName();
    $photoWarga->move('image_warga', $newNameFile);
    $data = [
      "nik" => $this->requestData->getVar("nik"),
      "nama" =>  $this->requestData->getVar("nama"),
      "usia" =>  $this->requestData->getVar("usia"),
      "alamat" =>  $this->requestData->getVar("alamat"),
      "jenis_kelamin" =>  $this->requestData->getVar("jenis_kelamin"),
      "rt" =>  $this->requestData->getVar("rt"),
      "rw" =>  $this->requestData->getVar("rw"),
      "desa" =>  $this->requestData->getVar("desa"),
      "kecamatan" =>  $this->requestData->getVar("kecamatan"),
      "kabupaten" => $this->requestData->getVar("kabupaten"),
      "provinsi" =>  $this->requestData->getVar("provinsi"),
      "photo_url" =>  $newNameFile,
    ];
    return $data;
  }

  public function getRequestDataWargaToUpdate()
  {
    $data = [
      "nik" => $this->requestData->getVar("nik"),
      "nama" =>  $this->requestData->getVar("nama"),
      "usia" =>  $this->requestData->getVar("usia"),
      "alamat" =>  $this->requestData->getVar("alamat"),
      "jenis_kelamin" =>  $this->requestData->getVar("jenis_kelamin"),
      "rt" =>  $this->requestData->getVar("rt"),
      "rw" =>  $this->requestData->getVar("rw"),
      "desa" =>  $this->requestData->getVar("desa"),
      "kecamatan" =>  $this->requestData->getVar("kecamatan"),
      "kabupaten" => $this->requestData->getVar("kabupaten"),
      "provinsi" =>  $this->requestData->getVar("provinsi"),
    ];
    return $data;
  }

  public function getRequestKetVaksin($idInsert = null)
  {
    $dataKetVaksin = [];
    if ($idInsert != null) {
      $dataKetVaksin = [
        "status_vaksinasi" => $this->requestData->getVar("status"),
        "id_warga" => $idInsert,
        "id_tempat_vaksin" => $this->requestData->getVar("id_tempat_vaksin"),
      ];
    };
    return $dataKetVaksin;
  }
}
