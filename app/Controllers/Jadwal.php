<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JadwalModel;

class Jadwal extends BaseController
{
    protected $jadwalmodel;
    public function __construct()
    {
        $this->jadwalmodel = new JadwalModel();
    }

    public function index()
    {
        $data = [
            'nav' => 'jadwal',
            'nama' => session()->get('username'),
            'list' => $this->jadwalmodel->find()
        ];

        // var_dump($data);
        return view('admin/jadwal/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'nav' => 'jadwal',
            'nama' => session()->get('username'),
            // 'item' => $this->jadwalmodel->where(['id' => $id])->first()
            'item' => $this->jadwalmodel->getDetail($id)
        ];

        return view('admin/jadwal/detail', $data);
    }

    public function create()
    {
        $data = [
            'nav' => 'jadwal',
            'nama' => session()->get('username')
        ];

        // var_dump($data);
        return view('admin/jadwal/tambah', $data);
    }

    public function insert()
    {
        if ($this->request->getFile('bukti')->getName() != '') {
            $bukti = $this->request->getFile('bukti');
            $namabukti = $bukti->getRandomName();
            $bukti->move(ROOTPATH . 'public/images/bukti', $namabukti);
        } else {
            $namabukti = 'default.jpg';
        }
        $input = [
            'jenis_lab' => $this->request->getVar('jenis_lab'),
            'nama_peminjam' => $this->request->getVar('nama_peminjam'),
            'civitas' => $this->request->getVar('civitas'),
            'awal_pinjam' => $this->request->getVar('awal_pinjam'),
            'akhir_pinjam' => $this->request->getVar('akhir_pinjam'),
            'bukti' => $namabukti
        ];
        $this->jadwalmodel->save($input);

        session()->setFlashdata('label', 'Data peminjaman berhasil ditambahkan');
        return redirect()->to('/admin/jadwal');
    }

    public function insertAjax()
    {
        function date_valid($date){
            $day = (int) substr($date, 0, 2);
            $month = (int) substr($date, 3, 2);
            $year = (int) substr($date, 6, 4);
            return checkdate($month, $day, $year);
        }
        $validasi = \Config\Services::validation();
        $valid = $this->validate([
            'jenis_lab' => [
                'label' => 'Jenis Lab',
                'rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong']
            ],

            'nama_peminjam' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],

            'civitas' => [
                'label' => 'Civitas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],

            'awal_pinjam' => [
                'label' => 'Awal Pinjam',
                'rules' => 'required|is_unique[jadwal.awal_pinjam]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah sudah dipinjam',
                ]
            ],

            'akhir_pinjam' => [
                'label' => 'Akhir Pinjam',
                'rules' => 'required|is_unique[jadwal.akhir_pinjam]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah dipinjam',
                    // 'date_valid' => '{field} harus lebih besar dari Awal Pinjam',
                ]
            ],
            'bukti' => [
                'label' => 'Bukti Pembayaran',
                'rules' => 'uploaded[bukti]|max_size[bukti,2048]|mime_in[bukti,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => '{field} tidak boleh kosong',
                    'max_size' => '{field} maksimal ukuran 2MB',
                    'mime_in' => 'format {field} harus jpg/jpeg/png',
                ]
            ],
        ]);
        if (!$valid) {
            $pesan = [
                'error' => [
                    'jenis_lab' => $validasi->getError('jenis_lab'),
                    'nama_peminjam' => $validasi->getError('nama_peminjam'),
                    'civitas' => $validasi->getError('civitas'),
                    'awal_pinjam' => $validasi->getError('awal_pinjam'),
                    'akhir_pinjam' => $validasi->getError('akhir_pinjam'),
                    'bukti' => $validasi->getError('bukti'),
                ]
            ];
            return $this->response->setJSON($pesan);
        } else {
            if ($this->request->getFile('bukti')->getName() != '') {
                $bukti = $this->request->getFile('bukti');
                $namabukti = $bukti->getRandomName();
                $bukti->move(ROOTPATH . 'public/images/bukti', $namabukti);
            } else {
                $namabukti = 'default.jpg';
            }

            $input = [
                'jenis_lab' => $this->request->getVar('jenis_lab'),
                'nama_peminjam' => $this->request->getVar('nama_peminjam'),
                'civitas' => $this->request->getVar('civitas'),
                'awal_pinjam' => $this->request->getVar('awal_pinjam'),
                'akhir_pinjam' => $this->request->getVar('akhir_pinjam'),
                'bukti' => $namabukti
            ];
            $this->jadwalmodel->save($input);
            $pesan = [
                'sukses' => 'Data peminjaman berhasil diinput'
            ];
            return $this->response->setJSON($pesan);
        }
    }

    public function getData()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'list' => $this->jadwalmodel->find()
            ];
            $hasil = [
                'data' => view('admin/jadwal/list', $data)
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
                'data' => view('admin/jadwal/form')
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
        $item = $this->jadwalmodel->find($id);
        $data = [
        'id' => $item['id'],
        'verif' => $item['verif'],
    ];
        $hasil = [
        'data' => view('admin/jadwal/edit', $data)
    ];
         return $this->response->setJSON($hasil);
        } else {
            exit('data tidak dapat diload');
        }
    }
    public  function update($id){
        $input = [
            'id' => $id,
            'verif' => $this->request->getVar('verif'),
        ];
        $this->jadwalmodel->save($input);
        $pesan = ['sukses' => 'Data peminjaman berhasil diupdate'];
        echo json_encode($pesan);
    }

    public function hapus($id){
        if ($this->request->isAjax()) {
            $jadwalModel = new JadwalModel();
            $jadwalModel -> delete($id);
            $pesan = ['sukses' => "Data peminjaman dengan ID=$id berhasil dihapus"];
            echo json_encode($pesan);
        } else {
            exit('Data tidak dapat dihapus');
        }
    }
}
