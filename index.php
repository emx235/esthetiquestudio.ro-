<?php
define("TITLE","Esthetique Studio Brasov | Salonul pentru frumusetea ta");
define("DESCRIPTION", "Esthetique Studio - servicii de epilare cu pasta de zahar, epilare cu ceara si proceduri cosmetice");
include 'header.php';

// verificăm dacă există cookie-ul
$show_popup = true;
if (isset($_COOKIE['cookies_accepted']) && $_COOKIE['cookies_accepted'] === 'true') {
  $show_popup = false;
}
?>

<?php if ($show_popup): ?>
<!-- ===== POPUP OVERLAY ===== -->
<div id="popup-overlay">
  <div id="popup-box">
    <h2 style="margin-top:0">Bun venit la Esthetique Studio!</h2>
    <p>Continuând navigarea, confirmi că ai înțeles informațiile prezentate pe site.</p>
    <div class="popup-actions">
      <button id="btn-decline" class="btn-decline">Nu accept</button>
      <button id="btn-accept" class="btn-accept">Accept</button>
    </div>
  </div>
</div>

<style>
  #popup-overlay{
    position:fixed; inset:0;
    background:rgba(0,0,0,.65);
    display:flex; align-items:center; justify-content:center;
    z-index:99999;
  }
  #popup-box{
    width:min(92vw, 520px);
    background:#fff; color:#333;
    padding:28px; border-radius:14px;
    text-align:center;
    box-shadow:0 12px 36px rgba(0,0,0,.35);
    animation:popupFade .28s ease-out;
  }
  .popup-actions{ margin-top:18px; display:flex; gap:12px; justify-content:center; flex-wrap:wrap; }
  .btn-accept,.btn-decline{
    border:0; border-radius:28px; padding:10px 22px; font-weight:700; cursor:pointer;
  }
  .btn-accept{ background:#e55d87; color:#fff; }
  .btn-decline{ background:#b0b0b0; color:#fff; }
  .btn-accept:hover,.btn-decline:hover{ filter:brightness(1.05); }
  @keyframes popupFade{ from{opacity:0; transform:translateY(8px)} to{opacity:1; transform:translateY(0)} }
</style>

<script>
  document.getElementById('btn-decline').addEventListener('click', function () {
    window.location.href = 'nu-accept.php';
  });

  document.getElementById('btn-accept').addEventListener('click', function () {
    window.location.href = 'politica-cookie.php';
  });
</script>
<!-- ===== END POPUP OVERLAY ===== -->
<?php endif; ?>

<!-- image slider -->
<div class="section-intro">
  <div id="slider" class="nivoSlider">
    <img src="images/slider_img_1.jpg" data-thumb="images/slider_img_1.jpg" alt="Salon Esthetique Studio">
    <img src="images/slider_img_2.jpg" data-thumb="images/slider_img_3.jpg" alt="Salon Esthetique Studio">
    <img src="images/slider_img_3.jpg" data-thumb="images/slider_img_3.jpg" alt="Salon Esthetique Studio">
  </div>

  <div class="intro-wrap">
    <div class="intro-wrap-vertical wow fadeIn" data-wow-delay="0.5s">
      <h1>Pielea ta <br /> are grija de tine toata viata,<br /> tu cata grija ai de ea?</h1>
    </div>
  </div>
</div><!-- END image slider -->

<!-- section About us -->
<section class="about-us">
  <div class="container">
    <div class="wow fadeIn">
      <h2 class="section-title">Despre noi</h2>
      <div class="divider-short mb-50 "></div>
    </div>

    <div class="row wow fadeIn" data-wow-delay="0.5s">
      <div class="col-xs-12 col-sm-5 mb-20">
        <p>Vrei sa fii altfel? Ti-ai propus sa ai mai multa grija de tine?</p>
        <p>Atunci te asteptam zilnic la Esthetique Studio cu servicii de epilare cu pasta de zahar, epilare cu ceara si proceduri cosmetice, toate intr-un cadru modern, intr-o atmosfera deosebita si departe de agitatia orasului.</p>
        <p><strong>Frumusetea personala este scrisoarea ta de recomandare!</strong></p>
        <a href="despre-noi.php" class="btn-read-more">mai multe detalii</a>
      </div>

      <div class="col-xs-12 col-sm-7">
        <img src="images/despre_noi_2.png" alt="Salon Esthetique Studio" class="img-responsive m-auto">
      </div>
    </div>
  </div>
</section><!-- END section About us -->

<!-- section Quotes -->
<section class="quote-section">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-offset-3 col-sm-9 col-md-7 col-md-offset-5 col-lg-6 col-lg-offset-6">
        <h3 class="wow fadeInRight">Natura <br /> este o sursa de creativitate, eficacitate, blandete si placere</h3>
      </div>
    </div>
  </div>
</section><!-- END section Quotes -->

<!-- section Services -->
<section class="services">
  <div class="container">
    <div class="wow fadeIn">
      <h2 class="section-title wow fadeIn">Servicii</h2>
      <div class="divider-short mb-50 "></div>
    </div>

    <div class="row">
      <!-- Epilare Laser -->
      <div class="col-xs-12 col-sm-6 col-md-3 mb-40">
        <div class="services-item-sugaring wow fadeIn" data-wow-delay="0.3s"
             style="position: relative; background: #fff; overflow: hidden; padding: 20px; border-radius: 8px; border: 2px solid #ddd; box-shadow: 0 0 12px rgba(0,0,0,0.08); min-height: 250px;">
          <img src="images/DermaLaserProMax.jpg" alt="Aparat Derma Laser"
               style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.25; z-index: 0;">
          <div style="position: relative; z-index: 1;">
            <h3>Epilare Laser</h3>
            <p>Una dintre cele mai moderne și eficiente metode de îndepărtare a părului nedorit</p>
            <a href="epilare-laser.php" class="btn-read-more"><small>mai multe detalii</small></a>
          </div>
        </div>
      </div>

      <!-- Cosmetica -->
      <div class="col-xs-12 col-sm-6 col-md-3 mb-40">
        <div class="services-item-cosmetics wow fadeIn" data-wow-delay="0.5s">
          <h3>Cosmetica</h3>
          <p>Servicii de cosmetica: tratamente și proceduri</p>
          <a href="cosmetica.php" class="btn-read-more"><small>mai multe detalii</small></a>
        </div>
      </div>

      <!-- Epilare cu zahar -->
      <div class="col-xs-12 col-sm-6 col-md-3 mb-40">
        <div class="services-item-sugaring wow fadeIn" data-wow-delay="0.7s">
          <h3>Epilare cu zahar</h3>
          <p>O metodă străveche și simplă de îndepărtare a părului nedorit</p>
          <a href="epilare-zahar.php" class="btn-read-more"><small>mai multe detalii</small></a>
        </div>
      </div>

      <!-- Epilare cu ceara -->
      <div class="col-xs-12 col-sm-6 col-md-3 mb-40">
        <div class="services-item-waxing wow fadeIn" data-wow-delay="0.9s">
          <h3>Epilare cu ceara</h3>
          <p>Una dintre cele mai frecvent folosite metode de îndepărtare a părului</p>
          <a href="epilare-ceara.php" class="btn-read-more"><small>mai multe detalii</small></a>
        </div>
      </div>
    </div> <!-- sfârșitul .row -->
  </div> <!-- sfârșitul .container -->
</section><!-- sfârșitul section Services -->

<?php include 'footer.php'; ?>
