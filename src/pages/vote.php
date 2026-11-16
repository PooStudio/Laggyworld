<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vote • Laggy World</title>
  <link rel="icon" type="image/png" href="logo.png">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div id="cursor"></div>
<div id="cursor-ring"></div>

<div class="noise" aria-hidden="true"></div>
<div id="progress-line"></div>

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

<?php require __DIR__ . '/../partials/site-header.php'; ?>

<main>

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
        <a href="rules.html" class="btn btn-secondary">Read the Rules</a>
      </div>
    </div>
  </section>

</main>

<?php
$footerCopy = "\u{00A9} 2026 Laggy World \u{2022} All chaos reserved";
$footerLinks = [
    ['privacy.html', 'Privacy'],
    ['terms.html', 'Terms'],
    ['bug.html', 'Bug Reports'],
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

  document.getElementById('menuToggle').addEventListener('click',()=>document.getElementById('mobileMenu').classList.toggle('open'));
  window.addEventListener('scroll',()=>{
    const p=window.scrollY/(document.documentElement.scrollHeight-window.innerHeight)*100;
    document.getElementById('progress-line').style.width=p+'%';
    document.getElementById('nav').classList.toggle('scrolled',window.scrollY>40);
  });
  const FIRST_KEY='laggyworld.firstVisit';
  const CF_URL='https://www.cloudflare.com/cdn-cgi/trace';
  function updateLoaderProgress(p){const b=document.getElementById('loadingProgressBar');if(b)b.style.width=Math.min(100,Math.max(0,p))+'%';}
  function updateLoaderStatus(t){const s=document.getElementById('loadingStatus');if(s)s.textContent=t;}
  function hideLoading(){
    const o = document.getElementById('loadingOverlay'); if(!o) return; o.classList.remove('hidden'); o.style.display='flex';
  }
  function startLoading(){
    let p=0;
    const iv=setInterval(()=>{p=Math.min(98,p+Math.random()*10+6);updateLoaderProgress(p);},180);
    fetch(CF_URL,{mode:'no-cors',cache:'no-cache'}).catch(()=>{}).finally(()=>{clearInterval(iv);updateLoaderProgress(100);updateLoaderStatus('Done');setTimeout(hideLoading,420);});
  }
  document.addEventListener('DOMContentLoaded',()=>{
    const isFirst=!localStorage.getItem(FIRST_KEY);
    if(isFirst){startLoading();localStorage.setItem(FIRST_KEY,'1');}
    else{}
  });
</script>

</body>
</html>