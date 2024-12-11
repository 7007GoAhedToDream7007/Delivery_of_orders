<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Maher',
            'last_name' => 'Alhalaki',
            'phone' => '0991222333',
            'profile_Image' => 'Image',
            'password' => Hash::make('1010101010'),
            'role' => 'Admin',
            'location' => 'Daraa',
        ]);
    }
}
