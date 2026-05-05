@extends('mahasiswa.layout')

@section('title', 'Detail — ' . $mahasiswa->nama)

@section('content')
<div class="fade-in">

    {{-- Breadcrumb --}}
    <div class="breadcrumb">
        <a href="{{ route('mahasiswa.index') }}"><i class="fas fa-users"></i> Mahasiswa</a>
        <span class="sep">/</span>
        <span class="current">{{ $mahasiswa->nama }}</span>
    </div>

    {{-- Page Header --}}
    <div class="page-header">
        <div class="page-title-group">
            <h1><i class="fas fa-user-circle" style="font-size:1.4rem;"></i> Detail Mahasiswa</h1>
            <p>Informasi lengkap data mahasiswa</p>
        </div>
        <div style="display:flex;gap:10px;flex-wrap:wrap;">
            <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-gold" id="btn-edit">
                <i class="fas fa-pen"></i> Edit
            </a>
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-outline" id="btn-back">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    {{-- Profile Hero --}}
    <div class="card" style="margin-bottom:24px;text-align:center;padding:48px 28px;position:relative;overflow:hidden;">
        {{-- Background glow --}}
        <div style="position:absolute;top:-80px;left:50%;transform:translateX(-50%);
                    width:400px;height:400px;
                    background:radial-gradient(circle,rgba(255,215,0,0.06),transparent 70%);
                    pointer-events:none;"></div>

        {{-- Avatar --}}
        <div style="width:90px;height:90px;border-radius:50%;
                    background:linear-gradient(135deg,var(--gold),#B8860B);
                    color:var(--black);display:inline-flex;align-items:center;justify-content:center;
                    font-size:2rem;font-weight:900;margin-bottom:16px;
                    box-shadow:0 0 40px rgba(255,215,0,0.25);">
            {{ strtoupper(substr($mahasiswa->nama ?? 'NA', 0, 2)) }}
        </div>

        <h2 style="font-size:1.7rem;font-weight:800;color:var(--white);margin-bottom:6px;">
            {{ $mahasiswa->nama }}
        </h2>

        <div style="font-family:monospace;color:var(--gold);font-size:1rem;font-weight:600;margin-bottom:16px;">
            {{ $mahasiswa->nim }}
        </div>

        <div style="display:flex;align-items:center;justify-content:center;gap:10px;flex-wrap:wrap;">
            <span class="badge" style="background:var(--gold-dim);color:var(--gold);
                                       border:1px solid var(--gold-border);font-size:.85rem;padding:6px 18px;">
                <i class="fas fa-book-open" style="margin-right:6px;"></i>
                {{ $mahasiswa->prodi->nama_prodi ?? '—' }}
            </span>
            <span class="badge" style="background:rgba(52,152,219,.1);color:#7EC8E3;
                                       border:1px solid rgba(52,152,219,.2);font-size:.85rem;padding:6px 18px;">
                <i class="fas fa-building-columns" style="margin-right:6px;"></i>
                {{ $mahasiswa->prodi->fakultas->nama_fakultas ?? '—' }}
            </span>
        </div>
    </div>

    {{-- Info Cards --}}
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(320px,1fr));gap:20px;margin-bottom:24px;">

        {{-- Data Identitas --}}
        <div class="card">
            <div style="display:flex;align-items:center;gap:12px;margin-bottom:20px;">
                <div class="stat-icon gold" style="width:38px;height:38px;font-size:15px;border-radius:9px;">
                    <i class="fas fa-id-card"></i>
                </div>
                <h3 style="color:var(--gold);font-size:.9rem;font-weight:700;text-transform:uppercase;letter-spacing:.6px;">
                    Identitas
                </h3>
            </div>

            <div style="display:flex;flex-direction:column;gap:12px;">
                <div class="detail-item">
                    <div class="detail-label"><i class="fas fa-hashtag" style="margin-right:5px;"></i>NIM</div>
                    <div class="detail-value" style="font-family:monospace;color:var(--gold);font-size:1rem;">
                        {{ $mahasiswa->nim ?? '—' }}
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-label"><i class="fas fa-user" style="margin-right:5px;"></i>Nama Lengkap</div>
                    <div class="detail-value">{{ $mahasiswa->nama ?? '—' }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label"><i class="fas fa-envelope" style="margin-right:5px;"></i>Email</div>
                    <div class="detail-value">
                        <a href="mailto:{{ $mahasiswa->email }}"
                           style="color:var(--gold);text-decoration:none;">
                            {{ $mahasiswa->email ?? '—' }}
                        </a>
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-label"><i class="fas fa-location-dot" style="margin-right:5px;"></i>Alamat</div>
                    <div class="detail-value" style="line-height:1.6;">{{ $mahasiswa->alamat ?? '—' }}</div>
                </div>
            </div>
        </div>

        {{-- Data Akademik --}}
        <div class="card">
            <div style="display:flex;align-items:center;gap:12px;margin-bottom:20px;">
                <div class="stat-icon gold" style="width:38px;height:38px;font-size:15px;border-radius:9px;">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h3 style="color:var(--gold);font-size:.9rem;font-weight:700;text-transform:uppercase;letter-spacing:.6px;">
                    Akademik
                </h3>
            </div>

            <div style="display:flex;flex-direction:column;gap:12px;">
                <div class="detail-item">
                    <div class="detail-label"><i class="fas fa-book-open" style="margin-right:5px;"></i>Program Studi</div>
                    <div class="detail-value">{{ $mahasiswa->prodi->nama_prodi ?? '—' }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label"><i class="fas fa-building-columns" style="margin-right:5px;"></i>Fakultas</div>
                    <div class="detail-value">{{ $mahasiswa->prodi->fakultas->nama_fakultas ?? '—' }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label"><i class="fas fa-clock" style="margin-right:5px;"></i>Ditambahkan</div>
                    <div class="detail-value" style="font-size:.85rem;">
                        {{ $mahasiswa->created_at->isoFormat('D MMMM YYYY, HH:mm') }}
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-label"><i class="fas fa-pen-to-square" style="margin-right:5px;"></i>Terakhir Diperbarui</div>
                    <div class="detail-value" style="font-size:.85rem;">
                        {{ $mahasiswa->updated_at->isoFormat('D MMMM YYYY, HH:mm') }}
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Danger Zone --}}
    <div class="card" style="border-color:rgba(255,77,77,.2);">
        <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;">
            <div>
                <h4 style="color:var(--danger);font-size:.95rem;margin-bottom:4px;display:flex;align-items:center;gap:8px;">
                    <i class="fas fa-triangle-exclamation"></i> Danger Zone
                </h4>
                <p style="font-size:.82rem;color:var(--text-muted);">
                    Hapus data mahasiswa ini secara permanen. Tindakan tidak bisa dibatalkan.
                </p>
            </div>
            <form method="POST" action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}"
                  id="form-delete-show"
                  onsubmit="return confirm('Yakin hapus mahasiswa {{ addslashes($mahasiswa->nama) }}?\nTindakan ini tidak bisa dibatalkan!')">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger" id="btn-delete-show">
                    <i class="fas fa-trash-alt"></i> Hapus Mahasiswa Ini
                </button>
            </form>
        </div>
    </div>

</div>
@endsection
