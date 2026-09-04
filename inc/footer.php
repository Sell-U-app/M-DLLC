</main>
<?php require_once __DIR__ . '/config.php'; ?>
<footer style="background:#08101B;color:var(--ink);font-family:var(--font-body);border-top:3px solid var(--primary)">
  <div class="container" style="padding:clamp(48px,6vw,64px) clamp(18px,4vw,40px) 26px">
    <div class="grid" style="grid-template-columns:repeat(auto-fit,minmax(190px,1fr));gap:32px">
      <div style="max-width:34ch">
        <?php if (!empty($SITE['logo_footer'])): ?>
          <img src="uploads/<?= htmlspecialchars($SITE['logo_footer']) ?>" alt="<?= htmlspecialchars($SITE['name']) ?>" style="height:82px;margin-bottom:16px">
        <?php else: ?>
          <div style="font-family:var(--font-head);font-weight:800;font-size:22px;margin-bottom:12px"><?= htmlspecialchars($SITE['name']) ?></div>
        <?php endif; ?>
        <p style="opacity:.85;font-size:14px;margin:0"><?= htmlspecialchars($SITE['tagline'] ?? '') ?></p>
      </div>
      <div>
        <div style="font-family:var(--font-head);font-weight:700;font-size:14px;margin-bottom:12px;opacity:.7">Navigation</div>
        <?php foreach (($NAV ?? []) as $item): ?>
          <a href="<?= htmlspecialchars($item['url']) ?>" style="color:var(--ink);text-decoration:none;font-size:14px;display:block;margin-bottom:9px;opacity:.8"><?= htmlspecialchars($item['label']) ?></a>
        <?php endforeach; ?>
      </div>
      <div>
        <div style="font-family:var(--font-head);font-weight:700;font-size:14px;margin-bottom:12px;opacity:.7">Legal</div>
        <?php foreach (($LEGAL_NAV ?? []) as $item): ?>
          <a href="<?= htmlspecialchars($item['url']) ?>" style="color:var(--ink);text-decoration:none;font-size:14px;display:block;margin-bottom:9px;opacity:.8"><?= htmlspecialchars($item['label']) ?></a>
        <?php endforeach; ?>
      </div>
      <div>
        <div style="font-family:var(--font-head);font-weight:700;font-size:14px;margin-bottom:12px;opacity:.7">Contact</div>
        <?php if (!empty($SITE['email'])): ?><a href="mailto:<?= htmlspecialchars($SITE['email']) ?>" style="color:var(--primary);text-decoration:none;font-size:14px;display:block;margin-bottom:9px;font-weight:600"><?= htmlspecialchars($SITE['email']) ?></a><?php endif; ?>
        <?php if (!empty($SITE['phone'])): ?><a href="tel:<?= htmlspecialchars($SITE['phone_tel'] ?? $SITE['phone']) ?>" style="color:var(--primary);text-decoration:none;font-size:14px;display:block;margin-bottom:9px;font-weight:600"><?= htmlspecialchars($SITE['phone']) ?></a><?php endif; ?>
        <?php if (!empty($SITE['whatsapp'])): ?><a href="https://wa.me/<?= htmlspecialchars($SITE['whatsapp']) ?>" target="_blank" rel="noopener" style="color:var(--primary);text-decoration:none;font-size:14px;display:block;margin-bottom:9px;font-weight:600">WhatsApp</a><?php endif; ?>
        <?php if (!empty($SITE['address'])): ?><div style="opacity:.85;font-size:14px"><?= htmlspecialchars($SITE['address']) ?></div><?php endif; ?>
      </div>
    </div>
    <div style="border-top:1px solid var(--border);margin-top:34px;padding-top:20px;display:flex;flex-wrap:wrap;gap:8px 18px;justify-content:space-between;align-items:center">
      <p style="margin:0;font-size:12px;opacity:.85">&copy; <?= date('Y') ?> <?= htmlspecialchars($SITE['name']) ?>. All rights reserved.</p>
      <p style="margin:0;font-size:12px;opacity:.9">Built by <a href="https://sellu.co" target="_blank" rel="noopener" style="color:var(--primary);text-decoration:underline;font-weight:700">Sell-U Latam</a></p>
    </div>
  </div>
