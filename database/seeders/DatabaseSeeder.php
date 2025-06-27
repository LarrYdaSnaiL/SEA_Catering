<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create the default admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@seacatering.com',
            'phone_number' => '081200001111',
            'password' => Hash::make('admin123'),
            'is_admin' => true, // Set the user as an admin
        ]);

        // You can also create some regular users for testing
        User::factory(10)->create();
    }
}
