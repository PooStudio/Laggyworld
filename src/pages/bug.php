<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bug Reports • Laggy World</title>
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
      <div class="page-hero-eyebrow">Report the Chaos</div>
      <h1 class="page-hero-title">BUG REPORTS</h1>
      <p class="page-hero-sub">Found a glitch? Perfect, we love those. Send your report to Discord and watch the chaos unfold.</p>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="content-width-sm">

        <div class="content-card">
          <h2>How to Report</h2>
          <p>Send reports to our Discord with enough detail for the team to reproduce the issue. We review reports and share updates when we can.</p>
          <p>Please avoid posting passwords, private account details, or other sensitive information.</p>
        </div>

        <div class="content-card">
          <h2>What to Include</h2>
          <ul>
            <li>Your Minecraft username</li>
            <li>What happened (the more chaotic the better)</li>
            <li>Where on the map it happened</li>
            <li>Screenshots or video if you have it</li>
          </ul>
        </div>

        <div class="content-card">
          <h2>Before You Report</h2>
          <ul>
            <li>Check Discord for maintenance or outage announcements</li>
            <li>Confirm whether the issue happens more than once</li>
            <li>Include the approximate time and your Minecraft version</li>
            <li>Share screenshots or video only if they contain no private information</li>
          </ul>
        </div>

        <div class="text-center mt-md">
          <a href="https://discord.gg/dzPXJgNTsV" target="_blank" rel="noopener" class="btn btn-primary button-gap">Report in Discord</a>
          <button onclick="copyIP()" class="btn btn-secondary">Copy Server IP</button>
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
    ['/about/', 'About'],
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
</script>

</body>
</html>