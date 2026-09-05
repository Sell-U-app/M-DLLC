<?php
require __DIR__ . '/inc/mailer.php';

$sent = null;
$old  = ['name' => '', 'email' => '', 'subject' => '', 'address' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    [$sent, $old] = handle_form([
        'Name'             => 'name',
        'Email'            => 'email',
        'Subject'          => 'subject',
        'Property address' => 'address',
        'Message'          => 'message',
    ], ['name', 'email', 'message']);
}

$title  = 'Contact — ' . $SITE['name'];
$desc   = 'Get in touch with M&D Buildings LLC. The form on this page is how we receive everything.';
$active = 'contact';

$extra_css = '
.cgrid{display:grid;grid-template-columns:.85fr 1.15fr;gap:clamp(28px,4vw,52px);align-items:start}
.aud{border-top:2px solid var(--accent);padding-top:18px;margin-top:22px}
@media(max-width:880px){.cgrid{grid-template-columns:1fr}}
';

require __DIR__ . '/inc/head.php';
?>
<section class="hero section">
  <div class="container cgrid">
    <div>
      <div class="chip">Contact</div>
      <h1 style="margin:18px 0 0;max-width:14ch">Let's talk</h1>
      <p class="lead">Whether you own a property, represent one, or work in the trades, we read everything that comes through.</p>
      <?php foreach ($AUDIENCES as $a): ?>
        <div class="aud">
          <h2 style="font-size:17px;margin:0 0 8px"><?= htmlspecialchars($a[0]) ?></h2>
          <p class="muted" style="font-size:14px;margin:0"><?= htmlspecialchars($a[1]) ?></p>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="panel">
      <?php if ($sent === true): ?>
        <div class="notice notice--ok">We have your message. We will come back to you by email.</div>
      <?php elseif ($sent === false): ?>
        <div class="notice notice--err">We could not send your message. Please try again in a moment.</div>
      <?php elseif ($sent === null && $_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <div class="notice notice--err">Missing details: name, a valid email and a message are required.</div>
      <?php endif; ?>

      <h2 style="font-size:22px;margin:0 0 4px">Send us a message</h2>
      <p class="muted" style="font-size:14px">This form is how we receive everything.</p>

      <form method="post" action="contact.php#form" id="form" style="margin-top:18px">
        <div class="hp"><label>Do not fill<input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>

        <div class="field"><label for="name">Name *</label><input id="name" name="name" required value="<?= htmlspecialchars($old['name']) ?>"></div>

        <div class="field"><label for="email">Email *</label><input id="email" type="email" name="email" required value="<?= htmlspecialchars($old['email']) ?>"></div>

        <div class="field">
          <label for="subject">Subject</label>
          <select id="subject" name="subject">
            <option value="">Select…</option>
            <?php foreach ($SUBJECTS as $s): ?>
              <option value="<?= htmlspecialchars($s[0]) ?>"<?= $old['subject'] === $s[0] ? ' selected' : '' ?>><?= htmlspecialchars($s[1]) ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="field" id="address-field"<?= $old['subject'] === 'property' ? '' : ' hidden' ?>>
          <label for="address">Property address</label>
          <input id="address" name="address" value="<?= htmlspecialchars($old['address']) ?>">
        </div>

        <div class="field"><label for="message">Message *</label><textarea id="message" name="message" rows="5" required placeholder="Tell us what this is about."><?= htmlspecialchars($old['message']) ?></textarea></div>

        <button class="btn btn--lg" type="submit" style="width:100%;justify-content:center">Send</button>
        <p class="muted" style="font-size:12.5px;margin:14px 0 0;text-align:center">See our <a href="privacy.php">Privacy Policy</a>.</p>
      </form>
    </div>
  </div>
</section>

<script>
/* The property address is only asked for when the subject is a property.
   Without JavaScript the field simply stays visible and remains optional. */
(function () {
  var sel = document.getElementById('subject');
  var box = document.getElementById('address-field');
  if (!sel || !box) return;
  function sync() { box.hidden = sel.value !== 'property'; }
  sel.addEventListener('change', sync);
  sync();
})();
</script>
<noscript><style>#address-field[hidden]{display:block}</style></noscript>
<?php require __DIR__ . '/inc/footer.php'; ?>
