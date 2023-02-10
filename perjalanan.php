<?php
session_start();
$nama = $_SESSION['nama'];
if($_SESSION['status']!="login"){
	header("location:index.php?pesan=belum_login");
}
?>
<html>
<head>
	<meta charshet="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!- - Boostrap CSS - ->
	<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
	<!- - My CSS - ->
	<link rel="stylesheet" type="text/css" href="asset/css/style.css">
	<!- - Boostrap ICON - ->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<link rel="shortcut icon" href="asset/img/logo/logo.png">
	<title>Beranda</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row flex-nowrap">
			<div class="col-auto col-x1-2 px-sm-2 px-0 navigasi">
				<div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
					<a href="index.php" class="d-flex align-items-center pb-3 md-mb-0 me-md-auto text-white text-decoration-none">
						<span class="fs-5 d-none d-sm-inline">Peduli Kesehatan</span>
					</a>
					<ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
						<li class="nav-item">
							<a href="beranda.php" class="nav-link align-middle px-0 text-white">
								<i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Beranda</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="historyperjalanan.php" class="nav-link align-middle px-0 text-white">
								<i class="fs-4 bi-plus-square"></i> <span class="ms-1 d-none d-sm-inline">Catatan Perjalanan</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="perjalanan.php" class="nav-link align-middle px-0 text-white">
								<i class="fs-4 bi-plus-square"></i> <span class="ms-1 d-none d-sm-inline">Isi Data Perjalanan</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="catatanlokasi.php" class="nav-link align-middle px-0 text-white">
								<i class="fs-4 bi-plus-square"></i> <span class="ms-1 d-none d-sm-inline">Catatan Lokasi</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="lokasi.php" class="nav-link align-middle px-0 text-white">
								<i class="fs-4 bi-plus-square"></i> <span class="ms-1 d-none d-sm-inline">Lokasi</span>
							</a>
						</li>
								
								</ul>
							</li>
						</ul>
						<hr>
						<div class="dropdown pb-4">
							<a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
								<img src="asset/img/dashboard/smile.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
								<span class="d-none d-sm-inline mx-1"><?php
									include "koneksi.php";
									$nama = $_SESSION['nama'];
									$data = mysqli_query($koneksi,"select * from login where nama = '$nama'");
									$d = mysqli_fetch_array($data);
									echo $d['nama'];
								?>
								</span>
							</a>
							<ul class="dropdown-menu dropdown-menu-dark text-small shadow">
								<li><a class="dropdown-item" href="profile.php">Profile</a></li>
								<li>
									<hr class="dropdown-divider">
								</li>
								<li>
									<a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#tombolkeluar">Keluar</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="modal fade" id="tombolkeluar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title text-fw-bold" id="exampleModalLabel">KELUAR</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								Apakah anda yakin untuk keluar?
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-outline-primary fw-bold" data-bs-dismiss="modal">Batal"</button>
								<a href="logout.php" type="button" class="btn btn-outline-danger fw-bold">Keluar</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col py-3 beranda">
					<div class="text-center">
						<h1>Catatan Perjalanan</h1>
					</div>
					<div class="card bg-light">
						<div class="card-body">
							<form method="post" action="" class="needs-validation" novalidate>
								<div class="mb-3">
									<label for="validationCustom01" class="form-label">Tanggal</label>
									<input type="date" id="validationCustom01" class="form-control" name="tanggal" required>
								</div>
								<div class="mb-3">
									<label class="form-label">Jam</label>
									<input type="text" class="form-control" name="jam" required>
								</div>
								<div class="mb-3">
									<label class="form-label">Lokasi Yang Dikunjungi</label>
									<input type="text" class="form-control" name="lokasi" required>
								</div>
								<div class="mb-3">
									<label class="form-label">Kota Yang Dikunjungi</label>
									<input type="text" class="form-control" name="kota" required>
								</div>
								<div class="mb-3">
									<label class="form-label">Suhu Tubuh</label>
									<input type="text" class="form-control" name="suhu" required>
								</div>
								<div class="form-group">
									<label class="form-label">Kesehatan</label>
									<select class="from-select from-select-lg mb-3" name="kesehatan" required>
										<option>- Silahkan pilih -</option required>
										<option value="Sangat Sehat">Sangat Sehat</option required>
										<option value="Cukup Sehat">Cukup Sehat</option required>
										<option value="Sehat">Sehat</option required>
										<option value="Cukup Sakit">Cukup Sakit</option required>
										<option value="Sakit">Sakit</option required>
										<option value="Sangat Sakit">Sangat Sakit</option required>
									</select>
								</div>
								<div>
									<input type="hidden" class="form-control" name="nama" value=<?php echo "$nama"; ?>">
								</div>
								<input type="submit" value="Simpan" name="simpan" class="btn btn-success">
							</form>
						</div>
					</div>
				</div>
			</div>
			<!- - Boostrap JS - ->
			<script type="text/module/javascript" herf="asset/js/bootstrap.bundle.min.js"></script>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" intergrity="sha384-ka75k0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0lRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
			<script type="text/javascript">
				// Example starter JavaScript for disabling form submissions if there are invalid fields
				(function () {
					'use strict'
					
	// Fetch all the forms we want to apply custom Boostrap validation styles to
	var forms = document.querySelectorAll('.needs-validation')
	
	// Loop over them and prevent submission
	Array.prototype.slice.call(forms)
	.forEach(function (form) {
		form.addEventListener('submit', function (event) {
			if (!form.checkValidity()) {
				event.preventDefault()
				event.stopPropagation()
			}
			
			form.classList.add('was-validated')
		}, false)
	})
				})()
			</script>
</body>
</html>
<?php

if(isset($_POST['simpan'])){
	include 'koneksi.php';
	
	$tanggal = $_POST['tanggal'];
	$jam = $_POST['jam'];
	$lokasi = $_POST['lokasi'];
	$kota = $_POST['kota'];
	$suhu = $_POST['suhu'];
	$kesehatan = $_POST['kesehatan'];
	$email = $_POST['email'];
	
	mysqli_query ($koneksi, "insert into perjalanan values('','$tanggal','$jam','$lokasi','$kota','$suhu','$kesehatan','$email')");
	
	echo '<script language="javascript">';
	echo '<alert("Data Berhasil Disimpan">';
	echo '</script>';
}
?>