<footer>
  <div class="container">
    <div class="footer-inner">
      <div>
        <span class="footer-logo">LAGGY WORLD</span>
        <p class="footer-copy"><?= htmlspecialchars($footerCopy, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></p>
      </div>
      <div class="footer-links">
        <?php foreach ($footerLinks as [$href, $label]): ?>
          <a href="<?= htmlspecialchars($href, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>"><?= htmlspecialchars($label, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</footer>
