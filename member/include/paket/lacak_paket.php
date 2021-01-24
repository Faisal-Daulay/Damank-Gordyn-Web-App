	<div class="col-md-12">
		<div class="box-pembeli">
			<div class="title">
				<blockquote>
					<p>Lacak Paket</p>
				</blockquote>
			</div>
			<?php
			include '../admin/koneksi.php';
			$sql = mysqli_query($db, "SELECT * FROM pembayaran INNER JOIN produk ON pembayaran.id_produk=produk.id_produk INNER JOIN register ON pembayaran.id_regis=register.id_regis WHERE register.id_regis='$id_regis' ORDER BY pembayaran.invoice DESC ");

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

				$dml = mysqli_query($db, "SELECT * FROM img_produk WHERE id_produk='$id' ");
				$ambil_img = mysqli_fetch_array($dml);
				$img = $ambil_img['img'];

				$tgl_beli = explode('-', $tgl_pesan);

				$y = $tgl_beli['0'];
				$m = $tgl_beli['1'];
				$d = $tgl_beli['2'];

				if ($metode_bayar == "transfer") {
					if ($bukti_pembayaran == "") {
						$bayar_sekarang = "<a href='?page=paket/upload_bukti.php&id=$invoice' class='btn btn-warning' style='float: right;'>Bayar Sekarang</a>";
					} else {
						$bayar_sekarang = "<a disabled class='btn btn-warning' style='float: right;'>Bayar Sekarang</a>";
					}
				} elseif ($metode_bayar == "cod") {
					$bayar_sekarang = "";
				}

				if ($status_paket == "dalam pengiriman") {
			?>
					<div class="box-pro" style="overflow: hidden; height: auto;">
						<div class="img-pro">
							<img src="../img/produk/<?php echo $img; ?>">
						</div>
						<div class="box-isi text-capitalize">
							<p>
								<?php echo $nama_produk; ?>
								<span class="harga">Total : <?php echo "Rp. " . number_format($total, 0, ',', '.'); ?></span>
							</p>
							<small>
								<strong>Jumlah Barang</strong> : <?php echo $jumlah; ?> |
								<strong>Tanggal Pembelian</strong> : <?php echo "$d-$m-$y"; ?>
							</small>
							<table class="table table-bordered table-striped">
								<tr>
									<th>Invoice</th>
									<td><?php echo $invoice; ?></td>
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
								<tr style="background: #cdb30c; color: #fff;">
									<th>Status Pengiriman</th>
									<td><?php echo $status_paket; ?></td>
								</tr>
								<tr>
									<th>Metode Pengiriman</th>
									<td><?php echo $metode_bayar; ?></td>
								</tr>
							</table>
							<a href="?page=paket/ulasan.php&id_bayar=<?= $id_bayar; ?>&id_pro=<?= $id; ?>" class="btn btn-primary" style="float: right;">Ulasan</a>
						</div>
					</div>
					<hr>
				<?php } elseif ($status_paket == "dalam proses") { ?>
					<div class="box-pro" style="overflow: hidden; height: auto;">
						<div class="img-pro">
							<img src="../img/produk/<?php echo $img; ?>">
						</div>
						<div class="box-isi text-capitalize">
							<p>
								<?php echo $nama_produk; ?>
								<span class="harga">Total : <?php echo "Rp. " . number_format($total, 0, ',', '.'); ?></span>
							</p>
							<small>
								<strong>Jumlah Barang</strong> : <?php echo $jumlah; ?> |
								<strong>Tanggal Pembelian</strong> : <?php echo "$d-$m-$y"; ?>
							</small>
							<table class="table table-bordered table-striped">
								<tr>
									<th>Invoice</th>
									<td><?php echo $invoice; ?></td>
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
								<tr style="background: #005086; color: white;">
									<th>Status Pengiriman</th>
									<td><?php echo $status_paket; ?></td>
								</tr>
								<tr>
									<th>Metode Pengiriman</th>
									<td><?php echo $metode_bayar; ?></td>
								</tr>
							</table>
							<?= $bayar_sekarang; ?>
							<a href="?page=paket/proses_upload_bukti.php&hapus=<?= $id_bayar; ?>" class="btn btn-danger" style="margin-right: 20px;">Batalkan Pesanan</a>
						</div>
					</div>
					<hr>

				<?php } elseif ($status_paket == "selesai") { ?>
					<div class="box-pro" style="overflow: hidden; height: auto;">
						<div class="img-pro">
							<img src="../img/produk/<?php echo $img; ?>">
						</div>
						<div class="box-isi text-capitalize">
							<p>
								<?php echo $nama_produk; ?>
								<span class="harga">Total : <?php echo "Rp. " . number_format($total, 0, ',', '.'); ?></span>
							</p>
							<small>
								<strong>Jumlah Barang</strong> : <?php echo $jumlah; ?> |
								<strong>Tanggal Pembelian</strong> : <?php echo "$d-$m-$y"; ?>
							</small>
							<table class="table table-bordered table-striped">
								<tr>
									<th>Invoice</th>
									<td><?php echo $invoice; ?></td>
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
								<tr style="background: #6e6d6d; color: white;">
									<th>Status Pengiriman</th>
									<td><?php echo $status_paket; ?></td>
								</tr>
								<tr>
									<th>Metode Pengiriman</th>
									<td><?php echo $metode_bayar; ?></td>
								</tr>
							</table>
							<a class="btn btn-success" disabled style="float: right;">Selesai</a>
						</div>
					</div>
					<hr>
					
			<?php }
			} ?>
		</div>
	</div>