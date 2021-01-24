<?php 

	$tombol = $_REQUEST['tombol'];
	function publish(){
		include 'koneksi.php';
		$judul = $_REQUEST['judul'];

		if ($judul!=="") {
			$sql = "INSERT INTO kategori (nama_kategori) VALUES ('$judul')";
			$query = mysqli_query($db, $sql);

			echo "
	         <script>
	        	alert('Simpan Sukses')
	   			window.location = '?page=kategori/kategori.php';
	         </script>';
			";
		} else {
			echo "
	         <script>
	        	alert('Simpan Gagal')
	   			window.location = '?page=kategori/kat_form.php';
	         </script>';
			";
		}
	}

	function editpublish() {
		include 'koneksi.php';
		$id = $_REQUEST['id'];
		$judul = $_REQUEST['judul'];

		if ($nama!=="") {
			$sql = "UPDATE kategori SET nama_kategori = '$judul'
									  WHERE id_kategori = '$id'";
			$query = mysqli_query($db, $sql);

			echo "
	         <script>
	        	alert('Update Sukses')
	   			window.location = '?page=kategori/kategori.php';
	         </script>';
			";
		} else {

			echo "
	         <script>
	        	alert('Update Gagal')
	   			window.location = '?page=kategori/edit.php&p=$id';
	         </script>';
			";
		}
	}

	$j = $_REQUEST['hapus'];
	function hapus() {
		include 'koneksi.php';
		$id = $_REQUEST['p'];
		$j = $_REQUEST['hapus'];
		$hapus = "DELETE FROM kategori WHERE id_kategori='$id' ";
		$hp = mysqli_query($db, $hapus);
		if ($hapus == true) {
			echo "
	         <script>
	        	alert('Delete Sukses')
	   			window.location = '?page=kategori/kategori.php&j=$j';
	         </script>';
			";
		}
	}


	switch ($tombol) {
		case 'Publish':
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