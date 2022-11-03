<!-- footer -->
	<div class="footer">
		
		<div class="container text-center">
		
			Copyright &copy; 2022 - <b> <?= $d->nama ?> </b>

		</div>

	</div>

	<script type="text/javascript">
		
		var mobileMenu = document.getElementById("mobileMenu")

		function showMobileMenu() {
			mobileMenu.style.display = "block"
		}

		function hideMobileMenu() {
			mobileMenu.style.display = "none"
		}

		function yayasan() {
		  var x = document.getElementById("yayasan");
		  if (x.style.display === "block") {
		    x.style.display = "none";
		  } else {
		    x.style.display = "block";
		  }
		}

		function pengaturan() {
		  var x = document.getElementById("setting");
		  if (x.style.display === "block") {
		    x.style.display = "none";
		  } else {
		    x.style.display = "block";
		  }
		}

		function user() {
		  var x = document.getElementById("user");
		  if (x.style.display === "block") {
		    x.style.display = "none";
		  } else {
		    x.style.display = "block";
		  }
		}

	</script>
	
</body>
</html>