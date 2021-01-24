<?php
	$hostname="localhost";
	$user="root";
	$pass="";
	$db1 = "db_damank";

	$db=mysqli_connect($hostname,$user,$pass, $db1) or die(mysqli_error());

?>