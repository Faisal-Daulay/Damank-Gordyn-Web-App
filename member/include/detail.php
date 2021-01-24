<div class="row">
	<?php
	include '../admin/koneksi.php';
	$id = $_REQUEST['detail'];
	$catalog = $_REQUEST['catalog'];
	$sql = mysqli_query($db, "SELECT * FROM produk WHERE id_produk='$id' ORDER BY id_produk DESC");
	while ($ambil = mysqli_fetch_array($sql)) {
		$id = $ambil['id_produk'];
		$napro = $ambil['nama_produk'];
		$kualitas = $ambil['kualitas'];
		$desk = $ambil['desk'];
		$stok = $ambil['stok'];
		$harga = $ambil['harga'];
		$diskon = $ambil['diskon'];

		$dml = mysqli_query($db, "SELECT * FROM img_produk WHERE id_produk='$id' ");
		$ambil_img = mysqli_fetch_array($dml);
		$img = $ambil_img['img'];

		$diskon1 = (($harga * $diskon) / 100);
		$bayar1 = ($harga - $diskon1);

		$_SESSION['nama_produk'] = $napro;
		$_SESSION['harga'] = $harga;
		$_SESSION['stok'] = $stok;
		$_SESSION['id_produk'] = $id;
		$_SESSION['img'] = $img;
		$_SESSION['diskon'] = $diskon;

		if ($kualitas == 'Baru') {
			$color = 'btn-primary';
		} else {
			$color = 'btn-warning';
		}
	?>

		<form class="form-inline" action="?page=keranjang.php&keranjang=<?php echo $id; ?>" method="post">
			<div class="col-md-12">
				<?php
				if ($catalog != "on") {
				?>
					<div class="col-md-6 img">
						<img class="thumbnail" src="../img/produk/<?php echo $img; ?>">

						<?php

						$dml1 = mysqli_query($db, "SELECT * FROM img_produk WHERE id_produk='$id' LIMIT 0,5 ");
						while ($ambil_img1 = mysqli_fetch_array($dml1)) {
							$img = $ambil_img1['img'];
						?>
							<!-- Images used to open the lightbox -->
							<div class="column">
								<img src="../img/produk/<?php echo $img; ?>" onclick="openModal();currentSlide(1)" class="hover-shadow">
							</div>
						<?php } ?>

						<!-- The Modal/Lightbox -->
						<div id="myModal" class="modal">
							<span class="close cursor" onclick="closeModal()">&times;</span>
							<div class="modal-content">

								<?php

								$dml2 = mysqli_query($db, "SELECT * FROM img_produk WHERE id_produk='$id' LIMIT 0,5 ");
								while ($ambil_img2 = mysqli_fetch_array($dml2)) {
									$img1 = $ambil_img2['img'];
								?>
									<div class="mySlides">
										<div class="numbertext">1 / 4</div>
										<img src="../img/produk/<?php echo $img1; ?>" style="width:98.5%;">
									</div>
								<?php } ?>

								<!-- Next/previous controls -->
								<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
								<a class="next" onclick="plusSlides(1)">&#10095;</a>

								<!-- Caption text -->
								<div class="caption-container">
									<p id="caption"></p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<table class="detail_barang">
							<tr>
								<td>
									<h3><?= $napro; ?></h3>
								</td>
							</tr>
							<tr valign="top">
								<td>Harga</td>
								<td>
									<del><?php echo "Rp. " . number_format($harga, 0, ',', '.'); ?></del>
									-<?= $diskon; ?>%
									<br />
									<span style="color: red; font-weight: 500;"><?php echo "Rp. " . number_format($bayar1, 0, ',', '.'); ?></span>
								</td>
							</tr>
							<tr>
								<td>Stok</td>
								<td><?= $stok; ?></td>
							</tr>
							<tr>
								<td>Jenis</td>
								<td><?= $kualitas; ?></td>
							</tr>
							<tr>
								<td>Kuantitas</td>
								<td>
									<input type="number" id="jumlah" required="" class="form-control" autocomplete="off" style="width: 60px;" name="jumlah1" max="<?= $stok; ?>" min="1" value="1">
								</td>
							</tr>
						</table>


						<input type="submit" name="tombol" value="Beli Sekarang" class="btn btn-warning" style="margin-top: 20px;">

						<input type="submit" name="tombol" value="Tambah ke Troli" class="btn btn-danger" style="margin-top: 20px;">
					</div>
					<div class="col-md-12">
						<div class="col-md-6">
							<h2>Deskripsi</h2>
							<p>
								<?= $desk; ?>
							</p>
						</div>
						<div class="col-md-6">
							<h2>Ulasan</h2>
							<?php
							$sql_ulasan = mysqli_query($db, "SELECT * FROM ulasan INNER JOIN register ON ulasan.id_regis=register.id_regis INNER JOIN produk ON ulasan.id_produk=produk.id_produk WHERE ulasan.id_produk='$id' ");

							while ($ambil_ulasan = mysqli_fetch_array($sql_ulasan)) {

								$id_ulasan = $ambil_ulasan['id_ulasan'];
								$ulasan = $ambil_ulasan['ulasan'];
								$rating = $ambil_ulasan['rating'];
								$tgl_ulas = $ambil_ulasan['tgl_ulas'];
								$nama = $ambil_ulasan['nama'];
								$nama = $ambil_ulasan['nama'];
								$foto = $ambil_ulasan['foto'];

							?>
								<div class="media">
									<div class="media-left">
										<a href="#">
											<img class="media-object" src="../img/profil/<?= $foto; ?>.jpg" style="width: 100px;">
										</a>
									</div>
									<div class="media-body">
										<h4 class="media-heading"><?= $nama ?></h4>
										<small>Rating : <?= $rating ?></small>
										<p>
											<?= $ulasan ?>
										</p>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				<?php } else { ?>
					<div class="col-md-6 img">
						<img class="thumbnail" src="../img/produk/<?php echo $img; ?>">

						<?php

						$dml1 = mysqli_query($db, "SELECT * FROM img_produk WHERE id_produk='$id' LIMIT 0,5 ");
						while ($ambil_img1 = mysqli_fetch_array($dml1)) {
							$img = $ambil_img1['img'];
						?>
							<!-- Images used to open the lightbox -->
							<div class="column">
								<img src="../img/produk/<?php echo $img; ?>" onclick="openModal();currentSlide(1)" class="hover-shadow">
							</div>
						<?php } ?>

						<!-- The Modal/Lightbox -->
						<div id="myModal" class="modal">
							<span class="close cursor" onclick="closeModal()">&times;</span>
							<div class="modal-content">

								<?php

								$dml2 = mysqli_query($db, "SELECT * FROM img_produk WHERE id_produk='$id' LIMIT 0,5 ");
								while ($ambil_img2 = mysqli_fetch_array($dml2)) {
									$img1 = $ambil_img2['img'];
								?>
									<div class="mySlides">
										<div class="numbertext">1 / 4</div>
										<img src="../img/produk/<?php echo $img1; ?>" style="width:98.5%;">
									</div>
								<?php } ?>

								<!-- Next/previous controls -->
								<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
								<a class="next" onclick="plusSlides(1)">&#10095;</a>

								<!-- Caption text -->
								<div class="caption-container">
									<p id="caption"></p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<table class="detail_barang">
							<tr>
								<td>
									<h3><?= $napro; ?></h3>
								</td>
							</tr>
							<tr valign="top">
								<td>Harga</td>
								<td>
									<del><?php echo "Rp. " . number_format($harga, 0, ',', '.'); ?></del>
									-<?= $diskon; ?>%
									<br />
									<span style="color: red; font-weight: 500;"><?php echo "Rp. " . number_format($bayar1, 0, ',', '.'); ?></span>
								</td>
							</tr>
							<tr>
								<td>Stok</td>
								<td><?= $stok; ?></td>
							</tr>
							<tr>
								<td>Jenis</td>
								<td><?= $kualitas; ?></td>
							</tr>
							<tr>
								<td>Kuantitas</td>
								<td>
									<input type="number" id="jumlah" required="" class="form-control" autocomplete="off" style="width: 60px;" name="jumlah1" max="<?= $stok; ?>" min="1" value="1">
								</td>
							</tr>
						</table>
					</div>
					<div class="col-md-12">
						<div class="col-md-6">
							<h2>Deskripsi</h2>
							<p>
								<?= $desk; ?>
							</p>
						</div>
					</div>
				<?php } ?>
			</div>
		<?php } ?>
		</form>
</div>