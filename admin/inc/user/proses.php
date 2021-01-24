<?php 

	$tombol = $_REQUEST['tombol'];
	function publish(){
		include 'koneksi.php';
		$user = $_REQUEST['user'];
		$pass = $_REQUEST['pass'];
		$stat = $_REQUEST['stat'];

		if ($user!=="") {
			$sql = "INSERT INTO admin (username, password, status) VALUES ('$user', '$pass', '$stat')";
			$query = mysqli_query($db, $sql);

			echo "
	         <script>
	        	alert('Simpan Sukses')
	   			window.location = '?page=user/user.php';
	         </script>';
			";
		} else {
			echo "
	         <script>
	        	alert('Simpan Gagal')
	   			window.location = '?page=user/user_form.php';
	         </script>';
			";
		}
	}

	function editpublish() {
		include 'koneksi.php';
		$id = $_REQUEST['id'];
		$user = $_REQUEST['user'];
		$pass = $_REQUEST['pass'];
		$stat = $_REQUEST['stat'];

		if ($user!=="") {
			$sql = "UPDATE admin SET username = '$user',
									 password = '$pass',
									 status = '$stat'
									 WHERE id_admin = '$id'";
			$query = mysqli_query($db, $sql);

			echo "
	         <script>
	        	alert('Update Sukses')
	   			window.location = '?page=user/user.php';
	         </script>';
			";
		} else {

			echo "
	         <script>
	        	alert('Update Gagal')
	   			window.location = '?page=user/edit.php&p=$id';
	         </script>';
			";
		}
	}

	$j = $_REQUEST['hapus'];
	function hapus() {
		include 'koneksi.php';
		$id = $_REQUEST['p'];
		$j = $_REQUEST['hapus'];
		$hapus = "DELETE FROM admin WHERE id_admin='$id' ";
		$hp = mysqli_query($db, $hapus);
		if ($hapus == true) {
			echo "
	         <script>
	        	alert('Delete Sukses')
	   			window.location = '?page=user/user.php&j=$j';
	         </script>';
			";
		}
	}


	switch ($tombol) {
		case 'Simpan':
			publish();
		break;
		case 'Ubah':
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

	mysqli_close();
?>