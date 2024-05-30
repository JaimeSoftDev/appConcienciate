<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        $rolAdmin = Role::create(['name' => 'admin']);
        $rolEmpleado = Role::create(['name' => 'empleado']);
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
        User::factory(10)->create()->each(function ($user) use ($rolEmpleado) {
            $user->assignRole($rolEmpleado);
        });
    }
}
