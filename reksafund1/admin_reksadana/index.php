<?php
	if (!session_id()) {
		session_start();
	}
	if (!isset($_SESSION['akses']) || $_SESSION['akses']!='admin_reksadana') {
		header('Location: ../index.php');
	}
	require_once '../dynamic_nab.php';
	require_once '../koneksi.php';
	if (isset($_POST['konfirmasi'])) {
		if ($_POST['id_jenis_transaksi']==1) {
			$db->beginTransaction();
			$stmt=$db->prepare("UPDATE transaksi SET id_status_transaksi = 4, id_admin_reksadana = ? WHERE id = ?");
			$stmt->bindParam(1, $_SESSION['id']);
			$stmt->bindParam(2, $_POST['id_transaksi']);
			if (!($stmt->execute())){
				echo "<script>alert('Konfirmasi gagal!')</script>";
			} else {
				$stmt = $db->prepare("CALL update_up_klien(?, ?, ?, ?, ?)");
				$stmt->bindParam(1, $_POST['id_jenis_transaksi']);
				$stmt->bindParam(2, $_POST['id_klien']);
				$stmt->bindParam(3, $_POST['id_reksadana']);
				$stmt->bindParam(4, $_POST['up']);
				$stmt->bindParam(5, $_POST['id_reksadana_tujuan']);
				$stmt->execute();
				$db->commit();
			}	
		} elseif ($_POST['id_jenis_transaksi']==2) {
			$db->beginTransaction();
			$stmt=$db->prepare("UPDATE transaksi SET id_status_transaksi = 2, id_admin_reksadana = ? WHERE id = ?");
			$stmt->bindParam(1, $_SESSION['id']);
			$stmt->bindParam(2, $_POST['id_transaksi']);
			if (!($stmt->execute())){
				echo "<script>alert('Konfirmasi gagal!')</script>";
			} else {
				$stmt = $db->prepare("CALL update_up_klien(?, ?, ?, ?, ?)");
				$stmt->bindParam(1, $_POST['id_jenis_transaksi']);
				$stmt->bindParam(2, $_POST['id_klien']);
				$stmt->bindParam(3, $_POST['id_reksadana']);
				$stmt->bindParam(4, $_POST['up']);
				$stmt->bindParam(5, $_POST['id_reksadana_tujuan']);
				$stmt->execute();
				$db->commit();
			}
		} elseif ($_POST['id_jenis_transaksi']==3) {
			$db->beginTransaction();
			$stmt=$db->prepare("UPDATE transaksi SET id_status_transaksi = 4, id_admin_reksadana = ? WHERE id = ?");
			$stmt->bindParam(1, $_SESSION['id']);
			$stmt->bindParam(2, $_POST['id_transaksi']);
			if (!($stmt->execute())){
				echo "<script>alert('Konfirmasi gagal!')</script>";
			} else {
				$stmt = $db->prepare("CALL update_up_klien(?, ?, ?, ?, ?)");
				$stmt->bindParam(1, $_POST['id_jenis_transaksi']);
				$stmt->bindParam(2, $_POST['id_klien']);
				$stmt->bindParam(3, $_POST['id_reksadana']);
				$stmt->bindParam(4, $_POST['up']);
				$stmt->bindParam(5, $_POST['id_reksadana_tujuan']);
				$stmt->execute();
				$db->commit();
			}
		}
	}
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
			<div style="margin: 25px 0px"><img src="../img/RF.png" class="img-responsive" width="150px" >
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
			      <li ><a href="../data.php"><i class="	glyphicon glyphicon-plus-sign"></i> PEMBELIAN</a></li>
			      <li ><a href="#"><i class="glyphicon glyphicon-minus-sign"></i> PENJUALAN</a></li>
			      <li ><a href="#"><i class="glyphicon glyphicon-share"></i> PENGALIHAN</a></li>
			    </ul>
			    <?php if (isset($_SESSION['akses'])){
			    ?>
			    <ul class="nav navbar-nav navbar-right text-center">
				  <li><a><span class="glyphicon glyphicon-user"></span> Hai <?php echo $_SESSION['nama']; ?> </a></li>
				  <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>
				  <!-- <li class="dropdown"> 
				  <a class="dropdown-toggle hover" type="button" data-toggle="dropdown"><i class="glyphicon glyphicon-th"></i></a>
				  <ul class="nav navbar-nav navbar-right dropdown-menu">
				      <li><a href="profil.php"><span class="glyphicon glyphicon-list-alt"></span> Lihat Berkas Anda </a></li>
				      <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>
			      </ul>
			      </li> -->
				</ul> 
			    <?php
			    }?>
			  </div>
			</nav>
		</div>
		<div class="row">
			<div class="text-center">
				<H1>Dashboard</H1>
			</div>
		</div>
		<div class="row">
			<h3>Daftar Transaksi</h3>
			<?php 
			$stmt = $db->query("SELECT transaksi.id, jenis_transaksi.jenis_transaksi, transaksi.id_jenis_transaksi, transaksi.waktu, klien.id AS id_klien, klien.nama_pemilik_rekening, reksadana.reksadana, transaksi.unit, reksadana.nab, transaksi.biaya_admin, status_transaksi.status_transaksi, transaksi.id_status_transaksi, reksadana.id AS id_reksadana, transaksi.id_reksadana_tujuan FROM transaksi INNER JOIN jenis_transaksi INNER JOIN reksadana INNER JOIN klien INNER JOIN status_transaksi ON transaksi.id_jenis_transaksi = jenis_transaksi.id && transaksi.id_reksadana = reksadana.id && transaksi.id_klien = klien.id && transaksi.id_status_transaksi = status_transaksi.id WHERE (transaksi.id_status_transaksi=3 AND transaksi.id_jenis_transaksi=1) OR (transaksi.id_status_transaksi=3 AND transaksi.id_jenis_transaksi=2) OR (transaksi.id_status_transaksi = 3 AND transaksi.id_jenis_transaksi = 3) ORDER BY transaksi.waktu ASC");
			if ($stmt->rowCount() > 0) {
?>
			<div class="table-responsive" style="margin-bottom: 50px">
			<table class="table ">
				<tr>
					<th>ID Transaksi</th>
					<th>Jenis Transaksi</th>
					<th width="125">Waktu</th>
					<th>Nama Klien</th>
					<th>Nama Reksadana</th>
					<th>Unit Penyertaan</th>
					<th>NAB</th>
					<th width="120px">Biaya Admin</th>
					<th>Status</th>
					<th>Konfirmasi</th>
				</tr>
				<tr>
			<?php
			while ($res = $stmt->fetch()) {
				echo "
				<tr>"; ?>
					<td><?php echo $res['id']."</a></td>
					<td>".$res['jenis_transaksi']."</td>
					<td>".date('D, d-m-Y',strtotime($res['waktu']))."<br>".date('H:i:s',strtotime($res['waktu']))."</td>
					<td>".$res['nama_pemilik_rekening']."</td>
					<td>".$res['reksadana']."</td>
					<td>".$res['unit']."</td>
					<td>".$res['nab']."</td>
					<td>Rp ".number_format($res['biaya_admin'],2,',','.')." -</td>
					<td>".$res['status_transaksi']."</td>"?>
					<form method="post">
						<input type="hidden" name="id_jenis_transaksi" value=<?php echo $res['id_jenis_transaksi']; ?> >
						<input type="hidden" name="id_transaksi" value="<?php echo $res['id']; ?>">
						<input type="hidden" name="id_klien" value="<?php echo $res['id_klien']; ?>">
						<input type="hidden" name="id_reksadana" value=<?php echo $res['id_reksadana']; ?> >
						<input type="hidden" name="id_reksadana_tujuan" value=<?php echo $res['id_reksadana_tujuan']; ?>>
						<input type="hidden" name="up" value="<?php echo $res['unit']; ?>">
						<td><button class="btn btn-info" type="submit" onclick="return confirm('Apakah Anda Yakin Untuk Mengkonfirmasinya ?')" name="konfirmasi" value="Konfirmasi"> Konfirmasi </button></td>
					</form>
				</tr><?php
			}
			?>
			</table>
			</div>
			<?php 
		} else{?>
			<div class="jumbotron text-center"><h1 style="color: #D7D2D2">Tidak Ada Transaksi</h1> </div>
		<?php
		}
		?>
		</div>
	</div>
</body>
</html>