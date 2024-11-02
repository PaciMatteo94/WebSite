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
        Category::create(['name' => 'Dissipatori', 'image' => 'images/Categorie/dissipatori.jpg']);
        Category::create(['name' => 'Processori', 'image' => 'images/Categorie/processori.jpg']);
        Category::create(['name' => 'Schede-madri', 'image' => 'images/Categorie/schede madri.jpg']);
        Category::create(['name' => 'Memorie', 'image' => 'images/Categorie/memorie.jpg']);
        Category::create(['name' => 'Alimentatori', 'image' => 'images/Categorie/alimentatori.jpg']);
        Category::create(['name' => 'Schede-video', 'image' => 'images/Categorie/schede video.jpg']);
        Category::create(['name' => 'Storage', 'image' => 'images/Categorie/storage.jpg']);
        Category::create(['name' => 'Monitor', 'image' => 'images/Categorie/monitor.jpg']);
        Category::create(['name' => 'Ventole', 'image' => 'images/Categorie/ventole.jpg']);
    }
}
