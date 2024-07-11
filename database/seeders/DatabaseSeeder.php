<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'fname' => 'Admin',
            'mname' => 'Admin',
            'lname' => 'Admin',
            'gender' => '1',
            'bdate' => '2024-07-11',
            'pnumber' => '09634567896',
            'province' => 'Bohol',
            'municipality' => 'Trinidad',
            'village' => 'Poblacion',
            'street' => 'P-6 Panab-an',
            'username' => 'admin12',
            'password' => Hash::make('admin12'),
            'user_position' => '1',
        ]);

        // User::factory(10)->create();
    }
}
