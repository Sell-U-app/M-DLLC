<?php
require __DIR__ . '/inc/mailer.php';

$sent = null;
$old  = ['nombre' => '', 'email' => '', 'telefono' => '', 'servicio' => '', 'direccion' => '', 'mensaje' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    [$sent, $old] = handle_form([
        'Nombre'            => 'nombre',
        'Email'             => 'email',
        'Teléfono'          => 'telefono',
        'Servicio'          => 'servicio',
        'Dirección de obra' => 'direccion',
        'Mensaje'           => 'mensaje',
    ], ['nombre', 'telefono', 'mensaje']);
}

$title  = 'Contacto — ' . $SITE['name'];
$desc   = 'Pide tu estimado gratis. Visitamos la obra, medimos y entregamos el presupuesto por partidas en 48 a 72 horas.';
$active = 'contacto';

$extra_css = '
.cgrid{display:grid;grid-template-columns:.85fr 1.15fr;gap:clamp(28px,4vw,52px);align-items:start}
.cline{display:flex;gap:12px;align-items:center;padding:14px 0;border-top:1px solid var(--border);text-decoration:none;color:var(--ink)}
.cline b{font-family:var(--font-head);font-size:15px;font-weight:600;overflow-wrap:anywhere}
.cline>span:last-child{min-width:0}
.cline .ic{width:38px;height:38px;flex:0 0 38px;border-radius:10px;background:color-mix(in srgb,var(--accent) 14%,transparent);color:var(--accent);display:flex;align-items:center;justify-content:center;font-size:17px}
@media(max-width:880px){.cgrid{grid-template-columns:1fr}}
';

require __DIR__ . '/inc/head.php';
?>
<section class="hero section">
  <div class="container cgrid">
    <div>
      <div class="chip">Contacto</div>
      <h1 style="margin:18px 0 0;max-width:14ch">Tu estimado, gratis y por escrito</h1>
      <p class="lead">Déjanos los datos de la obra y te llamamos el mismo día para agendar la visita.</p>

      <div style="margin-top:26px">
        <?php if (!empty($SITE['phone'])): ?>
          <a class="cline" href="tel:<?= htmlspecialchars($SITE['phone_tel']) ?>"><span class="ic">&#9742;</span><span><b><?= htmlspecialchars($SITE['phone']) ?></b><br><span class="muted" style="font-size:13px">Llámanos</span></span></a>
        <?php endif; ?>
        <?php if (!empty($SITE['whatsapp'])): ?>
          <a class="cline" href="https://wa.me/<?= htmlspecialchars($SITE['whatsapp']) ?>" target="_blank" rel="noopener"><span class="ic">&#128172;</span><span><b>WhatsApp</b><br><span class="muted" style="font-size:13px">Respuesta rápida</span></span></a>
        <?php endif; ?>
        <?php if (!empty($SITE['email'])): ?>
          <a class="cline" href="mailto:<?= htmlspecialchars($SITE['email']) ?>"><span class="ic">&#9993;</span><span><b><?= htmlspecialchars($SITE['email']) ?></b><br><span class="muted" style="font-size:13px">Escríbenos</span></span></a>
        <?php endif; ?>
        <?php if (!empty($SITE['address'])): ?>
          <div class="cline"><span class="ic">&#9873;</span><span><b><?= htmlspecialchars($SITE['address']) ?></b><br><span class="muted" style="font-size:13px"><?= htmlspecialchars($SITE['hours'] ?? '') ?></span></span></div>
        <?php endif; ?>
      </div>
    </div>

    <div class="panel">
      <?php if ($sent === true): ?>
        <div class="notice notice--ok">Recibimos tu solicitud. Te contactamos hoy mismo para agendar la visita.</div>
      <?php elseif ($sent === false): ?>
        <div class="notice notice--err">No pudimos enviar el mensaje. Llámanos al <?= htmlspecialchars($SITE['phone']) ?> o escribe a <?= htmlspecialchars($SITE['email']) ?>.</div>
      <?php elseif ($sent === null && $_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <div class="notice notice--err">Faltan datos: nombre, teléfono y descripción del trabajo son obligatorios.</div>
      <?php endif; ?>

      <h2 style="font-size:22px;margin:0 0 4px">Solicita tu estimado</h2>
      <p class="muted" style="font-size:14px">Gratis y sin compromiso.</p>

      <form method="post" action="contacto.php#form" id="form" style="margin-top:18px">
        <div class="hp"><label>No llenar<input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>

        <div class="field"><label for="nombre">Nombre *</label><input id="nombre" name="nombre" required value="<?= htmlspecialchars($old['nombre']) ?>"></div>

        <div class="grid grid-2" style="gap:0 16px">
          <div class="field"><label for="telefono">Teléfono *</label><input id="telefono" name="telefono" required value="<?= htmlspecialchars($old['telefono']) ?>"></div>
          <div class="field"><label for="email">Email</label><input id="email" type="email" name="email" value="<?= htmlspecialchars($old['email']) ?>"></div>
        </div>

        <div class="field">
          <label for="servicio">Tipo de trabajo</label>
          <select id="servicio" name="servicio">
            <option value="">Selecciona…</option>
            <?php foreach ($SERVICIOS as $s): ?>
              <option value="<?= htmlspecialchars($s[0]) ?>"<?= $old['servicio'] === $s[0] ? ' selected' : '' ?>><?= htmlspecialchars($s[0]) ?></option>
            <?php endforeach; ?>
            <option value="Otro"<?= $old['servicio'] === 'Otro' ? ' selected' : '' ?>>Otro</option>
          </select>
        </div>

        <div class="field"><label for="direccion">Dirección de la obra</label><input id="direccion" name="direccion" value="<?= htmlspecialchars($old['direccion']) ?>"></div>

        <div class="field"><label for="mensaje">Cuéntanos el trabajo *</label><textarea id="mensaje" name="mensaje" rows="5" required placeholder="Ej: remodelar cocina de 12x14, cambiar gabinetes y piso."><?= htmlspecialchars($old['mensaje']) ?></textarea></div>

        <button type="submit" class="btn btn--lg" style="width:100%;justify-content:center">Enviar solicitud</button>
        <p class="muted" style="font-size:12.5px;margin:14px 0 0;text-align:center">Respondemos en horario laboral. No compartimos tus datos.</p>
      </form>
    </div>
  </div>
</section>
<?php require __DIR__ . '/inc/footer.php'; ?>
