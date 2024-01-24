<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('series')->insert([
            [
                'titulo' => 'La casa de papel', 
                'plataforma' => 'Netflix', 
                'numero_temporadas' => 7
            ],
            [
                'titulo' => 'Suite', 
                'plataforma' => 'Amazon Prime', 
                'numero_temporadas' => 3
            ],
            [
                'titulo' => 'Cómo conocí a vuestra madre', 
                'plataforma' => 'Netflix', 
                'numero_temporadas' => 5
            ],
            [
                'titulo' => 'El plan del diablo', 
                'plataforma' => 'HBO', 
                'numero_temporadas' => 4
            ]
        ]);
    }
}
