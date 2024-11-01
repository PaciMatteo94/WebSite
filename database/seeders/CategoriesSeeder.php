<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Dissipatori', 'image' => 'images/cooling.jpg']);
        Category::create(['name' => 'Processori', 'image' => 'images/cpu.jpg']);
        Category::create(['name' => 'Schede-madri', 'image' => 'images/mobo.jpg']);
        Category::create(['name' => 'Memorie', 'image' => 'images/ram.jpg']);
        Category::create(['name' => 'Alimentatori', 'image' => 'images/psu.jpg']);
        Category::create(['name' => 'Schede-video', 'image' => 'images/gpu.jpg']);
        Category::create(['name' => 'Storage', 'image' => 'images/storage.jpg']);
        Category::create(['name' => 'Monitor', 'image' => 'images/monitor.jpg']);
        Category::create(['name' => 'Ventole', 'image' => 'images/fan.jpg']);
    }
}
