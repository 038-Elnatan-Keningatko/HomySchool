<?php include 'header.php' ?>

<?php 
	$akademik 	= mysqli_query($connect, "SELECT * FROM akademik WHERE id = '".$_GET['id']."' ");

	if(mysqli_num_rows($akademik) == 0) {
		echo "<script>window.location = 'akademik.php'</script>";
	}

	$p = mysqli_fetch_object($akademik);
?>

	<!-- content -->
	<div class="content">
		
		<div class="container">
			
			<div class="box">
				
				<div class="box-header">
					Edit Data Akademik
				</div>

				<div class="box-body">
					
					<form action="" method="POST" enctype="multipart/form-data">

						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" placeholder="Nama Akademik" value="<?= $p->nama ?>" class="input-control" required autocomplete="off">
						</div>
						
						<div class="form-group">
							<label>Keterangan</label>
							<textarea name="keterangan" placeholder="Keterangan" class="input-control" id="keterangan"><?= $p->keterangan ?></textarea>
						</div>

						<div class="form-group">
							<label>Gambar</label>
							<img class="image" src="../uploads/akademik/<?= $p->gambar ?>" style="width: 200px;">
							<input type="hidden" name="gambar2" value="<?= $p->gambar ?>">
							<input type="file" name="gambar" class="input-control" >
						</div>

						<button type="button" class="btn" onclick="window.location = 'akademik.php'">Kembali</button>

						<input type="submit" name="submit" value="simpan" class="btn btn-blue">

					</form>

					<?php 

					if(isset($_POST['submit'])) {

						$nama	= addslashes(ucwords($_POST['nama']));
						$ket	= addslashes($_POST['keterangan']);
						$currdate = date('Y-m-d H:i:s');
						
						if($_FILES['gambar']['name'] != '') {

							$filename = $_FILES['gambar']['name'];
							$tmpname  = $_FILES['gambar']['tmp_name'];
							$filesize = $_FILES['gambar']['size'];

							$formatfile = pathinfo($filename, PATHINFO_EXTENSION);
							$rename 	= 'akademik'.time().'.'.$formatfile;

							$allowedtype = array('png', 'jpg', 'jpeg');

							if(!in_array($formatfile, $allowedtype)) {

								echo '<div class="alert alert-error">Gagal Simpan Foto! <br> (Jenis File: .png, .jpg, .jpeg)</div>';
								return false;

							} elseif ($filesize > 1000000) {

								echo '<div class="alert alert-error">Ukuran File Max 1MB!</div>';
								return false;
								
							} else {

								if(file_exists("../uploads/akademik/".$_POST['gambar2'])) {

									unlink("../uploads/akademik/".$_POST['gambar2']);

								}

								move_uploaded_file($tmpname, "../uploads/akademik/".$rename);

							}

						} else {

							$rename = $_POST['gambar2'];

						}

						$update = mysqli_query($connect, "UPDATE akademik SET
							nama = '".$nama."',
							keterangan = '".$ket."',
							gambar = '".$rename."',
							updated_at = '".$currdate."'

							WHERE id = '".$_GET['id']."'
						");

						if($update) {
							echo "<script>window.location='akademik.php?success=Edit Data Berhasil!'</script>";
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