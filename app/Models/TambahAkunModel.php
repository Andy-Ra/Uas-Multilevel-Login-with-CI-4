<?php namespace App\Models;
use CodeIgniter\Model;

class TambahAkunModel extends Model
{
    protected $table = "user";
    protected $primaryKey = "ID_user";
    protected $returnType = "object";
    protected $allowedFields = ['No_Karyawan','Email', 'Password', 'Role'];
}