<?php

namespace App\Http\Controllers;

use App\Models\TablaPelicula;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;

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

    public function postCreate(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|integer|max:' . date('Y'),
            'director' => 'required|string|max:255',
            'poster' => 'required|url',
            'synopsis' => 'required|string|min:10',
        ]);

        TablaPelicula::create([
            ...$validated,
            'rented' => false,
        ]);

        return redirect()
            ->route('catalog.index')
            ->with('success', 'Movie added correctly');
    }

    public function putEdit(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|integer|max:' . date('Y'),
            'director' => 'required|string|max:255',
            'poster' => 'required|url',
            'synopsis' => 'required|string|min:10',
        ]);

        $pelicula = TablaPelicula::findorFail($id);

        $pelicula->update($validated);

        return redirect()
            ->route('catalog.index')
            ->with('success', 'Movie added correctly');
    }

    public function rentMovie($id)
    {
        $pelicula = TablaPelicula::findorFail($id);

        $pelicula->update([
            'rented' => true,
            'user_id' => Auth::id()
        ]);

        return back()->with('success', 'Movie rented successfully');
    }

    public function returnMovie($id)
    {
        $pelicula = TablaPelicula::findorFail($id);

        $pelicula->update([
            'rented' => false,
            'user_id' => null
        ]);

        return back()->with(
            'success',
            'Movie returned successfully'
        );
    }
}
