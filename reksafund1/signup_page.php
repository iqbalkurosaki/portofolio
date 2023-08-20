<?php
if (!session_id()) {
	session_start();
}
require_once 'cek_akses.php';
require_once 'dynamic_nab.php';
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$stmt2 = $db->prepare("SELECT COUNT(*) AS jumlah FROM klien WHERE email = ?");
	$stmt2->bindParam(1, $email);
	$stmt2->execute();
	$res2 = $stmt2->fetch();
	if ($res2[0] == 0) {
		$username = md5($email);
		$nomor_telepon = $_POST['nomor_telepon'];
		$password = $_POST['password'];
		$nama = $_POST['nama'];
		$bank = $_POST['bank'];
		$cabang = $_POST['cabang'];
		$nomor_rekening = $_POST['nomor_rekening'];
		$id_profil_resiko = $_POST['id_profil_resiko'];
		$penghasilan = $_POST['penghasilan'];
		$tgl_lahir = $_POST['tgl_lahir'];
		$mata_uang = $_POST['mata_uang'];

		$stmt=$db->prepare("INSERT INTO klien VALUES(?, ?, sha1(md5(password(crc32(hex(?))))), ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bindParam(1, $username);
		$stmt->bindParam(2, $email);
		$stmt->bindParam(3, $password);
		$stmt->bindParam(4, $tgl_lahir);
		$stmt->bindParam(5, $nomor_telepon);
		$stmt->bindParam(6, $penghasilan);
		$stmt->bindParam(7, $id_profil_resiko);
		$stmt->bindParam(8, $bank);
		$stmt->bindParam(9, $cabang);
		$stmt->bindParam(10, $nomor_rekening);
		$stmt->bindParam(11, $nama);
		$stmt->bindParam(12, $mata_uang);
		$stmt->execute();
		echo '<script type="text/javascript">alert("Anda berhasil mendaftar, silahkan login")</script>';
		header('Location: login_page.php');
	} else {
		echo '<script type="text/javascript">alert("E-mail anda sudah pernah terdaftar, gunakan e-mail lain")</script>';
	}
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
		.center{
			margin: 0px auto;
		}
	</style>
</head>
<body style="background: url(img/invest4.jpg);
			background-size: 1500px;">
<div class="container" style="padding: 50px 0px">
	<div class="col-sm-8 col-sm-offset-2" style="background-color: white;padding:25px 60px">
		<div class="col-sm-14" style="border-bottom: 1px solid #81E400;margin-bottom: 20px">
			<img src="img/RF.png" class="img-responsive center" width="100px" onclick="window.location.href='index.php'">
			<h3>Form Pendaftaran</h3>
		</div>
		<form class="form-horizontal" action="<?php $_SERVER['PHP_SELF'];?>" method="post">
			<div class="form-group">
			  <label class="control-label col-sm-4" for="nama">Nama:</label>
			  <div class="col-sm-8">
			    <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" name="nama" value="<?php if(isset($_POST['nama_temp'])){echo $_POST['nama_temp'];} ?>">
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-4" for="telp">No Telp:</label>
			  <div class="col-sm-8">
			    <input type="text" maxlength="15" id="telp" pattern="[0-9]+" class="form-control" id="telp" placeholder="Nomor Telepon" name="nomor_telepon" value="<?php if(isset($_POST['nomor_telepon_temp'])){ echo $_POST['nomor_telepon_temp']; }?>">
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-4" for="email">Email:</label>
			  <div class="col-sm-8">
			    <input type="email" class="form-control" id="email" placeholder="Masukkan email anda" name="email" value="<?php if(isset($_POST['email_temp'])){ echo $_POST['email_temp']; }?>">
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-4" for="tgl_lahir">Tgl Lahir:</label>
			  <div class="col-sm-8">
			    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-4" for="pwd">Password:</label>
			  <div class="col-sm-8">          
			    <input type="password" class="form-control" id="pwd" placeholder="•••••••" name="password" minlength="7">
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-4" for="pndptan">Pendapatan pertahun:</label>
			  <div class="col-sm-8">
			    <input type="number" class="form-control" id="pndptan" placeholder="Nominal" name="penghasilan" onchange="penghasilan1()">
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-4">Pilih Resiko:</label>
			  <div class="col-sm-8">
			    <label class="radio-inline"><input type="radio" name="id_profil_resiko" value=1>Rendah</label>
				<label class="radio-inline"><input type="radio" name="id_profil_resiko" value=2>Sedang</label>
				<label class="radio-inline"><input type="radio" name="id_profil_resiko" value=3>Tinggi</label>
			  </div>
			</div>
			<div class="form-group">
			 <label class="control-label col-sm-4" for="bank">Pilih Bank:</label>
			  <div class="col-sm-3">
				  <select class="form-control" id="bank" name="bank">
				    <option value="bri">BRI</option>
					<option value="bni">BNI</option>
					<option value="bca">BCA</option>
				  </select>
			  </div>
			  <label class="control-label col-sm-2" for="cabang">Cabang:</label>
			  <div class="col-sm-3">
				  <select class="form-control" name="cabang" id="cabang">
				    <option value="malang">malang</option>
					<option value="jakarta">jakarta</option>
					<option value="bandung">bandung</option>
				  </select>
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-4" for="rek">No Rekening:</label>
			  <div class="col-sm-8">
			    <input type="number" class="form-control" id="rek" placeholder="Nomor Rekening" name="nomor_rekening">
			  </div>
			</div>
			<div class="form-group">
			 <label class="control-label col-sm-4" for="uang">Pilih Matauang:</label>
			  <div class="col-sm-3">
				  <select class="form-control"  id="uang" name="mata_uang">
				    <option value="idr">IDR</option>
					<option value="usd">USD</option>
					<option value="sgd">SGD</option>
				  </select>
			  </div>
			</div>
			<div class="form-group">        
			  <div class="col-sm-offset-4 col-sm-8">
			    <button type="submit" name="submit" value="daftar" class="btn btn-success">Daftar</button>
			  </div>
			</div>
		</form>
		<div class="text-right col-sm-offset-5 col-sm-8 small">
		  		Pastikan semua data yang anda isi sudah benar. Jika anda sudah terdaftar silahkan langsung melakukan login <a href="login_page.php">Disini</a>
		  	</div>
	</div>
</div>
<script type="text/javascript">
	function penghasilan1() {
		var rupiah = '';
		var pndptan1 = getElementByid('pndptan').value;		
		var angkarev = pndptan1.toString().split('').reverse().join('');
		for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
		rek.value= 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('')+',00 -';
	}
</script>
</body>
</html>