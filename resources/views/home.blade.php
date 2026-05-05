<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diky Ardiyansyah — Welcome</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:ital,wght@0,700;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --gold:        #FFD700;
            --gold-light:  #FFE55C;
            --gold-dim:    rgba(255,215,0,0.12);
            --gold-border: rgba(255,215,0,0.25);
            --black:       #000;
            --black-1:     #080808;
            --black-2:     #101010;
            --black-3:     #181818;
            --black-4:     #202020;
            --white:       #FFFFFF;
            --muted:       #777;
            --secondary:   #AAAAAA;
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--black-1);
            color: var(--white);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* ── ANIMATED BACKGROUND ─────────────────── */
        .bg-grid {
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(255,215,0,.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,215,0,.03) 1px, transparent 1px);
            background-size: 60px 60px;
            pointer-events: none;
            z-index: 0;
        }

        .bg-glow {
            position: fixed;
            top: -200px;
            left: 50%;
            transform: translateX(-50%);
            width: 900px;
            height: 600px;
            background: radial-gradient(ellipse at center,
                rgba(255,215,0,0.06) 0%,
                rgba(255,215,0,0.02) 40%,
                transparent 70%);
            pointer-events: none;
            z-index: 0;
            animation: pulseGlow 6s ease-in-out infinite;
        }

        @keyframes pulseGlow {
            0%, 100% { opacity: 0.6; transform: translateX(-50%) scale(1); }
            50%       { opacity: 1;   transform: translateX(-50%) scale(1.05); }
        }

        /* ── NAVBAR ──────────────────────────────── */
        .navbar {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 60px;
            height: 68px;
            background: rgba(8,8,8,0.9);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--gold-border);
        }

        .nav-logo {
            font-size: 1.1rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.3px;
            text-decoration: none;
        }

        .nav-links { display: flex; gap: 6px; list-style: none; }

        .nav-links a {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 7px 16px;
            border-radius: 8px;
            text-decoration: none;
            color: var(--secondary);
            font-size: .85rem;
            font-weight: 500;
            transition: all .25s;
        }

        .nav-links a:hover {
            color: var(--gold);
            background: var(--gold-dim);
        }

        /* ── HERO ────────────────────────────────── */
        .hero {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 100px 40px 60px;
        }

        .hero-inner { max-width: 820px; }

        /* greeting pill */
        .greeting-pill {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 8px 20px;
            background: var(--gold-dim);
            border: 1px solid var(--gold-border);
            border-radius: 100px;
            font-size: .82rem;
            font-weight: 600;
            color: var(--gold);
            letter-spacing: .4px;
            margin-bottom: 32px;
            animation: fadeDown .6s ease forwards;
        }

        .pill-dot {
            width: 7px; height: 7px;
            background: var(--gold);
            border-radius: 50%;
            animation: blink 1.5s infinite;
        }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50%       { opacity: .3; }
        }

        /* main heading */
        .hero-hi {
            font-family: 'Inter', sans-serif;
            font-size: clamp(1.1rem, 3vw, 1.4rem);
            font-weight: 500;
            color: var(--secondary);
            margin-bottom: 12px;
            animation: fadeDown .7s .1s ease both;
        }

        .hero-name {
            font-family: 'Playfair Display', serif;
            font-size: clamp(3rem, 8vw, 5.5rem);
            font-weight: 700;
            line-height: 1.1;
            letter-spacing: -1px;
            margin-bottom: 24px;
            animation: fadeDown .7s .2s ease both;
        }

        .name-main  { color: var(--white); }
        .name-gold  {
            background: linear-gradient(135deg, var(--gold), var(--gold-light), #DAA520);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-sub {
            font-size: clamp(.95rem, 2vw, 1.15rem);
            color: var(--muted);
            line-height: 1.8;
            max-width: 560px;
            margin: 0 auto 48px;
            animation: fadeDown .7s .3s ease both;
        }

        /* CTA buttons */
        .hero-cta {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeDown .7s .4s ease both;
        }

        .btn-hero-primary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 32px;
            background: linear-gradient(135deg, var(--gold), #DAA520);
            color: var(--black);
            font-family: 'Inter', sans-serif;
            font-size: .95rem;
            font-weight: 700;
            border-radius: 50px;
            text-decoration: none;
            transition: all .3s cubic-bezier(.4,0,.2,1);
            box-shadow: 0 4px 24px rgba(255,215,0,0.2);
        }

        .btn-hero-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 40px rgba(255,215,0,0.35);
            background: linear-gradient(135deg, var(--gold-light), var(--gold));
        }

        .btn-hero-secondary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 32px;
            background: transparent;
            color: var(--white);
            font-family: 'Inter', sans-serif;
            font-size: .95rem;
            font-weight: 600;
            border-radius: 50px;
            text-decoration: none;
            border: 1px solid rgba(255,255,255,0.15);
            transition: all .3s;
        }

        .btn-hero-secondary:hover {
            border-color: var(--gold-border);
            color: var(--gold);
            background: var(--gold-dim);
            transform: translateY(-2px);
        }

        /* ── SCROLL INDICATOR ────────────────────── */
        .scroll-hint {
            position: absolute;
            bottom: 36px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            color: var(--muted);
            font-size: .75rem;
            letter-spacing: .5px;
            animation: fadeDown .8s .8s ease both;
        }

        .scroll-hint-line {
            width: 1px;
            height: 40px;
            background: linear-gradient(to bottom, var(--gold), transparent);
            animation: scrollLine 2s ease-in-out infinite;
        }

        @keyframes scrollLine {
            0%   { transform: scaleY(0); transform-origin: top; }
            50%  { transform: scaleY(1); transform-origin: top; }
            51%  { transform: scaleY(1); transform-origin: bottom; }
            100% { transform: scaleY(0); transform-origin: bottom; }
        }

        /* ── CARDS SECTION ───────────────────────── */
        .section {
            position: relative;
            z-index: 1;
            padding: 80px 40px;
            max-width: 1100px;
            margin: 0 auto;
        }

        .section-label {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: .78rem;
            font-weight: 700;
            color: var(--gold);
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 16px;
        }

        .section-label::before {
            content: '';
            width: 30px;
            height: 2px;
            background: var(--gold);
            border-radius: 2px;
        }

        .section-title {
            font-size: clamp(1.6rem, 4vw, 2.4rem);
            font-weight: 800;
            color: var(--white);
            margin-bottom: 48px;
            line-height: 1.2;
        }

        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        .feature-card {
            background: var(--black-3);
            border: 1px solid rgba(255,215,0,0.1);
            border-radius: 16px;
            padding: 30px;
            transition: all .35s cubic-bezier(.4,0,.2,1);
            position: relative;
            overflow: hidden;
            text-decoration: none;
            display: block;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
            transform: scaleX(0);
            transition: transform .4s ease;
        }

        .feature-card:hover {
            border-color: var(--gold-border);
            transform: translateY(-6px);
            box-shadow: 0 20px 50px rgba(0,0,0,.5), 0 0 30px rgba(255,215,0,.08);
        }

        .feature-card:hover::before { transform: scaleX(1); }

        .card-icon {
            width: 52px; height: 52px;
            border-radius: 14px;
            background: var(--gold-dim);
            border: 1px solid var(--gold-border);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 20px;
        }

        .card-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--white);
            margin-bottom: 10px;
        }

        .card-desc {
            font-size: .87rem;
            color: var(--muted);
            line-height: 1.7;
        }

        .card-arrow {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 20px;
            font-size: .82rem;
            font-weight: 600;
            color: var(--gold);
            opacity: 0;
            transform: translateX(-6px);
            transition: all .3s;
        }

        .feature-card:hover .card-arrow {
            opacity: 1;
            transform: translateX(0);
        }

        /* ── DIVIDER ─────────────────────────────── */
        .divider-line {
            position: relative;
            z-index: 1;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--gold-border), transparent);
            margin: 0 40px;
        }

        /* ── FOOTER ──────────────────────────────── */
        .footer {
            position: relative;
            z-index: 1;
            text-align: center;
            padding: 40px;
            color: var(--muted);
            font-size: .82rem;
        }

        .footer span { color: var(--gold); }

        /* ── ANIMATIONS ──────────────────────────── */
        @keyframes fadeDown {
            from { opacity: 0; transform: translateY(-18px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* Floating particles */
        .particles { position: fixed; inset: 0; z-index: 0; pointer-events: none; overflow: hidden; }
        .particle {
            position: absolute;
            width: 2px; height: 2px;
            background: var(--gold);
            border-radius: 50%;
            opacity: 0;
            animation: floatUp var(--dur, 8s) var(--delay, 0s) infinite linear;
        }

        @keyframes floatUp {
            0%   { opacity: 0;   transform: translateY(100vh) scale(0); }
            10%  { opacity: .6; }
            90%  { opacity: .3; }
            100% { opacity: 0;   transform: translateY(-20px) scale(1); }
        }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: var(--black-2); }
        ::-webkit-scrollbar-thumb { background: var(--black-4); border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--gold); }

        @media (max-width: 768px) {
            .navbar { padding: 0 24px; }
            .nav-links { display: none; }
            .section { padding: 60px 24px; }
        }
    </style>
</head>
<body>

    <!-- Background -->
    <div class="bg-grid"></div>
    <div class="bg-glow"></div>

    <!-- Floating Particles -->
    <div class="particles" id="particles"></div>

    <!-- NAVBAR -->
    <nav class="navbar">
        <a href="/" class="nav-logo">DA ✦</a>
        <ul class="nav-links">
            <li><a href="/"><i class="fas fa-house"></i> Home</a></li>
            <li><a href="/mahasiswa"><i class="fas fa-users"></i> Mahasiswa</a></li>
            <li><a href="/portfolio"><i class="fas fa-briefcase"></i> Portfolio</a></li>
        </ul>
    </nav>

    <!-- HERO -->
    <section class="hero">
        <div class="hero-inner">

            <!-- Greeting pill -->
            <div class="greeting-pill">
                <div class="pill-dot"></div>
                Hai, selamat datang 👋
            </div>

            <!-- Hi text -->
            <p class="hero-hi">Perkenalkan, saya</p>

            <!-- Name -->
            <h1 class="hero-name">
                <span class="name-main">Diky </span><span class="name-gold">Ardiyansyah</span>
            </h1>

            <!-- Subtitle -->
            <p class="hero-sub">
                Mahasiswa yang sedang mengeksplorasi dunia <strong style="color:var(--white);">Web Development</strong>
                &amp; membangun sistem informasi yang bermanfaat.
                Selamat datang di halaman portofolio &amp; sistem akademik saya.
            </p>

            <!-- CTA -->
            <div class="hero-cta">
                <a href="/mahasiswa" class="btn-hero-primary" id="btn-cta-mahasiswa">
                    <i class="fas fa-graduation-cap"></i>
                    Lihat Data Mahasiswa
                </a>
                <a href="/portfolio" class="btn-hero-secondary" id="btn-cta-portfolio">
                    <i class="fas fa-briefcase"></i>
                    Portfolio Saya
                </a>
            </div>

        </div>

        <!-- Scroll hint -->
        <div class="scroll-hint">
            <div class="scroll-hint-line"></div>
            <span>SCROLL</span>
        </div>
    </section>

    <!-- DIVIDER -->
    <div class="divider-line"></div>

    <!-- CARDS SECTION -->
    <section class="section">
        <div class="section-label">Jelajahi</div>
        <h2 class="section-title">Yang Bisa Kamu Akses</h2>

        <div class="cards-grid">

            <!-- Card 1: Mahasiswa -->
            <a href="/mahasiswa" class="feature-card" id="card-mahasiswa">
                <div class="card-icon">🎓</div>
                <div class="card-title">Sistem Mahasiswa</div>
                <div class="card-desc">
                    Kelola data mahasiswa lengkap — tambah, edit, hapus, dan cari
                    berdasarkan fakultas maupun program studi.
                </div>
                <div class="card-arrow">
                    Buka Sekarang <i class="fas fa-arrow-right"></i>
                </div>
            </a>

            <!-- Card 2: Portfolio -->
            <a href="/portfolio" class="feature-card" id="card-portfolio">
                <div class="card-icon">💼</div>
                <div class="card-title">Portfolio</div>
                <div class="card-desc">
                    Lihat karya dan proyek yang telah saya kerjakan selama
                    perjalanan belajar di dunia web development.
                </div>
                <div class="card-arrow">
                    Lihat Portfolio <i class="fas fa-arrow-right"></i>
                </div>
            </a>

            <!-- Card 3: About -->
            <a href="/about" class="feature-card" id="card-about">
                <div class="card-icon">✨</div>
                <div class="card-title">Tentang Saya</div>
                <div class="card-desc">
                    Kenali lebih dekat siapa Diky Ardiyansyah, latar belakang,
                    skill, dan goals ke depan sebagai developer muda.
                </div>
                <div class="card-arrow">
                    Selengkapnya <i class="fas fa-arrow-right"></i>
                </div>
            </a>

        </div>
    </section>

    <!-- DIVIDER -->
    <div class="divider-line"></div>

    <!-- FOOTER -->
    <footer class="footer">
        <p>
            Dibuat Oleh <span>Diky Ardiyansyah</span>
        </p>
    </footer>

    <script>
        // Generate floating gold particles
        const container = document.getElementById('particles');
        for (let i = 0; i < 30; i++) {
            const p = document.createElement('div');
            p.className = 'particle';
            p.style.cssText = `
                left: ${Math.random() * 100}%;
                --dur: ${6 + Math.random() * 10}s;
                --delay: ${Math.random() * 10}s;
                width: ${1 + Math.random() * 2}px;
                height: ${1 + Math.random() * 2}px;
                opacity: ${0.2 + Math.random() * 0.5};
            `;
            container.appendChild(p);
        }

        // Typing effect for subtitle word
        const words = ['Web Developer', 'Laravel Enthusiast', 'Mahasiswa Aktif', 'Problem Solver'];
        let wIdx = 0, cIdx = 0, typing = true;
        const el = document.querySelector('.hero-sub strong');
        if (el) {
            setInterval(() => {
                const word = words[wIdx];
                if (typing) {
                    el.textContent = word.slice(0, ++cIdx);
                    if (cIdx === word.length) { typing = false; setTimeout(() => typing = true, 1800); }
                } else {
                    el.textContent = word.slice(0, --cIdx);
                    if (cIdx === 0) { wIdx = (wIdx + 1) % words.length; typing = true; }
                }
            }, 80);
        }

        // Scroll animation for cards
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, i) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, i * 100);
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.feature-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = 'opacity .6s ease, transform .6s ease, border-color .35s, box-shadow .35s';
            observer.observe(card);
        });
    </script>

</body>
</html>