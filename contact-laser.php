<?php
define("TITLE", "Esthetique Studio Brasov | Contact Epilare Laser");
define("DESCRIPTION", "Contact pentru epilare definitiva cu laser la Esthetique Studio Brasov.");
$custom_contact = true; // <-- această linie e esențială
include 'header.php';
?>


	<!-- <section class="header-img header-img-contact"></section> -->
	<section class="header-img header-img-epilare-laser"></section>


	<!-- section Contact -->
	<section class="sugaring bg-flower-1">
		<div class="container">
			<div class="wow fadeIn">
				<h2 class="section-title wow fadeIn">Contact Epilare Laser</h2>
				<div class="divider-short mb-50 "></div>
			</div>
			<p class="section-subtitle wow fadeIn">Pentru informatii va rugam sa ne sunati sau sa trimiteti formularul de mai jos completat.</p>
			<div class="row">
				<div class="col-xs-12 col-sm-5 col-md-4 col-md-offset-1 mb-30 wow fadeIn">
					<div class="contact-details mt-50">
						<h3><strong>Contact</strong></h3>
						<ul class="pl-20 list-unstyled ">
							<li>Brasov, cart. Darste, calea Bucuresti nr.250</li>
							<li>+40 722 538722</li>
							<li>adriana@esthetiquestudio.ro</li>
						</ul>	
						
						<h3><strong>Progaram cabinet Epilare Laser</strong></h3>
						<ul class="pl-20 list-unstyled">
							<li>Sambata:  10:00 -  16:00</li>
						</ul>	
					</div>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-6 mb-30 wow fadeIn">
					<div class="contact-form mt-50">
						<form id="contact-form" method="post">
							<div class="form-group row">
								<label for="name" class="col-sm-2 col-form-label text-right">Nume<sup>*</sup></label>
								<div class="col-sm-10">
									<input type="text" class="form-control each_input" id="name" name="name">
								</div>
							</div>
							<div class="form-group row">
								<label for="email" class="col-sm-2 col-form-label text-right">Email<sup>*</sup></label>
								<div class="col-sm-10">
									<input type="text" class="form-control each_input" id="email" name="email">
								</div>
							</div>
							<div class="form-group row">
								<label for="phone" class="col-sm-2 col-form-label text-right">Telefon<sup>*</sup></label>
								<div class="col-sm-10">
									<input type="text" class="form-control each_input" id="phone" name="phone">
								</div>
							</div>
							<div class="form-group row">
								<label for="message" class="col-sm-2 col-form-label text-right">Mesaj<sup>*</sup></label>
								<div class="col-sm-10">
									<textarea class="form-control each_input" id="message" rows="4" name="message"></textarea>
									<input id="field_terms" type="checkbox" required name="terms">
									<label for="field_terms">Prin utilizarea acestui formular sunteti de acord cu stocarea si manipularea datelor dvs. pe acest site web.</label>
								</div>
							</div>

							<!-- Actiuni: Trimite + WhatsApp smart -->
							<div class="form-actions row">
								<div class="col-sm-10 col-sm-offset-2">
									<button type="button" class="btn-send" id="submit-form">Trimite!</button>
									<a class="btn-whatsapp"
									   href="#"
									   id="wa-btn-laser"
									   data-wa-number="40722538722"
									   target="_blank" rel="noopener"
									   aria-label="Scrie pe WhatsApp Esthetique Studio">
										<span class="wa-ico" aria-hidden="true">💬</span> WhatsApp
									</a>
								</div>
							</div>
              			</form>
					</div>
				</div>
			</div>
		</div>
	</section><!-- END section Contact -->
	
<div class="container mt-0 pt-0">
  <h4>Ne găsești pe Calea București nr. 250, Bl. 2, cart. Darste, Brașov</h4>
  <div class="mapouter" style="position:relative;text-align:right;height:400px;width:100%;">
    <div class="gmap_canvas" style="overflow:hidden;background:none!important;height:400px;width:100%;">
      <iframe 
        width="100%" 
        height="400" 
        id="gmap_canvas"
        src="https://maps.google.com/maps?q=Calea%20Bucuresti%20250%20Bl.%202%20Brasov&hl=ro&z=17&output=embed"
        frameborder="0" 
        scrolling="no" 
        marginheight="0" 
        marginwidth="0"
        style="border:1px solid #ccc;">
      </iframe>
    </div>
  </div>
</div>

<?php include 'footer.php';?>

<!-- Stil minim pentru butonul WhatsApp -->
<style>
.form-actions .btn-send,
.form-actions .btn-whatsapp{
	display:inline-block;
	vertical-align:middle;
	margin:8px 6px 0 0;
}
.btn-whatsapp{
	background:#25D366;
	color:#fff !important;
	text-decoration:none;
	border-radius:4px;
	padding:10px 16px;
	font-weight:600;
	line-height:1;
}
.btn-whatsapp:hover{ filter:brightness(0.95); }
.wa-ico{ margin-right:6px; }
</style>

<!-- Script WhatsApp smart (preia automat datele din formular) -->
<script>
(function(){
  function buildWhatsAppURL(formRootId, number, contextLabel){
    var root = document.getElementById(formRootId) || document;
    var name = (root.querySelector('#name')||{}).value || '';
    var phone = (root.querySelector('#phone')||{}).value || '';
    var email = (root.querySelector('#email')||{}).value || '';
    var msg = (root.querySelector('#message')||{}).value || '';

    var lines = [
      "Bună! Aș dori informații și o programare.",
      "Context: " + contextLabel,
      name ? ("Nume: " + name) : null,
      phone ? ("Telefon: " + phone) : null,
      email ? ("Email: " + email) : null,
      msg ? ("Mesaj: " + msg) : null
    ].filter(Boolean);

    var text = encodeURIComponent(lines.join("\n"));
    return "https://wa.me/" + number + "?text=" + text;
  }

  function attachSmartWA(buttonId, formRootId, contextLabel){
    var btn = document.getElementById(buttonId);
    if(!btn) return;
    var number = btn.getAttribute('data-wa-number') || '40722538722';
    btn.addEventListener('click', function(e){
      e.preventDefault();
      var url = buildWhatsAppURL(formRootId, number, contextLabel);
      window.open(url, '_blank', 'noopener');
    });
  }

  // contact-laser
  attachSmartWA('wa-btn-laser', 'contact-form', 'Epilare Laser');
})();
</script>
