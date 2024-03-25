<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\autor;
use App\Models\livro;
use App\Models\multa;
use App\Models\genero;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(50)->create();
        genero::factory(15)->create();
        livro::factory(15)->create();
        autor::factory(15)->create();
        multa::factory(15)->create();
    }
}
