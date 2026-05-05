<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class portfoliocontroller extends Controller
{
    /**
     * Tampilkan halaman portfolio utama.
     */
    public function index()
    {
        // ── Data Profil ──────────────────────────────────────
        $profil = [
            'nama'       => 'Diky Ardiyansyah',
            'role'       => 'Web Developer & Software Engineer',
            'email'      => 'dikyardiyansyah58@gmail.com',
            'github'     => 'https://github.com/dikya',
            'linkedin'   => 'https://linkedin.com/in/dikya',
            'instagram'  => 'https://instagram.com/dikya',
            'bio'        => 'Passionate developer yang suka membangun aplikasi web modern, clean, dan performant.',
        ];

        // ── Data Skills ───────────────────────────────────────
        $skills = [
            'Frontend' => [
                ['nama' => 'HTML & CSS',    'level' => 95],
                ['nama' => 'JavaScript',    'level' => 88],
                ['nama' => 'Vue.js / React','level' => 80],
                ['nama' => 'Tailwind CSS',  'level' => 85],
            ],
            'Backend' => [
                ['nama' => 'PHP',           'level' => 90],
                ['nama' => 'Laravel',       'level' => 87],
                ['nama' => 'MySQL',         'level' => 82],
                ['nama' => 'REST API',      'level' => 78],
            ],
            'Tools' => [
                ['nama' => 'Git & GitHub',  'level' => 90],
                ['nama' => 'Docker',        'level' => 65],
                ['nama' => 'Linux',         'level' => 72],
                ['nama' => 'Figma',         'level' => 70],
            ],
        ];

        // ── Data Proyek ───────────────────────────────────────
        $projects = [
            [
                'judul'       => 'Portfolio Website',
                'deskripsi'   => 'Website portfolio personal dengan desain modern, animasi partikel, dan panel navigasi.',
                'emoji'       => '🌐',
                'tags'        => ['Laravel', 'Blade', 'CSS3', 'JS'],
                'demo'        => '#',
                'github'      => '#',
                'warna'       => 'rgba(108,92,231,0.15)',
            ],
            [
                'judul'       => 'Sistem Manajemen Mahasiswa',
                'deskripsi'   => 'CRUD data mahasiswa dengan validasi, pagination, dan autentikasi berbasis Laravel.',
                'emoji'       => '🎓',
                'tags'        => ['Laravel', 'MySQL', 'Bootstrap'],
                'demo'        => '#',
                'github'      => '#',
                'warna'       => 'rgba(0,206,201,0.15)',
            ],
            [
                'judul'       => 'Chat Application',
                'deskripsi'   => 'Aplikasi chat real-time multi-protokol menggunakan Python (TCP & UDP) dengan GUI.',
                'emoji'       => '💬',
                'tags'        => ['Python', 'TCP', 'UDP', 'Threading'],
                'demo'        => '#',
                'github'      => '#',
                'warna'       => 'rgba(253,121,168,0.15)',
            ],
        ];

        // ── Data Pendidikan ───────────────────────────────────
        $pendidikan = [
            [
                'tahun'       => '2023 – Sekarang',
                'institusi'   => 'Universitas Muhammdiyah Cirebon',
                'jurusan'     => 'Teknik Informatika',
                'deskripsi'   => 'Fokus pada pengembangan web, jaringan komputer, dan rekayasa perangkat lunak.',
            ],
            [
                'tahun'       => '2019 – 2023',
                'institusi'   => 'SMK BUDI TRESNA MUHAMMADIYAH CIREBON',
                'jurusan'     => 'TEKNIK KENDARAAN RINGAN',
                'deskripsi'   => '',
            ],
        ];

        // ── Statistik Singkat ─────────────────────────────────
        $stats = [
            ['angka' => '3+',  'label' => 'Years Experience'],
            ['angka' => '20+', 'label' => 'Projects Done'],
            ['angka' => '10+', 'label' => 'Technologies'],
        ];

        return view('portfolio', compact(
            'profil',
            'skills',
            'projects',
            'pendidikan',
            'stats'
        ));
    }

    /**
     * (Opsional) Kirim pesan kontak via POST.
     */
    public function sendContact(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'message' => 'required|string|max:2000',
        ]);

        // TODO: Kirim email atau simpan ke database
        // Mail::to('diky@example.com')->send(new ContactMail($request->all()));

        return redirect()->route('portfolio')->with('success', 'Pesan berhasil dikirim!');
    }
}
