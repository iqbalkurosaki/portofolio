<?php
require_once "akses.php";
require_once "header.php";
require_once "koneksi.php";
if (isset($_POST['daftar'])) {
	$id = md5($_POST['email']);
	$stmt = $db->prepare("INSERT INTO user VALUES(?, ?, ?, ?, ?, ?, sha1(md5(password(crc32(hex(?))))))");
	$stmt->bindParam(1, $id);
	$stmt->bindParam(2, $_POST['nama']);
	$stmt->bindParam(3, $_POST['email']);
	$stmt->bindParam(4, $_POST['nomor_telepon']);
	$stmt->bindParam(5, $_POST['tanggal_lahir']);
	$stmt->bindParam(6, $_POST['level']);
	$stmt->bindParam(7, $_POST['password']);
	$stmt->execute();
	?>
	<script type="text/javascript">
		alert('Anda berhasil mendaftar, silahkan login');
	</script>
	<?php
	header('Location: masuk.php');
}
?>
	<div class="col-sm-8 col-sm-offset-2" style="background-color: white;padding:25px 60px">
		<div class="col-sm-14" style="border-bottom: 1px solid #81E400;margin-bottom: 20px">
			<img src="img/RF.png" class="img-responsive center" width="100px" onclick="window.location.href='index.php'">
			<h3>Form Pendaftaran</h3>
		</div>
		<form class="form-horizontal" action="<?php $_SERVER['PHP_SELF'];?>" method="post">
			<div class="form-group">
			  <label class="control-label col-sm-4" for="nama">Nama Lengkap:</label>
			  <div class="col-sm-8">
			    <input type="text" class="form-control" id="nama" pattern="[A-za-z ]+" placeholder="Nama Lengkap" name="nama" value="" required="">
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-4" for="email">Email:</label>
			  <div class="col-sm-8">
			    <input type="email" class="form-control" id="email" placeholder="Masukkan email anda" name="email" value="" required="" onchange="cek_email(email.value)">
			    <p id="email_notif"></p>
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-4" for="telp">No Telepon:</label>
			  <div class="col-sm-8">
			    <input type="text" maxlength="15" id="telp" pattern="[0-9]+" class="form-control" id="telp" placeholder="Nomor Telepon" name="nomor_telepon" value="" required="">
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-4" for="tgl_lahir">Tgl Lahir:</label>
			  <div class="col-sm-8">
			    <input type="date" class="form-control" id="tgl_lahir" name="tanggal_lahir" required="">
			  </div>
			</div>
			<div class="form-group">
			 <label class="control-label col-sm-4" for="level">Daftar Sebagai</label>
			  <div class="col-sm-3">
				  <select class="form-control" id="level" name="level" required="">
				    <option value="Pengajar">Pengajar</option>
					<option value="Pelajar">Pelajar</option>
					<option value="Umum">Umum</option>
				  </select>
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-4" for="pass">Password:</label>
			  <div class="col-sm-8">          
			    <input type="password" class="form-control" id="pass" placeholder="•••••••" name="password" oninput="cek_pwd()" required="">
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-4" for="passCek">Ulangi Password:</label>
			  <div class="col-sm-8">          
			    <input type="password" class="form-control" id="passCek" placeholder="•••••••" name="re_password" oninput="cek_pwd()" required="">
			    <p id="notif"></p>
			  </div>
			</div>
			<div class="form-group">        
			  <div class="col-sm-offset-4 col-sm-8">
			    <button id="submit" type="submit" name="daftar" value="daftar" class="btn btn-success">Daftar</button>
			  </div>
			</div>
		</form>
	</div>
<?php
require_once "footer.php";
?>
<script>
	var submit = document.getElementById('submit');
	var val_pwd;
	var val_email;
	function cek_pwd() {
	    var pass = document.getElementById('pass').value;
	    var passCek = document.getElementById('passCek').value;
	    var notif;
	    if (pass != passCek) {
	      notif = "Password tidak cocok !";
	      val_pwd = 0;
	    } else {
	      notif = "Password cocok !";
	      val_pwd = 1;
	    }
	    document.getElementById('notif').innerHTML = notif;
	    if ((val_pwd == 1) && (val_email == 1)) {
	    	submit.disabled = false;
	    } else {
	    	submit.disabled = true;
	    }
	}

	function cek_email(input){
		$.ajax({
			type:'post',
			url : 'data-email.php',
			data : 'email='+input,		
			success : function(datas){
				if (datas==1) {
					email_notif.innerHTML="e-mail sudah terdaftar";
					val_email = 0;
				} else {
					email_notif.innerHTML="";
					val_email = 1;
				}
				if ((val_pwd == 1) && (val_email == 1)) {
			    	submit.disabled = false;
			    } else {
			    	submit.disabled = true;
			    }
			}
		});

	}
</script>