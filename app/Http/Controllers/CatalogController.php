<?php

namespace App\Http\Controllers;

use App\Models\TablaPelicula;
use Illuminate\Http\Request;

require 'array_peliculas.php';

class CatalogController extends Controller
{
    public function getIndex()
    {
        $arrayPeliculas = TablaPelicula::all();
        return view('catalog.index', ['arrayPeliculas' => $arrayPeliculas]);
    }

    public function getShow($id)
    {
        $pelicula = TablaPelicula::findOrFail($id);

        return view('catalog.show', compact('pelicula'));
    }

    public function getCreate()
    {
        return view('catalog.create');
    }

    public function getEdit($id)
    {
        $pelicula = TablaPelicula::find($id);

        return view('catalog.edit', compact('pelicula', 'id'));
    }
}
