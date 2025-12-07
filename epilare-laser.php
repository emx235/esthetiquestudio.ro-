<?php
define("TITLE","Esthetique Studio Brasov | Epilare Laser");
define(
    "DESCRIPTION",
    "Epilare definitivă cu laser Derma Laser Pro Max, cu patru lungimi de undă (755nm, 808nm, 940nm, 1064nm), în Brașov. Axile, inghinal, picioare, full body – Esthetique Studio Brașov."
);
$custom_contact = true; // Semnalăm că vrem date speciale în footer

// Sursa unică de prețuri
include 'epilare_laser_prices.php';

include 'header.php';

/**
 * Helper pentru afișarea rândurilor dintr-un tabel
 *
 * @param array $keys  Lista de chei din $EPILARE_LASER_PRICES
 * @param array $all   Array-ul global cu prețuri
 */
if (!function_exists('render_epilare_rows')) {
    function render_epilare_rows(array $keys, array $all) {
        foreach ($keys as $key) {
            if (!isset($all[$key])) {
                continue;
            }
            $p = $all[$key];
            ?>
            <tr>
              <td><?php echo htmlspecialchars($p['label_table']); ?></td>
              <td>
                <del><?php echo (int)$p['old']; ?></del>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <strong><?php echo (int)$p['new']; ?></strong>
              </td>
            </tr>
            <?php
        }
    }
}
?>

<section class="header-img header-img-about-us"></section>

