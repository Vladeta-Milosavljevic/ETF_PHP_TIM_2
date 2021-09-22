<?php

namespace App\Models;

use CodeIgniter\Model;

class Korisnik extends Model
{
    protected $table         = 'users';
    protected $allowedFields = [
        'username', 'email', 'password_hash', 'status',
    ];
    protected $returnType    = 'object';
}