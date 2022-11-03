<?php include "header.php"; ?>

<div class="section">

	<div class="container">

		<?php 
			$berita 	= mysqli_query($connect, "SELECT * FROM berita LEFT JOIN pengguna ON pengguna.id = berita.created_by WHERE berita.id = '".$_GET['id']."' ");

			if(mysqli_num_rows($berita) == 0) {
				echo "<script>window.location = 'index.php'</script>";
			}

			$p = mysqli_fetch_object($berita);
		?>

		<h3 class="text-center"><?= $p->judul ?></h3>	
		<small>Dibuat pada <?= date('d/m/Y', strtotime($p->created_at)) ?>, oleh <?= $p->nama ?></small> 
		<img src="uploads/berita/<?= $p->gambar ?>" class="image" style="width: 50%; display: block; margin-left: auto; margin-right: auto; margin-top: 7px;">
		<?= $p->keterangan ?>
	</div>

</div>

<?php include "footer.php"; ?>