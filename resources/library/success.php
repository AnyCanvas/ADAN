<!DOCTYPE html>
<html>
	<title>¡Bravo!</title>
	<?php require_once( "resources/html/header.php" ); ?>

  	<script>
	  	ga("send", "event", "<?php echo $_SESSION['fnbt']['id']; ?>", "step 3", "<?php echo $_SESSION['fnbt']['config']['type'];?> success");
  	</script>

	  <style type="text/css">
		.ball {
		    height: 33vw;
		    -moz-border-radius: 100%;
		    -webkit-border-radius: 100%;
		    border-radius: 100%;
		    background-position: center;
		    /* background-size: 80px 60px; */
		    background-clip: content-box;
		    padding: 2vh 3vw !important
		}
	  </style>
    <body>

	<div class="container-fluid white" style="height: 100%; width: 100%">

<?php if($_SESSION['fnbt']['price']['1'] != NULL){ ?>
		<div id="upper-div" style="height: 100%;">
	<script type="text/javascript">

	$(document).ready(function(){
	    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
	    $('#price').modal();
	});

	  	function modalShow(number){
		  	var price1 = decodeURIComponent("<?php echo $_SESSION['fnbt']['price']['1'] ?>");
		  	var price2 = decodeURIComponent("<?php echo $_SESSION['fnbt']['price']['2'] ?>");
		  	var price3 = decodeURIComponent("<?php echo $_SESSION['fnbt']['price']['3'] ?>");
		  	var price4 = decodeURIComponent("<?php echo $_SESSION['fnbt']['price']['4'] ?>");
		  	var price5 = decodeURIComponent("<?php echo $_SESSION['fnbt']['price']['5'] ?>");
		  	var price6 = decodeURIComponent("<?php echo $_SESSION['fnbt']['price']['6'] ?>");
		  	var price7 = decodeURIComponent("<?php echo $_SESSION['fnbt']['price']['7'] ?>");
		  	var price8 = decodeURIComponent("<?php echo $_SESSION['fnbt']['price']['8'] ?>");

		  	switch(number){
			  	case 1:
			  		$("#priceText").text(price1);
			  		break;
			  	case 2:
			  		$("#priceText").text(price2);
			  		break;
			  	case 3:
			  		$("#priceText").text(price3);
			  		break;
			  	case 4:
			  		$("#priceText").text(price4);
			  		break;
			  	case 5:
			  		$("#priceText").text(price5);
			  		break;
			  	case 6:
			  		$("#priceText").text(price6);
			  		break;
			  	case 7:
			  		$("#priceText").text(price7);
			  		break;
			  	case 8:
			  		$("#priceText").text(price8);
			  		break;

		  	}
		    $('#price').modal('open');
		 }
	  </script>
      <div class="container">

		<b class="center-align flow-text">Toca la cápsula que te salió para conocer tu premio. </b>

        <!-- Page Content goes here -->
	    <div class="row" style="margin-bottom: 0;">
	      <div class="col s4 offset-s1 ball" style="background-color: #FDBF14;">
	      	<div class="valign-wrapper" style="height: 100%;">
			  <p class="valign" onclick="modalShow(1);" style="margin: auto auto; font-size: 8vh;color: white;">1</p>
			</div>
	      </div>

	      <div class="col s4 offset-s2 ball" style="background-color: #124C9B;">
	      	<div class="valign-wrapper" style="height: 100%;">
			  <p class="valign" onclick="modalShow(2);" style="margin: auto auto; font-size: 8vh;color: white;">2</p>
			</div>
	      </div>

	      <div class="col s4 offset-s1  ball" style="background-color: #EE4738;">
	      	<div class="valign-wrapper" style="height: 100%;">
			  <p class="valign" onclick="modalShow(3);" style="margin: auto auto; font-size: 8vh;color: white;">3</p>
			</div>
	      </div>

	      <div class="col s4 offset-s2 ball" style="background-color: #A44498;">
	      	<div class="valign-wrapper" style="height: 100%;">
			  <p class="valign" onclick="modalShow(4);" style="margin: auto auto; font-size: 8vh;color: white;">4</p>
			</div>
	      </div>

	      <div class="col s4 offset-s1  ball" style="background-color: #F37B22;">
	      	<div class="valign-wrapper" style="height: 100%;">
			  <p class="valign" onclick="modalShow(5);" style="margin: auto auto; font-size: 8vh;color: white;">5</p>
			</div>
	      </div>

	      <div class="col s4 offset-s2  offset-s2 ball" style="background-color: #41B555;">
	      	<div class="valign-wrapper" style="height: 100%;">
			  <p class="valign" onclick="modalShow(6);" style="margin: auto auto; font-size: 8vh;color: white;">6</p>
			</div>
	      </div>

	      <div class="col s4 offset-s1  ball" style="background-color: #9F3029;">
	      	<div class="valign-wrapper" style="height: 100%;">
			  <p class="valign" onclick="modalShow(7);" style="margin: auto auto; font-size: 8vh;color: white;">7</p>
			</div>
	      </div>

	      <div class="col s4 offset-s2  offset-s2 ball" style="background-color: black">
	      	<div class="valign-wrapper" style="height: 100%;">
			  <p class="valign" onclick="modalShow(8);" style="margin: auto auto; font-size: 8vh;color: white;">8</p>
			</div>
	      </div>
	    </div>
     </div>

		  <!-- Modal Structure -->
		  <div id="price" class="modal bottom-sheet">
		    <div class="modal-content">
		      <p class="flow-text" id="priceText"></p>
		      <p class="flow-text" style="color: #808285">Entrega la cápsula para canjear tu premio. </br><i>Entrega la cápsula para canjear tu premio.</i></p>

		    </div>
		    <div class="modal-footer">
		      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
		    </div>
		  </div>

<?php }  else { ?>
			<div id="upper-div" style="height: 75%;">
			<div class="div-wrapper full">
				<img class="center-img success-img" src="images/success.png">
				<p class="center-align " style="z-index: 2; position: relative; bottom: 40%;"><?php echo timeStamp(); ?></p>
			</div>
			</div>
		    <footer style="height: 25%; padding-top: 17.5vh;">
				  <a class="waves-effect waves-light btn white black-text btn-centered teal accent-2" href="http://facebook.com/fanbotme"><i class="material-icons left">arrow_forward</i>CONOCE FANBOT</a>
	
		    </footer>



<?php } ?>
		</div>
	</div>
    </body>
  </html>