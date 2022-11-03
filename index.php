<?php include "header.php"; ?>

	<!-- Banner -->
	<div class="banner" style="	background-image: url('uploads/identitas/<?= $d->foto_sekolah ?>'); ">

		<div class="banner-text">
			<div class="container">
				<h3>Selamat Datang di <?= $d->nama ?></h3>
				<p>Teaching with Love, Learning in Joy</p>
			</div>
		</div>

	</div>

	<!-- Akademik -->
	<div class="section" id="akademik">
		
		<div class="container text-center">

			<h3>Akademik</h3>

			<?php
				$akademik = mysqli_query($connect, "SELECT * FROM akademik ORDER BY id DESC");
				if(mysqli_num_rows($akademik) >0 ) {
					while ($a = mysqli_fetch_array ($akademik)) {
			?>

				<div class="col-2">

					<a href="detail_akademik.php?id=<?= $a['id'] ?>" class="thumbnail-link">
						<div class="thumbnail-box">
							
							<div class="thumbnail-img-col-2" style="background-image: url('uploads/akademik/<?= $a['gambar'] ?> '); ">
							</div>

							<div class="thumbnail-text-col-2">
								<?= $a['nama'] ?>
							</div>

						</div>
					</a>

				</div>

				<?php }} else { ?>

					Tidak ada data!

			<?php } ?>

		</div>

	</div>

	<!-- Berita -->
	<div class="section" id="berita">
		
		<div class="container text-center">
			
			<h3>Berita Terbaru</h3>

			<?php
				$berita = mysqli_query($connect, "SELECT * FROM berita ORDER BY id DESC LIMIT 8");
				if(mysqli_num_rows($berita) >0 ) {
					while ($b = mysqli_fetch_array ($berita)) {
			?>

				<div class="col-4">

					<a href="detail_berita.php?id=<?= $b['id'] ?>" class="thumbnail-link">
						<div class="thumbnail-box">
							
							<div class="thumbnail-img" style="background-image: url('uploads/berita/<?= $b['gambar'] ?> '); ">
							</div>

							<div class="thumbnail-text">
								<?= substr($b['judul'], 0, 30) ?>
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