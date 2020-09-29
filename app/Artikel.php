<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id_artikel';
    protected $fillable = ['judul', 'isi', 'slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
