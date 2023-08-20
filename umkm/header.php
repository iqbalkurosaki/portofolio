<?php
	if (!session_id()) {
		session_start();
	}
	require_once "koneksi.php";
	function code($str) {
		return nl2br(stripslashes(htmlspecialchars($str)));
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<style type="text/css">
		.satu{
			background-color: white !important;
			padding: 15px;
			box-shadow: 1px 1px 50px lightgrey;
		}
		.navbar-default{
			background-color: red;
			border-radius: 0;
			padding: 0px;
			border:none;
		}
		.navbar-fixed-top{
			box-shadow: 1px 1px 20px black;
		}
		.navbar-default .navbar-nav>li>a, .navbar-default .navbar-brand {
			color: white;
		}
		.navbar-nav>li>a:hover{
			color:red;
		}
		.footer{
			margin-top: 50px
		}
		.navbar-brand{
			height: 70px !important;
		}
		.navbar-default .navbar-nav{
			border-radius: 10px;
			margin: 10px;
			font-size: 15px;
		}
		.navbar-right>li{
			margin:0px 10px;
			border-radius:10px;
			border: 2px solid white;	
		}
		.navbar-right>li:hover,.navbar-default .navbar-fixed-top .navbar-nav>li:hover{
			border-radius:10px;
			background-color: white;
			color: red;
		}
		.dropdown-menu>li>a{
			padding: 10px 50px;
			text-align: center
		}
		body{
			background: url('img/pat.png');
			background-size: 100px;
			padding-top: 100px;
		}
	</style>
</head>
<body>
	<nav class="navbar  navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
					<a href="index.php"><img class="navbar-brand" src="img/logo.png"></a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php"><i class="glyphicon glyphicon-th-list"></i> <b>Daftar UMKM</b></a></li>
				<li><a><i class="glyphicon glyphicon-bullhorn"></i> <b>Event</b></a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
		<?php
			if (isset($_SESSION["level"])) {
		?>
			<li class="dropdown" style="color: white">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#"><b><?php echo $_SESSION['level']." ".$_SESSION['email']; ?> <i class="caret"></i></b></a>
				<ul class="dropdown-menu">
					<li style="width: 100%"><a href="umkm_produk.php"><i class="glyphicon glyphicon-user"></i> <b> Profil</b></a></li>
					<li style="width: 100%"><a href="logout.php"><i class="glyphicon glyphicon-log-in"></i> <b>Logout</b></a></li>
				</ul>
			</li>
		<?php
			} else {
		?>
				<li><a href="daftar.php"><i class="glyphicon glyphicon-edit"></i> <b>Daftar</b></a></li>
				<li><a href="masuk.php"><i class="glyphicon glyphicon-log-in"></i> <b>Masuk</b></a></li>
		<?php
			}
		?>
			</ul>
		</div>
	</nav>
