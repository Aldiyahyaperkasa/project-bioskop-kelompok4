<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelFilm;
use App\Models\ModelKategori;
use CodeIgniter\Model;

class Film extends BaseController
{
    public function __construct()
    {
        $this->film = new ModelFilm();
    }
    public function index()
    {
        $data = [
            'tampildata' => $this->film->tampildata()
        ];
        return view('film/viewFilm', $data);
    }

    public function tambah()
    {
        $modelkategori = new ModelKategori();

        $data = [
            'datakategori' => $modelkategori->findAll()
        ];
        return view('film/formtambah', $data);
    }

    public function simpandata()
    {
        $kodefilm = $this->request->getVar('kodefilm');
        $jadwalfilm = $this->request->getVar('jadwalfilm');
        $kategori = $this->request->getVar('kategori');
        $harga = $this->request->getVar('harga');

        $validation = \Config\Services::validation();

        $valid = $this->validate([
            'kodefilm' => [
                'rules' => 'required|is_unique[tb_film.filmkode]',
                'label' => 'Kode Film',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah ada'
                ]
            ],
            'jadwalfilm' => [
                'rules' => 'required',
                'label' => 'Jadwal Film',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'label' => 'Kategori',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'harga' => [
                'rules' => 'required|numeric',
                'label' => 'Harga',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} dalam bentuk angka'
                ]
            ],
        ]);

        if (!$valid) {
            $sess_Pesan = [
                'error' => '<div class="alert alert-danger"
                <h5>Error</h5>
                ' . $validation->listErrors() . '
                </div>'
            ];

            session()->setFlashdata($sess_Pesan);
            return redirect()->to('film/tambah');
        } else {
            $this->film->insert([
                'filmkode' => $kodefilm,
                'filmjadwal' => $jadwalfilm,
                'filmKategId' => $kategori,
                'filmharga' => $harga
            ]);

            $pesan_sukses = [
                'sukses' => '<div class="alert alert-success"
                <h5>Berhasil</h5>
                 data film dengan kode ' . $kodefilm . ' berhasil disimpan
                 </div>'
            ];

            session()->setFlashdata($pesan_sukses);
            return redirect()->to('/film/index');
        }
    }

    public function edit($kode)
    {
        $cekData = $this->film->find($kode);

        if ($cekData) {
            $modelkategori = new ModelKategori();
            $data = [
                'kodefilm' => $cekData['filmkode'],
                'jadwalfilm' => $cekData['filmjadwal'],
                'kategori' => $cekData['filmKategId'],
                'harga' => $cekData['filmharga'],
                'datakategori' => $modelkategori->findAll()
            ];

            return view('film/formedit', $data);
        } else {
            $pesan_error = [
                'error' => '<div>error</div>'
            ];

            session()->setFlashdata($pesan_error);
            return redirect()->to('/film/index');
        }
    }

    public function updatedata()
    {
        $kodefilm = $this->request->getVar('kodefilm');
        $jadwalfilm = $this->request->getVar('jadwalfilm');
        $kategori = $this->request->getVar('kategori');
        $harga = $this->request->getVar('harga');

        $validation = \Config\Services::validation();

        $valid = $this->validate([
            'jadwalfilm' => [
                'rules' => 'required',
                'label' => 'Jadwal Film',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'label' => 'Kategori',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'harga' => [
                'rules' => 'required|numeric',
                'label' => 'Harga',
                'errord' => [
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} dalam bentuk angka'
                ]
            ],
        ]);

        if (!$valid) {
            $sess_Pesan = [
                'error' => '<div class="alert alert-danger"
                <h5>Error</h5>
                ' . $validation->listErrors() . '
                </div>'
            ];

            session()->setFlashdata($sess_Pesan);
            return redirect()->to('film/index');
        } else {
            $this->film->update($kodefilm, [
                'filmjadwal' => $jadwalfilm,
                'filmKategId' => $kategori,
                'filmharga' => $harga
            ]);

            $pesan_sukses = [
                'sukses' => '<div class="alert alert-success"
                <h5>Berhasil</h5>
                 data film dengan kode ' . $kodefilm . ' berhasil diupdate
                 </div>'
            ];

            session()->setFlashdata($pesan_sukses);
            return redirect()->to('/film/index');
        }
    }

    public function hapus($kode)
    {
        $cekData = $this->film->find($kode);

        if ($cekData) {
            $this->film->delete($kode);

            $pesan_sukses = [
                'sukses' => '<div class="alert alert-success"
                <h5>Berhasil</h5>
                 data film dengan kode ' . $kode . ' berhasil dihapus
                 </div>'
            ];

            session()->setFlashdata($pesan_sukses);
            return redirect()->to('/film/index');
        } else {

            $pesan_error = [
                'error' => '<div>error</div>'
            ];

            session()->setFlashdata($pesan_error);
            return redirect()->to('/film/index');
        }
    }
}
