<?php
$koneksi = mysqli_connect('localhost','root','','perjalanan');
	if (!$koneksi) {
		die('Error' . mysqli_connect_errno());
	}
?>