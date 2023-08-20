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
if (isset($_POST['habit'])) {
	if (in_array('Berat', $_POST['habit'])) {
		$_SESSION['depresi'] = 'Berat';
	} elseif (in_array('Sedang', $_POST['habit'])) {
		$_SESSION['depresi'] = 'Sedang';
	} elseif (in_array('Ringan', $_POST['habit'])) {
		$_SESSION['depresi'] = 'Ringan';
	} else {
		echo "anda belum memilih";
	}
} else {
	$_SESSION['pesan'] = 'ANDA BELUM MEMILIH';
	header('Location: depresi.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Hasil Tes</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="hasil_tes_design.css">
</head>
<body>

<nav>
	<img src="LOGO FONT.png" class="logo">
</nav>


<table align="center">
	<tr><td class="kata">Hasil Tes Anda</td></tr>
	<tr>
		<td>
			<div class="kata2">
				<?php
				if (isset($_SESSION['depresi'])) {
					echo $_SESSION['depresi'];
				};
				?>
			</div>
		</td>
	</tr>
</table>

<a href="penanganan.php"> <div class="submit_data">Penanganan</div></a>

<div class="footer">PSYCA 2017</div>
</body>
</html>