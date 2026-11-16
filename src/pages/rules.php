<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rules • Laggy World</title>
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
      <div class="page-hero-eyebrow">Read Carefully</div>
      <h1 class="page-hero-title">SERVER RULES</h1>
      <p class="page-hero-sub">Keep the chaos alive by following these. Break them and face the consequences, simple as that.</p>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="grid-2">

        <div class="grid-cell rule-card">
          <div class="rule-num">01</div>
          <div class="rule-title">No Real Life Threats</div>
          <p class="rule-body">Keep everything in the game. No doxxing, no IRL threats ever.</p>
          <span class="rule-emoji" aria-hidden="true"></span>
        </div>

        <div class="grid-cell rule-card">
          <div class="rule-num">02</div>
          <div class="rule-title">No Illegal / NSFW Content</div>
          <p class="rule-body">Nothing illegal or extremely offensive in chat or Discord. Period.</p>
          <span class="rule-emoji" aria-hidden="true"></span>
        </div>

        <div class="grid-cell rule-card">
          <div class="rule-num">03</div>
          <div class="rule-title">No Hacks Allowed</div>
          <p class="rule-body">This is a hack free server. Modified clients that give unfair advantages = instant ban.</p>
          <span class="rule-emoji" aria-hidden="true"></span>
        </div>

        <div class="grid-cell rule-card">
          <div class="rule-num">04</div>
          <div class="rule-title">No Server Crashing</div>
          <p class="rule-body">No lag machines, crash exploits, or world breaking bugs. The lag is ours to control.</p>
          <span class="rule-emoji" aria-hidden="true"></span>
        </div>

        <div class="grid-cell rule-card">
          <div class="rule-num">05</div>
          <div class="rule-title">Respect Staff</div>
          <p class="rule-body">Follow staff directions and raise concerns respectfully through Discord. Harassment is not okay.</p>
          <span class="rule-emoji" aria-hidden="true"></span>
        </div>

        <div class="grid-cell rule-card">
          <div class="rule-num">06</div>
          <div class="rule-title">No Advertising</div>
          <p class="rule-body">Don't promote other servers or Discord communities here.</p>
          <span class="rule-emoji" aria-hidden="true"></span>
        </div>

        <div class="grid-cell rule-card">
          <div class="rule-num">07</div>
          <div class="rule-title">Griefing Is Allowed</div>
          <p class="rule-body">Raiding, stealing, and griefing are all part of the game. Protect yourself.</p>
          <span class="rule-emoji" aria-hidden="true"></span>
        </div>

        <div class="grid-cell rule-card">
          <div class="rule-num">08</div>
          <div class="rule-title">Use Common Sense</div>
          <p class="rule-body">Don't ruin the server for everyone. You know what you're doing.</p>
          <span class="rule-emoji" aria-hidden="true"></span>
        </div>

        <div class="grid-cell rule-card rule-card--full">
          <div class="rule-num">09</div>
          <div class="rule-title">Expect Lag</div>
          <p class="rule-body">Performance can vary. Report persistent connection or gameplay problems to staff so they can investigate.</p>
          <span class="rule-emoji" aria-hidden="true"></span>
        </div>

        <div class="grid-cell rule-card">
          <div class="rule-num">10</div>
          <div class="rule-title">No Pay-to-Win</div>
          <p class="rule-body">Paid purchases must never provide gameplay advantages. Progress is earned by playing.</p>
          <span class="rule-emoji" aria-hidden="true"></span>
        </div>

      </div>
    </div>
  </section>

  <section class="section">
    <div class="container text-center">
      <h2 class="section-title">Got <span>Questions?</span></h2>
      <p class="section-sub section-sub--centered-gap">Ask a staff member or hit us up in Discord for any clarifications.</p>
      <a href="https://discord.gg/dzPXJgNTsV" target="_blank" rel="noopener" class="btn btn-primary">Join Our Discord</a>
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