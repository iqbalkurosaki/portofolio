<?php 
if (!session_id()) {
	session_start();
}

require_once 'cek_akses.php';
require_once '../dynamic_nab.php';
require_once '../koneksi.php';
if (isset($_POST['bukti'])) {
	$target_dir = "../image/bukti_pembayaran/";
	$nama_file = basename($_FILES["berkas"]["name"]);
	$target_file = $target_dir.$nama_file;
	$ekstensi = '.jpg';
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["bukti"])) {
	    $check = getimagesize($_FILES["berkas"]["tmp_name"]);
	    if($check !== false) {
	        $uploadOk = 1;
	    } else {
	        echo "File bukan gambar. <br />";
	        $uploadOk = 0;
	    }
	}

	$target_file = $target_dir.$_POST['id_transaksi'].$ekstensi; //membuat nama file foto sesuai nis
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Ma'af, file anda tidak terupload.<br />";
	// if everything is ok, try to upload file
	} else {
	    if (!move_uploaded_file($_FILES["berkas"]["tmp_name"], $target_file)) {
	        echo "Ma'af, ada kesalahan dalam upload file anda.<br />";
	    }
	}

	if(is_file($target_file)){
		$stmt2 = $db->prepare("UPDATE transaksi SET id_status_transaksi = 2 WHERE id = ?;");
		$stmt2->bindParam(1, $_POST['id_transaksi']);
		if ($stmt2->execute()){
			
		} else {
			echo "Gagal, silahkan menghubungi admin. <br />";		}
	}else{
		echo "Ulangi upload dengan file lain.<br />";
	}
}

$stmt = $db->prepare("SELECT klien.bank,klien.nomor_rekening,klien.nama_pemilik_rekening,klien.email,klien.nomor_ponsel,transaksi.id, transaksi.id_reksadana_tujuan, jenis_transaksi.jenis_transaksi, transaksi.waktu, reksadana.reksadana, transaksi.unit, transaksi.nilai_transaksi, transaksi.biaya_admin, transaksi.total, status_transaksi.status_transaksi FROM klien INNER JOIN transaksi INNER JOIN jenis_transaksi INNER JOIN reksadana INNER JOIN status_transaksi ON transaksi.id_jenis_transaksi = jenis_transaksi.id && transaksi.id_reksadana = reksadana.id && transaksi.id_status_transaksi = status_transaksi.id && transaksi.id_klien = klien.id && transaksi.id = ? ORDER BY transaksi.waktu DESC");
$stmt->bindParam(1, $_GET['id']);
$stmt->execute();
$res = $stmt->fetch();
$stmt3 = $db->prepare("SELECT reksadana.reksadana FROM reksadana WHERE reksadana.id = ?");
echo $res['id_reksadana_tujuan'];
$stmt3->bindParam(1, $res['id_reksadana_tujuan']);
$stmt3->execute();
$nama_reksadana_tujuan = $stmt3->fetch();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="../js/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/effec.js"></script>
	<style type="text/css">
		.hover{
			cursor: pointer;
		}
	</style>
</head>
<body>
	<div class="container">
		<div style="padding: 25px">
				<a href="../index.php"><img src="../img/RF.png" style="max-width: 150px;"></a>
			</div>
		<div class="row text-center" style="border-bottom: 1px solid #63D300">
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
			<h3>Rincian <?php echo $res['jenis_transaksi']; ?> Reksadana <?php echo $res['reksadana'] ?></h3>
			<span class="small text-right" >status : <?php echo $res['status_transaksi']; ?></span>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<table class="table ">
					<thead>
					<tr>
						<th colspan="2"><H3>Data Investor</H3></th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td>Nama pemilik</td>
						<td>: <?php echo $res['nama_pemilik_rekening']; ?></td>
					</tr>
					<tr>
						<td>No Telepon</td>
						<td>: <?php echo $res['nomor_ponsel']; ?></td>
					</tr>
					<tr>
						<td>Email </td>
						<td>: <?php echo $res['email']; ?></td>
					</tr>
					</tbody>
				</table>
				<table class="table ">
					<thead>
					<tr>
						<th colspan="2"><H3>Struk <?php echo $res['jenis_transaksi']; ?></H3></th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td>ID Transaksi</td>
						<td>: <?php echo $res['id']; ?></td>
					</tr>
					<tr>
						<td>Jenis Transaksi</td>
						<td>: <?php echo $res['jenis_transaksi']; ?></td>
					</tr>
					<tr>
						<td>Waktu Transaksi</td>
						<td>: <?php echo $res['waktu'] ?></td>
					</tr>
					<tr>
						<td>Nama Reksadana</td>
						<td>: <?php echo $res['reksadana'] ?></td>
					</tr>
