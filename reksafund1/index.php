<?php
	require_once "koneksi.php";
	require_once 'dynamic_nab.php';
	if (!session_id()) {
		session_start();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<style type="text/css">
		.daftar{
			background: rgba(86,183,0,0.8);
			padding: 20px 20px ;
			margin-top: 90px;
		}
		.success-transparan{
			border:2px solid white;
			border-radius:0px;
			font-weight: bold;
			background-color: #56B700;
		}
		.success-transparan:hover {
			background-color: white;
			color: #56B700;
		}
		.container-fluid{
			padding: 0px;
		}
		.container-fluid .jumbotron{
			border-radius: 0px
		}
		.header{
			margin-bottom: 50px;
			color:white;
			border-radius: 0px;
			height: 615px;
			background: url(img/invest4.jpg);
			background-attachment: fixed;
			background-size: cover;
		}
		.welcome{
			text-shadow:2px 2px 3px rgba(0,0,0,0.3);
			color: white
		}
		.welcomeCover{
			max-width: 590px;
			margin: 0px auto
		}
		.navbar{
			border:none;
			background-color: #56B700;
			padding: 0px 20px 0px 250px;
			margin-bottom: 0px;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			border-radius: 0px;
			font-weight: bold;
		}
		.navbar-default .navbar-nav>li>a{color: white;font-size:120%;width: 100%}
		.navbar-default .navbar-nav>li>a:hover{background-color: #63D300;color: white}
		.collapse navbar-collapse{

		}
		.logo{
			padding: 30px;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			position: absolute;
			top: 0px;
			left: 50px;
			z-index: 1;
			background-color: white;
		}
		.shadow{
			text-shadow: 2px 2px 4px #000000;
		}
		.center{
			margin: 0px auto;
		}
		.strip_pilihan{
			background-color: #63D300;
			color: white;
			padding:10px
		}
		.reksa{
			padding: 20px
		}
		.strip_petunjuk{
			background-color: #00B4FF;
			color: white;
			padding:10px
		}
		.footer{
			background-color: #F8F8F8;
			font-weight: bold;
			padding: 10px;
			margin-top: 75px
		}
		.navbar-brand{
			margin: 0px auto;
			padding: 10px 15px; 
			display: inline-block;
		}
		.hover{
			cursor: pointer;
		}
		.logonya{
			display: none;
		}
		@media only screen and (max-width: 768px){
			.logonya{
				margin-left:20px;
				background-color: white;
				display: block;
			}
			.daftar{
				display: none;
			}
			.collapse .navbar-collapse{
			}
			.navbar-default .navbar-collapse, .navbar-default .navbar-form{
				background-color: white;				
			}
			.navbar-default .navbar-nav>li>a{
				text-align: left;
				background-color: white;
				color: #63D300;
				font-weight: bold;
				width: 100%;
			}
			.logo{
				display: none;
			}
			.container-fluid{
				margin-top: 0px;
			}
			.navbar{
				padding: 0px
			}
			.navbar-header{
			}
			.navbar-toggle{
				background-color: white;
			}
			.img{
				max-width: 350px;
			}
		}
	</style>
</head>
<body >
<div class="container-fluid">
	<div class="logo">
		<img src="img/RF.png" class="img-responsive center" width="150">

	</div>
	<nav class="text-center" style="background-color: #1B6000;color: white;padding: 10px 0px;font-family: sans-serif;">
	
	</nav>
	<nav class="navbar navbar-default">
		<div class="navbar-header">
		<img src="img/RF.png" class="navbar-brand img-responsive logonya" width="">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>                        
	    </button>
		</div>
      <div class="collapse navbar-collapse" id="myNavbar" >
	    <ul class="nav navbar-nav text-center" id="demo">
	      <li ><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
	      <li ><a href="data.php"><span class="glyphicon glyphicon-list-alt"></span> Data</a></li>
	      <li ><a href="#"><span class="glyphicon glyphicon-book"></span> Petunjuk</a></li>
	    </ul>
	    <?php if (isset($_SESSION['akses'])){
	    	?>
	    	<ul class="nav navbar-nav navbar-right text-center">
		  <li class="dropdown"> 
		  <a class="dropdown-toggle hover" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-user dropdown"></span> <?php echo $_SESSION['nama']; ?> </a>
		  <ul class="nav navbar-nav navbar-right dropdown-menu" style="background-color: rgb(86,183,0);">
		      <li><a href="klien/rincian.php"><span class="glyphicon glyphicon-record"></span> Daftar Transaksi Anda </a></li>
		      <li><a href="klien/reksadana.php"><span class="glyphicon glyphicon-stats"></span> Daftar Reksadana Anda </a></li>
		      <li><a href="klien/profil.php"><span class="glyphicon glyphicon-cog"></span> Lihat Akun Anda </a></li>
		      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>
	      </ul>
	      </li>
		</ul> 
	    	<?php
	    } else { ?>
	    <ul class="nav navbar-nav navbar-right text-center">
	    <li><a href="login_page.php"><i class="glyphicon glyphicon-check"></i> Login</a> </li>
		</ul>
		<?php 
	    } ?>
	  </div>
	</nav>
	<div class="jumbotron header">
		<div class="col-sm-8" style="padding-top: 150px;">
		<h1 class="shadow">Siapkan Masa Depanmu Mulai Sekarang</h1>
		<h5 style="width: 70%">Disini Kami menyiapkan berbagai jenis pilihan reksadana yang anda butuhkan dan saran agar mendapatkan keuntungan yang maksimal <br> PT.Reksafund </h5>
		</div>
		<?php if (!isset($_SESSION['akses'])) {
			?>
			<div class="col-sm-4 text-center daftar" >
			<div class="col-sm-14" style="padding:5px;border-bottom: 1px solid white;margin-bottom: 20px">
			<h3><b>Daftar Reksafund</b></h3>
			</div>
			<form class="form-horizontal" action="signup_page.php" method="post">
				<div class="form-group">
				  <label class="control-label col-sm-4" for="nama">Nama:</label>
				  <div class="col-sm-8">
				    <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" name="nama_temp" required>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-4" for="email">Email:</label>
				  <div class="col-sm-8">
				    <input type="email" class="form-control" id="email" placeholder="Masukkan email anda" name="email_temp" required>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-4" for="telp">No Telp:</label>
				  <div class="col-sm-8">
				    <input type="text" class="form-control" maxlength="15" id="telp" pattern="[0-9]+" placeholder="Nomor Telepon" name="nomor_telepon_temp" required>
				  </div>
				</div>
				<div class="form-group text-right">
				  <div class="col-sm-12">
				    <button type="submit" class="btn success-transparan" >Daftar</button>
				  </div>
				</div>
			</form>
		</div>
			<?php
		} ?>
	</div>
	<div class="row" style="padding: 0px 20px">
	<div class="col-sm-8">
		<h3 class="strip_pilihan">Pilihan Reksadana</h3>
		<?php
		 $stmt=$db->query("SELECT * FROM reksadana LIMIT 11");
		 while ($res=$stmt->fetch()) { ?>
		<div class="col-sm-6 reksa" >
			<div class="col-sm-6"><img src="img/RD.png" class="img-thumbnail" ></div>
			<div class="col-sm-6">
				<div class="col-sm-12">Jenis : <?php echo $res['jenis']; ?></div>
				<div class="col-sm-12"><b><?php echo $res['reksadana']; ?></b></div>
				<div class="col-sm-6">
					<div class="col-sm-14">NAB </div>
					<div class="col-sm-14"><?php echo $res['nab']; ?></div>
				</div>
				<div class="col-sm-6">
					<div class="col-sm-14">Return </div>
					<div class="col-sm-14"><?php echo $res['1bln']; ?></div>
				</div>
				<div class="col-sm-14 text-right">
					<?php if (!isset($_SESSION['akses'])) { ?>
						<button class="btn btn-success" onclick="window.location.href='login_page.php'">Beli</button>
		<?php
					} elseif ($_SESSION['akses']=='klien') { ?>
						<button class="btn btn-success" onclick="window.location.href='klien/beli_reksadana.php?r=<?php echo $res[0]; ?>'">Beli</button>
		<?php
					} ?>
				</div>
			</div>
		</div>
		<?php ;}?>
		<H4 class="text-right">
		<a href="data.php">Lihat Semua >></a>
		</h4>
	</div>
	<div class="col-sm-4">
		<h3 class="strip_petunjuk">Reksadana</h3>
		<h3>Apa Itu Reksadana ?</h3>
		Reksa Dana adalah wadah yang dipergunakan untuk menghimpun dana dari masyarakat pemodal untuk selanjutnya diinvestasikan dalam Portofolio Efek oleh Manajer Investasi (UU No 8 Th 1995 Pasal 1 angka 27 tentang Pasar Modal).
		<h3>Jenis-jenisnya Apa Saja ?</h3>
		<h5>1. Reksa Dana Saham</h5>
		<p>Reksadana saham menempatkan dananya minimal 80% ke saham. Sehingga, Anda berpotensi mendapatkan keuntungan yang paling besar daripada reksadana yang lain. Namun demikian, resikonya juga paling besar.</p>
		<h5>2. Reksa Dana Pendapatan Tetap </h5>
		<p>Reksadana pendapatan tetap dananya dialokasikan ke obligasi minimal 80%. Return-nya lebih tinggi dari pada reksadana pasar uang. Umumnya, return-nya bisa mencapai lebih dari 10% per tahun.</p>
		<h5>3. Reksa Dana Pasar Uang </h5>
		<p>Reksadana ini seluruhnya ditempatkan pada deposito, SBI (Sertifikat Bank Indonesia), dan obligasi. Jatuh temponya kurang dari satu tahun. Reksadana ini relatif lebih aman dari pada reksadana lainnya, namun potensi keuntungannya hanya sedikit di atas deposito.</p>
		<h5>4. Reksa Dana Campuran </h5>
		<p>Sesuai namanya, reksadana campuran mengalokasikan dananya di berbagai instrumen keuangan, seperti deposito, obligasi, dan saham. Karena dapat berinvestasi saham, reksadana campuran lebih beresiko. Akan tetapi, hasil return-nya yang lebih tinggi daripada reksadana pendapatan tetap.</p>
		<h5>5. Reksa Dana Syariah </h5>
		<p>Reksa dana syariah adalah reksa dana yang beroperasi menurut ketentuan dan prinsip Sariah Islam baik dalam bentuk akad antara pemodal sebagai pemilik harta dengan manajer investasi sebagai wakil, maupun antara manajer investasi sebagai wakil dengan pengguna dana. Reksa dana syariah tidak akan menginvestasikan dananya pada obligasi dari perusahaan yang pengelolaan atau produknya bertentangan dengan syariat Islam.</p>
		<h3>Bagaimana Cara Kerjanya ?</h3><br>
		<H4 class="text-right">
		<a href="#">Lihat Selengkapnya >></a>
		</h4>
	</div>
	</div>
</div>
<div class="footer text-center">CopyRight &copy; 2018 Reksafund </div>
</body>
</html>
