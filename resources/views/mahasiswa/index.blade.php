@extends('mahasiswa.layout')

@section('title', 'Daftar Mahasiswa')

@section('content')
<div class="fade-in">

    {{-- Page Header --}}
    <div class="page-header">
        <div class="page-title-group">
            <h1><i class="fas fa-graduation-cap" style="font-size:1.6rem;"></i> Data Mahasiswa</h1>
            <p>Kelola seluruh data mahasiswa terdaftar</p>
        </div>
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-gold" id="btn-tambah">
            <i class="fas fa-plus"></i> Tambah Mahasiswa
        </a>
    </div>

    {{-- Stats Cards --}}
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon gold"><i class="fas fa-users"></i></div>
            <div class="stat-info">
                <div class="label">Total Mahasiswa</div>
                <div class="value">{{ $stats['total'] }}</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon green"><i class="fas fa-building-columns"></i></div>
            <div class="stat-info">
                <div class="label">Fakultas</div>
                <div class="value">{{ $stats['fakultas'] }}</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon blue"><i class="fas fa-book-open"></i></div>
            <div class="stat-info">
                <div class="label">Program Studi</div>
                <div class="value">{{ $stats['prodi'] }}</div>
            </div>
        </div>
    </div>

    {{-- Search & Filter --}}
    <div class="card" style="margin-bottom:24px;">
        <form method="GET" action="{{ route('mahasiswa.index') }}" id="form-filter">
            <div class="search-bar">
                <div class="search-input-wrapper">
                    <i class="fas fa-search"></i>
                    <input type="text" name="search" id="search-input" class="form-control"
                           placeholder="Cari nama, NIM, atau email..."
                           value="{{ request('search') }}">
                </div>
                <select name="fakultas_id" id="filter-fakultas" class="form-control filter-select"
                        onchange="this.form.submit()">
                    <option value="">Semua Fakultas</option>
                    @foreach($fakultas as $f)
                        <option value="{{ $f->id }}" {{ request('fakultas_id') == $f->id ? 'selected' : '' }}>
                            {{ $f->nama_fakultas }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-gold" id="btn-search">
                    <i class="fas fa-filter"></i> Cari
                </button>
                @if(request()->anyFilled(['search','fakultas_id','prodi_id']))
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-outline" id="btn-reset">
                    <i class="fas fa-times"></i> Reset
                </a>
                @endif
            </div>
        </form>
    </div>

    {{-- Table --}}
    <div class="card" style="padding:0;">
        @if($mahasiswas->isEmpty())
        <div class="empty-state">
            <i class="fas fa-user-slash"></i>
            <h3 style="color:var(--text-secondary);margin-bottom:4px;">Belum ada data mahasiswa</h3>
            <p>Tambahkan mahasiswa pertama sekarang</p>
            <a href="{{ route('mahasiswa.create') }}" class="btn btn-gold" style="margin-top:20px;" id="btn-tambah-empty">
                <i class="fas fa-plus"></i> Tambah Mahasiswa
            </a>
        </div>
        @else
        <div class="table-wrapper">
            <table id="mahasiswa-table">
                <thead>
                    <tr>
                        <th style="width:50px;">#</th>
                        <th>Mahasiswa</th>
                        <th>NIM</th>
                        <th>Program Studi</th>
                        <th>Fakultas</th>
                        <th>Alamat</th>
                        <th style="text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mahasiswas as $i => $mhs)
                    <tr id="row-{{ $mhs->id }}">
                        <td style="color:var(--text-muted);font-size:.8rem;">
                            {{ $mahasiswas->firstItem() + $i }}
                        </td>
                        <td>
                            <div style="display:flex;align-items:center;gap:12px;">
                                <div class="avatar">{{ strtoupper(substr($mhs->nama ?? 'NA', 0, 2)) }}</div>
                                <div>
                                    <div class="name-cell">{{ $mhs->nama ?? '—' }}</div>
                                    <div style="font-size:.78rem;color:var(--text-muted);">{{ $mhs->email ?? '—' }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span style="font-family:monospace;color:var(--gold);font-size:.85rem;">
                                {{ $mhs->nim ?? '—' }}
                            </span>
                        </td>
                        <td style="font-size:.85rem;">{{ $mhs->prodi->nama_prodi ?? '—' }}</td>
                        <td style="font-size:.82rem;color:var(--text-muted);">
                            {{ $mhs->prodi->fakultas->nama_fakultas ?? '—' }}
                        </td>
                        <td style="font-size:.82rem;color:var(--text-muted);max-width:180px;
                                   overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                            {{ $mhs->alamat ?? '—' }}
                        </td>
                        <td>
                            <div class="action-group" style="justify-content:center;">
                                <a href="{{ route('mahasiswa.show', $mhs->id) }}"
                                   class="btn btn-outline btn-sm" title="Detail"
                                   id="btn-detail-{{ $mhs->id }}">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('mahasiswa.edit', $mhs->id) }}"
                                   class="btn btn-sm" title="Edit"
                                   id="btn-edit-{{ $mhs->id }}"
                                   style="display:inline-flex;align-items:center;gap:6px;padding:6px 14px;
                                          border-radius:8px;font-size:.8rem;font-weight:600;cursor:pointer;
                                          background:rgba(243,156,18,.12);border:1px solid rgba(243,156,18,.3);
                                          color:#F39C12;text-decoration:none;transition:all .25s;">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <form method="POST" action="{{ route('mahasiswa.destroy', $mhs->id) }}"
                                      id="form-delete-{{ $mhs->id }}"
                                      onsubmit="return confirmDelete('{{ addslashes($mhs->nama) }}','{{ $mhs->id }}')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                            title="Hapus" id="btn-delete-{{ $mhs->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div style="padding:16px 24px;">
            <div class="pagination-wrapper">
                <div class="pagination-info">
                    Menampilkan {{ $mahasiswas->firstItem() }}–{{ $mahasiswas->lastItem() }}
                    dari <strong>{{ $mahasiswas->total() }}</strong> mahasiswa
                </div>
                <ul class="pagination" id="pagination">
                    <li class="{{ $mahasiswas->onFirstPage() ? 'disabled' : '' }}">
                        <a href="{{ $mahasiswas->previousPageUrl() }}" class="page-link">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </li>
                    @foreach($mahasiswas->getUrlRange(1, $mahasiswas->lastPage()) as $page => $url)
                    <li class="{{ $mahasiswas->currentPage() == $page ? 'active' : '' }}">
                        <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                    </li>
                    @endforeach
                    <li class="{{ !$mahasiswas->hasMorePages() ? 'disabled' : '' }}">
                        <a href="{{ $mahasiswas->nextPageUrl() }}" class="page-link">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        @endif
    </div>

</div>

{{-- Delete Modal --}}
<div id="delete-modal" style="display:none;position:fixed;inset:0;z-index:999;
     background:rgba(0,0,0,.85);backdrop-filter:blur(6px);
     align-items:center;justify-content:center;">
    <div style="background:var(--black-3);border:1px solid rgba(255,77,77,.3);
                border-radius:var(--radius);padding:40px;max-width:420px;width:90%;
                text-align:center;box-shadow:0 20px 60px rgba(0,0,0,.8);">
        <div style="width:72px;height:72px;background:rgba(255,77,77,.1);
                    border:1px solid rgba(255,77,77,.3);border-radius:50%;
                    display:flex;align-items:center;justify-content:center;
                    font-size:30px;color:var(--danger);margin:0 auto 20px;">
            <i class="fas fa-trash-alt"></i>
        </div>
        <h3 style="color:var(--white);margin-bottom:8px;">Hapus Mahasiswa?</h3>
        <p style="color:var(--text-muted);font-size:.9rem;line-height:1.5;" id="modal-msg">
            Aksi ini tidak dapat dibatalkan.
        </p>
        <div style="display:flex;gap:12px;justify-content:center;margin-top:28px;">
            <button onclick="closeModal()" class="btn btn-outline" id="btn-cancel-modal">
                <i class="fas fa-times"></i> Batal
            </button>
            <button onclick="submitDelete()" class="btn btn-danger" id="btn-confirm-delete">
                <i class="fas fa-trash"></i> Ya, Hapus
            </button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
let pendingFormId = null;

function confirmDelete(nama, id) {
    pendingFormId = 'form-delete-' + id;
    document.getElementById('modal-msg').textContent =
        `Yakin ingin menghapus mahasiswa "${nama}"? Data tidak bisa dikembalikan.`;
    const modal = document.getElementById('delete-modal');
    modal.style.display = 'flex';
    return false;
}

function closeModal() {
    document.getElementById('delete-modal').style.display = 'none';
    pendingFormId = null;
}

function submitDelete() {
    if (pendingFormId) document.getElementById(pendingFormId).submit();
}

document.getElementById('delete-modal').addEventListener('click', function(e) {
    if (e.target === this) closeModal();
});
</script>
@endpush
