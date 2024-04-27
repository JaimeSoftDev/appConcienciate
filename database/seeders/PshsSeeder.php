<?php

namespace Database\Seeders;

use App\Models\Psh;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PshsSeeder extends Seeder
{
    public function run(): void
    {
        $pshs = [
            [
                'nombre' => 'Antonio',
                'apellido1' => 'García',
                'apellido2' => 'García',
                'dni' => '11111111A',
                'sexo' => 'hombre',
                'estado_civil' => 'soltero',
            ],
            [
                'nombre' => 'José',
                'apellido1' => 'Martínez',
                'apellido2' => 'Martínez',
                'dni' => '11111111B',
                'sexo' => 'hombre',
                'estado_civil' => 'casado',
            ],
        ];
        foreach ($pshs as $psh) {
            Psh::create($psh);
        }
    }
}
