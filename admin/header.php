<?php 
	session_start();
	include '../koneksi.php';
	if(!isset($_SESSION['status_login'])) {
		echo "<script>window.location = '../login.php?msg=Harap Login Terlebih Dahulu!'</script>";
	}
	date_default_timezone_set("Asia/Jakarta");

	$identitas = mysqli_query($connect, "SELECT * FROM pengaturan ORDER BY id DESC LIMIT 1");
	$d = mysqli_fetch_object($identitas);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../uploads/identitas/<?= $d->favicon ?>">
	<title>Admin - <?= $d->nama ?></title>
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

	<script>
		tinymce.init({
			selector: '#keterangan',
			plugins: [
				'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
			    'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media',
			    'table', 'emoticons', 'template', 'help'
			],
			toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
			    'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
			    'forecolor backcolor emoticons | help',
			menu: {
			    favs: { title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons' }
			}
		});
    </script>

</head>
<body class="bg-light">

	<!-- box menu -->
	<div class="box-menu-mobile" id="mobileMenu">
		<span onclick="hideMobileMenu()"><i class="fa-solid fa-bars"></i><a href="#"> Close</a></span>
		<ul class="text-center">
				<li><a href="index.php">Dasboard</a></li>

				<?php if($_SESSION['ulevel'] == 'Super Admin') { ?>

					<li><a href="pengguna.php">Pengguna</a></li>

				<?php } elseif($_SESSION['ulevel'] == 'Admin') { ?>

					<li><a href="akademik.php">Akademik</a></li>
					<li><a href="galeri.php">Galeri</a></li>
					<li>
						<div class="btn-setting">
							<a href="javascript:void(0);" onclick="yayasan()" class="yayasan">Yayasan <i class="fa fa-caret-down"></i></a>

							<!-- sub menu -->
							<div id="setting">
								<a href="yayasan.php">Yayasan</a>
								<a href="tutor.php">Tutor</a>
							</div>

						</div>

					</li>
					<li><a href="berita.php">Berita</a></li>
					<li>
						<div class="btn-setting">
							<a href="javascript:void(0);" onclick="pengaturan()" class="setting">Pengaturan <i class="fa fa-caret-down"></i></a>

							<!-- sub menu -->
							<div id="setting">
								<a href="identitas_sekolah.php">Identitas Sekolah</a>
								<a href="tentang_sekolah.php">Tentang Sekolah</a>
							</div>

						</div>

					</li>

				<?php } ?>

				<li>
					<div class="btn-user">
						<a href="javascript:void(0);" onclick="user()" class="user"><?= $_SESSION['uname'] ?> (<?= $_SESSION['ulevel'] ?>) <i class="fa fa-caret-down"></i></a>

						<!-- sub menu -->
						<div id="user">
							<a href="ubah_password.php">Ubah Password</a>
							<a href="logout.php">Keluar</a>
						</div>

					</div>

				</li>

			</ul>
	</div>

	<!-- Navbar -->
	<div class="navbar">
		
		<div class="container">
				
			<!-- Navbar Brand -->
			<h2 class="nav-brand float-left"><a href="index.php"><?= $d->nama ?></a></h2>

			<!-- Navbar Menu -->
			<ul class="nav-menu float-right">
				<li><a href="index.php">Dasboard</a></li>

				<?php if($_SESSION['ulevel'] == 'Super Admin') { ?>

					<li><a href="pengguna.php">Pengguna</a></li>

				<?php } elseif($_SESSION['ulevel'] == 'Admin') { ?>

					<li><a href="akademik.php">Akademik</a></li>
					<li><a href="galeri.php">Galeri</a></li>
					<li>
						<a href="#">Yayasan <i class="fa fa-caret-down"></i></a>

						<!-- sub yayasan -->
						<ul class="dropdown">
							<li><a href="yayasan.php">Yayasan</a></li>
							<li><a href="tutor.php">Tutor</a></li>
						</ul>
						
					</li>
					<li><a href="berita.php">Berita</a></li>
					<li>
						<a href="#">Pengaturan <i class="fa fa-caret-down"></i></a>

						<!-- sub pengaturan -->
						<ul class="dropdown">
							<li><a href="identitas_sekolah.php">Identitas Sekolah</a></li>
							<li><a href="tentang_sekolah.php">Tentang Sekolah</a></li>
						</ul>

					</li>

				<?php } ?>

				<li>
					<a href="#"><?= $_SESSION['uname'] ?> (<?= $_SESSION['ulevel'] ?>) <i class="fa fa-caret-down"></i></a>

					<!-- sub menu -->
					<ul class="dropdown">
						<li><a href="ubah_password.php">Ubah Password</a></li>
						<li><a href="logout.php">Keluar</a></li>
					</ul>
				</li>
			</ul>

			<div class="mobile-menu-btn mobile-menu-btn-admin text-center">
				<a href="#" onclick="showMobileMenu()"><i class="fa-solid fa-bars"></i> Menu</a>
			</div>

			<div class="clearfix"></div>

		</div>

	</div>