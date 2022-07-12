<?php

namespace App\Controllers;

class AdminController extends BaseController{
    public function Tambah_Karyawan(){
        return view('Admin/Tambah_Karyawan');
    }
    public function tambah_akun(){
        return view('Admin/Tambah_Akun');
    }
}
?>