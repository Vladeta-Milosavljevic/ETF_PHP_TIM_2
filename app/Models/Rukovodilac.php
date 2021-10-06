<?php

namespace App\Models;

use CodeIgniter\Model;

class Rukovodilac extends Model
{
    protected $table         = 'users';
    protected $allowedFields = [
        'username', 'email', 'password',
    ];
    protected $returnType    = 'array';
}