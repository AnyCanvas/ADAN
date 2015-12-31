<body>
	
	<div id="fb-root"></div>
	<script>
		window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '<?php echo $config["fbApp"]["appId"] ?>',
		      xfbml      : true,
		      version    : 'v2.5'
		    });

			FB.Event.subscribe('xfbml.render', finished_rendering);

		  };
		
		  (function(d, s, id){
		     var js, fjs = d.getElementsByTagName(s)[0];
		     if (d.getElementById(id)) {return;}
		     js = d.createElement(s); js.id = id;
		     js.src = "//connect.facebook.net/en_US/sdk.js";
		     fjs.parentNode.insertBefore(js, fjs);
		   }(document, 'script', 'facebook-jssdk'));

			postclick = function () {
								window.location = "<?php echo $loginUrl;?>";										
						}	
		<?php
			if(isset($_GET["post"])){
				header("location: ". $loginUrl);			    
		    } ?>
  
	</script>
	
	<div class ="container-fluid">
	
	<div class="wrapper vertical-center">
		<div class="cssload-loader"></div>
	</div>
	
	<div class="clearfix visible-xs-block"></div>
	
	                <div class="fb_logo-row row bottom">
	                    <div class="col-xs-4"></div>
	                    <div class="col-xs-4">
	                        <img class="img-responsive center-block"
								 src="media/clients/logos/<?php  echo $_SESSION['config']['image']; ?>"
	                             alt="fanbot"
	                             width="200">
	                    </div>
	                    <div class="col-xs-4"></div>
	                </div>
	
	<div id="actionModal" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="false" data-backdrop="static">
	
	  <div class="modal-dialog modal-sm">		
			<!-- Informative image Columns-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title text-center">Inicia sesión para continuar</h4>
	      </div>
	      <div class="modal-body">
			  <div class="fb_logo-row row">
			    <div class="col-xs-4" ></div>
			    <div class="col-xs-4" >
				    <div class="center-block" >
						<img id="fb_img" src="https://graph.facebook.com/<?php echo $_SESSION['config']['link'];?>/picture" class="img-responsive img-thumbnail center-block" alt="Cinque Terre">
					</div>
			    </div>
			    <div class="col-xs-4" ></div>
			  </div>
	
	
			<div class="clearfix visible-xs-block"></div>
	
			<div class="row mid-row">
			    <div class="col-xs-3" ></div>
			    <div class="col-xs-6"  style="padding: 10px 34px;">
					<a id="post-btn" class="btn btn-block btn-xs btn-social btn-facebook" onclick="postclick();" style="padding-left: 20px;">
		    			<i class="fa fa-facebook-official"></i> <span class="text-center" >Login</span>
		  			</a>
			    </div>
			    <div class="col-xs-3" ></div>
			</div>	
	
	      </div>
      
		  <div class="modal-footer">
			<div class="row mid-row">
				<div class="col-xs-1" ></div>
			    
			    <div class="col-xs-10 text-center leadinline-text" >
					<span style="font-size: x-small; color: white;" >Al continuar estarás aceptando los términos y condiciones.</span>
			    </div>
			    
			    <div class="col-xs-1" ></div>
			</div>
	      </div>

	    </div>
	  </div>
	</div>
	
	</div>
</body>
