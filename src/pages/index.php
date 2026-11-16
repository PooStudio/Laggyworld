<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laggy World • Chaos Edition</title>
  <link rel="icon" type="image/png" href="/logo.png">
  <link rel="stylesheet" href="/style.css">
  <link rel="stylesheet" href="/index.css">
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
    <div class="bc-badge">Security Check: Laggy World</div>
    <div class="bc-question" id="bcQuestion">Select all: CREEPERS</div>
    <div class="bc-sub" id="bcSubtitle">Tap every matching tile then confirm</div>
    <div class="bc-guide">Mine the matching blocks to pass the gate</div>

    <div class="bc-grid" id="bcGrid"></div>

    <button class="bc-confirm-btn" id="bcConfirm" disabled>Confirm Mining</button>
    <div class="bc-error" id="bcError">Wrong selection try again</div>
    <div class="bc-attempts" id="bcAttempts"></div>
  </div>
</div>

<div id="loadingOverlay" class="offline-overlay" role="status" aria-label="Offline — Laggy World">
  <div class="offline-card">
    <div class="offline-crosshair" aria-hidden="true"><span class="dot"></span></div>
    <pre class="offline-art">  ____   ______  ______ _       ______  ______
 / __ \ |  ____|/ ____| |     |  ____||  ____|
| |  | || |__  | (___ | |     | |__   | |__   
| |  | ||  __|  \___ \| |     |  __|  |  __|  
| |__| || |____ ____) | |____ | |____ | |____ 
 \____/ |______|_____/|______||______||______|
    </pre>
    <h1 class="offline-title">OFFLINE</h1>
    <p class="offline-sub">It's super dope.</p>
  </div>
</div>

<div id="pageShell" class="page-shell">
  <?php require __DIR__ . '/../partials/site-header.php'; ?>

  <main id="main-content" tabindex="-1">
  <section class="hero">
    <div class="hero-bg"></div>
    <div class="hero-content">
      <div class="hero-eyebrow">Community-run Minecraft server · No pay-to-win</div>
      <div class="server-bar">
        <div class="server-bar-item">
          <span class="server-bar-label">IP</span>
          <span class="server-bar-val">mc.laggy.world</span>
        </div>
        <span class="server-bar-sep">|</span>
        <div class="server-bar-item">
          <span class="server-bar-label">Status</span>
          <span id="serverStatus" class="server-bar-val info-offline">Checking…</span>
        </div>
        <span class="server-bar-sep">|</span>
        <div class="server-bar-item">
          <span class="server-bar-label">Players</span>
          <span id="playerCount" class="server-bar-val">Unknown</span>
        </div>
        <span class="server-bar-sep">|</span>
        <div class="server-bar-item">
          <span class="server-bar-label">Version</span>
          <span id="serverVersion" class="server-bar-val">Unknown</span>
        </div>
      </div>
      <h1 class="hero-title">LAGGY<br><span>WORLD</span></h1>
      <p class="hero-sub">A survival server for players who want the stories, the scrapes, and the unexpected. Join in, make your mark, and earn everything you use.</p>
      <div class="hero-actions">
        <button onclick="copyIP()" class="btn btn-primary">Copy Server IP</button>
        <a href="https://discord.gg/dzPXJgNTsV" target="_blank" rel="noopener" class="btn btn-secondary">Join Discord</a>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="text-center section-spaced">
        <div class="section-label">What makes us different</div>
        <h2 class="section-title">Built for <span>Chaos</span></h2>
        <p class="section-sub section-sub--centered">No tutorials. No hand holding. No mercy. Just the unexpected.</p>
      </div>
      <div class="grid-3">
        <div class="grid-cell card">
          <span class="card-icon icon-axe"></span>
          <div class="card-title">Custom Chaos Map</div>
          <p class="card-body">Entirely custom world generation with surprise structures and hazards everywhere you step.</p>
        </div>
        <div class="grid-cell card">
          <span class="card-icon icon-sword"></span>
          <div class="card-title">Survival with stakes</div>
          <p class="card-body">Explore, build, compete, and defend what you make. The world is unpredictable, but the rules are clear.</p>
        </div>
        <div class="grid-cell card">
          <span class="card-icon icon-fire"></span>
          <div class="card-title">Random Events</div>
          <p class="card-body">Expect the unexpected. Meteor showers, mob waves, world events, nothing is safe.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="section" id="fair-play">
    <div class="container">
      <div class="content-card content-width-lg">
        <div class="section-label">Fair play, always</div>
        <h2>No pay-to-win. Ever.</h2>
        <p>Playing is free. No paid ranks, kits, loot, or purchases that give someone an advantage in-game. Voting is optional, and it does not buy power. Your progress comes from playing.</p>
        <a href="/rules/">Read the server rules</a>
      </div>
    </div>
  </section>

  <section class="section" id="join">
    <div class="container">
      <div class="text-center section-spaced--compact">
        <div class="section-label">Your next session</div>
        <h2 class="section-title">Three steps. <span>You're in.</span></h2>
      </div>
      <div class="grid-3">
        <div class="grid-cell card"><div class="rule-num">01</div><div class="card-title">Open multiplayer</div><p class="card-body">Launch Minecraft and choose Multiplayer.</p></div>
        <div class="grid-cell card"><div class="rule-num">02</div><div class="card-title">Add our server</div><p class="card-body">Use the address <strong>mc.laggy.world</strong>.</p></div>
        <div class="grid-cell card"><div class="rule-num">03</div><div class="card-title">Join the world</div><p class="card-body">Check the current server version above and connect.</p></div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container text-center">
      <div class="section-label">Ready to play?</div>
      <h2 class="section-title">Join the <span>Mayhem</span></h2>
      <p class="section-sub section-sub--centered-gap">Copy the address, open Minecraft, and jump in. Need a hand? Our community is on Discord.</p>
      <div class="hero-actions">
        <button onclick="copyIP()" class="btn btn-primary">Copy Server IP</button>
        <a href="https://discord.gg/dzPXJgNTsV" target="_blank" rel="noopener" class="btn btn-secondary">Open Discord</a>
      </div>
    </div>
  </section>
  </main>

  <?php
