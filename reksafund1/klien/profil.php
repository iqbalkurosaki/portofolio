<?php 
if (!session_id()) {
	session_start();
}

require_once 'cek_akses.php';
require_once '../dynamic_nab.php';
require_once '../koneksi.php';
$stmt = $db->prepare("SELECT klien.*, transaksi.unit ,profil_resiko.profil_resiko, transaksi.id, jenis_transaksi.jenis_transaksi, transaksi.waktu, reksadana.reksadana, transaksi.total, status_transaksi.status_transaksi FROM profil_resiko INNER JOIN klien INNER JOIN transaksi INNER JOIN jenis_transaksi INNER JOIN reksadana INNER JOIN status_transaksi ON transaksi.id_jenis_transaksi = jenis_transaksi.id && transaksi.id_reksadana = reksadana.id && transaksi.id_status_transaksi = status_transaksi.id && transaksi.id_klien = klien.id && klien.id = ? && transaksi.id_status_transaksi != 0 ORDER BY transaksi.id_status_transaksi ASC, transaksi.waktu DESC");
$stmt->bindParam(1, $_SESSION['id']);
$stmt->execute();
		$hsl=$stmt->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="../js/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<style type="text/css">
		.hover{
			cursor: pointer;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div style="padding: 25px">
				<a href="../index.php"><img src="../img/RF.png" style="max-width: 150px;"></a>
			</div>
			<nav class="navbar navbar-default" style="border-radius: 0px;border:none">
				<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>                        
			    </button>
				</div>
		      <div class="collapse navbar-collapse" id="myNavbar">
			    <ul class="nav navbar-nav text-center" id="demo">
			      <li ><a href="../data.php"><i class="glyphicon glyphicon-plus-sign"></i> PEMBELIAN</a></li>
			      <li ><a href="penjualan.php"><i class="glyphicon glyphicon-minus-sign"></i> PENJUALAN</a></li>
			      <li ><a href="pengalihan.php"><i class="glyphicon glyphicon-share"></i> PENGALIHAN</a></li>
			    </ul>
			    <?php if (isset($_SESSION['akses'])){
			    ?>
			    <ul class="nav navbar-nav navbar-right text-center">
				  <li class="dropdown"> 
				  <a class="dropdown-toggle hover" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['nama']; ?> </a>
				  <ul class="nav navbar-nav navbar-right dropdown-menu">
				      <li><a href="rincian.php"><span class="glyphicon glyphicon-record"></span> Daftar Transaksi Anda </a></li>
				      <li><a href="reksadana.php"><span class="glyphicon glyphicon-stats"></span> Daftar Reksadana Anda </a></li>
				      <li><a href="profil.php"><span class="glyphicon glyphicon-cog"></span> Lihat Akun Anda </a></li>
				      <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>
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
		</div>
		<div class="row">
			<div class="text-center">
				<H1>Akun</H1>
			</div>
			<div class="col-sm-5">
				<table class="table ">
					<thead>
					<tr>
						<th colspan="2"><H3>Rincian Data Investor</H3></th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td>Nama pemilik</td>
						<td>: <?php echo $hsl['nama_pemilik_rekening']; ?></td>
					</tr>
					<tr>
						<td>No Telepon</td>
						<td>: <?php echo $hsl['nomor_ponsel']; ?></td>
					</tr>
					<tr>
						<td>Tanggal Lahir </td>
						<td>: <?php echo $hsl['tanggal_lahir']; ?></td>
					</tr>
					<tr>
						<td>Email </td>
						<td>: <?php echo $hsl['email']; ?></td>
					</tr>
					<tr>
						<td>Profil Resiko </td>
						<td>: <?php echo $hsl['profil_resiko']; ?></td>
					</tr>
					<tr>
						<td>Penghasilan Pertahun</td>
						<td>: Rp <?php echo number_format($hsl['penghasilan_pertahun'],2,',','.'); ?> -</td>
					</tr>
					<tr>
						<td>No Rekening</td>
						<td>: <?php echo $hsl['nomor_rekening']; ?></td>
					</tr>
					<tr>
						<td>Bank</td>
						<td>: <?php echo $hsl['bank']; ?></td>
					</tr>
					<tr>
						<td>Cabang</td>
						<td>: <?php echo $hsl['cabang']; ?></td>
					</tr>
					<tr>
						<td>Mata Uang </td>
						<td>: <?php echo $hsl['id_mata_uang']; ?></td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>