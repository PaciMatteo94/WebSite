<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TechProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tech_profiles')->insert([
            [
                'user_id' => 1,
                'birth_date' => '1985-05-15',
                'specialization' => 'Processori',
                'center_name' => 'Nex Assistenza tecnica Milano',
                'center_address' => 'Via Torino, 58, 20123 Milano MI'

            ]
        ]);
    }
}
