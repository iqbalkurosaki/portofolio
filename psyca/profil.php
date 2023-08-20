<?php
if (!session_id()) {
	session_start();
}
if (isset($_SESSION['logged_in'])){
	if ($_SESSION['logged_in'] == false) {
		header('Location: index.php');
	}
} else {
	header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profil</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="profil_design.css">
</head>
<body>
<nav>
	<img src="LOGO FONT.png" class="logo">
	<a href="beranda.php" class="menu_bar" style="right: 110px">Beranda</a>
	<a href="logout.php" class="menu_bar" style="right: 20px">Logout</a>
</nav>

<div class="box">
<table width="auto" align="center">
	<caption>PROFIL</caption>
	<tr>
		<td class="kata">Nama</td>
		<td class="kata2">: <?php echo $_SESSION['nama']; ?></td>
	</tr>
	<tr>
		<td class="kata">ID Pengguna</td>
		<td class="kata2">: <?php echo $_SESSION['id_pengguna']; ?></td>
	</tr>
	<tr>
		<td class="kata">E-mail</td>
		<td class="kata2">: <?php echo $_SESSION['email']; ?></td>
	</tr>
	<tr>
		<td class="kata">Jenis Kelamin</td>
		<td class="kata2">: <?php echo $_SESSION['jenis_kelamin']; ?></td>
	</tr>
	<tr>
		<td class="kata">Tanggal Lahir</td>
		<td class="kata2">: <?php echo $_SESSION['tanggal_lahir']; ?></td>
	</tr>
</table>
</div>

<div class="footer">PSYCA 2017</div>
</body>
</html>