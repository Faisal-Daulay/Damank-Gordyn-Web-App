<?php
	session_start();
	include 'koneksi.php';

	$user = $_REQUEST['user'];
	$pass = $_REQUEST['pass'];

	if ($user!="" && $pass!="") {
		$sql = "SELECT * FROM admin WHERE username = '$user' AND password= '$pass' ";
		$query = mysqli_query($db, $sql);
		$baris = mysqli_num_rows($query);
		if ($baris == true) {
			$ambil = mysqli_fetch_array($query);
			$username = $ambil['username'];
			$password = $ambil['password'];
			$status = $ambil['status'];
			$id_regis = $ambil['id_regis'];

			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['status'] = $status;
			$_SESSION['id_regis'] = $id_regis;

			if ($status == 'admin') {
				echo "
					<script>
						window.location.href = 'index.php'
					</script>
				";
			} elseif ($status == 'member') {
				echo "
					<script>
						window.location.href = '../member/'
					</script>
				";
			}
			else {
				echo "
					<script>
						alert('Login Gagal');
						window.location.href = 'login.php'
					</script>
				";
			}
		} else {
			echo "
               <script>
                  alert('Silahkan cek Data anda!');
                  window.location.href = 'login.php?err=2'
               </script>
			";
		}
	} else {
		echo "
           <script>
              alert('Silahkan cek Data anda!');
              window.location.href = 'login.php?err=1'
           </script>
		";
	}
?>
