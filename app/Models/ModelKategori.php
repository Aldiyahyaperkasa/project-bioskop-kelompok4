<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKategori extends Model
{
    protected $table            = 'tb_kategori';
    protected $primaryKey       = 'kategId';
    protected $allowedFields    = [
        'kategId', 'film', 'kategNama'
    ];
}
