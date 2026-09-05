<?php
/**
 * Cabecera compartida + mini design-system (theme por variables CSS).
 * Todo el color/tipografía sale de $THEME en inc/config.php.
 *
 * Cada página define ANTES de incluir este archivo (todas opcionales):
 *   $title     título de pestaña / SEO
 *   $desc      meta description
 *   $active    clave de nav activa (debe coincidir con una clave de $NAV)
 *   $og_img    nombre de imagen en uploads/ para redes (opcional)
 *   $extra_css CSS extra dentro del <style>
 */
require_once __DIR__ . '/config.php';

$title     = $title     ?? $SITE['name'];
$desc      = $desc      ?? ($SITE['tagline'] ?? $SITE['name']);
$active    = $active    ?? '';
$extra_css = $extra_css ?? '';

$base_url  = rtrim($SITE['base_url'] ?? '', '/');
$self      = basename($_SERVER['SCRIPT_NAME'] ?? 'index.php');
$canonical = $base_url . '/' . ($self === 'index.php' ? '' : $self);
$og_image  = $base_url . '/uploads/' . ($og_img ?? ($SITE['og_default'] ?? 'og.jpg'));

/* Datos estructurados básicos (Organization) */
$ld = [
    '@context' => 'https://schema.org',
    '@type'    => 'Organization',
    'name'     => $SITE['name'],
    'url'      => $base_url . '/',
    'email'    => $SITE['email'] ?? '',
];
if (!empty($SITE['phone_tel'])) {
    $ld['telephone'] = $SITE['phone_tel'];
}
if (!empty($SITE['address'])) {
    $ld['address'] = ['@type' => 'PostalAddress', 'streetAddress' => $SITE['address']];
}

