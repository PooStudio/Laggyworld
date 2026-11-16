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

  let connectionCheck = null;
  let retryTimer = null;

  function showOfflineScreen() {
    document.body.classList.add('offline-mode');
    if (retryTimer === null) {
      retryTimer = window.setTimeout(() => {
        retryTimer = null;
        checkConnection();
      }, 5000);
    }
  }

  function showOnlinePage() {
    document.body.classList.remove('offline-mode');
    if (retryTimer !== null) {
      window.clearTimeout(retryTimer);
      retryTimer = null;
    }
  }

  async function checkConnection() {
    if (connectionCheck !== null) connectionCheck.abort();

    const controller = new AbortController();
    connectionCheck = controller;
    const timeout = window.setTimeout(() => controller.abort(), 4000);

    try {
      const response = await fetch(`/site-status.js?connection-check=${Date.now()}`, {
        cache: 'no-store',
        signal: controller.signal
      });
      if (!response.ok) throw new Error('Site connection check failed');
      if (connectionCheck === controller) showOnlinePage();
    } catch {
      if (connectionCheck === controller) showOfflineScreen();
    } finally {
      window.clearTimeout(timeout);
      if (connectionCheck === controller) connectionCheck = null;
    }
  }

  window.addEventListener('offline', checkConnection);
  window.addEventListener('online', checkConnection);
  checkConnection();

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
