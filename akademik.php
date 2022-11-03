<?php include "header.php"; ?>

<div class="section">

	<div class="container text-center">

		<h3 class="text-center">Akademik</h3>	
		
		<?php
			$akademik = mysqli_query($connect, "SELECT * FROM akademik ORDER BY id DESC");
			if(mysqli_num_rows($akademik) >0 ) {
				while ($a = mysqli_fetch_array ($akademik)) { ?>

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

<?php include "footer.php"; ?>