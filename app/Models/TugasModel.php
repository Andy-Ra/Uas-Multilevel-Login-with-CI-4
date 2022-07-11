<?php namespace App\Models;
use CodeIgniter\Model;

class TugasModel extends Model
{
    public function ambil_tugas()
    {
        return $this->db->table('karyawan')
        ->join('tugaskaryawan','karyawan.ID_Karyawan=tugaskaryawan.ID_Karyawan')->orderby('Nama asc')
        ->get()->getResult();
    }
}