<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TemporadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('temporadas')->insert([
            [
                'serie_id' => 1, 
                'numero_temporada' => 1, 
                'titulo_temporada' => "Primera temporada",
                'numero_capitulos' => 12
            ],
            [
                'serie_id' => 2, 
                'numero_temporada' => 1, 
                'titulo_temporada' => "Primera temporada",
                'numero_capitulos' => 10
            ],
            [
                'serie_id' => 3, 
                'numero_temporada' => 1, 
                'titulo_temporada' => "Libro uno: Agua",
                'numero_capitulos' => 12
            ]
        ]);
    }
}
