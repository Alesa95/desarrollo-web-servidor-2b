<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('films')->insert([
            [
                'title' => 'Pulp Fiction',
                'year' => 1994,
                'duration' => 120
            ],
            [
                'title' => 'Toy Story',
                'year' => 1995,
                'duration' => 90
            ],
            [
                'title' => 'Titanic',
                'year' => 1997,
                'duration' => 130
            ]
        ]);
    }
}
