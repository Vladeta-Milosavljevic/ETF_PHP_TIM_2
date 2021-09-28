<?php

namespace App\Models;

use CodeIgniter\Model;

class ModulModel extends Model
{
    protected $table         = 'modul';
    protected $allowedFields = [
        'naziv', 'ruk_modula', 'zam_ruk_modula',
    ];
    protected $returnType    = 'array';
}