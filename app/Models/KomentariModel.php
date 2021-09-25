<?php

namespace App\Models;

use CodeIgniter\Model;

class KomentariModel extends Model
{
    protected $table = 'komentari';
    protected $allowedFields = [
        'id_rad', 'mentor_komentar', 'ruk_komentar', 'st_sluz_komentar',
    ];
    protected $returnType = 'object';
}