$footerCopy = "\u{00A9} 2026 Laggy World. All chaos reserved";
$footerLinks = [
    ['/privacy/', 'Privacy'],
    ['/terms/', 'Terms'],
    ['/bug/', 'Bug Reports'],
    ['/about/', 'About'],
];
require __DIR__ . '/../partials/site-footer.php';
?>
</div>

<script>

  const cursor = document.getElementById('cursor');
  const ring   = document.getElementById('cursor-ring');
  let mx = -200, my = -200, rx = -200, ry = -200;

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

  document.addEventListener('mouseover', e => {
    if (e.target.closest('a, button, .bc-tile, [role="button"]')) {
      cursor.classList.add('hovered');
      ring.classList.add('hovered');
    }
  });
  document.addEventListener('mouseout', e => {
    if (e.target.closest('a, button, .bc-tile, [role="button"]')) {
      cursor.classList.remove('hovered');
      ring.classList.remove('hovered');
    }
  });

  const MC_API    = 'https://api.mcsrvstat.us/2/mc.laggy.world:25565';
  const HUMAN_KEY = 'laggyworld.s2.humanVerified';
  const LOAD_KEY  = 'laggyworld.s2.loaderDone';
  const INTRO_KEY = 'laggyworld.introSeen';

  const CHALLENGES = [
    {
      question: 'Select all: CREEPERS',
      sub: 'Find every creeper block then confirm',
      target: 'creeper',
      targetCount: 3,
      fillers: ['dirt', 'stone', 'torch', 'diamond', 'grass', 'tnt'],
    },
    {
      question: 'Select all: TNT BLOCKS',
      sub: 'Find every TNT block then confirm',
      target: 'tnt',
      targetCount: 3,
      fillers: ['dirt', 'stone', 'torch', 'diamond', 'grass', 'creeper'],
    },
    {
      question: 'Select all: DIAMONDS',
      sub: 'Click every diamond and ignore everything else',
      target: 'diamond',
      targetCount: 4,
      fillers: ['dirt', 'stone', 'torch', 'grass', 'creeper', 'tnt'],
    },
    {
      question: 'Select all: TORCHES',
      sub: 'Choose every torch tile then confirm',
      target: 'torch',
      targetCount: 3,
      fillers: ['dirt', 'stone', 'diamond', 'grass', 'creeper', 'tnt'],
    },
  ];

  let bcAttempts  = 0;
  let bcChallenge = null;
  let bcCorrect   = new Set();
  let bcSelected  = new Set();

  function buildChallenge() {
    const ch = CHALLENGES[Math.floor(Math.random() * CHALLENGES.length)];
    bcChallenge = ch;
    bcCorrect   = new Set();
    bcSelected  = new Set();

    document.getElementById('bcQuestion').textContent = ch.question;
    document.getElementById('bcSubtitle').textContent = ch.sub || 'Tap every matching tile then confirm';

    const fillers = [...(ch.fillers || [])];
    shuffle(fillers);

    const totalTiles = 16;
    const positions = Array.from({ length: totalTiles }, (_, i) => i);
    shuffle(positions);
    const targetPositions = new Set(positions.slice(0, ch.targetCount));

    const grid = document.getElementById('bcGrid');
    grid.innerHTML = '';

    for (let i = 0; i < totalTiles; i++) {
      const isTarget = targetPositions.has(i);
      const blockName = isTarget ? ch.target : (fillers[i % fillers.length] || 'stone');
      if (isTarget) bcCorrect.add(i);

      const tile = document.createElement('button');
      tile.type = 'button';
      tile.className = 'bc-tile';
      tile.dataset.index = i;
      tile.dataset.block = blockName;
      tile.innerHTML = `<span class="block-icon block-${blockName}"></span>`;
      tile.addEventListener('click', () => toggleTile(tile, i));
      grid.appendChild(tile);
    }

    document.getElementById('bcConfirm').disabled = true;
    document.getElementById('bcError').classList.remove('show');
  }

  function toggleTile(tile, idx) {
    if (bcSelected.has(idx)) {
      bcSelected.delete(idx);
      tile.classList.remove('selected');
    } else {
      bcSelected.add(idx);
      tile.classList.add('selected');
    }
    document.getElementById('bcConfirm').disabled = bcSelected.size === 0;
  }

  function shuffle(arr) {
    for (let i = arr.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [arr[i], arr[j]] = [arr[j], arr[i]];
    }
  }

  function checkBotAnswer() {
    const isCorrect =
      bcSelected.size === bcCorrect.size &&
      [...bcSelected].every(i => bcCorrect.has(i));

    if (isCorrect) {
      localStorage.setItem(HUMAN_KEY, '1');
      const bc = document.getElementById('botCheck');
      bc.classList.add('hidden');
      setTimeout(() => { bc.remove(); startLoader(); }, 500);
    } else {
      bcAttempts++;
      document.getElementById('bcError').classList.add('show');
      document.getElementById('bcAttempts').textContent =
        bcAttempts > 1 ? `${bcAttempts} failed attempts` : '';

      document.querySelectorAll('.bc-tile.selected').forEach(t => {
        t.classList.add('wrong');
        setTimeout(() => t.classList.remove('wrong', 'selected'), 600);
      });
      bcSelected.clear();

      setTimeout(() => {
        buildChallenge();
        document.getElementById('bcError').classList.remove('show');
      }, 900);
    }
  }

  const PHASES = [
    { label: 'Connecting to server…',   sub: 'Establishing secure channel' },
    { label: 'Loading world data…',     sub: 'Unpacking chaos algorithms' },
    { label: 'Syncing player records…', sub: 'Do not refresh. Chaos incoming.' },
    { label: 'Warming up the lag…',     sub: 'Almost there. Brace yourself.' },
    { label: 'Ready.',                  sub: 'Welcome to Laggy World.' },
  ];

  function setBar(p) {
    const b = document.getElementById('lsBar');
    if (b) b.style.width = Math.min(100, Math.max(0, p)) + '%';
  }
  function setPhase(i) {
    PHASES.forEach((_, idx) => {
      const d = document.getElementById('ph' + idx);
      if (!d) return;
      d.className = 'ls-phase-dot' + (idx < i ? ' done' : idx === i ? ' active' : '');
    });
    const s = document.getElementById('lsStatus');
    const u = document.getElementById('lsSub');
    if (s && PHASES[i]) s.textContent = PHASES[i].label;
    if (u && PHASES[i]) u.textContent = PHASES[i].sub;
  }
  function revealMainContent() {
    const shell = document.getElementById('pageShell');
    if (shell) shell.classList.add('ready');
  }

  function buildIntroBlocks() {
    const grid = document.getElementById('introGrid');
    const logo = document.getElementById('introLogoBuild');
    if (!grid && !logo) return;

    if (grid) {
      grid.innerHTML = '';
      for (let i = 0; i < 24; i++) {
        const block = document.createElement('span');
        block.className = 'intro-block';
        block.style.animationDelay = `${0.04 * i}s`;
        grid.appendChild(block);
      }
    }

    if (logo) {
      logo.innerHTML = '';
      const logoBlocks = 20;
      for (let i = 0; i < logoBlocks; i++) {
        const block = document.createElement('span');
        block.className = 'intro-logo-block';
        block.style.animationDelay = `${0.02 * i}s`;
        logo.appendChild(block);
      }
    }
  }

  function startIntroSequence() {
    const overlay = document.getElementById('introOverlay');
    const shell = document.getElementById('pageShell');
    if (!overlay || !shell) {
      revealMainContent();
      return;
    }

    buildIntroBlocks();
    shell.classList.remove('ready');
    overlay.classList.add('active');
    overlay.classList.remove('fade');

    setTimeout(() => {
      overlay.classList.add('fade');
      shell.classList.add('ready');
      setTimeout(() => {
        overlay.classList.remove('active');
        overlay.classList.remove('fade');
        localStorage.setItem(INTRO_KEY, '1');
      }, 800);
    }, 2200);
  }

  function beginSiteExperience() {
    const introSeen = localStorage.getItem(INTRO_KEY);
    if (!introSeen) {
      startIntroSequence();
    } else {
      revealMainContent();
    }
  }

  function hideLoading() {
    const o = document.getElementById('loadingOverlay');
    if (!o) return;
    o.classList.remove('is-lagging');
    o.classList.remove('hidden');
    o.style.display = 'flex';
    try{ sessionStorage.setItem(LOAD_KEY, '1'); }catch(e){}
    return;
  }

  function startLoader() {
    const overlay = document.getElementById('loadingOverlay');
    if (!overlay) return;
    overlay.style.display = 'flex';
    overlay.classList.add('is-lagging');

    let prog = 0, fakePhase = 0, apiDone = false;
    const softTargets = [22, 45, 68, 88];
    const glitchTimer = setInterval(() => {
      overlay.classList.toggle('is-lagging');
    }, 260);

    const iv = setInterval(() => {
      const softGoal = softTargets[fakePhase] ?? 88;
      const goal     = apiDone ? 100 : softGoal;
      prog = Math.min(goal, prog + Math.random() * 7 + 3);
      setBar(prog);

      if (prog >= softGoal && fakePhase < softTargets.length - 1) {
        fakePhase++;
        setPhase(fakePhase);
      }

      if (apiDone && prog >= 100) {
        clearInterval(iv);
        clearInterval(glitchTimer);
        overlay.classList.remove('is-lagging');
        setPhase(4);
        setBar(100);
        setTimeout(hideLoading, 700);
      }
    }, 160);

    fetchServerStatus().finally(() => { apiDone = true; });
  }

  async function fetchServerStatus() {
    try {
      const c = new AbortController();
      const t = setTimeout(() => c.abort(), 8000);
      const r = await fetch(MC_API, { signal: c.signal });
      clearTimeout(t);
      const d = await r.json();
      const s = document.getElementById('serverStatus');
      const p = document.getElementById('playerCount');
      const v = document.getElementById('serverVersion');
      if (d.online) {
        if (s) { s.textContent = 'Online'; s.className = 'server-bar-val info-online'; }
        if (p) p.textContent = `${d.players?.online ?? 0}/${d.players?.max ?? '??'}`;
        if (v) v.textContent = d.version || 'Unknown';
      } else {
        if (s) { s.textContent = 'Offline'; s.className = 'server-bar-val info-offline'; }
        if (p) p.textContent = 'Unknown';
        if (v) v.textContent = 'Unknown';
      }
    } catch(e) {
      const s = document.getElementById('serverStatus');
      if (s) { s.textContent = 'Offline'; s.className = 'server-bar-val info-offline'; }
    }
  }

  function copyIP() {
    navigator.clipboard.writeText('mc.laggy.world:25565').then(() => {
      const t = document.createElement('div');
      t.textContent = 'IP Copied!'; t.className = 'toast';
      document.body.appendChild(t);
      setTimeout(() => t.remove(), 2200);
    });
  }

  document.getElementById('menuToggle').addEventListener('click', () => {
    const menu = document.getElementById('mobileMenu');
    const isOpen = menu.classList.toggle('open');
    document.getElementById('menuToggle').setAttribute('aria-expanded', String(isOpen));
  });
  window.addEventListener('scroll', () => {
    const maxScroll = document.documentElement.scrollHeight - window.innerHeight;
    const progress = maxScroll > 0 ? window.scrollY / maxScroll * 100 : 0;
    const progressLine = document.getElementById('progress-line');
    if (progressLine) progressLine.style.width = progress + '%';
    document.getElementById('nav').classList.toggle('scrolled', window.scrollY > 40);
  });

  document.addEventListener('DOMContentLoaded', revealMainContent);

