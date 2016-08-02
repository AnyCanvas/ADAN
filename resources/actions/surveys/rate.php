<title>Dale like</title>
<meta charset="UTF-8"/>
<link rel="stylesheet"  href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/rating.min.css" media="all" rel="stylesheet" type="text/css"/>
  <style >
	@import url(http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
	
	fieldset, label { margin: 0; padding: 0; }
	body{ margin: 20px; }
	h1 { font-size: 1.5em; margin: 10px; }
	
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
			      <p class="fnbt-name-text grey-text">Contesta para jugar<br><?php echo($_SESSION['q']); ?></p>
				  <div class="like-div" style="overflow: hidden;">
					<fieldset class="rating">
					    <input type="radio" id="star5" name="rating" value="5" onclick="setTimeout(function() {alert('5')},250)" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
					    <input type="radio" id="star4" name="rating" value="4" onclick="setTimeout(function() {alert('4')},250)" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
					    <input type="radio" id="star3" name="rating" value="3" onclick="setTimeout(function() {alert('3')},250)" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
					    <input type="radio" id="star2" name="rating" value="2" onclick="setTimeout(function() {alert('2')},250)" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
					    <input type="radio" id="star1" name="rating" value="1" onclick="setTimeout(function() {alert('1')},250)" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
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
	</script>

    </body>
  </html>