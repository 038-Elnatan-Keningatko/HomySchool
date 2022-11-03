<?php include 'header.php' ?>

<?php 
	$galeri 	= mysqli_query($connect, "SELECT * FROM galeri WHERE id = '".$_GET['id']."' ");

	if(mysqli_num_rows($galeri) == 0) {
		echo "<script>window.location = 'galeri.php'</script>";
	}

	$p = mysqli_fetch_object($galeri);
?>

	<!-- content -->
	<div class="content">
		
		<div class="container">
			
			<div class="box">
				
				<div class="box-header">
					Edit Data Galeri
				</div>

				<div class="box-body">
					
					<form action="" method="POST" enctype="multipart/form-data">
						
						<div class="form-group">
							<label>Keterangan</label>
							<input type="text" name="keterangan" placeholder="Keterangan" value="<?= $p->keterangan ?>" class="input-control" required autocomplete="off">
						</div>

						<div class="form-group">
							<label>Gambar</label>
							<img class="image" src="../uploads/galeri/<?= $p->foto ?>" style="width: 200px;">
							<input type="hidden" name="gambar2" value="<?= $p->foto ?>">
							<input type="file" name="gambar" class="input-control" >
						</div>

						<button type="button" class="btn" onclick="window.location = 'galeri.php'">Kembali</button>

						<input type="submit" name="submit" value="simpan" class="btn btn-blue">

					</form>

					<?php 

					if(isset($_POST['submit'])) {

						$ket	= addslashes($_POST['keterangan']);
						$currdate = date('Y-m-d H:i:s');
						
						if($_FILES['gambar']['name'] != '') {

							$filename = $_FILES['gambar']['name'];
							$tmpname  = $_FILES['gambar']['tmp_name'];
							$filesize = $_FILES['gambar']['size'];

							$formatfile = pathinfo($filename, PATHINFO_EXTENSION);
							$rename 	= 'galeri'.time().'.'.$formatfile;

							$allowedtype = array('png', 'jpg', 'jpeg');

							if(!in_array($formatfile, $allowedtype)) {

								echo '<div class="alert alert-error">Gagal Simpan Foto! <br> (Jenis File: .png, .jpg, .jpeg)</div>';
								return false;

							} elseif ($filesize > 1000000) {

								echo '<div class="alert alert-error">Ukuran File Max 1MB!</div>';
								return false;
								
							} else {

								if(file_exists("../uploads/galeri/".$_POST['gambar2'])) {

									unlink("../uploads/galeri/".$_POST['gambar2']);

								}

								move_uploaded_file($tmpname, "../uploads/galeri/".$rename);

							}

						} else {

							$rename = $_POST['gambar2'];

						}

						$update = mysqli_query($connect, "UPDATE galeri SET
							keterangan = '".$ket."',
							foto = '".$rename."',
							updated_at = '".$currdate."'

							WHERE id = '".$_GET['id']."'
						");

						if($update) {
							echo "<script>window.location='galeri.php?success=Edit Data Berhasil!'</script>";
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