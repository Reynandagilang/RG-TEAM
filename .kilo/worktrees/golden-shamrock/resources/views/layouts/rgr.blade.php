<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="@yield('meta_description', 'Rey Gilang Racing — Indonesian Formula 1 Constructor. Speed forged in carbon. Power beyond limits.')">
    <meta name="keywords" content="Rey Gilang Racing, RGR, Formula 1, F1, Indonesian F1 Team, RGR-26">
    <meta name="author" content="Rey Gilang Racing">
    <meta property="og:title" content="@yield('title', 'Rey Gilang Racing') | M1TRG F1 Team">
    <meta property="og:type" content="website">
    <title>@yield('title', 'Rey Gilang Racing') | M1TRG F1</title>

    {{-- Google Fonts: Orbitron (Racing Display) + Inter (Body) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;800;900&family=Inter:wght@300;400;500;600;700&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Tailwind CDN (production should use vite build) --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        // M1TRG Stealth Dark Palette
                        'carbon':    '#0F0F12',
                        'carbon-2':  '#16161B',
                        'carbon-3':  '#1E1E25',
                        'carbon-4':  '#252530',
                        'steel':     '#2A2A38',
                        'steel-2':   '#3A3A50',
                        // M1TRG Signature Cyan
                        'rgr-cyan':  '#00D4FF',
                        'rgr-cyan-2':'#00B8E0',
                        'rgr-cyan-3':'#007BA8',
                        // Accent Red (secondary)
                        'rgr-red':   '#FF1E3C',
                        // Text
                        'ice':       '#E8F4F8',
                        'ice-2':     '#B0C8D4',
                        'muted':     '#6B7A8D',
                    },
                    fontFamily: {
                        'display': ['Orbitron', 'sans-serif'],
                        'body':    ['Inter', 'sans-serif'],
                        'racing':  ['Rajdhani', 'sans-serif'],
                    },
                    backgroundImage: {
                        'carbon-gradient': 'linear-gradient(180deg, #0F0F12 0%, #16161B 50%, #0F0F12 100%)',
                        'hero-gradient':   'linear-gradient(135deg, #0F0F12 0%, #1a1a2e 50%, #0F0F12 100%)',
                        'cyan-glow':       'radial-gradient(ellipse at center, rgba(0,212,255,0.15) 0%, transparent 70%)',
                    },
                    boxShadow: {
                        'cyan-glow':    '0 0 20px rgba(0,212,255,0.3), 0 0 60px rgba(0,212,255,0.1)',
                        'cyan-glow-lg': '0 0 40px rgba(0,212,255,0.5), 0 0 80px rgba(0,212,255,0.2)',
                        'red-glow':     '0 0 20px rgba(255,30,60,0.4)',
                        'card-hover':   '0 20px 60px rgba(0,0,0,0.6), 0 0 30px rgba(0,212,255,0.15)',
                    },
                    animation: {
                        'glow-pulse': 'glowPulse 3s ease-in-out infinite',
                        'slide-up':   'slideUp 0.6s ease-out forwards',
                        'scan-line':  'scanLine 4s linear infinite',
                    },
                    keyframes: {
                        glowPulse: {
                            '0%, 100%': { boxShadow: '0 0 20px rgba(0,212,255,0.3)' },
                            '50%':      { boxShadow: '0 0 40px rgba(0,212,255,0.7), 0 0 80px rgba(0,212,255,0.3)' },
                        },
                        slideUp: {
                            from: { opacity: '0', transform: 'translateY(30px)' },
                            to:   { opacity: '1', transform: 'translateY(0)' },
                        },
                        scanLine: {
                            '0%':   { transform: 'translateY(-100%)' },
                            '100%': { transform: 'translateY(400%)' },
                        },
                    },
                },
            },
        }
    </script>

    <style>
        /* ── Global Reset & Base ─────────────────────────────────── */
        *, *::before, *::after { box-sizing: border-box; }
        body {
            background-color: #0F0F12;
            color: #E8F4F8;
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        /* ── Scrollbar ──────────────────────────────────────────── */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #0F0F12; }
        ::-webkit-scrollbar-thumb { background: #00D4FF; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #00B8E0; }

        /* ── Navbar ─────────────────────────────────────────────── */
        .rgr-navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: linear-gradient(180deg, rgba(15,15,18,0.98) 0%, rgba(15,15,18,0.0) 100%);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(0,212,255,0.08);
            transition: all 0.4s ease;
        }
        .rgr-navbar.scrolled {
            background: rgba(15,15,18,0.97);
            border-bottom-color: rgba(0,212,255,0.2);
            box-shadow: 0 4px 30px rgba(0,0,0,0.5);
        }

        /* ── Nav Link ───────────────────────────────────────────── */
        .nav-link {
            position: relative;
            font-family: 'Rajdhani', sans-serif;
            font-weight: 600;
            font-size: 0.85rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #B0C8D4;
            transition: color 0.3s ease;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 1px;
            background: #00D4FF;
            box-shadow: 0 0 8px #00D4FF;
            transition: width 0.35s ease;
        }
        .nav-link:hover { color: #00D4FF; }
        .nav-link:hover::after { width: 100%; }
        .nav-link.active { color: #00D4FF; }
        .nav-link.active::after { width: 100%; }

        /* ── Logo ───────────────────────────────────────────────── */
        .rgr-logo {
            font-family: 'Orbitron', sans-serif;
            font-weight: 900;
            font-size: 1.35rem;
            letter-spacing: 0.1em;
            background: linear-gradient(135deg, #00D4FF 0%, #ffffff 60%, #00D4FF 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            filter: drop-shadow(0 0 8px rgba(0,212,255,0.5));
        }

        /* ── Cyan Accent Line ───────────────────────────────────── */
        .accent-line {
            display: inline-block;
            width: 3px;
            height: 100%;
            background: linear-gradient(180deg, #00D4FF, transparent);
        }

        /* ── CTA Button ─────────────────────────────────────────── */
        .btn-rgr {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.65rem 1.75rem;
            font-family: 'Rajdhani', sans-serif;
            font-weight: 700;
            font-size: 0.85rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #0F0F12;
            background: #00D4FF;
            border: 1px solid #00D4FF;
            clip-path: polygon(8px 0%, 100% 0%, calc(100% - 8px) 100%, 0% 100%);
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            overflow: hidden;
        }
        .btn-rgr::before {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(255,255,255,0.15);
            transform: translateX(-100%);
            transition: transform 0.4s ease;
        }
        .btn-rgr:hover::before { transform: translateX(100%); }
        .btn-rgr:hover {
            box-shadow: 0 0 25px rgba(0,212,255,0.6), 0 0 60px rgba(0,212,255,0.2);
            color: #0F0F12;
        }

        .btn-rgr-outline {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.65rem 1.75rem;
            font-family: 'Rajdhani', sans-serif;
            font-weight: 700;
            font-size: 0.85rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #00D4FF;
            background: transparent;
            border: 1px solid rgba(0,212,255,0.4);
            clip-path: polygon(8px 0%, 100% 0%, calc(100% - 8px) 100%, 0% 100%);
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
        }
        .btn-rgr-outline:hover {
            background: rgba(0,212,255,0.08);
            border-color: #00D4FF;
            box-shadow: 0 0 20px rgba(0,212,255,0.3);
            color: #00D4FF;
        }

        /* ── Card ───────────────────────────────────────────────── */
        .rgr-card {
            background: linear-gradient(135deg, rgba(22,22,27,0.9), rgba(30,30,37,0.8));
            border: 1px solid rgba(0,212,255,0.1);
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease;
        }
        .rgr-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, #00D4FF, transparent);
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        .rgr-card:hover {
            border-color: rgba(0,212,255,0.3);
            box-shadow: 0 20px 60px rgba(0,0,0,0.6), 0 0 30px rgba(0,212,255,0.15);
            transform: translateY(-4px);
        }
        .rgr-card:hover::before { opacity: 1; }

        /* ── Section Title ──────────────────────────────────────── */
        .section-label {
            font-family: 'Rajdhani', sans-serif;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            color: #00D4FF;
        }
        .section-title {
            font-family: 'Orbitron', sans-serif;
            font-weight: 800;
            letter-spacing: 0.02em;
            color: #E8F4F8;
            line-height: 1.1;
        }

        /* ── Grid Background ────────────────────────────────────── */
        .grid-bg {
            background-image:
                linear-gradient(rgba(0,212,255,0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0,212,255,0.03) 1px, transparent 1px);
            background-size: 60px 60px;
        }

        /* ── Separator ──────────────────────────────────────────── */
        .cyan-separator {
            height: 1px;
            background: linear-gradient(90deg, transparent, #00D4FF, transparent);
            opacity: 0.4;
        }

        /* ── Footer ─────────────────────────────────────────────── */
        .rgr-footer {
            background: #0A0A0D;
            border-top: 1px solid rgba(0,212,255,0.1);
        }

        /* ── Mobile Hamburger ───────────────────────────────────── */
        .hamburger-line {
            display: block;
            width: 22px;
            height: 1.5px;
            background: #00D4FF;
            transition: all 0.3s ease;
        }
    </style>

    @stack('styles')
</head>

<body class="antialiased">

    {{-- ─── NAVBAR ───────────────────────────────────────────────────── --}}
    <nav class="rgr-navbar" id="rgr-navbar" role="navigation" aria-label="Main Navigation">
        <div class="max-w-7xl mx-auto px-6 flex items-center justify-between h-16 lg:h-[70px]">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 group" id="nav-logo">
                {{-- Emblem --}}
                <div class="w-9 h-9 flex items-center justify-center border border-rgr-cyan/40 relative"
                     style="clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);">
                    <span class="font-display font-black text-rgr-cyan text-xs">RGR</span>
                    <div class="absolute inset-0 bg-rgr-cyan/5 group-hover:bg-rgr-cyan/10 transition-colors duration-300"
                         style="clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);">
                    </div>
                </div>
                <span class="rgr-logo">REY GILANG</span>
            </a>

            {{-- Desktop Nav Links --}}
            <div class="hidden lg:flex items-center gap-8">
                <a href="{{ route('home') }}"
                   class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                   id="nav-home">Home</a>
                <a href="{{ route('drivers') }}"
                   class="nav-link {{ request()->routeIs('drivers') ? 'active' : '' }}"
                   id="nav-drivers">Drivers</a>
                <a href="{{ route('car.specs') }}"
                   class="nav-link {{ request()->routeIs('car.specs') ? 'active' : '' }}"
                   id="nav-car">Car</a>
                <a href="{{ route('schedule') }}"
                   class="nav-link {{ request()->routeIs('schedule') ? 'active' : '' }}"
                   id="nav-schedule">Schedule</a>
            </div>

            {{-- CTA + Hamburger --}}
            <div class="flex items-center gap-4">
                <a href="{{ route('car.specs') }}" class="btn-rgr hidden lg:inline-flex" id="nav-cta">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2L2 7l8 5 8-5-8-5zM2 13l8 5 8-5M2 10l8 5 8-5"/></svg>
                    Explore Car
                </a>
                {{-- Mobile Hamburger --}}
                <button class="lg:hidden flex flex-col gap-1.5 p-2" id="mobile-menu-btn"
                        aria-label="Toggle mobile menu" aria-expanded="false">
                    <span class="hamburger-line" id="hline-1"></span>
                    <span class="hamburger-line" id="hline-2"></span>
                    <span class="hamburger-line" id="hline-3"></span>
                </button>
            </div>
        </div>

        {{-- Mobile Dropdown --}}
        <div class="lg:hidden hidden border-t border-rgr-cyan/10 bg-carbon/98" id="mobile-menu">
            <div class="px-6 py-4 flex flex-col gap-4">
                <a href="{{ route('home') }}"     class="nav-link" id="mnav-home">Home</a>
                <a href="{{ route('drivers') }}"  class="nav-link" id="mnav-drivers">Drivers</a>
                <a href="{{ route('car.specs') }}" class="nav-link" id="mnav-car">Car</a>
                <a href="{{ route('schedule') }}" class="nav-link" id="mnav-schedule">Schedule</a>
            </div>
        </div>
    </nav>
    {{-- ─────────────────────────────────────────────────────────────── --}}

    {{-- Page Content --}}
    <main>
        @yield('content')
    </main>

    {{-- ─── FOOTER ────────────────────────────────────────────────────── --}}
    <footer class="rgr-footer" role="contentinfo">
        <div class="max-w-7xl mx-auto px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

                {{-- Brand --}}
                <div>
                    <a href="{{ route('home') }}" class="rgr-logo text-lg block mb-4">REY GILANG RACING</a>
                    <p class="text-muted text-sm leading-relaxed max-w-xs">
                        Indonesian Formula 1 constructor, founded 2018. Speed forged in carbon. Power beyond limits.
                    </p>
                    <div class="mt-6 flex gap-3">
                        <span class="w-8 h-8 flex items-center justify-center border border-rgr-cyan/20 text-muted hover:border-rgr-cyan hover:text-rgr-cyan transition-all cursor-pointer text-xs">X</span>
                        <span class="w-8 h-8 flex items-center justify-center border border-rgr-cyan/20 text-muted hover:border-rgr-cyan hover:text-rgr-cyan transition-all cursor-pointer text-xs">IG</span>
                        <span class="w-8 h-8 flex items-center justify-center border border-rgr-cyan/20 text-muted hover:border-rgr-cyan hover:text-rgr-cyan transition-all cursor-pointer text-xs">YT</span>
                    </div>
                </div>

                {{-- Navigation --}}
                <div>
                    <h3 class="section-label mb-4">Navigate</h3>
                    <ul class="space-y-2.5">
                        <li><a href="{{ route('home') }}"     class="text-muted text-sm hover:text-rgr-cyan transition-colors">Home</a></li>
                        <li><a href="{{ route('drivers') }}"  class="text-muted text-sm hover:text-rgr-cyan transition-colors">Drivers</a></li>
                        <li><a href="{{ route('car.specs') }}" class="text-muted text-sm hover:text-rgr-cyan transition-colors">The Car</a></li>
                        <li><a href="{{ route('schedule') }}" class="text-muted text-sm hover:text-rgr-cyan transition-colors">Race Schedule</a></li>
                    </ul>
                </div>

                {{-- Info --}}
                <div>
                    <h3 class="section-label mb-4">Team Base</h3>
                    <p class="text-muted text-sm">Jakarta, Indonesia</p>
                    <p class="text-muted text-sm mt-1">Team Principal: <span class="text-ice">Rey Gilang</span></p>
                    <div class="mt-4 pt-4 border-t border-steel/50">
                        <p class="text-muted text-xs">Season 2026 · FIA Formula 1 World Championship</p>
                    </div>
                </div>
            </div>

            <div class="cyan-separator my-8"></div>
            <div class="flex flex-col sm:flex-row justify-between items-center gap-2 text-muted text-xs">
                <p>&copy; {{ date('Y') }} Rey Gilang Racing F1 Team. All rights reserved.</p>
                <p class="text-rgr-cyan/60 font-racing tracking-widest text-xs">SPEED · PRECISION · INNOVATION</p>
            </div>
        </div>
    </footer>

    {{-- ─── SCRIPTS ────────────────────────────────────────────────────── --}}
    <script>
        // Navbar scroll effect
        const navbar = document.getElementById('rgr-navbar');
        window.addEventListener('scroll', () => {
            navbar.classList.toggle('scrolled', window.scrollY > 60);
        });

        // Mobile menu toggle
        const mobileBtn  = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const hLine1     = document.getElementById('hline-1');
        const hLine2     = document.getElementById('hline-2');
        const hLine3     = document.getElementById('hline-3');

        mobileBtn.addEventListener('click', () => {
            const isOpen = !mobileMenu.classList.contains('hidden');
            mobileMenu.classList.toggle('hidden', isOpen);
            mobileBtn.setAttribute('aria-expanded', String(!isOpen));
            // Animate hamburger → X
            if (!isOpen) {
                hLine1.style.transform = 'translateY(6px) rotate(45deg)';
                hLine2.style.opacity   = '0';
                hLine3.style.transform = 'translateY(-6px) rotate(-45deg)';
            } else {
                hLine1.style.transform = '';
                hLine2.style.opacity   = '1';
                hLine3.style.transform = '';
            }
        });

        // Intersection Observer for scroll-reveal
        const reveals = document.querySelectorAll('[data-reveal]');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(el => {
                if (el.isIntersecting) {
                    el.target.style.opacity   = '1';
                    el.target.style.transform = 'translateY(0)';
                    observer.unobserve(el.target);
                }
            });
        }, { threshold: 0.1 });

        reveals.forEach(el => {
            el.style.opacity   = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity 0.7s ease, transform 0.7s ease';
            observer.observe(el);
        });
    </script>

    @stack('scripts')
</body>
</html>
