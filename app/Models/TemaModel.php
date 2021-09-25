<?php

namespace App\Models;

use CodeIgniter\Model;

class TemaModel extends Model
{
    protected $table         = 'tema';
    protected $allowedFields = [
        'id_student', 'id_mentor', 'id_ruk', 'id_ruk_zam', 'modul', 'status', 'deleted_at',
    ];
    protected $returnType    = 'object';
}