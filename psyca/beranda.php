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
	<title>Beranda</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="beranda.css">
</head>
<body>
		<img class="logo" src="LOGO FONT.png">
		<a href="profil.php" class="menu_bar" style="right : 110px;">Profil</a>
		<a href="logout.php" class="menu_bar" style="right : 20px;">Logout</a>
        </ul>

		<div class="logo2">PSYCHOLOGICAL<br>ISSUES</div>
		<img src="img/BG22.jpg" class="gambar">
	

	<table height="410px" width="100%">
		<tr>
			<td class="kata" width="20%" rowspan="3" bgcolor="faebd7"><a href="#">Conduct Disorder</a></td>
			<td class="kata" colspan="2" bgcolor="ffcc66"><a href="depresi.php">Depresi</a></td>
			<td class="kata" colspan="2" bgcolor="ffa07a"><a href="#">Schizoprenia</a></td>
		</tr>

		<tr>
			<td class="kata" bgcolor="f0e68c"><a href="#">Bipolar Disorder</a></td>
			<td class="kata" colspan="2" bgcolor="87ceeb"><a href="#">Antisocial Personality Disorder</a></td>
			<td class="kata" width="800px" rowspan="2" bgcolor="90ee90"><a href="#">Self Harm</a></td>
		</tr>

		<tr>
			<td class="kata" width="60%" colspan="3" bgcolor="cc99ff"><a href="#">OCD (Obsessive Compulsive Disorder)</a></td>
		</tr>
		</div>
	</table>

	<div class="footer">PSYCA 2017</div>
</body>
</html>
