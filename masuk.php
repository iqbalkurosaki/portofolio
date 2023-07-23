<?php
require_once "akses.php";
require_once "header.php";
require_once "koneksi.php";
if (isset($_POST['masuk'])) {
	switch ($_POST['level']) {
		case 'Pelajar':
			$stmt = $db->prepare("CALL akses(?, ?, ?)");
			$stmt->bindParam(1, $_POST['email']);
			$stmt->bindParam(2, $_POST['password']);
			$stmt->bindParam(3, $_POST['level']);
			$stmt->execute();
			if($stmt->rowCount() > 0) {
				$res = $stmt->fetch();
				$_SESSION['level'] = 'Pelajar';
				$_SESSION['id'] = $res[0];
				$_SESSION['nama'] = $res[1];
				$_SESSION['email'] = $_POST['email'];
				header('Location: pelajar/');
			} else {
				?>
				<script type="text/javascript">
					alert('username / password salah')
				</script><?php 
			}
			break;
		case 'Umum':
			$stmt = $db->prepare("CALL akses(?, ?, ?)");
			$stmt->bindParam(1, $_POST['email']);
			$stmt->bindParam(2, $_POST['password']);
			$stmt->bindParam(3, $_POST['level']);
			$stmt->execute();
			if($stmt->rowCount() > 0) {
				$res = $stmt->fetch();
				$_SESSION['level'] = 'Umum';
				$_SESSION['id'] = $res[0];
				$_SESSION['nama'] = $res[1];
				$_SESSION['email'] = $_POST['email'];
				header('Location: umum/');
			} else {
				?>
				<script type="text/javascript">
					alert('username / password salah')
				</script><?php 
			}
			break;
		case 'Pengajar':
			$stmt = $db->prepare("CALL akses(?, ?, ?)");
			$stmt->bindParam(1, $_POST['email']);
			$stmt->bindParam(2, $_POST['password']);
			$stmt->bindParam(3, $_POST['level']);
			$stmt->execute();
			if($stmt->rowCount() > 0) {
				$res = $stmt->fetch();
				$_SESSION['level'] = 'Pengajar';
				$_SESSION['id'] = $res[0];
				$_SESSION['nama'] = $res[1];
				$_SESSION['email'] = $_POST['email'];
				header('Location: pengajar/');
			} else {
				?>
				<script type="text/javascript">
					alert('username / password salah')
				</script><?php 
			}
			break;
	}
}
?>
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
		     <label class="control-label col-sm-4" for="sel1">Sebagai : </label>
		      <div class="col-sm-8">
				  <select class="form-control" id="level" name="level" required="">
				    <option value="Pengajar">Pengajar</option>
					<option value="Pelajar">Pelajar</option>
					<option value="Umum">Umum</option>
				  </select>
		      </div>
		    </div>
		    <div class="form-group">        
		      <div class="col-sm-offset-4 col-sm-8">
		        <button type="submit" name="masuk" class="btn btn-primary" value="Masuk">Masuk</button>
		      </div>
		    </div>
		  </form>
		  <div class="text-right col-sm-offset-5 col-sm-8 small">
		  	Silahkan melakukan login terlebih dahulu untuk menggunakan fitur-fitur  pada reksafund.
		  	Bila Anda belum menjadi nasabah ReksaFund, silakan mendaftar terlebih dahulu <a href="daftar.php">Disni</a>
		  </div>
	</div>
<?php
require_once "footer.php";
?>