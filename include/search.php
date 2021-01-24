	<?php 
		$cari = $_REQUEST['cari'];
	 ?>
	<h3 class="text-center text-uppercase">HASIL PENCARIAN <?= $cari ?></h3>
	<div class="row">
		<hr width="200">
		<?php
		include 'admin/koneksi.php';
		$cari = $_REQUEST['cari'];
		$sql = mysqli_query($db, "SELECT * FROM produk INNER JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE nama_produk LIKE '%$cari%' AND nama_kategori='Aksesoris' ORDER BY produk.id_produk DESC LIMIT 0,4");
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

			if ($kualitas == 'Baru') {
				$color = 'btn-primary';
			} else {
				$color = 'btn-warning';
			}
		?>
			<div class="col-md-3">
				<div class="produk">
					<p>
						<small class="<?php echo $color; ?>"><?php echo $kualitas; ?></small>
						<small class="btn-danger" style="padding: 2px; font-size: 18px; border-radius: 10px;"><?php echo $diskon; ?>%</small>
					</p>
					<div class="imgpro">
						<img src="img/produk/<?php echo $img; ?>">
					</div>
					<div class="caption">
						<h3 class="text-capitalize"><?php echo $napro; ?></h3>
						<p style="color: grey">
							<del>
								<?php echo "Rp. " . number_format($harga, 0, ',', '.'); ?>
							</del>
						</p>
						<p>
							<?php echo "Rp. " . number_format($bayar1, 0, ',', '.'); ?>
						</p>
						<p>
							<small>Stok : <?php echo $stok; ?></small>
						</p>
						<p>
							<a href="?page=detail.php&detail=<?php echo $id; ?>" class="btn btn-primary" role="button">Lihat Detail</a>
						</p>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>

	<div class="row">
		<hr width="200">
		<?php
		include 'admin/koneksi.php';
		$cari = $_REQUEST['cari'];
		$sql = mysqli_query($db, "SELECT * FROM produk INNER JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE nama_produk LIKE '%$cari%' AND nama_kategori='Catalog' ORDER BY produk.id_produk DESC LIMIT 0,4");

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

			if ($kualitas == 'Baru') {
				$color = 'btn-primary';
			} else {
				$color = 'btn-warning';
			}
		?>
			<div class="col-md-3">
				<div class="produk">
					<p>
						<small class="<?php echo $color; ?>"><?php echo $kualitas; ?></small>
						<small class="btn-danger" style="padding: 2px; font-size: 18px; border-radius: 10px;"><?php echo $diskon; ?>%</small>
					</p>
					<div class="imgpro">
						<img src="img/produk/<?php echo $img; ?>">
					</div>
					<div class="caption">
						<h3 class="text-capitalize"><?php echo $napro; ?></h3>
						<p style="color: grey">
							<del>
								<?php echo "Rp. " . number_format($harga, 0, ',', '.'); ?>
							</del>
						</p>
						<p>
							<?php echo "Rp. " . number_format($bayar1, 0, ',', '.'); ?>
						</p>
						<p>
							<small>Stok : <?php echo $stok; ?></small>
						</p>
						<p>
							<a href="?page=detail.php&detail=<?php echo $id; ?>&catalog=on" class="btn btn-primary" role="button">Lihat Detail</a>
						</p>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>