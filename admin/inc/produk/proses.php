<?php

$tombol = $_REQUEST['tombol'];
function publish()
{
	include 'koneksi.php';
	$napro = $_REQUEST['napro'];
	$kategori = $_REQUEST['kategori'];
	$kualitas = $_REQUEST['kualitas'];
	$desk = $_REQUEST['desk'];
	$stok = $_REQUEST['stok'];
	$harga = $_REQUEST['harga'];
	$diskon = $_REQUEST['diskon'];
	$username = $_SESSION['username'];

	$fileNames = array_filter($_FILES['upload']['name']);
	if (!empty($fileNames)) {

		$sql = mysqli_query($db, "INSERT INTO produk (nama_produk, id_kategori, kualitas, desk, stok, harga, diskon, user) VALUES ('$napro', '$kategori', '$kualitas', '$desk', '$stok', '$harga', '$diskon', '$username')");

		$id_produk = mysqli_insert_id($db);
		foreach ($_FILES['upload']['name'] as $key => $val) {

			$lokasi_file = $_FILES['upload']['tmp_name'][$key];
			echo $nama_file   = $_FILES['upload']['name'][$key];
			$direktori 	 = "../img/produk/$nama_file";

			$upload = move_uploaded_file($lokasi_file, $direktori);

			$sql1 = mysqli_query($db, "INSERT INTO img_produk (id_produk, img) VALUES ('$id_produk', '$nama_file')");
			echo "
			<script>
				window.location = '?page=produk/produk.php'
			</script>';
			";
		}
	} else {
		echo "
	         <script>
	        	alert('Simpan Gagal');
	   			window.location = '?page=user/pro_form.php'
	         </script>';
			";
	}
}

function editpublish()
{
	include 'koneksi.php';
	$id = $_REQUEST['id'];
	$napro = $_REQUEST['napro'];
	$kategori = $_REQUEST['kategori'];
	$kualitas = $_REQUEST['kualitas'];
	$desk = $_REQUEST['desk'];
	$stok = $_REQUEST['stok'];
	$harga = $_REQUEST['harga'];
	$username = $_SESSION['username'];

	$fileNames = array_filter($_FILES['upload']['name']);
	if (!empty($fileNames)) {
		$lokasi_file = $_FILES['upload']['tmp_name'];
		$nama_file   = $_FILES['upload']['name'];
		$direktori 	 = "../img/produk/$nama_file";

		if ($napro !== "") {
				$sql = mysqli_query($db, "UPDATE produk SET nama = '$napro',
											id_kategori = '$kategori',
											kualitas = '$kualitas',
											desk = '$desk',
											stok = '$stok',
											harga = '$harga'
											WHERE id_produk = '$id' ");

				$id_produk = mysqli_insert_id($db);
				foreach ($_FILES['upload']['name'] as $key => $val) {

					$lokasi_file = $_FILES['upload']['tmp_name'][$key];
					$nama_file   = $_FILES['upload']['name'][$key];
					$direktori 	 = "../img/produk/$nama_file";

					$upload = move_uploaded_file($lokasi_file, $direktori);

					$sql1 = mysqli_query($db, "UPDATE img_produk SET id_produk='$id', img='$nama_file' WHERE id_img_produk='$id' ");
					echo "
						<script>
							window.location = '?page=produk/produk.php'
						</script>';
					";
				}
		} else {
			echo "
				<script>
					alert('Update Gagal')
					window.location = '?page=produk/edit.php&p=$id';
				</script>';
			";
		}
	} else {		
		$sql = mysqli_query($db, "UPDATE produk SET nama_produk = '$napro',
									id_kategori = '$kategori',
									kualitas = '$kualitas',
									desk = '$desk',
									stok = '$stok',
									harga = '$harga'
									WHERE id_produk = '$id' ");
		echo "
			<script>
				window.location = '?page=produk/produk.php'
			</script>';
		";
	}
}

$j = $_REQUEST['hapus'];
function hapus()
{
	include 'koneksi.php';
	$id = $_REQUEST['p'];
	$j = $_REQUEST['hapus'];
	$hapus = "DELETE FROM produk WHERE id_produk='$id' ";
	$hp = mysqli_query($db, $hapus);
	if ($hapus == true) {
		echo "
	         <script>
	        	alert('Delete Sukses')
	   			window.location = '?page=produk/produk.php&j=$j';
	         </script>';
			";
	}
}


switch ($tombol) {
	case 'Simpan':
		publish();
		break;
	case 'Ubah Data':
		editpublish();
		break;
	default:
		echo "kosong";
		break;
}

switch ($j) {
	case 'hapus':
		hapus();
		break;

	default:
		echo "Kosong";
		break;
}

mysqli_close($db);
