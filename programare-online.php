<?php
// =================== CONFIG ===================
define("TITLE", "Programare online - THE BEAUTY SIDE by Dentistul meu");
define(
    "DESCRIPTION",
    "Solicită o programare online la THE BEAUTY SIDE by Dentistul meu. Alege serviciul, ziua preferată și modul în care vrei să fii contactat(ă)."
);
define(
    "PAGE_NOTICE",
    "Solicitarea de programare este confirmată doar după ce te contactăm noi pentru stabilirea orei exacte."
);
define("SITE_BRAND", "THE BEAUTY SIDE by Dentistul meu");

// Sursa unică de prețuri pentru epilare laser
include 'epilare_laser_prices.php';

// Map de prețuri pentru calcul server-side
$EPILARE_LASER_PRICE_MAP = [];
if (!empty($EPILARE_LASER_PRICES) && is_array($EPILARE_LASER_PRICES)) {
    foreach ($EPILARE_LASER_PRICES as $item) {
        if (!empty($item['label_form'])) {
            $EPILARE_LASER_PRICE_MAP[$item['label_form']] = (float)$item['new'];
        }
    }
}

// Helper: extrage numele serviciilor din textarea (fără linia de total)
if (!function_exists('epilare_extract_services')) {
    function epilare_extract_services($raw)
    {
        $services = [];
        $raw = trim((string)$raw);
        if ($raw === '') {
            return $services;
        }

        $lines = preg_split('/\r\n|\r|\n/', $raw);
        $clean = [];
        foreach ($lines as $line) {
            $t = trim($line);
            if ($t === '') {
                continue;
            }
            $lower = mb_strtolower($t, 'UTF-8');
            if (strpos($lower, 'total estimativ:') === 0) {
                continue;
            }
            if ($t === '---') {
                continue;
            }
            $clean[] = $t;
        }

        if (!$clean) {
            return $services;
        }

        $joined = implode(' ', $clean);
        $parts  = explode(',', $joined);

        foreach ($parts as $p) {
            $s = trim($p);
            if ($s !== '') {
                $services[] = $s;
            }
        }

        return $services;
    }
}

// Helper: calculează totalul pe baza serviciilor și a hărții de prețuri
if (!function_exists('epilare_calc_total')) {
    function epilare_calc_total(array $services, array $price_map)
    {
        $total = 0.0;
        foreach ($services as $name) {
            if (isset($price_map[$name])) {
                $total += (float)$price_map[$name];
            }
        }
        return $total;
    }
}

// ADRESA TA DE EMAIL (MODIFICĂ AICI!)
// Poți pune mai multe adrese separate prin virgulă, de ex.: "a@x.ro, b@y.ro"
$to_email = "adriana@esthetiquestudio.ro, contact@beautyside.ro";

// =================== LOGICĂ FORMULAR ===================
$errors = [];
$success_message = "";

