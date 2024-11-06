<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Alex',
                'surname' => 'Verdi',
                'username' => 'tecntecn',
                'password' => Hash::make('TdGBTdGB'),
                'role' => 'technician',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => 'Marco',
                'surname' => 'Bianchi',
                'username' => 'staffstaff',
                'password' => Hash::make('TdGBTdGB'),
                'role' => 'staff',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => 'Mario',
                'surname' => 'Rossi',
                'username' => 'adminadmin',
                'password' => Hash::make('TdGBTdGB'),
                'role' => 'admin',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ]);
    }
}
