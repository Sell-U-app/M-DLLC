<?php
require_once __DIR__ . '/inc/config.php';
$title  = 'Services — ' . $SITE['name'];
$desc   = 'Residential construction, full remodels, additions, roofing, concrete, drywall and paint. Free line-item estimate.';
$active = 'services';

$extra_css = '
.srow{display:grid;grid-template-columns:1fr 1.15fr;gap:clamp(24px,4vw,48px);align-items:center;padding:clamp(30px,5vw,54px) 0;border-top:1px solid var(--border)}
.srow:nth-child(even) .im{order:2}
.srow .im{aspect-ratio:4/3;border-radius:16px;display:flex;align-items:flex-end;padding:18px}
.srow ul{list-style:none;padding:0;margin:18px 0 0;display:grid;grid-template-columns:1fr 1fr;gap:8px 18px}
.srow li{padding:8px 0 8px 22px;position:relative;font-size:14.5px;color:var(--muted);border-top:1px solid var(--border)}
.srow li::before{content:"";position:absolute;left:0;top:16px;width:10px;height:2px;background:var(--accent)}
.zona{background:var(--surface);border:1px solid var(--border);border-radius:14px;padding:18px 20px}
@media(max-width:880px){.srow{grid-template-columns:1fr!important}.srow:nth-child(even) .im{order:0}.srow ul{grid-template-columns:1fr}}
';

require __DIR__ . '/inc/head.php';
?>
<section class="hero">
  <div class="container">
    <div class="chip">Services</div>
    <h1 style="margin:18px 0 0;max-width:18ch">Everything the job needs, under one responsible party</h1>
    <p class="lead">We work with our own crew and vetted subcontractors. One contract, one schedule, and one person who answers the phone.</p>
    <div class="btn-row" style="margin-top:26px"><a href="contact.php" class="btn btn--lg">Get a free estimate</a></div>
  </div>
</section>

<section class="section--tight">
  <div class="container">
    <?php foreach ($SERVICES as $i => $s): ?>
      <div class="srow">
        <div class="im blueprint"><span class="chip"><?= htmlspecialchars($s[0]) ?></span></div>
        <div>
          <div style="font-family:var(--font-head);font-weight:800;font-size:13px;color:var(--accent);letter-spacing:.1em"><?= str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT) ?></div>
          <h2 style="font-size:clamp(22px,3vw,30px);margin:10px 0 8px"><?= htmlspecialchars($s[0]) ?></h2>
          <p class="muted" style="margin:0"><?= htmlspecialchars($s[1]) ?></p>
          <ul><?php foreach ($s[2] as $w): ?><li><?= htmlspecialchars($w) ?></li><?php endforeach; ?></ul>
          <div style="margin-top:22px"><a href="contact.php" class="btn btn--ghost">Quote this service</a></div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<section class="section" style="background:var(--surface)">
  <div class="container">
    <div class="center" style="margin-bottom:38px"><div class="chip">Always included</div><h2 style="margin-top:16px">What every contract comes with</h2></div>
    <div class="grid grid-4">
      <?php foreach ([
        ['Line-item estimate', 'You know exactly what you are paying for, line by line.'],
        ['Permits and inspections', 'We pull them with the city, not you.'],
        ['Weekly report', 'Photos, progress and what comes next week.'],
        ['Written warranty', '1 year on workmanship, plus the manufacturer warranty.'],
      ] as $b): ?>
        <div class="zona">
          <h3 style="font-size:17px;margin:0 0 6px"><?= htmlspecialchars($b[0]) ?></h3>
          <p class="muted" style="font-size:14px;margin:0"><?= htmlspecialchars($b[1]) ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="container panel center blueprint" style="padding:clamp(34px,5vw,56px)">
    <h2 style="margin-bottom:10px">Do not see what you need?</h2>
    <p class="lead" style="margin:0 auto 24px">Tell us about the job and we will say plainly whether we do it ourselves or refer you to someone we trust.</p>
    <a href="contact.php" class="btn btn--lg">Write to M&amp;D</a>
  </div>
</section>
<?php require __DIR__ . '/inc/footer.php'; ?>
