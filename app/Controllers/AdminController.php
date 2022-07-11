<?php

namespace App\Controllers;

use App\Models\KaryawanModel;
use App\Models\TambahAkunModel;

class AdminController extends BaseController{
    public function list_karyawan(){
        $karyawanm = new KaryawanModel();
        $data['varkaryawan'] = $karyawanm->ambil_karyawan();
        $data['pager'] = $karyawanm->pager;
        echo view('Admin/list_karyawan', $data);
    }
    public function Tambah_Karyawan(){
        return view('Admin/Tambah_Karyawan');
    }
    public function tambah_akun(){
        return view('Admin/Tambah_Akun');
    }
}
?>