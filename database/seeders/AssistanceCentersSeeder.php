<?php

namespace Database\Seeders;

use App\Models\AssistanceCenter;
use App\Models\Region;
use Illuminate\Database\Seeder;

class AssistanceCentersSeeder extends Seeder
{
    public function run(): void
    {
        $acc = [
            [
                'region' => 'Molise',
                'name' => 'NEX Service Molise',
                'street' => '',
            ],
            [
                'region' => 'Basilicata',
                'name' => 'NEX Tech Center Basilicata',
                'street' => '',
            ],
            [
                'region' => 'Umbria',
                'name' => 'NEX Assistance Hub Umbria',
                'street' => '',
            ],
            [
                'region' => 'Valle d\'Aosta',
                'name' => 'NEX Repair Point Aosta',
                'street' => '',
            ],
            [
                'region' => 'Trentino-Alto Adige',
                'name' => 'NEX Service Trentino',
                'street' => '',
            ],
            [
                'region' => 'Marche',
                'name' => 'NEX Service Ancona',
                'street' => '',
            ],
            [
                'region' => 'Marche',
                'name' => 'NEX Assistance Pesaro',
                'street' => '',
            ],
            [
                'region' => 'Abruzzo',
                'name' => 'NEX Tech Hub Pescara',
                'street' => '',
            ],
            [
                'region' => 'Abruzzo',
                'name' => 'NEX Repair Center L\'Aquila',
                'street' => '',
            ],
            [
                'region' => 'Friuli Venezia Giulia',
                'name' => 'NEX Assistance Trieste',
                'street' => '',
            ],
            [
                'region' => 'Friuli Venezia Giulia',
                'name' => 'NEX Service Udine',
                'street' => '',
            ],
            [
                'region' => 'Liguria',
                'name' => 'NEX Repair Station Genova',
                'street' => '',
            ],
            [
                'region' => 'Liguria',
                'name' => 'NEX Service Savona',
                'street' => '',
            ],
            [
                'region' => 'Sardegna',
                'name' => 'NEX Assistance Cagliari',
                'street' => '',
            ],
            [
                'region' => 'Sardegna',
                'name' => 'NEX Tech Center Sassari',
                'street' => '',
            ],
            [
                'region' => 'Lombardia',
                'name' => 'NEX Service Milano',
                'street' => '',
            ],
            [
                'region' => 'Lombardia',
                'name' => 'NEX Assistance Bergamo',
                'street' => '',
            ],
            [
                'region' => 'Lombardia',
                'name' => 'NEX Tech Hub Brescia',
                'street' => '',
            ],
            [
                'region' => 'Lazio',
                'name' => 'NEX Repair Hub Roma',
                'street' => '',
                'lat' => 42.07153225,
                'long' => 12.37123038
            ],
            [
                'region' => 'Lazio',
                'name' => 'NEX Service Viterbo',
                'street' => '',
            ],
            [
                'region' => 'Lazio',
                'name' => 'NEX Tech Center Latina',
                'street' => '',
            ],
            [
                'region' => 'Campania',
                'name' => 'NEX Assistance Napoli',
                'street' => '',
            ],
            [
                'region' => 'Campania',
                'name' => 'NEX Service Salerno',
                'street' => '',
            ],
            [
                'region' => 'Campania',
                'name' => 'NEX Tech Hub Caserta',
                'street' => '',
            ],
            [
                'region' => 'Piemonte',
                'name' => 'NEX Service Torino',
                'street' => '',
            ],
            [
                'region' => 'Piemonte',
                'name' => 'NEX Repair Center Novara',
                'street' => '',
            ],
            [
                'region' => 'Piemonte',
                'name' => 'NEX Assistance Alessandria',
                'street' => '',
            ],
            [
                'region' => 'Sicilia',
                'name' => 'NEX Tech Hub Palermo',
                'street' => '',
            ],
            [
                'region' => 'Sicilia',
                'name' => 'NEX Assistance Catania',
                'street' => '',
            ],
            [
                'region' => 'Sicilia',
                'name' => 'NEX Repair Center Messina',
                'street' => '',
            ],
            [
                'region' => 'Veneto',
                'name' => 'NEX Service Venezia',
                'street' => '',
            ],

            [
                'region' => 'Veneto',
                'name' => 'NEX Tech Center Verona',
                'street' => '',
            ],
            [
                'region' => 'Veneto',
                'name' => 'NEX Assistance Padova',
                'street' => '',
            ],
            [
                'region' => 'Emilia-Romagna',
                'name' => 'NEX Repair Center Bologna',
                'street' => '',
            ],
            [
                'region' => 'Emilia-Romagna',
                'name' => 'NEX Service Modena',
                'street' => '',
            ],
            [
                'region' => 'Emilia-Romagna',
                'name' => 'NEX Assistance Rimini',
                'street' => '',
            ],
            [
                'region' => 'Toscana',
                'name' => 'NEX Service Firenze',
                'street' => '',
            ],
            [
                'region' => 'Toscana',
                'name' => 'NEX Assistance Pisa',
                'street' => '',
            ],
            [
                'region' => 'Toscana',
                'name' => 'NEX Tech Hub Livorno',
                'street' => '',
            ]

        ];

        foreach ($acc as $ac) {
            $ac['region_id'] = Region::where('name', $ac['region'])?->first()?->id ?? null;
            AssistanceCenter::create($ac);
        }
    }
}
