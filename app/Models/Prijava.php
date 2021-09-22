<?php

namespace App\Models;

use CodeIgniter\Model;

class Prijava extends Model
{
    protected $table         = 'prijava';
    protected $allowedFields = [
        'id_rad', 'autor', 'id_ruk', 'status', 'status', 'status', 'status', 'status',
    ];
    protected $returnType    = 'object';
}