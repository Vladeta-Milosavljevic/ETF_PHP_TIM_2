<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusPrijaveModel extends Model
{
    protected $table         = 'status_prijave';
    protected $allowedFields = [
        'opis',
    ];
    protected $returnType    = 'array';
}