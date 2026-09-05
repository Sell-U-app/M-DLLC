<?php
require_once __DIR__ . '/inc/config.php';
$title  = 'M&D Buildings LLC — Residential real estate investment in Pennsylvania';
$desc   = 'M&D Buildings LLC acquires residential property in Pennsylvania, improves it, and returns it to the market. Every property we work on is one we own.';
$active = 'home';

$extra_css = '
.hero{position:relative;overflow:hidden}
.glow{position:absolute;top:-25%;right:-10%;width:680px;height:680px;background:radial-gradient(circle,rgba(240,162,27,.16),transparent 65%);pointer-events:none}
.roof{width:64px;height:22px;margin-bottom:18px;background:var(--accent);clip-path:polygon(0 100%,50% 0,100% 100%,100% 78%,50% 22%,0 78%)}
.svc{background:var(--surface);border:1px solid var(--border);border-radius:16px;padding:clamp(22px,3vw,28px);height:100%}
.svc .n{font-family:var(--font-head);font-weight:800;font-size:13px;color:var(--accent);letter-spacing:.1em}
.stdgrid{display:grid;grid-template-columns:1.1fr .9fr;gap:clamp(24px,4vw,48px);align-items:start}
.stdlist{list-style:none;padding:0;margin:0}
.stdlist li{padding:16px 0 16px 22px;position:relative;border-top:1px solid var(--border);font-size:15px}
.stdlist li:first-child{border-top:0}
.stdlist li::before{content:"";position:absolute;left:0;top:24px;width:10px;height:2px;background:var(--accent)}
.aud{border-top:2px solid var(--accent);padding-top:20px}
@media(max-width:900px){.stdgrid{grid-template-columns:1fr}}
';

require __DIR__ . '/inc/head.php';
?>
<section class="hero section">
  <div class="glow"></div>
  <div class="container" style="position:relative">
   <div style="max-width:52rem">
    <div class="roof"></div>
    <span class="chip">Pennsylvania</span>
    <h1 style="margin:18px 0 0">Residential real estate investment in Pennsylvania</h1>
    <p class="lead">We acquire homes, improve them, and return them to the market. Every property we work on is one we own, bought with our own capital.</p>
    <div class="btn-row" style="margin-top:28px">
      <a href="contact.php" class="btn btn--lg">Get in touch</a>
    </div>
   </div>
  </div>
</section>

<!-- Our approach -->
<section class="section" id="approach" style="border-top:1px solid var(--border)">
  <div class="container">
    <div class="chip">Our approach</div>
    <h2 style="margin:16px 0 8px">How we look at a property</h2>
    <p class="lead" style="margin-bottom:36px">We are not looking for volume. We are looking for the right houses in the right places, and we are willing to wait for them.</p>
    <div class="grid grid-3">
      <?php foreach ($APPROACH as $a): ?>
        <div class="svc">
          <div class="n"><?= htmlspecialchars($a[0]) ?></div>
          <h3 style="margin:10px 0 8px"><?= htmlspecialchars($a[1]) ?></h3>
          <p class="muted" style="font-size:14.5px;margin:0"><?= htmlspecialchars($a[2]) ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Our standard -->
<section class="section" id="standard" style="background:var(--surface)">
  <div class="container stdgrid">
    <div>
      <div class="chip">Our standard</div>
      <h2 style="margin:16px 0 14px">How the work gets done</h2>
      <p class="muted" style="margin:0;font-size:16px">Every renovation we undertake is carried out by licensed Pennsylvania contractors, working under permit and inspected at each stage. We hold the property, we set the scope, and we are accountable for the result.</p>
    </div>
    <ul class="stdlist">
      <?php foreach ($STANDARD as $s): ?>
        <li><?= htmlspecialchars($s) ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<!-- Portfolio -->
<section class="section" id="properties">
  <div class="container">
   <div style="max-width:52rem">
    <div class="chip">Portfolio</div>
    <h2 style="margin:16px 0 12px">Properties</h2>
    <?php if (empty($PROPERTIES)): ?>
      <p class="lead" style="margin:0">Our first acquisitions are underway. This page will show each property we own, the work it required, and the result.</p>
    <?php else: ?>
      <p class="lead" style="margin:0">Each property we own, the work it required, and the result.</p>
    <?php endif; ?>
    <div style="margin-top:28px"><a href="properties.php" class="btn btn--ghost">See properties</a></div>
   </div>
  </div>
</section>

<!-- Working with us -->
<section class="section" id="working" style="background:var(--surface)">
  <div class="container">
    <div class="chip">Working with us</div>
    <h2 style="margin:16px 0 36px">Who we work with</h2>
    <div class="grid grid-3">
      <?php foreach ($AUDIENCES as $a): ?>
        <div class="aud">
          <h3 style="font-size:19px;margin:0 0 10px"><?= htmlspecialchars($a[0]) ?></h3>
          <p class="muted" style="font-size:14.5px;margin:0"><?= htmlspecialchars($a[1]) ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- About -->
<section class="section" id="about">
  <div class="container">
   <div style="max-width:52rem">
    <div class="chip">About</div>
    <h2 style="margin:16px 0 14px">The company</h2>
    <p class="muted" style="font-size:16px;margin:0 0 14px">M&amp;D Buildings LLC is a Pennsylvania limited liability company. We acquire residential property with our own capital, improve it, and return it to the market.</p>
    <p class="muted" style="font-size:16px;margin:0">The company is part of a group dedicated to real estate investment and development in the United States.</p>
    <?php if (!empty($TEAM)): ?>
      <div class="grid grid-3" style="margin-top:36px">
        <?php foreach ($TEAM as $m): ?>
          <div class="aud">
            <h3 style="font-size:18px;margin:0 0 4px"><?= htmlspecialchars($m['name']) ?></h3>
            <p class="muted" style="font-size:14px;margin:0"><?= htmlspecialchars($m['role']) ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
   </div>
  </div>
</section>

<!-- Closing -->
<section class="section">
  <div class="container panel center blueprint" style="padding:clamp(34px,5vw,60px)">
    <h2 style="margin-bottom:10px">Let's talk</h2>
    <p class="lead" style="margin:0 auto 26px">Whether you own a property, represent one, or work in the trades, we read everything that comes through.</p>
    <div class="btn-row" style="justify-content:center">
      <a href="contact.php" class="btn btn--lg">Get in touch</a>
    </div>
  </div>
</section>
<?php require __DIR__ . '/inc/footer.php'; ?>
