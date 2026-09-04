<?php
require_once __DIR__ . '/inc/config.php';
$title  = 'Servicios — ' . $SITE['name'];
$desc   = 'Construcción residencial, remodelación integral, adiciones, techos, concreto, drywall y pintura. Estimado gratis por partidas.';
$active = 'servicios';

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
    <div class="chip">Servicios</div>
    <h1 style="margin:18px 0 0;max-width:18ch">Todo lo que necesita la obra, con un solo responsable</h1>
    <p class="lead">Trabajamos con equipo propio y subcontratistas verificados. Un contrato, un cronograma y una sola persona que te responde el teléfono.</p>
    <div class="btn-row" style="margin-top:26px"><a href="contacto.php" class="btn btn--lg">Pedir estimado gratis</a></div>
  </div>
</section>

<section class="section--tight">
  <div class="container">
    <?php foreach ($SERVICIOS as $i => $s): ?>
      <div class="srow">
        <div class="im blueprint"><span class="chip"><?= htmlspecialchars($s[0]) ?></span></div>
        <div>
          <div style="font-family:var(--font-head);font-weight:800;font-size:13px;color:var(--accent);letter-spacing:.1em"><?= str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT) ?></div>
          <h2 style="font-size:clamp(22px,3vw,30px);margin:10px 0 8px"><?= htmlspecialchars($s[0]) ?></h2>
          <p class="muted" style="margin:0"><?= htmlspecialchars($s[1]) ?></p>
          <ul><?php foreach ($s[2] as $w): ?><li><?= htmlspecialchars($w) ?></li><?php endforeach; ?></ul>
          <div style="margin-top:22px"><a href="contacto.php" class="btn btn--ghost">Cotizar este servicio</a></div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<section class="section" style="background:var(--surface)">
  <div class="container">
    <div class="center" style="margin-bottom:38px"><div class="chip">Incluido siempre</div><h2 style="margin-top:16px">Lo que va dentro de cada contrato</h2></div>
    <div class="grid grid-4">
      <?php foreach ([
        ['Estimado por partidas', 'Sabes exactamente qué estás pagando, línea por línea.'],
        ['Permisos e inspecciones', 'Los tramitamos nosotros con la ciudad.'],
        ['Reporte semanal', 'Fotos, avance y lo que viene la próxima semana.'],
        ['Garantía escrita', '1 año en mano de obra, más la del fabricante.'],
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
    <h2 style="margin-bottom:10px">¿No ves lo que necesitas?</h2>
    <p class="lead" style="margin:0 auto 24px">Cuéntanos el trabajo y te decimos con franqueza si lo hacemos nosotros o te referimos con alguien de confianza.</p>
    <a href="contacto.php" class="btn btn--lg">Escribir a M&amp;D</a>
  </div>
</section>
<?php require __DIR__ . '/inc/footer.php'; ?>
