<?php

namespace App\Controllers;

use App\Models\TambahAkunModel;
use App\Models\TambahKaryawanModel;

class TambahAkunController extends BaseController
{
    var $iduser;
    public function process_addkaryawan()
    {
        if (!$this->validate([
            'idk' => [
                'rules' => 'required|min_length[8]|',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 8 Karakter',
                ]
            ],
            'nama' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 50 Karakter',
                ]
            ],
            'alamat' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'tempat' => [
                'rules' => 'required|min_length[4]|max_length[25]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 25 Karakter',
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required|min_length[4]|max_length[25]',
                'errors' => [
                    'required' => '{field}Mohon Pilih Jenis Kelamin',
                    'min_length' => '{field}Mohon Pilih Jenis Kelamin',
                    'max_length' => '{field}Mohon Pilih Jenis Kelamin',
                ]
            ],
            'hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'pendidikan' => [
                'rules' => 'required|min_length[1]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Harus diisi',
                ]
            ],
            'gaji' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            session()->set([
                'id_kar' => $this->request->getVar('idk'),
                'nama' => $this->request->getVar('nama'),
                'alamat' => $this->request->getVar('alamat'),
                'tempat' => $this->request->getVar('tempat'),
                'tanggal' => $this->request->getVar('tanggal'),
                'jk' => $this->request->getVar('jenis_kelamin'),
                'hp' => $this->request->getVar('hp'),
                'pendidikan' => $this->request->getVar('pendidikan'),
                'gaji' => $this->request->getVar('gaji'),
            ]);

            return redirect()->to('/Tambah_Akun');
        }
    }

    public function process_addakun()
    {
        if (!$this->validate([
            'email' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Harus diisi',
                    'max_length' => '{field} Harus diisi',
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Password Minimal 4 Karakter',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            $tambahkaryawanmodel = new TambahKaryawanModel();
            $resultkaryawan = $tambahkaryawanmodel->insert([
                'No_Karyawan' => session()->get('id_kar'),
                'Nama' => session()->get('nama'),
                'Alamat' => session()->get('alamat'),
                'Tempat_Lahir' => session()->get('tempat'),
                'Tanggal_Lahir' => session()->get('tanggal'),
                'Jenis_Kelamin' => session()->get('jk'),
                'No_Hp' => session()->get('hp'),
                'Pendidikan' => session()->get('pendidikan'),
                'Gaji_Pokok' => session()->get('gaji'),
            ]);
            $tambahakunmodel = new TambahAkunModel();
            $resultakun = $tambahakunmodel->insert([
                'No_Karyawan' =>  session()->get('id_kar'),
                'Email' => $this->request->getVar('email'),
                'Password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
                'Role' => "Karyawan",
            ]); 
            return redirect()->to('/list_karyawan');
        }
    }
}
