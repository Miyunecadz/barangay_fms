<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Barangay Captain',
            'username' => 'captain',
            'password' => Hash::make('1234'),
            'role' => 'captain'
        ]);

        \App\Models\User::create([
            'name' => 'Secretary',
            'username' => 'secretary',
            'password' => Hash::make('1234'),
            'role' => 'secretary'
        ]);

        \App\Models\User::create([
            'name' => 'BHW',
            'username' => 'bhw',
            'password' => Hash::make('1234'),
            'role'  => 'bhw'
        ]);

        // $this->call([
        //     ResidentSeeder::class
        // ]);
    }
}
