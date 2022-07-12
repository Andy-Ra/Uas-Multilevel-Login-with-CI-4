<?php

namespace App\Models;

use CodeIgniter\Model;

class MengloginModel extends Model
{
    protected $table = "user";
    protected $primaryKey = "ID_user";
    protected $returnType = "object";
    protected $allowedFields = ['Email', 'Password', 'Role'];
}
