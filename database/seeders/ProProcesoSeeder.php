<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProProceso;

class ProProcesoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        ProProceso::create([
            'PRO_ID' => 1,
            'PRO_NOMBRE' => 'Ingeniería',
            'PRO_PREFIJO' => 'ING',
        ]);

        ProProceso::create([
            'PRO_ID' => 2,
            'PRO_NOMBRE' => 'Matemáticas',
            'PRO_PREFIJO' => 'MAT',
        ]);

        ProProceso::create([
            'PRO_ID' => 3,
            'PRO_NOMBRE' => 'Diseño',
            'PRO_PREFIJO' => 'DSÑ',
        ]);

        ProProceso::create([
            'PRO_ID' => 4,
            'PRO_NOMBRE' => 'Repostería',
            'PRO_PREFIJO' => 'REPOS',
        ]);

        ProProceso::create([
            'PRO_ID' => 5,
            'PRO_NOMBRE' => 'Arquitectura',
            'PRO_PREFIJO' => 'ARQ',
        ]);
    }
}
