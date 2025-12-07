<?php
// raport-vizite-email.php
// Trimite pe email un raport cu vizitele paginii "epilare-laser-brasov.php"
// + logică de "alerte mai deștepte".

// ============ CONFIGURARE ============

// unde trimiți raportul
$to      = 'adriana@esthetiquestudio.ro';          // <<-- INLOCUIESTE cu emailul la care vrei raportul
$from    = 'no-reply@esthetiquestudio.ro';  // <<-- ideal o adresă de pe domeniul tău

// praguri pentru alerte
$minVisitsToSend       = 0;   // număr minim de vizite azi ca să se trimită email (0 = trimite mereu)
$highTrafficThreshold  = 10;  // dacă azi sunt >= 10 vizite -> ALERTĂ trafic mare în subiect

// =====================================

// Fisierele noastre de date (deja folosite de contor & raport)
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

// === LOG PE ZILE ===
$perDay = [];

if (file_exists($logFile)) {
    $lines = @file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lines !== false) {
        foreach ($lines as $line) {
            $d = trim($line);
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

$today      = date('Y-m-d');
$yesterday  = date('Y-m-d', strtotime('-1 day'));
$todayCount = $perDay[$today] ?? 0;
$yestCount  = $perDay[$yesterday] ?? 0;

// ultimele 7 zile (inclusiv azi)
$last7Count = 0;
for ($i = 0; $i < 7; $i++) {
    $d = date('Y-m-d', strtotime("-$i days"));
    $last7Count += $perDay[$d] ?? 0;
}

// pregătim un mic tabel text pentru ultimele 7 zile
$daysForTable = 7;
$linesTable   = [];

for ($i = 0; $i < $daysForTable; $i++) {
    $d   = date('Y-m-d', strtotime("-$i days"));
    $cnt = $perDay[$d] ?? 0;
    $linesTable[] = sprintf(
        "%s : %d",
        date('d.m.Y', strtotime($d)),
        $cnt
    );
}
$linesTable = array_reverse($linesTable); // cele mai vechi primele

// === LOGICĂ "DEȘTEAPTĂ": trimitem sau nu trimitem? ===

if ($minVisitsToSend > 0 && $todayCount < $minVisitsToSend) {
    // Nu trimitem mail, azi nu s-a atins pragul minim
    $msg = "Nu trimit email: astăzi sunt doar {$todayCount} vizite (prag minim: {$minVisitsToSend}).";

    if (php_sapi_name() === 'cli') {
        echo $msg . "\n";
    } else {
        echo $msg;
    }
    exit;
}

// === SUBIECT EMAIL (normal sau ALERTĂ) ===
$baseSubject = 'Raport Epilare Laser – ' . date('d.m.Y');
if ($todayCount >= $highTrafficThreshold) {
    $subject = '[ALERTĂ trafic mare] ' . $baseSubject;
} else {
    $subject = '[Esthetique Studio] ' . $baseSubject;
}

// === CONSTRUIRE CORP EMAIL (text simplu) ===
$diff        = $todayCount - $yestCount;
$diffSign    = ($diff > 0) ? '+' : (($diff < 0) ? '-' : '0');
$diffAbs     = abs($diff);
$diffMessage = '';

if ($diff > 0) {
    $diffMessage = "Traficul de azi este MAI MARE cu {$diffAbs} vizite față de ieri.";
} elseif ($diff < 0) {
    $diffMessage = "Traficul de azi este MAI MIC cu {$diffAbs} vizite față de ieri.";
} else {
    $diffMessage = "Traficul de azi este EGAL cu cel de ieri.";
}

$bodyLines = [];

$bodyLines[] = "Raport vizite – Epilare Laser Brașov";
$bodyLines[] = str_repeat("=", 40);
$bodyLines[] = "";
$bodyLines[] = "Total vizualizari salvate: " . number_format($count, 0, ',', '.');
$bodyLines[] = "Vizite azi (" . date('d.m.Y') . "): " . $todayCount;
$bodyLines[] = "Vizite ieri (" . date('d.m.Y', strtotime($yesterday)) . "): " . $yestCount;
$bodyLines[] = "Vizite in ultimele 7 zile: " . $last7Count;
$bodyLines[] = "";
$bodyLines[] = "Comparație azi vs ieri: {$diffMessage}";
$bodyLines[] = "Diferență numerică: {$diffSign}{$diffAbs}";
$bodyLines[] = "";

if ($lastModified !== null) {
    $bodyLines[] = "Ultima actualizare a contorului: " . date('d.m.Y H:i:s', $lastModified);
    $bodyLines[] = "";
}

$bodyLines[] = "Ultimele 7 zile (data : vizite):";
foreach ($linesTable as $line) {
    $bodyLines[] = "  - " . $line;
}

$bodyLines[] = "";
$bodyLines[] = "Praguri curente:";
$bodyLines[] = "  - Min. vizite azi pentru a trimite email: {$minVisitsToSend}";
$bodyLines[] = "  - Prag 'trafic mare' (ALERTA): {$highTrafficThreshold} vizite/zi";
$bodyLines[] = "";
$bodyLines[] = "Acest raport a fost generat automat de scriptul raport-vizite-email.php.";
$bodyLines[] = "Fișiere folosite: epilare-laser-brasov-views.txt si epilare-laser-brasov-log.txt.";

$body = implode("\r\n", $bodyLines);

// === ANTETE EMAIL & TRIMITERE ===
$headers  = "From: Esthetique Studio <{$from}>\r\n";
$headers .= "Reply-To: {$from}\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

$ok = @mail($to, $subject, $body, $headers);

// Feedback simplu, util la testare
if (php_sapi_name() === 'cli') {
    echo $ok ? "Raport trimis cu succes.\n" : "Eroare la trimiterea raportului.\n";
} else {
    echo $ok ? "Raport trimis cu succes catre {$to}." : "Eroare la trimiterea raportului.";
}
