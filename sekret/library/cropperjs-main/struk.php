<?php 
if (!session_id()) {
	session_start();
}

// require_once '../koneksi.php';
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
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="../jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="effec.js"></script>
	<style type="text/css">
		.hover{
			cursor: pointer;
		}
	</style>
</head>
<body>
	<div class="container">
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
			  </div>
			</nav>
			<h3>Rincian <?php echo 'jenis_transaksi'; ?> Reksadana <?php echo 'reksadana'; ?></h3>
			<span class="small text-right" >status : <?php echo 'status_transaksi'; ?></span>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="row text-left">
					<table class="table">
					<thead>
						<tr>
							<th><h3 >Bukti Pembayaran</h3></th>
						</tr>
					</table>					
				</div>
				<?php if (!is_file('cropped/2630012020071.jpg')) {
					?>
					<div class="row text-center " id="dropbukti" style="margin:20px;padding: 50px 0px;border: 3px dotted #CFCECE" ondrop="upload_file(event)" ondragover="return false">
						<div id="text">
							<h1><i class="glyphicon glyphicon-picture"></i></h1>
							<button class="btn btn-primary" onclick="file_explorer('<?php 2630012020071; ?>')"><i class="glyphicon glyphicon-briefcase"></i> Upload Bukti</button>

						<h6 class="small">Ukuran gambar bukti maksimal. 2MB,<br> dengan ekstensi .JPG</h6>
						</div>
						<div style="display: none;width: 300px; height: 300px;margin: 0px auto;" id="gambar">
							<button class="btn btn-danger" onclick="batal()"><i class="glyphicon glyphicon-trash"></i>Ganti Bukti</button>
						</div>
						<br>
						<h4 id="namaFile" style="white-space: nowrap; text-overflow: ellipsis; width: 150px; overflow: hidden; font-weight: bold;margin: 0px auto"></h4> <br>
						<form method='post' enctype='multipart/form-data' \>
							<input type='hidden' name='id_transaksi' value=<?php 2630012020071 ?>>
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
					$lok = 'cropped/2630012020071.jpg';
					?>
					<div class="row text-center " style="margin-bottom:20px;padding: 50px 0px;border: 3px dotted #CFCECE">
					<div style="background-image:url('<?php echo $lok; ?>');background-size: 100% 100%;width: 300px; height: 300px;margin: 0px auto" id="gambar">					
						</div>
					</div>
				<?php
				} ?>
			</div>
		</div>
		<div class="row">
			
		</div>
	</div>
</body>
</html>