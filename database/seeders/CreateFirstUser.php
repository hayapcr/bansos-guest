<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class CreateFirstUser extends Seeder
{
    public function run(): void
    {
        // Hapus semua user dulu
        User::truncate();

        // USER PERTAMA — role guest
        User::create([
            'name'     => 'Guest',
            'email'    => 'haya@pcr.ac.id',
            'password' => Hash::make('haya'),
            'role'     => 'guest'
        ]);

        // USER KEDUA — ADMIN ✅
        User::create([
            'name'     => 'Hana',
            'email'    => 'Hana@gmail.com',
            'password' => Hash::make('Hana123'),
            'role'     => 'admin'
        ]);

        $faker = Faker::create('id_ID');

        // Role yang tersedia
        $roles = ['guest', 'admin', 'kades'];

        // Generate 100 user
        for ($i = 1; $i <= 100; $i++) {
            User::create([
                'name'     => $faker->name(),
                'email'    => $faker->unique()->userName() . '@example.com',
                'password' => Hash::make('password123'),
                'role'     => $faker->randomElement($roles)
            ]);
        }

        // Reset unique agar aman saat seeder dijalankan ulang
        $faker->unique(true);
    }
}
