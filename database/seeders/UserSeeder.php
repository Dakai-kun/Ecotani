<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'dimas',
            'email' => 'dimas@gmail.com',
            'type' => 'buyer',
            'password' => 'dimas123',
            'address' => 'dirumah',
            'locationId' => '1'
        ]);
        User::create([
            'name' => 'jannah',
            'email' => 'jannah@gmail.com',
            'type' => 'seller',
            'password' => 'jannah123',
            'address' => 'dirumah',
            'locationId' => '2'
        ]);
        User::create([
            'name' => 'kummar',
            'email' => 'kummar@gmail.com',
            'type' => 'buyer',
            'password' => 'kummar123',
            'address' => 'diluar',
            'locationId' => '1'
        ]);
    }
}
