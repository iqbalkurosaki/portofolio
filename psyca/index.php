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
	<title>PSYCA</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="main_page_design.css">
</head>
<body background="BG.jpg">
<img src="LOGO FIX.png"class="logo">
<nav>
	<ul>
		<li><a href="signup_page.php">SIGN UP</a></li>
		<li><a href="login_page.php">LOGIN</a></li>
		<li><a href="edukasi.php">ABOUT US</a></li>
	</ul>
</nav>
<div class="footer"><kata>PSYCA 2017</kata></div>
</body>
</html>