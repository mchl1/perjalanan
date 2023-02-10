<?php
include'koneksi.php';
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$tambah_register = mysqli_query($koneksi, "INSERT INTO login VALUES('','$nik','$nama')");
if($tambah_register){
echo"
	<script>
	alert('Selamat Registrasi User Telah Ditambahkan');
	document.location.href='index.php'
	</script>";
}else{
echo"
	<script>
	alert('Data Register Gagal Ditambahkan');
	document.location.href='index.php'
	</script>";
}
?>