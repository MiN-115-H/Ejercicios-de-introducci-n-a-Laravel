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
        'synopsis',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
