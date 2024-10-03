<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssistenceCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('assistence_centers')->insert([
            [
                'region' => 'Molise',
                'name' => 'NEX Service Molise',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Basilicata',
                'name' => 'NEX Tech Center Basilicata',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Umbria',
                'name' => 'NEX Assistance Hub Umbria',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Valle d\'Aosta',
                'name' => 'NEX Repair Point Aosta',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Trentino-Alto Adige',
                'name' => 'NEX Service Trentino',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Marche',
                'name' => 'NEX Service Ancona',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Marche',
                'name' => 'NEX Assistance Pesaro',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Abruzzo',
                'name' => 'NEX Tech Hub Pescara',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Abruzzo',
                'name' => 'NEX Repair Center L\'Aquila',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Friuli Venezia Giulia',
                'name' => 'NEX Assistance Trieste',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Friuli Venezia Giulia',
                'name' => 'NEX Service Udine',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Liguria',
                'name' => 'NEX Repair Station Genova',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Liguria',
                'name' => 'NEX Service Savona',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Sardegna',
                'name' => 'NEX Assistance Cagliari',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Sardegna',
                'name' => 'NEX Tech Center Sassari',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Lombardia',
                'name' => 'NEX Service Milano',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Lombardia',
                'name' => 'NEX Assistance Bergamo',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Lombardia',
                'name' => 'NEX Tech Hub Brescia',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Lazio',
                'name' => 'NEX Repair Hub Roma',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Lazio',
                'name' => 'NEX Service Viterbo',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Lazio',
                'name' => 'NEX Tech Center Latina',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Campania',
                'name' => 'NEX Assistance Napoli',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Campania',
                'name' => 'NEX Service Salerno',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Campania',
                'name' => 'NEX Tech Hub Caserta',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Piemonte',
                'name' => 'NEX Service Torino',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Piemonte',
                'name' => 'NEX Repair Center Novara',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Piemonte',
                'name' => 'NEX Assistance Alessandria',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Sicilia',
                'name' => 'NEX Tech Hub Palermo',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Sicilia',
                'name' => 'NEX Assistance Catania',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Sicilia',
                'name' => 'NEX Repair Center Messina',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Veneto',
                'name' => 'NEX Service Venezia',
                'street'=> '',
                'map_url' => ''
            ],
            
            [
                'region' => 'Veneto',
                'name' => 'NEX Tech Center Verona',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Veneto',
                'name' => 'NEX Assistance Padova',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Emilia-Romagna',
                'name' => 'NEX Repair Center Bologna',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Emilia-Romagna',
                'name' => 'NEX Service Modena',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Emilia-Romagna',
                'name' => 'NEX Assistance Rimini',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Toscana',
                'name' => 'NEX Service Firenze',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Toscana',
                'name' => 'NEX Assistance Pisa',
                'street'=> '',
                'map_url' => ''
            ],
            [
                'region' => 'Toscana',
                'name' => 'NEX Tech Hub Livorno',
                'street'=> '',
                'map_url' => ''
            ]
            
        ]);
    }
}
