<?php
define("TITLE","Esthetique Studio Brasov | Acces restricționat");
define("DESCRIPTION", "Accesul la site a fost restricționat pentru că nu ați acceptat politica de cookie.");
?>
<!DOCTYPE html>
<html lang="ro">
<head>
  <meta charset="UTF-8">
  <title><?php echo TITLE; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      margin: 0;
      padding: 0;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: #111;
      color: #fff;
      font-family: Arial, sans-serif;
      text-align: center;
    }
    .box {
      max-width: 600px;
      padding: 40px;
      background: rgba(0,0,0,0.85);
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.4);
    }
    h1 {
      color: #e55d87;
      margin-bottom: 20px;
    }
    p {
      margin-bottom: 20px;
    }
    a.button, button.button {
      display: inline-block;
      padding: 12px 24px;
      background: #e55d87;
      color: #fff;
      text-decoration: none;
      font-weight: bold;
      border-radius: 8px;
      margin: 10px;
      transition: background 0.2s;
      border: none;
      cursor: pointer;
      font-size: 16px;
    }
    a.button:hover, button.button:hover {
      background: #d14f77;
    }
  </style>
</head>
<body>
  <div class="box">
    <h1>Acces restricționat</h1>
    <p>Ați ales <strong>„Nu accept”</strong>, prin urmare accesul la site este blocat.</p>
    <p>Pentru a continua, vă rugăm să acceptați politica noastră de cookie-uri.</p>
    
    <!-- Buton pentru revenire -->
    <a href="index.php" class="button">Înapoi la pagina principală</a>
    
    <!-- Buton pentru a accepta cookie-urile instant -->
    <button id="btn-accept-now" class="button">Accept cookie-uri acum</button>
  </div>

  <script>
    document.getElementById("btn-accept-now").addEventListener("click", function() {
      // setăm cookie-ul pentru 1 an
      document.cookie = "cookies_accepted=true; path=/; max-age=" + (60*60*24*365);
      // redirecționăm către pagina principală
      window.location.href = "index.php";
    });
  </script>
</body>
</html>
