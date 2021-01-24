<?php 
	session_unset();
	session_destroy();
	include 'admin/koneksi.php';

	$naleng = $_REQUEST['naleng'];
	$jenis = $_REQUEST['jenis'];
	$alamat = $_REQUEST['alamat'];
	$harga = $_REQUEST['harga'];
	$jumlah = $_REQUEST['jumlah'];
	$total = $_REQUEST['total'];

	if ($naleng!=="") {
		$sql = mysqli_query($db,"INSERT INTO pembayaran (nama, alamat, jenis, jumlah, total) VALUES ('$naleng', '$alamat', '$jeni', '$jumlah', '$total');");

        echo 
        "
			<script>
				alert('Transaksi Berhasil');
				window.location = '?page=content.php'
			</script>
        ";
	} else {
        echo 
        "
			<script>
				alert('Transaksi Gagal');
				window.location = '?page=content.php'
			</script>
        ";
	}

?>

