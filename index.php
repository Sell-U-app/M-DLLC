<?php
require_once __DIR__ . '/inc/config.php';
$title  = 'M&D Buildings LLC — Construction and remodeling with visible progress';
$desc   = 'Residential construction, remodels, roofing and concrete. Free line-item estimate, permits included and a weekly progress report with photos.';
$active = 'home';

$extra_css = '
.hero{position:relative;overflow:hidden}
.glow{position:absolute;top:-25%;right:-10%;width:680px;height:680px;background:radial-gradient(circle,rgba(240,162,27,.16),transparent 65%);pointer-events:none}
.hero-grid{display:grid;grid-template-columns:1.05fr .95fr;gap:clamp(28px,5vw,56px);align-items:center;position:relative}
.roof{width:64px;height:22px;margin-bottom:18px;background:var(--accent);clip-path:polygon(0 100%,50% 0,100% 100%,100% 78%,50% 22%,0 78%)}
.trust{display:flex;flex-wrap:wrap;gap:10px 22px;margin-top:26px;font-size:14px;color:var(--muted)}
.trust b{color:var(--ink);font-weight:600}
/* Trades ticker */
.marq{overflow:hidden;border-top:1px solid var(--border);border-bottom:1px solid var(--border);padding:15px 0;background:var(--surface)}
.marq div{display:inline-flex;white-space:nowrap;animation:sc 30s linear infinite}
.marq span{font-family:var(--font-head);font-weight:700;font-size:16px;letter-spacing:.05em;text-transform:uppercase;color:var(--muted);padding:0 26px}
.marq span::after{content:"◆";color:var(--accent);margin-left:26px;font-size:9px;vertical-align:middle}
@keyframes sc{to{transform:translateX(-50%)}}
@media(prefers-reduced-motion:reduce){.marq div{animation:none}}
/* Tabs */
.tabs input{position:absolute;opacity:0;pointer-events:none}
.tablist{display:flex;flex-wrap:wrap;gap:10px;margin-bottom:22px}
.tablist label{padding:10px 20px;border:1px solid var(--border);border-radius:999px;font-family:var(--font-head);font-weight:600;font-size:14px;cursor:pointer;color:var(--muted);transition:.15s}
#tf1:checked~.tablist label[for=tf1],#tf2:checked~.tablist label[for=tf2],#tf3:checked~.tablist label[for=tf3],#tf4:checked~.tablist label[for=tf4]{background:var(--accent);color:var(--primary-ink);border-color:var(--accent)}
.tp{display:none;grid-template-columns:1fr 1fr;gap:clamp(24px,4vw,40px);align-items:center;background:var(--surface);border:1px solid var(--border);border-radius:18px;padding:clamp(24px,4vw,42px)}
#tf1:checked~.tp1,#tf2:checked~.tp2,#tf3:checked~.tp3,#tf4:checked~.tp4{display:grid}
.tp .viz{aspect-ratio:16/10;border-radius:12px;display:flex;align-items:flex-end;padding:16px}
/* Services */
.svc{background:var(--surface);border:1px solid var(--border);border-radius:16px;padding:clamp(22px,3vw,28px);transition:border-color .2s,transform .2s}
.svc:hover{border-color:var(--accent);transform:translateY(-3px)}
.svc .n{font-family:var(--font-head);font-weight:800;font-size:13px;color:var(--accent);letter-spacing:.1em}
.svc ul{list-style:none;padding:0;margin:14px 0 0;font-size:14px;color:var(--muted)}
.svc li{padding:6px 0 6px 20px;position:relative}
.svc li::before{content:"";position:absolute;left:0;top:14px;width:8px;height:2px;background:var(--accent)}
/* Process */
.step{display:grid;grid-template-columns:auto 1fr;gap:20px;padding:22px 0;border-top:1px solid var(--border);align-items:start}
.step .num{font-family:var(--font-head);font-weight:800;font-size:clamp(28px,4vw,40px);color:var(--accent);line-height:1;opacity:.85;min-width:2.2ch}
/* Cases */
.case{display:grid;grid-template-columns:1fr 1.25fr;gap:24px;padding:26px 0;border-top:1px solid var(--border);align-items:center}
.case .im{aspect-ratio:16/10;border-radius:12px}
/* Project types */
.plan{background:var(--surface);border:1px solid var(--border);border-radius:18px;padding:clamp(24px,3vw,30px);position:relative}
.plan.best{border-color:var(--accent);box-shadow:0 0 0 2px var(--accent)}
.plan .tag{position:absolute;top:-13px;left:50%;transform:translateX(-50%);background:var(--accent);color:var(--primary-ink);font-family:var(--font-head);font-weight:700;font-size:12px;padding:5px 14px;border-radius:999px;white-space:nowrap}
.plan ul{list-style:none;padding:0;margin:16px 0 22px}
.plan li{padding:9px 0;border-top:1px solid var(--border);font-size:14px}
.plan li::before{content:"✓ ";color:var(--accent);font-weight:700}
/* Testimonials */
.tst{background:var(--surface);border:1px solid var(--border);border-radius:16px;padding:26px}
.tst .q{font-size:15px;margin:0 0 16px}
.tst .who{font-family:var(--font-head);font-weight:700;font-size:14px}
.stars{color:var(--accent);letter-spacing:3px;margin-bottom:12px;font-size:14px}
@media(max-width:900px){.hero-grid,.tp,.case{grid-template-columns:1fr!important}}
';

