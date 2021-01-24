<div id="main_content">
	<form method="post" action="?page=bayar/pro_bayar.php" enctype="multipart/form-data">
		<div class="col-md-8">
			<!-- <div class="box-pembeli">
    			<div class="title">
				    <blockquote >
				        <p>Detail Pembeli</p>
				    </blockquote>
			    </div>
				<div class="form-group">
					<label>Nama Pembeli</label>
					<input type="text" class="form-control" name="napem">
				</div>
				<div class="form-group">
					<label>E-mail Pembeli</label>
					<input type="text" class="form-control" name="email">
				</div>
				<div class="form-group">
					<label>Telepon / Handphone</label>
					<input type="text" class="form-control" name="hp">
				</div>
				<div class="form-group">
					<label>Provinsi</label>
					<select name="jenis" class="form-control">
						<option>Pilih Provinsi</option>
						<?php
						include 'admin/koneksi.php';
						$dml = mysqli_query($db, "SELECT * FROM provinsi ORDER BY code_provinsi DESC");
						while ($cek = mysqli_fetch_array($dml)) {
							$provinsi = $cek['nama_provinsi'];
						?>
							<option value="<?php echo $provinsi; ?>"><?php echo $provinsi; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label>Alamat Lengkap</label>
					<textarea class="form-control" name="alamat"></textarea>
				</div>
			</div> -->
			<div class="box-pembeli">
				<div class="title">
					<blockquote>
						<p>Detail Belanja</p>
					</blockquote>
				</div>
				<?php
				include 'admin/koneksi.php';
				$id = $_SESSION['id_produk'];
				if (is_array($_SESSION['item'])) {
					foreach ($_SESSION['item'] as $index => $item) {
						if ($member = 'member') {
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
						<form class="form-inline" action="?page=keranjang.php&keranjang=<?php echo $id; ?>" method="post">
							<div class="box-pro">
								<div class="img-pro">
									<img src="img/produk/<?php echo $img; ?>">
								</div>
								<div class="box-isi">
									<p>
										<?php echo $napro; ?>
										<span class="harga" style="color: grey;">
											<del><?php echo "Rp. " . number_format($harga, 0, ',', '.'); ?></del>
										</span><br />
										<span class="harga"><?php echo "Rp. " . number_format($tobay, 0, ',', '.'); ?></span>
									</p>
									<p>
										<?php echo $jumlah1; ?> Barang
									</p>
								</div>
							</div>
						</form>
				<?php }
				} ?>
				<!-- <div class="form-group">
					<label>Pilih Kurir</label>
					<select name="jenis" class="form-control">
						<option>Pilih Kurir</option>
						<?php
						include 'admin/koneksi.php';
						$dml1 = mysqli_query($db, "SELECT * FROM kurir ORDER BY id_kurir DESC");
						while ($cek1 = mysqli_fetch_array($dml1)) {
							$id_kurir = $cek1['id_kurir'];
							$kurir = $cek1['kurir'];
							$harga1 = $cek1['harga'];
						?>
							<option value="<?php echo $id_kurir; ?>"><?php echo $kurir; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label>Catatan</label>
					<textarea class="form-control" name="alamat"></textarea>
				</div> -->
			</div>
		</div>
		<div class="col-md-4">
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

								$hasil = $subtotal + $harga1;
								$transfer = 30000;
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
				<a href="admin/login.php" class="btn btn-warning">Masuk</a>
			</div>
		</div>
	</form>
</div>