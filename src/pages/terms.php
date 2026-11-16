<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Terms of Service • Laggy World</title>
  <link rel="icon" type="image/png" href="/logo.png">
  <link rel="stylesheet" href="/style.css">
  <link rel="stylesheet" href="/terms.css">
</head>
<body>

<div id="cursor"></div>
<div id="cursor-ring"></div>

<div class="noise" aria-hidden="true"></div>
<div id="progress-line"></div>

<div id="botCheck" role="dialog" aria-label="Human verification">
  <div class="ls-corner ls-corner-tl"></div>
  <div class="ls-corner ls-corner-tr"></div>
  <div class="ls-corner ls-corner-bl"></div>
  <div class="ls-corner ls-corner-br"></div>
  <div class="bc-inner">
    <div class="bc-badge">Security Check · Laggy World</div>
    <div class="bc-question" id="bcQuestion">Select all: CREEPERS</div>
    <div class="bc-sub" id="bcSubtitle">Tap every matching tile then confirm</div>
    <div class="bc-grid" id="bcGrid"></div>
    <button class="bc-confirm-btn" id="bcConfirm" disabled>Confirm Selection</button>
    <div class="bc-error" id="bcError">Wrong selection try again</div>
    <div class="bc-attempts" id="bcAttempts"></div>
  </div>
</div>

 

<?php require __DIR__ . '/../partials/site-header.php'; ?>

