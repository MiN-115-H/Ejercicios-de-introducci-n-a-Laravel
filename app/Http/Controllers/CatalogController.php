<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

require 'array_peliculas.php';

class CatalogController extends Controller
{

    private $arrayPeliculas;

    public function __construct()
    {
        $this->arrayPeliculas = require base_path('app/Http/Controllers/array_peliculas.php');
    }

    public function getIndex()
    {
        return view('catalog.index', ['arrayPeliculas' => $this->arrayPeliculas]);
    }

    public function getShow($id)
    {
        $peliculas = $this->arrayPeliculas;

        if (!isset($peliculas[$id])) {
            abort(404);
        }

        $pelicula = $peliculas[$id];

        return view('catalog.show', [
            'pelicula' => $pelicula,
            'id' => $id
        ]);
    }

    public function getCreate()
    {
        return view('catalog.create');
    }

    public function getEdit($id)
    {
        $peliculas = $this->arrayPeliculas;

        $pelicula = $peliculas[$id];
        
        return view('catalog.edit', compact('pelicula', 'id'));
    }
}
