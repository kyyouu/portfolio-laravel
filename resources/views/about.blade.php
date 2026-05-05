<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="About Diky Ardiyansyah — Web Developer & Software Engineer dari Cirebon.">
    <title>About — Diky Ardiyansyah</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        :root {
            --gold:       #FFD700;
            --gold-light: #FFE55C;
            --gold-dim:   rgba(255,215,0,0.08);
            --gold-border:rgba(255,215,0,0.18);
            --bg:         #080808;
            --bg-2:       #0f0f0f;
            --bg-card:    #141414;
            --text:       #F0EAD0;
            --muted:      #888070;
            --radius:     14px;
            --radius-sm:  8px;
            --transition: all 0.28s cubic-bezier(0.4,0,0.2,1);
        }

        *, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* ── NAVBAR ── */
        nav {
            position: sticky; top: 0; z-index: 100;
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 48px; height: 68px;
            background: rgba(8,8,8,0.92);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--gold-border);
        }
        .nav-brand {
            font-size: 1.25rem; font-weight: 800;
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
            background-clip: text; text-decoration: none;
        }
        .nav-links { display: flex; gap: 6px; list-style: none; }
        .nav-links a {
            padding: 8px 16px; border-radius: var(--radius-sm);
            text-decoration: none; color: var(--muted);
            font-size: .875rem; font-weight: 500;
            transition: var(--transition);
        }
        .nav-links a:hover, .nav-links a.active {
            color: var(--gold); background: var(--gold-dim);
        }

        /* ── HERO SECTION ── */
        .hero {
            position: relative; overflow: hidden;
            padding: 100px 48px 80px;
            display: flex; align-items: center; gap: 64px;
            max-width: 1200px; margin: 0 auto;
        }
        .hero::before {
            content: '';
            position: absolute; top: -120px; right: -80px;
            width: 500px; height: 500px; border-radius: 50%;
            background: radial-gradient(circle, rgba(255,215,0,0.07) 0%, transparent 70%);
            pointer-events: none;
        }

        /* Avatar */
        .avatar-wrap {
            position: relative; flex-shrink: 0;
        }
        .avatar-ring {
            width: 200px; height: 200px; border-radius: 50%;
            background: linear-gradient(135deg, var(--gold), #B8860B, var(--gold-light));
            padding: 3px;
            animation: spin-slow 8s linear infinite;
            flex-shrink: 0;
        }
        @keyframes spin-slow {
            from { transform: rotate(0deg); }
            to   { transform: rotate(360deg); }
        }
        .avatar-inner {
            width: 100%; height: 100%; border-radius: 50%;
            background: var(--bg-card);
            overflow: hidden;
        }
        .avatar-inner img {
            width: 100%; height: 100%;
            object-fit: cover; object-position: center top;
            border-radius: 50%;
        }
        .avatar-badge {
            position: absolute; bottom: 8px; right: 8px;
            background: linear-gradient(135deg, var(--gold), #DAA520);
            color: #000; font-size: .7rem; font-weight: 800;
            padding: 4px 10px; border-radius: 20px;
            letter-spacing: .5px; text-transform: uppercase;
        }

        /* Hero text */
        .hero-text h1 {
            font-size: 3rem; font-weight: 900; line-height: 1.15;
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
            background-clip: text; margin-bottom: 8px;
        }
        .hero-text .role {
            color: var(--muted); font-size: 1.1rem; font-weight: 500; margin-bottom: 20px;
        }
        .hero-text .bio {
            color: #bbb; line-height: 1.8; font-size: .95rem;
            max-width: 520px; margin-bottom: 28px;
        }
        .hero-chips { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 28px; }
        .chip {
            padding: 5px 14px; border-radius: 20px;
            border: 1px solid var(--gold-border);
            font-size: .78rem; font-weight: 600;
            color: var(--gold); background: var(--gold-dim);
        }
        .hero-cta { display: flex; gap: 12px; flex-wrap: wrap; }
        .btn {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 11px 24px; border-radius: var(--radius-sm);
            font-family: inherit; font-size: .875rem; font-weight: 600;
            cursor: pointer; text-decoration: none; border: none;
            transition: var(--transition);
        }
        .btn-gold {
            background: linear-gradient(135deg, var(--gold), #DAA520);
            color: #000;
        }
        .btn-gold:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(255,215,0,.3); }
        .btn-outline {
            background: transparent;
            border: 1px solid var(--gold-border);
            color: var(--gold);
        }
        .btn-outline:hover { background: var(--gold-dim); border-color: var(--gold); }

        /* ── SECTIONS ── */
        .section {
            max-width: 1200px; margin: 0 auto;
            padding: 60px 48px;
            border-top: 1px solid rgba(255,215,0,0.07);
        }
        .section-title {
            display: flex; align-items: center; gap: 14px;
            font-size: 1.6rem; font-weight: 800;
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
            background-clip: text; margin-bottom: 36px;
        }
        .section-title::after {
            content: ''; flex: 1; height: 1px;
            background: linear-gradient(to right, var(--gold-border), transparent);
        }

        /* ── INFO CARDS (quick facts) ── */
        .facts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 16px; margin-bottom: 0;
        }
        .fact-card {
            background: var(--bg-card); border: 1px solid var(--gold-border);
            border-radius: var(--radius); padding: 22px 20px;
            display: flex; align-items: flex-start; gap: 14px;
            transition: var(--transition);
        }
        .fact-card:hover { border-color: var(--gold); transform: translateY(-3px); box-shadow: 0 8px 28px rgba(255,215,0,.1); }
        .fact-icon {
            width: 44px; height: 44px; border-radius: 10px; flex-shrink: 0;
            background: linear-gradient(135deg, var(--gold), #B8860B);
            color: #000; font-size: 1.1rem;
            display: flex; align-items: center; justify-content: center;
        }
        .fact-label { font-size: .73rem; color: var(--muted); text-transform: uppercase; letter-spacing: .5px; font-weight: 600; margin-bottom: 4px; }
        .fact-value { font-size: .95rem; color: var(--text); font-weight: 600; }

        /* ── SKILLS ── */
        .skills-grid {
            display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 24px;
        }
        .skill-category {
            background: var(--bg-card); border: 1px solid var(--gold-border);
            border-radius: var(--radius); padding: 24px;
        }
        .skill-cat-title {
            font-size: .8rem; font-weight: 700; color: var(--gold);
            text-transform: uppercase; letter-spacing: .8px;
            margin-bottom: 20px; display: flex; align-items: center; gap: 8px;
        }
        .skill-item { margin-bottom: 14px; }
        .skill-head { display: flex; justify-content: space-between; margin-bottom: 6px; }
        .skill-name { font-size: .875rem; color: var(--text); font-weight: 500; }
        .skill-pct  { font-size: .78rem; color: var(--gold); font-weight: 700; font-family: 'JetBrains Mono', monospace; }
        .skill-track { height: 5px; background: rgba(255,215,0,.1); border-radius: 99px; overflow: hidden; }
        .skill-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--gold), var(--gold-light));
            border-radius: 99px; width: 0;
            transition: width 1.2s cubic-bezier(0.4,0,0.2,1);
        }

        /* ── PERSONALITY ── */
        .traits-grid {
            display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px;
        }
        .trait-card {
            background: var(--bg-card); border: 1px solid var(--gold-border);
            border-radius: var(--radius); padding: 28px 20px;
            text-align: center; transition: var(--transition);
        }
        .trait-card:hover { border-color: var(--gold); transform: translateY(-3px); }
        .trait-emoji { font-size: 2.4rem; margin-bottom: 12px; }
        .trait-name { font-size: .95rem; font-weight: 700; color: var(--gold); margin-bottom: 6px; }
        .trait-desc { font-size: .8rem; color: var(--muted); line-height: 1.6; }

        /* ── EDUCATION TIMELINE ── */
        .timeline { position: relative; padding-left: 28px; }
        .timeline::before {
            content: ''; position: absolute; left: 7px; top: 6px; bottom: 6px; width: 2px;
            background: linear-gradient(to bottom, var(--gold), transparent);
        }
        .tl-item { position: relative; margin-bottom: 32px; }
        .tl-dot {
            position: absolute; left: -25px; top: 5px;
            width: 14px; height: 14px; border-radius: 50%;
            background: var(--gold); border: 2px solid var(--bg);
            box-shadow: 0 0 10px rgba(255,215,0,.4);
        }
        .tl-card {
            background: var(--bg-card); border: 1px solid var(--gold-border);
            border-radius: var(--radius); padding: 22px 24px;
            transition: var(--transition);
        }
        .tl-card:hover { border-color: var(--gold); }
        .tl-year { font-size: .75rem; font-weight: 700; color: var(--gold); font-family: 'JetBrains Mono', monospace; margin-bottom: 6px; }
        .tl-inst { font-size: 1rem; font-weight: 700; color: var(--text); margin-bottom: 4px; }
        .tl-major { font-size: .85rem; color: var(--gold); font-weight: 500; margin-bottom: 8px; }
        .tl-desc  { font-size: .82rem; color: var(--muted); line-height: 1.7; }

        /* ── CONTACT ROW ── */
        .contact-row {
            display: flex; flex-wrap: wrap; gap: 14px;
        }
        .contact-link {
            display: inline-flex; align-items: center; gap: 10px;
            padding: 12px 20px; border-radius: var(--radius-sm);
            background: var(--bg-card); border: 1px solid var(--gold-border);
            color: var(--text); text-decoration: none; font-size: .875rem; font-weight: 500;
            transition: var(--transition);
        }
        .contact-link i { color: var(--gold); }
        .contact-link:hover { border-color: var(--gold); color: var(--gold); transform: translateY(-2px); box-shadow: 0 6px 20px rgba(255,215,0,.12); }

        /* ── FOOTER ── */
        footer {
            text-align: center; padding: 28px;
            border-top: 1px solid rgba(255,215,0,.08);
            color: var(--muted); font-size: .82rem;
        }
        footer span { color: var(--gold); }

        /* ── ANIMATIONS ── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade-up { opacity: 0; animation: fadeUp .6s ease forwards; }
        .delay-1 { animation-delay: .1s; }
        .delay-2 { animation-delay: .2s; }
        .delay-3 { animation-delay: .3s; }
        .delay-4 { animation-delay: .4s; }

        /* ── SCROLLBAR ── */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: var(--bg-2); }
        ::-webkit-scrollbar-thumb { background: #333; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--gold); }

        @media (max-width: 768px) {
            nav { padding: 0 20px; }
            .hero { flex-direction: column; text-align: center; padding: 60px 20px 40px; gap: 36px; }
            .hero-text h1 { font-size: 2rem; }
            .hero-chips, .hero-cta { justify-content: center; }
            .section { padding: 40px 20px; }
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav>
        <a href="{{ url('/portfolio') }}" class="nav-brand">DA</a>
        <ul class="nav-links">
            <li><a href="{{ url('/') }}"><i class="fas fa-house fa-sm"></i> Home</a></li>
            <li><a href="{{ url('/portfolio') }}">Portfolio</a></li>
            <li><a href="{{ url('/about') }}" class="active">About</a></li>
            <li><a href="{{ route('mahasiswa.index') }}"><i class="fas fa-users fa-sm"></i> Mahasiswa</a></li>
        </ul>
    </nav>

    <!-- HERO -->
    <div class="hero">
        <!-- Avatar -->
        <div class="avatar-wrap fade-up">
            <div class="avatar-ring">
                <div class="avatar-inner">
                    <img src="{{ asset('foto_profil.jpeg') }}" alt="Diky Ardiyansyah">
                </div>
            </div>
            <div class="avatar-badge">Open to Work</div>
        </div>

        <!-- Text -->
        <div class="hero-text">
            <h1 class="fade-up delay-1">Diky Ardiyansyah</h1>
            <div class="role fade-up delay-1">Web Developer &amp; Software Engineer</div>
            <p class="bio fade-up delay-2">
                Halo! Saya Diky, seorang developer muda dari Cirebon yang passionate dalam membangun
                aplikasi web yang modern, clean, dan performant. Saya percaya bahwa kode yang baik
                bukan hanya soal fungsi — tapi juga soal keindahan, efisiensi, dan dampaknya
                bagi pengguna.
            </p>
            <div class="hero-chips fade-up delay-2">
                <span class="chip">Laravel</span>
                <span class="chip">PHP</span>
                <span class="chip">JavaScript</span>
                <span class="chip">MySQL</span>
                <span class="chip">Docker</span>
                <span class="chip">Linux</span>
            </div>
            <div class="hero-cta fade-up delay-3">
                <a href="{{ url('/portfolio') }}" class="btn btn-gold">
                    <i class="fas fa-briefcase"></i> Lihat Portfolio
                </a>
                <a href="mailto:dikyardiyansyah58@gmail.com" class="btn btn-outline">
                    <i class="fas fa-envelope"></i> Kirim Email
                </a>
            </div>
        </div>
    </div>

    <!-- QUICK FACTS -->
    <section class="section">
        <div class="section-title"><i class="fas fa-id-card"></i> Info Singkat</div>
        <div class="facts-grid">
            <div class="fact-card fade-up">
                <div class="fact-icon"><i class="fas fa-map-marker-alt"></i></div>
                <div>
                    <div class="fact-label">Lokasi</div>
                    <div class="fact-value">Cirebon, Jawa Barat</div>
                </div>
            </div>
            <div class="fact-card fade-up delay-1">
                <div class="fact-icon"><i class="fas fa-graduation-cap"></i></div>
                <div>
                    <div class="fact-label">Pendidikan</div>
                    <div class="fact-value">Teknik Informatika — UMC</div>
                </div>
            </div>
            <div class="fact-card fade-up delay-2">
                <div class="fact-icon"><i class="fas fa-laptop-code"></i></div>
                <div>
                    <div class="fact-label">Pengalaman</div>
                    <div class="fact-value">3+ Tahun Coding</div>
                </div>
            </div>
            <div class="fact-card fade-up delay-3">
                <div class="fact-icon"><i class="fas fa-language"></i></div>
                <div>
                    <div class="fact-label">Bahasa</div>
                    <div class="fact-value">Indonesia · English</div>
                </div>
            </div>
        </div>
    </section>

    <!-- SKILLS -->
    <section class="section">
        <div class="section-title"><i class="fas fa-code"></i> Keahlian</div>
        <div class="skills-grid">

            <div class="skill-category">
                <div class="skill-cat-title"><i class="fas fa-paint-brush"></i> Frontend</div>
                @php $frontend = [['n'=>'HTML & CSS','l'=>95],['n'=>'JavaScript','l'=>88],['n'=>'Vue.js / React','l'=>80],['n'=>'Tailwind CSS','l'=>85]]; @endphp
                @foreach($frontend as $sk)
                <div class="skill-item">
                    <div class="skill-head">
                        <span class="skill-name">{{ $sk['n'] }}</span>
                        <span class="skill-pct">{{ $sk['l'] }}%</span>
                    </div>
                    <div class="skill-track">
                        <div class="skill-fill" data-width="{{ $sk['l'] }}"></div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="skill-category">
                <div class="skill-cat-title"><i class="fas fa-server"></i> Backend</div>
                @php $backend = [['n'=>'PHP','l'=>90],['n'=>'Laravel','l'=>87],['n'=>'MySQL','l'=>82],['n'=>'REST API','l'=>78]]; @endphp
                @foreach($backend as $sk)
                <div class="skill-item">
                    <div class="skill-head">
                        <span class="skill-name">{{ $sk['n'] }}</span>
                        <span class="skill-pct">{{ $sk['l'] }}%</span>
                    </div>
                    <div class="skill-track">
                        <div class="skill-fill" data-width="{{ $sk['l'] }}"></div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="skill-category">
                <div class="skill-cat-title"><i class="fas fa-wrench"></i> Tools & DevOps</div>
                @php $tools = [['n'=>'Git & GitHub','l'=>90],['n'=>'Docker','l'=>65],['n'=>'Linux','l'=>72],['n'=>'Figma','l'=>70]]; @endphp
                @foreach($tools as $sk)
                <div class="skill-item">
                    <div class="skill-head">
                        <span class="skill-name">{{ $sk['n'] }}</span>
                        <span class="skill-pct">{{ $sk['l'] }}%</span>
                    </div>
                    <div class="skill-track">
                        <div class="skill-fill" data-width="{{ $sk['l'] }}"></div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- PERSONALITY -->
    <section class="section">
        <div class="section-title"><i class="fas fa-star"></i> Kepribadian</div>
        <div class="traits-grid">
            <div class="trait-card fade-up">
                <div class="trait-emoji">🎯</div>
                <div class="trait-name">Problem Solver</div>
                <div class="trait-desc">Suka menghadapi tantangan teknis dan menemukan solusi yang efisien.</div>
            </div>
            <div class="trait-card fade-up delay-1">
                <div class="trait-emoji">✨</div>
                <div class="trait-name">Detail Oriented</div>
                <div class="trait-desc">Perhatian tinggi pada kualitas kode, UI, dan pengalaman pengguna.</div>
            </div>
            <div class="trait-card fade-up delay-2">
                <div class="trait-emoji">📚</div>
                <div class="trait-name">Lifelong Learner</div>
                <div class="trait-desc">Selalu mengikuti perkembangan teknologi dan belajar hal baru setiap hari.</div>
            </div>
            <div class="trait-card fade-up delay-3">
                <div class="trait-emoji">🤝</div>
                <div class="trait-name">Team Player</div>
                <div class="trait-desc">Senang berkolaborasi dan berbagi ilmu dalam tim yang dinamis.</div>
            </div>
        </div>
    </section>

    <!-- EDUCATION -->
    <section class="section">
        <div class="section-title"><i class="fas fa-graduation-cap"></i> Pendidikan</div>
        <div class="timeline">
            <div class="tl-item fade-up">
                <div class="tl-dot"></div>
                <div class="tl-card">
                    <div class="tl-year">2023 – Sekarang</div>
                    <div class="tl-inst">Universitas Muhammadiyah Cirebon</div>
                    <div class="tl-major">S1 Teknik Informatika</div>
                    <div class="tl-desc">Fokus pada pengembangan web, jaringan komputer, dan rekayasa perangkat lunak. Aktif mengerjakan proyek-proyek praktis menggunakan Laravel dan Python.</div>
                </div>
            </div>
            <div class="tl-item fade-up delay-1">
                <div class="tl-dot"></div>
                <div class="tl-card">
                    <div class="tl-year">2019 – 2023</div>
                    <div class="tl-inst">SMK Budi Tresna Muhammadiyah Cirebon</div>
                    <div class="tl-major">Teknik Kendaraan Ringan</div>
                    <div class="tl-desc">Menyelesaikan pendidikan menengah kejuruan dengan disiplin teknik, yang melatih pola pikir sistematis dan pemecahan masalah.</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT -->
    <section class="section">
        <div class="section-title"><i class="fas fa-paper-plane"></i> Hubungi Saya</div>
        <div class="contact-row">
            <a href="mailto:dikyardiyansyah58@gmail.com" class="contact-link">
                <i class="fas fa-envelope"></i> dikyardiyansyah58@gmail.com
            </a>
            <a href="https://github.com/kyyouu" target="_blank" class="contact-link">
                <i class="fab fa-github"></i> github.com/kyyouu
            </a>
            <a href="https://linkedin.com/in/diky-kyy" target="_blank" class="contact-link">
                <i class="fab fa-linkedin"></i> linkedin.com/in/diky-kyy
            </a>
            <a href="https://instagram.com/kyyamatt" target="_blank" class="contact-link">
                <i class="fab fa-instagram"></i> instagram.com/kyyamatt
            </a>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <p>&copy; {{ date('Y') }} <span>Diky Ardiyansyah</span> — Dibuat dengan Laravel &amp; ❤️</p>
    </footer>

    <script>
        // Skill bar animation on scroll
        const fills = document.querySelectorAll('.skill-fill');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.style.width = e.target.dataset.width + '%';
                    observer.unobserve(e.target);
                }
            });
        }, { threshold: 0.2 });
        fills.forEach(f => observer.observe(f));

        // Fade-up on scroll
        const fadeEls = document.querySelectorAll('.fade-up');
        const fadeObs = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.style.animationPlayState = 'running';
                    fadeObs.unobserve(e.target);
                }
            });
        }, { threshold: 0.15 });

        // Pause all animations initially, play on scroll
        fadeEls.forEach(el => {
            // hero items play immediately (already in view)
            if (!el.closest('.section')) return;
            el.style.animationPlayState = 'paused';
            fadeObs.observe(el);
        });
    </script>
</body>
</html>
