<?php include "header.php"; ?>

<div class="section">

	<div class="container">

		<?php 
			$tutor 	= mysqli_query($connect, "SELECT * FROM tutor WHERE id = '".$_GET['id']."' ");

			if(mysqli_num_rows($tutor) == 0) {
				echo "<script>window.location = 'index.php'</script>";
			}

			$p = mysqli_fetch_object($tutor);
		?>

		<h3 class="detail-tutor text-center"><?= $p->nama ?></h3>	
		<img src="uploads/tutor/<?= $p->foto ?>" class="image" style="height: 200px; display: block; margin-left: auto; margin-right: auto;">
		<ul class="detail-tutor">
			<li>
				<h4>Jabatan</h4>
				<p><?= $p->jabatan ?></p>
			</li>
			<li>
				<h4>Interest/Skill</h4>
				<?= $p->skill ?>
			</li>
		</ul>
	</div>

</div>

<?php include "footer.php"; ?>