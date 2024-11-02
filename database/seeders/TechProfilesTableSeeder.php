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
                'specialization' => 'cpu',
                'center_name' => 'centro marte',
                'center_address' => 'gaetano properzi 332'

            ]
        ]);
    }
}
