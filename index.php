<?php
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "Login gagal! username dan password salah!";
		}else if($_GET['pesan'] == "logout"){
			echo "Anda telah berhasil logout";
		}else if($_GET['pesan'] == "belum_login"){
			echo"
			<script>
				alert('Anda Harus Login Dulu untuk mengakses Halaman Ini !!');
				document.location.href='index.php'
			</script>";
		}
	}
	?>
	
	
<!DOCTYPE html>
<html lang="en" >
	<head>
		<meta charset="UTF-8">
		<title>Aplikasi Catatan Perjalanan</title>
		<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'><link rel="stylesheet" href="style.css">
	</head>
	
	<body>
	<! -- partial:index.partial.html -->
		<div class="login-form">
			<form action="cek_login.php"method="POST">
				<h1><img src="self.jpg"height="50px"><p>Silahkan Login</h1>
					<div class="content">
						<div class="input-field">
							<input type="number"name="nik" placeholder="Masukan NIK"required>
						</div>
						<div class="input-field">
							<input type="text"name="nama" placeholder="Masukan Nama Lengkap"required>
						</div>
					</div>
		<div class="action">
			<button onclick="window.location.href='register.php'" class="btn mr-2">Saya Pengguna Baru</button>
			<button type="submit">Masuk</button>
		</div>
			</form>
		</div>
<! -- partial -- >
<script src="script.js"></script>
	</body>
</html>