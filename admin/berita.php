<?php include 'header.php' ?>

	<!-- content -->
	<div class="content">
		
		<div class="container">
			
			<div class="box">
				
				<div class="box-header">
					Berita
				</div>

				<div class="box-body">
					
					<a href="tambah_berita.php" class="text-green"><i class="fa fa-plus"></i>Tambah</a>

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
								<th>Judul</th>
								<th>Keterangan</th>
								<th>Gambar</th>
								<th>Aksi</th>
							</tr>
						</thead>

						<tbody>
							<?php 
							$no = 1;

								$where = " WHERE 1=1 ";
								if(isset($_GET['key'])) {
									$where .= " AND judul LIKE '%".addslashes($_GET['key'])."%' ";
								}

								$berita = mysqli_query($connect, "SELECT * FROM berita $where ORDER BY id DESC");
								if(mysqli_num_rows($berita) > 0 ) {
									while ($p = mysqli_fetch_array($berita)) {
							?>

							<tr>
								<td><?= $no++ ?></td>
								<td><?= $p['judul'] ?></td>
								<td><?= substr($p['keterangan'], 0, 100) ?> . . .</td>
								<td><img src="../uploads/berita/<?= $p['gambar'] ?>" 
										style="width: 100px; margin: 0 auto; display: block;">
								</td>
								<td>
									<a href="edit_berita.php?id=<?= $p['id'] ?>" title="Edit Data" class="text-orange"><i class="fa fa-edit"></i></a>
									<a href="hapus.php?idberita=<?= $p['id'] ?>" onclick="return confirm('Apakah yakin ingin menghapus berita ini?')" title="Hapus Data" class="text-red"><i class="fa fa-times"></i></a>
								</td>
							</tr>

							<?php }} else { ?> 
								<tr>
									<td colspan="5">Data Tidak Ada!</td>
								</tr>
							<?php } ?>
						</tbody>

					</table>

				</div>

			</div>

		</div>

	</div>

<?php include 'footer.php' ?>