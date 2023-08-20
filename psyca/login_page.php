<?php
	if (!session_id()) {
		session_start();
	}
	if (isset($_SESSION['logged_in'])){
		if ($_SESSION['logged_in'] == true) {
			header('Location: beranda.php');
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN FORM</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="login_page_design.css">
</head>
<body>

	<nav>
	<a href="index.php"><img src="LOGO FONT.png" class="logo"></a>
	</nav>

	<table>
		<form method="POST" action="login.php" onSubmit="return validasi()">
			<tr>
				<td class="kata" colspan="2">LOGIN</td>
			</tr>
			<tr>
				<td class="kata_login">USERNAME</td>
				<td><input class="input_data" type="text" name="username" placeholder="Masukkan username anda" pattern="[A-Za-z@_0-9]+" required=""></td>
			</tr>
			<tr>
				<td class="kata_login" >PASSWORD</td>
				<td ><input class="input_data" type="password" name="password" placeholder="********" required=""></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Masuk" class="submit_button"></td>
			</tr>
		</form>
	</table>

	<div class="footer">PSYCA 2017</div>

	<?php
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']==false) { ?>
			<div class="kata2">Username atau password salah</div>
			<?php
			unset($_SESSION['logged_in']);
		}
	?>
</body>
</html>
