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
	<title>Depresi</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="depresi_design.css">
</head>
<body>

<nav>
	<img src="LOGO FONT.png" class="logo">
	<a href="beranda.php" class="menu_bar" style="right : 190px;">Beranda</a>
	<a href="profil.php" class="menu_bar" style="right : 110px;">Profil</a>
	<a href="logout.php" class="menu_bar" style="right : 20px;">Logout</a>
</nav>

<form method="POST" action="hasil_tes.php">
	<table cellspacing="30" align="center">
		<tr>
			<td>
				<input type="checkbox" id="myCheckbox1" value="Ringan" name="habit[]" />
					<label for="myCheckbox1">
					<img src="img/opsi1.JPG">
					</label>
			</td>
			<td>
				<input type="checkbox" id="myCheckbox2" value="Ringan" name="habit[]" />
					<label for="myCheckbox2">
					<img src="img/opsi2.JPG">
					</label>
			</td>
			<td>
				<input type="checkbox" id="myCheckbox3" value="Sedang" name="habit[]" />
					<label for="myCheckbox3">
					<img src="img/opsi3.JPG">
					</label>
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" id="myCheckbox4" value="Sedang" name="habit[]" />
					<label for="myCheckbox4">
					<img src="img/opsi4.JPG">
					</label>
			</td>
			<td>
				<input type="checkbox" id="myCheckbox5" value="Sedang" name="habit[]" />
					<label for="myCheckbox5">
					<img src="img/opsi5.JPG">
					</label>
			</td>
			<td>
				<input type="checkbox" id="myCheckbox6" value="Berat" name="habit[]" />
					<label for="myCheckbox6">
					<img src="img/opsi6.JPG">
					</label>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="checkbox" id="myCheckbox7" value="Berat" name="habit[]" />
					<label for="myCheckbox7">
					<img src="img/opsi7.JPG">
					</label>
			</td>
			<td></td>
		</tr>
	</table>
	<input type="submit" value="Selesai">
</form>

<div class="kata">
<?php
if (isset($_SESSION['pesan'])) {
	echo $_SESSION['pesan'];
	unset($_SESSION['pesan']);
}
?>
</div>

<div class="footer">PSYCA 2017</div>
</body>
</html>	