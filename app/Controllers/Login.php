<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    protected $userModel;

    function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            "title" => "Login",
            "flashData" => $this->session->getFlashdata('message')
        ];

        return view('auth-login', $data);
    }

    public function auth()
    {
        $username = $this->requestData->getVar('username');
        $password = $this->requestData->getVar('password');

        $user = $this->userModel->where('username', $username)->get()->getResultObject();
        // jika usernya ada
        if ($user) {
            // cek password
            if ($password == $user[0]->password) {
                $data = [
                    'username' => $user[0]->username,
                    'fullname' => $user[0]->fullname,
                    'role' => $user[0]->role
                ];
                $this->session->set($data);
                return redirect()->to('/Dashboard');
            } else {
                $this->session->setFlashdata('message', '<div class="alert alert-danger" role="alert">Password Salah</div>');
                return redirect()->to('/');
            }
        } else {
            $this->session->setFlashdata('message', '<div class="alert alert-danger" role="alert">Username Tidak ditemukan</div>');
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Anda Sudah Logout</div>');
        $this->session->destroy();
        return redirect()->to('/');
    }
}
