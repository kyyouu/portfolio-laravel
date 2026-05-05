@extends('mahasiswa.layout')

@section('title', 'Edit — ' . $mahasiswa->nama)

@section('content')
<div class="fade-in">

    {{-- Breadcrumb --}}
    <div class="breadcrumb">
        <a href="{{ route('mahasiswa.index') }}"><i class="fas fa-users"></i> Mahasiswa</a>
        <span class="sep">/</span>
        <a href="{{ route('mahasiswa.show', $mahasiswa->id) }}">{{ $mahasiswa->nama }}</a>
        <span class="sep">/</span>
        <span class="current">Edit</span>
    </div>

    {{-- Page Header --}}
    <div class="page-header">
        <div class="page-title-group">
            <h1><i class="fas fa-pen-to-square" style="font-size:1.4rem;"></i> Edit Mahasiswa</h1>
            <p>Perbarui data <strong style="color:var(--gold);">{{ $mahasiswa->nama }}</strong></p>
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
    <form method="POST" action="{{ route('mahasiswa.update', $mahasiswa->id) }}" id="form-edit">
        @csrf
        @method('PUT')

        <div class="card">
            {{-- Section Header --}}
            <div style="display:flex;align-items:center;gap:12px;margin-bottom:28px;
                        padding-bottom:20px;border-bottom:1px solid var(--gold-border);">
                <div class="stat-icon gold" style="width:42px;height:42px;font-size:17px;border-radius:10px;">
                    <i class="fas fa-user-pen"></i>
                </div>
                <div>
                    <h3 style="color:var(--gold);font-size:1rem;font-weight:700;">Edit Data Mahasiswa</h3>
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
                           value="{{ old('nim', $mahasiswa->nim) }}" required>
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
                           value="{{ old('nama', $mahasiswa->nama) }}" required>
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
                           value="{{ old('email', $mahasiswa->email) }}" required>
                    @error('email')
                        <div class="form-error"><i class="fas fa-circle-exclamation"></i> {{ $message }}</div>
                    @enderror
                </div>

                {{-- Fakultas (Dropdown 1) --}}
                <div class="form-group">
                    <label for="fakultas_id" class="form-label">
                        <i class="fas fa-building-columns"></i> Fakultas <span style="color:var(--danger);">*</span>
                    </label>
                    <select id="fakultas_id" class="form-control" onchange="filterProdi(this.value)">
                        <option value="">-- Pilih Fakultas --</option>
                        @foreach($fakultas as $f)
                            <option value="{{ $f->id }}"
                                {{ (old('fakultas_id', $mahasiswa->prodi->fakultas_id ?? '') == $f->id) ? 'selected' : '' }}>
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
                    <select name="prodi_id" id="prodi_id" class="form-control" required>
                        <option value="">-- Pilih Prodi --</option>
                        @foreach($fakultas as $f)
                            @foreach($f->prodis as $p)
                                <option value="{{ $p->id }}"
                                        data-fakultas="{{ $f->id }}"
                                        {{ old('prodi_id', $mahasiswa->prodi_id) == $p->id ? 'selected' : '' }}>
                                    {{ $p->nama_prodi }}
                                </option>
                            @endforeach
                        @endforeach
                    </select>
                    @error('prodi_id')
                        <div class="form-error"><i class="fas fa-circle-exclamation"></i> {{ $message }}</div>
                    @enderror
                </div>

                {{-- Alamat --}}
                <div class="form-group" style="grid-column:1 / -1;">
                    <label for="alamat" class="form-label">
                        <i class="fas fa-location-dot"></i> Alamat
                    </label>
                    <textarea name="alamat" id="alamat" class="form-control" rows="3">{{ old('alamat', $mahasiswa->alamat) }}</textarea>
                    @error('alamat')
                        <div class="form-error"><i class="fas fa-circle-exclamation"></i> {{ $message }}</div>
                    @enderror
                </div>

            </div>{{-- end form-grid --}}

            <div class="divider"></div>

            {{-- Action Buttons --}}
            <div style="display:flex;gap:12px;justify-content:flex-end;">
                <a href="{{ route('mahasiswa.show', $mahasiswa->id) }}" class="btn btn-outline" id="btn-cancel">
                    <i class="fas fa-times"></i> Batal
                </a>
                <button type="submit" class="btn btn-gold" id="btn-update">
                    <i class="fas fa-save"></i> Perbarui Data
                </button>
            </div>

        </div>
    </form>

</div>
@endsection

@push('styles')
<style>textarea.form-control { resize:vertical; min-height:90px; }</style>
@endpush

@push('scripts')
<script>
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
        const currentVal  = prodiSelect.value;
        prodiSelect.innerHTML = '<option value="">-- Pilih Prodi --</option>';

        if (!fakultasId) return;

        const prodis = prodiData[fakultasId] || [];
        prodis.forEach(p => {
            const opt = document.createElement('option');
            opt.value       = p.id;
            opt.textContent = p.nama;
            if (p.id === currentVal) opt.selected = true;
            prodiSelect.appendChild(opt);
        });
    }

    // Init: set fakultas & filter prodi sesuai data mahasiswa
    document.addEventListener('DOMContentLoaded', () => {
        const currentFakultas = "{{ old('fakultas_id', $mahasiswa->prodi->fakultas_id ?? '') }}";
        const currentProdi    = "{{ old('prodi_id', $mahasiswa->prodi_id) }}";

        if (currentFakultas) {
            document.getElementById('fakultas_id').value = currentFakultas;
            filterProdi(currentFakultas);
            if (currentProdi) document.getElementById('prodi_id').value = currentProdi;
        }
    });
</script>
@endpush
