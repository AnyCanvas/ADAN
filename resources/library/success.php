	<title>¡Bravo!</title>
  	<script>
	  	ga("send", "event", "<?php echo $_SESSION['fnbt']['id']; ?>", "step 3", "<?php echo $_SESSION['fnbt']['config']['type'];?> success");
  	</script>

    <body>


	<!-- Facebook Pixel Code -->
	<script>
	!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
	n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
	document,'script','//connect.facebook.net/en_US/fbevents.js');
	
	fbq('init', '1662475877300988');
	fbq('track', "PageView");</script>
	<noscript><img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=1662475877300988&ev=PageView&noscript=1"
	/></noscript>
	<!-- End Facebook Pixel Code -->

<?php if($_SESSION['fnbt']['id'] == "PF-B1-LTM-0001"){ ?>

		<div class="container-fluid" style="height: 100%; width: 100%; background-color: #004485">
		<div id="upper-div" style="height: 75%;" class="blue">
		<div class="div-wrapper full">
			<img class="center-img success-img" src="/media/clients/centinela/done.jpg">
		</div>
		</div>
	    <footer style="height: 25%; padding-top: 17.5vh;" style="background-color: #004485;">
	    </footer>

	</div>

<?php } else { ?>

	<div class="container-fluid blue" style="height: 100%; width: 100%">
		<div id="upper-div" style="height: 75%;" class="blue">
		<div class="div-wrapper full">
			<img class="center-img success-img" src="images/success.png">
			<p class="center-align " style="z-index: 2; position: relative; bottom: 40%;"><?php echo timeStamp(); ?></p>
		</div>
		</div>
	    <footer style="height: 25%; padding-top: 17.5vh;" class="blue">
<!--		    <div class="btn-full-div">
			  <a class="waves-effect waves-light btn white black-text btn-full teal accent-2" href="http://fanbot.me/">
			<i class="material-icons left">arrow_forward</i>CONOCE FANBOT</a>
		    </div> -->
			  <a class="waves-effect waves-light btn white black-text btn-centered teal accent-2" href="http://facebook.com/fanbotme"><i class="material-icons left">arrow_forward</i>CONOCE FANBOT</a>

	    </footer>

	</div>

<?php } ?>

	<script>
			var browserAgent = navigator.userAgent;
			console.log(browserAgent);
			if (browserAgent.indexOf("iPhone") > -1){
				console.log("Changed class");
				$( "#upper-div" ).addClass( "iphone-fix" );
				$( 'img' ).addClass( 'img-fix' );
				$( 'p' ).addClass( 'p-fix' );

			}
	</script>
    </body>
  </html>