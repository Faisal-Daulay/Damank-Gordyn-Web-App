<?php 

	$tombol = $_REQUEST['tombol'];
	function publish(){
		include '../../koneksi.php';
		$nama = $_POST['nama'];
		$pass = $_POST['pass'];
		$email = $_POST['email'];
		$alamat = $_POST['alamat'];
		$notel = $_POST['notel'];

		$user = $_REQUEST['user'];
		$pass = $_REQUEST['pass'];

		if ($nama!=="") {
			$sql1 = mysqli_query($db, "INSERT INTO register (nama, email, alamat, no_tel) VALUES ('$nama', '$email', '$alamat', '$notel')");

			$id_reg = mysqli_insert_id($db);

			$sql2 = mysqli_query($db, "INSERT INTO admin (id_regis, username, password, status) VALUES ('$id_reg', '$user', '$pass', 'member')");

			echo "
	         <script>
	        	alert('Registrasi Sukses')
	   			window.location = '../../login.php';
	         </script>';
			";
		} else {
			echo "
	         <script>
	        	alert('Registrasi Gagal')
	   			window.location = '../../registrasi.php';
	         </script>';
			";
		}
	}

	switch ($tombol) {
		case 'Register':
			publish();
		break;
		default:
			echo "kosong";
		break;
	}

	mysqli_close();
