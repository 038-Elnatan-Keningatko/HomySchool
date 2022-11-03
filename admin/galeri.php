<?php include 'header.php' ?>

	<!-- content -->
	<div class="content">
		
		<div class="container">
			
			<div class="box">
				
				<div class="box-header">
					Galeri
				</div>

				<div class="box-body">
					
					<a href="tambah_galeri.php" class="text-green"><i class="fa fa-plus"></i>Tambah</a>

					<?php
						if(isset($_GET['success'])) {
							echo "<div class='alert alert-success'>".$_GET['success']."</div>";
						}
					?>

					<form action="">
						<div class="input-group">
							<input type="text" name="key" placeholder="Pencarian" autocomplete="off">
							<button type="submit"><i class="fa fa-search"></i></button>
						</div>
					</form>

					<table class="table">
						<thead>
							<tr>
								<th>No</th>
								<th>Foto</th>
								<th>Keterangan</th>
								<th>Aksi</th>
							</tr>
						</thead>

						<tbody>
							<?php 
							$no = 1;

								$where = " WHERE 1=1 ";
								if(isset($_GET['key'])) {
									$where .= " AND keterangan LIKE '%".addslashes($_GET['key'])."%' ";
								}

								$galeri = mysqli_query($connect, "SELECT * FROM galeri $where ORDER BY id DESC");
								if(mysqli_num_rows($galeri) > 0 ) {
									while ($p = mysqli_fetch_array($galeri)) {
							?>

							<tr>
								<td><?= $no++ ?></td>
								<td><img src="../uploads/galeri/<?= $p['foto'] ?>" style="width: 100px; margin: 0 auto; display: block;"></td>
								<td><?= $p['keterangan'] ?></td>
								</td>
								<td>
									<a href="edit_galeri.php?id=<?= $p['id'] ?>" title="Edit Data" class="text-orange"><i class="fa fa-edit"></i></a>
									<a href="hapus.php?idgaleri=<?= $p['id'] ?>" onclick="return confirm('Apakah yakin ingin menghapus foto ini?')" title="Hapus Data" class="text-red"><i class="fa fa-times"></i></a>
								</td>
							</tr>

							<?php }} else { ?> 
								<tr>
									<td colspan="4">Data Tidak Ada!</td>
								</tr>
							<?php } ?>
						</tbody>

					</table>

				</div>

			</div>

		</div>

	</div>

<?php include 'footer.php' ?>