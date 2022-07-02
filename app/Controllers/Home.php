<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\Request;

class Home extends BaseController
{
    protected $usermodel;
    public function __construct()
    {
        $this->usermodel = new UserModel();
    }
    public function index()
    {
        echo view("layout/header");
        //echo view("layout/footer");
        echo view("layout/HomePage");
    }

    public function detail1()
    {
        return view("layout/detail/lab1_detail");
    }

    public function detail2()
    {
        return view("layout/detail/lab2_detail");
    }
    public function detail3()
    {
        return view("layout/detail/lab3_detail");
    }

    public function register()
    {
        return view("user/register");
    }
    public function login()
    {
        return view("user/login");
    }
    public function cek()
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
                    'nama'  => $otentik['nama'],
                    'email'  => $otentik['email'],
                    'alamat'  => $otentik['alamat'],
                    'civitas'  => $otentik['civitas'],
                    'avatar'  => $otentik['avatar'],
                ];
                session()->set($sesi);
                return redirect()->to(base_url('/'));
            } else {
                session()->setFlashdata('pesan', 'Password salah');
                return redirect()->to('/masuk');
            }
        } else {
            session()->setFlashdata('pesan', 'Username tidak terdaftar!');
            return redirect()->to('/masuk');
        }
    }
    public function detail($id)
    {
        $item = $this->usermodel->find($id);
        $data = [
            'id' => $item['id'],
            'nama' => $item['nama'],
            'alamat' => $item['alamat'],
            'tempat_lahir' => $item['tempat_lahir'],
            'tanggal_lahir' => $item['tanggal_lahir'],
            'jenis_kelamin' => $item['jenis_kelamin'],
            'telepon' => $item['telepon'],
            'email' => $item['email'],
            'username' => $item['username'],
            'password' => $item['password'],
            'avatar' => $item['avatar']
        ];
    }
    public function getForm()
    {
        if ($this->request->isAJAX()) {
            $hasil = [
                'data' => view('user/form')
            ];
            echo json_encode($hasil);
        } else {
            exit('Data tidak dapat diload');
        }
    }

    public function daftar()
    {
        $validasi = \Config\Services::validation();
        $valid = $this->validate([
            'nama' => [
                'label' => 'Nama Depan',
                'rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong']
            ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} Minimal 8 karakter',
                ]
            ],
            'repassword' => [
                'label' => 'Ulangi Password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'matches' => '{field} Ulangi Password yang telah dibuat',
                ]
            ],
            'username' => [
                'label' => 'username',
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'email' => [
                'label' => 'email',
                'rules' => 'required|is_unique[users.email]|valid_email',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah terdaftar',
                    'valid_email' => '{field} Email tidak valid'
                ]
            ],
            'avatar' => 'ext_in[avatar,png,jpg,jpeg]|max_size[avatar,500]',

        ]);
        if (!$valid) {
            $pesan = [
                'error' => [
                    'nama' => $validasi->getError('nama'),
                    'username' => $validasi->getError('username'),
                    'email' => $validasi->getError('email'),
                    'alamat' => $validasi->getError('alamat'),
                    'password' => $validasi->getError('password'),
                    'repassword' => $validasi->getError('repassword'),
                    'avatar' => $validasi->getError('avatar'),
                ]
            ];
            return $this->response->setJSON($pesan);
        } else {
            // $id = url_title($this->request->getVar('username'), '_', true);
            if ($this->request->getFile('avatar')->getName() != '') {
                $avatar = $this->request->getFile('avatar');
                $namaavatar = $avatar->getRandomName();
                $avatar->move(ROOTPATH . 'public/assets/img', $namaavatar);
            } else {
                $namaavatar = 'default.jpg';
            }

            $password = password_hash($this->request->getVar('password'), PASSWORD_BCRYPT);
            $input = [
                'nama' => $this->request->getVar('nama'),
                'alamat' => $this->request->getVar('alamat'),
                'email' => $this->request->getVar('email'),
                'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                'civitas' => $this->request->getVar('civitas'),
                'username' => $this->request->getVar('username'),
                'password' => md5($this->request->getVar('password')),
                'avatar' => $namaavatar
            ];
            $this->usermodel->save($input);
            $pesan = [
                'sukses' => 'Data anggota berhasil ditambahkan'
            ];
            // return $this->response->setJSON($pesan);
            echo json_encode($pesan);
        }
    }

    public function update($id)
    {
        $id = url_title($this->request->getVar('username'), '_', true);
        if ($file = $this->request->getFile('avatar')) {
            if ($file->isValid() && !$file->hasMoved()) {
                $avatar = $this->request->getFile('avatar');
                $namaavatar = $avatar->getRandomName();
                $avatar->move(ROOTPATH . 'public/assets/img/', $namaavatar);
            } else {
                $namaavatar = 'default.jpg';
            }
        }

        $password = password_hash($this->request->getVar('password'), PASSWORD_BCRYPT);
        $this->userModel->save([
            'username' => $this->request->getVar('username'),
            'password' => $password,
            'email' => $this->request->getVar('email'),
            'avatar' => $avatar,

        ]);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/user');
    }

    public function edit($id)
    {
        if ($this->request->isAJAX()) {
            $item = $this->usermodel->find($id);
            $input = [
                'id' => $this->request->getVar('id'),
                'nama' => $this->request->getVar('nama'),
                'alamat' => $this->request->getVar('alamat'),
                'email' => $this->request->getVar('email'),
                'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                'civitas' => $this->request->getVar('civitas'),
                'username' => $this->request->getVar('username'),
                'password' => md5($this->request->getVar('password')),
                // 'avatar' => $namaavatar
            ];
            $pesan = [
                'data' => view('user/edit', $input)
            ];
            return $this->response->setJSON($pesan);
        } else {
            exit('data tidak dapat diload');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }

    public function profile()
    {
        return view("user/myProfile");
    }
}