<section class="about-us bg-flower-2">
  <div class="container">
    <div class="wow fadeIn">
      <div class="title-with-btn" style="display:flex;align-items:center;justify-content:space-between;gap:12px;flex-wrap:wrap;">
        <h2 class="section-title" style="margin-bottom:0;">Epilare definitivă laser cu Derma Laser Pro Max</h2>
        <a href="/programare-online.php"
           style="display:inline-block;padding:5px 11px;border:1px solid #111;border-radius:8px;font-size:12px;text-decoration:none;color:#111;white-space:nowrap;">
          Programare online
        </a>
      </div>
      <div class="divider-short mb-50"></div>
    </div>

    <div class="row mb-40">
      <div class="col-xs-12 col-sm-6 wow fadeIn" data-wow-delay="0.2s">
        <p>
          La <strong>Esthetique Studio</strong> beneficiezi de epilare definitivă cu
          <strong>Derma Laser Pro Max</strong>, un aparat profesional cu <strong>patru lungimi de undă</strong>:
          755nm, 808nm, 940nm și 1064nm. Această combinație permite tratarea eficientă a
          diferitelor tipuri de piele și de fir de păr, cu rezultate stabile în timp.
        </p>

        <p>
          Scopul nostru este simplu: să scapi de grija epilatului clasic și să te bucuri de o
          piele fină și netedă pe termen lung, în condiții de confort și siguranță.
        </p>

        <ul>
          <li>Rezultate vizibile încă de la primele ședințe</li>
          <li>Potrivit atât pentru femei, cât și pentru bărbați</li>
          <li>Ședințe relativ rapide, cu disconfort minim</li>
          <li>Protocoale adaptate zonei tratate și tipului de piele</li>
        </ul>

        <h3>Cum funcționează epilarea definitivă cu laser</h3>
        <p>
          Laserul emite energie luminoasă concentrată, care este absorbită de pigmentul firului
          de păr și transformată în căldură la nivelul foliculului. Astfel, rădăcina firului
          de păr este afectată, iar creșterea este încetinită sau oprită.
        </p>

        <p>
          <strong>Derma Laser Pro Max</strong> lucrează cu 4 lungimi de undă, fiecare având un rol specific:
        </p>
        <ul>
          <li><strong>755 nm</strong> – eficientă pentru firele mai subțiri și pielea deschisă la culoare;</li>
          <li><strong>808 nm</strong> – standardul „de aur” în epilarea cu diodă, echilibru între eficiență și confort;</li>
          <li><strong>940 nm</strong> – pătrunde mai adânc, utilă pentru zone cu pilozitate mai densă;</li>
          <li><strong>1064 nm</strong> – indicată pentru pielea mai închisă la culoare și pentru fire mai groase.</li>
        </ul>

        <h3>Câte ședințe sunt necesare?</h3>
        <p>
          Numărul de ședințe variază de la o persoană la alta, în funcție de zona tratată,
          tipul de păr, fototipul de piele și eventualele influențe hormonale. În general:
        </p>
        <ul>
          <li>se recomandă <strong>aproximativ 6–8 ședințe</strong> pentru majoritatea zonelor;</li>
          <li>intervalul dintre ședințe este, de regulă, între <strong>4 și 8 săptămâni</strong>;</li>
          <li>în unele cazuri pot fi necesare ședințe de întreținere în timp.</li>
        </ul>

        <h3>Pentru cine este potrivită epilarea cu laser?</h3>
        <p>
          Epilarea definitivă cu laser este potrivită pentru majoritatea persoanelor care își
          doresc reducerea semnificativă sau eliminarea pilozității nedorite pe termen lung.
          Pot fi tratate zone precum:
        </p>
        <ul>
          <li>față (mustață, bărbie, favoriți – în funcție de caz);</li>
          <li>axile, brațe, piept, spate;</li>
          <li>abdomen, inghinal, bikini;</li>
          <li>coapse, gambe, picioare integral.</li>
        </ul>

        <p>
          Înainte de începerea tratamentului, discutăm istoricul tău și stabilim dacă procedura
          este potrivită pentru tine, precum și ce schemă de ședințe are sens în cazul tău.
        </p>

        <p style="margin-top:10px;font-size:0.95rem;color:#555;">
          Dacă ești din <strong>Brașov</strong> sau împrejurimi și vrei să vezi o prezentare dedicată locală
          (cu hartă, recomandări „înainte & după” și întrebări frecvente), poți vizita și
          <a href="/epilare-laser-brasov.php">pagina „Epilare definitivă laser Brașov – THE BEAUTY SIDE by Dentistul meu”</a>.
        </p>

        <h3>Programare și întrebări</h3>
        <p>
          Dacă ai întrebări legate de procedură sau nu ești sigur(ă) ce pachet ți se potrivește,
          ne poți contacta telefonic sau ne poți lăsa un mesaj prin pagina de
          <a href="/programare-online.php">programare online</a>, iar noi te vom suna înapoi
          pentru detalii.
        </p>
      </div>

      <div class="col-xs-12 col-sm-6 wow fadeIn" data-wow-delay="0.4s">
        <img src="images/DermaLaserProMax.jpg" alt="Epilare laser definitivă Derma Laser Pro Max" class="img-responsive img-rounded">
      </div>
    </div>

    <!-- ================= FEMEI / ȘEDINȚE ================= -->
    <div class="row mt-30">
      <div class="col-xs-12 wow fadeIn" data-wow-delay="0.3s">
        <h3 class="section-subtitle">Tarife epilare definitivă cu laser</h3>
        <p style="font-size:0.9rem;color:#555;margin-top:4px;margin-bottom:10px;">
          Tarifele de mai jos se aplică în salonul nostru din Brașov. Pentru informații despre locație,
          acces și prezentarea locală a serviciului, poți consulta și
          <a href="/epilare-laser-brasov.php">pagina dedicată epilării definitive laser în Brașov</a>.
        </p>

        <table width="362" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th><em>Femei / Ședințe</em></th>
              <th>Preț (RON)</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Ordinea rândurilor pentru tabelul FEMEI / ȘEDINȚE
            $femei_sedinte_keys = [
              'femei_mustata',
              'femei_perciuni',
              'femei_barbie',
              'femei_gat',

              'femei_axile',
              'femei_fese',
              'femei_umeri',
              'femei_lombar',

              'femei_linie_bikini',
              'femei_abdomen',
              'femei_pectoral',

              'femei_fata_total',
              'femei_brate_total',
              'femei_inghinal_total',

              'femei_antebrate',
              'femei_picioare_scurt',
              'femei_spate_total',
              'femei_picioare_total',
            ];
            render_epilare_rows($femei_sedinte_keys, $EPILARE_LASER_PRICES);
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- ================= BĂRBAȚI / ȘEDINȚE ================= -->
    <div class="row mt-30">
      <div class="col-xs-12 wow FadeIn" data-wow-delay="0.3s">
        <table width="365" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Bărbați / Ședințe</th>
              <th>Preț (RON)</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $barbati_sedinte_keys = [
              'barbati_mustata',
              'barbati_perciuni',
              'barbati_barbie',
              'barbati_gat',

              'barbati_axile',
              'barbati_fese',
              'barbati_umeri',
              'barbati_lombar',

              'barbati_antebrate',
              'barbati_abdomen',
              'barbati_pectoral',

              'barbati_fata_total',
              'barbati_brate_total',
              'barbati_picioare_scurt',
              'barbati_spate_total',
              'barbati_picioare',
            ];
            render_epilare_rows($barbati_sedinte_keys, $EPILARE_LASER_PRICES);
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- ================= PACHETE FEMEI / 4 + 2 ȘEDINȚE ================= -->
    <div class="row mt-30">
      <div class="col-xs-12 wow fadeIn" data-wow-delay="0.3s">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="243">Pachete femei / 4 + 2 Ședințe</th>
              <th width="98">Preț (RON)</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $pachete_femei_4x2_keys = [
              'pachet_femei_4x2_inghinal_total_axile',
              'pachet_femei_4x2_picioare_total_inghinal_total',
              'pachet_femei_4x2_semifull_body',
              'pachet_femei_4x2_full_body',
            ];
            render_epilare_rows($pachete_femei_4x2_keys, $EPILARE_LASER_PRICES);
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- ================= PACHETE FEMEI / 5 + 3 ȘEDINȚE ================= -->
    <div class="row mt-30">
      <div class="col-xs-12 wow fadeIn" data-wow-delay="0.3s">
        <table width="366" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="244">Pachete femei / 5 + 3 Ședințe</th>
              <th width="110">Preț (RON)</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $pachete_femei_5x3_keys = [
              'pachet_femei_5x3_inghinal_total_axile',
              'pachet_femei_5x3_picioare_total_inghinal_total',
              'pachet_femei_5x3_semifull_body',
              'pachet_femei_5x3_full_body',
            ];
            render_epilare_rows($pachete_femei_5x3_keys, $EPILARE_LASER_PRICES);
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- ================= PACHETE BĂRBAȚI / 4 + 2 ȘEDINȚE ================= -->
    <div class="row mt-30">
      <div class="col-xs-12 wow fadeIn" data-wow-delay="0.3s">
        <table width="361" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="244">Pachete Bărbați / 4 + 2 Ședințe</th>
              <th width="105">Preț (RON)</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $pachete_barbati_4x2_keys = [
              'pachet_barbati_4x2_fata_total_gat_axile',
              'pachet_barbati_4x2_axile_brate_total_pectoral',
              'pachet_barbati_4x2_spate_total_axile_pectoral',
            ];
            render_epilare_rows($pachete_barbati_4x2_keys, $EPILARE_LASER_PRICES);
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- ================= PACHETE BĂRBAȚI / 5 + 3 ȘEDINȚE ================= -->
    <div class="row mt-30">
      <div class="col-xs-12 wow fadeIn" data-wow-delay="0.3s">
        <table width="358" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="245">Pachete Bărbați / 5 + 3 Ședințe</th>
              <th width="101">Preț (RON)</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $pachete_barbati_5x3_keys = [
              'pachet_barbati_5x3_fata_total_gat_axile',
              'pachet_barbati_5x3_axile_brate_total_pectoral',
              'pachet_barbati_5x3_spate_total_axile_pectoral',
            ];
            render_epilare_rows($pachete_barbati_5x3_keys, $EPILARE_LASER_PRICES);
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- ================= PACHETE FEMEI / ȘEDINȚE ================= -->
    <div class="row mt-30">
      <div class="col-xs-12 wow fadeIn" data-wow-delay="0.3s">
        <table width="357" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="246">Pachete Femei / Ședințe</th>
              <th width="99">Preț (RON)</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $pachete_femei_sedinte_keys = [
              'pachet_femei_sedinte_inghinal_total_axile',
              'pachet_femei_sedinte_picioare_total_inghinal_total_axile',
              'pachet_femei_sedinte_semifull_body',
              'pachet_femei_sedinte_full_body',
            ];
            render_epilare_rows($pachete_femei_sedinte_keys, $EPILARE_LASER_PRICES);
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- ================= PACHETE BĂRBAȚI / ȘEDINȚE ================= -->
    <div class="row mt-30">
      <div class="col-xs-12 wow fadeIn" data-wow-delay="0.3s">
        <table width="354" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="246">Pachete Bărbați / Ședințe</th>
              <th width="96">Preț (RON)</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $pachete_barbati_sedinte_keys = [
              'pachet_barbati_sedinte_fata_total_gat_axile',
              'pachet_barbati_sedinte_axile_brate_total_pectoral',
              'pachet_barbati_sedinte_spate_total_axile_pectorali',
            ];
            render_epilare_rows($pachete_barbati_sedinte_keys, $EPILARE_LASER_PRICES);
            ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</section>

<?php include 'footer.php'; ?>