require __DIR__ . '/inc/head.php';
?>
<section class="hero section">
  <div class="glow"></div>
  <div class="container hero-grid">
    <div>
      <div class="roof"></div>
      <span class="chip"><span class="dot"></span> Free estimate in 48 hours</span>
      <h1 style="margin-top:18px;max-width:16ch"><?= htmlspecialchars($SITE['tagline']) ?></h1>
      <p class="lead">Residential construction, remodels, roofing and concrete. A line-item budget, permits handled by us, and a weekly report with photos of the actual progress.</p>
      <div class="btn-row" style="margin-top:28px">
        <a href="contact.php" class="btn btn--lg">Get a free estimate</a>
        <a href="#process" class="btn btn--ghost btn--lg">How we work</a>
      </div>
      <div class="trust">
        <span><b>✓</b> <?= htmlspecialchars($SITE['license']) ?></span>
        <span><b>✓</b> 1-year written warranty</span>
        <span><b>✓</b> Our own crew on site</span>
      </div>
    </div>

    <div class="panel">
      <div style="display:flex;justify-content:space-between;align-items:center;gap:12px;margin-bottom:18px">
        <span style="font-family:var(--font-head);font-weight:700">Job · North House</span>
        <span class="chip"><span class="dot"></span> On schedule</span>
      </div>
      <?php foreach ([['Foundation','100%'],['Framing','88%'],['Roofing','62%'],['Finishes','24%']] as $r): ?>
        <div style="margin-bottom:14px">
          <div style="display:flex;justify-content:space-between;font-size:13px">
            <span class="muted"><?= $r[0] ?></span>
            <span style="font-family:var(--font-head);font-weight:700;color:var(--accent)"><?= $r[1] ?></span>
          </div>
          <div class="track"><div class="fill" style="width:<?= $r[1] ?>"></div></div>
        </div>
      <?php endforeach; ?>
      <div class="muted" style="display:flex;flex-wrap:wrap;gap:8px 18px;margin-top:18px;padding-top:16px;border-top:1px solid var(--border);font-size:12.5px">
        <span><span class="dot"></span> On budget</span>
        <span><span class="dot"></span> Inspection passed</span>
      </div>
    </div>
  </div>
</section>

<div class="marq"><div><?php for ($k = 0; $k < 2; $k++) foreach ($TICKER as $t): ?><span><?= htmlspecialchars($t) ?></span><?php endforeach; ?></div></div>

<!-- Services -->
<section class="section" id="services">
  <div class="container">
    <div class="chip">What we do</div>
    <h2 style="margin:16px 0 8px">One contractor for the whole job</h2>
    <p class="lead" style="margin-bottom:36px">From the permit to the last coat of paint, with one responsible party and one contract.</p>
    <div class="grid grid-3">
      <?php foreach ($SERVICES as $i => $s): ?>
        <div class="svc">
          <div class="n"><?= str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT) ?></div>
          <h3 style="margin:10px 0 8px"><?= htmlspecialchars($s[0]) ?></h3>
          <p class="muted" style="font-size:14.5px;margin:0"><?= htmlspecialchars($s[1]) ?></p>
          <ul><?php foreach ($s[2] as $w): ?><li><?= htmlspecialchars($w) ?></li><?php endforeach; ?></ul>
        </div>
      <?php endforeach; ?>
    </div>
    <div style="margin-top:32px"><a href="services.php" class="btn btn--ghost">See services in detail</a></div>
  </div>
</section>

<!-- Tabs: how we work -->
<section class="section" id="process" style="background:linear-gradient(180deg,transparent,rgba(19,39,61,.5),transparent)">
  <div class="container">
    <div class="chip">How we work</div>
    <h2 style="margin:16px 0 26px">No surprises on the price or the date</h2>
    <div class="tabs">
      <input type="radio" name="tf" id="tf1" checked><input type="radio" name="tf" id="tf2"><input type="radio" name="tf" id="tf3"><input type="radio" name="tf" id="tf4">
      <div class="tablist"><?php foreach ($TABS as $i => $t): ?><label for="tf<?= $i + 1 ?>"><?= htmlspecialchars($t[0]) ?></label><?php endforeach; ?></div>
      <?php foreach ($TABS as $i => $t): ?>
        <div class="tp tp<?= $i + 1 ?>">
          <div>
            <h3><?= htmlspecialchars($t[0]) ?></h3>
            <p class="muted" style="margin:0"><?= htmlspecialchars($t[1]) ?></p>
            <div style="margin-top:22px"><a href="contact.php" class="btn">Start with the estimate</a></div>
          </div>
          <div class="viz blueprint"><span class="chip"><?= htmlspecialchars($t[0]) ?></span></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Figures -->
