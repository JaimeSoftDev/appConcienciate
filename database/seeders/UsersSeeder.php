<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Role;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        $rolAdmin = app(Role::class)->create(['name' => 'admin']);
        $rolEmpleado = app(Role::class)->create(['name' => 'empleado']);
        $usuarioAdmin =
            [
                'nombre' => 'Jaime',
                'apellido1' => 'Maciá',
                'apellido2' => 'Mora',
                'email' => 'jaime.cbme.98@gmail.com',
                'password' => 'password',
                'dni' => '74386548V',
            ];
        $user = User::create($usuarioAdmin);
        $user->assignRole($rolAdmin);
        $usuarioEmpleado =
            [
                'nombre' => 'Santiago',
                'apellido1' => 'Molina',
                'apellido2' => 'Maciá',
                'email' => 'santiago.cbme.98@gmail.com',
                'password' => 'password',
                'dni' => '74386549V',
            ];
        $userEmpleado = User::create($usuarioEmpleado);
        $userEmpleado->assignRole($rolEmpleado);
        User::factory(10)->create()->each(function ($user) use ($rolEmpleado) {
            $user->assignRole($rolEmpleado);
        });
    }
}
