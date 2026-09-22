<!DOCTYPE html>
<html lang="id" class="scroll-smooth dark">
<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    {{-- SEO: Primary Meta Tags --}}
    <title>@yield('title', 'Mobil 1 Team RG | Official Motorsport Enterprise')</title>
    <meta name="description" content="@yield('meta_description', 'Official portal of Mobil 1 Team RG — World-class international racing team competing in Formula 1, WEC, IMSA, IndyCar, and Rally.')">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="@yield('canonical', url()->current())">

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Mobil 1 Team RG">
    <meta property="og:title" content="@yield('title', 'Mobil 1 Team RG | Official Motorsport Enterprise')">
    <meta property="og:description" content="@yield('meta_description', 'Official portal of Mobil 1 Team RG — World-class international racing team competing in Formula 1, WEC, IMSA, IndyCar, and Rally.')">
    <meta property="og:url" content="@yield('canonical', url()->current())">
    <meta property="og:image" content="@yield('og_image', asset('images/og-default.jpg'))">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Mobil 1 Team RG | Official Motorsport Enterprise')">
    <meta name="twitter:description" content="@yield('meta_description', 'Official portal of Mobil 1 Team RG — World-class international racing team competing in Formula 1, WEC, IMSA, IndyCar, and Rally.')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/og-default.jpg'))">

    {{-- Structured Data --}}
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "SportsTeam",
      "name": "Mobil 1 Team RG",
      "sport": "Motorsport",
      "url": "https://mobil1teamrg.com",
      "description": "Official portal of Mobil 1 Team RG — World-class international racing team competing in Formula 1, WEC, IMSA, IndyCar, and Rally."
    }
    </script>

    {{-- Google Fonts: Albert Sans (Display & UI) + Sora (Body) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Albert+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&family=Sora:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;600;800&display=swap" rel="stylesheet">

    {{-- Tailwind CSS CDN --}}
    <link rel="dns-prefetch" href="https://cdn.tailwindcss.com">
    <script src="https://cdn.tailwindcss.com"></script>
    
    {{-- Midtrans Snap.js Client Library --}}
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
    
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        bg:             '#111315',
                        surface:        '#171B20',
                        card:           '#20252C',
                        hover:          '#282E37',
                        border:         'rgba(255,255,255,0.06)',
                        'border-bright':'rgba(255,255,255,0.12)',
                        primary:        '#B8E637',
                        'primary-hover':'#C7F157',
                        secondary:      '#F4B63D',
                        heading:        '#F8FAFC',
                        body:           '#D2D6DC',
                        muted:          '#8C96A3',
                        danger:         '#E5484D',
                        success:        '#38C172',
                        // Legacy Aliases
                        pitch:          '#111315',
                        carbon:         '#171B20',
                        'carbon-2':     '#20252C',
                        'carbon-3':     '#282E37',
                        rgr:            '#B8E637',
                        'rgr-2':        '#F4B63D',
                        'rgr-dark':     '#96B81C',
                        pure:           '#F8FAFC',
                        faint:          '#546063',
                    },
                    fontFamily: {
                        'display': ['Albert Sans', 'sans-serif'],
                        'body':    ['Sora', 'sans-serif'],
                        'ui':      ['Albert Sans', 'sans-serif'],
                        'mono':    ['JetBrains Mono', 'monospace'],
                    },
                    boxShadow: {
                        'rgr-glow':    '0 0 20px rgba(184,230,55,0.2), 0 0 60px rgba(184,230,55,0.08)',
                        'rgr-glow-lg': '0 0 40px rgba(184,230,55,0.3), 0 0 100px rgba(184,230,55,0.12)',
                        'card':        '0 20px 60px rgba(0,0,0,0.5)',
                        'card-hover':  '0 30px 80px rgba(0,0,0,0.8), 0 0 40px rgba(184,230,55,0.1)',
                    },
                },
            },
        }
    </script>

    {{-- Alpine.js --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        /* ══════════════════════════════════════════════════════════
           PREMIUM MOTORSPORT DESIGN SYSTEM — MOBIL 1 TEAM RG
           ══════════════════════════════════════════════════════════ */
        :root {
            --bg: #111315;
            --surface: #171B20;
            --card: #20252C;
            --hover: #282E37;
            --border: rgba(255,255,255,0.06);
            --primary: #B8E637;
            --primary-hover: #C7F157;
            --secondary: #F4B63D;
            --heading: #F8FAFC;
            --body: #D2D6DC;
            --muted: #8C96A3;
            --danger: #E5484D;
            --success: #38C172;

            --topbar-h: 32px;
            --navbar-h: 68px;
            --nav-total: 100px;
        }

        *, *::before, *::after { box-sizing: border-box; }
        html { font-size: 16px; background-color: #111315; color: #D2D6DC; }
        body {
            background-color: #111315;
            color: #D2D6DC;
            font-family: 'Sora', sans-serif;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Prevent white flash / white card defaults */
        div, section, article, header, footer, nav, main, aside, form, input, select, textarea, button {
            border-color: rgba(255,255,255,0.06);
        }

        /* ── Scrollbar ───────────────────────────────────────────── */
        ::-webkit-scrollbar { width: 5px; height: 5px; }
        ::-webkit-scrollbar-track { background: #111315; }
        ::-webkit-scrollbar-thumb { background: #B8E637; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #C7F157; }

        /* ── Typography & Hierarchy ──────────────────────────────── */
        .text-heading { color: #F8FAFC; }
        .text-body { color: #D2D6DC; }
        .text-muted { color: #8C96A3; }
        .text-primary { color: #B8E637; }
        .text-secondary { color: #F4B63D; }

        .font-display { font-family: 'Albert Sans', sans-serif; }
        .font-body { font-family: 'Sora', sans-serif; }
        .font-mono { font-family: 'JetBrains Mono', monospace; }

        .display-title {
            font-family: 'Albert Sans', sans-serif;
            font-weight: 900;
            font-size: clamp(2.2rem, 5vw, 4.5rem);
            line-height: 1.02;
            letter-spacing: -0.03em;
            color: #F8FAFC;
            text-transform: uppercase;
        }

        .section-eyebrow {
            font-family: 'Albert Sans', sans-serif;
            font-weight: 800;
            font-size: 0.72rem;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: #B8E637;
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
        }
        .section-eyebrow::before {
            content: '';
            display: block;
            width: 24px;
            height: 2px;
            background: #B8E637;
            flex-shrink: 0;
        }

        .section-title-std {
            font-family: 'Albert Sans', sans-serif;
            font-weight: 900;
            font-size: clamp(1.8rem, 3.5vw, 2.8rem);
            line-height: 1.1;
            letter-spacing: -0.02em;
            color: #F8FAFC;
        }

        .section-subtitle {
            font-family: 'Sora', sans-serif;
            font-size: 0.95rem;
            line-height: 1.65;
            color: #8C96A3;
        }

        /* ── Cards & Panels ──────────────────────────────────────── */
        .m1-card {
            background-color: #171B20;
            border: 1px solid rgba(255,255,255,0.06);
            border-radius: 12px;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            overflow: hidden;
        }
        .m1-card-elevated {
            background-color: #20252C;
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 12px;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            overflow: hidden;
        }
        .m1-card:hover, .m1-card-elevated:hover {
            border-color: rgba(184,230,55,0.3);
            background-color: #282E37;
            box-shadow: 0 20px 50px rgba(0,0,0,0.6), 0 0 30px rgba(184,230,55,0.08);
            transform: translateY(-3px);
        }

        .m1-glass {
            background: rgba(23, 27, 32, 0.82);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 12px;
        }

        .card-rgr {
            background-color: #171B20;
            border: 1px solid rgba(255,255,255,0.06);
            border-radius: 12px;
            padding: 1.5rem;
            transition: all 0.3s ease;
        }
        .card-rgr:hover {
            background-color: #20252C;
            border-color: rgba(184,230,55,0.25);
            transform: translateY(-3px);
        }

        /* ── Buttons ─────────────────────────────────────────────── */
        .btn-m1-primary, .btn-primary-rgr, .btn-rgr {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.55rem;
            padding: 0.75rem 1.75rem;
            background: #B8E637;
            color: #111315;
            font-family: 'Albert Sans', sans-serif;
            font-weight: 800;
            font-size: 0.8rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            border: 1px solid #B8E637;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 4px 20px rgba(184,230,55,0.2);
            position: relative;
            overflow: hidden;
            white-space: nowrap;
        }
        .btn-m1-primary:hover, .btn-primary-rgr:hover, .btn-rgr:hover {
            background: #C7F157;
            border-color: #C7F157;
            color: #111315;
            box-shadow: 0 8px 30px rgba(184,230,55,0.4);
            transform: translateY(-2px);
        }

        .btn-m1-secondary, .btn-secondary-rgr {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.55rem;
            padding: 0.75rem 1.75rem;
            background: #20252C;
            color: #F8FAFC;
            font-family: 'Albert Sans', sans-serif;
            font-weight: 700;
            font-size: 0.8rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.25s ease;
            white-space: nowrap;
        }
        .btn-m1-secondary:hover, .btn-secondary-rgr:hover {
            background: #282E37;
            border-color: rgba(184,230,55,0.4);
            color: #B8E637;
            transform: translateY(-1px);
        }

        .btn-m1-ghost, .btn-rgr-ghost {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.55rem;
            padding: 0.75rem 1.75rem;
            background: transparent;
            color: #B8E637;
            font-family: 'Albert Sans', sans-serif;
            font-weight: 700;
            font-size: 0.8rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            border: 1px solid rgba(184,230,55,0.3);
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.25s ease;
            white-space: nowrap;
        }
        .btn-m1-ghost:hover, .btn-rgr-ghost:hover {
            background: rgba(184,230,55,0.08);
            border-color: #B8E637;
            color: #C7F157;
            box-shadow: 0 0 20px rgba(184,230,55,0.15);
        }

        .btn-m1-danger {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.55rem;
            padding: 0.75rem 1.75rem;
            background: #E5484D;
            color: #F8FAFC;
            font-family: 'Albert Sans', sans-serif;
            font-weight: 800;
            font-size: 0.8rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.25s ease;
        }
        .btn-m1-danger:hover {
            background: #f05257;
            box-shadow: 0 4px 20px rgba(229,72,77,0.3);
            transform: translateY(-1px);
        }

        /* ── Form Controls & Inputs ──────────────────────────────── */
        .m1-input, .m1-select, .m1-textarea {
            width: 100%;
            background-color: #171B20;
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 8px;
            padding: 0.75rem 1rem;
            color: #F8FAFC;
            font-family: 'Sora', sans-serif;
            font-size: 0.88rem;
            transition: all 0.2s ease;
        }
        .m1-input::placeholder, .m1-textarea::placeholder {
            color: #8C96A3;
        }
        .m1-input:focus, .m1-select:focus, .m1-textarea:focus {
            outline: none;
            border-color: #B8E637;
            background-color: #20252C;
            box-shadow: 0 0 0 3px rgba(184,230,55,0.15);
        }
        .m1-select option {
            background-color: #171B20;
            color: #F8FAFC;
        }

        /* ── Badges & Chips ──────────────────────────────────────── */
        .m1-badge, .badge-rgr {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            padding: 0.25rem 0.75rem;
            background: rgba(184,230,55,0.12);
            color: #B8E637;
            border: 1px solid rgba(184,230,55,0.25);
            border-radius: 6px;
            font-family: 'Albert Sans', sans-serif;
            font-weight: 700;
            font-size: 0.68rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }
        .m1-badge-gold, .badge-rgr-orange {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            padding: 0.25rem 0.75rem;
            background: rgba(244,182,61,0.12);
            color: #F4B63D;
            border: 1px solid rgba(244,182,61,0.25);
            border-radius: 6px;
            font-family: 'Albert Sans', sans-serif;
            font-weight: 700;
            font-size: 0.68rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }
        .m1-badge-muted, .badge-rgr-neutral {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            padding: 0.25rem 0.75rem;
            background: rgba(255,255,255,0.05);
            color: #8C96A3;
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 6px;
            font-family: 'Albert Sans', sans-serif;
            font-weight: 600;
            font-size: 0.68rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }
        .m1-badge-danger {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            padding: 0.25rem 0.75rem;
            background: rgba(229,72,77,0.12);
            color: #E5484D;
            border: 1px solid rgba(229,72,77,0.25);
            border-radius: 6px;
            font-family: 'Albert Sans', sans-serif;
            font-weight: 700;
            font-size: 0.68rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        /* ── Topbar & Nav ────────────────────────────────────────── */
        .rgr-topbar {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 1001;
            height: 32px;
            background: #171B20;
            border-bottom: 1px solid rgba(255,255,255,0.06);
            transition: transform 0.4s ease, opacity 0.4s ease;
        }
        .rgr-topbar.hidden-topbar { transform: translateY(-100%); opacity: 0; }
        .topbar-inner {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1.5rem;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .topbar-text {
            font-family: 'Albert Sans', sans-serif;
            font-size: 0.68rem;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #8C96A3;
        }
        .topbar-text span { color: #D2D6DC; }
        .topbar-live {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-family: 'Albert Sans', sans-serif;
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #B8E637;
        }
        .topbar-live-dot {
            width: 6px; height: 6px;
            background: #B8E637;
            border-radius: 50%;
            animation: pulse-dot 1.5s ease-in-out infinite;
        }
        @keyframes pulse-dot {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.4; transform: scale(0.7); }
        }
        .topbar-social { display: flex; align-items: center; gap: 0.75rem; }
        .topbar-social a {
            font-family: 'Albert Sans', sans-serif;
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 0.15em;
            color: #8C96A3;
            text-transform: uppercase;
            transition: color 0.2s;
        }
        .topbar-social a:hover { color: #B8E637; }
        .topbar-divider { width: 1px; height: 12px; background: rgba(255,255,255,0.08); }

        /* ── Navbar Container ────────────────────────────────────── */
        .rgr-nav {
            position: fixed;
            top: 32px; left: 0; right: 0;
            z-index: 1000;
            background: rgba(17,19,21,0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255,255,255,0.06);
            transition: background 0.4s ease, border-color 0.4s ease, top 0.4s ease;
        }
        .rgr-nav.topbar-gone { top: 0; }
        .rgr-nav::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 2px;
            background: linear-gradient(90deg, #B8E637 0%, #F4B63D 50%, #B8E637 100%);
            opacity: 0.8;
            z-index: 1;
        }
        .rgr-nav.scrolled {
            background: rgba(17,19,21,0.96);
            border-bottom-color: rgba(184,230,55,0.15);
            box-shadow: 0 8px 30px rgba(0,0,0,0.6);
        }

        .nav-link {
            position: relative;
            font-family: 'Albert Sans', sans-serif;
            font-weight: 700;
            font-size: 0.76rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #D2D6DC !important;
            transition: color 0.25s ease;
            padding: 0.2rem 0;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            white-space: nowrap;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px; left: 0;
            width: 0; height: 2px;
            background: #B8E637;
            transition: width 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .nav-link:hover, .nav-link.active { color: #B8E637 !important; }
        .nav-link:hover::after, .nav-link.active::after { width: 100%; }
        .nav-link .nav-chevron { width: 10px; height: 10px; transition: transform 0.25s ease; opacity: 0.5; }
        .mega-parent:hover .nav-chevron { transform: rotate(180deg); opacity: 1; }

        /* Mega Panel */
        .mega-parent { position: static; }
        .mega-panel {
            position: fixed;
            left: 0; right: 0;
            background: #171B20;
            border-top: 2px solid rgba(184,230,55,0.3);
            border-bottom: 1px solid rgba(255,255,255,0.06);
            box-shadow: 0 24px 64px rgba(0,0,0,0.7);
            opacity: 0; visibility: hidden;
            transform: translateY(-6px);
            transition: opacity 0.25s ease, transform 0.25s ease, visibility 0.25s;
            z-index: 998;
            pointer-events: none;
        }
        .mega-panel.mega-active {
            opacity: 1; visibility: visible;
            transform: translateY(0); pointer-events: auto;
        }
        .mega-panel-inner { max-width: 1280px; margin: 0 auto; padding: 1.75rem 1.5rem 2rem; }
        .mega-col-header {
            font-family: 'Albert Sans', sans-serif;
            font-size: 0.6rem;
            font-weight: 800;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: #B8E637;
            margin-bottom: 0.75rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.06);
            display: flex; align-items: center; gap: 0.4rem;
        }
        .mega-item {
            display: flex; align-items: center; gap: 0.65rem;
            padding: 0.5rem 0.65rem;
            font-family: 'Albert Sans', sans-serif;
            font-size: 0.8rem; font-weight: 600;
            letter-spacing: 0.06em; color: #D2D6DC;
            text-transform: uppercase;
            transition: all 0.18s ease;
            border-left: 2px solid transparent;
            border-radius: 0 6px 6px 0;
        }
        .mega-item:hover {
            color: #F8FAFC; background: #20252C;
            border-left-color: #B8E637; padding-left: 0.9rem;
        }
        .mega-item-icon {
            width: 26px; height: 26px;
            background: rgba(184,230,55,0.08); border: 1px solid rgba(184,230,55,0.15);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0; border-radius: 4px;
            font-size: 0.6rem; font-family: 'Albert Sans', sans-serif; font-weight: 800;
            color: #B8E637;
        }
        .mega-item-label { flex: 1; }
        .mega-item-sub {
            font-size: 0.64rem; color: #8C96A3; font-weight: 500;
            letter-spacing: 0.03em; text-transform: none;
            display: block; line-height: 1.2; font-family: 'Sora', sans-serif;
        }
        .mega-divider { width: 1px; background: rgba(255,255,255,0.06); align-self: stretch; }
        .mega-featured-card {
            background: #20252C;
            border: 1px solid rgba(184,230,55,0.2);
            border-radius: 10px;
            padding: 1.25rem; position: relative; overflow: hidden;
        }
        .mega-featured-badge {
            display: inline-flex; align-items: center; gap: 0.3rem;
            font-family: 'Albert Sans', sans-serif; font-size: 0.58rem; font-weight: 700;
            letter-spacing: 0.2em; text-transform: uppercase; color: #B8E637;
            background: rgba(184,230,55,0.08); border: 1px solid rgba(184,230,55,0.2);
            padding: 0.18rem 0.5rem; margin-bottom: 0.65rem; border-radius: 4px;
        }
        .mega-featured-title {
            font-family: 'Albert Sans', sans-serif; font-size: 0.85rem; font-weight: 800;
            color: #F8FAFC; letter-spacing: 0.02em; line-height: 1.3; margin-bottom: 0.35rem;
        }
        .mega-featured-sub {
            font-family: 'Sora', sans-serif; font-size: 0.7rem; color: #8C96A3; line-height: 1.5;
        }
        .mega-featured-link {
            display: inline-flex; align-items: center; gap: 0.35rem; margin-top: 0.9rem;
            font-family: 'Albert Sans', sans-serif; font-size: 0.7rem; font-weight: 700;
            letter-spacing: 0.15em; text-transform: uppercase; color: #B8E637;
            transition: gap 0.2s;
        }
        .mega-featured-link:hover { gap: 0.65rem; }

        /* Auth Dropdown */
        .dropdown-parent { position: relative; }
        .dropdown-menu-list {
            position: absolute; top: calc(100% + 10px); right: 0;
            width: 220px; background: #171B20;
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 10px;
            box-shadow: 0 16px 48px rgba(0,0,0,0.6);
            padding: 0.5rem 0; opacity: 0; visibility: hidden;
            transition: all 0.22s ease; z-index: 1200; transform: translateY(6px);
        }
        .dropdown-parent:hover .dropdown-menu-list { opacity: 1; visibility: visible; transform: translateY(0); }
        .dropdown-item {
            display: block; padding: 0.6rem 1.1rem;
            font-family: 'Albert Sans', sans-serif; font-size: 0.76rem; font-weight: 600;
            letter-spacing: 0.06em; text-transform: uppercase; color: #D2D6DC;
            transition: all 0.18s ease; border-left: 2px solid transparent;
        }
        .dropdown-item:hover { color: #F8FAFC; background: #20252C; border-left-color: #B8E637; }

        /* Logo */
        .rgr-logo {
            font-family: 'Albert Sans', sans-serif;
            font-weight: 900;
            letter-spacing: 0.08em;
            background: linear-gradient(120deg, #B8E637 20%, #F8FAFC 50%, #B8E637 80%);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: textShiny 5s linear infinite;
        }
        @keyframes textShiny { 0% { background-position: 0% center; } 100% { background-position: 200% center; } }

        /* Grid Background Overlay */
        .grid-bg {
            position: relative;
        }
        .grid-bg::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: linear-gradient(to right, rgba(255,255,255, 0.02) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(255,255,255, 0.02) 1px, transparent 1px);
            background-size: 40px 40px;
            pointer-events: none;
            z-index: 1;
        }

        /* Sponsor Logo Box */
        .sponsor-logo-box {
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(255,255,255,0.06);
            background: #171B20;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .sponsor-logo-box:hover {
            border-color: rgba(184,230,55,0.3);
            background: #20252C;
        }
        .sponsor-logo-title { padding: 1.25rem 2rem; }
        .sponsor-logo-technical { padding: 0.85rem 1.5rem; }
        .sponsor-logo-supplier { padding: 0.6rem 1.1rem; }

        .hline { display: block; width: 22px; height: 2px; background: #B8E637; transition: all 0.3s ease; }

        /* Footer */
        .rgr-footer { background: #171B20; border-top: 1px solid rgba(255,255,255,0.06); }

        /* ── Hardware Accelerated Transitions & Premium Motion ────── */
        * {
            backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
        }

        /* Hero Slow Zoom Animation */
        @keyframes heroSlowZoom {
            0% { transform: scale(1); }
            50% { transform: scale(1.04); }
            100% { transform: scale(1); }
        }
        .hero-video-container video {
            animation: heroSlowZoom 18s cubic-bezier(0.25, 0.46, 0.45, 0.94) infinite;
        }

        /* Subtle Moving Ambient Grid & Noise Overlay */
        .grid-bg::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: 
                linear-gradient(to right, rgba(184,230,55, 0.015) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(184,230,55, 0.015) 1px, transparent 1px);
            background-size: 50px 50px;
            pointer-events: none;
            z-index: 1;
            opacity: 0.8;
        }

        /* Staggered Scroll Reveal */
        [data-reveal] {
            opacity: 0;
            transform: translateY(18px) scale(0.99);
            will-change: transform, opacity;
            transition: opacity 0.38s cubic-bezier(0.25, 0.46, 0.45, 0.94), 
                        transform 0.38s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        [data-reveal].visible {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        /* Standardized Premium Card Hover Motion */
        .m1-card, .m1-card-elevated, .card-rgr, .shop-card {
            transition: all 0.28s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            will-change: transform, border-color, box-shadow;
            overflow: hidden;
        }
        .m1-card:hover, .m1-card-elevated:hover, .card-rgr:hover, .shop-card:hover {
            transform: translateY(-5px);
            border-color: rgba(184,230,55, 0.3);
            box-shadow: 0 16px 42px rgba(0,0,0,0.55), 0 0 30px rgba(184,230,55,0.03);
        }

        /* Button Hover Swipe & Scale Interaction */
        .btn-m1-primary, .btn-primary-rgr {
            position: relative;
            overflow: hidden;
            transition: all 0.22s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            will-change: transform, box-shadow;
        }
        .btn-m1-primary::after, .btn-primary-rgr::after {
            content: '';
            position: absolute;
            top: 0; left: -100%;
            width: 50%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.25), transparent);
            transform: skewX(-20deg);
            transition: none;
        }
        .btn-m1-primary:hover::after, .btn-primary-rgr:hover::after {
            left: 150%;
            transition: all 0.6s ease-in-out;
        }
        .btn-m1-primary:hover, .btn-primary-rgr:hover {
            transform: scale(1.02) translateY(-1.5px);
            box-shadow: 0 8px 24px rgba(184,230,55, 0.25);
        }
        .btn-m1-primary:active, .btn-primary-rgr:active {
            transform: scale(0.98);
        }

        /* Navbar Scrolling Blur Easing */
        .rgr-nav {
            transition: background-color 0.3s ease, border-color 0.3s ease, top 0.3s ease, backdrop-filter 0.3s ease;
        }
        .rgr-nav.scrolled {
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }

        /* Dropdown Staggered Scale Animation */
        .dropdown-menu-list {
            transform: translateY(8px) scale(0.98);
            transform-origin: top right;
            transition: opacity 0.22s cubic-bezier(0.25, 0.46, 0.45, 0.94), 
                        transform 0.22s cubic-bezier(0.25, 0.46, 0.45, 0.94), 
                        visibility 0.22s;
        }
        .dropdown-parent:hover .dropdown-menu-list {
            transform: translateY(0) scale(1);
        }

        /* Preferences: Reduced Motion Support */
        @media (prefers-reduced-motion: reduce) {
            * {
                animation-delay: 0s !important;
                animation-duration: 0s !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0s !important;
                scroll-behavior: auto !important;
                transform: none !important;
            }
            .hero-video-container video {
                animation: none !important;
            }
        }

        /* Focus & Accessibility */
        a:focus-visible, button:focus-visible, input:focus-visible, select:focus-visible, textarea:focus-visible {
            outline: 2px solid #B8E637;
            outline-offset: 2px;
        }
        .skip-nav {
            position: absolute; top: -100px; left: 1rem; z-index: 10000;
            background: #B8E637; color: #111315; font-weight: 800; font-size: 0.85rem;
            padding: 0.6rem 1.2rem; border-radius: 6px; text-decoration: none; transition: top 0.2s;
        }
        .skip-nav:focus { top: 1rem; }
    </style>

    @stack('styles')
</head>

<body class="antialiased bg-[#111315] text-[#D2D6DC]">
<a href="#main-content" class="skip-nav">Lewati ke konten utama</a>

{{-- TOPBAR --}}
<div class="rgr-topbar" id="rgr-topbar">
    <div class="topbar-inner">
        <div class="topbar-text hidden sm:flex items-center gap-3">
            <span>🇮🇩</span>
            <span><span>Jakarta, Indonesia</span> &middot; Musim 2026</span>
            <span class="topbar-divider"></span>
            <span class="hidden lg:inline">F1 &middot; WEC &middot; IMSA &middot; IndyCar &middot; Formula E &middot; WRC &middot; NASCAR</span>
        </div>
        <div class="topbar-live">
            <span class="topbar-live-dot"></span>
            Musim 2026 Aktif
        </div>
        <div class="topbar-social">
            <a href="#" aria-label="Twitter/X">X</a>
            <span class="topbar-divider"></span>
            <a href="#" aria-label="Instagram">IG</a>
            <span class="topbar-divider"></span>
            <a href="#" aria-label="YouTube">YT</a>
            <span class="topbar-divider"></span>
            @auth
                <a href="{{ route('fan.dashboard') }}" class="text-primary font-bold">Fan Zone</a>
            @else
                <a href="{{ route('fan.login') }}" class="text-primary font-bold">Fan Login</a>
            @endauth
        </div>
    </div>
</div>

{{-- NAVBAR --}}
<nav class="rgr-nav" id="rgr-nav" role="navigation" aria-label="Navigasi Utama"
     x-data="{ 
         mobileMenuOpen: false, 
         activePanel: null,
         closeTimeout: null,
         openPanel(panel) {
             clearTimeout(this.closeTimeout);
             this.activePanel = panel;
         },
         closePanel() {
             clearTimeout(this.closeTimeout);
             this.closeTimeout = setTimeout(() => {
                 this.activePanel = null;
             }, 300);
         }
     }"
     @keydown.escape.window="mobileMenuOpen = false; activePanel = null">

    <div class="max-w-[1280px] mx-auto px-6 h-[64px] xl:h-[68px] flex items-center justify-between mega-nav-row" id="nav-main-row">

        {{-- Logo --}}
        <a href="{{ route('home') }}" id="nav-logo" class="flex items-center gap-3 group flex-shrink-0">
            <div class="relative w-9 h-9 flex items-center justify-center flex-shrink-0 rounded-lg bg-[#20252C] border border-[#B8E637]/30 group-hover:border-[#B8E637] transition-all">
                <span class="font-display font-black text-[#B8E637]" style="font-size:0.55rem;letter-spacing:0.04em;">M1TRG</span>
            </div>
            <div class="flex flex-col leading-none">
                <span class="rgr-logo text-sm xl:text-base uppercase font-display font-black tracking-wider whitespace-nowrap">Mobil 1 Team RG</span>
                <span class="font-ui text-[0.54rem] text-[#8C96A3] tracking-[0.18em] uppercase mt-0.5 hidden xl:block">Official Motorsport Enterprise</span>
            </div>
        </a>

        {{-- Desktop Links --}}
        <div class="hidden xl:flex items-center gap-6 flex-1 justify-center">

            <a href="{{ route('home') }}"
               class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
               id="nav-home">Beranda</a>

            {{-- Racing Programs --}}
            <button class="nav-link mega-parent {{ request()->routeIs('f1.*','indycar','fe','endurance.*','gt.*','ewc','nascar','wrc') ? 'active' : '' }}"
                    @mouseenter="openPanel('racing')" @mouseleave="closePanel()"
                    aria-haspopup="true" :aria-expanded="activePanel === 'racing'">
                Racing Programs
                <svg class="nav-chevron" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
            </button>

            {{-- Drivers & Crew --}}
            <button class="nav-link mega-parent {{ request()->routeIs('drivers','about.corporate','about.academy') ? 'active' : '' }}"
                    @mouseenter="openPanel('drivers')" @mouseleave="closePanel()"
                    aria-haspopup="true" :aria-expanded="activePanel === 'drivers'">
                Drivers &amp; Crew
                <svg class="nav-chevron" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
            </button>

            {{-- Race Center --}}
            <button class="nav-link mega-parent {{ request()->routeIs('race.schedule','standings','paddock.club') ? 'active' : '' }}"
                    @mouseenter="openPanel('race')" @mouseleave="closePanel()"
                    aria-haspopup="true" :aria-expanded="activePanel === 'race'">
                Race Center
                <svg class="nav-chevron" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
            </button>

            <a href="{{ route('partners') }}"
               class="nav-link {{ request()->routeIs('partners') ? 'active' : '' }}"
               id="nav-partners">Partners</a>

            {{-- Media Hub --}}
            <button class="nav-link mega-parent {{ request()->routeIs('about.news','about.magazine','about.media') ? 'active' : '' }}"
                    @mouseenter="openPanel('media')" @mouseleave="closePanel()"
                    aria-haspopup="true" :aria-expanded="activePanel === 'media'">
                Media Hub
                <svg class="nav-chevron" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
            </button>

            <a href="{{ route('shop') }}"
               class="nav-link {{ request()->routeIs('shop') ? 'active' : '' }}"
               id="nav-shop">Shop</a>
        </div>

        {{-- Right CTA --}}
        <div class="flex items-center gap-3 flex-shrink-0">
            @auth
                <div class="dropdown-parent hidden xl:inline-flex">
                    <button class="btn-m1-primary text-xs py-2 px-3 flex items-center gap-1.5 max-w-[210px] truncate" style="border-radius:6px !important;">
                        <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M10 10a4 4 0 100-8 4 4 0 000 8zm-7 8a7 7 0 1114 0H3z"/></svg>
                        <span class="truncate block max-w-[120px]">{{ Auth::user()->name }}</span>
                        <svg class="w-2.5 h-2.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="dropdown-menu-list">
                        <a href="{{ route('fan.dashboard') }}" class="dropdown-item">Fan Portal Dashboard</a>
                        <a href="{{ route('dashboard') }}" class="dropdown-item">VIP Paddock Club</a>
                        <div class="h-px bg-white/10 my-1"></div>
                        <form action="{{ route('fan.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item w-full text-left text-danger">Keluar</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('fan.login') }}"
                   class="hidden xl:inline-flex items-center btn-m1-primary text-xs py-2 px-4 gap-2">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    Fan Portal
                </a>
            @endauth

            <button class="xl:hidden flex flex-col gap-[5px] p-2"
                    id="mob-btn"
                    @click="mobileMenuOpen = !mobileMenuOpen"
                    aria-label="Buka menu"
                    :aria-expanded="mobileMenuOpen ? 'true' : 'false'">
                <span class="hline" :style="mobileMenuOpen ? 'transform:translateY(7px) rotate(45deg)' : ''"></span>
                <span class="hline" :style="mobileMenuOpen ? 'opacity:0;transform:scaleX(0)' : ''"></span>
                <span class="hline" :style="mobileMenuOpen ? 'transform:translateY(-7px) rotate(-45deg)' : ''"></span>
            </button>
        </div>
    </div>

    {{-- MEGA PANELS --}}
    <div class="mega-panel" id="panel-racing"
         :class="{ 'mega-active': activePanel === 'racing' }"
         @mouseenter="openPanel('racing')" @mouseleave="closePanel()">
        <div class="mega-panel-inner">
            <div class="flex gap-8">
                <div class="flex-1 min-w-0">
                    <p class="mega-col-header">
                        <svg fill="none" stroke="#B8E637" stroke-width="2.5" viewBox="0 0 24 24" style="width:11px;height:11px;"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
                        Formula &amp; Open-Wheel
                    </p>
                    <a href="{{ route('f1.division') }}" class="mega-item">
                        <span class="mega-item-icon">F1</span>
                        <span class="mega-item-label">Formula 1<span class="mega-item-sub">FIA World Championship &middot; Constructor</span></span>
                    </a>
                    <a href="{{ route('indycar') }}" class="mega-item">
                        <span class="mega-item-icon">IC</span>
                        <span class="mega-item-label">NTT IndyCar Series<span class="mega-item-sub">Oval &amp; Road Course &middot; North America</span></span>
                    </a>
                    <a href="{{ route('fe') }}" class="mega-item">
                        <span class="mega-item-icon">FE</span>
                        <span class="mega-item-label">FIA Formula E<span class="mega-item-sub">Electric Single-Seater &middot; Street Circuits</span></span>
                    </a>
                </div>

                <div class="mega-divider"></div>

                <div class="flex-1 min-w-0">
                    <p class="mega-col-header">
                        <svg fill="none" stroke="#B8E637" stroke-width="2.5" viewBox="0 0 24 24" style="width:11px;height:11px;"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                        Endurance &amp; GT
                    </p>
                    <a href="{{ route('endurance.show', '24h-le-mans') }}" class="mega-item">
                        <span class="mega-item-icon">LM</span>
                        <span class="mega-item-label">Le Mans 24 Jam<span class="mega-item-sub">FIA WEC Hypercar &middot; La Sarthe</span></span>
                    </a>
                    <a href="{{ route('endurance.show', 'imsa-6h-the-glen') }}" class="mega-item">
                        <span class="mega-item-icon">IM</span>
                        <span class="mega-item-label">IMSA 6H The Glen<span class="mega-item-sub">GTD Pro &middot; Watkins Glen</span></span>
                    </a>
                    <a href="{{ route('endurance.show', '24h-nurburgring') }}" class="mega-item">
                        <span class="mega-item-icon">NR</span>
                        <span class="mega-item-label">Nürburgring 24 Jam<span class="mega-item-sub">Nordschleife &middot; 25.378 km</span></span>
                    </a>
                    <a href="{{ route('gt.europe') }}" class="mega-item">
                        <span class="mega-item-icon">GT</span>
                        <span class="mega-item-label">GT World Challenge Europe<span class="mega-item-sub">GT3 Pro-Am &middot; SRO Motorsports</span></span>
                    </a>
                    <a href="{{ route('gt.asia') }}" class="mega-item">
                        <span class="mega-item-icon">AS</span>
                        <span class="mega-item-label">GT World Challenge Asia<span class="mega-item-sub">GT3 Silver Cup &middot; Asian Circuits</span></span>
                    </a>
                    <a href="{{ route('ewc') }}" class="mega-item">
                        <span class="mega-item-icon">EW</span>
                        <span class="mega-item-label">FIM EWC<span class="mega-item-sub">Motorcycling Endurance Championship</span></span>
                    </a>
                </div>

                <div class="mega-divider"></div>

                <div style="min-width:230px;max-width:260px;">
                    <p class="mega-col-header">
                        <svg fill="none" stroke="#B8E637" stroke-width="2.5" viewBox="0 0 24 24" style="width:11px;height:11px;"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        Stock &amp; Off-Road
                    </p>
                    <a href="{{ route('nascar') }}" class="mega-item">
                        <span class="mega-item-icon">NC</span>
                        <span class="mega-item-label">NASCAR Cup Series<span class="mega-item-sub">Next Gen &middot; Daytona 500</span></span>
                    </a>
                    <a href="{{ route('wrc') }}" class="mega-item">
                        <span class="mega-item-icon">WR</span>
                        <span class="mega-item-label">FIA World Rally Championship<span class="mega-item-sub">Gravel, Tarmac &amp; Snow</span></span>
                    </a>
                    <div class="mega-featured-card mt-4">
                        <span class="mega-featured-badge">&#9679; Musim 2026</span>
                        <p class="mega-featured-title">10 Kejuaraan Aktif</p>
                        <p class="mega-featured-sub">M1TRG bersaing di seluruh disiplin balap dunia dari sirkuit jalanan hingga endurance rally.</p>
                        <a href="{{ route('endurance.index') }}" class="mega-featured-link">
                            Lihat Semua Program &rarr;
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Drivers Panel --}}
    <div class="mega-panel" id="panel-drivers"
         :class="{ 'mega-active': activePanel === 'drivers' }"
         @mouseenter="openPanel('drivers')" @mouseleave="closePanel()">
        <div class="mega-panel-inner">
            <div class="flex gap-8">
                <div style="min-width:280px;">
                    <p class="mega-col-header">
                        <svg fill="none" stroke="#B8E637" stroke-width="2.5" viewBox="0 0 24 24" style="width:11px;height:11px;"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0"/></svg>
                        Tim &amp; Personel
                    </p>
                    <a href="{{ route('drivers') }}" class="mega-item">
                        <span class="mega-item-icon">DR</span>
                        <span class="mega-item-label">Pembalap (Line-up)<span class="mega-item-sub">Driver Roster Musim 2026</span></span>
                    </a>
                    <a href="{{ route('about.corporate') }}" class="mega-item">
                        <span class="mega-item-icon">MG</span>
                        <span class="mega-item-label">Manajemen &amp; Strategi<span class="mega-item-sub">Principal &middot; Engineers &middot; Crew Chief</span></span>
                    </a>
                    <a href="{{ route('about.academy') }}" class="mega-item">
                        <span class="mega-item-icon">AC</span>
                        <span class="mega-item-label">Driver Academy<span class="mega-item-sub">Program Pembalap Muda Indonesia</span></span>
                    </a>
                </div>
                <div class="mega-divider"></div>
                <div class="flex-1">
                    <div class="mega-featured-card h-full flex flex-col justify-between">
                        <div>
                            <span class="mega-featured-badge">&#9679; Driver Program</span>
                            <p class="mega-featured-title">M1TRG Driver Academy</p>
                            <p class="mega-featured-sub">Bergabung dengan program pengembangan pembalap muda terbaik Indonesia untuk bersaing di panggung dunia.</p>
                        </div>
                        <a href="{{ route('about.academy') }}" class="mega-featured-link">
                            Daftar Sekarang &rarr;
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Race Center Panel --}}
    <div class="mega-panel" id="panel-race"
         :class="{ 'mega-active': activePanel === 'race' }"
         @mouseenter="openPanel('race')" @mouseleave="closePanel()">
        <div class="mega-panel-inner">
            <div class="flex gap-8">
                <div style="min-width:280px;">
                    <p class="mega-col-header">
                        <svg fill="none" stroke="#B8E637" stroke-width="2.5" viewBox="0 0 24 24" style="width:11px;height:11px;"><path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                        Pusat Data Balapan
                    </p>
                    <a href="{{ route('race.schedule') }}" class="mega-item">
                        <span class="mega-item-icon">SC</span>
                        <span class="mega-item-label">Schedule &amp; Calendar<span class="mega-item-sub">Jadwal Lengkap Musim 2026</span></span>
                    </a>
                    <a href="{{ route('standings') }}" class="mega-item">
                        <span class="mega-item-icon">ST</span>
                        <span class="mega-item-label">Results &amp; Standings<span class="mega-item-sub">Klasemen &amp; Hasil Balapan</span></span>
                    </a>
                    <a href="{{ route('paddock.club') }}" class="mega-item">
                        <span class="mega-item-icon">VIP</span>
                        <span class="mega-item-label text-primary">VIP Paddock Club<span class="mega-item-sub text-primary/80">Akses Eksklusif Area Paddock</span></span>
                    </a>
                </div>
                <div class="mega-divider"></div>
                <div class="flex-1">
                    <div class="mega-featured-card">
                        <span class="mega-featured-badge">&#9889; Live Season</span>
                        <p class="mega-featured-title">Musim 2026 Sedang Berjalan</p>
                        <p class="mega-featured-sub">Pantau perkembangan klasemen dan jadwal balapan selanjutnya secara real-time di Race Center M1TRG.</p>
                        <a href="{{ route('race.schedule') }}" class="mega-featured-link">
                            Buka Race Center &rarr;
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Media Hub Panel --}}
    <div class="mega-panel" id="panel-media"
         :class="{ 'mega-active': activePanel === 'media' }"
         @mouseenter="openPanel('media')" @mouseleave="closePanel()">
        <div class="mega-panel-inner">
            <div class="flex gap-8">
                <div style="min-width:280px;">
                    <p class="mega-col-header">
                        <svg fill="none" stroke="#B8E637" stroke-width="2.5" viewBox="0 0 24 24" style="width:11px;height:11px;"><path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9"/></svg>
                        Konten &amp; Media
                    </p>
                    <a href="{{ route('about.news') }}" class="mega-item">
                        <span class="mega-item-icon">PR</span>
                        <span class="mega-item-label">Press Releases<span class="mega-item-sub">Siaran Pers &amp; Pengumuman Resmi</span></span>
                    </a>
                    <a href="{{ route('about.magazine') }}" class="mega-item">
                        <span class="mega-item-icon">GL</span>
                        <span class="mega-item-label">Gallery &amp; Media<span class="mega-item-sub">Foto, Video dan Audio Tim</span></span>
                    </a>
                    <a href="{{ route('about.media') }}" class="mega-item">
                        <span class="mega-item-icon">KT</span>
                        <span class="mega-item-label">Media Kit<span class="mega-item-sub">Logo, Branding &amp; Dokumen Resmi</span></span>
                    </a>
                </div>
                <div class="mega-divider"></div>
                <div class="flex-1">
                    <div class="mega-featured-card">
                        <span class="mega-featured-badge">Media Room</span>
                        <p class="mega-featured-title">Press Room M1TRG 2026</p>
                        <p class="mega-featured-sub">Akses semua materi media resmi, liputan pers, dan konten eksklusif tim M1TRG.</p>
                        <a href="{{ route('about.news') }}" class="mega-featured-link">
                            Buka Press Room &rarr;
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MOBILE MENU DRAWER (DARK ENFORCED) --}}
    <div class="xl:hidden fixed inset-0 z-50 bg-[#111315] flex flex-col overflow-y-auto"
         id="mob-menu"
         x-show="mobileMenuOpen"
         x-transition:enter="transition ease-out duration-250"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         style="display:none;">

        <div class="px-5 py-4 flex items-center justify-between flex-shrink-0 bg-[#171B20] border-b border-white/10">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-[#20252C] border border-[#B8E637]/40">
                    <span class="font-display font-black text-[#B8E637] text-xs">M1TRG</span>
                </div>
                <div>
                    <span class="font-display font-black text-[#F8FAFC] text-sm tracking-wider uppercase block">Mobil 1 Team RG</span>
                    <span class="font-ui text-[0.54rem] tracking-widest uppercase text-[#B8E637]">Official Motorsport Enterprise</span>
                </div>
            </div>
            <button @click="mobileMenuOpen = false" class="p-2 text-[#B8E637]" aria-label="Tutup menu">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <div class="flex-1 overflow-y-auto bg-[#111315] p-5 space-y-4" x-data="{ openSection: 'racing' }">
            <div>
                <button @click="openSection = openSection === 'racing' ? null : 'racing'"
                        class="w-full py-3 flex items-center justify-between text-xs font-display font-black text-[#B8E637] uppercase tracking-wider border-b border-white/10">
                    Racing Programs
                    <svg class="w-4 h-4 transition-transform duration-200" :class="openSection === 'racing' ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="openSection === 'racing'" x-transition class="py-3 space-y-2">
                    <a href="{{ route('f1.division') }}" @click="mobileMenuOpen=false" class="block text-sm font-semibold text-[#D2D6DC] hover:text-[#B8E637]">Formula 1</a>
                    <a href="{{ route('indycar') }}" @click="mobileMenuOpen=false" class="block text-sm font-semibold text-[#D2D6DC] hover:text-[#B8E637]">IndyCar Series</a>
                    <a href="{{ route('fe') }}" @click="mobileMenuOpen=false" class="block text-sm font-semibold text-[#D2D6DC] hover:text-[#B8E637]">Formula E</a>
                    <a href="{{ route('endurance.index') }}" @click="mobileMenuOpen=false" class="block text-sm font-semibold text-[#D2D6DC] hover:text-[#B8E637]">Endurance Championship</a>
                    <a href="{{ route('nascar') }}" @click="mobileMenuOpen=false" class="block text-sm font-semibold text-[#D2D6DC] hover:text-[#B8E637]">NASCAR Cup Series</a>
                    <a href="{{ route('wrc') }}" @click="mobileMenuOpen=false" class="block text-sm font-semibold text-[#D2D6DC] hover:text-[#B8E637]">WRC Rally</a>
                </div>
            </div>

            <div>
                <a href="{{ route('drivers') }}" @click="mobileMenuOpen=false" class="block py-3 text-xs font-display font-black text-[#F8FAFC] uppercase tracking-wider border-b border-white/10 hover:text-[#B8E637]">
                    Drivers &amp; Crew
                </a>
            </div>

            <div>
                <a href="{{ route('race.schedule') }}" @click="mobileMenuOpen=false" class="block py-3 text-xs font-display font-black text-[#F8FAFC] uppercase tracking-wider border-b border-white/10 hover:text-[#B8E637]">
                    Race Center &amp; Schedule
                </a>
            </div>

            <div>
                <a href="{{ route('standings') }}" @click="mobileMenuOpen=false" class="block py-3 text-xs font-display font-black text-[#F8FAFC] uppercase tracking-wider border-b border-white/10 hover:text-[#B8E637]">
                    Standings &amp; Results
                </a>
            </div>

            <div>
                <a href="{{ route('shop') }}" @click="mobileMenuOpen=false" class="block py-3 text-xs font-display font-black text-[#F8FAFC] uppercase tracking-wider border-b border-white/10 hover:text-[#B8E637]">
                    Official Merchandise Shop
                </a>
            </div>

            <div>
                <a href="{{ route('partners') }}" @click="mobileMenuOpen=false" class="block py-3 text-xs font-display font-black text-[#F8FAFC] uppercase tracking-wider border-b border-white/10 hover:text-[#B8E637]">
                    Partners &amp; Sponsors
                </a>
            </div>
        </div>

        <div class="p-5 border-t border-white/10 bg-[#171B20]">
            @auth
                <a href="{{ route('fan.dashboard') }}" class="w-full btn-m1-primary text-center block text-xs">
                    Fan Portal Dashboard
                </a>
            @else
                <a href="{{ route('fan.login') }}" class="w-full btn-m1-primary text-center block text-xs">
                    Masuk Fan Portal
                </a>
            @endauth
        </div>
    </div>
</nav>

{{-- PAGE MAIN CONTENT --}}
<main id="main-content" class="min-h-screen pt-[100px] bg-[#111315]">
    @yield('content')
</main>

{{-- FOOTER --}}
<footer class="rgr-footer bg-[#171B20] border-t border-white/10 text-[#D2D6DC]" role="contentinfo">
    <div class="max-w-7xl mx-auto px-6 pt-16 pb-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
            <div>
                <a href="{{ route('home') }}" class="rgr-logo text-xl block mb-4">MOBIL 1 TEAM RG</a>
                <p class="text-[#8C96A3] text-sm leading-relaxed max-w-xs">
                    Tim balap internasional berkelas dunia dari Indonesia yang bersaing di Formula 1, WEC Hypercar, IMSA GTD, IndyCar, dan World Rally Championship.
                </p>
                <div class="flex gap-2.5 mt-6">
                    @foreach(['X', 'IG', 'YT', 'TK'] as $soc)
                    <span class="w-8 h-8 flex items-center justify-center border border-white/10 rounded hover:border-[#B8E637] hover:text-[#B8E637] transition-all text-[#8C96A3] cursor-pointer font-ui font-bold text-xs">{{ $soc }}</span>
                    @endforeach
                </div>
            </div>

            <div>
                <h3 class="section-eyebrow mb-4">TENTANG TIM</h3>
                <ul class="grid grid-cols-2 gap-x-4 gap-y-2.5 text-sm">
                    <li><a href="{{ route('about.history') }}" class="text-[#8C96A3] hover:text-[#B8E637] transition-colors">Sejarah Team</a></li>
                    <li><a href="{{ route('about.achievements') }}" class="text-[#8C96A3] hover:text-[#B8E637] transition-colors">Prestasi</a></li>
                    <li><a href="{{ route('about.partnership') }}" class="text-[#8C96A3] hover:text-[#B8E637] transition-colors">Partnership</a></li>
                    <li><a href="{{ route('about.sustainability') }}" class="text-[#8C96A3] hover:text-[#B8E637] transition-colors">Keberlanjutan</a></li>
                    <li><a href="{{ route('about.media') }}" class="text-[#8C96A3] hover:text-[#B8E637] transition-colors">Media Kit</a></li>
                    <li><a href="{{ route('about.news') }}" class="text-[#8C96A3] hover:text-[#B8E637] transition-colors">Berita Resmi</a></li>
                </ul>
            </div>

            <div>
                <h3 class="section-eyebrow mb-4">MARKAS UTAMA</h3>
                <p class="text-[#8C96A3] text-sm">Jakarta Operational Base, Indonesia</p>
                <p class="text-[#8C96A3] text-sm mt-1">Team Principal: <span class="text-[#F8FAFC] font-semibold">Rey Gilang</span></p>
                <div class="mt-4 pt-4 border-t border-white/10 text-xs text-[#8C96A3]">
                    <p>FIA Formula 1 World Championship &middot; WEC Hypercar</p>
                </div>
            </div>
        </div>

        {{-- Sponsors --}}
        @if(isset($sponsorsByTier) && !empty(array_filter(array_map(fn($t) => count($t), $sponsorsByTier ?? []))))
        <div class="mb-10 pt-8 border-t border-white/10">
            <p class="text-[#8C96A3] text-xs font-display tracking-widest uppercase mb-4 text-center">OFFICIAL TEAM PARTNERS</p>
            <div class="flex flex-wrap items-center justify-center gap-3">
                @foreach($sponsorsByTier as $tier => $list)
                    @foreach($list as $sp)
                        <div class="sponsor-logo-box px-4 py-2">
                            <span class="font-display font-bold text-xs tracking-wider text-[#D2D6DC] uppercase">{{ $sp->name }}</span>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
        @endif

        <div class="pt-6 border-t border-white/10 flex flex-col sm:flex-row justify-between items-center gap-2 text-xs text-[#8C96A3]">
            <p>&copy; {{ date('Y') }} Mobil 1 Team RG Enterprise. All rights reserved.</p>
            <p class="text-[#B8E637] font-mono tracking-widest text-[0.65rem] uppercase">ENTERPRISE MOTORSPORT STANDARD</p>
        </div>
    </div>
</footer>

<script>
    const nav = document.getElementById('rgr-nav');
    const topbar = document.getElementById('rgr-topbar');
    const panels = document.querySelectorAll('.mega-panel');
    let ticking = false;
    function updateNav() {
        const scrolled = window.scrollY > 40;
        const topbarGone = window.scrollY > 80;
        nav.classList.toggle('scrolled', scrolled);
        if (topbar) topbar.classList.toggle('hidden-topbar', topbarGone);
        nav.classList.toggle('topbar-gone', topbarGone);
        const navBottom = nav.getBoundingClientRect().bottom;
        panels.forEach(p => { p.style.top = navBottom + 'px'; });
        ticking = false;
    }
    window.addEventListener('scroll', function() {
        if (!ticking) { requestAnimationFrame(updateNav); ticking = true; }
    }, { passive: true });
    window.addEventListener('resize', updateNav, { passive: true });
    updateNav();

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.classList.add('visible');
                revealObserver.unobserve(e.target);
            }
        });
    }, { threshold: 0.08 });

    document.querySelectorAll('[data-reveal]').forEach((el, i) => {
        el.style.transitionDelay = `${(i % 4) * 80}ms`;
        revealObserver.observe(el);
    });
</script>

{{-- SLIDE-OVER CART DRAWER (DARK ENFORCED) --}}
<div x-data="globalCart()" x-init="initCart()" @open-cart.window="open = true" @add-to-cart.window="addToCart($event.detail)" class="relative z-50">
    <button @click="open = true" class="fixed bottom-6 right-6 bg-[#B8E637] text-[#111315] p-3.5 shadow-2xl rounded-full hover:bg-[#C7F157] hover:scale-105 transition-all flex items-center justify-center gap-2 z-40">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
        <span x-text="itemsCount()" class="font-bold font-mono text-xs bg-[#111315] text-[#B8E637] px-2 py-0.5 rounded-full">0</span>
    </button>

    <div x-show="open" x-transition.opacity @click="open = false" class="fixed inset-0 bg-black/80 z-50 backdrop-blur-md" style="display:none;"></div>

    <div x-show="open" 
         x-transition:enter="transition ease-out duration-300 transform" 
         x-transition:enter-start="translate-x-full" 
         x-transition:enter-end="translate-x-0" 
         x-transition:leave="transition ease-in duration-200 transform" 
         x-transition:leave-start="translate-x-0" 
         x-transition:leave-end="translate-x-full" 
         class="fixed right-0 top-0 bottom-0 w-full max-w-md bg-[#171B20] border-l border-white/10 shadow-2xl z-50 flex flex-col justify-between"
         style="display:none;">
         
         <div class="p-6 border-b border-white/10 flex justify-between items-center bg-[#111315]">
             <div>
                 <span class="text-[0.65rem] font-display tracking-widest text-[#B8E637] font-bold uppercase block mb-0.5">M1TRG OFFICIAL MERCHANDISE</span>
                 <h3 class="font-display font-black text-lg text-[#F8FAFC] tracking-tight uppercase">KERANJANG BELANJA</h3>
             </div>
             <button @click="open = false" class="text-[#8C96A3] hover:text-[#F8FAFC] font-bold text-2xl">&times;</button>
         </div>

         <div class="flex-1 overflow-y-auto p-6 space-y-4 bg-[#171B20]">
             <template x-if="items.length === 0">
                 <div class="text-center py-16 text-[#8C96A3] text-sm">
                     Keranjang belanja Anda kosong.
                 </div>
             </template>
             <template x-for="(item, index) in items" :key="index">
                 <div class="flex items-center justify-between border-b border-white/10 pb-4">
                     <div class="flex-1 pr-4">
                         <h4 class="font-display font-bold text-sm text-[#F8FAFC]" x-text="item.name"></h4>
                         <p class="text-xs text-[#B8E637] font-mono mt-0.5" x-text="'Rp ' + Number(item.price).toLocaleString('id-ID')"></p>
                         <p class="text-[0.65rem] text-[#8C96A3] font-mono" x-show="item.customInfo" x-text="'Kustom: ' + item.customInfo"></p>
                     </div>
                     <div class="flex items-center gap-3">
                         <div class="flex items-center border border-white/10 rounded bg-[#20252C]">
                             <button @click="updateQty(index, item.qty - 1)" class="px-2.5 py-1 text-[#F8FAFC] hover:bg-white/10 font-bold">-</button>
                             <span x-text="item.qty" class="px-3 font-mono text-xs text-[#F8FAFC]"></span>
                             <button @click="updateQty(index, item.qty + 1)" class="px-2.5 py-1 text-[#F8FAFC] hover:bg-white/10 font-bold">+</button>
                         </div>
                         <button @click="removeItem(index)" class="text-[#E5484D] hover:text-red-400 font-bold text-xs">&times;</button>
                     </div>
                 </div>
             </template>
         </div>

         <div class="p-6 border-t border-white/10 bg-[#111315]">
             <div class="flex justify-between items-center mb-4 text-sm font-bold text-[#F8FAFC]">
                 <span>Subtotal:</span>
                 <span class="font-mono text-base text-[#B8E637]" x-text="'Rp ' + getSubtotal().toLocaleString('id-ID')"></span>
             </div>
             <button @click="goToCheckout()" class="w-full btn-m1-primary justify-center text-xs py-3 font.semibold uppercase tracking-wider" :disabled="items.length === 0">
                 PROSES CHECKOUT &rarr;
             </button>
         </div>
    </div>
</div>

<script>
function globalCart() {
    return {
        open: false,
        items: [],
        initCart() {
            const raw = localStorage.getItem('rgr_cart');
            if (raw) {
                try { this.items = JSON.parse(raw); } catch(e) { this.items = []; }
            }
            window.addEventListener('storage', () => {
                const updatedRaw = localStorage.getItem('rgr_cart');
                if (updatedRaw) {
                    try { this.items = JSON.parse(updatedRaw); } catch(e) {}
                }
            });
        },
        saveCart() {
            localStorage.setItem('rgr_cart', JSON.stringify(this.items));
            window.dispatchEvent(new CustomEvent('storage'));
        },
        addToCart(item) {
            const found = this.items.find(i => i.id === item.id && i.customInfo === item.customInfo);
            if (found) {
                found.qty += 1;
            } else {
                this.items.push({
                    id: item.id,
                    name: item.name,
                    price: item.price,
                    qty: 1,
                    customInfo: item.customInfo || ''
                });
            }
            this.saveCart();
            this.open = true;
        },
        updateQty(index, newQty) {
            if (newQty <= 0) {
                this.removeItem(index);
                return;
            }
            this.items[index].qty = newQty;
            this.saveCart();
        },
        removeItem(index) {
            this.items.splice(index, 1);
            this.saveCart();
        },
        itemsCount() {
            return this.items.reduce((acc, curr) => acc + curr.qty, 0);
        },
        getSubtotal() {
            return this.items.reduce((acc, curr) => acc + (curr.price * curr.qty), 0);
        },
        goToCheckout() {
            window.location.href = "{{ route('shop.checkout-v2') }}";
        }
    }
}
</script>

@stack('scripts')
</body>
</html>
