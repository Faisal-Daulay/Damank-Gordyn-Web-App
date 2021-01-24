<div id="main_content">
	<form method="post" action="?page=bayar/pro_bayar.php" enctype="multipart/form-data">
		<div class="col-md-6">
			<?php
			include '../admin/koneksi.php';
			$sql = mysqli_query($db, "SELECT * FROM register WHERE id_regis='$id_regis' ");

			$ambil = mysqli_fetch_array($sql);
			$nama = $ambil['nama'];
			$alamat = $ambil['alamat'];
			$email = $ambil['email'];
			$notel = $ambil['no_tel'];
			$provinsi = $ambil['provinsi'];
			$kabupaten = $ambil['kabupaten'];
			?>
			<div class="box-pembeli">
				<div class="title">
					<blockquote>
						<p>Detail Pembeli</p>
					</blockquote>
				</div>
				<table class="detail_barang">
					<tr>
						<td>Nama Penerima</td>
						<td>:</td>
						<td><?= $nama; ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td><?= $email; ?></td>
					</tr>
					<tr>
						<td>No Telpon / Handphone</td>
						<td>:</td>
						<td><?= $notel; ?></td>
					</tr>
					<tr>
						<td>Provinsi</td>
						<td>:</td>
						<td><?= $provinsi; ?></td>
					</tr>
					<tr>
						<td>Kabupaten / Kota</td>
						<td>:</td>
						<td><?= $kabupaten; ?></td>
					</tr>
					<tr valign="top">
						<td>Alamat Lengkap</td>
						<td>:</td>
						<td><?= $alamat; ?></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="col-md-6">
			<div class="box-pembeli">
				<div class="title">
					<blockquote>
						<p>Detail Belanja</p>
					</blockquote>
				</div>
				<?php
				include '../admin/koneksi.php';
				$id_pro = $_SESSION['id_produk'];
				if (is_array($_SESSION['item'])) {
					foreach ($_SESSION['item'] as $index => $item) {
						if ($member = 'member') {
							$id = $item['id_produk'];
							$harga = $item['harga'];
							$napro = $item['nama_produk'];
							$jumlah1 = $item['jumlah1'];
							$img = $item['img'];
							$stok = $item['stok'];
							$diskon = $item['diskon'];

							$diskon1 = (($harga * $diskon) / 100);
							$bayar1 = ($harga - $diskon1);
							$tobay = $jumlah1 * $bayar1;
						}
				?>
						<div class="box-pro">
							<div class="img-pro">
								<img src="../img/produk/<?php echo $img; ?>">
							</div>
							<div class="box-isi">
								<p>
									<?php echo $napro; ?>
									<span class="harga" style="color: grey;">
										<del><?php echo "Rp. " . number_format($harga, 0, ',', '.'); ?></del>
									</span><br />
									<small class="harga">
										<?php echo "Rp. " . number_format($tobay, 0, ',', '.'); ?> -<?= $diskon; ?>%</small>
								</p>
								<small>
									Kuantitas : <?php echo $jumlah1; ?>
									<!-- <input type="number" name="kuantitas" class="form-control" style="width: 60px;" value="<?php echo $jumlah1; ?>" min="1" max="<?= $stok; ?>"> -->
								</small>
							</div>
						</div>
						<input type="hidden" name="id_produk[]" value="<?= $id; ?>">
						<input type="hidden" name="jumlah_barang[]" value="<?= $jumlah1; ?>">
				<?php }
				} ?>
				<div class="form-group">
					<label>Pilih Metode Pembayaran</label>
					<select name="metode" class="form-control text-uppercase" id="metode" onchange="Metode()">
						<option value="transfer">Transfer</option>
						<option value="cod">COD / Bayar di Tempat</option>
					</select>
				</div>
				<div class="form-group">
					<label>
						*Biaya kirim COD ditentukan secara manual
					</label>
				</div>
			</div>
			<div class="box-pembeli">
				<div class="title">
					<blockquote>
						<p>Ringkasan Belanja</p>
					</blockquote>
				</div>
				<table class="table table-striped">
					<?php
					if (is_array($_SESSION['item'])) {
						foreach ($_SESSION['item'] as $index => $item) {
							if ($member = 'member') {
								$harga = $item['harga'];
								$napro = $item['nama_produk'];
								$jumlah1 = $item['jumlah1'];

								$transfer = 30000;
								$hasil = $subtotal + $transfer;
							}
						}
					}
					?>
					<tr>
						<th>Total Harga Barang</th>
						<td>
							<p id="harga_awal"><?php echo "Rp. " . number_format($subtotal, 0, ',', '.'); ?></p>
						</td>
					</tr>
					<tr>
						<th>Biaya Kirim Transfer</th>
						<td>
							<?php echo "Rp. " . number_format($transfer, 0, ',', '.'); ?>
							<!-- <p id="demo"></p> -->
						</td>
					</tr>
					<tr>
						<th>Biaya Kirim COD</th>
						<td>
							<?php echo "Rp. - " ?>
							<!-- <p id="demo"></p> -->
						</td>
					</tr>
					<tr>
						<th>Total Belanja</th>
						<td>
							<?php echo "Rp. " . number_format($subtotal, 0, ',', '.'); ?>
							<!-- <p id="total_bayar"></p> -->
						</td>
					</tr>
				</table>
				<input type="hidden" name="total_bayar" value="<?= $subtotal; ?>">
				<input type="hidden" name="bayar_transfer" value="<?= $transfer; ?>">
				<input type="submit" value="Checkout" class="btn btn-danger text-uppercase">
			</div>
		</div>
	</form>
</div>