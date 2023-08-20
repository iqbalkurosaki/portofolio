<?php
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true) {
	header('Location: beranda.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="signup_page_design.css">
</head>
<body>
	<nav><a href="index.php"><img src="LOGO FONT.png" class="logo"></a></nav>

	<table>
		<form method="POST" action="signup.php">
			<tr>
				<td class="kata" colspan="2">SIGN UP</td>
			</tr>
			<tr>
				<td class="kata_signup">Nama</td>
				<td><input type="text" name="nama" required="" pattern="[A-Za-z ]+" class="input_data"></td>
			</tr>
			<tr>
				<td class="kata_signup">ID Pengguna</td>
				<td><input type="text" name="id_pengguna" required="" pattern="[A-Za-z@_0-9]+" class="input_data"></td>
			</tr>
			<tr>
				<td class="kata_signup">E-mail</td>
				<td><input type="email" name="email" required="" pattern="[a-z@0-9.]+" class="input_data"></td>
			</tr>
			<tr>
				<td class="kata_signup">Jenis Kelamin</td>
				<td>
					<select name="jenis_kelamin" required="">
						<option value="Laki-laki">Laki-laki</option>
						<option value="Perempuan">Perempuan</option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="kata_signup">Tanggal Lahir</td>
				<td><input type="date" name="tanggal_lahir" required=""></td>
			</tr>
			<tr>
				<td class="kata_signup">Password</td>
				<td><input type="password" name="password" required="" class="input_data"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="SIGN UP" class="submit_button"></td>
			</tr>
		</form>
	</table>

	<?php
		if (isset($_SESSION['pesan'])) {
			echo $_SESSION['pesan'];
			unset($_SESSION['pesan']);
		}
	?>

	<div class="footer"><kata>PSYCA 2017</kata></div>
</body>
</html>