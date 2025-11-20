<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CreateWarga extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 150; $i++) {

            $jenisKelamin = $faker->randomElement(['Laki-laki', 'Perempuan']);

            DB::table('warga')->insert([
                'no_ktp'        => $faker->unique()->numerify('###############'), // 16 angka KTP
                'nama'          => $faker->name($jenisKelamin == 'Laki-laki' ? 'male' : 'female'),
                'jenis_kelamin' => $jenisKelamin,
                'agama'         => $faker->randomElement(['Islam','Kristen','Katolik','Hindu','Buddha','Konghucu']),
                'pekerjaan'     => $faker->randomElement(['Petani','Guru','Karyawan','Pedagang','Ibu Rumah Tangga','Mahasiswa','Tidak Bekerja']),
                'telp'          => $faker->phoneNumber(),
                'email'         => $faker->unique()->safeEmail(),
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }
    }
}