</footer>
<?php if (!empty($SITE['whatsapp'])): ?>
<a class="wa-float" href="https://wa.me/<?= htmlspecialchars($SITE['whatsapp']) ?>" target="_blank" rel="noopener" aria-label="Escribir por WhatsApp">
  <svg width="30" height="30" viewBox="0 0 24 24" fill="#fff"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2 22l5.25-1.38a9.9 9.9 0 0 0 4.79 1.22h.01c5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.82 9.82 0 0 0 12.04 2Zm5.8 14.16c-.25.69-1.44 1.32-1.99 1.36-.53.05-1.02.23-3.43-.72-2.9-1.14-4.73-4.1-4.87-4.29-.14-.19-1.16-1.54-1.16-2.94s.73-2.09 1-2.37c.26-.29.57-.36.76-.36.19 0 .38 0 .55.01.18.01.41-.07.64.49.24.57.81 1.97.88 2.11.07.14.12.31.02.5-.09.19-.14.31-.28.48-.14.16-.29.37-.42.49-.14.14-.28.29-.12.57.16.28.72 1.18 1.54 1.91 1.06.94 1.95 1.24 2.23 1.38.28.14.44.12.6-.07.17-.19.69-.8.87-1.08.19-.28.37-.23.62-.14.25.09 1.65.78 1.93.92.28.14.47.21.54.33.07.12.07.68-.18 1.37Z"/></svg>
</a>
<?php endif; ?>

