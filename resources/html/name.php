<body>
	<script>
		function sendName(){
			window.location = "node.php?name=" + $("#fnbt-name-label").val();;
		}
	</script>
	<div class="container-fluid" style="height: 100%; width: 100%">
		<div id="upper-div" style="height: 55%;" class="blue">
		<div class="div-wrapper full" style="padding-top: top: 40vh !important;">
			<img class="center-align center-img index-img" src="images/fanbot_label.png"  />
		</div>
		</div>
	    <footer style="height: 45%;">
		      <p class="fnbt-name-text grey-text">Escribe la palabra de la etiqueta</p>
		      <form action="node.php" method="get" >
		      <input onfocus="makeBig();" onfocusout="makeSmall();" name="name" id="fnbt-name-label" class="fnbt-name-input white-text" style="background-color: #ee5559 !important;"></input>
		      </form>
			<a id="name-btn" style="display: none;" class="button-div btn-floating btn-large waves-effect green accent-2" onclick="sendName();"><i class="material-icons white-text">arrow_forward</i></a>

	    </footer>

	</div>
    </body>

  </html>
</body>