</script>
<script>
  (() => {
    const address = 'mc.laggy.world';
    const status = document.getElementById('serverStatus');
    const players = document.getElementById('playerCount');
    const version = document.getElementById('serverVersion');

    window.copyIP = async () => {
      try {
        await navigator.clipboard.writeText(address);
      } catch {
        const field = document.createElement('textarea');
        field.value = address;
        field.style.position = 'fixed';
        field.style.opacity = '0';
        document.body.appendChild(field);
        field.select();
        document.execCommand('copy');
        field.remove();
      }
      const toast = document.createElement('div');
      toast.className = 'toast';
      toast.textContent = 'Server address copied';
      document.body.appendChild(toast);
      setTimeout(() => toast.remove(), 2200);
    };

    const controller = new AbortController();
    const timeout = setTimeout(() => controller.abort(), 6000);
    fetch('https://api.mcsrvstat.us/3/mc.laggy.world', { signal: controller.signal, cache: 'no-store' })
      .then(response => {
        if (!response.ok) throw new Error('Status request failed');
        return response.json();
      })
      .then(data => {
        if (data.online) {
          status.textContent = 'Online';
          status.className = 'server-bar-val info-online';
          players.textContent = `${data.players?.online ?? 0}/${data.players?.max ?? '?'}`;
          version.textContent = data.version || 'Unknown';
        } else {
          status.textContent = 'Offline';
          status.className = 'server-bar-val info-offline';
          players.textContent = '0';
          version.textContent = 'Unknown';
        }
      })
      .catch(() => {
        status.textContent = 'Unavailable';
        status.className = 'server-bar-val';
        players.textContent = 'Unknown';
        version.textContent = 'Unknown';
      })
      .finally(() => clearTimeout(timeout));
  })();
</script>
</body>
</html>