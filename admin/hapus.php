<?php 

	include '../koneksi.php';

	if(isset($_GET['idpengguna'])) {

		$delete = mysqli_query($connect, "DELETE FROM pengguna WHERE id = '".$_GET['idpengguna']."' ");
		echo "<script>window.location = 'pengguna.php'</script>";
	}

	if(isset($_GET['idakademik'])) {

		$akademik = mysqli_query($connect, "SELECT gambar FROM akademik WHERE id = '".$_GET['idakademik']."' ");

		if(mysqli_num_rows($akademik) > 0 ) {

			$p = mysqli_fetch_object($akademik);

			if(file_exists("../uploads/akademik/".$p->gambar)) {

				unlink("../uploads/akademik/".$p->gambar);

			}
			
		}

		$delete = mysqli_query($connect, "DELETE FROM akademik WHERE id = '".$_GET['idakademik']."' ");
		echo "<script>window.location = 'akademik.php'</script>";
	}

	if(isset($_GET['idgaleri'])) {

		$galeri = mysqli_query($connect, "SELECT foto FROM galeri WHERE id = '".$_GET['idgaleri']."' ");

		if(mysqli_num_rows($galeri) > 0 ) {

			$p = mysqli_fetch_object($galeri);

			if(file_exists("../uploads/galeri/".$p->foto)) {

				unlink("../uploads/galeri/".$p->foto);

			}
			
		}

		$delete = mysqli_query($connect, "DELETE FROM galeri WHERE id = '".$_GET['idgaleri']."' ");
		echo "<script>window.location = 'galeri.php'</script>";
	}

	if(isset($_GET['idberita'])) {

		$berita = mysqli_query($connect, "SELECT gambar FROM berita WHERE id = '".$_GET['idberita']."' ");

		if(mysqli_num_rows($berita) > 0 ) {

			$p = mysqli_fetch_object($berita);

			if(file_exists("../uploads/berita/".$p->gambar)) {

				unlink("../uploads/berita/".$p->gambar);

			}
			
		}

		$delete = mysqli_query($connect, "DELETE FROM berita WHERE id = '".$_GET['idberita']."' ");
		echo "<script>window.location = 'berita.php'</script>";
	}

	if(isset($_GET['idtutor'])) {

		$tutor = mysqli_query($connect, "SELECT foto FROM tutor WHERE id = '".$_GET['idtutor']."' ");

		if(mysqli_num_rows($tutor) > 0 ) {

			$p = mysqli_fetch_object($tutor);

			if(file_exists("../uploads/tutor/".$p->foto)) {

				unlink("../uploads/tutor/".$p->foto);

			}
			
		}

		$delete = mysqli_query($connect, "DELETE FROM tutor WHERE id = '".$_GET['idtutor']."' ");
		if($delete) {
			echo "<script>window.location = 'tutor.php'</script>";
			echo '<div class="alert alert-success">Berhasil Hapus Data!</div>';
		} else {
			echo "Gagal Simpan Data!".mysqli_error($connect);
		}
	}

	if(isset($_GET['idyayasan'])) {

		$tutor = mysqli_query($connect, "SELECT foto FROM yayasan WHERE id = '".$_GET['idyayasan']."' ");

		if(mysqli_num_rows($yayasan) > 0 ) {

			$p = mysqli_fetch_object($yayasan);

			if(file_exists("../uploads/yayasan/".$p->foto)) {

				unlink("../uploads/yayasan/".$p->foto);

			}
			
		}

		$delete = mysqli_query($connect, "DELETE FROM yayasan WHERE id = '".$_GET['idyayasan']."' ");
		if($delete) {
			echo "<script>window.location = 'yayasan.php'</script>";
			echo '<div class="alert alert-success">Berhasil Hapus Data!</div>';
		} else {
			echo "Gagal Simpan Data!".mysqli_error($connect);
		}
	}

?>