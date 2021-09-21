<?php

namespace App\Models;

use CodeIgniter\Model;

class Biografija extends Model
{
    protected $table = 'biografija';
    protected $allowedFields = [
        'id_rad', 'autor', 'tekst',
    ];
    protected $returnType = 'object';
}