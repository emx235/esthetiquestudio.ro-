<?php
// Pagini pe care vrei footer-ul negru "Beauty Side"
$currentPage = basename($_SERVER['PHP_SELF']);
$beautySidePages = ['programare-online.php', 'epilare-laser-brasov.php'];
$useBeautySideFooter = in_array($currentPage, $beautySidePages);
?>

<?php if ($useBeautySideFooter): ?>

<!-- FOOTER SPECIAL PENTRU BEAUTY SIDE (programare online / epilare-laser-brasov) -->
<footer class="footer-services">
  <div class="footer-inner container">
    <div class="footer-cta">
      <h3>Suni sau scrii pe WhatsApp?</h3>
      <p>Îți răspundem rapid și îți propunem un protocol adaptat ție.</p>
      <div class="cta-row">
        <a href="tel:+40722538722" class="btn cta" data-event="click_tel_footer">
          <span class="ico">📞</span> Sună acum
        </a>
        <a href="https://wa.me/40722538722?text=Buna!%20As%20vrea%20o%20programare%20pentru%20epilare%20laser."
           class="btn cta" data-event="click_whatsapp_footer">
          <span class="ico wa">💬</span> WhatsApp
        </a>
      </div>
    </div>

    <div class="footer-grid">
      <section>
        <h4>Contact</h4>
        <ul class="list-plain">
          <li>THE BEAUTY SIDE by Dentistul meu</li>
          <li>Brașov, cart. Dârste, Calea București nr. 250</li>
          <li><a href="tel:+40722538722" data-event="click_tel_footer_link">+40 722 538 722</a></li>
          <li>
            <a href="https://maps.google.com/?q=Brasov,%20cart.%20Darste,%20Calea%20Bucuresti%20nr.%20250"
               target="_blank" rel="noopener" data-event="click_directions_footer">🧭 Direcții</a>
          </li>
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
  .footer-services{
    background:#111;
    color:#fff;
    margin-top:28px;
    position:relative;
    z-index:1;
    background:rgba(17,17,17,0.96);
  }

  .footer-services a{
    color:#fff;
    text-decoration:none;
  }

  .footer-services .footer-inner{
    padding:clamp(18px,3vw,36px);
  }

  .footer-services .footer-cta{
    text-align:center;
    margin-bottom:18px;
  }
  .footer-services .footer-cta h3{
    margin:0 0 6px;
  }

  .footer-services .cta-row{
    display:flex;
    flex-wrap:wrap;
    justify-content:center;
    gap:10px;
    margin-top:10px;
  }

  .footer-services .btn{
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

  .footer-services .btn.cta{
    background:linear-gradient(135deg, #0a7a3d, #11a85a);
    border:none;
    font-weight:600;
  }
  .footer-services .btn.cta:hover{
    transform:translateY(-2px);
    box-shadow:0 12px 30px rgba(7,121,55,0.45);
    color:#ffd400;
  }

  .footer-services .btn.cta .ico{
    display:inline-block;
    margin-right:6px;
    transform-origin:center;
    transition:transform .15s ease-out;
  }
  .footer-services .btn.cta:hover .ico{
    animation:footerRing .6s ease-in-out infinite;
  }

  @keyframes footerRing{
    0%{transform:scale(1.8) rotate(0deg) translate(0,0);}
    15%{transform:scale(1.8) rotate(12deg) translate(1px,0);}
    30%{transform:scale(1.8) rotate(-12deg) translate(-1px,0);}
    45%{transform:scale(1.8) rotate(10deg) translate(1px,0);}
    60%{transform:scale(1.8) rotate(-10deg) translate(-1px,0);}
    75%{transform:scale(1.8) rotate(6deg) translate(1px,0);}
    100%{transform:scale(1.8) rotate(0deg) translate(0,0);}
  }

  .footer-services .footer-grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:18px;
    margin:18px 0;
  }

  .footer-services h4{
    margin:0 0 8px;
  }

  .footer-services .list-plain{
    list-style:none;
    margin:0;
    padding:0;
  }
  .footer-services .list-plain li{
    margin:6px 0;
  }

  .footer-services .footer-meta{
    display:flex;
    align-items:center;
    justify-content:space-between;
    border-top:1px solid rgba(255,255,255,.15);
    padding-top:12px;
    margin-top:12px;
    gap:10px;
    flex-wrap:wrap;
  }

  .footer-services .footer-nav{
    display:flex;
    gap:12px;
    flex-wrap:wrap;
  }

  @media (max-width:960px){
    .footer-services .footer-grid{
      grid-template-columns:1fr 1fr;
    }
  }
  @media (max-width:560px){
    .footer-services .footer-grid{
      grid-template-columns:1fr;
    }
  }
</style>

<?php else: ?>

<!-- footer CLASIC ESTHETIQUE STUDIO (pentru restul paginilor) -->
<footer>
    <div class="container">
        <div class="row" style="align-items: center; display: flex;">
            <!-- LOGO PRINCIPAL -->
            <div class="col-xs-12 col-sm-4 mb-20 wow fadeIn" data-wow-delay="0.1s" style="display: flex; align-items: center;">
                <div class="footer-logo" style="width:100%;">
                    <img src="images/logo.jpg" alt="logo" class="img-responsive mb-20" style="max-width:130px;">
                    <p>Povestea ce urmeaza este pentru oameni ce sunt gata sa isi asume instinctul pentru frumusete.</p>
                    <p>Pregatiti pentru aventura?</p>
                </div>
            </div>
            <!-- CONTACT DINAMIC -->
            <div class="col-xs-12 col-sm-4 mb-20 wow fadeIn" data-wow-delay="0.1s">
                <div class="footer-contact">
                    <h5><strong>Contact</strong></h5>
                    <ul class="pl-20 list-unstyled ">
                        <?php 
                        $laserPages = ['epilare-laser.php', 'contact-laser.php'];
                        if (in_array(basename($_SERVER['PHP_SELF']), $laserPages)): ?>
                            <li>Brasov, cart. Darste, calea Bucuresti nr.250</li>
                        <?php else: ?>
                            <li>Brasov, str. Lamaitei nr.37</li>
                        <?php endif; ?>
                        <li>+40 722 538 722</li>
                        <li>adriana@esthetiquestudio.ro</li>
                    </ul>
                    <?php if (in_array(basename($_SERVER['PHP_SELF']), $laserPages)): ?>
                        <h5><strong>Program cabinet Epilare Laser</strong></h5>
                        <ul class="pl-20 list-unstyled">
                            <li>Sambata: 10 - 16</li>
                        </ul>
                    <?php else: ?>
                        <h5><strong>Program cabinet Cosmetica</strong></h5>
                        <ul class="pl-20 list-unstyled">
                            <li>De Luni pana Vinari: 10 - 14 si 16 - 20</li>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
            <!-- LOGO BEAUTY SIDE + FACEBOOK -->
            <div class="col-xs-12 col-sm-4 mb-20 wow fadeIn" data-wow-delay="0.1s" style="position:relative; display:flex; flex-direction:column; align-items:flex-start; justify-content:flex-start;">
                <?php
                // Logo suplimentar doar pe epilare-laser.php sau contact-laser.php
                if (in_array(basename($_SERVER['PHP_SELF']), ['epilare-laser.php', 'contact-laser.php'])) {
                    echo '<div style="background:#222; padding:12px 25px; border-radius:12px; margin-bottom:15px; display:inline-block;">
                            <img src="images/logo-beautyside.jpg" alt="Logo Beauty Side" style="max-width:170px;">
                          </div>';
                }
                ?>
                <div class="fb-page" data-href="https://www.facebook.com/Esthetique.Studio.Bv" data-height="300px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                    <blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore">
                        <a href="https://www.facebook.com/facebook">Facebook</a>
                    </blockquote>
                </div>
            </div>
        </div>

        <hr>
        <p align="center">
            <a href="http://esthetiquestudio.ro/politica-cookie.php">Politica Cookie</a>
        </p>
        <p class="copyright">
            ©<?php echo date('Y');?> Esthetique Studio Brasov
        </p>
    </div>
</footer><!-- END footer -->

<?php endif; ?>

<!-- facebook post -->
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/ro_RO/sdk.js#xfbml=1&version=v2.8";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script><!-- end facebook post -->

<!-- Quantcast Choice. Consent Manager Tag -->
<script type="text/javascript" async=true>
    var elem = document.createElement('script');
    elem.src = 'https://quantcast.mgr.consensu.org/cmp.js';
    elem.async = true;
    elem.type = "text/javascript";
    var scpt = document.getElementsByTagName('script')[0];
    scpt.parentNode.insertBefore(elem, scpt);
    (function() {
        var gdprAppliesGlobally = false;
        function addFrame() {
            if (!window.frames['__cmpLocator']) {
                if (document.body) {
                    var body = document.body,
                        iframe = document.createElement('iframe');
                    iframe.style = 'display:none';
                    iframe.name = '__cmpLocator';
                    body.appendChild(iframe);
                } else {
                    setTimeout(addFrame, 5);
                }
            }
        }
        addFrame();
        function cmpMsgHandler(event) {
            var msgIsString = typeof event.data === "string";
            var json;
            if(msgIsString) {
                json = event.data.indexOf("__cmpCall") != -1 ? JSON.parse(event.data) : {};
            } else {
                json = event.data;
            }
            if (json.__cmpCall) {
                var i = json.__cmpCall;
                window.__cmp(i.command, i.parameter, function(retValue, success) {
                    var returnMsg = {"__cmpReturn": {
                        "returnValue": retValue,
                        "success": success,
                        "callId": i.callId
                    }};
                    event.source.postMessage(msgIsString ?
                        JSON.stringify(returnMsg) : returnMsg, '*');
                });
            }
        }
        window.__cmp = function (c) {
            var b = arguments;
            if (!b.length) {
                return __cmp.a;
            }
            else if (b[0] === 'ping') {
                b[2]({"gdprAppliesGlobally": gdprAppliesGlobally,
                    "cmpLoaded": false}, true);
            } else if (c == '__cmp')
                return false;
            else {
                if (typeof __cmp.a === 'undefined') {
                    __cmp.a = [];
                }
                __cmp.a.push([].slice.apply(b));
            }
        }
        window.__cmp.gdprAppliesGlobally = gdprAppliesGlobally;
        window.__cmp.msgHandler = cmpMsgHandler;
        if (window.addEventListener) {
            window.addEventListener('message', cmpMsgHandler, false);
        }
        else {
            window.attachEvent('onmessage', cmpMsgHandler);
        }
    })();
    window.__cmp('init', {
        'Language': 'ro',
        'Initial Screen Title Text': 'Pentru noi, confidentialitatea dvs. este importanta',
        'Initial Screen Reject Button Text': 'Nu sunt de acord',
        'Initial Screen Accept Button Text': 'Sunt de acord',
        'Initial Screen Purpose Link Text': 'Afisare scopuri',
        'Purpose Screen Title Text': 'Pentru noi, confidentialitatea dvs. este importanta',
        'Purpose Screen Body Text': 'Va puteti seta preferintele privind aprobarea si stabili în ce mod doriti ca datele dvs. sa fie utilizate în baza scopurilor de mai jos. Va puteti seta preferintele pentru noi în mod independent fata de cele ale partenerilor terti. Fiecare scop are o descriere pentru a sti modul în care noi si partenerii nostri va utilizam datele.',
        'Purpose Screen Enable All Button Text': 'Activare toate scopurile',
        'Purpose Screen Vendor Link Text': 'Vizualizare lista cu toti furnizorii',
        'Purpose Screen Cancel Button Text': 'Anulare',
        'Purpose Screen Save and Exit Button Text': 'Salvare si iesire',
        'Vendor Screen Title Text': 'Pentru noi, confidentialitatea dvs. este importanta',
        'Vendor Screen Body Text': 'Va puteti seta preferintele privind aprobarea pentru fiecare companie terta individuala mai jos. Mariti fiecare element din lista de companii pentru a vedea scopurile în care acestea va utilizeaza datele pentru a va ajuta sa va realizati propriile alegeri. În unele cazuri, companiile pot dezvalui faptul ca va utilizeaza datele fara a va solicita acordul, în baza intereselor lor legitime. Puteti face clic pe politicile lor de confidentialitate pentru mai multe informatii si pentru a renunta.',
        'Vendor Screen Accept All Button Text': 'Acceptare toate',
        'Vendor Screen Reject All Button Text': 'Respingere toate',
        'Vendor Screen Purposes Link Text': 'Înapoi la scopuri',
        'Vendor Screen Cancel Button Text': 'Anulare',
        'Vendor Screen Save and Exit Button Text': 'Salvare si iesire',
        'Initial Screen Body Text': 'Noi si partenerii nostri folosim tehnologii, precum modulele cookie de pe site-ul nostru, pentru a ne personaliza continutul si reclamele, pentru a oferi functii pentru retelele de socializare si pentru a ne analiza traficul. Faceti clic mai jos pentru a fi de acord cu utilizarea acestei tehnologii pe web. Va puteti razgândi si va puteti modifica optiunile privind aprobarea oricând, revenind la acest site.',
        'Initial Screen Body Text Option': 1,
        'Publisher Name': 'SETICO SRL',
        'Publisher Purpose IDs': [1,2,3,4,5],
        'UI Layout': 'banner',
    });
</script>
<!-- End Quantcast Choice. Consent Manager Tag -->
<style>.qc-cmp-persistent-link {
    right: 230px !important;
}</style>
</body>
</html>
