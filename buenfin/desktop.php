		<div id="fb-root"></div>
			<script>(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.3&appId=<?php echo $config["fbApp"]["appId"] ?>";
				fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));
			</script>
			
	<script>
	  window.fbAsyncInit = function() {
	    FB.Event.subscribe('edge.create', function(targetUrl) {
	        console.log('Page like.');
			window.location="";
	    });
	    FB.Event.subscribe('edge.remove', function(targetUrl) {
	      console.log("unLike");
	    });
	  };
	  
	</script>
	<div class="container-fluid">

	  <div class="row top-row">
	    <div class="col-xs-6" >
		    <div class="embed-responsive embed-responsive-4by3" style="margin:auto;">
			    <iframe class="embed-responsive-item" width="420" height="315" src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allowfullscreen></iframe>
			</div>
	    </div>
	    <div class="col-xs-6">
		    <div class="center-block" style="height: 627px; width: 375px; background-color: white; border: black solid">
					<div class ="container-fluid">
						
						<!-- Informative image Columns-->
						  <div class="brand-row row">
						    <div class="col-xs-1" ></div>
						    <div class="col-xs-10" >
						    	<img class="img-responsive action_img" alt="Name help image" src="../media/clients/
							<?php 
										echo $_SESSION['config']['image']; 
							?>">
						    </div>
						    <div class="col-xs-1" ></div>
						  </div>
				
						<div class="clearfix visible-xs-block"></div>
				
						<div class="row mid-row">
				
							    <div class="col-xs-2" ></div>
							    <div class="col-xs-8 like_box">
				
									<div class="col-xs-5" >
									    <div class="center-block" >
											<img id="fb_img" src="https://graph.facebook.com/fanbotme/picture" class="img-responsive img-thumbnail center-block" alt="Cinque Terre">
										</div>
									</div>
						
									<div class="col-xs-7" style="overflow: hidden; white-space: nowrap;" >
										<p>Fanbot<p>
										<div id="fblike center-block">
										    <div class="fb-like center-block" data-action="like" data-href="https://www.facebook.com/fanbotme" data-layout="button" data-show-faces="false" data-share="false" >
											    
										    </div>
					
									</div>
				
								</div>
				
						    <div class="col-xs-2" ></div>
				
						</div>	
				
						<div class="clearfix visible-xs-block"></div>
				
						<div class="row mid-row">
						    <div class="col-xs-1" ></div>
						    <div class="col-xs-10 text-center leadinline-text" >
								<span style="font-size: x-small; color: white;" >Al continuar estarás aceptando los términos y condiciones.</span>
						    </div>
						    <div class="col-xs-1" ></div>
					</div>			    
			  
		    </div>
	    	<div
	    </div>
	  </div>

	</div>
	
<!-- style="background-image: url('frame.png'); background-size: contain; background-repeat: no-repeat; background-position: center; height : 100vh;" -->