<?php
define("TITLE","Esthetique Studio Brasov | Salonul pentru frumusetea ta");
define("DESCRIPTION", "Esthetique Studio - servicii de epilare cu pasta de zahar, epilare cu ceara si proceduri cosmetice");
include 'header.php';
?>

	<!-- image slider -->
	<div class="section-intro">
		<div id="slider" class="nivoSlider">
		    <img src="images/slider_img_1.jpg" data-thumb="images/slider_img_1.jpg" alt="Salon Esthetique Studio">
		    <img src="images/slider_img_2.jpg" data-thumb="images/slider_img_3.jpg" alt="Salon Esthetique Studio">
		    <img src="images/slider_img_3.jpg" data-thumb="images/slider_img_3.jpg" alt="Salon Esthetique Studio">
		</div>
		<div class="intro-wrap">
			<div class="intro-wrap-vertical wow fadeIn" data-wow-delay="0.5s">
				<h1>Pielea ta <br /> are grija de tine toata viata,<br /> tu cata grija ai de ea?</h1>
			</div>
		</div>
	</div><!-- END image slider -->

	<!-- section About us -->
	<section class="about-us">
		<div class="container">
			<div class="wow fadeIn">
				<h2 class="section-title">Despre noi</h2>
				<div class="divider-short mb-50 "></div>
			</div>
			<div class="row wow fadeIn" data-wow-delay="0.5s">
				<div class="col-xs-12 col-sm-5 mb-20" >
					<p>Vrei sa fii altfel? Ti-ai propus sa ai mai multa grija de tine?</p>
					<p>Atunci te asteptam zilnic la Esthetique Studio cu servicii de epilare cu pasta de zahar, epilare cu ceara si proceduri cosmetice, toate intr-un cadru modern, intr-o atmosfera deosebita si departe de agitatia orasului.</p>
					<p><strong>Frumusetea personala este scrisoarea ta de recomandare!</strong></p>
					<a href="despre-noi.php" class="btn-read-more">mai multe detalii</a>
				</div>
				<div class="col-xs-12 col-sm-7">
					<img src="images/despre_noi_2.png" alt="Salon Esthetique Studio" class="img-responsive m-auto">
				</div>
			</div>
		</div>
	</section><!-- END section About us -->

	<!-- section Quotes -->
	<section class="quote-section">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-offset-3 col-sm-9 col-md-7 col-md-offset-5 col-lg-6 col-lg-offset-6">
					<h3 class="wow fadeInRight">Natura <br /> este o sursa de creativitate, eficacitate, blandete si placere</h3>
				</div>
			</div>
		</div>
	</section><!-- END section Quotes -->

	<!-- section Services -->
	<section class="services">
		<div class="container">
			<div class="wow fadeIn">
				<h2 class="section-title wow fadeIn">Servicii</h2>
				<div class="divider-short mb-50 "></div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-4 mb-40">
					<div class="services-item-cosmetics wow fadeIn" data-wow-delay="0.7s">
						<h3>Cosmetica</h3>
						<p>Servicii de cosmetica: tratamente si proceduri</p>
						<a href="cosmetica.php" class="btn-read-more"><small>mai multe detalii</small></a>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 mb-40">
					<div class="services-item-sugaring wow fadeIn" data-wow-delay="0.3s">
						<h3>Epilare cu zahar</h3>
						<p>O metoda straveche si simpla de indepartare a parului nedorit</p>
						<a href="epilare-zahar.php" class="btn-read-more"><small>mai multe detalii</small></a>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 mb-40">
					<div class="services-item-waxing wow fadeIn" data-wow-delay="1s">
						<h3>Epilare cu ceara</h3>
						<p>Una dintre metodele cel mai frecvent folosite de îndepărtare a părului</p>
						<a href="epilare-ceara.php" class="btn-read-more"><small>mai multe detalii</small></a>
					</div>
				</div>
 			</div>
		</div>
	</section><!-- END section Services -->


<?php include 'footer.php';?>
