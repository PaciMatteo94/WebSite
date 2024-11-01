<?php

namespace Database\Seeders;

use App\Models\Malfunction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class MalfunctionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Malfunction::factory()->count(50)->create();
    }
}
