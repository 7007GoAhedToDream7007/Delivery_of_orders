<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Db::table('users')->insert([
            'first_name' => 'raghad',
            'last_name' => 'mh',
            'phone' => '0123456789',
            'profile_Image' => 'Image',
            'password' => Hash::make('123456789'),
            'role' => 'user',
            'location' => 'Damascus',
        ]);
        
        Db::table('users')->insert([
            'first_name' => 'raghad2',
            'last_name' => 'mh',
            'phone' => '9876543210',
            'profile_Image' => 'Image',
            'password' => Hash::make('987654321'),
            'role' => 'user',
            'location' => 'Damascus',
        ]);
        
    }
}
