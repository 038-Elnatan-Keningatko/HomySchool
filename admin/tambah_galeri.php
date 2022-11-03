<?php include 'header.php' ?>

	<!-- content -->
	<div class="content">
		
		<div class="container">
			
			<div class="box">
				
				<div class="box-header">
					Tambah Data Galeri
				</div>

				<div class="box-body">
					
					<form action="" method="POST" enctype="multipart/form-data">
						
						<div class="form-group">
							<label>Keterangan</label>
							<textarea name="keterangan" placeholder="Keterangan" class="input-control" required autocomplete="off"></textarea>
						</div>

						<div class="form-group">
							<label>Gambar</label>
							<input type="file" name="gambar" class="input-control" required>
						</div>

						<button type="button" class="btn" onclick="window.location = 'galeri.php'">Kembali</button>

						<input type="submit" name="submit" value="simpan" class="btn btn-blue">

					</form>

					<?php 

					if(isset($_POST['submit'])) {

						$ket	= addslashes($_POST['keterangan']);

						$filename = $_FILES['gambar']['name'];
						$tmpname  = $_FILES['gambar']['tmp_name'];
						$filesize = $_FILES['gambar']['size'];

						$formatfile = pathinfo($filename, PATHINFO_EXTENSION);
						$rename 	= 'galeri'.time().'.'.$formatfile;

						$allowedtype = array('png', 'jpg', 'jpeg');

						if(!in_array($formatfile, $allowedtype)) {

							echo '<div class="alert alert-error">Gagal Simpan Foto! <br> (Jenis File: .png, .jpg, .jpeg)</div>';

						} elseif ($filesize > 1000000) {

							echo '<div class="alert alert-error">Ukuran File Max 1MB!</div>';
							
						} else {

							move_uploaded_file($tmpname, "../uploads/galeri/".$rename);

							$simpan = mysqli_query($connect, "INSERT INTO galeri VALUES (
								null,
								'".$rename."',
								'".$ket."',
								null,
								null
							)");

							if($simpan) {
								echo '<div class="alert alert-success">Berhasil Simpan Data!</div>';
							} else {
								echo "Gagal Simpan Data!".mysqli_error($connect);
							}

						}

					}

					?>

				</div>

			</div>

		</div>

	</div>

<?php include 'footer.php' ?>