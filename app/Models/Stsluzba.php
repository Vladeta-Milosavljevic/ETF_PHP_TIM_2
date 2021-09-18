<?php

namespace App\Models;

use CodeIgniter\Model;

class Stsluzba extends Model
{
    protected $table         = 'users';
    protected $allowedFields = [
        'username', 'email', 'password',
    ];
    protected $returnType    = 'object';
}