/* Fuente Google (heading + body) */
$font_q = $THEME['google_fonts'] ?? 'family=Poppins:wght@500;600;700;800&family=Inter:wght@400;500;600;700';
?><!DOCTYPE html>
<html lang="<?= htmlspecialchars($SITE['lang'] ?? 'es') ?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= htmlspecialchars($title) ?></title>
<meta name="description" content="<?= htmlspecialchars($desc) ?>">
<link rel="canonical" href="<?= htmlspecialchars($canonical) ?>">
<meta name="robots" content="index,follow">
<meta name="theme-color" content="<?= htmlspecialchars($THEME['primary']) ?>">
<meta property="og:type" content="website">
<meta property="og:site_name" content="<?= htmlspecialchars($SITE['name']) ?>">
<meta property="og:title" content="<?= htmlspecialchars($title) ?>">
<meta property="og:description" content="<?= htmlspecialchars($desc) ?>">
<meta property="og:url" content="<?= htmlspecialchars($canonical) ?>">
<meta property="og:image" content="<?= htmlspecialchars($og_image) ?>">
<meta name="twitter:card" content="summary_large_image">
<script type="application/ld+json"><?= json_encode($ld, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>
<link rel="icon" type="image/png" href="uploads/favicon.png">
<link rel="apple-touch-icon" href="uploads/favicon.png">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?<?= htmlspecialchars($font_q) ?>&display=swap" rel="stylesheet">
<style>
:root{
  --bg:<?= $THEME['bg'] ?>;
  --surface:<?= $THEME['surface'] ?>;
  --ink:<?= $THEME['ink'] ?>;
  --muted:<?= $THEME['muted'] ?>;
  --primary:<?= $THEME['primary'] ?>;
  --primary-ink:<?= $THEME['primary_ink'] ?>;
  --accent:<?= $THEME['accent'] ?>;
  --border:<?= $THEME['border'] ?>;
  --radius:<?= $THEME['radius'] ?? '14px' ?>;
  --maxw:<?= $THEME['maxw'] ?? '1160px' ?>;
  --font-head:<?= $THEME['font_head'] ?? "'Poppins',sans-serif" ?>;
  --font-body:<?= $THEME['font_body'] ?? "'Inter',sans-serif" ?>;
}
*{box-sizing:border-box}
html{scroll-behavior:smooth}
body{margin:0;background:var(--bg);color:var(--ink);font-family:var(--font-body);line-height:1.6;-webkit-font-smoothing:antialiased;overflow-x:hidden}
h1,h2,h3,h4{font-family:var(--font-head);line-height:1.15;margin:0 0 .5em;font-weight:700}
h1{font-size:clamp(30px,5.2vw,52px)}
h2{font-size:clamp(24px,3.6vw,38px)}
h3{font-size:clamp(18px,2.4vw,22px)}
p{margin:0 0 1em}
img{max-width:100%;display:block}
a{color:var(--primary)}
.container{max-width:var(--maxw);margin:0 auto;padding:0 clamp(18px,4vw,40px)}
.section{padding:clamp(56px,8vw,96px) 0}
.section--tight{padding:clamp(40px,6vw,64px) 0}
.eyebrow{font-family:var(--font-head);font-weight:600;letter-spacing:.14em;text-transform:uppercase;font-size:13px;color:var(--primary);margin-bottom:14px}
.lead{font-size:clamp(16px,2vw,19px);color:var(--muted);max-width:56ch}
.muted{color:var(--muted)}
.center{text-align:center}
.center .lead{margin-left:auto;margin-right:auto}
.grid{display:grid;gap:clamp(20px,3vw,28px)}
.grid-2{grid-template-columns:repeat(2,1fr)}
.grid-3{grid-template-columns:repeat(3,1fr)}
.grid-4{grid-template-columns:repeat(4,1fr)}
.card{background:var(--surface);border:1px solid var(--border);border-radius:var(--radius);padding:clamp(22px,3vw,30px)}
.card h3{margin-top:0}
.icon-badge{width:52px;height:52px;border-radius:12px;display:flex;align-items:center;justify-content:center;background:color-mix(in srgb,var(--primary) 14%,transparent);color:var(--primary);margin-bottom:16px}
.btn{display:inline-flex;align-items:center;gap:8px;font-family:var(--font-head);font-weight:600;font-size:15px;text-decoration:none;padding:13px 26px;border-radius:999px;border:2px solid var(--primary);background:var(--primary);color:var(--primary-ink);cursor:pointer;transition:transform .15s ease,filter .15s ease}
.btn:hover{filter:brightness(1.06);transform:translateY(-1px)}
.btn--outline{background:transparent;color:var(--primary)}
.btn--ghost{background:transparent;border-color:var(--border);color:var(--ink)}
.btn--lg{padding:16px 32px;font-size:16px}
.btn-row{display:flex;flex-wrap:wrap;gap:14px}
.hero{padding:clamp(56px,9vw,110px) 0 clamp(48px,7vw,84px)}
.pill{display:inline-block;font-size:13px;font-weight:600;padding:6px 14px;border-radius:999px;background:color-mix(in srgb,var(--primary) 12%,transparent);color:var(--primary);margin-bottom:20px;font-family:var(--font-head)}
.field{display:block;margin-bottom:16px}
.field label{display:block;font-weight:600;font-size:14px;margin-bottom:6px;font-family:var(--font-head)}
.field input,.field select,.field textarea{width:100%;padding:13px 15px;border:1px solid var(--border);border-radius:12px;background:var(--surface);color:var(--ink);font-family:var(--font-body);font-size:15px}
.field input:focus,.field select:focus,.field textarea:focus{outline:2px solid var(--primary);outline-offset:1px;border-color:transparent}
.notice{padding:14px 18px;border-radius:12px;font-weight:600;margin-bottom:22px}
.notice--ok{background:rgba(34,197,94,.12);color:#7ee2a8;border:1px solid rgba(34,197,94,.35)}
.notice--err{background:rgba(239,68,68,.12);color:#ff9c93;border:1px solid rgba(239,68,68,.35)}
.hp{position:absolute;left:-9999px;width:1px;height:1px;overflow:hidden}
/* Header / nav */
.site-header{position:sticky;top:0;z-index:50;background:color-mix(in srgb,var(--bg) 88%,transparent);backdrop-filter:blur(10px);border-bottom:1px solid var(--border)}
.nav{display:flex;align-items:center;justify-content:space-between;gap:24px;padding:14px 0}
.brand{display:flex;align-items:center;gap:10px;text-decoration:none;color:var(--ink);font-family:var(--font-head);font-weight:800;font-size:20px;letter-spacing:-.01em}
.brand img{height:34px;width:auto}
@media(min-width:861px){.brand img{height:40px}}
.brand{gap:0}
.nav-links{display:flex;align-items:center;gap:clamp(14px,2.4vw,30px)}
.nav-links a{color:var(--ink);text-decoration:none;font-weight:500;font-size:15px;font-family:var(--font-head)}
.nav-links a:not(.btn):hover,.nav-links a[aria-current=page]:not(.btn){color:var(--primary)}
.nav-links a.btn{color:var(--primary-ink)}
.nav-links a.btn--outline{color:var(--primary)}
.nav-links a.btn--ghost{color:var(--ink)}
.nav-toggle{position:absolute;opacity:0;pointer-events:none}
.nav-burger{display:none;align-items:center;justify-content:center;width:46px;height:46px;margin:-6px 0;cursor:pointer;color:var(--ink);-webkit-tap-highlight-color:transparent}
.nav-burger .ic-close{display:none}
@media(max-width:860px){
  .nav-burger{display:inline-flex}
  .nav-links{display:none;position:absolute;left:0;right:0;top:100%;flex-direction:column;align-items:stretch;gap:0;background:var(--bg);border-bottom:1px solid var(--border);padding:6px clamp(18px,4vw,40px) 14px}
  .nav-links a{padding:14px 2px;border-top:1px solid var(--border);font-size:16px}
  .nav-links .btn{margin-top:12px;justify-content:center}
  .nav-toggle:checked ~ .nav-links{display:flex}
  .nav-toggle:checked ~ .nav-burger .ic-open{display:none}
  .nav-toggle:checked ~ .nav-burger .ic-close{display:inline}
}
/* Grids colapsan en móvil (mobile-first) */
@media(max-width:900px){.grid-3,.grid-4{grid-template-columns:repeat(2,1fr)}}
@media(max-width:620px){.grid-2,.grid-3,.grid-4{grid-template-columns:1fr}}

/* ── M&D · componentes compartidos ────────────────────────────── */
.chip{display:inline-flex;align-items:center;gap:7px;font-family:var(--font-head);font-weight:600;font-size:12px;letter-spacing:.06em;text-transform:uppercase;color:var(--accent);border:1px solid var(--border);border-radius:999px;padding:6px 14px;background:color-mix(in srgb,var(--accent) 8%,transparent)}
.dot{width:7px;height:7px;border-radius:50%;background:var(--accent);display:inline-block;box-shadow:0 0 8px var(--accent)}
.panel{background:var(--surface);border:1px solid var(--border);border-radius:16px;padding:clamp(20px,3vw,28px)}
.track{height:7px;border-radius:999px;background:#0A1220;overflow:hidden;margin-top:7px}
.fill{height:100%;background:var(--accent);border-radius:999px}
.stat-n{font-family:var(--font-head);font-weight:800;font-size:clamp(30px,4.4vw,46px);color:var(--accent);line-height:1}
.blueprint{background:
  linear-gradient(135deg,rgba(240,162,27,.10),rgba(19,39,61,0) 60%),
  repeating-linear-gradient(0deg,rgba(147,164,186,.12) 0 1px,transparent 1px 26px),
  repeating-linear-gradient(90deg,rgba(147,164,186,.12) 0 1px,transparent 1px 26px),
  linear-gradient(160deg,#16293F,#0E1A29);
  border:1px solid var(--border)}
.topbar{background:var(--surface);border-bottom:1px solid var(--border);font-size:13px}
.topbar .container{display:flex;flex-wrap:wrap;gap:6px 22px;justify-content:space-between;align-items:center;padding-top:9px;padding-bottom:9px}
.topbar a{color:var(--ink);text-decoration:none;font-weight:600;overflow-wrap:anywhere}
.topbar a:hover{color:var(--primary)}
.topbar .muted{font-size:13px}
details.faq{background:var(--surface);border:1px solid var(--border);border-radius:12px;padding:0 clamp(16px,3vw,22px);margin-bottom:12px}
details.faq summary{cursor:pointer;padding:18px 0;font-family:var(--font-head);font-weight:600;list-style:none;display:flex;gap:16px;justify-content:space-between;align-items:center}
details.faq summary::-webkit-details-marker{display:none}
details.faq summary::after{content:"+";color:var(--accent);font-size:22px;line-height:1}
details.faq[open] summary::after{content:"2"}
@media(max-width:620px){.topbar .container{justify-content:center;text-align:center}}
<?= $extra_css ?>
</style>
</head>
<body>
<a href="#main" style="position:absolute;left:-9999px;top:0;background:var(--primary);color:var(--primary-ink);padding:12px 20px;z-index:100;">Skip to content</a>
<?php if (!empty($SITE['phone']) || !empty($SITE['hours'])): ?>
<div class="topbar">
  <div class="container">
    <span class="muted"><?= htmlspecialchars($SITE['license'] ?? '') ?><?= !empty($SITE['hours']) ? ' · ' . htmlspecialchars($SITE['hours']) : '' ?></span>
    <span style="display:flex;gap:18px;flex-wrap:wrap;justify-content:center">
      <?php if (!empty($SITE['phone'])): ?><a href="tel:<?= htmlspecialchars($SITE['phone_tel']) ?>">&#9742; <?= htmlspecialchars($SITE['phone']) ?></a><?php endif; ?>
      <?php if (!empty($SITE['email'])): ?><a href="mailto:<?= htmlspecialchars($SITE['email']) ?>"><?= htmlspecialchars($SITE['email']) ?></a><?php endif; ?>
    </span>
  </div>
</div>
<?php endif; ?>
<header class="site-header">
  <nav class="nav container" aria-label="Main">
    <a href="index.php" class="brand">
      <?php if (!empty($SITE['logo'])): ?>
        <img src="uploads/<?= htmlspecialchars($SITE['logo']) ?>" alt="<?= htmlspecialchars($SITE['name']) ?>">
      <?php else: ?>
        <?= htmlspecialchars($SITE['name']) ?>
      <?php endif; ?>
    </a>
    <input type="checkbox" id="nav-toggle" class="nav-toggle" aria-hidden="true">
    <label for="nav-toggle" class="nav-burger" aria-label="Open menu" role="button" tabindex="0">
      <svg class="ic-open" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
      <svg class="ic-close" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M6 6l12 12M18 6L6 18"/></svg>
    </label>
    <div class="nav-links">
      <?php foreach (($NAV ?? []) as $key => $item): ?>
        <a href="<?= htmlspecialchars($item['url']) ?>"<?= $active === $key ? ' aria-current="page"' : '' ?>><?= htmlspecialchars($item['label']) ?></a>
      <?php endforeach; ?>
      <?php if (!empty($SITE['cta_label'])): ?>
        <a href="<?= htmlspecialchars($SITE['cta_url'] ?? 'contact.php') ?>" class="btn"><?= htmlspecialchars($SITE['cta_label']) ?></a>
      <?php endif; ?>
    </div>
  </nav>
</header>
<main id="main">
