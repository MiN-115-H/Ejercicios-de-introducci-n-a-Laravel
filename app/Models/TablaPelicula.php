<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TablaPelicula extends Model
{
    protected $table = 'tablapeliculas';

    protected $fillable = [
        'title',
        'year',
        'director',
        'poster',
        'rented',
        'synopsis'
    ];
}
