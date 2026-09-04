<?php
require __DIR__ . '/inc/mailer.php';

$sent = null;
$old  = ['name' => '', 'email' => '', 'phone' => '', 'service' => '', 'address' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    [$sent, $old] = handle_form([
        'Name'        => 'name',
        'Email'       => 'email',
        'Phone'       => 'phone',
        'Service'     => 'service',
        'Job address' => 'address',
        'Message'     => 'message',
    ], ['name', 'phone', 'message']);
}

$title  = 'Contact — ' . $SITE['name'];
$desc   = 'Get your free estimate. We visit the site, take measurements and deliver a line-item budget in 48 to 72 hours.';
$active = 'contact';

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
      <div class="chip">Contact</div>
      <h1 style="margin:18px 0 0;max-width:14ch">Your estimate, free and in writing</h1>
      <p class="lead">Give us the details of the job and we will call you the same day to schedule the visit.</p>

      <div style="margin-top:26px">
        <?php if (!empty($SITE['phone'])): ?>
          <a class="cline" href="tel:<?= htmlspecialchars($SITE['phone_tel']) ?>"><span class="ic">&#9742;</span><span><b><?= htmlspecialchars($SITE['phone']) ?></b><br><span class="muted" style="font-size:13px">Call us</span></span></a>
        <?php endif; ?>
        <?php if (!empty($SITE['whatsapp'])): ?>
          <a class="cline" href="https://wa.me/<?= htmlspecialchars($SITE['whatsapp']) ?>" target="_blank" rel="noopener"><span class="ic">&#128172;</span><span><b>WhatsApp</b><br><span class="muted" style="font-size:13px">Fastest reply</span></span></a>
        <?php endif; ?>
        <?php if (!empty($SITE['email'])): ?>
          <a class="cline" href="mailto:<?= htmlspecialchars($SITE['email']) ?>"><span class="ic">&#9993;</span><span><b><?= htmlspecialchars($SITE['email']) ?></b><br><span class="muted" style="font-size:13px">Email us</span></span></a>
        <?php endif; ?>
        <?php if (!empty($SITE['address'])): ?>
          <div class="cline"><span class="ic">&#9873;</span><span><b><?= htmlspecialchars($SITE['address']) ?></b><br><span class="muted" style="font-size:13px"><?= htmlspecialchars($SITE['hours'] ?? '') ?></span></span></div>
        <?php endif; ?>
      </div>
    </div>

    <div class="panel">
      <?php if ($sent === true): ?>
        <div class="notice notice--ok">We got your request. We will reach out today to schedule the visit.</div>
      <?php elseif ($sent === false): ?>
        <div class="notice notice--err">We could not send your message. Call us at <?= htmlspecialchars($SITE['phone']) ?> or email <?= htmlspecialchars($SITE['email']) ?>.</div>
      <?php elseif ($sent === null && $_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <div class="notice notice--err">Missing details: name, phone and a description of the work are required.</div>
      <?php endif; ?>

      <h2 style="font-size:22px;margin:0 0 4px">Request your estimate</h2>
      <p class="muted" style="font-size:14px">Free and with no obligation.</p>

      <form method="post" action="contact.php#form" id="form" style="margin-top:18px">
        <div class="hp"><label>Do not fill<input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>

        <div class="field"><label for="name">Name *</label><input id="name" name="name" required value="<?= htmlspecialchars($old['name']) ?>"></div>

        <div class="grid grid-2" style="gap:0 16px">
          <div class="field"><label for="phone">Phone *</label><input id="phone" name="phone" required value="<?= htmlspecialchars($old['phone']) ?>"></div>
          <div class="field"><label for="email">Email</label><input id="email" type="email" name="email" value="<?= htmlspecialchars($old['email']) ?>"></div>
        </div>

        <div class="field">
          <label for="service">Type of work</label>
          <select id="service" name="service">
            <option value="">Select…</option>
            <?php foreach ($SERVICES as $s): ?>
              <option value="<?= htmlspecialchars($s[0]) ?>"<?= $old['service'] === $s[0] ? ' selected' : '' ?>><?= htmlspecialchars($s[0]) ?></option>
            <?php endforeach; ?>
            <option value="Other"<?= $old['service'] === 'Other' ? ' selected' : '' ?>>Other</option>
          </select>
        </div>

        <div class="field"><label for="address">Job address</label><input id="address" name="address" value="<?= htmlspecialchars($old['address']) ?>"></div>

        <div class="field"><label for="message">Tell us about the job *</label><textarea id="message" name="message" rows="5" required placeholder="E.g. remodel a 12x14 kitchen, replace cabinets and flooring."><?= htmlspecialchars($old['message']) ?></textarea></div>

        <button type="submit" class="btn btn--lg" style="width:100%;justify-content:center">Send request</button>
        <p class="muted" style="font-size:12.5px;margin:14px 0 0;text-align:center">We reply during business hours. See our <a href="privacy.php" style="color:var(--accent)">Privacy Policy</a>.</p>
      </form>
    </div>
  </div>
</section>
<?php require __DIR__ . '/inc/footer.php'; ?>
