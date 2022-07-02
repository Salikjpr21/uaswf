<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Otentikasi extends BaseController
{
    protected $usermodel;
    public function __construct()
    {
        $this->usermodel = new UserModel();
    }

    public function index()
    {
        return view('admin/login');
    }
    public function login()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $userModel = new UserModel;
        $otentik = $userModel->where(['username' => $username])->first();
        if ($otentik) {
            $verifikasi  = password_verify(md5($password), password_hash($otentik['password'], PASSWORD_DEFAULT));
            if ($verifikasi) {
                $sesi = [
                    'username'      => $otentik['username'],
                    'id'            => $otentik['id'],
                    'loggedIn'     => TRUE,
                    'avatar' => $otentik['avatar'],
                ];
                session()->set($sesi);
                return redirect()->to('admin/');
            } else {
                session()->setFlashdata('pesan', 'Username/Password tidak tepat!');
                return redirect()->to('admin/masuk');
            }
        } else {
            session()->setFlashdata('pesan', 'Username/Password tidak tepat!');
            return redirect()->to('admin/masuk');
        }
        $remember = $this->request->getVar('rememberme');
        if (isset($remember)) {
            $nama = 'username';
            $nilai = $otentik['username'];
            $durasi = strtotime('+7 days');
            $path = "/admin";
            setcookie($nama, $nilai, $durasi, $path);
        }
    }
    public function logout()
    {
        session()->destroy();
        $nama = 'username';
        $nilai = '';
        $durasi =  strtotime('-7 days');
        $path = '/admin';
        setcookie($nama, $nilai, $durasi, $path);

        return redirect()->to('admin/masuk');
    }
}
