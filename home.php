<?php
session_start();
?>
<html>
	<body>
		<table align="center" width="70%">
			<tr>
				<td width="150px"><img src="" alt=""></td>
				<td><h1>PEDULI DIRI</h1>
				<p><a href="">HOME</a>|<a href="">Catatan Perjalanan</a>|<a href="">Isi Data</a>|<a href="logout.php">Logout</a>
				</td>
			</tr>
		</table>
		<table border="1" height="40%" width="50%" align="center">
		<td> Selamat Datang <?php echo $_SESSION['nama'] ?> di Aplikasi Peduli Diri</td>
		</table>
	</body>
</html>