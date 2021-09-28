<?php

namespace App\Models;

use CodeIgniter\Model;

class PrijavaModel extends Model
{
    protected $table         = 'prijava';
    protected $allowedFields = [
        'id_rad', 'ime_prezime', 'indeks', 'izborno_podrucje_MS', 'autor', 'ruk_predmet', 'naslov', 'naslov_eng', 'datum',
    ];
    protected $returnType    = 'array';
}