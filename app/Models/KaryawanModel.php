<?php namespace App\Models;
use CodeIgniter\Model;

class KaryawanModel extends Model
{
    public function ambil_karyawan()
    {
        return $this->db->table('user')
        ->join('karyawan','user.id_user=karyawan.id_user')->orderby('Nama asc')
        ->get()->getResult();
    }

    public function detail_karyawan($id_user)
    {
        return $this->db->table('user')
        ->join('karyawan','user.id_user=karyawan.id_user')
        ->where('user.id_user', $id_user)->get()->getResult();
    }

    public function tampil_Tugas()
    {
        return $this->db->table('karyawan')
        ->join('tugaskaryawan','karyawan.id_user=tugaskaryawan.id_user')
        ->get()->getResult();
    }
    
    public function list_tugas($id_user)
    {
        return $this->db->table('karyawan')
        ->join('tugaskaryawan','karyawan.id_user=tugaskaryawan.id_user')
        ->where('karyawan.id_user', $id_user)->get()->getResult();
    }

    
    public function detail_tugas($id)
    {
        return $this->db->table('karyawan')
        ->join('tugaskaryawan','karyawan.id_user=tugaskaryawan.id_user')
        ->where('tugaskaryawan.id', $id)->get()->getResult();
    }

    
    public function tampil_Uang()
    {
        return $this->db->table('karyawan')
        ->join('tugaskaryawan','karyawan.id_user=tugaskaryawan.id_user')
        ->groupBy('count')
        ->get()->getResult();
    }
    
}