<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    protected $usermodel;
    public function __construct()
    {
        $this->usermodel = new UserModel();
    }

    public function index()
    {
        $data = [
            'nav' => 'user',
            'nama' => session()->get('username'),
            'list' => $this->usermodel->find()
        ];

        // var_dump($data);
        return view('admin/user/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'nav' => 'user',
            'nama' => session()->get('username'),
            // 'item' => $this->usermodel->where(['id' => $id])->first()
            'item' => $this->usermodel->getDetail($id)
        ];

        return view('admin/user/detail', $data);
    }

    public function create()
    {
        $data = [
            'nav' => 'user',
            'nama' => session()->get('username')
        ];

        // var_dump($data);
        return view('admin/user/tambah', $data);
    }

    public function insert()
    {

        $nama = $this->request->getVar('namadepan') . " " . $this->request->getVar('namabelakang');
        if ($this->request->getFile('avatar')->getName() != '') {
            $avatar = $this->request->getFile('avatar');
            $namaavatar = $avatar->getRandomName();
            $avatar->move(ROOTPATH . 'public/images/avatar', $namaavatar);
        } else {
            $namaavatar = 'default.jpg';
        }

        $input = [
            'nama' => $nama,
            'alamat' => $this->request->getVar('alamat'),
            'tempat_lahir' => $this->request->getVar('tempatlahir'),
            'tanggal_lahir' => $this->request->getVar('tanggallahir'),
            'jenis_kelamin' => $this->request->getVar('jeniskelamin'),
            'telepon' => $this->request->getVar('telepon'),
            'email' => $this->request->getVar('email'),
            'civitas' => $this->request->getVar('civitas'),
            'username' => $this->request->getVar('username'),
            'password' => md5($this->request->getVar('password')),
            'avatar' => $namaavatar
        ];
        $this->usermodel->save($input);

        session()->setFlashdata('label', 'Data anggota berhasil ditambahkan');
        return redirect()->to('/admin/user');
    }

    public function insertAjax()
    {

        $validasi = \Config\Services::validation();
        $valid = $this->validate([
            'namadepan' => [
                'label' => 'Nama Depan',
                'rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong']
            ],

            'namabelakang' => [
                'label' => 'Nama Belakang',
                'rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong']
            ],

            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'valid_email' => '{field} tidak valid',
                    'is_unique' => '{field} sudah terdaftar',
                ]
            ],

            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],

            'tempatlahir' => [
                'label' => 'Tempat Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],

            'telepon' => [
                'label' => 'Telepon',
                'rules' => 'required|is_unique[users.telepon]|numeric',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah terdaftar',
                    'numeric' => 'Gunakan format {field} yang benar'
                ]
            ],

            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],

            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} minimal 8 karakter'
                ]
            ],

            'password_confirm' => [
                'label' => 'Ulangi Password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'matches' => '{field} tidak sesuai'
                ]
            ],

            'avatar' => [
                'label' => 'File',
                'rules' => 'max_size[avatar,500]|mime_in[avatar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => '{field} maksimal ukuran 500KB',
                    'mime_in' => 'format {field} harus jpg/jpeg/png',
                ]
            ],
        ]);
        if (!$valid) {
            $pesan = [
                'error' => [
                    'namadepan' => $validasi->getError('namadepan'),
                    'namabelakang' => $validasi->getError('namabelakang'),
                    'email' => $validasi->getError('email'),
                    'alamat' => $validasi->getError('alamat'),
                    'tempatlahir' => $validasi->getError('tempatlahir'),
                    'telepon' => $validasi->getError('telepon'),
                    'username' => $validasi->getError('username'),
                    'password' => $validasi->getError('password'),
                    'password_confirm' => $validasi->getError('password_confirm'),
                    'avatar' => $validasi->getError('avatar'),
                ]
            ];
            return $this->response->setJSON($pesan);
        } else {
            $nama = $this->request->getVar('namadepan') . " " . $this->request->getVar('namabelakang');
            if ($this->request->getFile('avatar')->getName() != '') {
                $avatar = $this->request->getFile('avatar');
                $namaavatar = $avatar->getRandomName();
                $avatar->move(ROOTPATH . 'public/images/avatar', $namaavatar);
            } else {
                $namaavatar = 'default.jpg';
            }

            $input = [
                'nama' => $nama,
                'alamat' => $this->request->getVar('alamat'),
                'tempat_lahir' => $this->request->getVar('tempatlahir'),
                'tanggal_lahir' => $this->request->getVar('tanggallahir'),
                'jenis_kelamin' => $this->request->getVar('jeniskelamin'),
                'telepon' => $this->request->getVar('telepon'),
                'email' => $this->request->getVar('email'),
                'civitas' => $this->request->getVar('civitas'),
                'username' => $this->request->getVar('username'),
                'password' => md5($this->request->getVar('password')),
                'avatar' => $namaavatar
            ];
            $this->usermodel->save($input);
            $pesan = [
                'sukses' => 'Data anggota berhasil diinput'
            ];
            return $this->response->setJSON($pesan);
        }
    }

    public function getData()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'list' => $this->usermodel->find()
            ];
            $hasil = [
                'data' => view('admin/user/list', $data)
            ];
            // echo json_encode($hasil);
            return $this->response->setJSON($hasil);
        } else {
            exit('data tidak dapat diload');
        }
    }


    public function getForm()
    {
        if ($this->request->isAJAX()) {
            $hasil = [
                'data' => view('admin/user/form')
            ];
            // echo json_encode($hasil);
            return $this->response->setJSON($hasil);
        } else {
            exit('data tidak dapat diload');
        }
    }

    public function edit($id)
    {
        if ($this->request->isAJAX()) {
        $item = $this->usermodel->find($id);
        $nama = explode(" ", $item['nama']);
        $data = [
        'id' => $item['id'],
        'nama_depan' => $nama[0],
        'nama_belakang' => $nama[1],
        'alamat' => $item['alamat'],
        'tempat_lahir' => $item['tempat_lahir'],
        'tanggal_lahir' => $item['tanggal_lahir'],
        'jenis_kelamin' => $item['jenis_kelamin'],
        'telepon' => $item['telepon'],
        'email' => $item['email'],
        'civitas' => $item['civitas'],
        'username' => $item['username'],
        'password' => $item['password'],
        'avatar' => $item['avatar']
    ];
        $hasil = [
        'data' => view('admin/user/edit', $data)
    ];
         return $this->response->setJSON($hasil);
    } else {
        exit('data tidak dapat diload');
    }
}

