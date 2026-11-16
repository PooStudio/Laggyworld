<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vote • Laggy World</title>
  <link rel="icon" type="image/png" href="/logo.png">
  <link rel="stylesheet" href="/style.css">
</head>
<body>

<div id="cursor"></div>
<div id="cursor-ring"></div>

<div class="noise" aria-hidden="true"></div>
<div id="progress-line"></div>

<?php require __DIR__ . '/../partials/site-header.php'; ?>

<main id="main-content" tabindex="-1">

  <section class="page-hero">
    <div class="page-hero-content">
      <div class="page-hero-eyebrow">Free Way to Support</div>
      <h1 class="page-hero-title">SUPPORT THE CHAOS</h1>
      <p class="page-hero-sub">Like playing here? A free vote helps other players find the server. No purchase is needed, and votes never buy gameplay advantages.</p>
    </div>
  </section>

  <section class="section">
    <div class="container">

      <div class="grid-4 vote-grid">
        <a href="https://www.planetminecraft.com/server/laggyworld/" target="_blank" rel="noopener" class="grid-cell vote-card">
          <span class="vote-emoji" aria-hidden="true"></span>
          <div class="vote-name">Planet Minecraft</div>
          <div class="vote-cta">Vote Now →</div>
        </a>
        <a href="https://minecraftservers.org/server/671544" target="_blank" rel="noopener" class="grid-cell vote-card">
          <span class="vote-emoji" aria-hidden="true"></span>
          <div class="vote-name">MinecraftServers.org</div>
          <div class="vote-cta">Vote Now →</div>
        </a>
        <a href="https://minecraft-mp.com/server/355696/vote/" target="_blank" rel="noopener" class="grid-cell vote-card">
          <span class="vote-emoji" aria-hidden="true"></span>
          <div class="vote-name">Minecraft-MP</div>
          <div class="vote-cta">Vote Now →</div>
        </a>
      </div>

    </div>
  </section>

  <section class="section">
    <div class="container text-center">
      <h2 class="section-title">Want to do <span>More?</span></h2>
      <p class="section-sub section-sub--centered-gap">Voting and joining the community are both free and optional. We do not sell ranks, kits, or gameplay advantages.</p>
      <div class="hero-actions">
        <a href="https://discord.gg/dzPXJgNTsV" target="_blank" rel="noopener" class="btn btn-primary">Join Discord</a>
        <a href="/rules/" class="btn btn-secondary">Read the Rules</a>
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
];
require __DIR__ . '/../partials/site-footer.php';
?>

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

  document.getElementById('menuToggle').addEventListener('click',()=>{
    const menu=document.getElementById('mobileMenu');
    const isOpen=menu.classList.toggle('open');
    document.getElementById('menuToggle').setAttribute('aria-expanded',String(isOpen));
  });
  window.addEventListener('scroll',()=>{
    const p=window.scrollY/(document.documentElement.scrollHeight-window.innerHeight)*100;
    document.getElementById('progress-line').style.width=p+'%';
    document.getElementById('nav').classList.toggle('scrolled',window.scrollY>40);
  });
</script>

</body>
</html>