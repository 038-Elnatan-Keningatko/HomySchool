<?php 
	session_start();
	include 'koneksi.php';

	$identitas = mysqli_query($connect, "SELECT * FROM pengaturan ORDER BY id DESC LIMIT 1");
	$d = mysqli_fetch_object($identitas);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="uploads/identitas/<?= $d->favicon ?>">
	<title>Halaman Login</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<!-- page-login -->
	<div class="page-login">
		
		<!-- box -->
		<div class="box box-login">
			
			<!-- box header -->
			<div class="box-header text-center">
				<img src="uploads/identitas/<?= $d->logo ?>">
				<h3>Login Administrator</h3>
			</div>
			
			<!-- box body -->
			<div class="box-body">

				<?php 
					if(isset($_GET['msg'])) {
						echo "<div class='alert alert-error'>".$_GET['msg']."</div>"; 
					}
				?>
				
				<!-- form login -->
				<form action="" method="POST">

					<div class="form-group">
						<label><h4>Username</h4></label>
						<input type="text" name="user" placeholder="Username" class="input-control" autocomplete="off">
					</div>
					<div class="form-group">
						<label><h4>Password</h4></label>
						<input type="password" name="pass" placeholder="Password" class="input-control" autocomplete="off">
					</div>

					<div class="text-center">
						<input type="submit" name="submit" value="Login" class="btn">
					</div>

				</form>

				<?php 
					if(isset($_POST['submit'])) {

						$user = mysqli_real_escape_string($connect, $_POST['user']);
						$pass = mysqli_real_escape_string($connect, $_POST['pass']);

						$cek = mysqli_query($connect, "SELECT * FROM pengguna WHERE username = '".$user."' ");
						if(mysqli_num_rows($cek) > 0) {
							
							$d = mysqli_fetch_object($cek);
							if(md5($pass) == $d -> password) {

								$_SESSION['status_login'] = true;
								$_SESSION['uid']		  = $d -> id;
								$_SESSION['uname']		  = $d -> nama;
								$_SESSION['ulevel']		  = $d -> level;

								echo "<script> window.location = 'admin/index.php' </script>";

							} else {
								echo '<div class="alert alert-error">Password Salah!</div>';
							}

						} else {
							echo '<div class="alert alert-error">Username Tidak Ditemukan!</div>';
						}
					}
				?>
			</div>

			<!-- box footer -->
			<div class="box-footer text-center">
				<a href="index.php">Home</a>
			</div>
		</div>
	</div>
</body>
</html>