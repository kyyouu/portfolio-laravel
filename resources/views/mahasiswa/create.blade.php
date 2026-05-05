@extends('mahasiswa.layout')

@section('title', 'Tambah Mahasiswa')

@section('content')
<div class="fade-in">

    {{-- Breadcrumb --}}
    <div class="breadcrumb">
        <a href="{{ route('mahasiswa.index') }}"><i class="fas fa-users"></i> Mahasiswa</a>
        <span class="sep">/</span>
        <span class="current">Tambah Baru</span>
    </div>

    {{-- Page Header --}}
    <div class="page-header">
        <div class="page-title-group">
            <h1><i class="fas fa-user-plus" style="font-size:1.4rem;"></i> Tambah Mahasiswa</h1>
            <p>Isi form di bawah untuk mendaftarkan mahasiswa baru</p>
        </div>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-outline" id="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    {{-- Validation Errors --}}
    @if($errors->any())
    <div class="alert alert-danger fade-in">
        <i class="fas fa-exclamation-circle" style="flex-shrink:0;"></i>
        <div>
            <strong>Terdapat {{ $errors->count() }} kesalahan:</strong>
            <ul style="margin:6px 0 0 16px;font-size:.85rem;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    {{-- Form --}}
    <form method="POST" action="{{ route('mahasiswa.store') }}" id="form-create">
        @csrf

        <div class="card">
            {{-- Section Header --}}
            <div style="display:flex;align-items:center;gap:12px;margin-bottom:28px;
                        padding-bottom:20px;border-bottom:1px solid var(--gold-border);">
                <div class="stat-icon gold" style="width:42px;height:42px;font-size:17px;border-radius:10px;">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div>
                    <h3 style="color:var(--gold);font-size:1rem;font-weight:700;">Data Mahasiswa</h3>
                    <p style="color:var(--text-muted);font-size:.8rem;">Semua field bertanda * wajib diisi</p>
                </div>
            </div>

            <div class="form-grid">

                {{-- NIM --}}
                <div class="form-group">
                    <label for="nim" class="form-label">
                        <i class="fas fa-hashtag"></i> NIM <span style="color:var(--danger);">*</span>
                    </label>
                    <input type="text" name="nim" id="nim" class="form-control"
                           placeholder="Contoh: 2023010001"
                           value="{{ old('nim') }}" required>
                    @error('nim')
                        <div class="form-error"><i class="fas fa-circle-exclamation"></i> {{ $message }}</div>
                    @enderror
                </div>

                {{-- Nama --}}
                <div class="form-group">
                    <label for="nama" class="form-label">
                        <i class="fas fa-user"></i> Nama Lengkap <span style="color:var(--danger);">*</span>
                    </label>
                    <input type="text" name="nama" id="nama" class="form-control"
                           placeholder="Nama lengkap mahasiswa"
                           value="{{ old('nama') }}" required>
                    @error('nama')
                        <div class="form-error"><i class="fas fa-circle-exclamation"></i> {{ $message }}</div>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="form-group">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope"></i> Email <span style="color:var(--danger);">*</span>
                    </label>
                    <input type="email" name="email" id="email" class="form-control"
                           placeholder="contoh@email.com"
                           value="{{ old('email') }}" required>
                    @error('email')
                        <div class="form-error"><i class="fas fa-circle-exclamation"></i> {{ $message }}</div>
                    @enderror
                </div>

                {{-- EMPTY cell for grid alignment (3 columns) --}}
                <div class="form-group" style="display:none;"></div>

                {{-- Fakultas (Dropdown 1) --}}
                <div class="form-group">
                    <label for="fakultas_id" class="form-label">
                        <i class="fas fa-building-columns"></i> Fakultas <span style="color:var(--danger);">*</span>
                    </label>
                    <select id="fakultas_id" class="form-control" onchange="filterProdi(this.value)">
                        <option value="">-- Pilih Fakultas --</option>
                        @foreach($fakultas as $f)
                            <option value="{{ $f->id }}"
                                {{ old('fakultas_id') == $f->id ? 'selected' : '' }}>
                                {{ $f->nama_fakultas }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Prodi (Dropdown 2 — dinamis) --}}
                <div class="form-group">
                    <label for="prodi_id" class="form-label">
                        <i class="fas fa-book-open"></i> Program Studi <span style="color:var(--danger);">*</span>
                    </label>
                    <select name="prodi_id" id="prodi_id" class="form-control" required disabled>
                        <option value="">-- Pilih Fakultas dulu --</option>
                    </select>
                    @error('prodi_id')
                        <div class="form-error"><i class="fas fa-circle-exclamation"></i> {{ $message }}</div>
                    @enderror
                    <div id="prodi-hint" style="font-size:.78rem;color:var(--text-muted);margin-top:6px;">
                        <i class="fas fa-arrow-up"></i> Pilih Fakultas terlebih dahulu
                    </div>
                </div>

                {{-- Alamat --}}
                <div class="form-group" style="grid-column:1 / -1;">
                    <label for="alamat" class="form-label">
                        <i class="fas fa-location-dot"></i> Alamat
                    </label>
                    <textarea name="alamat" id="alamat" class="form-control" rows="3"
                              placeholder="Alamat lengkap mahasiswa...">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <div class="form-error"><i class="fas fa-circle-exclamation"></i> {{ $message }}</div>
                    @enderror
                </div>

            </div>{{-- end form-grid --}}

            {{-- Divider --}}
            <div class="divider"></div>

            {{-- Action Buttons --}}
            <div style="display:flex;gap:12px;justify-content:flex-end;">
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-outline" id="btn-cancel">
                    <i class="fas fa-times"></i> Batal
                </a>
                <button type="submit" class="btn btn-gold" id="btn-save">
                    <i class="fas fa-save"></i> Simpan Mahasiswa
                </button>
            </div>

        </div>{{-- end card --}}
    </form>
