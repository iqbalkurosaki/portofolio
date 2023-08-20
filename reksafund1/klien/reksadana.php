<?php 
if (!session_id()) {
	session_start();
}

require_once 'cek_akses.php';
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
			    <li><a href="../login_page.php"><i class="glyphicon glyphicon-check"></i> Login</a> </li>
				</ul>
				<?php 
			    } ?>
			  </div>
			</nav>
		</div>
	<div class="col-sm-14">
		<form class="form-inline">
		    <div class="input-group">
		      <input type="email" class="form-control" size="10" placeholder="cari" required>
		      <div class="input-group-btn">
		        <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
		      </div>
		    </div>
		    <div class="input-group">
		    	<select class="form-control" id="bank" required>
		    		<option disabled selected> Jenis </option>
				    <option value="bri">Saham</option>
					<option value="bni">Pendapatan Tetap</option>
					<option value="bca">Pasar Uang</option>
					<option value="bni">Campuran</option>
					<option value="bca">Syariah</option>
				  </select>
		    </div>
		  </form>
	</div>
<div class="row table-responsive" style="margin-left: 5px">
	<h3>Daftar Reksadana Anda</h3>
	<div style="height: 400px; overflow: scroll;">
		<table class="table table-bordered">
    <thead>
      <tr>
        <th>Nama Reksadana</th>
        <th>Jenis</th>
        <td width="125">Waktu</td>
        <th>NAB Saat Ini</th>
        <th>Unit Penyertaan</th>
		<th>Lihat Perkembangan</th>
      </tr>
    </thead>
    <tbody>
    <?php
    	require_once '../koneksi.php';
		$stmt = $db->prepare("SELECT reksadana.id, reksadana.reksadana, reksadana.jenis, transaksi.waktu, reksadana.nab AS nab_saat_ini, up_klien.up  FROM reksadana INNER JOIN up_klien INNER JOIN transaksi ON up_klien.id_reksadana = reksadana.id && ((up_klien.id_reksadana = transaksi.id_reksadana && transaksi.id_jenis_transaksi = 1) OR (up_klien.id_reksadana = transaksi.id_reksadana_tujuan && transaksi.id_jenis_transaksi = 3)) && up_klien.id_klien = transaksi.id_klien WHERE  transaksi.id_status_transaksi = 4 && up_klien.id_klien = ? && up_klien.up > 0 GROUP BY up_klien.id_reksadana ORDER BY transaksi.waktu DESC");
		$stmt->bindParam(1, $_SESSION['id']);
    	$stmt->execute();
    	while ($res = $stmt->fetch()){
			echo "
				<tr>
					<td>".$res['reksadana']."</td>
					<td>".$res['jenis']."</td>
					<td>".date('D, d-m-Y',strtotime($res['waktu']))."<br>".date('H:i:s',strtotime($res['waktu']))."</td>
					<td>".$res['nab_saat_ini']."</td>
					<td>".$res['up']."</td>";
$t = date('Y-m-d', strtotime($res[3]));
?>
					<td><button class="btn btn-success" onclick="window.location.href='../perkembangan.php?r=<?php echo $res[0];?>&t=<?php echo $t; ?>'">Lihat</button></td>
				</tr>
<?php
			}
    ?>
    </tbody>
  </table>
  </div>
</div>
</div>
<div class="footer text-center">CopyRight &copy; 2018 Reksafund </div>
</body>
</html>