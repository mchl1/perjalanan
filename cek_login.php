<?php
// mengaktifkan sesion php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$nik =mysqli_real_escape_string($koneksi,$_POST['nik']);
$nama =mysqli_real_escape_string($koneksi,$_POST['nama']);

// menyeleksi data login dengan nik dan nama yang sesuai
$data = mysqli_query($koneksi,"select * from login where nik='$nik' and nama='$nama'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if($cek > 0){
$sesi = mysqli_query($koneksi,"select * from login where nik='$nik' and nama='$nama'");
$sesi = mysqli_fetch_assoc($sesi);
	$_SESSION['id'] = $sesi['id'];
		$_SESSION['nama'] = $sesi['nama'];
	$_SESSION['status'] = "login";
		echo"
	<script>
	window.alert('Selamat Datang Di Aplikasi Catatan Perjalanan')
	location.href='beranda.php';
	</script>";
}else{
	echo"
	<script>
	window.alert('Nik dan Nama Anda Salah')
	location.href='index.php';
	</script>";
}
?>