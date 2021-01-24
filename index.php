<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Damank Gordyn</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
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

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/gallery.js"></script>
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
</body>

</html>