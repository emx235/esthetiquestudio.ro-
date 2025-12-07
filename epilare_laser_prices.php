<?php
/**
 * epilare_laser_prices.php
 *
 * Sursă unică de prețuri pentru epilare laser.
 * Folosită de:
 *  - epilare-laser.php  (tabelele de prețuri)
 *  - programare-online.php (tooltip-uri cu preț la serviciile selectabile)
 *
 * IMPORTANT:
 *  - când modifici un preț, îl schimbi DOAR aici;
 *  - restul paginilor doar citesc acest array.
 */

$EPILARE_LASER_PRICES = [

    // =======================
    // FEMEI – ZONE INDIVIDUALE (Tabel: Femei / Ședințe)
    // =======================

    'femei_mustata' => [
        'section'     => 'femei_sedinte',
        'label_table' => 'Mustata',
        'label_form'  => 'Femei – Mustata',
        'old'         => 120,
        'new'         => 90,
        'unit'        => 'lei / ședință',
    ],

    'femei_perciuni' => [
        'section'     => 'femei_sedinte',
        'label_table' => 'Perciuni',
        'label_form'  => 'Femei – Perciuni',
        'old'         => 120,
        'new'         => 90,
        'unit'        => 'lei / ședință',
    ],

    'femei_barbie' => [
        'section'     => 'femei_sedinte',
        'label_table' => 'Barbie',
        'label_form'  => 'Femei – Barbie',
        'old'         => 120,
        'new'         => 90,
        'unit'        => 'lei / ședință',
    ],

    'femei_gat' => [
        'section'     => 'femei_sedinte',
        'label_table' => 'Gat',
        'label_form'  => 'Femei – Gat',
        'old'         => 120,
        'new'         => 90,
        'unit'        => 'lei / ședință',
    ],

    'femei_axile' => [
        'section'     => 'femei_sedinte',
        'label_table' => 'Axile',
        'label_form'  => 'Femei – Axile',
        'old'         => 180,
        'new'         => 150,
        'unit'        => 'lei / ședință',
    ],

    'femei_fese' => [
        'section'     => 'femei_sedinte',
        'label_table' => 'Fese',
        'label_form'  => 'Femei – Fese',
        'old'         => 180,
        'new'         => 150,
        'unit'        => 'lei / ședință',
    ],

    'femei_umeri' => [
        'section'     => 'femei_sedinte',
        'label_table' => 'Umeri',
        'label_form'  => 'Femei – Umeri',
        'old'         => 180,
        'new'         => 150,
        'unit'        => 'lei / ședință',
    ],

    'femei_lombar' => [
        'section'     => 'femei_sedinte',
        'label_table' => 'Lombar',
        'label_form'  => 'Femei – Lombar',
        'old'         => 180,
        'new'         => 150,
        'unit'        => 'lei / ședință',
    ],

    'femei_linie_bikini' => [
        'section'     => 'femei_sedinte',
        'label_table' => 'Linie bikini',
        'label_form'  => 'Femei – Linie bikini',
        'old'         => 230,
        'new'         => 200,
        'unit'        => 'lei / ședință',
    ],

    'femei_abdomen' => [
        'section'     => 'femei_sedinte',
        'label_table' => 'Abdomen',
        'label_form'  => 'Femei – Abdomen',
        'old'         => 230,
        'new'         => 200,
        'unit'        => 'lei / ședință',
    ],

    'femei_pectoral' => [
        'section'     => 'femei_sedinte',
        'label_table' => 'Pectoral',
        'label_form'  => 'Femei – Pectoral',
        'old'         => 230,
        'new'         => 200,
        'unit'        => 'lei / ședință',
    ],

    'femei_fata_total' => [
        'section'     => 'femei_sedinte',
        'label_table' => 'Fata total',
        'label_form'  => 'Femei – Fata total',
        'old'         => 350,
        'new'         => 300,
        'unit'        => 'lei / ședință',
    ],

    'femei_brate_total' => [
        'section'     => 'femei_sedinte',
        'label_table' => 'Brate total',
        'label_form'  => 'Femei – Brate total',
        'old'         => 350,
        'new'         => 300,
        'unit'        => 'lei / ședință',
    ],

    'femei_inghinal_total' => [
        'section'     => 'femei_sedinte',
        'label_table' => 'Inghinal total',
        'label_form'  => 'Femei – Inghinal total',
        'old'         => 350,
        'new'         => 300,
        'unit'        => 'lei / ședință',
    ],

    'femei_antebrate' => [
        'section'     => 'femei_sedinte',
        'label_table' => 'Antebrate',
        'label_form'  => 'Femei – Antebrate',
        'old'         => 280,
        'new'         => 250,
        'unit'        => 'lei / ședință',
    ],

    'femei_picioare_scurt' => [
        'section'     => 'femei_sedinte',
        'label_table' => 'Picioare scurt',
        'label_form'  => 'Femei – Picioare scurt',
        'old'         => 450,
        'new'         => 400,
        'unit'        => 'lei / ședință',
    ],

    'femei_spate_total' => [
        'section'     => 'femei_sedinte',
        'label_table' => 'Spate total',
        'label_form'  => 'Femei – Spate total',
        'old'         => 550,
        'new'         => 500,
        'unit'        => 'lei / ședință',
    ],

    'femei_picioare_total' => [
        'section'     => 'femei_sedinte',
        'label_table' => 'Picioare total',
        'label_form'  => 'Femei – Picioare total',
        'old'         => 650,
        'new'         => 600,
        'unit'        => 'lei / ședință',
    ],


    // =======================
    // BĂRBAȚI – ZONE INDIVIDUALE (Tabel: Bărbați / Ședințe)
    // =======================

    'barbati_mustata' => [
        'section'     => 'barbati_sedinte',
        'label_table' => 'Mustata',
        'label_form'  => 'Bărbați – Mustata',
        'old'         => 120,
        'new'         => 100,
        'unit'        => 'lei / ședință',
    ],

    'barbati_perciuni' => [
        'section'     => 'barbati_sedinte',
        'label_table' => 'Perciuni',
        'label_form'  => 'Bărbați – Perciuni',
        'old'         => 120,
        'new'         => 100,
        'unit'        => 'lei / ședință',
    ],

    'barbati_barbie' => [
        'section'     => 'barbati_sedinte',
        'label_table' => 'Barbie',
        'label_form'  => 'Bărbați – Barbie',
        'old'         => 120,
        'new'         => 100,
        'unit'        => 'lei / ședință',
    ],

    'barbati_gat' => [
        'section'     => 'barbati_sedinte',
        'label_table' => 'Gat',
        'label_form'  => 'Bărbați – Gat',
        'old'         => 120,
        'new'         => 100,
        'unit'        => 'lei / ședință',
    ],

    'barbati_axile' => [
        'section'     => 'barbati_sedinte',
        'label_table' => 'Axile',
        'label_form'  => 'Bărbați – Axile',
        'old'         => 230,
        'new'         => 200,
        'unit'        => 'lei / ședință',
    ],

    'barbati_fese' => [
        'section'     => 'barbati_sedinte',
        'label_table' => 'Fese',
        'label_form'  => 'Bărbați – Fese',
        'old'         => 230,
        'new'         => 200,
        'unit'        => 'lei / ședință',
    ],

    'barbati_umeri' => [
        'section'     => 'barbati_sedinte',
        'label_table' => 'Umeri',
        'label_form'  => 'Bărbați – Umeri',
        'old'         => 230,
        'new'         => 200,
        'unit'        => 'lei / ședință',
    ],

    'barbati_lombar' => [
        'section'     => 'barbati_sedinte',
        'label_table' => 'Lombar',
        'label_form'  => 'Bărbați – Lombar',
        'old'         => 230,
        'new'         => 200,
        'unit'        => 'lei / ședință',
    ],

    'barbati_antebrate' => [
        'section'     => 'barbati_sedinte',
        'label_table' => 'Antebrate',
        'label_form'  => 'Bărbați – Antebrate',
        'old'         => 330,
        'new'         => 300,
        'unit'        => 'lei / ședință',
    ],

    'barbati_abdomen' => [
        'section'     => 'barbati_sedinte',
        'label_table' => 'Abdomen',
        'label_form'  => 'Bărbați – Abdomen',
        'old'         => 330,
        'new'         => 300,
        'unit'        => 'lei / ședință',
    ],

    'barbati_pectoral' => [
        'section'     => 'barbati_sedinte',
        'label_table' => 'Pectoral',
        'label_form'  => 'Bărbați – Pectoral',
        'old'         => 330,
        'new'         => 300,
        'unit'        => 'lei / ședință',
    ],

    'barbati_fata_total' => [
        'section'     => 'barbati_sedinte',
        'label_table' => 'Fata total',
        'label_form'  => 'Bărbați – Fata total',
        'old'         => 380,
        'new'         => 350,
        'unit'        => 'lei / ședință',
    ],

    'barbati_brate_total' => [
        'section'     => 'barbati_sedinte',
        'label_table' => 'Brate total',
        'label_form'  => 'Bărbați – Brate total',
        'old'         => 450,
        'new'         => 400,
        'unit'        => 'lei / ședință',
    ],

    'barbati_picioare_scurt' => [
        'section'     => 'barbati_sedinte',
        'label_table' => 'Picioare scurt',
        'label_form'  => 'Bărbați – Picioare scurt',
        'old'         => 550,
        'new'         => 500,
        'unit'        => 'lei / ședință',
    ],

    'barbati_spate_total' => [
        'section'     => 'barbati_sedinte',
        'label_table' => 'Spate total',
        'label_form'  => 'Bărbați – Spate total',
        'old'         => 700,
        'new'         => 650,
        'unit'        => 'lei / ședință',
    ],

    'barbati_picioare' => [
        'section'     => 'barbati_sedinte',
        'label_table' => 'Picioare',
        'label_form'  => 'Bărbați – Picioare',
        'old'         => 700,
        'new'         => 650,
        'unit'        => 'lei / ședință',
    ],


    // =======================
    // PACHETE FEMEI – 4 + 2 ȘEDINȚE
    // =======================

    'pachet_femei_4x2_inghinal_total_axile' => [
        'section'     => 'pachete_femei_4x2',
        'label_table' => 'Inghinal total axile',
        'label_form'  => 'Pachet Femei 4+2 – Inghinal total + Axile',
        'old'         => 2400,
        'new'         => 1440,
        'unit'        => 'lei (pachet 4+2 ședințe)',
    ],

    'pachet_femei_4x2_picioare_total_inghinal_total' => [
        'section'     => 'pachete_femei_4x2',
        'label_table' => 'Picioare total inghinal total',
        'label_form'  => 'Pachet Femei 4+2 – Picioare total + Inghinal total',
        'old'         => 4200,
        'new'         => 3000,
        'unit'        => 'lei (pachet 4+2 ședințe)',
    ],

    'pachet_femei_4x2_semifull_body' => [
        'section'     => 'pachete_femei_4x2',
        'label_table' => 'Semiful body (piciore total inghinal total axile - brate total)',
        'label_form'  => 'Pachet Femei 4+2 – Semifull body',
        'old'         => 4800,
        'new'         => 3500,
        'unit'        => 'lei (pachet 4+2 ședințe)',
    ],

    'pachet_femei_4x2_full_body' => [
        'section'     => 'pachete_femei_4x2',
        'label_table' => 'Full Body',
        'label_form'  => 'Pachet Femei 4+2 – Full Body',
        'old'         => 6000,
        'new'         => 4500,
        'unit'        => 'lei (pachet 4+2 ședințe)',
    ],


    // =======================
    // PACHETE FEMEI – 5 + 3 ȘEDINȚE
    // =======================

    'pachet_femei_5x3_inghinal_total_axile' => [
        'section'     => 'pachete_femei_5x3',
        'label_table' => 'Inghinal total axile',
        'label_form'  => 'Pachet Femei 5+3 – Inghinal total + Axile',
        'old'         => 2000,
        'new'         => 1800,
        'unit'        => 'lei (pachet 5+3 ședințe)',
    ],

    'pachet_femei_5x3_picioare_total_inghinal_total' => [
        'section'     => 'pachete_femei_5x3',
        'label_table' => 'Picioare total inghinal total',
        'label_form'  => 'Pachet Femei 5+3 – Picioare total + Inghinal total',
        'old'         => 5600,
        'new'         => 3500,
        'unit'        => 'lei (pachet 5+3 ședințe)',
    ],

    'pachet_femei_5x3_semifull_body' => [
        'section'     => 'pachete_femei_5x3',
        'label_table' => 'Semiful body (piciore total inghinal total axile - brate total)',
        'label_form'  => 'Pachet Femei 5+3 – Semifull body',
        'old'         => 6400,
        'new'         => 4500,
        'unit'        => 'lei (pachet 5+3 ședințe)',
    ],

    'pachet_femei_5x3_full_body' => [
        'section'     => 'pachete_femei_5x3',
        'label_table' => 'Full Body',
        'label_form'  => 'Pachet Femei 5+3 – Full Body',
        'old'         => 8000,
        'new'         => 5500,
        'unit'        => 'lei (pachet 5+3 ședințe)',
    ],


    // =======================
    // PACHETE BĂRBAȚI – 4 + 2 ȘEDINȚE
    // =======================

    'pachet_barbati_4x2_fata_total_gat_axile' => [
        'section'     => 'pachete_barbati_4x2',
        'label_table' => 'Fata total Gat + axile',
        'label_form'  => 'Pachet Bărbați 4+2 – Fata total + Gat + Axile',
        'old'         => 3000,
        'new'         => 2500,
        'unit'        => 'lei (pachet 4+2 ședințe)',
    ],

    'pachet_barbati_4x2_axile_brate_total_pectoral' => [
        'section'     => 'pachete_barbati_4x2',
        'label_table' => 'Axile Brate total Pectoral',
        'label_form'  => 'Pachet Bărbați 4+2 – Axile + Brate total + Pectoral',
        'old'         => 4200,
        'new'         => 3500,
        'unit'        => 'lei (pachet 4+2 ședințe)',
    ],

    'pachet_barbati_4x2_spate_total_axile_pectoral' => [
        'section'     => 'pachete_barbati_4x2',
        'label_table' => 'Spate total Axile Pectoral',
        'label_form'  => 'Pachet Bărbați 4+2 – Spate total + Axile + Pectoral',
        'old'         => 2400,
        'new'         => 1800,
        'unit'        => 'lei (pachet 4+2 ședințe)',
    ],


    // =======================
    // PACHETE BĂRBAȚI – 5 + 3 ȘEDINȚE
    // =======================

    'pachet_barbati_5x3_fata_total_gat_axile' => [
        'section'     => 'pachete_barbati_5x3',
        'label_table' => 'Fata total Gat + axile',
        'label_form'  => 'Pachet Bărbați 5+3 – Fata total + Gat + Axile',
        'old'         => 4000,
        'new'         => 3200,
        'unit'        => 'lei (pachet 5+3 ședințe)',
    ],

    'pachet_barbati_5x3_axile_brate_total_pectoral' => [
        'section'     => 'pachete_barbati_5x3',
        'label_table' => 'Axile Brate total Pectoral',
        'label_form'  => 'Pachet Bărbați 5+3 – Axile + Brate total + Pectoral',
        'old'         => 3600,
        'new'         => 3300,
        'unit'        => 'lei (pachet 5+3 ședințe)',
    ],

    'pachet_barbati_5x3_spate_total_axile_pectoral' => [
        'section'     => 'pachete_barbati_5x3',
        'label_table' => 'Spate total Axile Pectoral',
        'label_form'  => 'Pachet Bărbați 5+3 – Spate total + Axile + Pectoral',
        'old'         => 7200,
        'new'         => 4700,
        'unit'        => 'lei (pachet 5+3 ședințe)',
    ],


    // =======================
    // PACHETE FEMEI – / ȘEDINȚE (tabel simplu)
    // =======================

    'pachet_femei_sedinte_inghinal_total_axile' => [
        'section'     => 'pachete_femei_sedinte',
        'label_table' => 'Inghinal total + Axile',
        'label_form'  => 'Pachet Femei – Inghinal total + Axile',
        'old'         => 450,
        'new'         => 350,
        'unit'        => 'lei / ședință (pachet)',
    ],

    'pachet_femei_sedinte_picioare_total_inghinal_total_axile' => [
        'section'     => 'pachete_femei_sedinte',
        'label_table' => 'Picioare total + Inghinal total + Axile',
        'label_form'  => 'Pachet Femei – Picioare total + Inghinal total + Axile',
        'old'         => 1050,
        'new'         => 700,
        'unit'        => 'lei / ședință (pachet)',
    ],

    'pachet_femei_sedinte_semifull_body' => [
        'section'     => 'pachete_femei_sedinte',
        'label_table' => 'Semifull body (picioare total + inghinal total + Axile + Brate)',
        'label_form'  => 'Pachet Femei – Semifull body',
        'old'         => 4300,
        'new'         => 800,
        'unit'        => 'lei / ședință (pachet)',
    ],

    'pachet_femei_sedinte_full_body' => [
        'section'     => 'pachete_femei_sedinte',
        'label_table' => 'Full Body',
        'label_form'  => 'Pachet Femei – Full Body',
        'old'         => 2500,
        'new'         => 1000,
        'unit'        => 'lei / ședință (pachet)',
    ],


    // =======================
    // PACHETE BĂRBAȚI – / ȘEDINȚE (tabel simplu)
    // =======================

    'pachet_barbati_sedinte_fata_total_gat_axile' => [
        'section'     => 'pachete_barbati_sedinte',
        'label_table' => 'Fata total + Gat + Axile',
        'label_form'  => 'Pachet Bărbați – Fata total + Gat + Axile',
        'old'         => 650,
        'new'         => 500,
        'unit'        => 'lei / ședință (pachet)',
    ],

    'pachet_barbati_sedinte_axile_brate_total_pectoral' => [
        'section'     => 'pachete_barbati_sedinte',
        'label_table' => 'Axile + Brate total + Pectoral',
        'label_form'  => 'Pachet Bărbați – Axile + Brate total + Pectoral',
        'old'         => 900,
        'new'         => 700,
        'unit'        => 'lei / ședință (pachet)',
    ],

    'pachet_barbati_sedinte_spate_total_axile_pectorali' => [
        'section'     => 'pachete_barbati_sedinte',
        'label_table' => 'Spate total + Axile + Pectorali',
        'label_form'  => 'Pachet Bărbați – Spate total + Axile + Pectorali',
        'old'         => 1050,
        'new'         => 900,
        'unit'        => 'lei / ședință (pachet)',
    ],

];
