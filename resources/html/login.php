<?php 
	if(isset($_SESSION['fnbt']['config']["bgcolor"])){
		echo '<body style="background-color: '. $_SESSION['fnbt']['config']["bgcolor"] .'">';
	} else {
		echo '<body>';
	}
?>
	
	<div id="fb-root"></div>
	<script>
		var finished_rendering = function() {
			$('#actionModal').modal('show');
			console.log("finished rendering plugins");
		}

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
								 src="media/clients/logos/<?php  echo $_SESSION['fnbt']['config']['image']; ?>"
	                             alt="fanbot"
	                             width="200">
	                    </div>
	                    <div class="col-xs-4"></div>
	                </div>
	
	<div id="actionModal" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="false" data-backdrop="static">

<?php if($_SESSION['fnbt']['id'] == "PF-B1-LTM-0001"){ ?>
			  <div class="fb_logo-row row">
			    <div class="col-xs-3" ></div>
			    <div class="col-xs-6" >
				    <div class="center-block" >
						<img class="img-responsive" alt="Fanbot" src="../../media/clients/centinela/centinelalogo.png">
					</div>
			    </div>
			    <div class="col-xs-3" ></div>
			  </div>
	
	
			<div class="clearfix visible-xs-block"></div>
	
<?php  }?>	
	  <div class="modal-dialog modal-sm">		
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title text-center">Inicia sesión para continuar</h4>
	      </div>
	      <div class="modal-body">
<?php if($_SESSION['fnbt']['id'] == "PF-B1-LTM-0001"){ ?>
			  <div class="fb_logo-row row">
			    <div class="col-xs-3" ></div>
			    <div class="col-xs-6" >
				    <div class="center-block" >
						<img class="img-responsive" alt="Fanbot" src="../../media/clients/centinela/centinelalogo.png">
					</div>
			    </div>
			    <div class="col-xs-3" ></div>
			  </div>
	
	
			<div class="clearfix visible-xs-block"></div>
	
<?php  }?>
			<div class="row mid-row">
			    <div class="col-xs-4" ></div>
			    <div class="col-xs-6"  style="padding: 10px 34px;">
					<a id="post-btn" class="btn btn-block btn-social btn-facebook" onclick="postclick();" style="padding-left: 35px;">
		    			<i class="fa fa-facebook-official"></i> <span class="text-center" >Login</span>
		  			</a>
			    </div>
			    <div class="col-xs-4" ></div>
			</div>	

			<div class="clearfix visible-xs-block"></div>

			<div class="col-xs-12 text-center leadinline-text" >
				<span style="font-size: x-small; color: gray;" >Al continuar estarás aceptando los términos y condiciones.</span>
			</div>
	
	      </div>
      
			<div class="clearfix visible-xs-block"></div>


	    </div>
	  </div>
	</div>
	
	</div>
</body>

