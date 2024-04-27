<?php

namespace Database\Seeders;

use App\Models\Cama;
use Illuminate\Database\Seeder;

class CamasSeeder extends Seeder
{
    public function run(): void
    {
        $camas = [];
        for ($i = 0; $i < 19; $i++) {
            $camas[] =
                [
                    'modulo' => 'masculino',
                    'emergencia' => false,
                    'asignada' => false,
                ];
        }
        $camas[] =
            [
                'modulo' => 'masculino',
                'emergencia' => true,
                'asignada' => false,
            ];
        for ($i = 0; $i < 19; $i++) {
            $camas[] =
                [
                    'modulo' => 'femenino',
                    'emergencia' => false,
                    'asignada' => false,
                ];
        }
        $camas[] =
            [
                'modulo' => 'femenino',
                'emergencia' => true,
                'asignada' => false,
            ];

        foreach ($camas as $cama) {
            Cama::create($cama);
        }
    }
}
