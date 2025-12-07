<?php
/* -----------------------------------------------------------
   header_minimal.php — header simplificat (Beauty Side)
   - Logo cu fallback
   - Banner “Pagina în construcție” dacă PAGE_NOTICE e setat
   - Buton „Acasă”
   - Buton dinamic:
       - pe toate paginile: „Programare online” → /programare-online.php
       - pe programare-online.php:
           text: „Întoarcere la pagina anterioară”
           link: pagina de unde a venit utilizatorul (dacă e internă)
                 altfel fallback: /epilare-laser-brasov.php
   ----------------------------------------------------------- */

// Detectăm pagina curentă (ex: "programare-online.php")
$current_path   = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$current_script = basename($current_path);
$is_programare_online = ($current_script === 'programare-online.php');

// Calculam URL-ul pentru „înapoi” dacă suntem pe pagina de programări
$backUrl = '/epilare-laser-brasov.php'; // fallback implicit

if ($is_programare_online) {
    if (!empty($_SERVER['HTTP_REFERER'])) {
        $ref = $_SERVER['HTTP_REFERER'];
        $refParts = parse_url($ref);

        // Host curent (fără port)
        $currentHost = $_SERVER['HTTP_HOST'];
        if (strpos($currentHost, ':') !== false) {
            $currentHost = explode(':', $currentHost)[0];
        }

        // Verificăm dacă refererul este intern (același host)
        $isInternal = false;
        if (!empty($refParts['host'])) {
            $refHost = $refParts['host'];
            if (strpos($refHost, ':') !== false) {
                $refHost = explode(':', $refHost)[0];
            }
            if ($refHost === $currentHost) {
                $isInternal = true;
            }
        } else {
            // Dacă nu are host (poate fi relativ), îl considerăm intern
            $isInternal = true;
        }

        if ($isInternal && !empty($refParts['path'])) {
            $refPath = $refParts['path'];
            $refQuery = isset($refParts['query']) ? ('?' . $refParts['query']) : '';

            // Evităm bucla către aceeași pagină
            if ($refPath !== $current_path) {
                $backUrl = $refPath . $refQuery;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ro">
<head>
  <meta charset="UTF-8">
  <title><?php echo defined('TITLE') ? TITLE : 'THE BEAUTY SIDE'; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php if (defined('DESCRIPTION')): ?>
    <meta name="description" content="<?php echo DESCRIPTION; ?>">
  <?php endif; ?>
  <meta name="theme-color" content="#111111">

  <!-- Google Search Console -->
  <meta name="google-site-verification" content="rBxdu62phoUcOxshs0OLKJ2vsBAj23P3F4LNWG6Ne7A" />

  <!-- Open Graph minim -->
  <meta property="og:site_name" content="<?php echo defined('SITE_BRAND') ? SITE_BRAND : 'THE BEAUTY SIDE by Dentistul meu'; ?>">
  <meta property="og:title" content="<?php echo defined('TITLE') ? TITLE : 'THE BEAUTY SIDE'; ?>">
  <?php if (defined('DESCRIPTION')): ?>
    <meta property="og:description" content="<?php echo DESCRIPTION; ?>">
  <?php endif; ?>
  <meta property="og:type" content="website">

  <!-- Google tag (gtag.js) – Google Analytics 4 -->
  <!-- IMPORTANT: înlocuiește G-XXXXXXX cu Measurement ID-ul tău real -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-TGZ9QMV8RZ"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-TGZ9QMV8RZ', {
      'anonymize_ip': true
    });
  </script>

  <!-- Font -->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">

  <!-- Preload logo -->
  <link rel="preload" as="image" href="/images/logo-beautyside.jpg" fetchpriority="high">
  <link rel="preload" as="image" href="/images/logo-beutyside.jpg">

  <style>
    :root{
      --bg:#ffffff; --ink:#111111; --border:#eaeaea; --accent:#0a7a3d;
    }
    *{box-sizing:border-box}
    html,body{
      margin:0;padding:0;
      font-family:Inter,system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;
      color:var(--ink);background:var(--bg)
    }
    a{color:inherit;text-decoration:none}

    .site-notice{
      display:flex;align-items:center;justify-content:center;gap:10px;
      padding:10px 14px;background:#fff3cd;color:#664d03;
      border-bottom:1px solid #ffe69c;font-size:14px;z-index:9999
    }
    .notice-close{
      appearance:none;border:0;background:transparent;
      font-size:18px;line-height:1;cursor:pointer;color:#664d03;padding:0 6px
    }

    .mini-header{
      position:sticky;top:0;background:#fff;
      border-bottom:1px solid var(--border);z-index:900
    }
    .mini-header .wrap{
      max-width:1100px;margin:0 auto;padding:10px 16px;
      display:flex;align-items:center;justify-content:space-between;gap:12px
    }
    .brand{display:flex;align-items:center;gap:10px}

    .brand img{display:block;height:auto;max-height:184px;width:auto}
    @media (max-width:768px){ .brand img{max-height:168px} }
    @media (max-width:480px){ .brand img{max-height:152px} }

    .nav-min{display:flex;align-items:center;gap:10px}
    .btn-home{
      display:inline-block;padding:8px 14px;
      border:1px solid var(--ink);border-radius:10px;
      transition:background .15s,color .15s
    }
    .btn-home:hover{background:#111;color:#fff}

    /* === Stil pentru butonul Programare online / Întoarcere (ca în header.php) === */
    .btn-programare{
      background:transparent;
      border:1px solid #b91c1c;      /* roșu normal */
      border-radius:20px;
      padding:6px 14px;
      font-size:13px;                /* mai mic, să încapă pe un rând */
      font-weight:600;
      line-height:1.2;
      color:#b91c1c;
      white-space:nowrap;
      transition:color .2s, border-color .2s, background .2s;
    }
    .btn-programare:hover{
      background:transparent;        /* fără fundal plin */
      color:#22c55e;                 /* verde la hover */
      border-color:#22c55e;
    }

    .sr-only{
      position:absolute;width:1px;height:1px;padding:0;overflow:hidden;
      clip:rect(0,0,0,0);white-space:nowrap;border:0
    }

    .header-sphere{
      flex:1 1 auto;
      display:flex;
      align-items:center;
      justify-content:center;
      margin:0 8px;
    }
    #header-sphere-canvas{
      width:100%;
      max-width:700px;
      height:160px;
      display:block;
    }

    @media (max-width:900px){
      #header-sphere-canvas{
        max-width:320px;
        height:130px;
      }
    }
    @media (max-width:640px){
      .header-sphere{
        display:none;
      }
    }
  </style>
</head>
<body>

<?php if (defined('PAGE_NOTICE') && PAGE_NOTICE): ?>
  <div class="site-notice" role="status" aria-live="polite">
    <span><?php echo PAGE_NOTICE; ?></span>
    <button class="notice-close" aria-label="Închide anunțul" onclick="this.parentElement.remove()">×</button>
  </div>
<?php endif; ?>

<header class="mini-header">
  <div class="wrap">
    <a class="brand" href="/index.php" aria-label="<?php echo defined('SITE_BRAND') ? SITE_BRAND : 'THE BEAUTY SIDE by Dentistul meu'; ?>">
      <img
        src="/images/logo-beautyside.jpg"
        alt="<?php echo defined('SITE_BRAND') ? SITE_BRAND : 'THE BEAUTY SIDE by Dentistul meu'; ?>"
        id="bs-logo"
        width="640" height="140"
        decoding="async"
        fetchpriority="high"
        data-fallbacks="/images/logo-beutyside.jpg,images/logo-beautyside.jpg,images/logo-beutyside.jpg"
        onerror="(function(img){
          var list = (img.getAttribute('data-fallbacks')||'').split(',');
          if(!list.length || !list[0]){ img.onerror=null; return; }
          var next = list.shift();
          img.setAttribute('data-fallbacks', list.join(','));
          img.src = next;
        })(this)">
      <span class="sr-only"><?php echo defined('SITE_BRAND') ? SITE_BRAND : 'THE BEAUTY SIDE by Dentistul meu'; ?></span>
    </a>

    <div class="header-sphere" aria-hidden="true">
      <canvas id="header-sphere-canvas"></canvas>
    </div>

    <nav class="nav-min" aria-label="Navigare secundară">
      <a class="btn-home" href="/index.php">Acasă</a>

      <?php if ($is_programare_online): ?>
        <!-- Suntem pe programare-online.php: buton dinamic de întoarcere cu stil Programare -->
        <a class="btn-home btn-programare" href="<?php echo htmlspecialchars($backUrl, ENT_QUOTES, 'UTF-8'); ?>">
          Întoarcere la pagina anterioară
        </a>
      <?php else: ?>
        <!-- Orice altă pagină: buton Programare online cu același stil -->
        <a class="btn-home btn-programare" href="/programare-online.php">
          Programare online
        </a>
      <?php endif; ?>
    </nav>
  </div>
