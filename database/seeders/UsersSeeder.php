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
                'username' => 'tecnico',
                'password' => Hash::make('tecnico'),
                'role' => 'technician',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => 'Marco',
                'surname' => 'Bianchi',
                'username' => 'staff',
                'password' => Hash::make('staff'),
                'role' => 'staff',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => 'Mario',
                'surname' => 'Rossi',
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'role' => 'admin',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ]);
    }
}
