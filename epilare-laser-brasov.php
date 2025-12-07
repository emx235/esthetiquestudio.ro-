<?php
// [v2 Eniko 2025-12-07]
// - session_start mutat înainte de orice output
// - structură aliniată cu header_minimal.php (fără <!DOCTYPE html>, <html>, <head> aici)
// - JSON-LD corectat (closes": "14:00")

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// =================== META & HEADER (VARIANTA MINIMALĂ DOAR PE ACEASTĂ PAGINĂ) ===================
define("TITLE", "Epilare definitivă laser în Brașov - THE BEAUTY SIDE by Dentistul meu");
define(
    "DESCRIPTION",
    "Epilare definitivă laser în Brașov la THE BEAUTY SIDE by Dentistul meu, cu aparat Derma Laser Pro Max (4 lungimi de undă). Programări rapide la telefon sau WhatsApp. Tarife detaliate în pagina de servicii de epilare laser."
);
define("PAGE_NOTICE", "🛠️ Pagina în construcție — unele secțiuni pot fi incomplete.");
define("SITE_BRAND", "THE BEAUTY SIDE by Dentistul meu"); // folosit în header_minimal pentru og:site_name & brand vizibil

// =================== LINKURI GOOGLE MAPS PENTRU LOCAȚIE ===================
$mapsLink    = 'https://www.google.com/maps?q=Calea+Bucuresti+250,+Brasov,+Romania';
$mapEmbedSrc = 'https://www.google.com/maps?q=Calea+Bucuresti+250,+Brasov,+Romania&output=embed';

// =================== CONTOR VIZUALIZĂRI PAGINĂ (SINCRONIZAT CU RAPORTUL) ===================
$counterFile = __DIR__ . '/epilare-laser-brasov-views.txt';
$logFile     = __DIR__ . '/epilare-laser-brasov-log.txt';

$epilareViewCount = 0;

// citim valoarea curentă, dacă fișierul de total există
if (file_exists($counterFile)) {
    $raw = trim(@file_get_contents($counterFile));
    if (is_numeric($raw)) {
        $epilareViewCount = (int) $raw;
    }
}

// incrementăm O SINGURĂ DATĂ pe sesiune și logăm data în fișierul de log
if (empty($_SESSION['epilare_laser_brasov_counted'])) {
    $epilareViewCount++;

    if (@file_put_contents($counterFile, (string) $epilareViewCount, LOCK_EX) !== false) {
        $_SESSION['epilare_laser_brasov_counted'] = true;

        // adăugăm data curentă în log (o linie per sesiune)
        @file_put_contents($logFile, date('Y-m-d') . PHP_EOL, FILE_APPEND | LOCK_EX);
    }
}

// header_minimal.php ar trebui să genereze <!DOCTYPE html>, <html>, <head> cu meta + <body> + header
include 'header_minimal.php';
?>

<!-- Canvas galaxie ca fundal -->
<canvas class="webgl"></canvas>

