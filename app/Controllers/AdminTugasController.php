<?php

namespace App\Controllers;

use App\Models\KaryawanModel;
use App\Models\TugasModel;

class AdminTugasController extends BaseController
{
    
    public function tambah_tugas(){
        $tkarmodel = new KaryawanModel();
        $data['tugaskar'] = $tkarmodel->ambil_karyawan();
        return view('Admin/tugas/Tambah_Tugas', $data);
    }

    public function process_addtugas(){
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|min_length[4]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'gaji' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'waktu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }else {
            $keterangan = $this->request->getVar('keterangan');
            if($keterangan == null){
                $keterangan  = "Tidak Ada";
            }
            else{
                $keterangan = $keterangan ;
            }
            
            $tugasmodel = new TugasModel();
            $tugasmodel->insert([
                'id_user' => $this->request->getVar('id_kar'),
                'Nama_Tugas' => $this->request->getVar('nama'),
                'Tanggal_Mulai' => $this->request->getVar('tanggal'),
                'Gaji_Harian' => $this->request->getVar('gaji'),
                'Lama_Pengerjaan' => $this->request->getVar('waktu'),
                'Keterangan' => $keterangan,
            ]);
            return redirect()->to('/list_tugas');
        }
    }

    public function tampil_tugas(){
        $karyawan = new KaryawanModel();
        $data['tugaskar'] = $karyawan->tampil_Tugas();
        return view('Admin/tugas/List_tugas', $data);
    }
}