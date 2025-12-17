<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VerifikasiLapangan;
use App\Models\PendaftarBantuan;
use Faker\Factory as Faker;

class CreateVerifikasiLapangan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VerifikasiLapangan::truncate();

        $faker = Faker::create('id_ID');

        // Daftar catatan bertema bantuan sosial (realistis)
        $catatanList = [
            "Rumah masih semi permanen dan membutuhkan perbaikan.",
            "Kondisi ekonomi keluarga kurang stabil, penghasilan tidak menentu.",
            "Memiliki 3 tanggungan dan belum mendapat bantuan dari program lain.",
            "Kondisi rumah layak huni namun pendapatan keluarga sangat rendah.",
            "Pendaftar tinggal bersama orang tua yang sudah lanjut usia.",
            "Akses air bersih kurang memadai dan sanitasi buruk.",
            "Sumber penghasilan utama hanya dari kerja serabutan.",
            "Keluarga termasuk kategori miskin berdasarkan hasil survei.",
            "Rumah berada di daerah rawan banjir dan perlu perhatian khusus.",
            "Terdapat anggota keluarga dengan penyakit menahun.",
            "Pendaftar dinilai layak menerima bantuan berdasarkan observasi lapangan.",
            "Kondisi rumah sudah sangat tua dan membutuhkan renovasi.",
            "Belum pernah menerima bantuan sosial sebelumnya.",
            "Kondisi ekonomi cukup baik namun memiliki banyak tanggungan.",
            "Pendaftar tinggal di kontrakan kecil dan bekerja sebagai buruh harian.",
            "Kebutuhan dasar sering tidak terpenuhi karena penghasilan rendah.",
            "Kondisi dapur dan kamar mandi tidak layak pakai.",
            "Kondisi rumah bersih namun pendapatan keluarga sangat minim.",
            "Pendaftar aktif mengikuti kegiatan masyarakat dan dinilai membutuhkan bantuan.",
            "Hasil verifikasi menunjukkan bahwa pendaftar masuk kategori prioritas."
        ];

        $pendaftarIds = PendaftarBantuan::pluck('pendaftar_id')->toArray();

        if (empty($pendaftarIds)) {
            $this->command->warn("⚠️ Tabel pendaftar_bantuan masih kosong. Jalankan seeder pendaftar dulu.");
            return;
        }

        for ($i = 1; $i <= 100; $i++) {
            VerifikasiLapangan::create([
                'pendaftar_id' => $faker->randomElement($pendaftarIds),
                'petugas'      => $faker->name(),
                'tanggal'      => $faker->dateTimeBetween('-60 days', 'now'),
                'catatan'      => $faker->randomElement($catatanList),
                'skor'         => rand(0, 100),
            ]);
        }
    }
}
