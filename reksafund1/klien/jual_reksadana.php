<?php 
if (!session_id()) {
	session_start();
}
require_once'cek_akses.php';
require_once '../dynamic_nab.php';
require_once '../koneksi.php';
if (isset($_POST['beli'])) {
	date_default_timezone_set('Asia/Jakarta');
	$t = microtime(true);
	$micro = sprintf("%06d",($t - floor($t)) * 1000000);
	$d = new DateTime(date('Y-m-d H:i:s.'.$micro, $t));

	$id = md5($d->format("Y-m-d H:i:s.u"));
	$id_jenis_transaksi = 2;
	$waktu = $d->format("Y-m-d H:i:s");
	$id_klien = $_SESSION['id'];
	$id_reksadana = $_POST['id_reksadana'];
	$unit = $_POST['up'];
	$nilai_transaksi = (round($_POST['nab'] * $_POST['up']) + 1);
	$id_status_transaksi=3;
	$total = $nilai_transaksi;

	$stmt2 = $db->prepare("INSERT INTO transaksi(id, id_jenis_transaksi, waktu, id_klien, id_reksadana, unit, nilai_transaksi, total, id_status_transaksi) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt2->bindParam(1, $id);
	$stmt2->bindParam(2, $id_jenis_transaksi);
	$stmt2->bindParam(3, $waktu);
	$stmt2->bindParam(4, $id_klien);
	$stmt2->bindParam(5, $id_reksadana);
	$stmt2->bindParam(6, $unit);
	$stmt2->bindParam(7, $nilai_transaksi);
	$stmt2->bindParam(8, $total);
	$stmt2->bindParam(9, $id_status_transaksi);
	
	if ($stmt2->execute()){
		echo "<script>alert('transaksi berhasil')</script>";
		header('Location: struk.php?id='.$id);
	} else {
		echo "<script>alert('transaksi pembelian gagal, silahkan coba lagi')</script>";
		header('Location: ../data.php');
	}
} ?>
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
<?php 
$stmt = $db->prepare("SELECT * FROM reksadana INNER JOIN up_klien ON up_klien.id_reksadana = reksadana.id WHERE reksadana.id = ? AND up_klien.id_klien = ? ");
$stmt->bindParam(1, $_GET['r']);
$stmt->bindParam(2, $_SESSION['id']);
$stmt->execute();
$res = $stmt->fetch();
if ($res[0]!=NULL) {
	echo "<title>Jual Reksadana".$res[1]."</title>";
?>
</head>
<body>
	<div class="container" >
		<div class="row" >
			<div style="padding: 25px">
				<a href="../index.php"><img src="../img/RF.png" style="max-width: 150px;"></a>
			</div>
		</div>
		<div class="row" style="padding: 0px 20px">
			<div class="text-center" style="border-bottom: 1px solid #63D300;margin-bottom: 20px"><h1><?php echo $res[1]; ?></h1></div>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
				  <label class="control-label col-sm-4" for="reksadana" >Nama Reksadana :</label>
				  <div class="col-sm-8">
					<input type="hidden" name="id_reksadana" value=<?php echo $_GET['r']; ?> >
				    <input type="text" class="form-control" name="reksadana" value="<?php echo $res[1]; ?>" disabled>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-4" for="nab">NAB per Unit :</label>
				  <div class="col-sm-8">
				    <input type="number" class="form-control" id="nab" value=<?php echo $res['nab']; ?> disabled>
				    <input type="hidden" name="nab" value=<?php echo $res[3]; ?> >
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-4" for="up">Jumlah Unit Penyertaan :</label>
				  <div class="col-sm-2">
				    <input type="number" name="up" min="1" max=<?php echo $res['up']; ?> step="1" id="up" class="form-control" oninput ="total1()"  required>
				  </div>
				  <label class="control-label col-sm-4" for="up">Unit Penyertaan Saat ini:</label>
				  <div class="col-sm-2">
				  	<input type="hidden" id="upNow" value=<?php echo $res['up']; ?> >
				    <input type="number" class="form-control" id="upUpt" value=<?php echo $res['up']; ?>  disabled>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-4" for="total_bayar">Total Pendapatan :</label>
				  <div class="col-sm-8">
				    <input type="text" id="total" name="total_bayar" class="form-control" disabled>
				  </div>
				</div>
				<div class="row text-right">
					<button class="btn btn-danger" onclick="window.location.href='../data.php'">Batalkan</button>
					<button type="submit" class="btn btn-success" name="beli" value="Beli">Lanjutkan</button>
				</div>
			</form>
		</div>
	</div>
<?php
} else {
	echo "reksadana tersebut tidak tersedia";
}
?>
<script type="text/javascript">
	function total1(){
		var a= document.getElementById("nab").value;
		var b= document.getElementById("up").value;
		var output= document.getElementById("total");
		upUpt.value=upNow.value-b;
		var c=Math.ceil(a*b);
		var rupiah = '';		
		var angkarev = c.toString().split('').reverse().join('');
		for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
		output.value= 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('')+',00 -';
	}
 </script>
</body>
</html>