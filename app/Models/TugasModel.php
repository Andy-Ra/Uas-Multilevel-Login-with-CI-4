<?php namespace App\Models;
use CodeIgniter\Model;

class TugasModel extends Model
{
        protected $table = "tugaskaryawan";
        protected $primaryKey = "id";
        protected $returnType = "object";
        protected $allowedFields = ['id_user','Nama_Tugas', 'Tanggal_Mulai', 'Gaji_Harian', 'Lama_Pengerjaan', 'Keterangan'];
}