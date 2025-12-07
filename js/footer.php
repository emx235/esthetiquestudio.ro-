	<!-- footer -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-4 mb-20 wow fadeIn" data-wow-delay="0.1s">
					<div class="footer-logo">
						<img src="images/logo.jpg" alt="logo" class="img-responsive mb-20">
						<p>Povestea ce urmeaza este pentru oameni ce sunt gata sa isi asume instinctul pentru frumusete.</p>
						<p>Pregatiti pentru aventura?</p>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 mb-20 wow fadeIn" data-wow-delay="0.1s">
					<div class="footer-contact">
						<h5><strong>Contact</strong></h5>
						<ul class="pl-20 list-unstyled ">
							<li>Brasov, str. Lamaitei 37</li>
							<li>+40 722 538722</li>
							<li>adriana@esthetiquestudio.ro</li>
						</ul>	
						<h5><strong>Program cabinet cosmetica</strong></h5>
						<ul class="pl-20 list-unstyled">
							<li>Luni – Vineri: 10:00 – 14.30 ; 15.00 – 20.30</li>
							<li>Non-stop pentru consultanta utilizare Pasta de Zahar</li>
						</ul>	
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 mb-20 wow fadeIn" data-wow-delay="0.1s">
					<div class="fb-page" data-href="https://www.facebook.com/Esthetique.Studio.Bv" data-height="300px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>
				</div>
			</div>
			<hr>
                        <p align="center"> <a href="http://esthetiquestudio.ro/politica-cookie.php">Politica Cookie</a></p>
			<p class="copyright">
				©<?php echo date('Y');?> Esthetique Studio Brasov
			</p>
		</div>
	</footer><!-- END footer -->

	<!-- facebook post -->
	<script>
		(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/ro_RO/sdk.js#xfbml=1&version=v2.8";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script><!-- end facebook post -->
<!-- Quantcast Choice. Consent Manager Tag -->
<script type="text/javascript" async=true>
    var elem = document.createElement('script');
    elem.src = 'https://quantcast.mgr.consensu.org/cmp.js';
    elem.async = true;
    elem.type = "text/javascript";
    var scpt = document.getElementsByTagName('script')[0];
    scpt.parentNode.insertBefore(elem, scpt);
    (function() {
    var gdprAppliesGlobally = false;
    function addFrame() {
        if (!window.frames['__cmpLocator']) {
        if (document.body) {
            var body = document.body,
                iframe = document.createElement('iframe');
            iframe.style = 'display:none';
            iframe.name = '__cmpLocator';
            body.appendChild(iframe);
        } else {
            // In the case where this stub is located in the head,
            // this allows us to inject the iframe more quickly than
            // relying on DOMContentLoaded or other events.
            setTimeout(addFrame, 5);
        }
        }
    }
    addFrame();
    function cmpMsgHandler(event) {
        var msgIsString = typeof event.data === "string";
        var json;
        if(msgIsString) {
        json = event.data.indexOf("__cmpCall") != -1 ? JSON.parse(event.data) : {};
        } else {
        json = event.data;
        }
        if (json.__cmpCall) {
        var i = json.__cmpCall;
        window.__cmp(i.command, i.parameter, function(retValue, success) {
            var returnMsg = {"__cmpReturn": {
            "returnValue": retValue,
            "success": success,
            "callId": i.callId
            }};
            event.source.postMessage(msgIsString ?
            JSON.stringify(returnMsg) : returnMsg, '*');
        });
        }
    }
    window.__cmp = function (c) {
        var b = arguments;
        if (!b.length) {
        return __cmp.a;
        }
        else if (b[0] === 'ping') {
        b[2]({"gdprAppliesGlobally": gdprAppliesGlobally,
            "cmpLoaded": false}, true);
        } else if (c == '__cmp')
        return false;
        else {
        if (typeof __cmp.a === 'undefined') {
            __cmp.a = [];
        }
        __cmp.a.push([].slice.apply(b));
        }
    }
    window.__cmp.gdprAppliesGlobally = gdprAppliesGlobally;
    window.__cmp.msgHandler = cmpMsgHandler;
    if (window.addEventListener) {
        window.addEventListener('message', cmpMsgHandler, false);
    }
    else {
        window.attachEvent('onmessage', cmpMsgHandler);
    }
    })();
    window.__cmp('init', {
    		'Language': 'ro',
		'Initial Screen Title Text': 'Pentru noi, confidentialitatea dvs. este importanta',
		'Initial Screen Reject Button Text': 'Nu sunt de acord',
		'Initial Screen Accept Button Text': 'Sunt de acord',
		'Initial Screen Purpose Link Text': 'Afisare scopuri',
		'Purpose Screen Title Text': 'Pentru noi, confidentialitatea dvs. este importanta',
		'Purpose Screen Body Text': 'Va puteti seta preferintele privind aprobarea si stabili în ce mod doriti ca datele dvs. sa fie utilizate în baza scopurilor de mai jos. Va puteti seta preferintele pentru noi în mod independent fata de cele ale partenerilor terti. Fiecare scop are o descriere pentru a sti modul în care noi si partenerii nostri va utilizam datele.',
		'Purpose Screen Enable All Button Text': 'Activare toate scopurile',
		'Purpose Screen Vendor Link Text': 'Vizualizare lista cu toti furnizorii',
		'Purpose Screen Cancel Button Text': 'Anulare',
		'Purpose Screen Save and Exit Button Text': 'Salvare si iesire',
		'Vendor Screen Title Text': 'Pentru noi, confidentialitatea dvs. este importanta',
		'Vendor Screen Body Text': 'Va puteti seta preferintele privind aprobarea pentru fiecare companie terta individuala mai jos. Mariti fiecare element din lista de companii pentru a vedea scopurile în care acestea va utilizeaza datele pentru a va ajuta sa va realizati propriile alegeri. În unele cazuri, companiile pot dezvalui faptul ca va utilizeaza datele fara a va solicita acordul, în baza intereselor lor legitime. Puteti face clic pe politicile lor de confidentialitate pentru mai multe informatii si pentru a renunta.',
		'Vendor Screen Accept All Button Text': 'Acceptare toate',
		'Vendor Screen Reject All Button Text': 'Respingere toate',
		'Vendor Screen Purposes Link Text': 'Înapoi la scopuri',
		'Vendor Screen Cancel Button Text': 'Anulare',
		'Vendor Screen Save and Exit Button Text': 'Salvare si iesire',
		'Initial Screen Body Text': 'Noi si partenerii nostri folosim tehnologii, precum modulele cookie de pe site-ul nostru, pentru a ne personaliza continutul si reclamele, pentru a oferi functii pentru retelele de socializare si pentru a ne analiza traficul. Faceti clic mai jos pentru a fi de acord cu utilizarea acestei tehnologii pe web. Va puteti razgândi si va puteti modifica optiunile privind aprobarea oricând, revenind la acest site.',
		'Initial Screen Body Text Option': 1,
		'Publisher Name': 'SETICO SRL',
		'Publisher Purpose IDs': [1,2,3,4,5],
		'UI Layout': 'banner',
    });
</script>
<!-- End Quantcast Choice. Consent Manager Tag -->
<style>.qc-cmp-persistent-link {
    right: 230px !important;

  }
    </style>
</body>
</html>