$values = [
    'nume'           => '',
    'telefon'        => '',
    'email'          => '',
    'canal'          => 'WhatsApp',
    'serviciu'       => '',
    'data_preferata' => '',
    'interval'       => 'Orice',
    'mesaj'          => '',
    'gdpr'           => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitizare valori
    foreach ($values as $key => $val) {
        if (isset($_POST[$key])) {
            $values[$key] = trim((string)$_POST[$key]);
        }
    }

    // Validări simple
    if ($values['nume'] === '') {
        $errors['nume'] = "Te rugăm să completezi numele.";
    }

    if ($values['telefon'] === '') {
        $errors['telefon'] = "Te rugăm să lași un număr de telefon.";
    }

    // Email e opțional, dar dacă e completat, verificăm formatul
    if ($values['email'] !== '' && !filter_var($values['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Formatul adresei de email nu pare valid.";
    }

    if ($values['serviciu'] === '') {
        $errors['serviciu'] = "Alege sau scrie cel puțin un tip de serviciu.";
    }

    if ($values['gdpr'] !== '1') {
        $errors['gdpr'] = "Trebuie să îți dai acordul pentru prelucrarea datelor pentru a trimite solicitarea.";
    }

    // Dacă nu sunt erori, trimitem email
    if (empty($errors)) {

        // Calculăm totalul estimativ pe server
        $services_for_total = epilare_extract_services($values['serviciu']);
        $total_estimativ    = epilare_calc_total($services_for_total, $EPILARE_LASER_PRICE_MAP);

        // Subiect corect codificat pentru UTF-8
        $subject_text = "Cerere nouă de programare - THE BEAUTY SIDE";
        $subject      = "=?UTF-8?B?" . base64_encode($subject_text) . "?=";

        $body = "Ai primit o cerere nouă de programare:\n\n"
              . "Nume: " . $values['nume'] . "\n"
              . "Telefon: " . $values['telefon'] . "\n"
              . "Email: " . ($values['email'] ?: 'nu a fost completat') . "\n"
              . "Canal preferat de contact: " . $values['canal'] . "\n"
              . "Serviciu / zone dorite:\n" . $values['serviciu'] . "\n\n";

        if ($total_estimativ > 0) {
            $body .= "Total estimativ servicii (calculat automat): " . $total_estimativ . " RON\n\n";
        } else {
            $body .= "Total estimativ servicii: n/a\n\n";
        }

        $body .= "Data preferată: " . ($values['data_preferata'] ?: 'nu a fost specificată') . "\n"
               . "Interval orar preferat: " . $values['interval'] . "\n"
               . "Mesaj suplimentar:\n" . ($values['mesaj'] ?: '- fără mesaj -') . "\n\n"
               . "Notă: Programarea este valabilă doar după ce este confirmată de către salon.";

        // Header-uri simple, dar cu charset setat corect
        $headers  = "From: THE BEAUTY SIDE <no-reply@" . $_SERVER['SERVER_NAME'] . ">\r\n";

        if ($values['email'] !== '') {
            $headers .= "Reply-To: " . $values['email'] . "\r\n";
        }

        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $headers .= "Content-Transfer-Encoding: 8bit\r\n";

        // Trimitem email
        $mail_sent = @mail($to_email, $subject, $body, $headers);

        if ($mail_sent) {
            $success_message = "Solicitarea ta de programare a fost trimisă. Te vom contacta pentru confirmare.";

            // Resetăm valorile din formular
            $values = [
                'nume'           => '',
                'telefon'        => '',
                'email'          => '',
                'canal'          => 'WhatsApp',
                'serviciu'       => '',
                'data_preferata' => '',
                'interval'       => 'Orice',
                'mesaj'          => '',
                'gdpr'           => ''
            ];
        } else {
            $errors['global'] = "A apărut o problemă la trimiterea cererii. Te rugăm să încerci din nou sau să ne contactezi telefonic.";
        }
    }
}

// =================== HEADER ===================
include 'header_minimal.php';
?>

<main class="page-local container programare-online-page">

  <nav class="breadcrumb" aria-label="breadcrumb">
    <a href="/index.php">Acasă</a> <span>/</span>
    <span>Programare online</span>
  </nav>

  <section class="booking-hero">
    <h1 class="booking-title">Programare online</h1>
    <p class="booking-subtitle">
      Completează formularul de mai jos, iar noi revenim cu un mesaj sau un apel pentru a-ți confirma
      ziua și ora programării. Programarea este validă doar după confirmarea din partea noastră.
    </p>
  </section>

  <section class="booking-form-section">
    <?php if (!empty($errors['global'])): ?>
      <div class="alert alert-error">
        <?php echo htmlspecialchars($errors['global']); ?>
      </div>
    <?php endif; ?>

    <?php if ($success_message): ?>
      <div class="alert alert-success">
        <?php echo htmlspecialchars($success_message); ?>
      </div>
    <?php endif; ?>

    <form method="post" class="booking-form" novalidate>
      <div class="form-grid">
        <!-- Col stânga -->
        <div>
          <div class="form-group">
            <label for="nume">Nume complet <span class="req">*</span></label>
            <input type="text" id="nume" name="nume"
                   value="<?php echo htmlspecialchars($values['nume']); ?>"
                   required>
            <?php if (!empty($errors['nume'])): ?>
              <p class="field-error"><?php echo htmlspecialchars($errors['nume']); ?></p>
            <?php endif; ?>
          </div>

          <div class="form-group">
            <label for="telefon">Telefon <span class="req">*</span></label>
            <input type="tel" id="telefon" name="telefon"
                   placeholder="Ex: 07xx xxx xxx"
                   value="<?php echo htmlspecialchars($values['telefon']); ?>"
                   required>
            <?php if (!empty($errors['telefon'])): ?>
              <p class="field-error"><?php echo htmlspecialchars($errors['telefon']); ?></p>
            <?php endif; ?>
          </div>

          <div class="form-group">
            <label for="email">Email (opțional)</label>
            <input type="email" id="email" name="email"
                   value="<?php echo htmlspecialchars($values['email']); ?>">
            <?php if (!empty($errors['email'])): ?>
              <p class="field-error"><?php echo htmlspecialchars($errors['email']); ?></p>
            <?php endif; ?>
          </div>

          <div class="form-group">
            <label for="canal">Cum preferi să te contactăm?</label>
            <select id="canal" name="canal">
              <option value="WhatsApp" <?php echo $values['canal']==='WhatsApp' ? 'selected' : ''; ?>>WhatsApp</option>
              <option value="Telefon"  <?php echo $values['canal']==='Telefon'  ? 'selected' : ''; ?>>Telefon</option>
              <option value="Email"    <?php echo $values['canal']==='Email'    ? 'selected' : ''; ?>>Email</option>
              <option value="Orice"    <?php echo $values['canal']==='Orice'    ? 'selected' : ''; ?>>Orice variantă</option>
            </select>
          </div>

          <!-- MUTATE AICI: Zi, interval, mesaj suplimentar -->
          <div class="form-group">
            <label for="data_preferata">Zi preferată (orientativ)</label>
            <input type="date" id="data_preferata" name="data_preferata"
                   value="<?php echo htmlspecialchars($values['data_preferata']); ?>">
          </div>

          <div class="form-group">
            <label for="interval">Interval orar preferat</label>
            <select id="interval" name="interval">
              <option value="Orice"       <?php echo $values['interval']==='Orice' ? 'selected' : ''; ?>>Orice</option>
              <option value="Dimineața"   <?php echo $values['interval']==='Dimineața' ? 'selected' : ''; ?>>Dimineața</option>
              <option value="După-amiaza" <?php echo $values['interval']==='După-amiaza' ? 'selected' : ''; ?>>După-amiaza</option>
              <option value="Seara"       <?php echo $values['interval']==='Seara' ? 'selected' : ''; ?>>Seara</option>
            </select>
          </div>

          <div class="form-group">
            <label for="mesaj">Mesaj suplimentar (opțional)</label>
            <textarea id="mesaj" name="mesaj" rows="3"
                      placeholder="Ex: prefer să nu fiu sunat(ă) după ora 18:00, întrebări, clarificări etc."><?php
              echo htmlspecialchars($values['mesaj']);
            ?></textarea>
          </div>

          <!-- IMAGINE DERMA LASER PRO SUB MESAJ SUPLIMENTAR -->
          <div class="form-group derma-laser-image-group">
            <img
              src="/images/Derma_Laser_Pro.svg"
              alt="Aparat Derma Laser Pro - ilustrație"
              class="derma-laser-illustration"
            >
          </div>
        </div>

        <!-- Col dreapta -->
        <div>
          <div class="form-group">
            <label for="serviciu">Serviciu / zone dorite <span class="req">*</span></label>

            <p class="service-tags-label">
              Poți selecta direct din lista de mai jos; la click se adaugă automat în câmpul de mai jos.
            </p>

            <!-- LISTĂ SELECTABILĂ CU SERVICII (sincronizată cu epilare-laser.php prin epilare_laser_prices.php) -->
            <div class="service-tags">
              <!-- Femei – zone individuale -->
              <span class="service-tags-group">Femei – zone individuale</span>
              <button type="button" data-service="Femei – Mustata">Femei – Mustata</button>
              <button type="button" data-service="Femei – Perciuni">Femei – Perciuni</button>
              <button type="button" data-service="Femei – Barbie">Femei – Barbie</button>
              <button type="button" data-service="Femei – Gat">Femei – Gat</button>
              <button type="button" data-service="Femei – Axile">Femei – Axile</button>
              <button type="button" data-service="Femei – Fese">Femei – Fese</button>
              <button type="button" data-service="Femei – Umeri">Femei – Umeri</button>
              <button type="button" data-service="Femei – Lombar">Femei – Lombar</button>
              <button type="button" data-service="Femei – Linie bikini">Femei – Linie bikini</button>
              <button type="button" data-service="Femei – Abdomen">Femei – Abdomen</button>
              <button type="button" data-service="Femei – Pectoral">Femei – Pectoral</button>
              <button type="button" data-service="Femei – Fata total">Femei – Fata total</button>
              <button type="button" data-service="Femei – Brate total">Femei – Brate total</button>
              <button type="button" data-service="Femei – Inghinal total">Femei – Inghinal total</button>
              <button type="button" data-service="Femei – Antebrate">Femei – Antebrate</button>
              <button type="button" data-service="Femei – Picioare scurt">Femei – Picioare scurt</button>
              <button type="button" data-service="Femei – Spate total">Femei – Spate total</button>
              <button type="button" data-service="Femei – Picioare total">Femei – Picioare total</button>

              <!-- Bărbați – zone individuale -->
              <span class="service-tags-group">Bărbați – zone individuale</span>
              <button type="button" data-service="Bărbați – Mustata">Bărbați – Mustata</button>
              <button type="button" data-service="Bărbați – Perciuni">Bărbați – Perciuni</button>
              <button type="button" data-service="Bărbați – Barbie">Bărbați – Barbie</button>
              <button type="button" data-service="Bărbați – Gat">Bărbați – Gat</button>
              <button type="button" data-service="Bărbați – Axile">Bărbați – Axile</button>
              <button type="button" data-service="Bărbați – Fese">Bărbați – Fese</button>
              <button type="button" data-service="Bărbați – Umeri">Bărbați – Umeri</button>
              <button type="button" data-service="Bărbați – Lombar">Bărbați – Lombar</button>
              <button type="button" data-service="Bărbați – Antebrate">Bărbați – Antebrate</button>
              <button type="button" data-service="Bărbați – Abdomen">Bărbați – Abdomen</button>
              <button type="button" data-service="Bărbați – Pectoral">Bărbați – Pectoral</button>
              <button type="button" data-service="Bărbați – Fata total">Bărbați – Fata total</button>
              <button type="button" data-service="Bărbați – Brate total">Bărbați – Brate total</button>
              <button type="button" data-service="Bărbați – Picioare scurt">Bărbați – Picioare scurt</button>
              <button type="button" data-service="Bărbați – Spate total">Bărbați – Spate total</button>
              <button type="button" data-service="Bărbați – Picioare">Bărbați – Picioare</button>

              <!-- Pachete Femei -->
              <span class="service-tags-group">Pachete Femei – 4 + 2 ședințe</span>
              <button type="button" data-service="Pachet Femei 4+2 – Inghinal total + Axile">Pachet Femei 4+2 – Inghinal total + Axile</button>
              <button type="button" data-service="Pachet Femei 4+2 – Picioare total + Inghinal total">Pachet Femei 4+2 – Picioare total + Inghinal total</button>
              <button type="button" data-service="Pachet Femei 4+2 – Semifull body">Pachet Femei 4+2 – Semifull body</button>
              <button type="button" data-service="Pachet Femei 4+2 – Full Body">Pachet Femei 4+2 – Full Body</button>

              <span class="service-tags-group">Pachete Femei – 5 + 3 ședințe</span>
              <button type="button" data-service="Pachet Femei 5+3 – Inghinal total + Axile">Pachet Femei 5+3 – Inghinal total + Axile</button>
              <button type="button" data-service="Pachet Femei 5+3 – Picioare total + Inghinal total">Pachet Femei 5+3 – Picioare total + Inghinal total</button>
              <button type="button" data-service="Pachet Femei 5+3 – Semifull body">Pachet Femei 5+3 – Semifull body</button>
              <button type="button" data-service="Pachet Femei 5+3 – Full Body">Pachet Femei 5+3 – Full Body</button>

              <!-- Pachete Bărbați -->
              <span class="service-tags-group">Pachete Bărbați – 4 + 2 ședințe</span>
              <button type="button" data-service="Pachet Bărbați 4+2 – Fata total + Gat + Axile">Pachet Bărbați 4+2 – Fata total + Gat + Axile</button>
              <button type="button" data-service="Pachet Bărbați 4+2 – Axile + Brate total + Pectoral">Pachet Bărbați 4+2 – Axile + Brate total + Pectoral</button>
              <button type="button" data-service="Pachet Bărbați 4+2 – Spate total + Axile + Pectoral">Pachet Bărbați 4+2 – Spate total + Axile + Pectoral</button>

              <span class="service-tags-group">Pachete Bărbați – 5 + 3 ședințe</span>
              <button type="button" data-service="Pachet Bărbați 5+3 – Fata total + Gat + Axile">Pachet Bărbați 5+3 – Fata total + Gat + Axile</button>
              <button type="button" data-service="Pachet Bărbați 5+3 – Axile + Brate total + Pectoral">Pachet Bărbați 5+3 – Axile + Brate total + Pectoral</button>
              <button type="button" data-service="Pachet Bărbați 5+3 – Spate total + Axile + Pectoral">Pachet Bărbați 5+3 – Spate total + Axile + Pectoral</button>

              <!-- Pachete Femei – alte ședințe -->
              <span class="service-tags-group">Pachete Femei (alte ședințe)</span>
              <button type="button" data-service="Pachet Femei – Inghinal total + Axile">Pachet Femei – Inghinal total + Axile</button>
              <button type="button" data-service="Pachet Femei – Picioare total + Inghinal total + Axile">Pachet Femei – Picioare total + Inghinal total + Axile</button>
              <button type="button" data-service="Pachet Femei – Semifull body">Pachet Femei – Semifull body</button>
              <button type="button" data-service="Pachet Femei – Full Body">Pachet Femei – Full Body</button>

              <!-- Pachete Bărbați – alte ședințe -->
              <span class="service-tags-group">Pachete Bărbați (alte ședințe)</span>
              <button type="button" data-service="Pachet Bărbați – Fata total + Gat + Axile">Pachet Bărbați – Fata total + Gat + Axile</button>
              <button type="button" data-service="Pachet Bărbați – Axile + Brate total + Pectoral">Pachet Bărbați – Axile + Brate total + Pectoral</button>
              <button type="button" data-service="Pachet Bărbați – Spate total + Axile + Pectorali">Pachet Bărbați – Spate total + Axile + Pectorali</button>
            </div>

            <!-- Micul text explicativ despre prețuri -->
            <p class="service-price-note">
              La selectarea unui serviciu, vei vedea prețul orientativ într-o etichetă deasupra butonului.
              Prețurile sunt sincronizate automat cu pagina
              <a href="/epilare-laser.php">Epilare Laser</a>. Totalul orientativ al serviciilor selectate
              este calculat și afișat mai jos, în aceeași casetă.
            </p>

            <textarea id="serviciu" name="serviciu" rows="3"
                      placeholder="Ex: Femei – Axile, Femei – Inghinal total, Pachet Femei 4+2 – Inghinal total + Axile"><?php
              echo htmlspecialchars($values['serviciu']);
            ?></textarea>
            <?php if (!empty($errors['serviciu'])): ?>
              <p class="field-error"><?php echo htmlspecialchars($errors['serviciu']); ?></p>
            <?php endif; ?>

            <!-- Text mic sub total -->
            <p class="service-total-note">
              Total orientativ, se confirmă la recepție.
            </p>
          </div>
        </div>
      </div>

      <div class="form-footer">
        <div class="form-group checkbox-group">
          <label>
            <input type="checkbox" name="gdpr" value="1" <?php echo $values['gdpr']==='1' ? 'checked' : ''; ?>>
            Sunt de acord ca datele mele să fie folosite pentru a fi contactat(ă) în legătură cu programarea.
          </label>
          <?php if (!empty($errors['gdpr'])): ?>
            <p class="field-error"><?php echo htmlspecialchars($errors['gdpr']); ?></p>
          <?php endif; ?>
        </div>

        <button type="submit" class="btn-submit">
          Trimite solicitarea de programare
        </button>

        <p class="small-note">
          Programarea devine valabilă doar după ce este confirmată de către salon (telefonic sau în scris).
        </p>
      </div>
    </form>
  </section>

  <!-- FAQ: Întrebări frecvente despre programarea online -->
  <section class="faq">
    <h2>Întrebări frecvente despre programarea online</h2>

    <div class="faq-item">
      <button type="button" class="faq-question">
        Cât de repede sunt contactat(ă) după ce trimit formularul?
        <span class="faq-toggle">+</span>
      </button>
      <div class="faq-answer">
        <p>De obicei revenim în <strong>maximum 24 de ore lucrătoare</strong>, prin canalul pe care l-ai ales (WhatsApp, telefon sau email).
          În perioadele foarte aglomerate, timpul poate varia ușor, dar încercăm să răspundem cât mai repede.</p>
      </div>
    </div>

    <div class="faq-item">
      <button type="button" class="faq-question">
        Programarea este confirmată automat după trimiterea formularului?
        <span class="faq-toggle">+</span>
      </button>
      <div class="faq-answer">
        <p>Formularul trimis reprezintă <strong>o solicitare de programare</strong>. Data și ora devin ferme
          doar după ce îți confirmăm noi telefonic sau în scris (WhatsApp / email).</p>
      </div>
    </div>

    <div class="faq-item">
      <button type="button" class="faq-question">
        Pot modifica sau anula o programare făcută online?
        <span class="faq-toggle">+</span>
      </button>
      <div class="faq-answer">
        <p>Da, ne poți contacta oricând prin <strong>telefon sau WhatsApp</strong> pentru a modifica sau anula programarea.
          Te rugăm doar, pe cât posibil, să ne anunți din timp, pentru a putea oferi locul altei persoane.</p>
      </div>
    </div>

    <div class="faq-item">
      <button type="button" class="faq-question">
        Pot face programare pentru mai multe persoane în același timp?
        <span class="faq-toggle">+</span>
      </button>
      <div class="faq-answer">
        <p>Da. Menționează în câmpul „<strong>Serviciu / zone dorite</strong>” sau în „<strong>Mesaj suplimentar</strong>”
          pentru cine sunt programările (ex: două persoane, zone diferite), iar noi îți propunem un orar potrivit.</p>
      </div>
    </div>

  </section>
</main>

<style>
  .container {
    max-width: 1100px;
    margin: 0 auto;
    padding-inline: 1.25rem;
  }

  .programare-online-page {
    padding-top: 4rem;
    padding-bottom: 3rem;
  }

  .booking-hero {
    margin-bottom: 1.5rem;
  }

  .booking-title {
    font-size: clamp(2rem, 2.6vw, 2.5rem);
    font-weight: 800;
    color: #0f172a;
    margin-bottom: 0.4rem;
  }

  .booking-subtitle {
    font-size: 0.96rem;
    color: #475569;
    max-width: 640px;
  }

  .booking-form-section {
    background: #ffffff;
    border-radius: 18px;
    padding: 1.5rem;
    box-shadow: 0 18px 45px rgba(15, 23, 42, 0.06);
    border: 1px solid rgba(148, 163, 184, 0.35);
  }

  .alert {
    border-radius: 10px;
    padding: 0.7rem 0.9rem;
    margin-bottom: 1rem;
    font-size: 0.9rem;
  }

  .alert-error {
    background: #fef2f2;
    color: #b91c1c;
    border: 1px solid #fecaca;
  }

  .alert-success {
    background: #ecfdf3;
    color: #166534;
    border: 1px solid #bbf7d0;
  }

  .booking-form {
    margin-top: 0.5rem;
  }

  .form-grid {
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
    gap: 1.3rem;
  }

  @media (max-width: 900px) {
    .form-grid {
      grid-template-columns: minmax(0, 1fr);
    }
  }

  .form-group {
    margin-bottom: 0.8rem;
  }

  label {
    display: block;
    font-size: 0.88rem;
    font-weight: 600;
    color: #0f172a;
    margin-bottom: 0.25rem;
  }

  .req {
    color: #b91c1c;
  }

  input[type="text"],
  input[type="tel"],
  input[type="email"],
  input[type="date"],
  select,
  textarea {
    width: 100%;
    border-radius: 10px;
    border: 1px solid #e5e7eb;
    padding: 0.55rem 0.65rem;
    font-size: 0.9rem;
    font-family: inherit;
    box-sizing: border-box;
    background: #f9fafb;
  }

  textarea {
    resize: vertical;
  }

  input:focus,
  select:focus,
  textarea:focus {
    outline: none;
    border-color: #0f172a;
    box-shadow: 0 0 0 1px #0f172a15;
    background: #ffffff;
  }

  .field-error {
    margin: 0.2rem 0 0;
    font-size: 0.8rem;
    color: #b91c1c;
  }

  .form-footer {
    margin-top: 1.1rem;
    border-top: 1px dashed #e5e7eb;
    padding-top: 0.9rem;
  }

  .checkbox-group label {
    display: flex;
    align-items: flex-start;
    gap: 0.45rem;
    font-size: 0.85rem;
    font-weight: 500;
    color: #374151;
  }

  .checkbox-group input[type="checkbox"] {
    margin-top: 0.1rem;
  }

  .btn-submit {
    margin-top: 0.8rem;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0.7rem 1.7rem;
    border-radius: 999px;
    border: none;
    background: #0f172a;
    color: #f9fafb;
    font-weight: 600;
    font-size: 0.94rem;
    cursor: pointer;
    box-shadow: 0 18px 40px rgba(15, 23, 42, 0.35);
  }

  .btn-submit:hover {
    transform: translateY(-1px);
    box-shadow: 0 22px 50px rgba(15, 23, 42, 0.45);
  }

  .small-note {
    margin-top: 0.5rem;
    font-size: 0.8rem;
    color: #6b7280;
  }

  /* === LISTA DE SERVICII SELECTABILE === */
  .service-tags-label {
    font-size: 0.8rem;
    color: #6b7280;
    margin-bottom: 0.35rem;
  }

  .service-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 0.35rem;
    margin-bottom: 0.35rem;
  }

  .service-tags-group {
    flex-basis: 100%;
    font-size: 0.8rem;
    font-weight: 600;
    margin-top: 0.35rem;
    margin-bottom: 0.05rem;
    color: #0f172a;
  }

  .service-tags button {
    border-radius: 999px;
    border: 1px solid #e5e7eb;
    background: #f9fafb;
    padding: 0.18rem 0.65rem;
    font-size: 0.78rem;
    cursor: pointer;
    color: #111827;
    transition: background 0.15s, border-color 0.15s, transform 0.1s;
  }

  .service-tags button:hover {
    border-color: #0f172a;
    background: #e5e7eb;
    transform: translateY(-1px);
  }

  .service-price-note{
    font-size:0.78rem;
    color:#6b7280;
    margin-bottom:0.4rem;
  }
  .service-price-note a{
    color:#0f172a;
    text-decoration:underline;
  }

  .service-total-note{
    margin-top:0.15rem;
    font-size:0.75rem;
    color:#fca5a5; /* roșu mai pal */
  }

  /* Breadcrumb mic */
  .breadcrumb{
    font-size:0.85rem;
    color:#666;
    margin-bottom:0.6rem;
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

  /* FAQ – întrebări frecvente */
  .faq{
    margin-top:1.8rem;
    padding:18px 20px;
    border-radius:18px;
    background:#fafafa;
    box-shadow:0 10px 26px rgba(0,0,0,0.06);
    border:1px solid rgba(148,163,184,0.45);
  }
  .faq h2{
    margin-top:0;
    margin-bottom:10px;
    text-align:left;
    font-size:1.2rem;
    color:#0f172a;
  }
  .faq-item + .faq-item{
    margin-top:8px;
  }
  .faq-question{
    width:100%;
    text-align:left;
    padding:10px 14px;
    border-radius:12px;
    border:1px solid #e5e7eb;
    background:#ffffff;
    font-size:0.95rem;
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
    font-size:0.9rem;
    color:#374151;
  }
  .faq-answer.open{
    padding-top:6px;
  }
  .faq-answer p{
    margin:0 0 10px;
  }

  /* Tooltip preț pentru servicii */
  .service-price-tooltip{
    position:absolute;
    padding:0.25rem 0.6rem;
    border-radius:999px;
    background:#0f172a;
    color:#f9fafb;
    font-size:0.75rem;
    line-height:1.2;
    white-space:nowrap;
    pointer-events:none;
    transform:translate(-50%, -120%);
    opacity:0;
    transition:opacity .15s ease, transform .15s ease;
    z-index:9999;
  }
  .service-price-tooltip.visible{
    opacity:1;
    transform:translate(-50%, -140%);
  }

  /* IMAGINEA DERMA LASER PRO SUB „MESAJ SUPLIMENTAR” */
  .derma-laser-image-group {
    margin-top: 0.5rem;
    text-align: center;
  }

  .derma-laser-illustration {
    max-width: 100%;
    height: auto;
    display: inline-block;
  }

  /* Ascundem imaginea Derma Laser Pro pe mobil */
  @media (max-width: 768px) {
    .derma-laser-image-group {
      display: none;
    }
  }
</style>

<script>
// completare automată servicii din lista de butoane + tooltip cu preț + total în textarea
(function() {
  var textarea  = document.getElementById('serviciu');
  var container = document.querySelector('.service-tags');
  if (!textarea || !container) return;

  // Harta de prețuri – generată automat din epilare_laser_prices.php
  var servicePrices = <?php
    $mapText = [];
    $mapVal  = [];
    if (!empty($EPILARE_LASER_PRICES) && is_array($EPILARE_LASER_PRICES)) {
        foreach ($EPILARE_LASER_PRICES as $item) {
            if (!empty($item['label_form'])) {
                $mapText[$item['label_form']] = $item['new'] . ' ' . $item['unit'];
                $mapVal[$item['label_form']]  = (float)$item['new'];
            }
        }
    }
    echo json_encode($mapText, JSON_UNESCAPED_UNICODE);
  ?> || {};

  var serviceValues = <?php
    echo json_encode($mapVal, JSON_UNESCAPED_UNICODE);
  ?> || {};

  var tooltip = null;
  var hideTooltipTimeout = null;

  function getTooltipElement() {
    if (!tooltip) {
      tooltip = document.createElement('div');
      tooltip.className = 'service-price-tooltip';
      document.body.appendChild(tooltip);
    }
    return tooltip;
  }

  function hideTooltip() {
    if (!tooltip) return;
    tooltip.classList.remove('visible');
  }

  function showTooltip(btn, isTouch) {
    var serviceName = btn.getAttribute('data-service');
    if (!serviceName) return;
    var priceText = servicePrices[serviceName];
    if (!priceText) return;

    var tt = getTooltipElement();
    tt.textContent = priceText;

    var rect   = btn.getBoundingClientRect();
    var scrollX = window.pageXOffset || document.documentElement.scrollLeft || 0;
    var scrollY = window.pageYOffset || document.documentElement.scrollTop  || 0;

    tt.style.left = (rect.left + rect.width / 2 + scrollX) + 'px';
    tt.style.top  = (rect.top + scrollY - 8) + 'px';

    tt.classList.add('visible');

    if (hideTooltipTimeout) {
      clearTimeout(hideTooltipTimeout);
    }
    if (isTouch) {
      hideTooltipTimeout = setTimeout(hideTooltip, 2000);
    }
  }

  // extragem numele serviciilor din textarea (fără linia de total)
  function extractServices(raw) {
    if (!raw) return [];
    var lines   = raw.split('\n');
    var cleaned = [];
    for (var i = 0; i < lines.length; i++) {
      var t  = lines[i].trim();
      if (!t) continue;
      var tl = t.toLowerCase();
      if (tl.indexOf('total estimativ:') === 0) continue;
      if (t === '---') continue;
      cleaned.push(t);
    }
    if (!cleaned.length) return [];
    var joined = cleaned.join(' ');
    var parts  = joined.split(',');
    var result = [];
    for (var j = 0; j < parts.length; j++) {
      var s = parts[j].trim();
      if (s) result.push(s);
    }
    return result;
  }

  function calcTotal(services) {
    var total = 0;
    if (!services || !services.length) return 0;
    for (var i = 0; i < services.length; i++) {
      var name = services[i];
      if (Object.prototype.hasOwnProperty.call(serviceValues, name)) {
        var v = parseFloat(serviceValues[name]);
        if (!isNaN(v)) {
          total += v;
        }
      }
    }
    return total;
  }

  function buildText(services, total) {
    var text = '';
    if (services && services.length) {
      text = services.join(', ');
    }
    if (total > 0 && services && services.length) {
      text += "\n---\nTotal estimativ: " + total + " RON";
    }
    return text;
  }

  function updateTotalFromTextarea() {
    var current  = textarea.value || '';
    var services = extractServices(current);
    var total    = calcTotal(services);
    var newText  = buildText(services, total);
    if (newText !== current) {
      textarea.value = newText;
    }
  }

  // click: adăugăm serviciul în textarea + recalc total
  container.addEventListener('click', function(e) {
    var btn = e.target.closest('button[data-service]');
    if (!btn) return;

    var value = btn.getAttribute('data-service');
    if (!value) return;

    var services = extractServices(textarea.value || '');

    // evităm duplicatele
    if (services.indexOf(value) !== -1) {
      textarea.focus();
      updateTotalFromTextarea();
      return;
    }

    services.push(value);
    var total = calcTotal(services);
    textarea.value = buildText(services, total);
    textarea.focus();
  });

  // Hover desktop – afișăm eticheta cu preț
  container.addEventListener('mouseover', function(e) {
    var btn = e.target.closest('button[data-service]');
    if (!btn) return;
    showTooltip(btn, false);
  });

  container.addEventListener('mouseout', function(e) {
    var btn = e.target.closest('button[data-service]');
    if (!btn) return;
    hideTooltip();
  });

  // Touch (mobil) – afișăm prețul la atingere
  container.addEventListener('touchstart', function(e) {
    var btn = e.target.closest('button[data-service]');
    if (!btn) return;
    showTooltip(btn, true);
  });

  // dacă utilizatorul modifică manual textarea, recalculăm totalul
  textarea.addEventListener('input', function() {
    updateTotalFromTextarea();
  });

  // recalculăm și la încărcarea paginii (ex: după validare cu erori)
  updateTotalFromTextarea();
})();

// FAQ accordion
(function(){
  var items = document.querySelectorAll('.faq-item');
  if (!items.length) return;

  items.forEach(function(item){
    var btn = item.querySelector('.faq-question');
    var ans = item.querySelector('.faq-answer');
    if(!btn || !ans) return;

    btn.addEventListener('click', function(){
      var isOpen = ans.classList.contains('open');
      // închidem toate
      items.forEach(function(it){
        var a = it.querySelector('.faq-answer');
        if(!a) return;
        a.classList.remove('open');
        a.style.maxHeight = null;
        var t = it.querySelector('.faq-toggle');
        if(t) t.textContent = '+';
      });
      // deschidem pe cel curent dacă nu era deja deschis
      if(!isOpen){
        ans.classList.add('open');
        ans.style.maxHeight = ans.scrollHeight + 'px';
        var toggle = item.querySelector('.faq-toggle');
        if(toggle) toggle.textContent = '−';
      }
    });
  });
})();

// GA4 – eveniment la trimiterea formularului
(function(){
  var form = document.querySelector('.booking-form');
  if(!form) return;

  form.addEventListener('submit', function(){
    try{
      if(window.gtag){
        window.gtag('event', 'submit_programare_online', {
          event_category: 'form',
          event_label: window.location.pathname
        });
      } else if(window.dataLayer){
        window.dataLayer.push({
          event: 'submit_programare_online',
          event_category: 'form',
          event_label: window.location.pathname
        });
      }
    }catch(e){}
  });
})();
</script>

<!-- JSON-LD pentru FAQPage -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "Cat de repede sunt contactat(a) dupa ce trimit formularul?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "De obicei revenim in maximum 24 de ore lucratoare, prin canalul ales (WhatsApp, telefon sau email). In perioade aglomerate, timpul poate varia usor, dar incercam sa raspundem cat mai repede."
      }
    },
    {
      "@type": "Question",
      "name": "Programarea este confirmata automat dupa trimiterea formularului?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Formularul reprezinta o solicitare de programare. Data si ora devin ferme doar dupa ce sunt confirmate de catre salon, telefonic sau in scris (WhatsApp / email)."
      }
    },
    {
      "@type": "Question",
      "name": "Pot modifica sau anula o programare facuta online?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Da. Ne poti contacta prin telefon sau WhatsApp pentru a modifica sau anula programarea. Ideal este sa ne anunti din timp, pentru a putea oferi locul altei persoane."
      }
    },
    {
      "@type": "Question",
      "name": "Pot face programare pentru mai multe persoane in acelasi timp?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Da. Mentioneaza in campul \"Serviciu / zone dorite\" sau in \"Mesaj suplimentar\" pentru cine sunt programarile, iar noi iti propunem un orar potrivit pentru toti."
      }
    }
  ]
}
</script>

<?php
// Footer comun
if (file_exists('footer.php')) {
    include 'footer.php';
}
?>