<main id="epilare-laser-brasov" class="page-local container">

  <nav class="breadcrumb" aria-label="breadcrumb">
    <a href="/">Acasă</a> <span>/</span>
    <span>Epilare definitivă laser Brașov</span>
  </nav>

  <section class="hero-local">
    <div class="hero-text">
      <h1 id="pageTitle" class="title-fit-one-line">
        Epilare definitivă laser în Brașov – THE BEAUTY SIDE by Dentistul meu
      </h1>
      <p>
        Rezultate vizibile în câteva ședințe, protocoale sigure și consultanță înainte și după procedură.
        Lucrăm cu <strong>Derma Laser Pro Max</strong>, aparat profesional cu 4 lungimi de undă (755nm, 808nm, 940nm, 1064nm).
        <span class="hero-link-more">
          Pentru lista completă de zone și tarife, poți consulta
          <a href="/epilare-laser.php" data-event="go_services_epilare_hero">pagina de servicii de epilare laser</a>.
        </span>
      </p>
      <div class="cta-row">
        <a href="tel:+40722538722" class="btn cta" data-event="click_tel"><span class="ico">📞</span> Sună acum</a>
        <a href="https://wa.me/40722538722?text=Buna!%20As%20vrea%20o%20programare%20pentru%20epilare%20laser." class="btn cta" data-event="click_whatsapp"><span class="ico wa">💬</span> WhatsApp</a>
        <a href="<?php echo $mapsLink; ?>" target="_blank" class="btn cta" rel="noopener" data-event="click_directions"><span class="ico dir">🧭</span> Direcții</a>
      </div>
      <ul class="usp">
        <li>✅ Consultanță gratuită înainte de prima ședință</li>
        <li>✅ Protocoale personalizate în funcție de tipul de piele și zona tratată</li>
        <li>✅ Salon în Brașov, cartier Dârste – igienă și confort, program flexibil</li>
      </ul>
    </div>
  </section>

  <section class="beneficii grid-3">
    <article>
      <h2>De ce epilare laser?</h2>
      <p>Epilarea definitivă cu laser reduce treptat densitatea firului de păr și încetinește creșterea nedorită pe termen lung. Ai mai puține iritații, mai puține programări pentru epilare clasică și o piele mai netedă în mod constant.</p>
    </article>
    <article>
      <h2>Derma Laser Pro Max</h2>
      <p>Derma Laser Pro Max este un dispozitiv modern, cu 4 lungimi de undă, care permite ajustarea fină a parametrilor pentru tipul tău de piele și fir de păr. La consult stabilim împreună zonele de tratat și planul optim de ședințe.</p>
    </article>
    <article>
      <h2>Siguranță & confort</h2>
      <p>Începem mereu cu un test pe o zonă mică, lucrăm în condiții stricte de igienă și îți explicăm pas cu pas ce facem. Ești însoțit(ă) înainte, în timpul și după ședință, iar dacă apar întrebări, răspundem rapid.</p>
    </article>
  </section>

  <section class="to-services">
    <a class="btn big-ghost" href="/epilare-laser.php" data-event="go_services_epilare_top">
      SERVICII – EPILARE LASER
    </a>
    <p class="to-services-note" style="text-align: center;">Vezi lista completă de servicii, zone tratate și pachete disponibile.</p>
  </section>

  <section class="flow grid-2">
    <div>
      <h2>Cum decurge o ședință</h2>
      <ol>
        <li><strong>Consult inițial</strong> – discutăm istoricul, tipul de piele/păr, așteptările și vedem ce zone vrei să tratăm.</li>
        <li><strong>Test pe zonă mică</strong> – verificăm confortul și reacția pielii.</li>
        <li><strong>Ședința propriu-zisă</strong> – folosim Derma Laser Pro Max cu parametri adaptați; 10–60 min în funcție de zona aleasă.</li>
        <li><strong>Îngrijire după</strong> – recomandări simple pentru rezultate optime.</li>
      </ol>
      <p class="flow-link-note">
        Dacă vrei să vezi dinainte ce opțiuni și pachete există pentru fiecare zonă, găsești toate detaliile în
        <a href="/epilare-laser.php" data-event="go_services_epilare_flow">pagina de servicii de epilare laser</a>.
      </p>
    </div>
    <div>
      <h2>Înainte & după</h2>
      <h3>Înainte</h3>
      <ul>
        <li>Evită bronzul intens și epilarea prin smulgere cu 3–4 săptămâni înainte.</li>
        <li>Rade ușor zona cu ~24h înainte (dacă primești această indicație la consult).</li>
        <li>Anunță dacă urmezi tratamente fotosensibilizante.</li>
      </ul>
      <h3>După</h3>
      <ul>
        <li>Evită sauna, solarul și înotul 24–48h după ședință.</li>
        <li>Aplică o cremă calmantă la nevoie + protecție solară pe zone expuse.</li>
        <li>Respectă intervalul recomandat dintre ședințe.</li>
      </ul>
    </div>
  </section>

  <section class="harta-contact grid-2">
    <div>
      <h2>Ne găsești ușor</h2>
      <p><strong>THE BEAUTY SIDE by Dentistul meu</strong><br>
          Brașov, cart. Dârste, Calea București nr. 250<br>
          Tel: <a href="tel:+40722538722" data-event="click_tel">+40 722 538 722</a></p>

      <p><a class="btn cta"
             href="<?php echo $mapsLink; ?>"
             target="_blank" rel="noopener" data-event="click_directions">🧭 Deschide în Google Maps</a></p>
    </div>
    <div class="map-embed">
      <iframe title="Hartă THE BEAUTY SIDE by Dentistul meu - Brașov"
              src="<?php echo $mapEmbedSrc; ?>"
              width="100%" height="320" style="border:0;" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </section>

  <section class="faq">
    <h2>Întrebări frecvente despre epilarea definitivă laser în Brașov</h2>

    <div class="faq-item">
      <button class="faq-question" type="button">
        Câte ședințe de epilare definitivă laser sunt necesare?
        <span class="faq-toggle">+</span>
      </button>
      <div class="faq-answer">
        <p>În medie, sunt necesare între <strong>6 și 8 ședințe</strong>, în funcție de zonă, tipul de păr și echilibrul hormonal.
          La consultul inițial, în salonul nostru din Brașov, îți explicăm realist ce rezultate poți aștepta și în ce interval.</p>
      </div>
    </div>

    <div class="faq-item">
      <button class="faq-question" type="button">
        Este epilarea definitivă laser dureroasă?
        <span class="faq-toggle">+</span>
      </button>
      <div class="faq-answer">
        <p>Senzația este descrisă de cele mai multe persoane ca un mic „ciupit” sau o ușoară înțepătură.
          Lucrăm cu <strong>parametri adaptați sensibilității tale</strong>, folosim Derma Laser Pro Max și facem test pe o zonă mică înainte, ca să te simți în siguranță.</p>
      </div>
    </div>

    <div class="faq-item">
      <button class="faq-question" type="button">
        Ce zone ale corpului pot fi tratate cu epilare definitivă laser?
        <span class="faq-toggle">+</span>
      </button>
      <div class="faq-answer">
        <p>
          Putem lucra pe aproape toate zonele:
          <strong>axile, inghinal, picioare, brațe, spate, abdomen, față (de ex. bărbie, mustață)</strong>,
          atât la femei, cât și la bărbați, cu adaptarea protocolului la fiecare zonă și tip de piele.
          Pentru lista detaliată de zone și pachete, poți consulta
          <a href="/epilare-laser.php" data-event="go_services_epilare_faq">pagina de epilare laser THE BEAUTY SIDE</a>.
        </p>
      </div>
    </div>

    <div class="faq-item">
      <button class="faq-question" type="button">
        Pot face epilare definitivă laser vara?
        <span class="faq-toggle">+</span>
      </button>
      <div class="faq-answer">
        <p>Da, cu condiția să respecți recomandările noastre: evităm <strong>expunerea intensă la soare</strong> înainte și după ședință,
          folosim protecție solară și adaptăm parametrii în funcție de bronz.</p>
      </div>
    </div>

    <div class="faq-item">
      <button class="faq-question" type="button">
        Este epilarea definitivă laser potrivită pentru toată lumea?
        <span class="faq-toggle">+</span>
      </button>
      <div class="faq-answer">
        <p>Există situații în care nu recomandăm procedura (anumite afecțiuni, tratamente fotosensibilizante, sarcină).
          De aceea, începem mereu cu <strong>consult și chestionar medical</strong>, iar dacă avem nelămuriri te direcționăm către medicul tău.</p>
      </div>
    </div>
  </section>

  <section class="page-views">
    Această pagină a fost vizualizată de
    <strong><?php echo number_format($epilareViewCount, 0, ',', '.'); ?></strong>
    ori.
  </section>

