<?php
if (!session_id()) {
	session_start();
}
require_once'cek_akses.php';
require_once '../dynamic_nab.php';
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
<body bgcolor="#7F7F7F">
<div class="container" >
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
<?php
	if (isset($_SESSION['akses'])){
		if ($_SESSION['akses'] == 'klien') {
?>
		    <ul class="nav navbar-nav text-center" id="demo">
		      <li ><a href="../data.php"><i class="glyphicon glyphicon-plus-sign"></i> PEMBELIAN</a></li>
		      <li class="active" ><a href="#"><i class="glyphicon glyphicon-minus-sign"></i> PENJUALAN</a></li>
		      <li ><a href="pengalihan.php"><i class="glyphicon glyphicon-share"></i> PENGALIHAN</a></li>
		    </ul>
<?php
		}
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
	} else {
?>
		    <ul class="nav navbar-nav navbar-right text-center">
		    <li><a href="../login_page.php"><i class="glyphicon glyphicon-check"></i> Login</a> </li>
			</ul>
		    <ul class="nav navbar-nav text-center" id="demo">
		      <li ><a href="login_page.php"><i class="glyphicon glyphicon-plus-sign"></i> PEMBELIAN</a></li>
		      <li ><a href="login_page.php"><i class="glyphicon glyphicon-minus-sign"></i> PENJUALAN</a></li>
		      <li ><a href="login_page.php"><i class="glyphicon glyphicon-share"></i> PENGALIHAN</a></li>
		    </ul>
<?php
	}
?>
	  </div>
	</nav>
 <?php 
	require_once '../koneksi.php';
	$stmt = $db->prepare("SELECT reksadana.id, reksadana.reksadana, reksadana.jenis, reksadana.nab, up_klien.up FROM up_klien INNER JOIN reksadana ON up_klien.id_reksadana = reksadana.id WHERE up_klien.up>0 AND up_klien.id_klien = ?");
	$stmt->bindParam(1, $_SESSION['id']);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
  ?>
  <div class="row table-responsive" style="margin-left: 5px">
	<h3>Penjualan Reksadana</h3>
	<div style="height: 400px; overflow: scroll;">
		<table class="table table-bordered">
	    <thead>
	      <tr>
	        <th>Nama Reksadana</th>
	<?php
		if ((!isset($_SESSION['akses']) || $_SESSION['akses']=='klien')) {
		?>
	        <th>Jual</th>
	<?php	}
	?>
	        <th>Jenis</th>
	        <th>NAB</th>
			<th>Unit Penyertaan</th>
	      </tr>
	    </thead>
	    <tbody>
	    <?php
	    	while ($res = $stmt->fetch()){
				echo "
					<tr>
						<td>".$res[1]."</td>";
				if (!isset($_SESSION['akses'])) { ?>
					<td><button class="btn btn-success" onclick="window.location.href='login_page.php'">Beli</button></td>
	<?php
				} elseif ($_SESSION['akses']=='klien') { ?>
					<td><button class="btn btn-success" onclick="window.location.href='jual_reksadana.php?r=<?php echo $res[0]; ?>'">Jual</button></td>
	<?php
				}
				echo	"<td>".$res[2]."</td>
						<td>".$res[3]."</td>
						<td>".$res[4]."</td>
					</tr>";
			}
	} else {
	    ?> <div class="jumbotron text-center"><h1 style="color: #D7D2D2">Tidak Ada Reksadana Yang Dapat Dijual</h1> </div>
	     <?php  
	} ?>
    </tbody>
  </table>
  </div>
  </div>
</div>
<div class="footer text-center">CopyRight &copy; 2018 Reksafund </div>
</body>
</html>