public  function update($id){
    $userModel = new UserModel();$nama = $this->request->getVar('namadepan') . " " . $this->request->getVar('namabelakang');
    if ($this->request->getFile('avatar')->getName() != '') {
        $avatar = $this->request->getFile('avatar');
        $namaavatar = $avatar->getRandomName();
        $avatar->move(ROOTPATH . 'public/img/profil', $namaavatar);
    } else {
        $namaavatar = $this->request->getVar('avalama');
    }
    if ($this->request->getVar('password') != $this->request->getVar('passlama')) {
        $pass = md5($this->request->getVar('password'));
    } else {
        $pass = $this->request->getVar('passlama');
    }
    $input = [
        'id' => $id,
        'nama' => $nama,
        'alamat' => $this->request->getVar('alamat'),
        'tempat_lahir' => $this->request->getVar('tempatlahir'),
        'tanggal_lahir' => $this->request->getVar('tanggallahir'),
        'jenis_kelamin' => $this->request->getVar('jeniskelamin'),
        'telepon' => $this->request->getVar('telepon'),
        'email' => $this->request->getVar('email'),
        'civitas' => $this->request->getVar('civitas'),
        'username' => $this->request->getVar('username'),
        'password' => md5($this->request->getVar('password')),
        'avatar' => $namaavatar
    ];
    $this->usermodel->save($input);
    $pesan = ['sukses' => 'Data anggota berhasil diupdate'];
    echo json_encode($pesan);
}

public function hapus($id){
    if ($this->request->isAjax()) {
        $userModel = new UserModel();
        $userModel -> delete($id);
        $pesan = ['sukses' => "Data anggota dengan ID=$id berhasil dihapus"];
        echo json_encode($pesan);
    } else {
        exit('Data tidak dapat dihapus');
    }
}

}
