<?php
session_start();
include 'koneksi.php';
$status = $_SESSION['status'];
$username = $_SESSION['username'];

if ($status !== "admin") {
	header("location:login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Dashbord My Toko Online</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/style_dashboard.css">
	<link rel="stylesheet" type="text/css" href="js/datatables.css">
</head>

<body>
	<div id="wrapper">
		<?php
		include 'inc/menu.php'
		?>
		<div id="content">
			<?php
			$page = $_GET['page'];
			if (empty($page)) {
				include 'inc/content.php';
			} else {
				include 'inc/' . $page;
			}
			?>
		</div>
		<div id="footer">
			<p>Copyright &copy; 2018 MY TOKO ONLINE</p>
		</div>
	</div>

	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script src="js/datatables.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#tabel-data').DataTable();
		});
	</script>
</body>

</html>