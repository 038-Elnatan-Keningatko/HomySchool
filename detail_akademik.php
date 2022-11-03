<?php include "header.php"; ?>

<div class="section">

	<div class="container">

		<?php 
			$akademik 	= mysqli_query($connect, "SELECT * FROM akademik WHERE id = '".$_GET['id']."' ");

			if(mysqli_num_rows($akademik) == 0) {
				echo "<script>window.location = 'index.php'</script>";
			}

			$p = mysqli_fetch_object($akademik);
		?>

		<h3 class="text-center"><?= $p->nama ?></h3>	
		<img src="uploads/akademik/<?= $p->gambar ?>" class="image" style="width: 50%; display: block; margin-left: auto; margin-right: auto;">
		<?= $p->keterangan ?>
	</div>

</div>

<?php include "footer.php"; ?>