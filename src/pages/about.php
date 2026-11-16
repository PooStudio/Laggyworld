<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About • Laggy World</title>
  <link rel="icon" type="image/png" href="/logo.png">
  <link rel="stylesheet" href="/style.css">
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

<main id="main-content" tabindex="-1">

  <section class="page-hero">
    <div class="page-hero-bg"></div>
    <div class="page-hero-content">
      <div class="page-hero-eyebrow">Our Story</div>
      <h1 class="page-hero-title">A WORLD BUILT TO PLAY</h1>
      <p class="page-hero-sub">A community-first survival server where your time in the world matters more than what you spend.</p>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="content-width-md">
        <div class="content-card">
          <h2>How It Started</h2>
          <p>Laggy World grew from a simple idea: make a Minecraft community where the game is about playing, not paying for an edge.</p>
          <p>The name promises a little chaos, not a broken experience. Explore, build, compete, and make your own stories in a survival world shaped by its players.</p>
          <p>Joining is free. We do not sell paid ranks, kits, loot, or gameplay advantages. Your time and ingenuity matter more than your wallet.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container text-center">
      <div class="section-label">Support the chaos</div>
      <h2 class="section-title">Vote <span>Daily</span></h2>
      <p class="section-sub section-sub--centered-wide-gap">Every vote helps us grow and spread the mayhem. Free. Takes 10 seconds.</p>

      <div class="grid-4">
        <a href="https://www.planetminecraft.com/server/laggyworld/" target="_blank" rel="noopener" class="grid-cell vote-card">
          <span class="vote-emoji" aria-hidden="true"></span>
          <div class="vote-name">planetminecraft</div>
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
      <h2 class="section-title">Ready to <span>Jump In?</span></h2>
      <p class="section-sub section-sub--centered-gap">Copy the IP, open Minecraft, and prepare for a server that never plays fair.</p>
      <div class="hero-actions">
        <button onclick="copyIP()" class="btn btn-primary">Copy Server IP</button>
        <a href="https://discord.gg/dzPXJgNTsV" target="_blank" rel="noopener" class="btn btn-secondary">Open Discord</a>
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

  async function copyIP(){
    const address = 'mc.laggy.world';
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
    toast.textContent = 'Server address copied';
    toast.className = 'toast';
    document.body.appendChild(toast);
    setTimeout(() => toast.remove(), 2200);
  }
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