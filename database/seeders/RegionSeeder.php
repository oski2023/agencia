<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('regiones')->insert([
            ['nombre' => 'America del Sur'],
            ['nombre' => 'America Central'],
            ['nombre' => 'Caribe y Mexico'],
            ['nombre' => 'America del Norte'],
            ['nombre' => 'Europa Occidental'],
            ['nombre' => 'Europa del Este'],
            ['nombre' => 'Asia'],
            ['nombre' => 'Oceania']
        ]);
    }
}
