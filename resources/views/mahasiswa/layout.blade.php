<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Mahasiswa') — Mahasiswa</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --gold: #FFD700;
            --gold-light: #FFE55C;
            --gold-dim: rgba(255, 215, 0, 0.15);
            --gold-border: rgba(255, 215, 0, 0.3);
            --black: #000000;
            --black-1: #0A0A0A;
            --black-2: #111111;
            --black-3: #1A1A1A;
            --black-4: #222222;
            --black-5: #2C2C2C;
            --white: #FFFFFF;
            --text-muted: #888888;
            --text-secondary: #BBBBBB;
            --danger: #FF4D4D;
            --success: #2ECC71;
            --warning: #F39C12;
            --info: #3498DB;
            --radius: 12px;
            --radius-sm: 8px;
            --shadow: 0 4px 24px rgba(0,0,0,0.6);
            --shadow-gold: 0 0 30px rgba(255,215,0,0.12);
            --transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--black-1);
            color: var(--white);
            min-height: 100vh;
        }

        /* ===== NAVBAR ===== */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;
            height: 70px;
            background: rgba(10,10,10,0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--gold-border);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--gold), #B8860B);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: var(--black);
            font-weight: 900;
        }

        .brand-text {
            font-size: 1.2rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.5px;
        }

        .navbar-nav {
            display: flex;
            align-items: center;
            gap: 8px;
            list-style: none;
        }

        .navbar-nav a {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            border-radius: var(--radius-sm);
            text-decoration: none;
            color: var(--text-secondary);
            font-size: 0.875rem;
            font-weight: 500;
            transition: var(--transition);
        }

        .navbar-nav a:hover,
        .navbar-nav a.active {
            color: var(--gold);
            background: var(--gold-dim);
        }

        /* ===== MAIN CONTENT ===== */
        .main-content {
            padding: 40px;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* ===== PAGE HEADER ===== */
        .page-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 36px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .page-title-group h1 {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.2;
        }

        .page-title-group p {
            color: var(--text-muted);
            font-size: 0.9rem;
            margin-top: 6px;
        }

        /* ===== BUTTONS ===== */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 22px;
            border: none;
            border-radius: var(--radius-sm);
            font-family: 'Inter', sans-serif;
            font-size: 0.875rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: var(--transition);
            white-space: nowrap;
        }

        .btn-gold {
            background: linear-gradient(135deg, var(--gold), #DAA520);
            color: var(--black);
        }

        .btn-gold:hover {
            background: linear-gradient(135deg, var(--gold-light), var(--gold));
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(255,215,0,0.3);
        }

        .btn-outline {
            background: transparent;
            border: 1px solid var(--gold-border);
            color: var(--gold);
        }

        .btn-outline:hover {
            background: var(--gold-dim);
            border-color: var(--gold);
        }

        .btn-danger {
            background: rgba(255,77,77,0.15);
            border: 1px solid rgba(255,77,77,0.3);
            color: var(--danger);
        }

        .btn-danger:hover {
            background: rgba(255,77,77,0.25);
            border-color: var(--danger);
        }

        .btn-sm {
            padding: 6px 14px;
            font-size: 0.8rem;
        }

        /* ===== CARDS ===== */
        .card {
            background: var(--black-3);
            border: 1px solid var(--gold-border);
            border-radius: var(--radius);
            padding: 28px;
            box-shadow: var(--shadow);
        }

        /* ===== ALERTS ===== */
        .alert {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px 20px;
            border-radius: var(--radius-sm);
            margin-bottom: 24px;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .alert-success {
            background: rgba(46,204,113,0.12);
            border: 1px solid rgba(46,204,113,0.3);
            color: #2ECC71;
        }

        .alert-danger {
            background: rgba(255,77,77,0.12);
            border: 1px solid rgba(255,77,77,0.3);
            color: var(--danger);
        }

        .alert-close {
            margin-left: auto;
            background: none;
            border: none;
            color: inherit;
            cursor: pointer;
            opacity: 0.7;
            transition: var(--transition);
        }

        .alert-close:hover { opacity: 1; }

        /* ===== FORM STYLES ===== */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 0.825rem;
            font-weight: 600;
            color: var(--gold);
            margin-bottom: 8px;
            letter-spacing: 0.3px;
            text-transform: uppercase;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            background: var(--black-4);
            border: 1px solid var(--black-5);
            border-radius: var(--radius-sm);
            color: var(--white);
            font-family: 'Inter', sans-serif;
            font-size: 0.9rem;
            transition: var(--transition);
            outline: none;
        }

        .form-control:focus {
            border-color: var(--gold);
            background: var(--black-3);
            box-shadow: 0 0 0 3px rgba(255,215,0,0.1);
        }

        .form-control::placeholder { color: var(--text-muted); }

        select.form-control option {
            background: var(--black-3);
            color: var(--white);
        }

        .form-error {
            font-size: 0.8rem;
            color: var(--danger);
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        /* ===== TABLE ===== */
        .table-wrapper {
            overflow-x: auto;
            border-radius: var(--radius);
            border: 1px solid var(--gold-border);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead th {
            background: var(--black-4);
            padding: 14px 18px;
            text-align: left;
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--gold);
            text-transform: uppercase;
            letter-spacing: 0.8px;
            border-bottom: 1px solid var(--gold-border);
            white-space: nowrap;
        }

        tbody tr {
            border-bottom: 1px solid rgba(255,215,0,0.05);
            transition: var(--transition);
        }

        tbody tr:hover {
            background: rgba(255,215,0,0.04);
        }

        tbody td {
            padding: 14px 18px;
            font-size: 0.875rem;
            color: var(--text-secondary);
            vertical-align: middle;
        }

        tbody td .name-cell {
            color: var(--white);
            font-weight: 600;
        }

        /* ===== BADGES ===== */
        .badge {
            display: inline-flex;
            align-items: center;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.3px;
        }

        .badge-aktif  { background: rgba(46,204,113,0.15); color: #2ECC71; border: 1px solid rgba(46,204,113,0.3); }
        .badge-cuti   { background: rgba(243,156,18,0.15);  color: #F39C12; border: 1px solid rgba(243,156,18,0.3); }
        .badge-lulus  { background: rgba(52,152,219,0.15); color: #3498DB; border: 1px solid rgba(52,152,219,0.3); }
        .badge-dropout { background: rgba(255,77,77,0.15);  color: var(--danger); border: 1px solid rgba(255,77,77,0.3); }
        .badge-lk     { background: rgba(52,152,219,0.1); color: #7EC8E3; }
        .badge-pr     { background: rgba(255,105,180,0.1); color: #FFB6C1; }

        /* ===== PAGINATION ===== */
        .pagination-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 0 0;
            flex-wrap: wrap;
            gap: 12px;
        }

        .pagination-info {
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        .pagination {
            display: flex;
            gap: 6px;
            list-style: none;
        }

        .pagination a,
        .pagination span {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: var(--radius-sm);
            font-size: 0.85rem;
            font-weight: 500;
            text-decoration: none;
            transition: var(--transition);
            border: 1px solid transparent;
        }

        .pagination .page-link {
            color: var(--text-secondary);
            border-color: var(--black-5);
            background: var(--black-4);
        }

        .pagination .page-link:hover {
            color: var(--gold);
            border-color: var(--gold-border);
            background: var(--gold-dim);
        }

        .pagination .active .page-link {
            background: linear-gradient(135deg, var(--gold), #DAA520);
            color: var(--black);
            border-color: var(--gold);
            font-weight: 700;
        }

        .pagination .disabled .page-link {
            opacity: 0.3;
            cursor: not-allowed;
        }

        /* ===== STAT CARDS ===== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: var(--black-3);
            border: 1px solid var(--gold-border);
            border-radius: var(--radius);
            padding: 22px 24px;
            display: flex;
            align-items: center;
            gap: 16px;
            transition: var(--transition);
            box-shadow: var(--shadow-gold);
        }

        .stat-card:hover {
            border-color: var(--gold);
            transform: translateY(-2px);
            box-shadow: 0 8px 32px rgba(255,215,0,0.18);
        }

        .stat-icon {
            width: 52px;
            height: 52px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
        }

        .stat-icon.gold { background: linear-gradient(135deg, var(--gold), #B8860B); color: var(--black); }
        .stat-icon.green { background: rgba(46,204,113,0.15); color: #2ECC71; border: 1px solid rgba(46,204,113,0.2); }
        .stat-icon.blue { background: rgba(52,152,219,0.15); color: #3498DB; border: 1px solid rgba(52,152,219,0.2); }
        .stat-icon.orange { background: rgba(243,156,18,0.15); color: #F39C12; border: 1px solid rgba(243,156,18,0.2); }

        .stat-info .label {
            font-size: 0.78rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .stat-info .value {
            font-size: 1.9rem;
            font-weight: 800;
            color: var(--white);
            line-height: 1.2;
            margin-top: 2px;
        }

        /* ===== SEARCH BAR ===== */
        .search-bar {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 24px;
        }

        .search-input-wrapper {
            position: relative;
            flex: 1;
            min-width: 250px;
        }

        .search-input-wrapper i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        .search-input-wrapper input {
            padding-left: 40px;
        }

        .filter-select {
            min-width: 160px;
        }

        /* ===== AVATAR ===== */
        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--gold), #B8860B);
            color: var(--black);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.875rem;
            font-weight: 800;
            flex-shrink: 0;
        }

        /* ===== DETAIL CARD ===== */
        .detail-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 16px;
        }

        .detail-item {
            padding: 16px;
            background: var(--black-4);
            border-radius: var(--radius-sm);
            border: 1px solid rgba(255,215,0,0.08);
        }

        .detail-label {
            font-size: 0.75rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .detail-value {
            font-size: 0.95rem;
            color: var(--white);
            font-weight: 500;
        }

        /* ===== EMPTY STATE ===== */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: var(--text-muted);
        }

        .empty-state i {
            font-size: 3.5rem;
            color: var(--gold-border);
            margin-bottom: 16px;
        }

        .empty-state p { font-size: 1rem; margin-top: 8px; }

        /* ===== DIVIDER ===== */
        .divider {
            height: 1px;
            background: var(--gold-border);
            margin: 24px 0;
        }

        /* ===== ACTION BUTTONS IN TABLE ===== */
        .action-group {
            display: flex;
            gap: 6px;
            align-items: center;
        }

        /* ===== BREADCRUMB ===== */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.82rem;
            color: var(--text-muted);
            margin-bottom: 10px;
        }

        .breadcrumb a {
            color: var(--text-muted);
            text-decoration: none;
            transition: var(--transition);
        }

        .breadcrumb a:hover { color: var(--gold); }
        .breadcrumb .sep { opacity: 0.4; }
        .breadcrumb .current { color: var(--gold); }

        /* ===== ANIMATIONS ===== */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .fade-in { animation: fadeInUp 0.4s ease forwards; }

        /* ===== SCROLLBAR ===== */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: var(--black-2); }
        ::-webkit-scrollbar-thumb { background: var(--black-5); border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--gold); }

        @media (max-width: 768px) {
            .main-content { padding: 20px; }
            .navbar { padding: 0 20px; }
            .page-header { flex-direction: column; }
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <a href="{{ url('/') }}" class="navbar-brand">
            <div class="brand-icon">🎓</div>
            <span class="brand-text">Mahasiswa</span>
        </a>
        <ul class="navbar-nav">
            <li>
                <a href="{{ url('/') }}">
                    <i class="fas fa-house"></i> Home
                </a>
            </li>
            <li>
                <a href="{{ route('mahasiswa.index') }}"
                   class="{{ request()->routeIs('mahasiswa.*') ? 'active' : '' }}">
                    <i class="fas fa-users"></i> Mahasiswa
                </a>
            </li>
            <li>
                <a href="{{ url('/portfolio') }}"
                   class="{{ request()->is('portfolio*') ? 'active' : '' }}">
                    <i class="fas fa-briefcase"></i> Portfolio
                </a>
            </li>
        </ul>
    </nav>

    <!-- MAIN -->
    <main class="main-content">

        {{-- Flash Messages --}}
        @if(session('success'))
        <div class="alert alert-success fade-in" id="flash-alert">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
            <button class="alert-close" onclick="document.getElementById('flash-alert').remove()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger fade-in" id="flash-alert-err">
            <i class="fas fa-exclamation-circle"></i>
            {{ session('error') }}
            <button class="alert-close" onclick="document.getElementById('flash-alert-err').remove()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        @endif

        @yield('content')

    </main>

    <script>
        // Auto dismiss alerts after 5s
        setTimeout(() => {
            document.querySelectorAll('.alert').forEach(a => {
                a.style.transition = 'opacity 0.5s';
                a.style.opacity = '0';
                setTimeout(() => a.remove(), 500);
            });
        }, 5000);
    </script>

    @stack('scripts')
</body>
</html>
