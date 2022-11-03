<?php include "header.php"; ?>

<div class="section">

	<div class="container">

		<h3 class="text-center">Tentang Sekolah</h3>	
		<img src="uploads/identitas/<?= $d->foto_sekolah ?>" class="image" style="width: 50%; display: block; margin-left: auto; margin-right: auto;">
		<?= $d->tentang_sekolah ?>
	</div>

</div>

<?php include "footer.php"; ?>