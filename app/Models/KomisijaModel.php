<?php

namespace App\Models;

use CodeIgniter\Model;

class KomisijaModel extends Model
{

    protected $table = 'komisija';
    protected $allowedFields = [
        'id_rad', 'id_pred_kom', 'id_clan_2', 'id_clan_3', 'id_odluke_kom', 'Obrazlozenje', 'datum',
    ];
    protected $returnType = 'object';
}