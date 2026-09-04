<?php
require_once __DIR__ . '/inc/config.php';
$title  = 'Proyectos — ' . $SITE['name'];
$desc   = 'Obras entregadas por M&D Buildings LLC: remodelaciones, adiciones, obra nueva, concreto y exteriores.';
$active = 'proyectos';

$extra_css = '
.pj{background:var(--surface);border:1px solid var(--border);border-radius:16px;overflow:hidden;display:flex;flex-direction:column;transition:border-color .2s,transform .2s}
.pj:hover{border-color:var(--accent);transform:translateY(-3px)}
.pj .im{aspect-ratio:16/10;display:flex;align-items:flex-end;justify-content:space-between;padding:14px;gap:8px;border:0;border-bottom:1px solid var(--border)}
.pj .bd{padding:22px;flex:1;display:flex;flex-direction:column}
.badge{font-family:var(--font-head);font-weight:700;font-size:11px;letter-spacing:.08em;text-transform:uppercase;padding:5px 11px;border-radius:999px;background:var(--bg);border:1px solid var(--border);color:var(--muted)}
.badge.on{background:var(--accent);color:var(--primary-ink);border-color:var(--accent)}
';

require __DIR__ . '/inc/head.php';
?>
<section class="hero">
  <div class="container">
    <div class="chip">Proyectos</div>
    <h1 style="margin:18px 0 0;max-width:17ch">Obras entregadas, con nombre y alcance</h1>
    <p class="lead">Una muestra del trabajo. Si quieres ver una obra terminada en persona, coordinamos la visita con el cliente.</p>
  </div>
</section>

<section class="section--tight">
  <div class="container grid grid-3">
    <?php foreach ($PROYECTOS as $p): ?>
      <article class="pj">
        <div class="im blueprint">
          <span class="badge"><?= htmlspecialchars($p[1]) ?></span>
          <span class="badge<?= $p[3] === 'En obra' ? ' on' : '' ?>"><?= htmlspecialchars($p[3]) ?></span>
        </div>
        <div class="bd">
          <h3 style="font-size:19px;margin:0 0 8px"><?= htmlspecialchars($p[0]) ?></h3>
          <p class="muted" style="font-size:14.5px;margin:0 0 18px;flex:1"><?= htmlspecialchars($p[2]) ?></p>
          <div style="display:flex;justify-content:space-between;font-size:13px">
            <span class="muted">Avance</span>
            <span style="font-family:var(--font-head);font-weight:700;color:var(--accent)"><?= htmlspecialchars($p[4]) ?></span>
          </div>
          <div class="track"><div class="fill" style="width:<?= htmlspecialchars($p[4]) ?>"></div></div>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</section>

<section class="section--tight" style="border-top:1px solid var(--border);border-bottom:1px solid var(--border);background:var(--surface)">
  <div class="container grid grid-4">
    <?php foreach ($STATS as $s): ?>
      <div><div class="stat-n"><?= htmlspecialchars($s[0]) ?></div><div class="muted" style="font-size:13.5px;margin-top:6px"><?= htmlspecialchars($s[1]) ?></div></div>
    <?php endforeach; ?>
  </div>
</section>

<section class="section">
  <div class="container panel center blueprint" style="padding:clamp(34px,5vw,56px)">
    <h2 style="margin-bottom:10px">El siguiente proyecto puede ser el tuyo</h2>
    <p class="lead" style="margin:0 auto 24px">Estimado gratis, por partidas y con fecha de entrega por escrito.</p>
    <a href="contacto.php" class="btn btn--lg">Pedir estimado gratis</a>
  </div>
</section>
<?php require __DIR__ . '/inc/footer.php'; ?>
