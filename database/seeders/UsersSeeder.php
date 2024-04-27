<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        $usuarios = [
            [
                'nombre' => 'Jaime',
                'apellido1' => 'Maciá',
                'apellido2' => 'Mora',
                'email' => 'jaime.cbme.98@gmail.com',
                'password' => 'password',
                'dni' => '74386548V',
            ]
        ];
        foreach ($usuarios as $usuario) {
            User::create($usuario);
        }
    }
}
