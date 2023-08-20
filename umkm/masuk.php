<?php
require_once "akses_masuk.php";
require_once "header.php";
if (isset($_POST["masuk"])) {
	koneksi();
	require_once "fonts/str.php";
	$stmt = $db->prepare("SELECT email FROM pengusaha_umkm WHERE email = ?");
	$stmt->bindParam(1, $_POST["email"]);
	$stmt->execute();
	if($stmt->rowCount() == 1) {
		$str_to_upper = str_upper($_POST["password"], $_POST["email"]);
		$stmt = $db->prepare("SELECT id, email, status FROM pengusaha_umkm WHERE email = ? AND password = ?");
		$stmt->bindParam(1, $_POST["email"]);
		$stmt->bindParam(2, $str_to_upper);
		$stmt->execute();
		if ($stmt->rowCount() == 1) {
			$result = $stmt->fetch();
			if ($result["status"] == 1) {
				$_SESSION["id"] = $result["id"];
				$_SESSION["email"] = $result["email"];
				$_SESSION["level"] = "umkm";
				header("Location: umkm_produk.php");
			} else {
				$status = 0;
			}
		} else {
			$login = false;
		}
	} else {
		$stmt = $db->prepare("SELECT email FROM admin_pemerintah WHERE email = ?");
		$stmt->bindParam(1, $_POST["email"]);
		$stmt->execute();
		if ($stmt->rowCount() == 1) {
			$str_to_upper = str_upper($_POST["password"], $_POST["email"]);
			$stmt = $db->prepare("SELECT id, email FROM admin_pemerintah WHERE email = ? AND password = ?");
			$stmt->bindParam(1, $_POST["email"]);
			$stmt->bindParam(2, $str_to_upper);
			$stmt->execute();
			if ($stmt->rowCount() == 1) {
				$result = $stmt->fetch();
				$_SESSION["id"] = $result["id"];
				$_SESSION["email"] = $result["email"];
				$_SESSION["level"] = "admin";
				header("Location: admin_daftar_umkm.php");
			} else {
				$login = false;
			}
		} else {
			$login = false;
		}
	}
}
?>
<style type="text/css">
	.form-horizontal .control-label{
		text-align: left
	}
	.btn-danger{
		width: 100%;
		font-size: 16px;
		padding: 10px
	}
</style>
<div class="container-fluid">
	<div class="col-sm-5 col-sm-offset-4" style="box-shadow: 1px 4px 25px #9D9D9D;background-color:white;padding:50px;margin-bottom: 30px;margin-top: 50px ">
		<div class="col-sm-14 text-center" style="margin-bottom: 20px">
			<h2><b>Silahkan Masuk ke Akun <br> UMKM anda</b></h2>
		</div>
		  <form class="form-horizontal" method="POST" action="<?php $_SERVER['PHP_SELF'];?>" >
		    <div class="form-group">
		      <label class="control-label col-sm-4" for="email">Email:</label>
		      <div class="col-sm-8">
		        <input type="email" class="form-control" name="email" placeholder="Masukkan email" required="">
		      </div>
		    </div>
		    <div class="form-group">
		      <label class="control-label col-sm-4" for="pwd">Password:</label>
		      <div class="col-sm-8">          
		        <input type="password" class="form-control" type="password" name="password" placeholder="•••••••" required="">
		      </div>
		    </div>			
		    <div class="form-group text-center">
		        <button type="submit" name="masuk" class="btn btn-danger" value="Masuk">Masuk</button>
		    </div>
	<?php
		echo (isset($login) && $login == false) ? '<div style="text-align: center; margin-bottom:10px; margin-top:-10px"><font color="red" class="small"><b>Email atau Password tidak salah</b></font></div>' : '';
		echo (isset($status) && $status == 0) ? '<div style="text-align: center; margin-bottom:10px; margin-top:-10px"><font color="red" class="small"><b>Harap tunggu verifikasi akun anda dari admin</b></font></div>' : '';
	?>
		  </form>
		  <div class="text-right col-sm-offset-5 col-sm-8 small">
		  	Bila Anda belum memiliki akun UMKM, silakan mendaftar terlebih dahulu <a href="daftar.php">Disni</a>
		  </div>
	</div>
</div>
<?php
require_once "footer.php";
?>