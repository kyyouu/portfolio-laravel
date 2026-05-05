<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Tampilkan daftar mahasiswa + search & filter
     */
    public function index(Request $request)
    {
        $query = Mahasiswa::with('prodi.fakultas');

        if ($request->filled('search')) {
            $q = $request->search;
            $query->where(function ($sub) use ($q) {
                $sub->where('nama', 'like', "%{$q}%")
                    ->orWhere('nim',  'like', "%{$q}%")
                    ->orWhere('email','like', "%{$q}%");
            });
        }

        if ($request->filled('fakultas_id')) {
            $query->whereHas('prodi', function ($sub) use ($request) {
                $sub->where('fakultas_id', $request->fakultas_id);
            });
        }

        if ($request->filled('prodi_id')) {
            $query->where('prodi_id', $request->prodi_id);
        }

        $mahasiswas = $query->latest()->paginate(10)->withQueryString();
        $fakultas   = Fakultas::with('prodis')->orderBy('id')->get();

        $stats = [
            'total'   => Mahasiswa::count(),
            'fakultas'=> Fakultas::count(),
            'prodi'   => Prodi::count(),
        ];

        return view('mahasiswa.index', compact('mahasiswas', 'fakultas', 'stats'));
    }

    /**
     * Form tambah mahasiswa
     */
    public function create()
    {
        $fakultas = Fakultas::with('prodis')->orderBy('id')->get();
        return view('mahasiswa.create', compact('fakultas'));
    }

    /**
     * Simpan mahasiswa baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim'      => 'required|string|max:20|unique:mahasiswas,nim',
            'nama'     => 'required|string|max:100',
            'email'    => 'required|email|max:100|unique:mahasiswas,email',
            'prodi_id' => 'required|exists:prodis,id',
            'alamat'   => 'nullable|string',
        ], [
            'nim.required'   => 'NIM wajib diisi.',
            'nim.unique'     => 'NIM sudah terdaftar.',
            'nama.required'  => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.unique'   => 'Email sudah digunakan.',
            'prodi_id.required' => 'Program Studi wajib dipilih.',
        ]);

        Mahasiswa::create($request->only('nim','nama','email','prodi_id','alamat'));

        return redirect()->route('mahasiswa.index')
            ->with('success', "Mahasiswa {$request->nama} berhasil ditambahkan! 🎓");
    }

    /**
     * Detail mahasiswa
     */
    public function show(Mahasiswa $mahasiswa)
    {
        $mahasiswa->load('prodi.fakultas');
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Form edit mahasiswa
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $fakultas = Fakultas::with('prodis')->orderBy('id')->get();
        return view('mahasiswa.edit', compact('mahasiswa', 'fakultas'));
    }

    /**
     * Update data mahasiswa
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim'      => 'required|string|max:20|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama'     => 'required|string|max:100',
            'email'    => 'required|email|max:100|unique:mahasiswas,email,' . $mahasiswa->id,
            'prodi_id' => 'required|exists:prodis,id',
            'alamat'   => 'nullable|string',
        ]);

        $mahasiswa->update($request->only('nim','nama','email','prodi_id','alamat'));

        return redirect()->route('mahasiswa.index')
            ->with('success', "Data {$mahasiswa->nama} berhasil diperbarui! ✏️");
    }

    /**
     * Hapus mahasiswa
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $nama = $mahasiswa->nama;
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
            ->with('success', "Mahasiswa {$nama} berhasil dihapus! 🗑️");
    }
}