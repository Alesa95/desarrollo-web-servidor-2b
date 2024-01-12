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
                'titulo_serie' => "Friends", 
                'numero_temporada' => 1, 
                'titulo_temporada' => "Primera temporada",
                'numero_capitulos' => 12
            ],
            [
                'titulo_serie' => "Juego de Tronos", 
                'numero_temporada' => 1, 
                'titulo_temporada' => "Primera temporada",
                'numero_capitulos' => 10
            ],
            [
                'titulo_serie' => "Avatar: La leyenda de Aang", 
                'numero_temporada' => 1, 
                'titulo_temporada' => "Libro uno: Agua",
                'numero_capitulos' => 12
            ]
        ]);
    }
}
