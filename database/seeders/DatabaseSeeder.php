<?php

namespace Database\Seeders;

use App\Models\TablaPelicula;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    private $arrayPeliculas;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        self::seedCatalog();
        $this->command->info('Tabla catálogo inicializada con datos!');
    }

    public function __construct()
    {
        $this->arrayPeliculas = require base_path('app/Http/Controllers/array_peliculas.php');
    }

    private function seedCatalog()
    {
        foreach ($this->arrayPeliculas as $pelicula) {
            $p = new TablaPelicula;
            $p->title = $pelicula['title'];
            $p->year = $pelicula['year'];
            $p->director = $pelicula['director'];
            $p->poster = $pelicula['poster'];
            $p->rented = $pelicula['rented'];
            $p->synopsis = $pelicula['synopsis'];
            $p->save();
        }
    }
}
