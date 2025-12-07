<?php
// epilare-counter.php
// Incrementare total + log simplu pe zile, răspuns JSON pentru pagina publică.

header('Content-Type: application/json; charset=utf-8');

$counterFile = __DIR__ . '/epilare-laser-brasov-views.txt';
$logFile     = __DIR__ . '/epilare-laser-brasov-log.txt';

$count = 0;

if (is_writable(__DIR__)) {
    // === TOTAL ===
    if (!file_exists($counterFile)) {
        @file_put_contents($counterFile, '0');
    }

    $raw = @file_get_contents($counterFile);
    if ($raw !== false && is_numeric(trim($raw))) {
        $count = (int)trim($raw);
    }

    $count++; // incrementăm
    @file_put_contents($counterFile, (string)$count);

    // === LOG ZILNIC ===
    // scriem o linie cu data de azi (YYYY-MM-DD)
    $today = date('Y-m-d');
    @file_put_contents($logFile, $today . PHP_EOL, FILE_APPEND);

} else {
    // dacă nu putem scrie, întoarcem -1 ca semnal
    $count = -1;
}

echo json_encode(['count' => $count]);
