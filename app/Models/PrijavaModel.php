<?php

namespace App\Models;

use CodeIgniter\Model;

class PrijavaModel extends Model
{
    protected $table         = 'prijava';
    protected $allowedFields = [
        'id_rad', 'ime_prezime', 'autor', 'id_ruk', 'status', 'status', 'status', 'status', 'status',
    ];
    protected $returnType    = 'object';
}