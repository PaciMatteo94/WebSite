<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{

    public function run(): void
    {
        $regions = [
            [
                'name' => 'Lazio',
                'lat' => 0,
                'long' => 0,
                'zoom' => 5
            ],
            [
                'name' => 'Marche',
                'lat' => 2,
                'long' => 2,
                'zoom' => 6
            ]
        ];

        foreach ($regions as $region) {
            Region::create($region);
        }
    }
}
