<?php
define("TITLE","Esthetique Studio Brasov | Date de contact");
define("DESCRIPTION", "Esthetique Studio - servicii de epilare cu pasta de zahar, epilare cu ceara si proceduri cosmetice");
include 'header.php';
?>

	<section class="header-img header-img-contact"></section>

	<!-- section Contact -->
	<section class="sugaring bg-flower-1">
		<div class="container">
			<div class="wow fadeIn">
				<h2 class="section-title wow fadeIn">Contact</h2>
				<div class="divider-short mb-50 "></div>
			</div>
			<p class="section-subtitle wow fadeIn">Pentru informatii va rugam sa ne sunati sau sa trimiteti formularul de mai jos completat.</p>
			<div class="row">
				<div class="col-xs-12 col-sm-5 col-md-4 col-md-offset-1 mb-30 wow fadeIn">
					<div class="contact-details mt-50">
						<h3><strong>Contact</strong></h3>
						<ul class="pl-20 list-unstyled ">
							<li>Brasov, str. Lamaitei 37</li>
							<li>+40 722 538722</li>
							<li>adriana@esthetiquestudio.ro</li>
						</ul>	
						<h3><strong>Program cabinet cosmetica</strong></h3>
						<ul class="pl-20 list-unstyled">
							<li>Luni – Vineri: 10:00 – 14.30 ; 15.00 – 20.30</li>
							<li>Non-stop pentru consultanta utilizare Pasta de Zahar</li>
						</ul>	
					</div>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-6 mb-30 wow fadeIn">
					<div class="contact-form mt-50">
						<form  id="contact-form" method="post">
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
              				<button type="button" class="btn-send" id="submit-form">Trimite!</button>
          				</form>
					</div>
				</div>
			</div>
			</div>
	</section><!-- END section Contact -->

	<!-- map section -->
	<div class="map-wrapper">
		<div id="map">
			<img src="images/map_img.png" alt="harta" class="img-responsive m-auto">
		</div>
	</div><!-- END map section -->



<!-- google map script -->
	<script>
		$(document).ready(function(){

			// function loadMap() {

		 //        var mapOptions = {
		 //           center:new google.maps.LatLng(45.656522, 25.628655),
		 //           zoom:16,
		 //           scrollwheel: false,
			// 	   styles: [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":45},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}],
			// 		mapTypeId:google.maps.MapTypeId.ROADMAP
		 //        };
			//     var map = new google.maps.Map(document.getElementById("map"),mapOptions);
		 //        var marker = new google.maps.Marker({
		 //           position: new google.maps.LatLng(45.656522, 25.628655),
		 //           map: map,
		 //        });
		 //    };
		 //    google.maps.event.addDomListener(window, 'load', loadMap);

		});


	</script>
	<!-- END google map script -->


<?php include 'footer.php';?>
