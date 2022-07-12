<?php

namespace App\Models;

use CodeIgniter\Model;

class TambahKaryawanModel extends Model
{
    protected $table = "karyawan";
    protected $primaryKey = "id";
    protected $returnType = "object";
    protected $allowedFields = ['id_user','Nama', 'Alamat', 'Tempat_Lahir', 'Tanggal_Lahir', 'Jenis_Kelamin', 'No_Hp', 'Pendidikan', 'Gaji_Pokok'];
}