<?php 			if ($res['jenis_transaksi'] == 'pengalihan') {
?>
					<tr>
						<td>Nama Reksadana Tujuan</td>
						<td>: <?php echo $nama_reksadana_tujuan[0]; ?></td>
					</tr>
<?php  			} ?>
					<tr>
						<td>Jumlah Unit</td>
						<td>: <?php echo $res['unit']; ?></td>
					</tr>
<?php 			if ($res['jenis_transaksi'] != 'pengalihan') { ?>
					<tr>
						<td>Nilai Transaksi</td>
						<td>: Rp <?php echo number_format($res['nilai_transaksi'],2,',','.'); ?> -</td>
					</tr>
					<tr>
						<td>Biaya Admin</td>
						<td>: Rp <?php echo number_format($res['biaya_admin'],2,',','.'); ?> -</td>
					</tr>
					</tbody>
					<tfoot>
					<tr>
						<td><b>Total</td>
						<td>: Rp <?php echo number_format($res['total'],2,',','.'); ?> -</b></td>
					</tr>
					</tfoot>
<?php  			} ?>
				</table>
				<table class="table">
					<thead>
					<tr>
						<th colspan='3'><h3>Info <?php echo $res['jenis_transaksi']; ?></h3></th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td>No. Rekening</td>
						<td>: <?php echo $res['nomor_rekening']; ?></td>
					</tr>
					<tr>
						<td>Bank</td>
						<td>: <?php echo $res['bank']; ?></td>
					</tr>
					<tr>
						<td>a/n</td>
						<td>: PT. Reksafund</td>
					</tr>
					</tbody>
				</table>
			</div>
			<?php if ($res['jenis_transaksi'] == 'pembelian') {
			?>
			<div class="col-sm-6">
				<div class="row text-left">
					<table class="table">
					<thead>
						<tr>
							<th><h3 >Bukti Pembayaran</h3></th>
						</tr>
					</table>					
				</div>
				<?php if (!is_file('../image/bukti_pembayaran/'.$res["id"].'.jpg')) {
					?>
					<div class="row text-center " id="dropbukti" style="margin:20px;padding: 50px 0px;border: 3px dotted #CFCECE" ondrop="upload_file(event)" ondragover="return false">
						<div id="text">
							<h1><i class="glyphicon glyphicon-picture"></i></h1>
							<button class="btn btn-primary" onclick="file_explorer('<?php echo $res['id']; ?>')"><i class="glyphicon glyphicon-briefcase"></i> Upload Bukti</button>

						<h6 class="small">Ukuran gambar bukti maksimal. 2MB,<br> dengan ekstensi .JPG</h6>
						</div>
						<div style="display: none;width: 300px; height: 300px;margin: 0px auto;" id="gambar">
							<button class="btn btn-danger" onclick="batal()"><i class="glyphicon glyphicon-trash"></i>Ganti Bukti</button>
						</div>
						<br>
						<h4 id="namaFile" style="white-space: nowrap; text-overflow: ellipsis; width: 150px; overflow: hidden; font-weight: bold;margin: 0px auto"></h4> <br>
						<form method='post' enctype='multipart/form-data' \>
							<input type='hidden' name='id_transaksi' value=<?php echo $res['id']; ?>>
							<input type="file" id="berkas" name="berkas" accept="image/*" style="display: none;" />
							<input type="reset" id="reset1" style="display: none;">
							<button type="button" id="bukti1" style="display: none;margin:0px auto" class="btn btn-success" data-toggle="modal" data-target="#confirm"><i class="glyphicon glyphicon-send"></i> Kirim Bukti</button>
							<div id="confirm" class="modal fade" role="dialog">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header text-left">
							      <h3>PEMBERITAHUAN</h3>
							      </div>
							      <div class="modal-body text-center">
							      	 <i style="font-size: 590%" class="glyphicon glyphicon-info-sign"></i>
							      	<h5>File Yang Sudah Diupload Tidak dapat Dirubah Lagi <br> Jika Anda sudah Yakin klik Ya </h5><br>
							      </div>
							      <div class="modal-footer "> 
							        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove-sign"></i> Tidak</button>
							        <button type="submit" name="bukti" class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Ya</button>
							      </div>
							    </div>
							  </div>
							</div>
						</form>
					</div><?php 
				} else {
					$lok = '../image/bukti_pembayaran/'.$res["id"].'.jpg';
					?>
					<div class="row text-center " style="margin-bottom:20px;padding: 50px 0px;border: 3px dotted #CFCECE">
					<div style="background-image:url('<?php echo $lok; ?>');background-size: 100% 100%;width: 300px; height: 300px;margin: 0px auto" id="gambar">					
						</div>
					</div>
				<?php
				} ?>
			</div>
		</div>
		<?php	
			} ?>
		<div class="row">
			
		</div>
	</div>
</body>
</html>