</main>

<footer class="footer-services">
  <div class="footer-inner container">
    <div class="footer-cta">
      <h3>Suni sau scrii pe WhatsApp?</h3>
      <p>Îți răspundem rapid și îți propunem un protocol adaptat ție.</p>
      <div class="cta-row">
        <a href="tel:+40722538722" class="btn cta" data-event="click_tel_footer"><span class="ico">📞</span> Sună acum</a>
        <a href="https://wa.me/40722538722?text=Buna!%20As%20vrea%20o%20programare%20pentru%20epilare%20laser."
           class="btn cta" data-event="click_whatsapp_footer"><span class="ico wa">💬</span> WhatsApp</a>
      </div>
    </div>

    <div class="footer-grid">
      <section>
        <h4>Contact</h4>
        <ul class="list-plain">
          <li>THE BEAUTY SIDE by Dentistul meu</li>
          <li>Brașov, cart. Dârste, Calea București nr. 250</li>
          <li><a href="tel:+40722538722" data-event="click_tel_footer_link">+40 722 538 722</a></li>
          <li><a href="<?php echo $mapsLink; ?>"
                 target="_blank" rel="noopener" data-event="click_directions_footer">🧭 Direcții</a></li>
        </ul>
      </section>

      <section>
        <h4>Program</h4>
        <ul class="list-plain">
          <li><strong>Luni–Vineri:</strong> 10:00–14:00 și 16:00–20:00 <em>(cu programare)</em></li>
          <li><strong>Sâmbătă:</strong> 10:00–14:00 <em>(cu programare)</em></li>
        </ul>
      </section>

      <section>
        <h4>Servicii populare</h4>
        <ul class="list-plain">
          <li>Epilare laser – axile</li>
          <li>Epilare laser – inghinal</li>
          <li>Epilare laser – picioare întregi</li>
          <li>Abonamente 4–6 ședințe</li>
        </ul>
      </section>

      <section>
        <h4>Social</h4>
        <ul class="list-plain">
          <li><a href="https://www.facebook.com/CONT" target="_blank" rel="noopener">Facebook</a></li>
          <li><a href="https://www.instagram.com/CONT" target="_blank" rel="noopener">Instagram</a></li>
        </ul>
      </section>
    </div>

    <div class="footer-meta">
      <small>© <?php echo date('Y'); ?> THE BEAUTY SIDE by Dentistul meu — Toate drepturile rezervate.</small>
      <nav class="footer-nav">
        <a href="/">Acasă</a>
        <a href="/politica-cookie.php">Politica cookies</a>
        <a href="/termeni-si-conditii.php">Termeni & Condiții</a>
      </nav>
    </div>
  </div>
