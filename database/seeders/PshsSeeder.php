<?php

namespace Database\Seeders;

use App\Models\Psh;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PshsSeeder extends Seeder
{
    public function run(): void
    {
        Psh::factory(10)->create();
    }
}
