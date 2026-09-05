<?php
require_once __DIR__ . '/inc/config.php';
$title  = 'Properties — ' . $SITE['name'];
$desc   = 'The properties M&D Buildings LLC owns in Pennsylvania, the work each one required, and the result.';
$active = 'properties';

$extra_css = '
.pj{background:var(--surface);border:1px solid var(--border);border-radius:16px;padding:clamp(22px,3vw,28px)}
.pj dl{margin:14px 0 0;display:grid;grid-template-columns:auto 1fr;gap:10px 16px;font-size:14.5px}
.pj dt{color:var(--muted)}
.pj dd{margin:0}
';

require __DIR__ . '/inc/head.php';
?>
<section class="hero section">
  <div class="container">
   <div style="max-width:52rem">
    <div class="chip">Portfolio</div>
    <h1 style="margin:18px 0 0">Properties</h1>
    <?php if (empty($PROPERTIES)): ?>
      <p class="lead">Our first acquisitions are underway. This page will show each property we own, the work it required, and the result.</p>
    <?php else: ?>
      <p class="lead">Each property we own, the work it required, and the result.</p>
    <?php endif; ?>
   </div>
  </div>
</section>

<?php if (!empty($PROPERTIES)): ?>
<section class="section--tight">
  <div class="container grid grid-3">
    <?php foreach ($PROPERTIES as $p): ?>
      <article class="pj">
        <h2 style="font-size:19px;margin:0"><?= htmlspecialchars($p['location']) ?></h2>
        <dl>
          <dt>Type</dt><dd><?= htmlspecialchars($p['type']) ?></dd>
          <dt>Scope</dt><dd><?= htmlspecialchars($p['scope']) ?></dd>
          <dt>Status</dt><dd><?= htmlspecialchars($p['status']) ?></dd>
        </dl>
      </article>
    <?php endforeach; ?>
  </div>
</section>
<?php endif; ?>

<section class="section">
  <div class="container panel center blueprint" style="padding:clamp(34px,5vw,56px)">
    <h2 style="margin-bottom:10px">Let's talk</h2>
    <p class="lead" style="margin:0 auto 24px">Whether you own a property, represent one, or work in the trades, we read everything that comes through.</p>
    <a href="contact.php" class="btn btn--lg">Get in touch</a>
  </div>
</section>
<?php require __DIR__ . '/inc/footer.php'; ?>