</div>
@endsection

@push('styles')
<style>
    textarea.form-control { resize: vertical; min-height: 90px; }

    select.form-control:disabled {
        opacity: 0.45;
        cursor: not-allowed;
        border-color: var(--black-5);
        background: var(--black-4);
    }
</style>
@endpush

@push('scripts')
<script>
    // Data prodi per fakultas
    const prodiData = {
        @foreach($fakultas as $f)
        "{{ $f->id }}": [
            @foreach($f->prodis as $p)
            { id: "{{ $p->id }}", nama: "{{ $p->nama_prodi }}" },
            @endforeach
        ],
        @endforeach
    };

    function filterProdi(fakultasId) {
        const prodiSelect = document.getElementById('prodi_id');
        const hint        = document.getElementById('prodi-hint');

        // Reset prodi options
        prodiSelect.innerHTML = '<option value="">-- Pilih Prodi --</option>';

        if (!fakultasId) {
            // Disable dan tampilkan hint
            prodiSelect.disabled = true;
            prodiSelect.innerHTML = '<option value="">-- Pilih Fakultas dulu --</option>';
            hint.style.display = 'block';
            hint.style.color = 'var(--text-muted)';
            return;
        }

        // Enable dropdown prodi
        prodiSelect.disabled = false;
        hint.style.display = 'none';

        const prodis = prodiData[fakultasId] || [];
        prodis.forEach(p => {
            const opt = document.createElement('option');
            opt.value       = p.id;
            opt.textContent = p.nama;
            prodiSelect.appendChild(opt);
        });
    }

    // Restore on old() value (validation fail)
    document.addEventListener('DOMContentLoaded', () => {
        const oldFakultas = "{{ old('fakultas_id') }}";
        const oldProdi    = "{{ old('prodi_id') }}";

        if (oldFakultas) {
            document.getElementById('fakultas_id').value = oldFakultas;
            filterProdi(oldFakultas);
            if (oldProdi) document.getElementById('prodi_id').value = oldProdi;
        }
        // Jika tidak ada old value, prodi tetap disabled (sudah di-set di HTML)
    });
</script>
@endpush
