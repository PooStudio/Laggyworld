<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Agreement • Laggy World</title>
    <link rel="icon" type="image/png" href="/logo.png">
    <link rel="stylesheet" href="/style.css">
</head>
<body class="staff-page">

<a class="skip-link" href="#main-content">Skip to content</a>
<div id="cursor"></div>
<div id="cursor-ring"></div>

    <header>
        <div class="container">
            <a href="/" class="nav-logo">
                <img src="/logo.png" alt="" class="logo-minecraft">
                <span class="nav-logo-text">Laggy World</span>
            </a>

            <nav class="nav-links" aria-label="Primary navigation">
                <a href="/">Home</a>
                <a href="/about/">About</a>
                <a href="/rules/">Rules</a>
                <a href="/vote/">Vote</a>
                <a href="/bug/">Bug</a>
            </nav>

            <div class="nav-actions">
                <a href="https://discord.gg/dzPXJgNTsV" target="_blank" rel="noopener" class="btn btn-primary">Join Discord</a>
                <button id="mobileMenuToggle" class="menu-toggle" type="button" aria-label="Toggle navigation" aria-expanded="false" aria-controls="mobileMenu">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M3 5a1 1 0 000 2h14a1 1 0 100-2H3zM3 9a1 1 0 000 2h14a1 1 0 100-2H3zM3 13a1 1 0 000 2h14a1 1 0 100-2H3z" clip-rule="evenodd" /></svg>
                </button>
            </div>
        </div>

        <nav id="mobileMenu" class="mobile-menu" aria-label="Mobile navigation">
            <a href="/">Home</a>
            <a href="/about/">About</a>
            <a href="/rules/">Rules</a>
            <a href="/vote/">Vote</a>
            <a href="/bug/">Bug</a>
            <a href="https://discord.gg/dzPXJgNTsV" target="_blank" rel="noopener">Discord</a>
        </nav>
    </header>

    <main id="main-content" tabindex="-1">
        <section class="staff-hero">
            <div class="staff-hero-bg hero-bg"></div>

            <div class="container staff-hero-content">
                <div class="staff-hero-copy">
                    <p class="staff-hero-label">STAFF AGREEMENT</p>
                    <h1 class="glitch staff-hero-title">
                        Join the Chaos Team
                    </h1>
                    <p class="staff-hero-description">
                        Becoming staff means responsibility. Read the rules carefully; there are no appeals.
                    </p>
                </div>
            </div>
        </section>

        <section class="section staff-rules-section">
            <div class="container">
                <div class="staff-rules-card">
                    <h2 class="staff-rules-title">Staff Rules</h2>
                    <ul class="staff-rules-list">
                        <li>I will not abuse commands.</li>
                        <li>I will not give items to players.</li>
                        <li>I will not use creative for survival advantage.</li>
                        <li>I understand I can be banned for misuse.</li>
                        <li>I understand there are no appeals.</li>
                    </ul>

                    <p class="staff-rules-note">Staff application is currently closed. Please join our Discord to ask about staff openings.</p>
                </div>
            </div>
        </section>
    </main>

    <footer class="staff-footer">
        <div class="container">
            <div class="staff-footer-content">
                <div>© 2026 Laggy World · All chaos reserved</div>
                <div class="staff-footer-links">
                    <a href="/privacy/">Privacy</a>
                    <a href="/terms/">Terms</a>
                    <a href="/bug/">Bug Reports</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        const cursor = document.getElementById('cursor');
        const ring   = document.getElementById('cursor-ring');
        let mx = 0, my = 0, rx = 0, ry = 0;
        document.addEventListener('mousemove', e => {
            mx = e.clientX; my = e.clientY;
            cursor.style.left = mx + 'px';
            cursor.style.top  = my + 'px';
        });
        (function animateRing() {
            rx += (mx - rx) * 0.18;
            ry += (my - ry) * 0.18;
            ring.style.left = rx + 'px';
            ring.style.top  = ry + 'px';
            requestAnimationFrame(animateRing);
        })();

        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const mobileMenu = document.getElementById('mobileMenu');
        if (mobileMenuToggle && mobileMenu) {
            mobileMenuToggle.addEventListener('click', () => {
                const isOpen = mobileMenu.classList.toggle('open');
                mobileMenuToggle.setAttribute('aria-expanded', String(isOpen));
            });
        }

    </script>
    <script src="/site-status.js" defer></script>

</body>
</html>