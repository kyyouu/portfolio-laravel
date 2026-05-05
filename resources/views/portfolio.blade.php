<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portfolio Diky Ardiyansyah - Web Developer & Software Engineer.">
    <title>Diky Ardiyansyah | Portfolio</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">

    {{-- Lucide Icons --}}
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        /* ============================================
           DESIGN TOKENS
           ============================================ */
        :root {
            --bg-primary: #080808;
            --bg-secondary: #0f0f0f;
            --bg-card: rgba(20, 18, 10, 0.7);
            --bg-glass: rgba(255, 215, 0, 0.03);

            --text-primary: #F5F0E0;
            --text-secondary: #999080;
            --text-muted: #5a5040;

            --accent-primary: #FFD700;
            --accent-secondary: #FFE55C;
            --accent-cyan: #DAA520;
            --accent-pink: #FFC947;
            --accent-orange: #FFB700;
            --accent-green: #C8A217;

            --gradient-primary: linear-gradient(135deg, #FFD700, #FFE55C, #DAA520);
            --gradient-hero: linear-gradient(135deg, #FFD700 0%, #FFE55C 50%, #DAA520 100%);
            --gradient-card: linear-gradient(135deg, rgba(255,215,0,0.08), rgba(218,165,32,0.04));

            --border-color: rgba(255, 215, 0, 0.15);
            --border-glow: rgba(255, 215, 0, 0.4);

            --shadow-glow: 0 0 40px rgba(255, 215, 0, 0.12);
            --shadow-card: 0 8px 32px rgba(0, 0, 0, 0.6);

            --font-main: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            --font-mono: 'JetBrains Mono', monospace;

            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 20px;
            --radius-xl: 28px;

            --transition-fast: 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-smooth: 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-spring: 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        /* ============================================
           RESET & BASE
           ============================================ */
        *, *::before, *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            overflow: hidden;
        }

        body {
            font-family: var(--font-main);
            background: var(--bg-primary);
            color: var(--text-primary);
            line-height: 1.7;
            -webkit-font-smoothing: antialiased;
            background-image:
                linear-gradient(rgba(255,215,0,0.025) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,215,0,0.025) 1px, transparent 1px);
            background-size: 60px 60px;
        }

        ::selection {
            background: var(--accent-primary);
            color: white;
        }

        /* ============================================
           PARTICLE CANVAS
           ============================================ */
        #particles-canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            pointer-events: none;
        }

        /* ============================================
           CURSOR GLOW
           ============================================ */
        .cursor-glow {
            position: fixed;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255,215,0,0.06) 0%, transparent 70%);
            pointer-events: none;
            z-index: 1;
            transform: translate(-50%, -50%);
            transition: opacity 0.3s;
        }

        /* ============================================
           NAVBAR
           ============================================ */
        .navbar {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 1000;
            padding: 0 40px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(8, 8, 8, 0.92);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border-color);
        }

        .nav-logo {
            font-size: 1.2rem;
            font-weight: 800;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.3px;
            cursor: pointer;
            text-decoration: none;
        }

        .nav-logo span { font-weight: 400; opacity: 0.7; }

        /* nav groups */
        .nav-left { display: flex; align-items: center; gap: 4px; }
        .nav-right { display: flex; align-items: center; gap: 6px; }
        .nav-divider {
            width: 1px; height: 22px;
            background: var(--border-color);
            margin: 0 8px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .nav-links a {
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            padding: 7px 16px;
            border-radius: var(--radius-sm);
            transition: var(--transition-fast);
            position: relative;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .nav-links a:hover {
            color: var(--accent-primary);
            background: rgba(255,215,0,0.08);
        }

        .nav-links a.active {
            color: var(--accent-primary);
            background: rgba(255,215,0,0.10);
        }

        .nav-links a.active::after {
            content: '';
            position: absolute;
            bottom: 2px; left: 50%;
            transform: translateX(-50%);
            width: 20px; height: 2px;
            background: var(--accent-primary);
            border-radius: 1px;
        }

        .nav-cta {
            margin-left: 4px;
            padding: 7px 20px !important;
            background: linear-gradient(135deg, var(--accent-primary), #DAA520) !important;
            color: #000 !important;
            border-radius: var(--radius-sm) !important;
            font-weight: 700 !important;
        }

        .nav-cta:hover {
            transform: translateY(-1px) !important;
            box-shadow: 0 4px 20px rgba(255,215,0,0.3) !important;
        }

        .nav-cta.active::after { display: none; }

        .nav-external {
            padding: 7px 16px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            color: var(--text-secondary) !important;
            font-size: 0.82rem;
            font-weight: 500;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: var(--transition-fast);
        }

        .nav-external:hover {
            border-color: var(--border-glow) !important;
            color: var(--accent-primary) !important;
            background: rgba(255,215,0,0.06) !important;
        }

        .nav-toggle {
            display: none;
            background: none;
            border: none;
            color: var(--text-primary);
            cursor: pointer;
            padding: 8px;
        }

        /* ============================================
           PANELS SYSTEM — Full viewport, no scroll
           ============================================ */
        .panels-container {
            position: fixed;
            top: 70px;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 2;
        }

        .panel {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            opacity: 0;
            visibility: hidden;
            transform: scale(0.96) translateY(20px);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: var(--accent-primary) transparent;
        }

        .panel::-webkit-scrollbar {
            width: 4px;
        }

        .panel::-webkit-scrollbar-thumb {
            background: var(--accent-primary);
            border-radius: 2px;
        }

        .panel.active {
            opacity: 1;
            visibility: visible;
            transform: scale(1) translateY(0);
        }

        .panel-inner {
            width: 100%;
            max-width: 1100px;
            margin: 0 auto;
        }

        /* ============================================
           SECTION HEADERS
           ============================================ */
        .section-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: var(--font-mono);
            font-size: 0.78rem;
            color: var(--accent-primary);
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 14px;
            font-weight: 500;
        }

        .section-label::before {
            content: '';
            width: 20px;
            height: 1px;
            background: var(--accent-primary);
        }

        .section-title {
            font-size: clamp(2rem, 4vw, 2.8rem);
            font-weight: 800;
            margin-bottom: 14px;
            letter-spacing: -1px;
            line-height: 1.2;
        }

        .section-title .gradient {
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .section-subtitle {
            color: var(--text-secondary);
            font-size: 1rem;
            max-width: 550px;
            line-height: 1.7;
            margin-bottom: 36px;
        }

        /* ============================================
           HOME PANEL
           ============================================ */
        .home-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 16px;
            background: rgba(108, 92, 231, 0.1);
            border: 1px solid var(--border-color);
            border-radius: 50px;
            font-size: 0.82rem;
            color: var(--accent-secondary);
            margin-bottom: 24px;
            font-weight: 500;
        }

        .hero-badge .dot {
            width: 8px;
            height: 8px;
            background: var(--accent-green);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        .hero-name {
            font-size: clamp(2.5rem, 5vw, 3.8rem);
            font-weight: 900;
            letter-spacing: -2px;
            line-height: 1.1;
            margin-bottom: 8px;
        }

        .hero-name .gradient {
            background: var(--gradient-hero);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            background-size: 200% auto;
            animation: shimmer 3s ease-in-out infinite;
        }

        .hero-role {
            font-size: 1.2rem;
            color: var(--text-secondary);
            margin-bottom: 22px;
        }

        .hero-role .typed-text {
            color: var(--accent-cyan);
            font-weight: 600;
        }

        .hero-role .cursor-blink {
            display: inline-block;
            width: 2px;
            height: 1.2em;
            background: var(--accent-cyan);
            margin-left: 2px;
            vertical-align: text-bottom;
            animation: blink 1s step-end infinite;
        }

        .hero-desc {
            color: var(--text-secondary);
            font-size: 0.95rem;
            line-height: 1.8;
            margin-bottom: 32px;
            max-width: 480px;
        }

        .hero-buttons {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 13px 26px;
            background: var(--accent-primary);
            color: white;
            border: none;
            border-radius: var(--radius-sm);
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition-fast);
            text-decoration: none;
            font-family: var(--font-main);
        }

        .btn-primary:hover {
            background: #5a4bd4;
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(108, 92, 231, 0.4);
        }

        .btn-outline {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 13px 26px;
            background: transparent;
            color: var(--text-primary);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition-fast);
            text-decoration: none;
            font-family: var(--font-main);
        }

        .btn-outline:hover {
            border-color: var(--accent-primary);
            background: rgba(108, 92, 231, 0.05);
            transform: translateY(-2px);
        }

        .hero-stats {
            display: flex;
            gap: 40px;
            margin-top: 40px;
            padding-top: 28px;
            border-top: 1px solid var(--border-color);
        }

        .stat-item { text-align: left; }

        .stat-number {
            font-size: 1.8rem;
            font-weight: 800;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-label {
            font-size: 0.75rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 500;
        }

        /* Hero Card Visual */
        .hero-visual {
            position: relative;
            width: 360px;
            height: 430px;
            margin: 0 auto;
        }

        .hero-card {
            position: absolute;
            inset: 0;
            background: var(--gradient-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-xl);
            backdrop-filter: blur(10px);
            padding: 36px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: var(--transition-smooth);
            z-index: 2;
        }

        .hero-card:hover {
            border-color: var(--border-glow);
            box-shadow: var(--shadow-glow);
            transform: translateY(-5px);
        }

        .hero-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: var(--gradient-primary);
            padding: 3px;
            margin-bottom: 20px;
            position: relative;
        }

        .hero-avatar img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            object-position: center top;
            display: block;
        }

        .hero-card-name { font-size: 1.3rem; font-weight: 700; margin-bottom: 4px; }
        .hero-card-role { color: var(--accent-secondary); font-size: 0.88rem; margin-bottom: 20px; }

        .hero-card-tech { display: flex; gap: 8px; flex-wrap: wrap; justify-content: center; }

        .tech-pill {
            padding: 5px 14px;
            background: rgba(108, 92, 231, 0.1);
            border: 1px solid var(--border-color);
            border-radius: 50px;
            font-size: 0.72rem;
            color: var(--text-secondary);
            font-weight: 500;
            transition: var(--transition-fast);
        }

        .tech-pill:hover {
            border-color: var(--accent-primary);
            color: var(--accent-secondary);
            transform: translateY(-2px);
        }

        .orbit {
            position: absolute;
            border-radius: 50%;
            border: 1px dashed var(--border-color);
            animation: spin 20s linear infinite;
            z-index: 1;
        }

        .orbit-1 {
            width: 400px; height: 400px;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
        }

        .orbit-2 {
            width: 480px; height: 480px;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            animation-direction: reverse;
            animation-duration: 30s;
            opacity: 0.4;
        }

        .orbit-dot {
            position: absolute;
            width: 8px; height: 8px;
            border-radius: 50%;
            background: var(--accent-primary);
            box-shadow: 0 0 10px var(--accent-primary);
        }

        .orbit-1 .orbit-dot { top: 0; left: 50%; transform: translateX(-50%); }
        .orbit-2 .orbit-dot { bottom: 0; right: 0; }

        /* ============================================
           ABOUT PANEL
           ============================================ */
        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: start;
        }

        .about-text p {
            color: var(--text-secondary);
            margin-bottom: 18px;
            font-size: 0.95rem;
            line-height: 1.8;
        }

        .about-highlights {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .highlight-card {
            padding: 20px;
            background: var(--bg-glass);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            transition: var(--transition-smooth);
        }

        .highlight-card:hover {
            border-color: var(--border-glow);
            transform: translateY(-3px);
            box-shadow: var(--shadow-glow);
        }

        .highlight-icon {
            width: 40px; height: 40px;
            border-radius: var(--radius-sm);
            background: rgba(108, 92, 231, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 12px;
            color: var(--accent-primary);
        }

        .highlight-card h4 { font-size: 0.9rem; font-weight: 600; margin-bottom: 4px; }
        .highlight-card p { font-size: 0.78rem; color: var(--text-muted); margin: 0; }

        /* ============================================
           SKILLS PANEL
           ============================================ */
        .skills-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .skill-category {
            padding: 26px;
            background: var(--bg-glass);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            transition: var(--transition-smooth);
        }

        .skill-category:hover {
            border-color: var(--border-glow);
            box-shadow: var(--shadow-glow);
            transform: translateY(-4px);
        }

        .skill-category-header {
            display: flex; align-items: center; gap: 12px;
            margin-bottom: 18px;
        }

        .skill-category-icon {
            width: 42px; height: 42px;
            border-radius: var(--radius-sm);
            display: flex; align-items: center; justify-content: center;
        }

        .skill-category-icon.frontend { background: rgba(255,215,0,0.12); color: var(--accent-primary); }
        .skill-category-icon.backend  { background: rgba(218,165,32,0.12); color: var(--accent-cyan); }
        .skill-category-icon.tools    { background: rgba(255,183,0,0.12);  color: var(--accent-pink); }

        .skill-category h3 { font-size: 1rem; font-weight: 700; }

        .skill-list { display: flex; flex-direction: column; gap: 14px; }

        .skill-item { display: flex; flex-direction: column; gap: 6px; }

        .skill-info { display: flex; justify-content: space-between; font-size: 0.84rem; }
        .skill-info span:first-child { font-weight: 500; }
        .skill-info span:last-child { color: var(--text-muted); font-family: var(--font-mono); font-size: 0.78rem; }

        .skill-bar {
            height: 6px;
            background: rgba(255,255,255,0.05);
            border-radius: 3px;
            overflow: hidden;
        }

        .skill-bar-fill {
            height: 100%; border-radius: 3px;
            width: 0;
            transition: width 1.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .skill-bar-fill.purple { background: linear-gradient(90deg, var(--accent-primary), var(--accent-secondary)); }
        .skill-bar-fill.cyan   { background: linear-gradient(90deg, #B8860B, var(--accent-cyan)); }
        .skill-bar-fill.pink   { background: linear-gradient(90deg, #DAA520, var(--accent-pink)); }

        /* ============================================
           EDUCATION PANEL
           ============================================ */
        .timeline {
            position: relative;
            padding-left: 40px;
            margin-top: 10px;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 15px; top: 0; bottom: 0;
            width: 2px;
            background: linear-gradient(180deg, var(--accent-primary), var(--accent-cyan), transparent);
        }

        .timeline-item {
            position: relative;
            margin-bottom: 36px;
        }

        .timeline-dot {
            position: absolute;
            left: -33px; top: 6px;
            width: 12px; height: 12px;
            border-radius: 50%;
            background: var(--accent-primary);
            border: 3px solid var(--bg-primary);
            box-shadow: 0 0 0 3px var(--accent-primary);
        }

        .timeline-content {
            padding: 24px;
            background: var(--bg-glass);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            transition: var(--transition-smooth);
        }

        .timeline-content:hover {
            border-color: var(--border-glow);
            box-shadow: var(--shadow-glow);
        }

        .timeline-date {
            font-family: var(--font-mono);
            font-size: 0.78rem;
            color: var(--accent-secondary);
            margin-bottom: 8px;
            font-weight: 500;
        }

        .timeline-content h3 { font-size: 1.1rem; font-weight: 700; margin-bottom: 4px; }
        .timeline-content h4 { font-size: 0.9rem; color: var(--accent-cyan); font-weight: 500; margin-bottom: 8px; }
        .timeline-content p { color: var(--text-secondary); font-size: 0.86rem; }

        /* ============================================
           PROJECTS PANEL
           ============================================ */
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .project-card {
            background: var(--bg-glass);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            overflow: hidden;
            transition: var(--transition-smooth);
        }

        .project-card:hover {
            border-color: var(--border-glow);
            box-shadow: var(--shadow-glow);
            transform: translateY(-6px);
        }

        .project-image {
            height: 160px;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .project-emoji {
            font-size: 3.5rem;
            transition: var(--transition-spring);
        }

        .project-card:hover .project-emoji {
            transform: scale(1.15) rotate(-5deg);
        }

        .project-image::after {
            content: '';
            position: absolute; inset: 0;
            background: linear-gradient(180deg, transparent 50%, var(--bg-card));
        }

        .project-number {
            position: absolute;
            top: 14px; right: 14px;
            font-family: var(--font-mono);
            font-size: 0.72rem;
            color: var(--text-muted);
            background: rgba(0,0,0,0.4);
            padding: 4px 12px;
            border-radius: 50px;
            backdrop-filter: blur(10px);
            z-index: 1;
        }

        .project-body { padding: 22px; }
        .project-body h3 { font-size: 1.1rem; font-weight: 700; margin-bottom: 8px; transition: var(--transition-fast); }
        .project-card:hover .project-body h3 { color: var(--accent-secondary); }
        .project-body p { color: var(--text-secondary); font-size: 0.84rem; margin-bottom: 14px; line-height: 1.6; }

        .project-tags { display: flex; gap: 6px; flex-wrap: wrap; margin-bottom: 16px; }

        .project-tag {
            padding: 3px 10px;
            background: rgba(108,92,231,0.08);
            border: 1px solid var(--border-color);
            border-radius: 50px;
            font-size: 0.7rem;
            color: var(--text-secondary);
            font-weight: 500;
            font-family: var(--font-mono);
        }

        .project-links { display: flex; gap: 12px; }

        .project-link {
            display: inline-flex; align-items: center; gap: 6px;
            color: var(--text-secondary); font-size: 0.8rem;
            text-decoration: none; font-weight: 500;
            transition: var(--transition-fast);
        }

        .project-link:hover { color: var(--accent-secondary); }

        /* ============================================
           CONTACT PANEL
           ============================================ */
        .contact-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
        }

        .contact-info { display: flex; flex-direction: column; gap: 18px; }

        .contact-item {
            display: flex; align-items: center; gap: 16px;
            padding: 18px;
            background: var(--bg-glass);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            transition: var(--transition-smooth);
            text-decoration: none; color: inherit;
        }

        .contact-item:hover {
            border-color: var(--border-glow);
            transform: translateX(8px);
            box-shadow: var(--shadow-glow);
        }

        .contact-icon {
            width: 46px; height: 46px;
            border-radius: var(--radius-sm);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }

        .contact-icon.email     { background: rgba(255,215,0,0.12); color: var(--accent-primary); }
        .contact-icon.github    { background: rgba(255,215,0,0.07); color: var(--accent-secondary); }
        .contact-icon.linkedin  { background: rgba(218,165,32,0.12); color: var(--accent-cyan); }
        .contact-icon.instagram { background: rgba(255,183,0,0.12);  color: var(--accent-pink); }

        .contact-item-text h4 { font-size: 0.9rem; font-weight: 600; margin-bottom: 2px; }
        .contact-item-text p { font-size: 0.8rem; color: var(--text-muted); margin: 0; }

        .contact-form { display: flex; flex-direction: column; gap: 14px; }

        .form-group { display: flex; flex-direction: column; gap: 6px; }
        .form-group label { font-size: 0.8rem; font-weight: 600; color: var(--text-secondary); }

        .form-group input,
        .form-group textarea {
            padding: 13px 16px;
            background: var(--bg-glass);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
            color: var(--text-primary);
            font-family: var(--font-main);
            font-size: 0.9rem;
            transition: var(--transition-fast);
            outline: none;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: var(--accent-primary);
            box-shadow: 0 0 0 3px rgba(108,92,231,0.1);
        }

        .form-group textarea { resize: vertical; min-height: 100px; }

        /* ============================================
           PAGE INDICATOR (right side dots)
           ============================================ */
        .page-indicator {
            position: fixed;
            right: 24px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 100;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .page-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--border-color);
            cursor: pointer;
            transition: var(--transition-smooth);
            position: relative;
        }

        .page-dot:hover {
            background: var(--accent-secondary);
            transform: scale(1.3);
        }

        .page-dot.active {
            background: var(--accent-primary);
            box-shadow: 0 0 12px rgba(255,215,0,0.5);
            transform: scale(1.3);
        }

        .page-dot::before {
            content: attr(data-label);
            position: absolute;
            right: 22px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 0.72rem;
            color: var(--text-muted);
            white-space: nowrap;
            opacity: 0;
            transition: var(--transition-fast);
            pointer-events: none;
            font-weight: 500;
        }

        .page-dot:hover::before {
            opacity: 1;
        }

        /* ============================================
           PANEL ENTER ANIMATIONS
           ============================================ */
        .panel .anim-item {
            opacity: 0;
            transform: translateY(25px);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .panel.active .anim-item {
            opacity: 1;
            transform: translateY(0);
        }

        .panel.active .anim-item:nth-child(1) { transition-delay: 0.1s; }
        .panel.active .anim-item:nth-child(2) { transition-delay: 0.2s; }
        .panel.active .anim-item:nth-child(3) { transition-delay: 0.3s; }
        .panel.active .anim-item:nth-child(4) { transition-delay: 0.35s; }
        .panel.active .anim-item:nth-child(5) { transition-delay: 0.4s; }
        .panel.active .anim-item:nth-child(6) { transition-delay: 0.45s; }

        /* ============================================
           FOOTER BAR (bottom of screen)
           ============================================ */
        .footer-bar {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 100;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(8,8,8,0.85);
            backdrop-filter: blur(10px);
            border-top: 1px solid var(--border-color);
            font-size: 0.78rem;
            color: var(--text-muted);
        }

        .footer-bar .heart {
            color: var(--accent-pink);
            display: inline-block;
            animation: heartbeat 1.5s ease infinite;
        }

        /* ============================================
           KEYFRAMES
           ============================================ */
        @keyframes shimmer {
            0%, 100% { background-position: 0% center; }
            50% { background-position: 200% center; }
        }

        @keyframes blink { 50% { opacity: 0; } }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(1.5); }
        }

        @keyframes spin {
            from { transform: translate(-50%, -50%) rotate(0deg); }
            to { transform: translate(-50%, -50%) rotate(360deg); }
        }

        @keyframes heartbeat {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.2); }
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 968px) {
            .home-content {
                grid-template-columns: 1fr;
                gap: 30px;
                text-align: center;
            }

            .hero-desc { max-width: 100%; margin-left: auto; margin-right: auto; }
            .hero-buttons { justify-content: center; }
            .hero-stats { justify-content: center; }

            .hero-visual { width: 280px; height: 340px; order: -1; }

            .about-grid, .contact-wrapper { grid-template-columns: 1fr; gap: 30px; }
            .projects-grid, .skills-grid { grid-template-columns: 1fr 1fr; }

            .panel { padding: 30px; }
            .orbit { display: none; }
            .page-indicator { display: none; }
        }

        @media (max-width: 640px) {
            .nav-links {
                display: none;
                position: absolute;
                top: 70px; left: 0; right: 0;
                background: rgba(8,8,8,0.98);
                backdrop-filter: blur(20px);
                flex-direction: column;
                padding: 20px;
                border-bottom: 1px solid var(--border-color);
            }

            .nav-links.show { display: flex; }
            .nav-toggle { display: block; }

            .hero-stats { flex-direction: column; gap: 16px; align-items: center; }
            .about-highlights, .skills-grid, .projects-grid { grid-template-columns: 1fr; }

            .hero-visual { width: 220px; height: 280px; }
            .hero-avatar { width: 90px; height: 90px; font-size: 2.2rem; }

            .panel { padding: 20px 16px; }
            .navbar { padding: 0 16px; }
        }
    </style>
</head>
<body>

    {{-- Particle Background --}}
    <canvas id="particles-canvas"></canvas>
    <div class="cursor-glow" id="cursorGlow"></div>

    {{-- ====== NAVBAR ====== --}}
    <nav class="navbar" id="navbar">
        <a class="nav-logo" onclick="switchPanel('home')">DA<span> ✦</span></a>

        <div class="nav-links" id="navLinks">
            {{-- Internal portfolio sections --}}
            <a onclick="switchPanel('home')"      class="active" data-panel="home">Home</a>
            <a onclick="switchPanel('about')"     data-panel="about">About</a>
            <a onclick="switchPanel('skills')"    data-panel="skills">Skills</a>
            <a onclick="switchPanel('education')" data-panel="education">Education</a>
            <a onclick="switchPanel('projects')"  data-panel="projects">Projects</a>
            <a onclick="switchPanel('contact')"   data-panel="contact" class="nav-cta">Contact</a>

            {{-- Divider --}}
            <div class="nav-divider"></div>

            {{-- External links --}}
            <a href="/" class="nav-external">
                <i data-lucide="home" style="width:15px;height:15px;"></i> Home
            </a>
            <a href="/mahasiswa" class="nav-external">
                <i data-lucide="graduation-cap" style="width:15px;height:15px;"></i> Mahasiswa
            </a>
        </div>

        <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation">
            <i data-lucide="menu" style="width:24px;height:24px;"></i>
        </button>
    </nav>

    {{-- ====== PAGE INDICATOR DOTS ====== --}}
    <div class="page-indicator">
        <div class="page-dot active" data-label="Home" onclick="switchPanel('home')"></div>
        <div class="page-dot" data-label="About" onclick="switchPanel('about')"></div>
        <div class="page-dot" data-label="Skills" onclick="switchPanel('skills')"></div>
        <div class="page-dot" data-label="Education" onclick="switchPanel('education')"></div>
        <div class="page-dot" data-label="Projects" onclick="switchPanel('projects')"></div>
        <div class="page-dot" data-label="Contact" onclick="switchPanel('contact')"></div>
    </div>

    {{-- ====== PANELS CONTAINER ====== --}}
    <div class="panels-container">

        {{-- ===== HOME ===== --}}
        <div class="panel active" id="panel-home">
            <div class="panel-inner">
                <div class="home-content">
                    <div class="anim-item">
                        <div class="hero-badge">
                            <span class="dot"></span>
                            Available for opportunities
                        </div>
                        <h1 class="hero-name">
                            Hi, I'm<br>
                            <span class="gradient">{{ $profil['nama'] }}</span>
                        </h1>
                        <p class="hero-role">
                            I build <span class="typed-text" id="typedText"></span><span class="cursor-blink"></span>
                        </p>
                        <p class="hero-desc">{{ $profil['bio'] }}</p>
                        <div class="hero-buttons">
                            <a onclick="switchPanel('projects')" class="btn-primary">
                                <i data-lucide="folder-open" style="width:18px;height:18px;"></i>
                                Lihat Project
                            </a>
                            <a onclick="switchPanel('contact')" class="btn-outline">
                                <i data-lucide="send" style="width:18px;height:18px;"></i>
                                Hubungi Saya
                            </a>
                        </div>
                        <div class="hero-stats">
                            @foreach ($stats as $stat)
                            <div class="stat-item">
                                <div class="stat-number" data-count="{{ (int) $stat['angka'] }}">{{ $stat['angka'] }}</div>
                                <div class="stat-label">{{ $stat['label'] }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="anim-item">
                        <div class="hero-visual">
                            <div class="orbit orbit-1"><div class="orbit-dot"></div></div>
                            <div class="orbit orbit-2"><div class="orbit-dot"></div></div>
                            <div class="hero-card">
                                <div class="hero-avatar"><img src="{{ asset('foto_profil.jpeg') }}" alt="Diky Ardiyansyah"></div>
                                <div class="hero-card-name">{{ $profil['nama'] }}</div>
                                <div class="hero-card-role">{{ $profil['role'] }}</div>
                                <div class="hero-card-tech">
                                    @foreach (array_keys($skills) as $kategori)
                                        @foreach ($skills[$kategori] as $sk)
                                            @if ($loop->index < 2)
                                                <span class="tech-pill">{{ $sk['nama'] }}</span>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ===== ABOUT ===== --}}
        <div class="panel" id="panel-about">
            <div class="panel-inner">
                <div class="anim-item">
                    <span class="section-label">About Me</span>
                    <h2 class="section-title">Passionate <span class="gradient">Developer</span></h2>
                    <p class="section-subtitle">Mengenal lebih dekat tentang perjalanan dan semangat saya di dunia teknologi.</p>
                </div>

                <div class="about-grid">
                    <div class="about-text anim-item">
                        <p>
                            Saya adalah mahasiswa Teknik Informatika di <strong>Universitas Muhammadiyah Cirebon</strong> 
                            yang memiliki ketertarikan besar di bidang pengembangan web dan rekayasa perangkat lunak.
                        </p>
                        <p>
                            Saya percaya bahwa teknologi dapat mengubah dunia, dan saya ingin menjadi bagian dari perubahan tersebut. 
                            Setiap hari, saya terus belajar dan mengasah kemampuan saya dalam membangun aplikasi web yang fungsional, 
                            estetis, dan memberikan pengalaman pengguna yang luar biasa.
                        </p>
                        <p>
                            Selain coding, saya juga aktif mengeksplorasi berbagai teknologi baru dan berkontribusi 
                            dalam proyek-proyek akademik maupun personal.
                        </p>
                    </div>

                    <div class="about-highlights anim-item">
                        <div class="highlight-card">
                            <div class="highlight-icon">
                                <i data-lucide="code-2" style="width:20px;height:20px;"></i>
                            </div>
                            <h4>Clean Code</h4>
                            <p>Menulis kode yang bersih dan terstruktur</p>
                        </div>
                        <div class="highlight-card">
                            <div class="highlight-icon" style="background:rgba(0,206,201,0.1);color:var(--accent-cyan);">
                                <i data-lucide="palette" style="width:20px;height:20px;"></i>
                            </div>
                            <h4>UI/UX Design</h4>
                            <p>Desain antarmuka yang menarik & intuitif</p>
                        </div>
                        <div class="highlight-card">
                            <div class="highlight-icon" style="background:rgba(253,121,168,0.1);color:var(--accent-pink);">
                                <i data-lucide="zap" style="width:20px;height:20px;"></i>
                            </div>
                            <h4>Fast Learner</h4>
                            <p>Cepat adaptasi dengan teknologi baru</p>
                        </div>
                        <div class="highlight-card">
                            <div class="highlight-icon" style="background:rgba(253,203,110,0.1);color:var(--accent-orange);">
                                <i data-lucide="users" style="width:20px;height:20px;"></i>
                            </div>
                            <h4>Team Player</h4>
                            <p>Kolaboratif dan komunikatif dalam tim</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ===== SKILLS ===== --}}
        <div class="panel" id="panel-skills">
            <div class="panel-inner">
                <div class="anim-item">
                    <span class="section-label">Skills</span>
                    <h2 class="section-title">Tech <span class="gradient">Stack</span></h2>
                    <p class="section-subtitle">Teknologi dan tools yang saya kuasai untuk membangun solusi digital.</p>
                </div>

                <div class="skills-grid anim-item">
                    @php
                        $iconMap  = ['Frontend' => 'monitor', 'Backend' => 'server', 'Tools' => 'wrench'];
                        $colorMap = ['Frontend' => 'frontend', 'Backend' => 'backend', 'Tools' => 'tools'];
                        $barMap   = ['Frontend' => 'purple', 'Backend' => 'cyan', 'Tools' => 'pink'];
                    @endphp
                    @foreach ($skills as $kategori => $items)
                    <div class="skill-category">
                        <div class="skill-category-header">
                            <div class="skill-category-icon {{ $colorMap[$kategori] ?? 'frontend' }}">
                                <i data-lucide="{{ $iconMap[$kategori] ?? 'code' }}" style="width:22px;height:22px;"></i>
                            </div>
                            <h3>{{ $kategori }}</h3>
                        </div>
                        <div class="skill-list">
                            @foreach ($items as $sk)
                            <div class="skill-item">
                                <div class="skill-info">
                                    <span>{{ $sk['nama'] }}</span>
                                    <span>{{ $sk['level'] }}%</span>
                                </div>
                                <div class="skill-bar">
                                    <div class="skill-bar-fill {{ $barMap[$kategori] ?? 'purple' }}" data-width="{{ $sk['level'] }}"></div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- ===== EDUCATION ===== --}}
        <div class="panel" id="panel-education">
            <div class="panel-inner">
                <div class="anim-item">
                    <span class="section-label">Education</span>
                    <h2 class="section-title">Academic <span class="gradient">Journey</span></h2>
                    <p class="section-subtitle">Perjalanan pendidikan saya dalam membangun fondasi ilmu teknologi informasi.</p>
                </div>

                <div class="timeline anim-item">
                    @foreach ($pendidikan as $pend)
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-content">
                            <div class="timeline-date">{{ $pend['tahun'] }}</div>
                            <h3>{{ $pend['institusi'] }}</h3>
                            <h4>{{ $pend['jurusan'] }}</h4>
                            <p>{{ $pend['deskripsi'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- ===== PROJECTS ===== --}}
        <div class="panel" id="panel-projects">
            <div class="panel-inner">
                <div class="anim-item">
                    <span class="section-label">Projects</span>
                    <h2 class="section-title">Featured <span class="gradient">Works</span></h2>
                    <p class="section-subtitle">Beberapa proyek yang telah saya kerjakan, dari sistem informasi hingga aplikasi web modern.</p>
                </div>

                <div class="projects-grid anim-item">
                    @foreach ($projects as $i => $project)
                    <div class="project-card">
                        <div class="project-image" style="background: linear-gradient(135deg, {{ $project['warna'] }}, rgba(0,0,0,0.1));">
                            <span class="project-emoji">{{ $project['emoji'] }}</span>
                            <span class="project-number">#{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        <div class="project-body">
                            <h3>{{ $project['judul'] }}</h3>
                            <p>{{ $project['deskripsi'] }}</p>
                            <div class="project-tags">
                                @foreach ($project['tags'] as $tag)
                                    <span class="project-tag">{{ $tag }}</span>
                                @endforeach
                            </div>
                            <div class="project-links">
                                <a href="{{ $project['demo'] }}" class="project-link">
                                    <i data-lucide="external-link" style="width:15px;height:15px;"></i> Live Demo
                                </a>
                                <a href="{{ $project['github'] }}" class="project-link">
                                    <i data-lucide="github" style="width:15px;height:15px;"></i> Source
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- ===== CONTACT ===== --}}
        <div class="panel" id="panel-contact">
            <div class="panel-inner">
                <div class="anim-item">
                    <span class="section-label">Contact</span>
                    <h2 class="section-title">Let's <span class="gradient">Connect</span></h2>
                    <p class="section-subtitle">Tertarik untuk berkolaborasi? Jangan ragu untuk menghubungi saya.</p>
                </div>

                <div class="contact-wrapper anim-item">
                    <div class="contact-info">
                        <a href="mailto:{{ $profil['email'] }}" class="contact-item">
                            <div class="contact-icon email">
                                <i data-lucide="mail" style="width:22px;height:22px;"></i>
                            </div>
                            <div class="contact-item-text">
                                <h4>Email</h4>
                                <p>{{ $profil['email'] }}</p>
                            </div>
                        </a>
                        <a href="{{ $profil['github'] }}" target="_blank" class="contact-item">
                            <div class="contact-icon github">
                                <i data-lucide="github" style="width:22px;height:22px;"></i>
                            </div>
                            <div class="contact-item-text">
                                <h4>GitHub</h4>
                                <p>{{ $profil['github'] }}</p>
                            </div>
                        </a>
                        <a href="{{ $profil['linkedin'] }}" target="_blank" class="contact-item">
                            <div class="contact-icon linkedin">
                                <i data-lucide="linkedin" style="width:22px;height:22px;"></i>
                            </div>
                            <div class="contact-item-text">
                                <h4>LinkedIn</h4>
                                <p>{{ $profil['linkedin'] }}</p>
                            </div>
                        </a>
                        <a href="{{ $profil['instagram'] }}" target="_blank" class="contact-item">
                            <div class="contact-icon instagram">
                                <i data-lucide="instagram" style="width:22px;height:22px;"></i>
                            </div>
                            <div class="contact-item-text">
                                <h4>Instagram</h4>
                                <p>{{ $profil['instagram'] }}</p>
                            </div>
                        </a>
                    </div>

                    <form class="contact-form" method="POST" action="{{ route('portfolio.contact') }}">
                        @csrf
                        @if (session('success'))
                            <div style="padding:12px 16px;background:rgba(0,184,148,0.1);border:1px solid var(--accent-green);border-radius:var(--radius-sm);color:var(--accent-green);font-size:0.85rem;">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" id="name" name="name" placeholder="Masukkan nama Anda" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email-input">Email</label>
                            <input type="email" id="email-input" name="email" placeholder="nama@email.com" value="{{ old('email') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Pesan</label>
                            <textarea id="message" name="message" placeholder="Tulis pesan Anda di sini..." required>{{ old('message') }}</textarea>
                        </div>
                        <button type="submit" class="btn-primary" style="width:100%;justify-content:center;">
                            <i data-lucide="send" style="width:18px;height:18px;"></i>
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>

    {{-- ====== FOOTER BAR ====== --}}
    <div class="footer-bar">
        © 2026 Diky Ardiyansyah 
    </div>

    {{-- ====== JAVASCRIPT ====== --}}
    <script>
        // ============================================
        // PANEL NAVIGATION SYSTEM
        // ============================================
        const panelNames = ['home', 'about', 'skills', 'education', 'projects', 'contact'];
        let currentPanel = 'home';

        function switchPanel(name) {
            if (name === currentPanel) return;

            // Deactivate all panels
            document.querySelectorAll('.panel').forEach(p => p.classList.remove('active'));
            // Activate target
            const target = document.getElementById('panel-' + name);
            if (target) {
                target.classList.add('active');
                // Reset scroll to top when switching
                target.scrollTop = 0;
            }

            // Update navbar active
            document.querySelectorAll('.nav-links a').forEach(a => a.classList.remove('active'));
            const navLink = document.querySelector(`.nav-links a[data-panel="${name}"]`);
            if (navLink) navLink.classList.add('active');

            // Update page dots
            const dots = document.querySelectorAll('.page-dot');
            const idx = panelNames.indexOf(name);
            dots.forEach((d, i) => d.classList.toggle('active', i === idx));

            currentPanel = name;

            // Trigger skill bar animations when skills panel activates
            if (name === 'skills') {
                setTimeout(animateSkillBars, 400);
            }

            // Trigger counter animation when home panel activates
            if (name === 'home') {
                setTimeout(animateCounters, 500);
            }

            // Close mobile nav
            document.getElementById('navLinks').classList.remove('show');
        }

        // Keyboard navigation (arrow keys)
        document.addEventListener('keydown', (e) => {
            const idx = panelNames.indexOf(currentPanel);
            if (e.key === 'ArrowRight' || e.key === 'ArrowDown') {
                e.preventDefault();
                if (idx < panelNames.length - 1) switchPanel(panelNames[idx + 1]);
            } else if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') {
                e.preventDefault();
                if (idx > 0) switchPanel(panelNames[idx - 1]);
            }
        });

        // ============================================
        // PARTICLE BACKGROUND
        // ============================================
        const canvas = document.getElementById('particles-canvas');
        const ctx = canvas.getContext('2d');
        let particles = [];
        let mouse = { x: null, y: null };

        function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }

        class Particle {
            constructor() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.size = Math.random() * 2 + 0.5;
                this.speedX = (Math.random() - 0.5) * 0.4;
                this.speedY = (Math.random() - 0.5) * 0.4;
                this.opacity = Math.random() * 0.5 + 0.1;
            }

            update() {
                this.x += this.speedX;
                this.y += this.speedY;
                if (this.x > canvas.width) this.x = 0;
                if (this.x < 0) this.x = canvas.width;
                if (this.y > canvas.height) this.y = 0;
                if (this.y < 0) this.y = canvas.height;

                if (mouse.x !== null) {
                    const dx = mouse.x - this.x;
                    const dy = mouse.y - this.y;
                    const dist = Math.sqrt(dx * dx + dy * dy);
                    if (dist < 120) {
                        this.x -= dx * 0.008;
                        this.y -= dy * 0.008;
                    }
                }
            }

            draw() {
                ctx.fillStyle = `rgba(255, 215, 0, ${this.opacity})`;
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fill();
            }
        }

        function initParticles() {
            particles = [];
            const count = Math.min(80, Math.floor((canvas.width * canvas.height) / 18000));
            for (let i = 0; i < count; i++) particles.push(new Particle());
        }

        function connectParticles() {
            for (let i = 0; i < particles.length; i++) {
                for (let j = i + 1; j < particles.length; j++) {
                    const dx = particles[i].x - particles[j].x;
                    const dy = particles[i].y - particles[j].y;
                    const dist = Math.sqrt(dx * dx + dy * dy);
                    if (dist < 140) {
                        ctx.strokeStyle = `rgba(255, 215, 0, ${0.05 * (1 - dist / 140)})`;
                        ctx.lineWidth = 0.5;
                        ctx.beginPath();
                        ctx.moveTo(particles[i].x, particles[i].y);
                        ctx.lineTo(particles[j].x, particles[j].y);
                        ctx.stroke();
                    }
                }
            }
        }

        function animateParticles() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particles.forEach(p => { p.update(); p.draw(); });
            connectParticles();
            requestAnimationFrame(animateParticles);
        }

        resizeCanvas();
        initParticles();
        animateParticles();

        window.addEventListener('resize', () => { resizeCanvas(); initParticles(); });
        window.addEventListener('mousemove', (e) => {
            mouse.x = e.clientX;
            mouse.y = e.clientY;
            const glow = document.getElementById('cursorGlow');
            glow.style.left = e.clientX + 'px';
            glow.style.top = e.clientY + 'px';
        });

        // ============================================
        // TYPING EFFECT
        // ============================================
        const typedTextEl = document.getElementById('typedText');
        const phrases = ['Web Applications', 'Modern UI/UX', 'Clean Code', 'Digital Solutions', 'Laravel Apps'];
        let phraseIndex = 0, charIndex = 0, isDeleting = false, typeSpeed = 100;

        function typeEffect() {
            const currentPhrase = phrases[phraseIndex];
            if (!isDeleting) {
                typedTextEl.textContent = currentPhrase.substring(0, charIndex + 1);
                charIndex++;
                if (charIndex === currentPhrase.length) { isDeleting = true; typeSpeed = 2000; }
            } else {
                typedTextEl.textContent = currentPhrase.substring(0, charIndex - 1);
                charIndex--;
                typeSpeed = 50;
                if (charIndex === 0) { isDeleting = false; phraseIndex = (phraseIndex + 1) % phrases.length; typeSpeed = 200; }
            }
            setTimeout(typeEffect, typeSpeed);
        }
        typeEffect();

        // ============================================
        // COUNTER ANIMATION
        // ============================================
        let counterAnimated = false;
        function animateCounters() {
            if (counterAnimated) return;
            counterAnimated = true;
            document.querySelectorAll('.stat-number').forEach(counter => {
                const target = parseInt(counter.getAttribute('data-count'));
                let current = 0;
                const increment = target / 40;
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) { counter.textContent = target + '+'; clearInterval(timer); }
                    else { counter.textContent = Math.floor(current) + '+'; }
                }, 50);
            });
        }
        setTimeout(animateCounters, 800);

        // ============================================
        // SKILL BAR ANIMATION
        // ============================================
        function animateSkillBars() {
            document.querySelectorAll('.skill-bar-fill').forEach(bar => {
                bar.style.width = '0%';
                setTimeout(() => {
                    bar.style.width = bar.getAttribute('data-width') + '%';
                }, 100);
            });
        }

        // ============================================
        // MOBILE NAV TOGGLE
        // ============================================
        document.getElementById('navToggle').addEventListener('click', () => {
            document.getElementById('navLinks').classList.toggle('show');
        });

        // ============================================
        // FORM HANDLER
        // ============================================
        function handleFormSubmit(e) {
            e.preventDefault();
            const btn = e.target.querySelector('button[type="submit"]');
            const originalHTML = btn.innerHTML;
            btn.innerHTML = '<i data-lucide="check" style="width:18px;height:18px;"></i> Pesan Terkirim!';
            btn.style.background = '#00b894';
            lucide.createIcons();
            setTimeout(() => {
                btn.innerHTML = originalHTML;
                btn.style.background = '';
                lucide.createIcons();
                e.target.reset();
            }, 3000);
        }

        // ============================================
        // INIT LUCIDE ICONS
        // ============================================
        lucide.createIcons();
    </script>
</body>
</html>