<title>Dale like</title>
<meta charset="UTF-8"/>
  <style >
	@import url(http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
	
	fieldset, label { margin: 0; padding: 0; }

	/****** Antimaterial *****/
	[type="radio"]:not(:checked) + label:before {
	    border: 0;
	}

	[type="radio"]:checked + label:after {
	    border-radius: 50%;
	    border: inherit;
	    background-color: inherit;
	    z-index: 0;
	    -webkit-transform: scale(1.02);
	    transform: inherit;
	}

	[type="radio"] + label:before, [type="radio"] + label:after {
	    content: '';
	    position: absolute;
	    left: 0;
	    top: 0;
	    margin: 4px;
	    width: 16px;
	    height: 16px;
	    z-index: 0;
	    transition: inherit;
	    display: none;
	}

	[type="radio"]:not(:checked) + label, [type="radio"]:checked + label {
	    position: relative;
	    padding-left: 37px;
	    cursor: pointer;
	    display: inline-block;
	    height: 33px;
	    line-height: 25px;
	    font-size: 2rem;
	    transition: inherit;
	    -webkit-user-select: none;
	    -moz-user-select: none;
	    -ms-user-select: none;
	    user-select: none;
	}

	[type="radio"]:checked + label:before {
	    border-radius: 50%;
	    border: inherit;
	}
	/****** Style Star Rating Widget *****/
	
	.rating { 
	  border: none;
	  float: left;
	}
	
	.rating > input { display: none; } 
	.rating > label:before { 
	  margin: 5px;
	  font-size: 1.25em;
	  font-family: FontAwesome;
	  display: inline-block;
	  content: "\f005";
	}
	
	.rating > label { 
	  color: #ddd; 
	 float: right; 
	}

	.like-div {
	    display: block;
	    margin-left: 25%;
	    margin-right: auto;
	    text-align: center;
	    height: 50%;
	}

	
	/***** CSS Magic to Highlight Stars on Hover *****/
	
	.rating > input:checked ~ label, /* show gold star when clicked */
	.rating:not(:checked) > label:hover, /* hover current star */
	.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */
	
	.rating > input:checked + label:hover, /* hover current star when changing rating */
	.rating > input:checked ~ label:hover,
	.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
	.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 
  </style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <body>

	<div class="container-fluid" style="padding-right: 0px; padding-left: 0px;">
		<div id="loader" style="display: block; width: 100%; height: 100%; z-index: 9; position: absolute; background-color: rgba(0, 0, 0, 0.51);">
			<div class="wrapper vertical-center">
				<div class="cssload-loader btn-centered" style="z-index: 10; top: 45vh; margin: auto;"></div>
			</div>
		</div>
		<div id="upper-div" style="height: 65%; position: relative;" class="blue">
		<div class="div-wrapper full" style="background-color: <?php echo $_SESSION['fnbt']['config']["bgcolor"] ?>;">

		<img class="center-img fbpage-img" src="https://graph.facebook.com/<?php echo $_SESSION['fnbt']['config']['link'];?>/picture?type=large" class="img-responsive img-thumbnail center-block" alt="Cinque Terre">
		</div>
		</div>
	    <footer style="height: 35%;">
			  <div id="fblike-div">
			      <p class="fnbt-name-text grey-text" lang="es" >Contesta para jugar<br><?php echo($_SESSION['q']); ?></p>
				  <div class="like-div" style="overflow: hidden;">
					<fieldset class="rating">
					    <input type="radio" id="star5" name="rating" value="5" onclick="setTimeout(function() {alert('5')},250)" /><label for="star5" title="Awesome - 5 stars"></label>
					    <input type="radio" id="star4" name="rating" value="4" onclick="setTimeout(function() {alert('4')},250)" /><label for="star4" title="Pretty good - 4 stars"></label>
					    <input type="radio" id="star3" name="rating" value="3" onclick="setTimeout(function() {alert('3')},250)" /><label for="star3" title="Meh - 3 stars"></label>
					    <input type="radio" id="star2" name="rating" value="2" onclick="setTimeout(function() {alert('2')},250)" /><label for="star2" title="Kinda bad - 2 stars"></label>
					    <input type="radio" id="star1" name="rating" value="1" onclick="setTimeout(function() {alert('1')},250)" /><label for="star1" title="Sucks big time - 1 star"></label>
					</fieldset>
				  </div>
		      </div>
	    </footer>

	</div>
	<script>
			var browserAgent = navigator.userAgent;
			console.log(browserAgent);
			if (browserAgent.indexOf("iPhone") > -1){
				console.log("Changed class");
				$( "#upper-div" ).addClass( "iphone-fix" );
			}
						
			
    jQuery(document).ready(function () {

		$('#loader').hide();
		console.log("finished rendering plugins");

    });
	</script>

    </body>
  </html>