<section class="section--tight" style="border-top:1px solid var(--border);border-bottom:1px solid var(--border);background:var(--surface)">
  <div class="container grid grid-4">
    <?php foreach ($STATS as $s): ?>
      <div><div class="stat-n"><?= htmlspecialchars($s[0]) ?></div><div class="muted" style="font-size:13.5px;margin-top:6px"><?= htmlspecialchars($s[1]) ?></div></div>
    <?php endforeach; ?>
  </div>
</section>

<!-- Process -->
<section class="section">
  <div class="container" style="max-width:900px">
    <div class="chip">Step by step</div>
    <h2 style="margin:16px 0 10px">From the first call to the handover</h2>
    <?php foreach ($PROCESS as $p): ?>
      <div class="step">
        <div class="num"><?= htmlspecialchars($p[0]) ?></div>
        <div>
          <h3 style="font-size:19px;margin:0 0 6px"><?= htmlspecialchars($p[1]) ?></h3>
          <p class="muted" style="margin:0;font-size:15px"><?= htmlspecialchars($p[2]) ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- Featured projects -->
<section class="section" id="projects">
  <div class="container">
    <div class="chip">Projects</div>
    <h2 style="margin:16px 0 6px">Work delivered, not renderings</h2>
    <?php foreach (array_slice($PROJECTS, 0, 3) as $c): ?>
      <div class="case">
        <div class="im blueprint"></div>
        <div>
          <span class="chip"><?= htmlspecialchars($c[1]) ?></span>
          <h3 style="font-size:21px;margin:12px 0 6px"><?= htmlspecialchars($c[0]) ?></h3>
          <p class="muted" style="margin:0"><?= htmlspecialchars($c[2]) ?></p>
        </div>
      </div>
    <?php endforeach; ?>
    <div style="margin-top:32px"><a href="projects.php" class="btn btn--ghost">See all projects</a></div>
  </div>
</section>

<!-- Project types -->
<section class="section" style="background:var(--surface)">
  <div class="container">
    <div class="center" style="margin-bottom:44px">
      <div class="chip">Project types</div>
      <h2 style="margin-top:16px">From a single repair to the whole house</h2>
      <p class="lead">Every estimate is free and comes with no obligation.</p>
    </div>
    <div class="grid grid-3" style="align-items:start">
      <?php foreach ($TYPES as $p): ?>
        <div class="plan<?= $p[3] ? ' best' : '' ?>">
          <?php if ($p[3]): ?><span class="tag">Most requested</span><?php endif; ?>
          <h3 style="font-size:22px;margin:0"><?= htmlspecialchars($p[0]) ?></h3>
          <p class="muted" style="font-size:13.5px;margin:4px 0 0"><?= htmlspecialchars($p[1]) ?></p>
          <div style="font-family:var(--font-head);font-weight:800;font-size:22px;color:var(--accent);margin:14px 0"><?= htmlspecialchars($p[4]) ?></div>
          <ul><?php foreach ($p[2] as $f): ?><li><?= htmlspecialchars($f) ?></li><?php endforeach; ?></ul>
          <a href="contact.php" class="btn<?= $p[3] ? '' : ' btn--ghost' ?>" style="width:100%;justify-content:center">Request</a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Testimonials -->
<section class="section">
  <div class="container">
    <div class="center" style="margin-bottom:36px"><div class="chip">Clients</div><h2 style="margin-top:16px">What people say about the work</h2></div>
    <div class="grid grid-3">
      <?php foreach ($TESTIMONIALS as $t): ?>
        <div class="tst">
          <div class="stars">★★★★★</div>
          <p class="q">“<?= htmlspecialchars($t[0]) ?>”</p>
          <div class="who"><?= htmlspecialchars($t[1]) ?></div>
          <div class="muted" style="font-size:13px"><?= htmlspecialchars($t[2]) ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="section" style="background:var(--surface)">
  <div class="container" style="max-width:800px">
    <div class="center" style="margin-bottom:32px"><div class="chip">Questions</div><h2 style="margin-top:16px">Frequently asked</h2></div>
    <?php foreach ($FAQ as $f): ?>
      <details class="faq"><summary><?= htmlspecialchars($f[0]) ?></summary><p class="muted" style="padding-bottom:18px;margin:0"><?= htmlspecialchars($f[1]) ?></p></details>
    <?php endforeach; ?>
  </div>
</section>

<!-- CTA -->
<section class="section">
  <div class="container panel center blueprint" style="padding:clamp(34px,5vw,60px)">
    <h2 style="margin-bottom:10px">Ready for your estimate?</h2>
    <p class="lead" style="margin:0 auto 26px">We visit the site, take measurements and hand you a line-item budget within 48 to 72 hours. Free.</p>
    <div class="btn-row" style="justify-content:center">
      <a href="contact.php" class="btn btn--lg">Get a free estimate</a>
      <?php if (!empty($SITE['phone'])): ?><a href="tel:<?= htmlspecialchars($SITE['phone_tel']) ?>" class="btn btn--ghost btn--lg">Call <?= htmlspecialchars($SITE['phone']) ?></a><?php endif; ?>
    </div>
  </div>
</section>
<?php require __DIR__ . '/inc/footer.php'; ?>