</header>

<script>
(function(){
  const canvas = document.getElementById('header-sphere-canvas');
  if (!canvas) return;
  const ctx = canvas.getContext('2d');
  if (!ctx) return;

  let width, height, dpr;
  const particles = [];

  const COUNT = 950;
  const RX = 1.25;
  const RY = 0.65;
  const THICKNESS = 0.32;

  const ROT_SPEED = 0.55;                 // viteză rotație elipsă
  const BLOOM_INTERVAL = 2 * Math.PI;     // la fiecare o rotație completă
  const BLOOM_DURATION = 1.8;             // bloom + explozie

  let rotAccum = 0;
  let bloomStart = null;
  let lastTs = performance.now() / 1000;

  function resize(){
    dpr = window.devicePixelRatio || 1;
    const cssW = canvas.clientWidth || 420;
    const cssH = canvas.clientHeight || 160;
    width = cssW * dpr;
    height = cssH * dpr;
    canvas.width = width;
    canvas.height = height;
  }

  function initParticles(){
    particles.length = 0;
    for(let i = 0; i < COUNT; i++){
      const t = (i / COUNT) * Math.PI * 2;
      const offset = (Math.random() - 0.5) * THICKNESS;
      const localR = 1 + offset;

      const x = RX * localR * Math.cos(t);
      const y = RY * localR * Math.sin(t);

      const hue = (i / COUNT) * 360;
      const baseSize = 0.7 + Math.random() * 1.1;

      particles.push({
        angle: t,
        x, y,
        hue,
        size: baseSize,
        wave: Math.random() * Math.PI * 2
      });
    }
  }

  function project(x, y){
    const scaleX = width * 0.52;
    const scaleY = height * 0.62;
    return {
      x: x * scaleX + width / 2,
      y: y * scaleY + height / 2
    };
  }

  function getBloomState(now){
    if (bloomStart === null) return { bloom: 0, explode: 0 };

    const elapsed = now - bloomStart;
    if (elapsed <= 0 || elapsed >= BLOOM_DURATION) {
      return { bloom: 0, explode: 0 };
    }

    const bloomPhase = BLOOM_DURATION * 0.55; // ~55% timp pentru înflorire

    if (elapsed <= bloomPhase) {
      const p = elapsed / bloomPhase;
      const eased = 1 - Math.cos(p * Math.PI * 0.5); // ease-out
      return { bloom: eased, explode: 0 };
    } else {
      const p = (elapsed - bloomPhase) / (BLOOM_DURATION - bloomPhase);
      const explode = Math.min(1, p);
      return { bloom: 1, explode };
    }
  }

  function drawRose(bloom, explode){
    if (bloom <= 0 && explode <= 0) return;

    const cx = width / 2;
    const cy = height / 2;

    const base = Math.min(width, height);
    const outerR = base * (0.09 + 0.10 * bloom);
    const innerR = outerR * (0.45 + 0.25 * bloom);

    ctx.save();
    ctx.translate(cx, cy);

    const explodeScale = 1 + explode * 2.0;
    const explodeFade = 1 - explode;

    const layers = [
      {
        petals: 10,
        radius: outerR,
        w: 0.65,
        h: 1.10,
        color: (a)=>`rgba(140, 0, 20, ${(0.22 + 0.40 * a) * explodeFade})`
      },
      {
        petals: 8,
        radius: outerR * 0.78,
        w: 0.5,
        h: 0.9,
        color: (a)=>`rgba(175, 0, 35, ${(0.30 + 0.45 * a) * explodeFade})`
      },
      {
        petals: 6,
        radius: outerR * 0.52,
        w: 0.42,
        h: 0.8,
        color: (a)=>`rgba(210, 15, 55, ${(0.40 + 0.50 * a) * explodeFade})`
      }
    ];

    layers.forEach(layer => {
      const {petals, radius, w, h, color} = layer;
      for (let i = 0; i < petals; i++) {
        const ang = (i / petals) * Math.PI * 2;
        const local = 0.6 + 0.4 * bloom;

        let px = Math.cos(ang) * radius * 0.25;
        let py = Math.sin(ang) * radius * 0.18;

        if (explode > 0){
          const ex = Math.cos(ang) * outerR * explode * 1.6;
          const ey = Math.sin(ang) * outerR * explode * 1.2;
          px = (px + ex) * explodeScale;
          py = (py + ey) * explodeScale;
        }

        const petalW = radius * w * local * (1 + explode * 0.2);
        const petalH = radius * h * local * (1 - explode * 0.2);

        ctx.save();
        ctx.translate(px, py);
        ctx.rotate(ang + Math.sin(ang + bloom * Math.PI) * 0.12);
        ctx.beginPath();
        ctx.ellipse(0, 0, petalW, petalH, 0, 0, Math.PI * 2);
        ctx.fillStyle = color(bloom);
        ctx.fill();
        ctx.restore();
      }
    });

    const centerPetals = 9;
    for (let i = 0; i < centerPetals; i++) {
      const ang = (i / centerPetals) * Math.PI * 2 + bloom * 0.8;
      const r = innerR * (0.35 + 0.4 * (i / centerPetals));
      let px = Math.cos(ang) * r * 0.18;
      let py = Math.sin(ang) * r * 0.18 - innerR * 0.15;

      if (explode > 0){
        const ex = Math.cos(ang) * innerR * explode * 1.8;
        const ey = Math.sin(ang) * innerR * explode * 1.4;
        px = (px + ex) * (1 + explode * 1.5);
        py = (py + ey) * (1 + explode * 1.2);
      }

      ctx.save();
      ctx.translate(px, py);
      ctx.rotate(ang);
      ctx.beginPath();
      ctx.ellipse(0, 0, innerR * 0.28, innerR * 0.7, 0, 0, Math.PI * 2);
      ctx.fillStyle = `rgba(230, 40, 70, ${(0.45 + 0.45 * bloom) * explodeFade})`;
      ctx.fill();
      ctx.restore();
    }

    if (explode < 0.98){
      ctx.beginPath();
      ctx.arc(0, -innerR * 0.15, innerR * 0.28 * (1 - explode), 0, Math.PI * 2);
      ctx.fillStyle = `rgba(255, 235, 235, ${0.96 * explodeFade})`;
      ctx.fill();
    }

    ctx.restore();
  }

  function animate(){
    const now = performance.now() / 1000;
    const dt = now - lastTs;
    lastTs = now;

    const rotStep = ROT_SPEED * dt;
    rotAccum += rotStep;

    if (rotAccum >= BLOOM_INTERVAL){
      rotAccum -= BLOOM_INTERVAL;
      bloomStart = now;
    }

    ctx.clearRect(0, 0, width, height);

    const rot = rotAccum;
    const cosR = Math.cos(rot);
    const sinR = Math.sin(rot);

    for(const p of particles){
      const xr = p.x * cosR - p.y * sinR;
      const yr = p.x * sinR + p.y * cosR;

      const waveOffset = Math.sin(now * 2.2 + p.wave) * 0.05;
      const yy = yr + waveOffset;

      const pos = project(xr, yy);

      const verticalFactor = 0.35 + 0.65 * (1 - Math.abs(yy) / (RY + THICKNESS));
      const alpha = 0.16 + 0.9 * verticalFactor;

      const pulse = 0.45 + 0.55 * (1 + Math.sin(now * 3.3 + p.wave)) / 2;
      const radius = (p.size * pulse) * (width / 420) * 0.7;

      ctx.beginPath();
      ctx.arc(pos.x, pos.y, radius, 0, Math.PI * 2);
      ctx.fillStyle = `hsla(${(p.hue + now * 80) % 360}, 90%, 60%, ${alpha})`;
      ctx.fill();
    }

    const state = getBloomState(now);
    drawRose(state.bloom, state.explode);

    requestAnimationFrame(animate);
  }

  resize();
  initParticles();
  animate();

  window.addEventListener('resize', function(){
    resize();
    initParticles();
  });
})();
</script>

</body>
</html>
