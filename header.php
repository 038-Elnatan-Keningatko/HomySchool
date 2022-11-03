<?php 
	session_start();
	include 'koneksi.php';
	date_default_timezone_set("Asia/Jakarta");

	$identitas = mysqli_query($connect, "SELECT * FROM pengaturan ORDER BY id DESC LIMIT 1");
	$d = mysqli_fetch_object($identitas);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="uploads/identitas/<?= $d->favicon ?>">
	<title>Website <?= $d->nama ?></title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" /></head>
<body>

	<!-- box menu -->
	<div class="box-menu-mobile" id="mobileMenu">
		<span onclick="hideMobileMenu()"><i class="fa-solid fa-bars"></i><a href="#"> Close</a></span>
		<ul class="text-center">
			<li><a href="index.php">Beranda</a></li>
			<li><a href="tentang_sekolah.php">Tentang</a></li>
			<li><a href="akademik.php">Akademik</a></li>
			<li><a href="galeri.php">Galeri</a></li>
			<li><a href="tutor.php">Tutor</a></li>
			<li><a href="berita.php">Berita</a></li>
			<li><a href="kontak.php">Kontak</a></li>
		</ul>
	</div>

	<!-- Bagian Header -->
	<div class="header">
		
		<div class="container">
			
			<div class="header-logo">
				<img src="uploads/identitas/<?= $d->logo ?>">
				<h2><a href="index.php"><?= $d->nama ?></h2>
			</div>

			<ul class="header-menu">
				<li><a href="index.php">Beranda</a></li>
				<li><a href="tentang_sekolah.php">Tentang</a></li>
				<li><a href="akademik.php">Akademik</a></li>
				<li><a href="galeri.php">Galeri</a></li>
				<li><a href="tutor.php">Data Yayasan/Tutor</a></li>
				<li><a href="berita.php">Berita</a></li>
				<li><a href="kontak.php">Kontak</a></li>
			</ul>

			<div class="mobile-menu-btn text-center">
				<a href="#" onclick="showMobileMenu()"><i class="fa-solid fa-bars"></i> Menu</a>
			</div>

		</div>

	</div>