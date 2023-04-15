<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        User::create([
            'full_name' => 'Alejandro',
            'email' => 'alejandrojddd@gmail.com',
            'password' => Hash::make('12345Ale'),
        ])->assignRole('Admin');

        User::create([
            'full_name' => 'Alejandro2',
            'email' => 'alejandrojddd2@gmail.com',
            'password' => Hash::make('12345Ale'),
        ])->assignRole('Author');

        User::factory(10)->create();

    }
}
