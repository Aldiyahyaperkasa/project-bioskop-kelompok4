<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelFilm extends Model
{
    protected $table            = 'tb_film';
    protected $primaryKey       = 'filmkode';
    protected $allowedFields    = [
        'filmkode', 'filmjadwal', 'filmKategId', 'filmharga'
    ];

    public function tampildata()
    {
        return $this->table('tb_films')->join('tb_kategori', 'filmKategId=kategId')->get();
    }
}
