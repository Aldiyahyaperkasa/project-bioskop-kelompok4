<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKategori;

class Kategori extends BaseController
{
    public function __construct()
    {
        $this->kategori = new ModelKategori();
    }
    public function index()
    {
        $data = [
            'tampildata' => $this->kategori->findAll()
        ];
        return view('kategori/viewKategori', $data);
    }
    public function formtambah()
    {
        return view('kategori/formtambah');
    }
    public function simpandata()
    {
        $namafilm = $this->request->getVar('namafilm');
        $namakategori = $this->request->getVar('namakategori');

        $validation = \Config\Services::validation();

        $valid = $this->validate([
            'namafilm' => [
                'rules' => 'required',
                'label' => 'nama film',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'namakategori' => [
                'rules' => 'required',
                'label' => 'nama kategori',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ]
        ]);

        if (!$valid) {
            $pesan = [
                'errorNamaKategori' => $validation->getErrors()
            ];

            session()->setFlashdata($pesan);
            return redirect()->to('/kategori/formtambah');
        } else {
            $this->kategori->insert([
                'film' => $namafilm,
                'kategNama' => $namakategori
            ]);

            $pesan = [
                'sukses' => '<div class="alert alert-success"> berhasil </div>'
            ];

            session()->setFlashdata($pesan);
            return redirect()->to('/kategori/index');
        }
    }
    public function formedit($id)
    {
        $rowData = $this->kategori->find($id);

        if ($rowData) {
            $data = [
                'id' => $id,
                'film' => $rowData['film'],
                'nama' => $rowData['kategNama']
            ];

            return view('kategori/formedit', $data);
        } else {
            exit('Data Tidak Ditemukan');
        }
    }
    public function updatedata()
    {

        $idkategori = $this->request->getVar('idkategori');
        $namafilm = $this->request->getVar('namafilm');
        $namakategori = $this->request->getVar('namakategori');

        $validation = \Config\Services::validation();

        $valid = $this->validate([
            'namafilm' => [
                'rules' => 'required',
                'label' => 'nama film',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'namakategori' => [
                'rules' => 'required',
                'label' => 'nama kategori',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ]
        ]);

        if (!$valid) {
            $pesan = [
                'errorNamaKategori' => $validation->getErrors()
            ];

            session()->setFlashdata($pesan);
            return redirect()->to('/kategori/formedit/' . $idkategori);
        } else {
            $this->kategori->update($idkategori, [
                'film' => $namafilm,
                'kategNama' => $namakategori
            ]);

            $pesan = [
                'sukses' => '<div class="alert alert-success"> berhasil update data </div>'
            ];

            session()->setFlashdata($pesan);
            return redirect()->to('/kategori/index');
        }
    }
    public function hapus($id)
    {
        $rowData = $this->kategori->find($id);

        if ($rowData) {
            $this->kategori->delete($id);

            $pesan = [
                'sukses' => '<div class="alert alert-success"> data dihapus </div>'
            ];

            session()->setFlashdata($pesan);
            return redirect()->to('/kategori/index');
        } else {
            exit('Data Tidak Ditemukan');
        }
    }
}
