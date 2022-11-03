<?php include "header.php"; ?>

<div class="section section-yayasan">

	<div class="container text-center">

		<h3 class="text-center">Anggota Yayasan Homy School</h3>	
		
		<?php
			$yayasan = mysqli_query($connect, "SELECT * FROM yayasan ORDER BY id ASC");
				if(mysqli_num_rows($yayasan) > 0 ) {
					while ($p = mysqli_fetch_array($yayasan)) { ?>

			<div class="col-4">

				<a href="detail_yayasan.php?id=<?= $p['id'] ?>" class="thumbnail-link">
					<div class="thumbnail-box">
						
						<div class="thumbnail-img tutor" style="background-image: url('uploads/yayasan/<?= $p['foto'] ?> '); ">
						</div>

						<div class="thumbnail-text yayasan">
							<?= $p['nama'] ?>
						</div>

					</div>
				</a>

			</div>

			<?php }} else { ?>

				Tidak ada data!

		<?php } ?>

	</div>

</div>

<div class="section">

	<div class="container text-center">

		<h3 class="text-center">Tutor Homy School</h3>	
		
		<?php
			$tutor = mysqli_query($connect, "SELECT * FROM tutor ORDER BY id DESC");
				if(mysqli_num_rows($tutor) > 0 ) {
					while ($p = mysqli_fetch_array($tutor)) { ?>

			<div class="col-4">

				<a href="detail_tutor.php?id=<?= $p['id'] ?>" class="thumbnail-link">
					<div class="thumbnail-box">
						
						<div class="thumbnail-img tutor" style="background-image: url('uploads/tutor/<?= $p['foto'] ?> '); ">
						</div>

						<div class="thumbnail-text">
							<?= $p['nama'] ?>
						</div>

					</div>
				</a>

			</div>

			<?php }} else { ?>

				Tidak ada data!

		<?php } ?>

	</div>

</div>

<?php include "footer.php"; ?>