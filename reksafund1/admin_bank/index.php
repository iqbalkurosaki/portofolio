<?php
	
	if (!session_id()) {
		session_start();
	}
	if (!isset($_SESSION['akses']) || $_SESSION['akses']!='admin_bank') {
		header('Location: ../index.php');
	}
	require_once '../dynamic_nab.php';
	require_once '../koneksi.php';
	if (isset($_POST['konfirmasi'])) {
		if ($_POST['id_jenis_transaksi']==1) {
			$stmt=$db->prepare("UPDATE transaksi SET id_status_transaksi = 3, id_admin_bank = ? WHERE id = ?");
			$stmt->bindParam(1, $_SESSION['id']);
			$stmt->bindParam(2, $_POST['id_transaksi']);
			if (!($stmt->execute())){
				echo "<script>alert('Konfirmasi gagal!')</script>";
			}
		} elseif ($_POST['id_jenis_transaksi']==2) {
			$stmt=$db->prepare("UPDATE transaksi SET id_status_transaksi = 4, id_admin_bank = ? WHERE id = ?");
			$stmt->bindParam(1, $_SESSION['id']);
			$stmt->bindParam(2, $_POST['id_transaksi']);
			if (!($stmt->execute())){
				echo "<script>alert('Konfirmasi gagal!')</script>";
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
			$stmt = $db->query("SELECT transaksi.id, jenis_transaksi.jenis_transaksi, transaksi.waktu, reksadana.reksadana, klien.nomor_rekening, klien.nama_pemilik_rekening, transaksi.total, status_transaksi.status_transaksi, transaksi.id_status_transaksi, transaksi.id_jenis_transaksi FROM transaksi INNER JOIN jenis_transaksi INNER JOIN reksadana INNER JOIN klien INNER JOIN status_transaksi ON transaksi.id_jenis_transaksi = jenis_transaksi.id && transaksi.id_reksadana = reksadana.id && transaksi.id_klien = klien.id && transaksi.id_status_transaksi = status_transaksi.id WHERE transaksi.id_status_transaksi=2 ORDER BY transaksi.waktu ASC");
if ($stmt->rowCount() > 0) {

?>
			<table class="table table-stripped">
				<tr>
					<th>ID Transaksi</th>
					<th>Jenis Transaksi</th>
					<th width="125">Waktu</th>
					<th>Nama Reksadana</th>
					<th>Nomor Rekening</th>
					<th>a/n</th>
					<th>Total Pembayaran</th>
					<th>Status</th>
					 <th>Bukti</th> 

					<th>Konfirmasi</th>
				</tr>
				<tr>
			<?php
			while ($res = $stmt->fetch()) {
				$lok = "../image/bukti_pembayaran/".$res['id'].".jpg";
				echo "
				<tr>"; ?>
					<td><?php echo $res['id']."</a></td>
					<td>".$res['jenis_transaksi']."</td>
					<td>".date('D, d-m-Y',strtotime($res['waktu']))."<br>".date('H:i:s',strtotime($res['waktu']))."</td>
					<td>".$res['reksadana']."</td>
					<td>".$res['nomor_rekening']."</td>
					<td>".$res['nama_pemilik_rekening']."</td>
					<td>Rp ".number_format($res['total'],2,',','.')." -</td>
					<td>".$res['status_transaksi']."</td>";
					if (is_file($lok)){
					echo	"<td>"?><img src="../image/bukti_pembayaran/<?php echo $res['id'].'.jpg'; ?>" class="img-thumbnail hover" width='200px' data-toggle="modal" data-target="#myModal<?php echo $res['id'] ?>">
						</td>
						<div class="modal fade" id="myModal<?php echo $res['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					    <div class="modal-dialog" data-dismiss="modal">
					      <div class="modal-content"  >              
					        <div class="modal-body">
					          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					             <img src="../image/bukti_pembayaran/<?php echo $res['id'].'.jpg';?>" class="imagepreview" style="width: 100%;" >
					        </div>           
						   </div>
						 </div>
					<?php } else {
						echo "<td></td>";
					} ; ?>
					<form method="post">
						<input type="hidden" name="id_jenis_transaksi" value=<?php echo $res['id_jenis_transaksi']; ?>>
						<input type="hidden" name="id_transaksi" value="<?php echo $res['id']; ?>">
						<td>
							<button type="button" class="btn btn-success" data-toggle="modal" data-target="#confirm">Konfirmasi</button>
							<div id="confirm" class="modal fade" role="dialog">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							      <h3>PEMBERITAHUAN</h3>
							      </div>
							      <div class="modal-body text-center">
							      	 <i style="font-size: 590%" class="glyphicon glyphicon-info-sign"></i>
							      	<h5>Konfirmasi tidak dapat dilakukan dua kali pada transaksi yang sama<br>Jika anda sudah yakin klik konfirmasi</h5>
							      </div>
							      <div class="modal-footer "> 
							        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove-sign"></i> Tidak</button>
							        <button type="submit" name="konfirmasi" class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Ya</button>
							      </div>
							    </div>
							  </div>
							</div>
						</td>
					</form>
				</tr><?php
			}
			?>
			</table>
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