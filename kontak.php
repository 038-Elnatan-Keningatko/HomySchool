<?php include "header.php"; ?>

<div class="section">

	<div class="container">

		<h3 class="text-center">Kontak</h3>	
		
		<div class="col-4-kontak">
			
				<p><i class="fa-solid fa-location-dot"></i><b> Alamat :</b> <br>
					<?= $d->alamat ?>
				</p>
				<p><i class="fa-brands fa-whatsapp"></i><b> Info Admin :</b> <br>
					<a href="<?= $d->telepon_admin ?>" class="thumbnail-link" target="_blank">Admin Homy School</a>
				</p>
				<p><i class="fa-brands fa-whatsapp"></i><b> Info PAUD :</b> <br>
					<a href="<?= $d->telepon_paud ?>" class="thumbnail-link" target="_blank">PAUD Homy School</a>
				</p>
				<p><i class="fa-brands fa-whatsapp"></i><b> Info Primary - Secondary :</b> <br>
					<a href="<?= $d->telepon_ps ?>" class="thumbnail-link" target="_blank">Primary - Secondary Homy School</a>
				</p>
				<p><i class="fa-solid fa-envelope"></i><b> Email :</b> <br>
					<a href="<?= $d->email ?>" class="thumbnail-link" target="_blank">homyschoolpky@gmail.com</a>
				</p>
				<p><i class="fa-brands fa-instagram"></i><b> Instagram :</b> <br>
					<a href="<?= $d->instagram ?>" class="thumbnail-link" target="_blank">@homyschool_pky</a>
				</p>
				<p><i class="fa-brands fa-youtube"></i><b> YouTube :</b> <br>
					<a href="<?= $d->youtube ?>" class="thumbnail-link" target="_blank">Homy School</a>
				</p>

		</div>

		<div class="box-gmaps">
			
			<iframe src="<?= $d->google_maps ?>" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>			

		</div>

	</div>

</div>

<?php include "footer.php"; ?>