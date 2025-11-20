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
        // Hapus user lama (opsional tapi aman untuk dev)
        User::truncate();

        // User pertama tetap
        User::create([
            'name' => 'Guest',
            'email' => 'haya@pcr.ac.id',
            'password' => Hash::make('haya')
        ]);

        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 100; $i++) {
            User::create([
                'name'     => $faker->name(),
                'email'    => $faker->unique()->userName() . '@example.com',
                'password' => Hash::make('password123')
            ]);
        }

        // Reset unique cache agar aman jika dipanggil ulang
        $faker->unique(true);
    }
}
