<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StabilimentiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stabilimenti')->insert([
            [
                'regione' => 'Lombardia',
                'nome_stabilimento' => 'Stabilimento Milano',
                'via'=> 'via marco aurelio 89',
                'mappa_url' => 'https://www.google.com/maps/d/u/0/embed?mid=14aoghcO-b2mxF-EMb1ZyZpzGZDi413s&ehbc=2E312F'
            ],
            [
                'regione' => 'Lazio',
                'nome_stabilimento' => 'Stabilimento Roma',
                'via'=> 'via marco guarnera 9',
                'mappa_url' => 'https://www.google.com/maps/d/u/0/embed?mid=1SztwtzntG0DeNL-YLUoAw-b8DP38Yd8&ehbc=2E312F'
            ],
            [
                'regione' => 'Sicilia',
                'nome_stabilimento' => 'Stabilimento Catania',
                'via'=> 'via mirko 89',
                'mappa_url' => 'https://www.google.com/maps/d/u/0/embed?mid=1dXqL4gt-Dmng6avNhZa0d3JKAatJQGo&ehbc=2E312F'
            ]
        ]);
    }
}
