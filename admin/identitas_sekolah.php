<?php include 'header.php' ?>

	<!-- content -->
	<div class="content">
		
		<div class="container">
			
			<div class="box">
				
				<div class="box-header">
					Edit Identitas Sekolah
				</div>

				<div class="box-body">

					<?php
						if(isset($_GET['success'])) {
							echo "<div class='alert alert-success'>".$_GET['success']."</div>";
						}
					?>
					
					<form action="" method="POST" enctype="multipart/form-data">

						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" placeholder="Nama Sekolah" value="<?= $d->nama ?>" class="input-control" required autocomplete="off">
						</div>

						<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" placeholder="Email Sekolah" value="<?= $d->email ?>" class="input-control" required autocomplete="off">
						</div>

						<div class="form-group">
							<label>Instagram</label>
							<input type="text" name="instagram" placeholder="Instagram Sekolah" value="<?= $d->instagram ?>" class="input-control" required autocomplete="off">
						</div>

						<div class="form-group">
							<label>Telepon Admin</label>
							<input type="text" name="telp_admin" placeholder="Telepon Admin" value="<?= $d->telepon_admin ?>" class="input-control" required autocomplete="off">
						</div>

						<div class="form-group">
							<label>Telepon Paud</label>
							<input type="text" name="telp_paud" placeholder="Telepon Paud" value="<?= $d->telepon_paud ?>" class="input-control" required autocomplete="off">
						</div>

						<div class="form-group">
							<label>Telepon Primary - Secondary</label>
							<input type="text" name="telp_ps" placeholder="Telepon Primary - Secondary" value="<?= $d->telepon_ps ?>" class="input-control" required autocomplete="off">
						</div>
						
						<div class="form-group">
							<label>Alamat</label>
							<textarea name="alamat" placeholder="Alamat Sekolah" class="input-control" autocomplete="off" ><?= $d->alamat ?></textarea>
						</div>

						<div class="form-group">
							<label>YouTube</label>
							<textarea name="youtube" placeholder="Youtube Sekolah" class="input-control" autocomplete="off" ><?= $d->youtube ?></textarea>
						</div>						

						<div class="form-group">
							<label>Google Maps</label>
							<textarea name="gmaps" placeholder="Google Maps Sekolah" class="input-control" autocomplete="off"><?= $d->google_maps ?></textarea>
						</div>

						<div class="form-group">
							<label>Logo</label>
							<img class="image" src="../uploads/identitas/<?= $d->logo ?>" style="width: 200px;">
							<input type="hidden" name="logo_lama" value="<?= $d->logo ?>">
							<input type="file" name="logo_baru" class="input-control" >
						</div>

						<div class="form-group">
							<label>Favicon</label>
							<img class="image" src="../uploads/identitas/<?= $d->favicon ?>" style="width: 32px;">
							<input type="hidden" name="favicon_lama" value="<?= $d->favicon ?>">
							<input type="file" name="favicon_baru" class="input-control" >
						</div>

						<input type="submit" name="submit" value="Simpan Perubahan" class="btn btn-blue">

					</form>

					<?php 

					if(isset($_POST['submit'])) {

						$nama		= addslashes(ucwords($_POST['nama']));
						$email		= addslashes($_POST['email']);
						$instagram 	= addslashes($_POST['instagram']);
						$telp_admin	= addslashes($_POST['telp_admin']);
						$telp_paud	= addslashes($_POST['telp_paud']);
						$telp_ps	= addslashes($_POST['telp_ps']);
						$alamat		= addslashes($_POST['alamat']);
						$youtube	= addslashes($_POST['youtube']);
						$gmaps		= addslashes($_POST['gmaps']);
						$currdate 	= date('Y-m-d H:i:s');
						
						// menampung dan validasi data logo
						if($_FILES['logo_baru']['name'] != '') {

							$filename_logo = $_FILES['logo_baru']['name'];
							$tmpname_logo  = $_FILES['logo_baru']['tmp_name'];
							$filesize_logo = $_FILES['logo_baru']['size'];

							$formatfile_logo = pathinfo($filename_logo, PATHINFO_EXTENSION);
							$rename_logo 	= 'logo'.time().'.'.$formatfile_logo;

							$allowedtype_logo = array('png', 'jpg', 'jpeg');

							if(!in_array($formatfile_logo, $allowedtype_logo)) {

								echo '<div class="alert alert-error">Gagal Simpan Logo! <br> (Jenis File: .png, .jpg, .jpeg)</div>';
								return false;

							} elseif ($filesize_logo > 1000000) {

								echo '<div class="alert alert-error">Ukuran File Logo Max 1MB!</div>';
								return false;
								
							} else {

								if(file_exists("../uploads/identitas/".$_POST['logo_lama'])) {

									unlink("../uploads/identitas/".$_POST['logo_lama']);

								}

								move_uploaded_file($tmpname_logo, "../uploads/identitas/".$rename_logo);

							}

						} else {

							$rename_logo = $_POST['logo_lama'];

						}

						// menampung dan validasi data favicon
						if($_FILES['favicon_baru']['name'] != '') {

							$filename_favicon = $_FILES['favicon_baru']['name'];
							$tmpname_favicon  = $_FILES['favicon_baru']['tmp_name'];
							$filesize_favicon = $_FILES['favicon_baru']['size'];

							$formatfile_favicon = pathinfo($filename_favicon, PATHINFO_EXTENSION);
							$rename_favicon 	= 'favicon'.time().'.'.$formatfile_favicon;

							$allowedtype_favicon = array('png', 'jpg', 'jpeg');

							if(!in_array($formatfile_favicon, $allowedtype_favicon)) {

								echo '<div class="alert alert-error">Gagal Simpan Favicon! <br> (Jenis File: .png, .jpg, .jpeg)</div>';
								return false;

							} elseif ($filesize_favicon > 1000000) {

								echo '<div class="alert alert-error">Ukuran File Favicon Max 1MB!</div>';
								return false;
								
							} else {

								if(file_exists("../uploads/identitas/".$_POST['favicon_lama'])) {

									unlink("../uploads/identitas/".$_POST['favicon_lama']);

								}

								move_uploaded_file($tmpname_favicon, "../uploads/identitas/".$rename_favicon);

							}

						} else {

							$rename_favicon = $_POST['favicon_lama'];

						}

						$update = mysqli_query($connect, "UPDATE pengaturan SET
							nama 			= '".$nama."',
							email 			= '".$email."',
							instagram		= '".$instagram."',
							telepon_admin 	= '".$telp_admin."',
							telepon_paud 	= '".$telp_paud."',
							telepon_ps 		= '".$telp_ps."',
							alamat 			= '".$alamat."',
							youtube			= '".$youtube."',
							logo 			= '".$rename_logo."',
							favicon 		= '".$rename_favicon."',
							google_maps 	= '".$gmaps."',
							updated_at 		= '".$currdate."'

							WHERE id = '".$d->id."'
						");

						if($update) {
							echo "<script>window.location='identitas_sekolah.php?success=Edit Data Berhasil!'</script>";
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