<?php /* ── Motor de animaciones + carruseles (global, sin dependencias) ── */ ?>
<style>
[data-rv]{opacity:0;transform:translateY(26px);transition:opacity .7s cubic-bezier(.2,.7,.2,1),transform .7s cubic-bezier(.2,.7,.2,1)}
[data-rv].in{opacity:1;transform:none}
@media(prefers-reduced-motion:reduce){[data-rv]{opacity:1!important;transform:none!important}}
.carr{scroll-behavior:smooth}
.carr.auto{display:flex;gap:20px;overflow-x:auto;scroll-snap-type:x mandatory;-ms-overflow-style:none;scrollbar-width:none;padding-bottom:8px}
.carr.auto::-webkit-scrollbar{display:none}
.carr.auto>*{scroll-snap-align:start;flex:0 0 min(300px,80vw)}
.carr-wrap{position:relative}
.carr-btn{position:absolute;top:42%;transform:translateY(-50%);z-index:6;width:46px;height:46px;border-radius:50%;border:1px solid var(--border);background:var(--surface,#fff);color:var(--ink);cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:22px;line-height:1;box-shadow:0 8px 22px rgba(0,0,0,.14);transition:background .15s,color .15s,opacity .2s}
.carr-btn:hover{background:var(--primary);color:var(--primary-ink);border-color:var(--primary)}
.carr-prev{left:-8px}.carr-next{right:-8px}
.carr-dots{display:flex;gap:8px;justify-content:center;margin-top:16px}
.carr-dots b{width:8px;height:8px;border-radius:50%;background:var(--border);cursor:pointer;transition:background .2s,width .2s}
.carr-dots b.on{background:var(--primary);width:22px;border-radius:6px}
@media(max-width:760px){.carr-btn{display:none}}
/* Hover con vida (zoom de imágenes de tarjeta) */
.prod .im,.frag .im,.jnl .im,.ic .im,.gal,.pc .media,.work .thumb,.cat .em{transition:transform .5s cubic-bezier(.2,.7,.2,1)}
.prod:hover .im,.frag:hover .im,.jnl:hover .im,.ic:hover .im,.pc:hover .media,.work:hover .thumb{transform:scale(1.06)}
/* Ticker / marquee infinito */
.ticker-mask{overflow:hidden;-webkit-mask-image:linear-gradient(90deg,transparent,#000 8%,#000 92%,transparent);mask-image:linear-gradient(90deg,transparent,#000 8%,#000 92%,transparent)}
.ticker-run{display:inline-flex;align-items:center;gap:clamp(28px,5vw,64px);width:max-content;animation-name:tkscroll;animation-timing-function:linear;animation-iteration-count:infinite}
.ticker-mask:hover .ticker-run{animation-play-state:paused}
@keyframes tkscroll{from{transform:translateX(0)}to{transform:translateX(-50%)}}
[data-parallax]{will-change:transform}
@media(prefers-reduced-motion:reduce){.ticker-run{animation:none}[data-parallax]{transform:none!important}}
</style>
<script>
(function(){
  var reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;
  var root = document.getElementById('main') || document.body;

  /* Scroll-reveal con leve stagger */
  var RV = '.eyebrow,h1,h2,.lead,.pill,.pill2,.pill3,.tagm,.lbl,.badge,.btn-row,.card,.pc,.zig,.tipo,.plan,.act,.step,.ing,.bundle,.rev,.prod,.frag,.amen,.tst,.svc,.proj,.cat,.sede,.case,.ic,.jnl,.col-row,.trow,.svc-row,.st,.pcard,.gal,.book,.count,.quiz,.pyr,.pyr-info,.calc';
  var items = Array.prototype.filter.call(root.querySelectorAll(RV), function(el){
    return !el.closest('.carr') && !el.closest('.ticker') && !el.closest('.logo-wall') && !el.hasAttribute('data-parallax');
  });
  if (!reduce && 'IntersectionObserver' in window){
    items.forEach(function(el){ el.setAttribute('data-rv',''); });
    var io = new IntersectionObserver(function(entries){
      entries.forEach(function(e){
        if (e.isIntersecting){
          var sib = Array.prototype.indexOf.call(e.target.parentNode.children, e.target);
          e.target.style.transitionDelay = Math.min(sib,6)*70 + 'ms';
          e.target.classList.add('in');
          io.unobserve(e.target);
        }
      });
    }, { threshold:.08, rootMargin:'0px 0px -8% 0px' });
    items.forEach(function(el){ io.observe(el); });
    /* Failsafe: si el observer no dispara (viewport bajo, fuentes tardias),
       revelamos lo que ya esta en pantalla para no dejar texto invisible. */
    function failsafe(){
      items.forEach(function(el){
        if (el.classList.contains('in')) return;
        if (el.getBoundingClientRect().top < window.innerHeight){ el.classList.add('in'); io.unobserve(el); }
      });
    }
    window.addEventListener('load', function(){ setTimeout(failsafe, 400); });
    setTimeout(failsafe, 1400);
  }

  /* Carruseles: flechas + puntos + autoplay con pausa */
  document.querySelectorAll('.carr').forEach(function(c){
    if (c.children.length < 2) return;
    var wrap = document.createElement('div'); wrap.className = 'carr-wrap';
    c.parentNode.insertBefore(wrap, c); wrap.appendChild(c);
    function mk(t,cl){ var b=document.createElement('button'); b.type='button'; b.className='carr-btn '+cl; b.innerHTML=t; b.setAttribute('aria-label', cl==='carr-prev'?'Previous':'Next'); return b; }
    var prev=mk('‹','carr-prev'), next=mk('›','carr-next');
    wrap.appendChild(prev); wrap.appendChild(next);
    function step(){ var el=c.children[0]; return el ? el.getBoundingClientRect().width + 20 : 300; }
    next.onclick=function(){ if(c.scrollLeft+c.clientWidth>=c.scrollWidth-4){c.scrollTo({left:0,behavior:'smooth'});} else {c.scrollBy({left:step(),behavior:'smooth'});} };
    prev.onclick=function(){ c.scrollBy({left:-step(),behavior:'smooth'}); };
    /* dots */
    var dots=document.createElement('div'); dots.className='carr-dots';
    var n=c.children.length; for(var i=0;i<n;i++){ var d=document.createElement('b'); (function(idx){d.onclick=function(){c.scrollTo({left:idx*step(),behavior:'smooth'});};})(i); dots.appendChild(d); }
    wrap.appendChild(dots);
    function sync(){ var idx=Math.round(c.scrollLeft/step()); dots.querySelectorAll('b').forEach(function(b,bi){b.classList.toggle('on',bi===idx);}); }
    c.addEventListener('scroll', function(){ window.requestAnimationFrame(sync); }, {passive:true}); sync();
    /* autoplay */
    if(!reduce){ var timer=null; function play(){ timer=setInterval(function(){ next.onclick(); }, 4200); } function stop(){ if(timer){clearInterval(timer);timer=null;} }
      wrap.addEventListener('mouseenter',stop); wrap.addEventListener('mouseleave',play); wrap.addEventListener('touchstart',stop,{passive:true}); play(); }
  });

  /* Tickers de logos / marcas (marquee infinito) */
  document.querySelectorAll('.ticker,.logo-wall').forEach(function(t){
    if (t.dataset.tk || t.children.length < 2) return; t.dataset.tk = 1;
    var kids = Array.prototype.slice.call(t.children);
    var run = document.createElement('div'); run.className = 'ticker-run';
    kids.forEach(function(k){ run.appendChild(k); });
    kids.forEach(function(k){ run.appendChild(k.cloneNode(true)); });
    t.appendChild(run); t.classList.add('ticker-mask');
    var w = run.scrollWidth / 2;
    run.style.animationDuration = Math.max(14, Math.round(w / 55)) + 's';
    if (reduce) run.style.animation = 'none';
  });

  /* Parallax suave en scroll */
  var px = document.querySelectorAll('[data-parallax]');
  if (px.length && !reduce){
    var ticking = false;
    function upd(){ var vh = window.innerHeight; px.forEach(function(el){ var r = el.getBoundingClientRect(); var off = ((r.top + r.height/2) - vh/2) / vh; var f = parseFloat(el.getAttribute('data-parallax')) || 0.12; el.style.transform = 'translateY(' + (off * f * -90).toFixed(1) + 'px)'; }); ticking = false; }
    window.addEventListener('scroll', function(){ if(!ticking){ ticking = true; requestAnimationFrame(upd); } }, {passive:true});
    upd();
  }
})();
</script>
</body>
</html>
