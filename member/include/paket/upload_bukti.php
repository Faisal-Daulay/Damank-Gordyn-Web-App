<form action="?page=paket/proses_upload_bukti.php" method="post" enctype="multipart/form-data">
	<div class="col-md-6 ">
		<div class="box-pembeli">
			<div class="title">
				<blockquote>
					<p>Lacak Paket</p>
				</blockquote>
			</div>
			<?php
			include '../admin/koneksi.php';
			$invoice = $_GET['id'];
			$sql = mysqli_query($db, "SELECT * FROM pembayaran INNER JOIN produk ON pembayaran.id_produk=produk.id_produk INNER JOIN register ON pembayaran.id_regis=register.id_regis WHERE pembayaran.invoice='$invoice' ");

			while ($ambil = mysqli_fetch_array($sql)) {
				$id = $ambil['id_produk'];
				$id_bayar = $ambil['id_bayar'];
				$nama_produk = $ambil['nama_produk'];
				$id_produk = $ambil['id_produk'];
				$invoice = $ambil['invoice'];
				$tgl_pesan = $ambil['tgl_pesan'];
				$jumlah = $ambil['jumlah'];
				$total = $ambil['total'];
				$status_paket = $ambil['status_paket'];
				$nama = $ambil['nama'];
				$alamat = $ambil['alamat'];
				$metode_bayar = $ambil['metode_bayar'];
				$bukti_pembayaran = $ambil['bukti_pembayaran'];
				$bukti_resi = $ambil['bukti_resi'];
				$harga = $ambil['harga'];
				$diskon = $ambil['diskon'];

				$diskon1 = (($harga * $diskon) / 100);
				$bayar1 = ($harga - $diskon1);
				$kirim = 30000;
				$bayar2 = $bayar1 + $kirim;

				$dml = mysqli_query($db, "SELECT * FROM img_produk WHERE id_produk='$id' ");
				$ambil_img = mysqli_fetch_array($dml);
				$img = $ambil_img['img'];

				$tgl_beli = explode('-', $tgl_pesan);

				$y = $tgl_beli['0'];
				$m = $tgl_beli['1'];
				$d = $tgl_beli['2'];

				if ($status_paket == "dalam proses") {
					if ($bukti_pembayaran == "") {
			?>
				<div class="box-pro" style="overflow: hidden; height: auto;">
					<div class="img-pro">
						<img src="../img/produk/<?php echo $img; ?>">
					</div>
					<div class="box-isi text-capitalize">
						<p>
							<?php echo $nama_produk; ?>
							<span class="harga">Total : <?php echo "Rp. " . number_format($bayar2, 0, ',', '.'); ?></span>
						</p>
						<small>
							<strong>Jumlah Barang</strong> : <?php echo $jumlah; ?> |
							<strong>Tanggal Pembelian</strong> : <?php echo "$d-$m-$y"; ?>
						</small>
						<table class="table table-bordered table-striped">
							<tr>
								<th>Invoice</th>
								<td><?php echo $invoice; ?></td>
								<input type="hidden" name="id_prooduk[]" value="<?= $id_bayar ?>">
							</tr>
							<tr>
								<th>No Resi</th>
								<td><?php echo $bukti_resi; ?></td>
							</tr>
							<tr>
								<th>Penerima</th>
								<td><?php echo $nama; ?></td>
							</tr>
							<tr>
								<th>Alamat</th>
								<td><?php echo $alamat; ?></td>
							</tr>
							<tr>
								<th>Status Pengiriman</th>
								<td><?php echo $status_paket; ?></td>
							</tr>
							<tr>
								<th>Metode Pengiriman</th>
								<td><?php echo $metode_bayar; ?> (Rp. 30.000)</td>
							</tr>
						</table>
					</div>
				</div>
			<?php }
				}
			} ?>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<h2>Total : <?php echo "Rp. " . number_format($total, 0, ',', '.'); ?></h2>
			<div class="col-md-4">
				<?php
				$id_bayar = $_GET['id'];
				?>
				<div class="form-group">
					<label for="exampleInputPassword1">Upload Bukti Transaksi</label>
					<input type="hidden" name="id" class="form-control" value="<?= $id_bayar; ?>">
					<input type="file" name="upload_bukti[]" class="form-control">
				</div>
				<button type="submit" class="btn btn-primary mt-2">Send </button>
			</div>
			<div class="col-md-4">
				<label>Mohon di baca terlebih dahulu sebelum upload bukti pembayaran!</label>
				<ol>
					<li>Bukti pembayaran harus berupa gambar</li>
					<li>Bukti pembayaran hanya bisa di upload sekali</li>
					<li>Bukti pembayaran yang sudah di upload akan di cek, sehingga kalau bukti pembayaran tidak sesuai kami akan menghubungi anda.</li>
				</ol>
			</div>
		</div>
	</div>

	<hr>
</form>