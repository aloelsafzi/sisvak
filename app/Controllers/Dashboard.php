<?php

namespace App\Controllers;

class Dashboard extends BaseController
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

		$countWarga = $this->db->table("warga")->countAll();
		$countTempat = $this->db->table("tempat_vaksin")->countAll();
		$countBelumVaksin = $this->db->table("keterangan_vaksinasi")->where('status_vaksinasi', '0')->countAllResults();
		$countSudahVaksin = $this->db->table("keterangan_vaksinasi")->where('status_vaksinasi', '1')->countAllResults();
		$data = [
			"title" => "Dashboard",
			"countWarga" => $countWarga,
			"countTempat" => $countTempat,
			"countBelumVaksin" => $countBelumVaksin,
			"countSudahVaksin" => $countSudahVaksin
		];
		return view('dashboard', $data);
	}
}
