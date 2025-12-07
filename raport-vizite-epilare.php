<?php
// raport-vizite-epilare.php
// Citește totalul și logul zilnic pentru Epilare Laser Brașov.

$counterFile = __DIR__ . '/epilare-laser-brasov-views.txt';
$logFile     = __DIR__ . '/epilare-laser-brasov-log.txt';

$count        = 0;
$lastModified = null;

// === TOTAL DIN FIȘIERUL CONTOR ===
if (file_exists($counterFile)) {
    $raw = trim(@file_get_contents($counterFile));
    if (is_numeric($raw)) {
        $count = (int)$raw;
    }
    $lastModified = @filemtime($counterFile);
}

// === LOG PE ZILE (din epilare-laser-brasov-log.txt) ===
$perDay = [];

if (file_exists($logFile)) {
    $lines = @file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lines !== false) {
        foreach ($lines as $line) {
            $d = trim($line);
            // acceptăm doar formate de tip YYYY-MM-DD
            if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $d)) {
                continue;
            }
            if (!isset($perDay[$d])) {
                $perDay[$d] = 0;
            }
            $perDay[$d]++;
        }
    }
}

// pregătim câteva statistici
$today      = date('Y-m-d');
$todayCount = $perDay[$today] ?? 0;

// ultimele 7 zile (inclusiv azi)
$last7Count = 0;
for ($i = 0; $i < 7; $i++) {
    $d = date('Y-m-d', strtotime("-$i days"));
    $last7Count += $perDay[$d] ?? 0;
}

// date pentru tabel: ultimele 14 zile
$daysForTable = 14;
$lastDays     = [];
for ($i = 0; $i < $daysForTable; $i++) {
    $d = date('Y-m-d', strtotime("-$i days"));
    $lastDays[$d] = $perDay[$d] ?? 0;
}

// vrem cele mai recente primele
krsort($lastDays);
?>
<!DOCTYPE html>
<html lang="ro">
<head>
  <meta charset="utf-8">
  <title>Raport vizite – Epilare Laser Brașov</title>
  <style>
    body{
      font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
      background:#f5f5f5;
      padding:20px;
    }
    .card{
      max-width:720px;
      margin:40px auto;
      background:#fff;
      border-radius:12px;
      padding:20px 24px 24px;
      box-shadow:0 6px 18px rgba(0,0,0,0.08);
    }
    h1{
      margin-top:0;
      font-size:1.4rem;
    }
    .metrics{
      display:grid;
      grid-template-columns:repeat(auto-fit,minmax(180px,1fr));
      gap:12px;
      margin:10px 0 18px;
    }
    .metric{
      font-size:0.95rem;
      background:#fafafa;
      border-radius:8px;
      padding:10px 12px;
    }
    .metric strong{
      display:block;
      font-size:1.3rem;
      margin-top:4px;
    }
    .note{
      font-size:0.85rem;
      color:#666;
      margin-top:10px;
    }
    table{
      width:100%;
      border-collapse:collapse;
      margin-top:12px;
      font-size:0.9rem;
    }
    th, td{
      padding:6px 8px;
      border-bottom:1px solid #eee;
      text-align:left;
    }
    th{
      background:#f0f0f0;
      font-weight:600;
    }
    code{
      background:#f0f0f0;
      padding:2px 4px;
      border-radius:4px;
      font-size:0.85rem;
    }
  </style>
</head>
<body>
  <div class="card">
    <h1>Raport vizite – Epilare Laser Brașov</h1>

    <div class="metrics">
      <div class="metric">
        Total vizualizări salvate:
        <strong><?php echo number_format($count, 0, ',', '.'); ?></strong>
      </div>

      <div class="metric">
        Vizite azi (<?php echo date('d.m.Y'); ?>):
        <strong><?php echo number_format($todayCount, 0, ',', '.'); ?></strong>
      </div>

      <div class="metric">
        Vizite în ultimele 7 zile:
        <strong><?php echo number_format($last7Count, 0, ',', '.'); ?></strong>
      </div>

      <div class="metric">
        Ultima actualizare a contorului:
        <strong>
          <?php
          echo ($lastModified !== null)
            ? date('d.m.Y H:i:s', $lastModified)
            : 'n/a';
          ?>
        </strong>
      </div>
    </div>

    <h2 style="font-size:1.05rem;margin-top:6px;">Ultimele <?php echo $daysForTable; ?> zile</h2>
    <table>
      <thead>
        <tr>
          <th>Data</th>
          <th>Vizite</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($lastDays as $dateStr => $cnt): ?>
          <tr>
            <td><?php echo date('d.m.Y', strtotime($dateStr)); ?></td>
            <td><?php echo number_format($cnt, 0, ',', '.'); ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <p class="note">
      Acest raport citește:
      <code>epilare-laser-brasov-views.txt</code> (total)
      și <code>epilare-laser-brasov-log.txt</code> (log zilnic) din același director.<br>
      Detaliile pe zile vor fi corecte începând din momentul în care a fost activat log-ul;
      pentru perioada de dinainte de modificare avem doar totalul.
    </p>
  </div>
</body>
</html>