<main id="main-content" tabindex="-1">
  <section class="section">
    <div class="container">
      <div class="card">
        <h1>Terms of Service</h1>
        <p>Last updated: March 2026</p>
      </div>

      <div class="terms-content">

        <div class="content-card">
          <h2>Welcome to Laggy World</h2>
          <p>By accessing and playing on Laggy World, you agree to follow these terms and conditions. Read them carefully before playing.</p>
        </div>

        <div class="content-card">
          <h2>User Conduct</h2>
          <h3>What You Can Do</h3>
          <ul>
            <li>Play the game and participate in all activities</li>
            <li>Chat with other players responsibly</li>
            <li>Build, explore, and enjoy the world</li>
            <li>Participate in PvP and griefing (it's allowed!)</li>
          </ul>
          <h3>What You Cannot Do</h3>
          <ul>
            <li>Use hacks, cheats, or modified clients</li>
            <li>Make real life threats or doxx players</li>
            <li>Post inappropriate or NSFW content</li>
            <li>Crash the server intentionally</li>
            <li>Promote other servers or Discord communities</li>
          </ul>
        </div>

        <div class="content-card">
          <h2>Account Responsibility</h2>
          <p>You are responsible for keeping your account secure. We are not liable for unauthorized access to your account. Be careful with your password!</p>
        </div>

        <div class="content-card">
          <h2>Server Access</h2>
          <p>We reserve the right to ban or kick any player who violates our rules. Bans are permanent unless we decide otherwise. No refunds for in-game items (we don't have any).</p>
        </div>

        <div class="content-card">
          <h2>Limitation of Liability</h2>
          <p>Laggy World operates as is. We are not responsible for:</p>
          <ul>
            <li>Server downtime or lag (it's part of the experience!)</li>
            <li>Lost items or progress</li>
            <li>Connection issues</li>
            <li>Griefing by other players</li>
          </ul>
        </div>

        <div class="content-card">
          <h2>Changes to Terms</h2>
          <p>We may update these terms at any time. Continued play means you accept the changes.</p>
        </div>

        <div class="content-card">
          <h2>Questions?</h2>
          <p>Join our Discord to discuss any questions about these terms: <a href="https://discord.gg/dzPXJgNTsV" target="_blank" class="glow-text">discord.gg/dzPXJgNTsV</a></p>
        </div>

      </div>
    </div>
  </section>
</main>

<?php
$footerCopy = "\u{00A9} 2026 Laggy World \u{2022} All chaos reserved";
$footerLinks = [
    ['/privacy/', 'Privacy'],
    ['/terms/', 'Terms'],
    ['/bug/', 'Bug Reports'],
    ['/about/', 'About'],
];
require __DIR__ . '/../partials/site-footer.php';
?>

<script>
  (function () {
    const dot  = document.getElementById('cursor');
    const ring = document.getElementById('cursor-ring');
    if (!dot || !ring) return;

    let mouseX = -100, mouseY = -100;
    let ringX  = -100, ringY  = -100;
    let rafId;

    document.addEventListener('mousemove', (e) => {
      mouseX = e.clientX;
      mouseY = e.clientY;
      dot.style.left = mouseX + 'px';
      dot.style.top  = mouseY + 'px';
    });

    function animateRing() {
      ringX += (mouseX - ringX) * 0.18;
      ringY += (mouseY - ringY) * 0.18;
      ring.style.left = ringX + 'px';
      ring.style.top  = ringY + 'px';
      rafId = requestAnimationFrame(animateRing);
    }
    animateRing();

    const hoverTargets = 'a, button, [role="button"], .bc-tile, label, input, select, textarea';
    document.addEventListener('mouseover', (e) => {
      if (e.target.closest(hoverTargets)) {
        dot.classList.add('hovered');
        ring.classList.add('hovered');
      }
    });
    document.addEventListener('mouseout', (e) => {
      if (e.target.closest(hoverTargets)) {
        dot.classList.remove('hovered');
        ring.classList.remove('hovered');
      }
    });

    document.addEventListener('mouseleave', () => {
      dot.style.opacity  = '0';
      ring.style.opacity = '0';
    });
    document.addEventListener('mouseenter', () => {
      dot.style.opacity  = '1';
      ring.style.opacity = '1';
    });
  })();

  const HUMAN_KEY = 'laggyworld.s2.humanVerified';
  const LOAD_KEY  = 'laggyworld.s2.loaderDone';

  const CHALLENGES = [
    { question: 'Select all: TNT BLOCKS',  sub: 'Find every TNT then confirm',          targetClass: 'block-tnt', targetCount: 3, fillerClasses: ['block-dirt','block-stone','block-grass','block-torch','block-diamond','block-creeper','block-sword'] },
    { question: 'Select all: DIAMONDS',    sub: 'Click the diamonds and ignore everything else', targetClass: 'block-diamond', targetCount: 4, fillerClasses: ['block-dirt','block-stone','block-grass','block-torch','block-tnt','block-creeper','block-sword'] },
    { question: 'Select all: SWORDS',      sub: 'Choose every sword tile then confirm', targetClass: 'block-sword', targetCount: 3, fillerClasses: ['block-dirt','block-stone','block-grass','block-torch','block-diamond','block-creeper','block-tnt'] },
    { question: 'Select all: CREEPERS',    sub: 'Tap every creeper tile then confirm',  targetClass: 'block-creeper', targetCount: 3, fillerClasses: ['block-dirt','block-stone','block-grass','block-torch','block-diamond','block-tnt','block-sword'] },
  ];

  let bcAttempts = 0, bcChallenge = null, bcCorrect = new Set(), bcSelected = new Set();

  function shuffle(arr) {
    for (let i = arr.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [arr[i], arr[j]] = [arr[j], arr[i]];
    }
  }

  function buildChallenge() {
    const ch = CHALLENGES[Math.floor(Math.random() * CHALLENGES.length)];
    bcChallenge = ch; bcCorrect = new Set(); bcSelected = new Set();
    document.getElementById('bcQuestion').textContent = ch.question;
    document.getElementById('bcSubtitle').textContent = ch.sub || 'Tap every matching tile then confirm';

    const fillers = [...ch.fillerClasses]; shuffle(fillers);
    const totalTiles = 16;
    const positions = Array.from({ length: totalTiles }, (_, i) => i); shuffle(positions);
    const targetPositions = new Set(positions.slice(0, ch.targetCount));
    const grid = document.getElementById('bcGrid'); grid.innerHTML = '';

    for (let i = 0; i < totalTiles; i++) {
      const isTarget = targetPositions.has(i);
      const classes = isTarget ? ['bc-tile', ch.targetClass] : ['bc-tile', (fillers[i % fillers.length] || 'block-dirt')];
      if (isTarget) bcCorrect.add(i);
      const tile = document.createElement('div');
      tile.className = classes.join(' ');
      tile.dataset.index = i;
      if (!isTarget) {
        const icon = document.createElement('span');
        icon.className = 'block-icon ' + classes[1];
        tile.appendChild(icon);
      } else {
        const icon = document.createElement('span');
        icon.className = 'block-icon ' + classes[1];
        tile.appendChild(icon);
      }
      tile.addEventListener('click', () => toggleTile(tile, i));
      grid.appendChild(tile);
    }
    document.getElementById('bcConfirm').disabled = true;
    document.getElementById('bcError').classList.remove('show');
  }

  function toggleTile(tile, idx) {
    if (bcSelected.has(idx)) { bcSelected.delete(idx); tile.classList.remove('selected'); }
    else { bcSelected.add(idx); tile.classList.add('selected'); }
    document.getElementById('bcConfirm').disabled = bcSelected.size === 0;
  }

  function checkBotAnswer() {
    const isCorrect = bcSelected.size === bcCorrect.size && [...bcSelected].every(i => bcCorrect.has(i));
    if (isCorrect) {
      localStorage.setItem(HUMAN_KEY, '1');
      const bc = document.getElementById('botCheck');
      bc.classList.add('hidden');
      setTimeout(() => bc.remove(), 500);
    } else {
      bcAttempts++;
      document.getElementById('bcError').classList.add('show');
      document.getElementById('bcAttempts').textContent = bcAttempts > 1 ? `${bcAttempts} failed attempts` : '';
      document.querySelectorAll('.bc-tile.selected').forEach(t => {
        t.classList.add('wrong');
        setTimeout(() => t.classList.remove('wrong', 'selected'), 600);
      });
      bcSelected.clear();
      setTimeout(() => { buildChallenge(); document.getElementById('bcError').classList.remove('show'); }, 900);
    }
  }

  document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('menuToggle')?.addEventListener('click', () => {
      const menu = document.getElementById('mobileMenu');
      const isOpen = menu?.classList.toggle('open') ?? false;
      document.getElementById('menuToggle')?.setAttribute('aria-expanded', String(isOpen));
    });
    window.addEventListener('scroll', () => {
      const maxScroll = document.documentElement.scrollHeight - window.innerHeight;
      const progress = maxScroll > 0 ? window.scrollY / maxScroll * 100 : 0;
      const progressLine = document.getElementById('progress-line');
      if (progressLine) progressLine.style.width = progress + '%';
      document.getElementById('nav')?.classList.toggle('scrolled', window.scrollY > 40);
    });
  });
</script>

</body>
</html>