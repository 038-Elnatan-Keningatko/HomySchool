<?php include 'header.php' ?>

	<!-- content -->
	<div class="content">
		
		<div class="container">
			
			<div class="box">
				
				<div class="box-header">
					Ubah Password Pengguna
				</div>

				<div class="box-body">
					
					<form action="" method="POST">

						<div class="form-group">
							<label>Password</label>
							<input type="password" name="pass" placeholder="Password" class="input-control" required>
						</div>
						
						<div class="form-group">
							<label>Ulangi Password</label>
							<input type="password" name="conf_pass" placeholder="Ulangi Password" class="input-control" required>
						</div>

						<input type="submit" name="submit" value="Ubah Password" class="btn btn-blue">

					</form>

					<?php 

					if(isset($_POST['submit'])) {
						$pass		= addslashes(ucwords($_POST['pass']));
						$conf_pass	= addslashes($_POST['conf_pass']);
						$currdate = date('Y-m-d H:i:s');

						if($conf_pass != $pass) {
							echo '<div class="alert alert-error">Ulangi Password Tidak Sama!</div>';
						} else {

							$update = mysqli_query($connect, "UPDATE pengguna SET
							password = '".md5($pass)."',
							updated_at = '".$currdate."'

							WHERE id = '".$_SESSION['uid']."'
						 ");

							if($update) {
								echo '<div class="alert alert-success">Ubah Password Berhasil!</div>';
							} else {
								echo "Gagal Edit Data!".mysqli_error($connect);
							}
						}
					}

					?>

				</div>

			</div>

		</div>

	</div>

<?php include 'footer.php' ?>