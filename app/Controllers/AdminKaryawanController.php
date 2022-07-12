<?php

namespace App\Controllers;

use App\Models\KaryawanModel;
use App\Models\TambahAkunModel;
use App\Models\TambahKaryawanModel;

class AdminKaryawanController extends BaseController
{
    
    public function list_karyawan(){
        $karyawanm = new KaryawanModel();
        $data['varkaryawan'] = $karyawanm->ambil_karyawan();
        $data['pager'] = $karyawanm->pager;
        echo view('Admin/list_karyawan', $data);
    }

    
    public function detail_karyawan($id_user){
        $karm = new KaryawanModel();
        $detaildt['detail_kar'] = $karm->detail_karyawan($id_user);
        
        echo view('Admin/Detail_Karyawan', $detaildt);
    }

    public function hapus_karyawan($id){
        $akunm = new TambahAkunModel();
        $karm = new TambahKaryawanModel();
        $detaildl['hapus_kar'] = $akunm->where('id_user',$id)->first();

        if($this->request->getMethod() === 'post') {
            $akunm->where('id_user',$id)->delete();
            $karm->where('id_user',$id)->delete();

            return redirect()->to('list_karyawan')->with('lempar_ingfo', 'Berhasil menghapus data');
        }
        return view('Admin/Hapus_Karyawan', $detaildl);
    }

    // tambah karaawan
    public function process_addkaryawan()
    {
        if (!$this->validate([
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
            $tambahakunmodel = new TambahAkunModel();
            $resultakun = $tambahakunmodel->insert([
                'Email' => $this->request->getVar('email'),
                'Password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
                'Role' => "Karyawan",
            ]);
            if($resultakun == true){
                $tambahkaryawanmodel = new TambahKaryawanModel();
                $resultkaryawan = $tambahkaryawanmodel->insert([
                    'id_user' => $tambahakunmodel->getInsertID(),
                    'Nama' => session()->get('nama'),
                    'Alamat' => session()->get('alamat'),
                    'Tempat_Lahir' => session()->get('tempat'),
                    'Tanggal_Lahir' => session()->get('tanggal'),
                    'Jenis_Kelamin' => session()->get('jk'),
                    'No_Hp' => session()->get('hp'),
                    'Pendidikan' => session()->get('pendidikan'),
                    'Gaji_Pokok' => session()->get('gaji'),
                ]);
                return redirect()->to('/list_karyawan');
            }
        }
    }
}
