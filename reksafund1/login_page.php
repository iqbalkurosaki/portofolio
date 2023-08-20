<?php
if (!session_id()) {
	session_start();
}
require_once 'cek_akses.php';
require_once 'dynamic_nab.php';
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
	switch ($_POST['login_as']) {
		case 'klien':
			$stmt = $db->prepare("CALL access_klien(?, ?)");
			$stmt->bindParam(1, $_POST['email']);
			$stmt->bindParam(2, $_POST['password']);
			$stmt->execute();
			if($stmt->rowCount() > 0) {
				$res = $stmt->fetch();
				$_SESSION['akses'] = 'klien';
				$_SESSION['id'] = $res[0];
				$_SESSION['nama'] = $res[1];
				$_SESSION['email'] = $_POST['email'];
				header('Location: data.php');
			} else {
				?>
				<script type="text/javascript">
					alert('username / password salah')
				</script><?php 
			}
			break;
		case 'admin_reksadana':
			$stmt = $db->prepare("CALL access_admin_reksadana(?, ?)");
			$stmt->bindParam(1, $_POST['email']);
			$stmt->bindParam(2, $_POST['password']);
			$stmt->execute();
			if($stmt->rowCount() > 0) {
				$res = $stmt->fetch();
				$_SESSION['akses'] = 'admin_reksadana';
				$_SESSION['id'] = $res[0];
				$_SESSION['nama'] = $res[1];
				$_SESSION['email'] = $_POST['email'];
				header('Location: admin_reksadana/');
			} else {
				?>
				<script type="text/javascript">
					alert('username / password salah')
				</script><?php
			}
			break;
		case 'admin_bank':
			$stmt = $db->prepare("CALL access_admin_bank(?, ?)");
			$stmt->bindParam(1, $_POST['email']);
			$stmt->bindParam(2, $_POST['password']);
			$stmt->execute();
			if($stmt->rowCount() > 0) {
				$res = $stmt->fetch();
				$_SESSION['akses'] = 'admin_bank';
				$_SESSION['id'] = $res[0];
				$_SESSION['nama'] = $res[1];
				$_SESSION['email'] = $_POST['email'];
				header('Location: admin_bank/');
			} else {
				?>
				<script type="text/javascript">
					alert('username / password salah')
				</script><?php
			}
			break;
		default:
			header('Location: index.php');
			break;
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
		.img-responsive:hover{
			cursor: pointer;
		}
		.center{
			margin: 0px auto
		}
		@media only screen and (max-width: 768px){
			.navbar-fixed-top{
				position: relative;
			}
		}
	</style>
</head>
<body style="background: url(img/invest4.jpg) no-repeat;
			background-size: 1500px;">
<div class="container" style="padding-top: 70px">
	<div class="col-sm-5 col-sm-offset-4" style="background-color: white;padding:50px">
		<div class="col-sm-14" style="border-bottom: 1px solid #81E400;margin-bottom: 20px">
			<img src="img/RF.png" class="img-responsive center" width="100px" onclick="window.location.href='index.php'">
			<br>
		</div>
		  <form class="form-horizontal" method="POST" action="<?php $_SERVER['PHP_SELF'];?>" >
		    <div class="form-group">
		      <label class="control-label col-sm-4" for="email">Email:</label>
		      <div class="col-sm-8">
		        <input type="email" class="form-control"type="email" name="email" placeholder="Masukkan email" required="">
		      </div>
		    </div>
		    <div class="form-group">
		      <label class="control-label col-sm-4" for="pwd">Password:</label>
		      <div class="col-sm-8">          
		        <input type="password" class="form-control" type="password" name="password" placeholder="•••••••" required="">
		      </div>
		    </div>
		    <div class="form-group">
		     <label class="control-label col-sm-4" for="sel1">Sebagai:</label>
		      <div class="col-sm-8">
				  <select class="form-control" id="sel1" name="login_as">
				    <option value="klien">Klien</option>
					<option value="admin_reksadana">Admin Reksadana</option>
					<option value="admin_bank">Admin Bank</option>
				  </select>
		      </div>
		    </div>
		    <div class="form-group">        
		      <div class="col-sm-offset-4 col-sm-8">
		        <button type="submit" name="submit" class="btn btn-primary" value="Masuk">Masuk</button>
		      </div>
		    </div>
		  </form>
		  <div class="text-right col-sm-offset-5 col-sm-8 small">
		  	Silahkan melakukan login terlebih dahulu untuk menggunakan fitur-fitur  pada reksafund.
		  	Bila Anda belum menjadi nasabah ReksaFund, silakan mendaftar terlebih dahulu <a href="signup_page.php">Disni</a>
		  </div>
	</div>
</div>
</body>
</html>