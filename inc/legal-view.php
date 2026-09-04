<?php
/**
 * Shared renderer for the policy pages.
 * Each policy file sets $doc and requires this file. Content lives in inc/legal.php.
 */
require_once __DIR__ . '/legal.php';

$doc = $doc ?? 'privacy';
if (!isset($LEGAL[$doc])) {
    http_response_code(404);
    $doc = 'privacy';
}
$L = $LEGAL[$doc];

$title  = $L['title'] . ' — ' . $SITE['name'];
$desc   = $L['summary'];
$active = 'legal';

$extra_css = '
.lg{max-width:78ch;margin:0 auto}
.lg h2{font-size:clamp(19px,2.4vw,24px);margin:44px 0 12px;scroll-margin-top:110px}
.lg h2:first-of-type{margin-top:0}
.lg p{color:var(--muted);font-size:15.5px;line-height:1.75}
.lg ul{color:var(--muted);font-size:15.5px;line-height:1.75;padding-left:20px;margin:0 0 1em}
.lg li{margin-bottom:7px}
.lg a{color:var(--accent)}
.toc{background:var(--surface);border:1px solid var(--border);border-radius:var(--radius);padding:22px 26px;margin-bottom:44px}
.toc div{font-family:var(--font-head);font-weight:700;font-size:12px;letter-spacing:.1em;text-transform:uppercase;color:var(--accent);margin-bottom:12px}
.toc ol{margin:0;padding-left:20px;columns:2;column-gap:32px}
.toc li{margin-bottom:7px;font-size:14px}
.toc a{color:var(--ink);text-decoration:none}
.toc a:hover{color:var(--accent);text-decoration:underline}
.upd{font-size:13px;color:var(--muted);border-top:1px solid var(--border);margin-top:48px;padding-top:20px}
.lgnav{display:flex;flex-wrap:wrap;gap:10px;margin-top:26px}
.lgnav a{font-family:var(--font-head);font-weight:600;font-size:13px;text-decoration:none;color:var(--muted);border:1px solid var(--border);border-radius:999px;padding:8px 16px}
.lgnav a:hover{color:var(--ink);border-color:var(--accent)}
.lgnav a[aria-current=page]{background:var(--accent);color:var(--primary-ink);border-color:var(--accent)}
@media(max-width:700px){.toc ol{columns:1}}
';

require __DIR__ . '/head.php';

/** Anchor id from a heading */
$slug = function (string $s): string {
    $s = strtolower(strtr($s, ['á'=>'a','é'=>'e','í'=>'i','ó'=>'o','ú'=>'u','ñ'=>'n']));
    return trim(preg_replace('/-+/', '-', preg_replace('/[^a-z0-9]+/', '-', $s)), '-');
};
?>
<section class="hero">
  <div class="container">
    <div class="chip">Legal</div>
    <h1 style="margin:18px 0 0;max-width:20ch"><?= htmlspecialchars($L['title']) ?></h1>
    <p class="lead"><?= htmlspecialchars($L['summary']) ?></p>
    <nav class="lgnav" aria-label="Policies">
      <?php foreach ($LEGAL_NAV as $k => $item): ?>
        <a href="<?= htmlspecialchars($item['url']) ?>"<?= $k === $doc ? ' aria-current="page"' : '' ?>><?= htmlspecialchars($item['label']) ?></a>
      <?php endforeach; ?>
    </nav>
  </div>
</section>

<section class="section--tight">
  <div class="container">
    <div class="lg">
      <nav class="toc" aria-label="On this page">
        <div>On this page</div>
        <ol>
          <?php foreach ($L['sections'] as $s): ?>
            <li><a href="#<?= $slug($s[0]) ?>"><?= htmlspecialchars($s[0]) ?></a></li>
          <?php endforeach; ?>
        </ol>
      </nav>

      <?php foreach ($L['sections'] as $s): ?>
        <h2 id="<?= $slug($s[0]) ?>"><?= htmlspecialchars($s[0]) ?></h2>
        <?php foreach ($s[1] as $block): ?>
          <?php if (is_array($block)): ?>
            <ul><?php foreach ($block as $li): ?><li><?= htmlspecialchars($li) ?></li><?php endforeach; ?></ul>
          <?php else: ?>
            <p><?= htmlspecialchars($block) ?></p>
          <?php endif; ?>
        <?php endforeach; ?>
      <?php endforeach; ?>

      <p class="upd">Last updated: <?= htmlspecialchars($SITE['legal_updated']) ?>. This page describes our current practices and may be updated. <?= htmlspecialchars($SITE['legal_name']) ?>.</p>
    </div>
  </div>
</section>
<?php require __DIR__ . '/footer.php'; ?>
