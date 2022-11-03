<?php include 'header.php' ?>

<?php 
	$tutor 	= mysqli_query($connect, "SELECT * FROM tutor WHERE id = '".$_GET['id']."' ");

	if(mysqli_num_rows($tutor) == 0) {
		echo "<script>window.location = 'tutor.php'</script>";
	}

	$p = mysqli_fetch_object($tutor);
?>

	<!-- content -->
	<div class="content">
		
		<div class="container">
			
			<div class="box">
				
				<div class="box-header">
					Edit Data Tutor
				</div>

				<div class="box-body">
					
					<form action="" method="POST" enctype="multipart/form-data">

						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" placeholder="Nama dan Title" value="<?= $p->nama ?>" class="input-control" required autocomplete="off">
						</div>

						<div class="form-group">
							<label>Jabatan</label>
							<input type="text" name="jabatan" placeholder="Jabatan" value="<?= $p->jabatan ?>" class="input-control" required autocomplete="off">
						</div>
						
						<div class="form-group">
							<label>Interest/Skill</label>
							<textarea name="skill" placeholder="Interest/Skill" class="input-control"><?= $p->skill ?></textarea>
						</div>

						<div class="form-group">
							<label>Foto</label>
							<img class="image" src="../uploads/tutor/<?= $p->foto ?>" style="width: 200px;">
							<input type="hidden" name="gambar2" value="<?= $p->foto ?>">
							<input type="file" name="gambar" class="input-control" >
						</div>

						<button type="button" class="btn" onclick="window.location = 'tutor.php'">Kembali</button>

						<input type="submit" name="submit" value="simpan" class="btn btn-blue">

					</form>

					<?php 

					if(isset($_POST['submit'])) {

						$nama		= addslashes(ucwords($_POST['nama']));
						$jabatan	= addslashes($_POST['jabatan']);
						$skill		= addslashes($_POST['skill']);
						
						if($_FILES['gambar']['name'] != '') {

							$filename = $_FILES['gambar']['name'];
							$tmpname  = $_FILES['gambar']['tmp_name'];
							$filesize = $_FILES['gambar']['size'];

							$formatfile = pathinfo($filename, PATHINFO_EXTENSION);
							$rename 	= 'tutor'.time().'.'.$formatfile;

							$allowedtype = array('png', 'jpg', 'jpeg');

							if(!in_array($formatfile, $allowedtype)) {

								echo '<div class="alert alert-error">Gagal Simpan Foto! <br> (Jenis File: .png, .jpg, .jpeg)</div>';
								return false;

							} elseif ($filesize > 5000000) {

								echo '<div class="alert alert-error">Ukuran File Max 5MB!</div>';
								return false;
								
							} else {

								if(file_exists("../uploads/tutor/".$_POST['gambar2'])) {

									unlink("../uploads/tutor/".$_POST['gambar2']);

								}

								move_uploaded_file($tmpname, "../uploads/tutor/".$rename);

							}

						} else {

							$rename = $_POST['gambar2'];

						}

						$update = mysqli_query($connect, "UPDATE tutor SET
							nama = '".$nama."',
							jabatan = '".$jabatan."',
							skill = '".$skill."',
							foto = '".$rename."'

							WHERE id = '".$_GET['id']."'
						");

						if($update) {
							echo "<script>window.location='tutor.php?success=Edit Data Berhasil!'</script>";
						} else {
							echo "Gagal Edit Data!".mysqli_error($connect);
						}

					}

					?>

				</div>

			</div>

		</div>

	</div>

<?php include 'footer.php' ?>