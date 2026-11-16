(() => {
  const overlay = document.createElement('div');
  overlay.id = 'offlineOverlay';
  overlay.className = 'offline-overlay';
  overlay.setAttribute('role', 'alert');
  overlay.setAttribute('aria-live', 'assertive');
  overlay.setAttribute('aria-labelledby', 'offline-title');
  overlay.setAttribute('aria-describedby', 'offline-message');
  overlay.innerHTML = `
    <div class="offline-card">
      <div class="offline-crosshair" aria-hidden="true"><span class="dot"></span></div>
      <pre class="offline-art" aria-hidden="true">  ____   ______  ______ _       ______  ______
 / __ \\ |  ____|/ ____| |     |  ____||  ____|
| |  | || |__  | (___ | |     | |__   | |__
| |  | ||  __|  \\___ \\| |     |  __|  |  __|
| |__| || |____ ____) | |____ | |____ | |____
 \\____/ |______|_____/|______||______||______|</pre>
      <h1 class="offline-title" id="offline-title">OFFLINE</h1>
      <p class="offline-sub" id="offline-message">Your device appears to be offline. Check your connection; this page will return when you're back online.</p>
    </div>
  `;
  document.body.appendChild(overlay);

  const updateConnectionStatus = () => {
    document.body.classList.toggle('offline-mode', !navigator.onLine);
  };

  window.addEventListener('offline', updateConnectionStatus);
  window.addEventListener('online', updateConnectionStatus);
  updateConnectionStatus();

  const loadIndicator = document.createElement('div');
  loadIndicator.id = 'site-load-indicator';
  loadIndicator.setAttribute('aria-hidden', 'true');

  if (document.readyState !== 'complete') {
    loadIndicator.classList.add('is-loading');
    document.body.appendChild(loadIndicator);
    window.addEventListener('load', () => {
      loadIndicator.classList.remove('is-loading');
      window.setTimeout(() => loadIndicator.remove(), 250);
    }, { once: true });
  }
})();
