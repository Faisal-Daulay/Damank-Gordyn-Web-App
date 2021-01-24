<?php
include '../admin/koneksi.php';
if ($_POST) {
   $napem = $_POST['napem'];
   $email = $_POST['email'];
   $hp = $_POST['hp'];
   $provinsi = $_POST['provinsi'];
   $kabupaten = $_POST['kabupaten'];
   $alamat = $_POST['alamat'];
   $jk = $_POST['jk'];
   $tgl = $_POST['tgl'];

   $user = $_POST['user'];
   $pass = $_POST['pass'];


   $lokasi_file = $_FILES['upload']['tmp_name'];
   $tipe_file   = $_FILES['upload']['type'];
   $nama_file   = $_FILES['upload']['name'];
   $size        = $_FILES['upload']['size'];
   $direktori     = "../img/profil/" . $id_regis . ".jpg";

   if ($napem != "") {
      move_uploaded_file($lokasi_file, $direktori);
      $sql = mysqli_query($db, "UPDATE register SET nama = '$napem', 
                                                    email = '$email', 
                                                    alamat = '$alamat', 
                                                    no_tel = '$hp', 
                                                    jk = '$jk', 
                                                    tanggal_lahir = '$tgl', 
                                                    provinsi = '$provinsi', 
                                                    kabupaten = '$kabupaten', 
                                                    foto = '$id_regis' WHERE id_regis = '$id_regis' ");

      $sql1 = mysqli_query($db, "UPDATE admin SET username = '$user', password = '$pass' WHERE id_regis = '$id_regis' ");

      echo
         "
      	<script>
      		window.location = '?page=setting/setting.php'
      	</script>
        ";
   } else {
      echo
         "
         <script>
            alert('Gagal Update Data!');
				window.location = '?page=setting/setting.php'
			</script>
	     ";
   }
}
