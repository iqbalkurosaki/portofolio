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
if (!isset($_SESSION['depresi'])) {
	header('Location: hasil_tes.php');
}
require_once './koneksi_database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Penanganan</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="penanganan_design.css">
</head>
<body>

<nav>
	<img src="LOGO FONT.png" class="logo">
	<a href="logout.php" style="right: 20px" class="menu_bar">Logout</a>
	<a href="profil.php" style="right: 110px" class="menu_bar">Profil</a>
	<a href="beranda.php" style="right: 190px" class="menu_bar">Beranda</a>
</nav>



	<?php
	if ($_SESSION['depresi']=='Ringan') { ?>
		<caption><div class="kata">EPISODE</div></caption>
		<?php
			if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) { ?>
				<p align="center"><a href="penanganan_edit.php">EDIT |</a><a href="penanganan_tambah.php">| TAMBAH</a></p>
	<?php	}
		?>
	<table align="center">
		<?php
		$sql = "SELECT * FROM depresi_".$_SESSION['depresi'];
		$res = mysqli_query($cnn, $sql);
		while($row = mysqli_fetch_row($res)) { ?>
			<tr>
				<td class="nomor"><?php echo $row[0]; ?></td>
				<td class="deskripsi"><?php echo $row[1]; ?></td>
			</tr>
		<?php
		}	
	} elseif ($_SESSION['depresi']=='Sedang') { ?>
		<caption><div class="kata">EPISODE</div></caption>
		<?php
			if (isset($_SESSION['admin']) &&  $_SESSION['admin'] == true) { ?>
				<p align="center"><a href="penanganan_edit.php">EDIT |</a><a href="penanganan_tambah.php">| TAMBAH</a></p>
	<?php	}
		?>
	<table align="center">
		<?php
		$sql = "SELECT * FROM depresi_".$_SESSION['depresi'];
		$res = mysqli_query($cnn, $sql);
		while($row = mysqli_fetch_row($res)) { ?>
			<tr>
				<td class="nomor"><?php echo $row[0]; ?></td>
				<td class="deskripsi"><?php echo $row[1]; ?></td>
			</tr>
		<?php
		}
	}
	 elseif ($_SESSION['depresi']=='Berat') {?>
	 	<br />
		<div class="kata2">
			Anda membutuhkan bantuan tenaga medis <a target="_blank" href="https://www.google.co.id/maps/search/psikolog">Psikiatri</a>			
		</div>
	<?php }?>
</table>

<div class="footer">PSYCA 2017</div>

<?php
mysqli_close($cnn);
?>

</body>
</html>