				<div class="row">
					<h3 class="text-center">DAFTAR PRODUK BARU AKSESORIS</h3>
					<hr width="200">
					<?php
					include '../admin/koneksi.php';

		            $limit = 4;//Untuk menampilkan jumlah data dari database
		            $hal=$_GET['aksbaru'];//Jumlah halaman di mulai dari 1
		            if (!isset($hal)) {
		                $hal=1;
		            }
            		$start=($hal-1)*$limit;
					$sql = mysqli_query($db, "SELECT * FROM produk INNER JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE nama_kategori='Aksesoris' ORDER BY produk.id_produk DESC LIMIT $start, $limit");

					$dml = mysqli_query($db, "SELECT * FROM produk INNER JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE nama_kategori='Aksesoris'");

					$jmlhdata=mysqli_num_rows($dml);
		            $jmlhhal=ceil($jmlhdata / $limit);
		            if ($jmlhhal < 1) {
		                $jmlhhal=1;
		            }
					$start++;

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
									<img src="../img/produk/<?php echo $img; ?>">
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
				<div class="col-md-12">
					<nav aria-label="Page navigation">
					  <ul class="pagination">
					  	<?php 
				            $prev=$hal-1;
				            if ($hal-1) {
					  	?>
					    <li>
					      <a href="?page=aksesoris.php&aksbaru=<?=$prev?>" aria-label="Previous">
					        <span aria-hidden="true">&laquo;</span>
					      </a>
					    </li>
					    <?php }
							for ($i=1; $i <= $jmlhhal ; $i++) { 
					     ?>
					    <li><a href="?page=aksesoris.php&aksbaru=<?=$i?>"><?= $i ?></a></li>
						<?php } 
    						$next=$hal+1;
				            if ($hal < $jmlhhal) {
						?>
					    <li>
					      <a href="?page=aksesoris.php&aksbaru=<?=$next?>" aria-label="Next">
					        <span aria-hidden="true">&raquo;</span>
					      </a>
					    </li>
						<?php } ?>
					  </ul>
					</nav>
				</div>

				<div class="row">
					<h3 class="text-center">DAFTAR PRODUK LAMA AKSESORIS</h3>
					<hr width="200">
					<?php
					include '../admin/koneksi.php';

		            $limit = 10;//Untuk menampilkan jumlah data dari database
		            $hal=$_GET['akslama'];//Jumlah halaman di mulai dari 1
		            if (!isset($hal)) {
		                $hal=1;
		            }
            		$start=($hal-1)*$limit;
					$sql = mysqli_query($db, "SELECT * FROM produk INNER JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE nama_kategori='Aksesoris' ORDER BY produk.id_produk ASC LIMIT $start, $limit");
					
					$dml = mysqli_query($db, "SELECT * FROM produk INNER JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE nama_kategori='Aksesoris'");

					$jmlhdata1=mysqli_num_rows($dml);
		            $jmlhhal1=ceil($jmlhdata1 / $limit);
		            if ($jmlhhal1 < 1) {
		                $jmlhhal1=1;
		            }
					$start++;
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
									<img src="../img/produk/<?php echo $img; ?>">
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
					<div class="col-md-12">
						<nav aria-label="Page navigation">
						  <ul class="pagination">
						  	<?php 
					            $satu=1;
					            if ($satu < $hal) {
						  	?>
						    <li>
						      <a href="?page=aksesoris.php&akslama=<?=$satu?>" aria-label="Previous">
						        <span aria-hidden="true">&laquo;</span>
						      </a>
						    </li>
						    <?php }
								for ($i=1; $i <= $jmlhhal1 ; $i++) { 
						     ?>
						    <li><a href="?page=aksesoris.php&akslama=<?=$i?>"><?= $i ?></a></li>
							<?php } 
        						$next=$hal+1;
					            if ($hal < $jmlhhal1) {
							?>
						    <li>
						      <a href="?page=aksesoris.php&akslama=<?=$next?>" aria-label="Next">
						        <span aria-hidden="true">&raquo;</span>
						      </a>
						    </li>
							<?php } ?>
						  </ul>
						</nav>
					</div>
				</div>