	<div class="container-fluid">


	<!-- Text columns-->
		<div class="row mid-row">
		    <div class="col-xs-1" ></div>
		    <div class="col-xs-10" >
				<?php
						if(isset($_SESSION['nameErr'])){
						if ($_SESSION['nameErr']){
							$_SESSION['nameErr'] = FALSE;
							echo ('<div class="alert alert-danger text-center text-nowrap" role="alert">La Fanbot que buscas no existe.</div>');
				}
				}
				?>
		    </div>
		    <div class="col-xs-1" ></div>
		</div>

	<div class="clearfix visible-xs-block"></div>

	<!-- Input and button to next page columns-->
	  <div class="row mid-row vertical-center">

	    <div class="col-xs-1" ></div>
	    <div class="col-xs-10" >
		    <p class="text-center text-nowrap" style="color: white; font-size: 1.2em; ">Escribe el nombre de la Fanbot</p>
	    </div>
	    	<div class="col-xs-1" ></div>

	<div class="clearfix visible-xs-block"></div>


	<div class="col-xs-1" >f</div>
	    <div class="col-xs-6">f</div>
	    <div class="col-xs-5" >
			<form class="form" action="node.php" method="get">
				<div class="input-group square-box">
	      			<input type="text" class="form-control input-lg text-center lead text-lowercase inline-text square-box" name="name">
	      			<span class="input-group-btn">
	        			<button class="btn btn-lg next-btn square-box" type="submit">
	        				<span class="glyphicon glyphicon-chevron-right"></span>
	        			</button>
					</span>
	    		</div>
			</form>

	    </div>
	    	<div class="col-xs-1">f</div>

	  </div>
	</div>
	<!-- Logo img-->
		<div class="bottom center-block">
			<div class="fb_logo-row row">
				    <div class="col-xs-4" ></div>
				    <div class="col-xs-4" >
		
						<img class="img-responsive center-block" src="media/clients/logos/fanbot.png" alt="fanbot" width="200"/>
				    </div>
				    <div class="col-xs-4" ></div>
			</div>
		</div>
	</div>