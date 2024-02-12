<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            ['username' => Str::random(10),
            'email' => 'pasien@example.com',
            'password' => Hash::make('123'),
            'noHp' => '0813231231232',
            'type' => 'pasien'] ,

            ['username' => Str::random(10),
            'email' => 'pakar@example.com',
            'password' => Hash::make('123'),
            'noHp' => '0813231231233',
            'type' => 'pakar'] ,

            ['username' => Str::random(10),
            'email' => 'admin@example.com',
            'password' => Hash::make('123'),
            'noHp' => '0813231231231',
            'type' => 'admin'] ,

        ]);
    }
}
