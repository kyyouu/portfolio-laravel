<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fakultas;
use App\Models\Prodi;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        // ── INSERT DATA FAKULTAS ──────────────────────────────
        $fakultasData = [
            ['id' => 1, 'nama_fakultas' => 'Fakultas Ekonomi dan Bisnis'],
            ['id' => 2, 'nama_fakultas' => 'Fakultas Ilmu Sosial dan Politik'],
            ['id' => 3, 'nama_fakultas' => 'Fakultas Teknik'],
            ['id' => 4, 'nama_fakultas' => 'Fakultas Keguruan dan Ilmu Pendidikan'],
            ['id' => 5, 'nama_fakultas' => 'Fakultas Hukum'],
            ['id' => 6, 'nama_fakultas' => 'Fakultas Ilmu Kesehatan'],
            ['id' => 7, 'nama_fakultas' => 'Fakultas Agama Islam'],
        ];

        foreach ($fakultasData as $f) {
            Fakultas::firstOrCreate(['id' => $f['id']], ['nama_fakultas' => $f['nama_fakultas']]);
        }

        // ── INSERT DATA PRODI ─────────────────────────────────
        $prodiData = [
            // Fakultas Ekonomi dan Bisnis
            ['nama_prodi' => 'S1 Akuntansi',                   'fakultas_id' => 1],
            ['nama_prodi' => 'S1 Manajemen',                   'fakultas_id' => 1],
            // Fakultas Ilmu Sosial dan Politik
            ['nama_prodi' => 'D3 Hubungan Masyarakat',         'fakultas_id' => 2],
            ['nama_prodi' => 'S1 Ilmu Komunikasi',             'fakultas_id' => 2],
            ['nama_prodi' => 'S1 Ilmu Pemerintahan',           'fakultas_id' => 2],
            // Fakultas Teknik
            ['nama_prodi' => 'D3 Teknik Informatika',          'fakultas_id' => 3],
            ['nama_prodi' => 'S1 Teknik Industri',             'fakultas_id' => 3],
            ['nama_prodi' => 'S1 Teknik Informatika',          'fakultas_id' => 3],
            ['nama_prodi' => 'S1 Peternakan',                  'fakultas_id' => 3],
            // Fakultas Keguruan dan Ilmu Pendidikan
            ['nama_prodi' => 'S1 PG-PAUD',                     'fakultas_id' => 4],
            ['nama_prodi' => 'S1 PGSD',                        'fakultas_id' => 4],
            ['nama_prodi' => 'S1 Pendidikan Bahasa Inggris',   'fakultas_id' => 4],
            ['nama_prodi' => 'S1 Pendidikan IPA',              'fakultas_id' => 4],
            ['nama_prodi' => 'S1 Pendidikan Kimia',            'fakultas_id' => 4],
            ['nama_prodi' => 'S1 Pendidikan Matematika',       'fakultas_id' => 4],
            // Fakultas Hukum
            ['nama_prodi' => 'S1 Ilmu Hukum',                  'fakultas_id' => 5],
            // Fakultas Ilmu Kesehatan
            ['nama_prodi' => 'S1 Ilmu Keperawatan',            'fakultas_id' => 6],
            ['nama_prodi' => 'S1 Gizi',                        'fakultas_id' => 6],
            ['nama_prodi' => 'S1 Ilmu Keolahragaan',           'fakultas_id' => 6],
            ['nama_prodi' => 'Profesi Ners A',                  'fakultas_id' => 6],
            ['nama_prodi' => 'Profesi Ners B',                  'fakultas_id' => 6],
            // Fakultas Agama Islam
            ['nama_prodi' => 'S1 Ilmu Al-Quran dan Tafsir',   'fakultas_id' => 7],
            ['nama_prodi' => 'S1 Tasawuf dan Psikoterapi',     'fakultas_id' => 7],
        ];

        foreach ($prodiData as $p) {
            Prodi::firstOrCreate(
                ['nama_prodi' => $p['nama_prodi'], 'fakultas_id' => $p['fakultas_id']],
                $p
            );
        }
    }
}
