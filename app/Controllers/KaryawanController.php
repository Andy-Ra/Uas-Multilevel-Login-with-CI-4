<?php

namespace App\Controllers;

use App\Models\KaryawanModel;
use App\Models\TambahKaryawanModel;

class KaryawanController extends BaseController
{

    public function Biodata()
    {
        $karm = new KaryawanModel();
        $id = session()->get('id_user');
        $detaildt['biodata_kar'] = $karm->detail_karyawan($id);
        return view('Karyawan/biodatakaryawan', $detaildt);
    }

    public function HUbahBiodata()
    {
        $karm = new KaryawanModel();
        $id = session()->get('id_user');
        $detaildt['biodata_kar'] = $karm->detail_karyawan($id);
        return view('Karyawan/UbahBiodata', $detaildt);
    }

    
    public function update_data($id){
        $karm = new TambahKaryawanModel();
        $resultu = $karm->update($id,[
            'Alamat' => $this->request->getPost('alamat'),
            'Tempat_Lahir' => $this->request->getPost('tempat'),
            'Tanggal_Lahir' => $this->request->getPost('tgl'),
            'No_Hp' => $this->request->getPost('hp')
        ]);
        
        return redirect()->to("/biodata_karyawan")->with('lempar_info', 'Berhasil mengupdate data');
    }
    
    public function tugas_karyawan(){
        $id = session()->get('id_user');
        $karyawan = new KaryawanModel();
        $data['tugaskar'] = $karyawan->list_tugas($id);
        return view('Karyawan/ListTugasKaryawan', $data);
    }
    
}
