	<?php
	error_reporting(0);
	session_start();
	$id_regis = $_SESSION['id_regis'];
	$username = $_SESSION['username'];
	$status   = $_SESSION['status'];

	if ($status !== "member") {
		header("location:../");
	}
	?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>Damank Gordyn</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

	</head>

	<body>
		<?php
		include 'include/menu.php';
		?>
		<div class="container" id="wrapper">
			<div class="row">
				<?php
				$page = $_GET['page'];
				if (empty($page)) {
					include 'include/content.php';
				} else {
					include 'include/' . $page;
				}
				?>
			</div>
		</div>
		<?php
		include 'include/footer.php';
		?>

		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.js"></script>
		<script src="../js/gallery.js"></script>
		<script src="../js/all.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
		<script>
			$("#jumlah").on('keyup', function() {
				var jumlah = parseInt($("#jumlah").val());
				var stok = parseInt($("#stok").val());
				var habar = parseInt($("#habar").val());
				var total = jumlah * habar;
				$("#total").val(total);

				if (jumlah > stok || stok <= 0) {
					$("#jumlah").val(0);
					alert('Stok tidak mencukupi');
				}
			});
		</script>
		<script>
			$(document).ready(function() {
				$('.js-example-basic-single').select2();
			});
		</script>
	</body>

	</html>