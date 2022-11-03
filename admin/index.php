<?php include 'header.php' ?>

	<!-- content -->
	<div class="content">
		
		<div class="container">
			
			<div class="box">
				
				<div class="box-header">
					Dashboard
				</div>

				<div class="box-body-admin">
					<h3>Selamat Datang <i> <?= $_SESSION['uname'] ?> </i> di Panel Admin <?= $d->nama ?></h3>
				</div>

			</div>

		</div>

	</div>

<?php include 'footer.php' ?>