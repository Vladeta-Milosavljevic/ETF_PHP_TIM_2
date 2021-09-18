<?php

namespace App\Models;

use CodeIgniter\Model;

class Mentor extends Model
{
    protected $table         = 'users';
    protected $allowedFields = [
        'username', 'email', 'password',
    ];
    protected $returnType    = 'object';
}