</footer>

<style>
  body{
    margin:0;
    /* fundal alb ca bază pentru galaxie */
    background:#ffffff;
  }

  .container{max-width:1100px;margin:0 auto;padding:clamp(16px,2vw,28px)}
  .hero-local{display:block}
  .hero-text h1{margin:0 0 8px}
  .title-fit-one-line{
    margin:0;text-align:center;white-space:nowrap;font-weight:800;line-height:1.15;letter-spacing:0.2px;
    font-size:clamp(16px, 4.8vw, 42px);
  }
  .cta-row{display:flex;flex-wrap:wrap;gap:10px;margin:14px 0 8px;justify-content:center}
  .btn{
    display:inline-block;
    padding:10px 16px;
    border-radius:10px;
    background:#111;
    color:#fff;
    text-decoration:none;
    box-shadow:0 8px 20px rgba(0,0,0,0.10);
    transition:
      transform .15s ease-out,
      box-shadow .15s ease-out,
      background .15s ease-out,
      color .15s ease-out;
  }
  .btn.outline{background:#fff;color:#111;border:1px solid #111}
  .btn.cta{
    background:linear-gradient(135deg, #0a7a3d, #11a85a);
    border:none;
  }
  .btn.big-ghost{
    padding:14px 22px;
    border:2px solid #111;
    background:#fff;
    color:#111;
    border-radius:12px;
    font-weight:700;
    font-size:18px;
  }
  .btn.big-ghost:hover{
    color:#d00;
    transform:translateY(-2px);
    box-shadow:0 10px 26px rgba(0,0,0,0.16);
  }
  .btn.outline:hover{color:#d00;}
  .btn.cta:hover{
    transform:translateY(-2px);
    box-shadow:0 12px 30px rgba(7,121,55,0.45);
    color:#ffd400;
  }

  .btn.cta .ico{
    display:inline-block;margin-right:6px;transform-origin:center;transition:transform .15s ease-out;
  }
  .btn.cta:hover .ico{animation:ring .6s ease-in-out infinite;}
  @keyframes ring{
    0%{transform:scale(1.8) rotate(0deg) translate(0,0);}
    15%{transform:scale(1.8) rotate(12deg) translate(1px,0);}
    30%{transform:scale(1.8) rotate(-12deg) translate(-1px,0);}
    45%{transform:scale(1.8) rotate(10deg) translate(1px,0);}
    60%{transform:scale(1.8) rotate(-10deg) translate(-1px,0);}
    75%{transform:scale(1.8) rotate(6deg) translate(1px,0);}
    100%{transform:scale(1.8) rotate(0deg) translate(0,0);}
  }
  .btn.outline .ico{
    display:inline-block;margin-right:6px;transform-origin:center;transition:transform .15s ease-out;
  }
  .btn.outline:hover .ico.wa{
    animation:waPulse .9s ease-in-out infinite;transform:scale(2);
  }
  @keyframes waPulse{
    0%{transform:scale(2);}
    50%{transform:scale(2.15);}
    100%{transform:scale(2);}
  }
  .btn.outline .ico.dir{
    display:inline-block;margin-right:6px;transform-origin:center;transition:transform .15s ease-out;
  }
  .btn.outline:hover .ico.dir{
    animation:dirRotate .9s ease-in-out infinite;transform:scale(2);
  }
  @keyframes dirRotate{
    0%{transform:scale(2) rotate(0deg);}
    50%{transform:scale(2) rotate(15deg);}
    100%{transform:scale(2) rotate(0deg);}
  }

  .usp{display:grid;grid-template-columns:1fr 1fr;gap:6px;margin:10px 0 0;padding-left:18px}
  .grid-3{display:grid;grid-template-columns:repeat(3,1fr);gap:20px}
  .grid-2{display:grid;grid-template-columns:repeat(2,1fr);gap:20px}
  .to-services{display:flex;flex-direction:column;align-items:center;gap:8px;margin:24px 0}
  .to-services-note{margin:0;font-size:14px;color:#444;text-align:center;}
  .map-embed iframe{border-radius:12px}
  .footer-services{background:#111;color:#fff;margin-top:28px}
  .footer-services a{color:#fff;text-decoration:none}
  .footer-services .footer-inner{padding:clamp(18px,3vw,36px)}
  .footer-cta{text-align:center;margin-bottom:18px}
  .footer-cta h3{margin:0 0 6px}
  .footer-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:18px;margin:18px 0}
  .footer-grid h4{margin:0 0 8px}
  .list-plain{list-style:none;margin:0;padding:0}
  .list-plain li{margin:6px 0}
  .footer-meta{
    display:flex;align-items:center;justify-content:space-between;
    border-top:1px solid rgba(255,255,255,.15);
    padding-top:12px;margin-top:12px;gap:10px;flex-wrap:wrap
  }
  .footer-nav{display:flex;gap:12px}
  @media (max-width:960px){
    .grid-3{grid-template-columns:1fr}
    .grid-2{grid-template-columns:1fr}
    .usp{grid-template-columns:1fr}
    .footer-grid{grid-template-columns:1fr 1fr}
  }
  @media (max-width:560px){
    .footer-grid{grid-template-columns:1fr}
  }

  /* FUNDAL GALAXIE & overlay */
  canvas.webgl{
    position:fixed;
    inset:0;
    width:100%;
    height:100%;
    z-index:0;
    pointer-events:none;
    display:block;
  }

  #epilare-laser-brasov{
    position:relative;
    z-index:1;
    background:rgba(255,255,255,0.94);
    border-radius:20px;
    box-shadow:0 18px 45px rgba(0,0,0,0.35);
    margin-top:24px;
    margin-bottom:24px;
  }

  .footer-services{
    position:relative;
    z-index:1;
    background:rgba(17,17,17,0.96);
  }

  .page-views{
    margin:24px 0 8px;
    font-size:0.9rem;
    color:#555;
    text-align:center;
    border-top:1px dashed rgba(187,187,187,0.7);
    padding-top:8px;
  }

  .beneficii article{
    background:#ffffff;
    border-radius:18px;
    padding:16px 18px;
    box-shadow:0 10px 26px rgba(0,0,0,0.18);
    border:1px solid rgba(0,0,0,0.03);
    transition:transform .2s ease, box-shadow .2s ease, background .2s ease;
  }
  .beneficii article h2{
    margin-top:0;
    font-size:1.1rem;
  }
  .beneficii article:hover{
    transform:translateY(-4px);
    box-shadow:0 16px 40px rgba(0,0,0,0.26);
    background:#ffffff;
  }

  @keyframes fadeUpSoft{
    from{
      opacity:0;
      transform:translateY(10px);
    }
    to{
      opacity:1;
      transform:translateY(0);
    }
  }

  .hero-local,
  .beneficii article,
  .flow,
  .harta-contact,
  .page-views{
    animation:fadeUpSoft .6s ease-out both;
  }

  .beneficii article:nth-child(2){ animation-delay:.05s; }
  .beneficii article:nth-child(3){ animation-delay:.1s; }
  .flow{ animation-delay:.12s; }
  .harta-contact{ animation-delay:.16s; }
  .page-views{ animation-delay:.2s; }

  .breadcrumb{
    font-size:0.85rem;
    color:#666;
    margin-bottom:8px;
  }
  .breadcrumb a{
    color:#666;
    text-decoration:none;
  }
  .breadcrumb a:hover{
    text-decoration:underline;
  }
  .breadcrumb span{
    margin:0 3px;
  }

  .faq{
    margin:28px 0;
    padding:18px 20px;
    border-radius:18px;
    background:#fafafa;
    box-shadow:0 10px 26px rgba(0,0,0,0.12);
  }
  .faq h2{
    margin-top:0;
    margin-bottom:10px;
    text-align:left;
    font-size:1.4rem;
  }
  .faq-item + .faq-item{
    margin-top:8px;
  }
  .faq-question{
    width:100%;
    text-align:left;
    padding:10px 14px;
    border-radius:12px;
    border:1px solid #ddd;
    background:#fff;
    font-size:0.98rem;
    font-weight:600;
    display:flex;
    align-items:center;
    justify-content:space-between;
    cursor:pointer;
  }
  .faq-toggle{
    font-size:1.2rem;
    margin-left:10px;
  }
  .faq-answer{
    max-height:0;
    overflow:hidden;
    transition:max-height .25s ease, padding-top .25s ease;
    padding:0 4px 0 4px;
    font-size:0.95rem;
  }
  .faq-answer.open{
    padding-top:6px;
  }
  .faq-answer p{
    margin:0 0 10px;
  }
</style>

<script>
(function(){
  function track(ev){
    try{
      if(window.dataLayer){ window.dataLayer.push({event: ev}); }
      // if(window.gtag){ window.gtag('event', ev); }
    }catch(e){
    }
  }
  document.addEventListener('click', function(e){
    var t = e.target.closest('[data-event]');
    if(t){ track(t.getAttribute('data-event')); }
  }, {passive:true});

  function fitTitle(){
    var el = document.getElementById('pageTitle');
    if(!el) return;
    el.style.fontSize = '';
    var minPx = 14;
    var step = 1;
    while(el.scrollWidth > el.clientWidth && parseFloat(getComputedStyle(el).fontSize) > minPx){
      el.style.fontSize = (parseFloat(getComputedStyle(el).fontSize) - step) + 'px';
    }
  }
  window.addEventListener('load', fitTitle, {once:true});
  window.addEventListener('resize', function(){
    clearTimeout(window.__fitT);
    window.__fitT = setTimeout(fitTitle,120);
  });
})();
</script>

<script>
  // FAQ accordion simplu
  (function(){
    var items = document.querySelectorAll('.faq-item');
    if(!items.length) return;

    items.forEach(function(item){
      var btn = item.querySelector('.faq-question');
      var ans = item.querySelector('.faq-answer');
      if(!btn || !ans) return;

      btn.addEventListener('click', function(){
        var isOpen = ans.classList.contains('open');
        items.forEach(function(it){
          var a = it.querySelector('.faq-answer');
          if(!a) return;
          a.classList.remove('open');
          a.style.maxHeight = null;
          var t = it.querySelector('.faq-toggle');
          if(t) t.textContent = '+';
        });
        if(!isOpen){
          ans.classList.add('open');
          ans.style.maxHeight = ans.scrollHeight + 'px';
          var toggle = item.querySelector('.faq-toggle');
          if(toggle) toggle.textContent = '−';
        }
      });
    });
  })();
</script>

<script src="https://unpkg.com/three@0.128.0/build/three.min.js"></script>
<script src="https://unpkg.com/three@0.128.0/examples/js/controls/OrbitControls.js"></script>
<script>
(function(){
  const canvas = document.querySelector('.webgl');
  if (!canvas || typeof THREE === 'undefined') {
    return;
  }

  const sizes = {
    width: window.innerWidth,
    height: window.innerHeight
  };

  const scene = new THREE.Scene();

  const parameters = {
    count: 14000,
    radius: 6,
    branches: 4,
    spin: 1.2,
    randomness: 0.55
  };

  const positions = new Float32Array(parameters.count * 3);
  const colors = new Float32Array(parameters.count * 3);

  const colorInside = new THREE.Color(0xffe29f);
  const colorOutside = new THREE.Color(0xff00aa);

  for (let i = 0; i < parameters.count; i++) {
    const i3 = i * 3;
    const radius = Math.random() * parameters.radius;
    const branchAngle = (i % parameters.branches) / parameters.branches * Math.PI * 2;
    const spinAngle = radius * parameters.spin;

    const randomX = (Math.random() - 0.5) * parameters.randomness * radius;
    const randomY = (Math.random() - 0.5) * parameters.randomness * 0.4;
    const randomZ = (Math.random() - 0.5) * parameters.randomness * radius;

    positions[i3 + 0] = Math.cos(branchAngle + spinAngle) * radius + randomX;
    positions[i3 + 1] = randomY;
    positions[i3 + 2] = Math.sin(branchAngle + spinAngle) * radius + randomZ;

    const mixedColor = colorInside.clone().lerp(colorOutside, radius / parameters.radius);
    colors[i3 + 0] = mixedColor.r;
    colors[i3 + 1] = mixedColor.g;
    colors[i3 + 2] = mixedColor.b;
  }

  const geometry = new THREE.BufferGeometry();
  geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
  geometry.setAttribute('color', new THREE.BufferAttribute(colors, 3));

  const material = new THREE.PointsMaterial({
    size: 0.05,
    sizeAttenuation: true,
    vertexColors: true,
    transparent: true,
    opacity: 0.9,
    blending: THREE.AdditiveBlending
  });

  const points = new THREE.Points(geometry, material);
  scene.add(points);

  const camera = new THREE.PerspectiveCamera(
    60,
    sizes.width / sizes.height,
    0.1,
    100
  );
  camera.position.set(6, 4, 6);
  scene.add(camera);

  const renderer = new THREE.WebGLRenderer({
    canvas: canvas,
    antialias: true,
    alpha: true
  });
  renderer.setSize(sizes.width, sizes.height);
  renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
  renderer.setClearColor(0x000000, 0);

  const controls = new THREE.OrbitControls(camera, renderer.domElement);
  controls.enableDamping = true;
  controls.enabled = false;

  window.addEventListener('resize', () => {
    sizes.width = window.innerWidth;
    sizes.height = window.innerHeight;
    camera.aspect = sizes.width / sizes.height;
    camera.updateProjectionMatrix();
    renderer.setSize(sizes.width, sizes.height);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
  });

  let animationFrameId;
  document.addEventListener('visibilitychange', () => {
    if (document.hidden) {
      cancelAnimationFrame(animationFrameId);
    } else {
      tick();
    }
  });

  const clock = new THREE.Clock();
  function tick(){
    const elapsedTime = clock.getElapsedTime();

    const radius = 8;
    camera.position.x = Math.cos(elapsedTime * 0.045) * radius;
    camera.position.z = Math.sin(elapsedTime * 0.045) * radius;
    camera.position.y = 3.2 + Math.sin(elapsedTime * 0.12) * 0.4;
    camera.lookAt(0, 0, 0);

    renderer.render(scene, camera);
    animationFrameId = requestAnimationFrame(tick);
  }
  tick();
})();
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BeautySalon",
  "name": "THE BEAUTY SIDE by Dentistul meu",
  "@id": "https://www.esthetiquestudio.ro/epilare-laser-brasov",
  "url": "https://www.esthetiquestudio.ro/epilare-laser-brasov",
  "telephone": "+40-722-538-722",
  "priceRange": "$$",
  "brand": { "@type": "Brand", "name": "THE BEAUTY SIDE by Dentistul meu" },
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Calea București nr. 250, cart. Dârste",
    "addressLocality": "Brașov",
    "postalCode": "TODO",
    "addressCountry": "RO"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 45.000000,
    "longitude": 25.000000
  },
  "openingHoursSpecification": [
    {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday"],
      "opens": "10:00",
      "closes": "20:00"
    },
    {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": ["Saturday"],
      "opens": "10:00",
      "closes": "14:00"
    }
  ],
  "sameAs": [
    "https://www.facebook.com/CONT",
    "https://www.instagram.com/CONT",
    "https://www.google.com/maps?q=Calea+Bucuresti+250,+Brasov,+Romania"
  ]
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "C\u0103te \u0219edin\u021be de epilare definitiv\u0103 laser sunt necesare?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "In medie, sunt necesare intre 6 \u0219i 8 \u0219edin\u021be, in func\u021bie de zon\u0103, tipul de p\u0103r \u0219i echilibrul hormonal. La consultul ini\u021bial explic\u0103m realist ce rezultate se pot ob\u021bine \u0219i in ce interval."
      }
    },
    {
      "@type": "Question",
      "name": "Este epilarea definitiv\u0103 laser dureroas\u0103?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Majoritatea persoanelor descriu senza\u021bia ca un mic \u201eciupit\u201d sau o u\u0219oar\u0103 in\u021bep\u0103tur\u0103. Lucr\u0103m cu parametri adapta\u021bi sensibilit\u0103\u021bii tale \u0219i facem test pe o zon\u0213 mic\u0103 inainte, pentru siguran\u021b\u0103 si confort."
      }
    },
    {
      "@type": "Question",
      "name": "Ce zone ale corpului pot fi tratate cu epilare definitiv\u0103 laser?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Se pot trata aproape toate zonele: axile, inghinal, picioare, bra\u021be, spate, abdomen, fa\u021b\u0103 (de exemplu b\u0103rbie sau musta\u021b\u0103). Protocolul este adaptat pentru fiecare zon\u0103 \u0219i tip de piele."
      }
    },
    {
      "@type": "Question",
      "name": "Pot face epilare definitiv\u0103 laser vara?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Da, cu condi\u021bia s\u0103 respec\u021bi recomand\u0103rile: evit\u0103 expunerea intens\u0103 la soare inainte \u0219i dup\u0103 \u0219edin\u021be, folose\u0219te protec\u021bie solar\u0103 \u0219i adapt\u0103m parametrii in func\u021bie de bronz."
      }
    },
    {
      "@type": "Question",
      "name": "Este epilarea definitiv\u0103 laser potrivit\u0103 pentru toat\u0103 lumea?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Exist\u0103 situa\u021bii in care nu recomand\u0103m procedura (anumite afec\u021biuni, tratamente fotosensibilizante, sarcin\u0103). Incepem mereu cu consult \u0219i chestionar medical, iar dac\u0103 exist\u0103 nel\u0103muriri te direc\u021bion\u0103m c\u0103tre medicul t\u0103u."
      }
    }
  ]
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Acas\u0103",
      "item": "https://www.esthetiquestudio.ro/"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "Epilare definitiv\u0103 laser Bra\u0219ov",
      "item": "https://www.esthetiquestudio.ro/epilare-laser-brasov"
    }
  ]
}
</script>

</body>
</html>
