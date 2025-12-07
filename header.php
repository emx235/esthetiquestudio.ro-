<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title><?php echo TITLE;?></title>
    <!-- meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo DESCRIPTION;?>">
    <meta name="keyword" content="salon frumusete Brasov, epilare cu zahar Brasov, epilare cu ceara Brasov, cosmetica, curs epilare cu zahar, pasta de zahar, Esthetique Studio">
    <meta name="language" content="Romanian">

    <!-- Google Search Console -->
    <meta name="google-site-verification" content="rBxdu62phoUcOxshs0OLKJ2vsBAj23P3F4LNWG6Ne7A" />

    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text:400i" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/nivo-slider.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <!-- <script src="http://maps.googleapis.com/maps/api/js"></script> -->
    <script src='js/jquery.mobile.customized.min.js'></script>
    <script src='js/jquery.easing.1.3.js'></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nivo.slider.pack.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/contact_me.js"></script>
    <script src="js/main.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-36660618-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-36660618-1');
    </script>
</head>

<body>

<?php if (defined('PAGE_NOTICE') && PAGE_NOTICE): ?>
  <div class="site-notice" role="status" aria-live="polite">
    <span><?php echo PAGE_NOTICE; ?></span>
    <button class="notice-close" aria-label="Închide anunțul" onclick="this.parentElement.remove()">×</button>
  </div>
<?php endif; ?>

<style>
  .site-notice{
    display:flex; align-items:center; justify-content:center; gap:10px;
    padding:10px 14px; background:#fff3cd; color:#664d03; border-bottom:1px solid #ffe69c;
    font-size:14px; text-align:center; z-index:9999;
  }
  .notice-close{
    appearance:none; border:0; background:transparent; font-size:18px; line-height:1;
    cursor:pointer; color:#664d03; padding:0 6px;
  }

  /* ===== DOAR SIGLA ÎN STÂNGA (fără text) ===== */
  .navbar-brand { font-size:0 !important; line-height:0 !important; }
  .navbar-brand img { display:inline-block; height:auto; max-height:50px; }
  .navbar-brand::before, .navbar-brand::after { content:none !important; }

  /* Responsive: micșorare siglă pe ecrane mici */
  @media (max-width: 768px){
    .navbar-brand img { max-height:46px; }
    .navbar-default .navbar-brand { padding: 10px 15px; }
    .navbar-default .navbar-toggle { margin-top: 10px; margin-bottom: 10px; }
  }
  @media (max-width: 480px){
    .navbar-brand img { max-height:42px; }
    .navbar-default .navbar-brand { padding: 8px 12px; }
    .navbar-default .navbar-toggle { margin-top: 8px; margin-bottom: 8px; }
  }

  /* Stil special pentru butonul "Programare online" din navbar (doar pe epilare-laser.php) */
  .nav-programare-online{
    border:1px solid #b91c1c;          /* bordură roșie */
    border-radius:20px;
    padding:6px 14px !important;
    margin-left:8px;
    font-size:13px;
    font-weight:600;
    line-height:1.2;
    color:#b91c1c !important;          /* text roșu normal */
    transition:color 0.2s, border-color 0.2s;
    background:transparent;
  }
  .nav-programare-online:hover{
    color:#22c55e !important;          /* text verde la hover */
    border-color:#22c55e;              /* opțional: și bordura devine verde */
    background:transparent;
  }
</style>

<?php
// Detectăm pagina curentă (ex: "epilare-laser.php")
$current_script = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
?>

<!-- header - top header and navigation menu -->
<header class="navbar-fixed-top">
  <div class="top-header">
    <div class="container">
      <ul class="list-unstyled pull-right">
        <li>Telefon: <strong>+40 722 538722</strong></li>
        <li><a target="_blank" class="facebook-header" href="https://www.facebook.com/Esthetique.Studio.Bv">Facebook</a></li>
      </ul>
    </div>
  </div>
  
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php" aria-label="Esthetique Studio - Acasă">
          <img src="images/logo.png" alt="Esthetique Studio" class="img-responsive">
        </a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.php">Acasa</a></li>
          <li><a href="despre-noi.php">Despre noi</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Servicii<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="epilare-zahar.php">Epilare cu zahar</a></li>
              <li><a href="epilare-ceara.php">Epilare cu ceara</a></li>
              <li><a href="cosmetica.php">Cosmetica</a></li>
              <li><a href="epilare-laser.php">Epilare Laser</a></li>
            </ul>
          </li>
          <li><a href="cursuri.php">Cursuri</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Contact <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="contact-cosmetica.php">Contact Cosmetica</a></li>
              <li><a href="contact-laser.php">Contact Epilare Laser</a></li>
            </ul>
          </li>

          <?php if ($current_script === 'epilare-laser.php'): ?>
            <!-- Programare online apare doar pe pagina epilare-laser.php -->
            <li><a href="/programare-online.php" class="nav-programare-online">Programare online</a></li>
          <?php endif; ?>

          <!-- BUTON WHATSAPP (înlocuiește Programează-te online) -->
          <li>
            <a href="https://wa.me/40722538722?text=<?php echo rawurlencode('Bună! Aș dori informații și o programare.'); ?>"

               target="_blank"
               class="btn btn-primary"
               style="margin-left: 10px; color: #fff; background: #25D366; border-radius: 22px; padding: 8px 24px; font-weight: 600; transition:0.2s box-shadow;"
               onmouseover="this.style.boxShadow='0 2px 14px rgba(37,211,102,0.7)'"
               onmouseout="this.style.boxShadow='none'"
               aria-label="Scrie pe WhatsApp Esthetique Studio">
               <i class="fa fa-whatsapp" aria-hidden="true" style="margin-right:7px"></i>
               WhatsApp
            </a>
          </li>

          <li><a href="/epilare-laser-brasov.php">Epilare laser Brașov</a></li>
        </ul>
      </div>
    </div>
  </nav>
</header><!-- END header - top header and navigation menu -->
