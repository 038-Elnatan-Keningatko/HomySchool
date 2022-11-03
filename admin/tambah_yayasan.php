<?php include 'header.php' ?>

	<!-- content -->
	<div class="content">
		
		<div class="container">
			
			<div class="box">
				
				<div class="box-header">
					Tambah Anggota Yayasan
				</div>

				<div class="box-body">
					
					<form action="" method="POST" enctype="multipart/form-data">

						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" placeholder="Nama dan Title" class="input-control" required autocomplete="off">
						</div>
						
						<div class="form-group">
							<label>Jabatan</label>
							<input type="text" name="jabatan" placeholder="Jabatan" class="input-control" required autocomplete="off">
						</div>

						<div class="form-group">
							<label>Interest/Skill</label>
							<textarea name="skill" placeholder="Interest/Skill" class="input-control" autocomplete="off" ></textarea>
						</div>

						<div class="form-group">
							<label>Foto</label>
							<input type="file" name="gambar" class="input-control" required>
						</div>

						<button type="button" class="btn" onclick="window.location = 'yayasan.php'">Kembali</button>

						<input type="submit" name="submit" value="simpan" class="btn btn-blue">

					</form>

					<?php 

					if(isset($_POST['submit'])) {

						$nama		= addslashes(ucwords($_POST['nama']));
						$jabatan	= addslashes($_POST['jabatan']);
						$skill		= addslashes($_POST['skill']);

						$filename = $_FILES['gambar']['name'];
						$tmpname  = $_FILES['gambar']['tmp_name'];
						$filesize = $_FILES['gambar']['size'];

						$formatfile = pathinfo($filename, PATHINFO_EXTENSION);
						$rename 	= 'yayasan'.time().'.'.$formatfile;

						$allowedtype = array('png', 'jpg', 'jpeg');

						if(!in_array($formatfile, $allowedtype)) {

							echo '<div class="alert alert-error">Gagal Simpan Foto! <br> (Jenis File: .png, .jpg, .jpeg)</div>';

						} elseif ($filesize > 5000000) {

							echo '<div class="alert alert-error">Ukuran File Max 5MB!</div>';
							
						} else {

							move_uploaded_file($tmpname, "../uploads/yayasan/".$rename);

							$simpan = mysqli_query($connect, "INSERT INTO yayasan VALUES (
								null,
								'".$nama."',
								'".$jabatan."',
								'".$skill."',
								'".$rename."'
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