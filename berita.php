<?php include "header.php"; ?>

<div class="section">

	<div class="container text-center">

		<h3 class="text-center">Berita</h3>	

		<form action="">
			<div class="input-group">
				<input type="text" name="key" placeholder="Pencarian" autocomplete="off">
				<button type="submit"><i class="fa fa-search"></i></button>
			</div>
		</form>
		
		<?php
			$no = 1;

			$where = " WHERE 1=1 ";
			if(isset($_GET['key'])) {
				$where .= " AND judul LIKE '%".addslashes($_GET['key'])."%' ";
			}

			$berita = mysqli_query($connect, "SELECT * FROM berita $where ORDER BY id DESC");
			if(mysqli_num_rows($berita) > 0 ) {
				while ($p = mysqli_fetch_array($berita)) { ?>

			<div class="col-4">

				<a href="detail_akademik.php?id=<?= $p['id'] ?>" class="thumbnail-link">
					<div class="thumbnail-box">
						
						<div class="thumbnail-img" style="background-image: url('uploads/berita/<?= $p['gambar'] ?> '); ">
						</div>

						<div class="thumbnail-text">
							<?= substr($p['judul'], 0, 30) ?>
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