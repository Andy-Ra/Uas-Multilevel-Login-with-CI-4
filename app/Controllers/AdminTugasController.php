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
                'status' => 'Belum Selesai',
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
    
    public function detail_tugas($id){
        $karm = new KaryawanModel();
        $detaildt['detail_tug'] = $karm->detail_tugas($id);
        
        echo view('Admin/tugas/Detail_Tugas', $detaildt);
    }

    public function ubah_tugas($id){
        $karm = new KaryawanModel();
        $detaildt['ubahtug'] = $karm->detail_tugas($id);
        
        echo view('Admin/tugas/Ubah_Tugas', $detaildt);
    }

    public function hapus_tugas($id){
        $tugas = new TugasModel();
        $tugas->where('id',$id)->delete();
        return redirect()->to('../list_tugas')->with('lempar_ingfo', 'Berhasil menghapus data');
    }

    
    public function update_tugass($id){
        $barangu = new TugasModel();
        $resultu = $barangu->update($id,[
            'Nama_Tugas' => $this->request->getPost('tugas'),
            'Tanggal_Mulai' => $this->request->getPost('tanggal'),
            'Gaji_Harian' => $this->request->getPost('gaji'),
            'lama_pengerjaan' => $this->request->getPost('waktu'),
            'status' => $this->request->getPost('status'),
            'keterangan ' => $this->request->getPost('keterangan')
        ]);
        return redirect()->to('../list_tugas')->with('lempar_ingfo', 'Berhasil mengupdate data');
    }

}