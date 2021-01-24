<div id="main_content">
	<form method="post" action="?page=setting/pro_setting.php" enctype="multipart/form-data">
		<div class="col-md-8">
			<?php
			include '../admin/koneksi.php';
			$sql = mysqli_query($db, "SELECT * FROM register INNER JOIN admin ON register.id_regis=admin.id_regis WHERE register.id_regis='$id_regis' ");

			$ambil = mysqli_fetch_array($sql);
			$nama = $ambil['nama'];
			$alamat = $ambil['alamat'];
			$email = $ambil['email'];
			$notel = $ambil['no_tel'];
			$jk = $ambil['jk'];
			$tanggal_lahir = $ambil['tanggal_lahir'];
			$foto = $ambil['foto'];
			$user = $ambil['username'];
			$pass = $ambil['password'];
			?>
			<div class="box-pembeli">
				<div class="title">
					<blockquote>
						<p>Profil Pembeli</p>
					</blockquote>
				</div>
				<div class="form-group">
					<label>Nama</label>
					<input type="text" class="form-control" name="napem" value="<?= $nama; ?>">
				</div>
				<div class="form-group">
					<label>E-mail Pembeli</label>
					<input type="text" class="form-control" name="email" value="<?= $email; ?>">
				</div>
				<div class="form-group">
					<label>Telepon / Handphone</label>
					<input type="text" class="form-control" name="hp" value="<?= $notel; ?>">
				</div>
				<div class="form-group">
					<label>Jenis Kelamin</label>
					<select name="jk" class="form-control js-example-basic-single">
						<option>Pilih Jenis Kelamin</option>
						<option value="L">Laki - Laki</option>
						<option value="P">Perempuan</option>
					</select>
				</div>
				<div class="form-group">
					<label>Tanggal Lahir</label>
					<input type="date" class="form-control" name="tgl" value="<?= $tanggal_lahir; ?>">
				</div>
				<div class="form-group">
					<label>Provinsi</label>
					<select name="provinsi" class="form-control js-example-basic-single">
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
					<label>Kabupaten</label>
					<select name="kabupaten" class="form-control js-example-basic-single">
						<option>Pilih Kabupaten</option>
						<?php
						include 'admin/koneksi.php';
						$dml1 = mysqli_query($db, "SELECT * FROM kabupaten ORDER BY Id_Kabupaten DESC");
						while ($cek1 = mysqli_fetch_array($dml1)) {
							$kabkot = $cek1['nama_kabkot'];
						?>
							<option value="<?php echo $kabkot; ?>"><?php echo $kabkot; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label>Alamat Lengkap</label>
					<input type="text" name="alamat" class="form-control" value="<?= $alamat; ?>">
				</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="user" class="form-control" value="<?= $user; ?>">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="pass" class="form-control" value="<?= $pass; ?>">
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box-pembeli">
				<div class="title">
					<blockquote>
						<p>Foto Profil</p>
					</blockquote>
				</div>
				<input type="file" name="upload"><br><br>
				<img src="../img/profil/<?= $foto; ?>.jpg" class="img-thumbnail"><br><br>
				<input type="submit" value="Simpan" class="btn btn-success">
			</div>
		</div>
	</form>
</div>