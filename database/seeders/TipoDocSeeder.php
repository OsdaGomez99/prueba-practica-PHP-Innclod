<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoDoc;

class TipoDocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        TipoDoc::create([
            'TIP_ID' => 1,
            'TIP_NOMBRE' => 'Instructivo',
            'TIP_PREFIJO' => 'INS',
        ]);

        TipoDoc::create([
            'TIP_ID' => 2,
            'TIP_NOMBRE' => 'Acta',
            'TIP_PREFIJO' => 'ACT',
        ]);

        TipoDoc::create([
            'TIP_ID' => 3,
            'TIP_NOMBRE' => 'Memorándum',
            'TIP_PREFIJO' => 'MEMO',
        ]);

        TipoDoc::create([
            'TIP_ID' => 4,
            'TIP_NOMBRE' => 'Informe',
            'TIP_PREFIJO' => 'INF',
        ]);

        TipoDoc::create([
            'TIP_ID' => 5,
            'TIP_NOMBRE' => 'Catálogo',
            'TIP_PREFIJO' => 'CAT',
        ]);
    }
}
