<?php

namespace App\Models;

use CodeIgniter\Model;

class TambahKaryawanModel extends Model
{
    protected $table = "karyawan";
    protected $primaryKey = "No_Karyawan";
    protected $returnType = "object";
    protected $allowedFields = ['No_Karyawan','Nama', 'Alamat', 'Tempat_Lahir', 'Tanggal_Lahir', 'Jenis_Kelamin', 'No_Hp', 'Pendidikan', 'Gaji_Pokok'];
}
