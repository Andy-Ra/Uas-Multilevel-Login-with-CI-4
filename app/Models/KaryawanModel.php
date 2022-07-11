<?php namespace App\Models;
use CodeIgniter\Model;

class KaryawanModel extends Model
{
    public function ambil_karyawan()
    {
        return $this->db->table('user')
        ->join('karyawan','user.No_Karyawan=karyawan.No_Karyawan')->orderby('Nama asc')
        ->get()->getResult();
    }
}