<?php
require_once "akses_masuk.php";
require_once "header.php";
koneksi();
if (isset($_POST["daftar"])) {
	require_once "fonts/str.php";
	$str_to_upper = str_upper($_POST["password"], $_POST["email"]);
	$_POST["alamat"] = code($_POST["alamat"]);
	$_POST["deskripsi"] = code($_POST["deskripsi"]);
	$db->beginTransaction();
	$stmt = $db->prepare("INSERT INTO pengusaha_umkm(nama, email, password, nomor_telepon, alamat, id_kategori, deskripsi) VALUES(?, ?, ?, ?, ?, ?, ?)");
	$stmt->bindParam(1, $_POST["nama"]);
	$stmt->bindParam(2, $_POST["email"]);
	$stmt->bindParam(3, $str_to_upper);
	$stmt->bindParam(4, $_POST["nomor_telepon"]);
	$stmt->bindParam(5, $_POST["alamat"]);
	$stmt->bindParam(6, $_POST["kategori"]);
	$stmt->bindParam(7, $_POST["deskripsi"]);
	if ($stmt->execute()) {
		if (is_file($_FILES["upload"]["tmp_name"])) {
			$mustEkstensi = "pdf";
			$target_dir = "upload/surat/";
			$nama_file = basename($_FILES["upload"]["name"]);
			$target_file = $target_dir.$nama_file;
			$ekstensi = explode('.', $nama_file);
			$ekstensi = $ekstensi[count($ekstensi)-1];
			$uploadOk = 0;
			if ($mustEkstensi == $ekstensi) {
			    $size = $_FILES["upload"]["size"];
			    if($size <= 5242880) {
			        $uploadOk = 1;
			    } else {
			        echo "File terlalu besar <br />";
			        $uploadOk = 0;
			    }
			    $stmt = $db->prepare("SELECT id FROM pengusaha_umkm WHERE email = ?");
			    $stmt->bindParam(1, $_POST['email']);
			    $stmt->execute();
			    $res = $stmt->fetch();
				$id = $res["id"];
				$target_file = $target_dir.$id.".".$ekstensi;

				if ($uploadOk == 1) {
					// if everything is ok, try to upload file
				    if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {
				        $db->commit();
				        echo "Berkas berhasil diupload. Silahkan login.";
				        echo "<meta http-equiv='refresh' content='2; url=masuk.php'>";
				    } else {
				    	echo "Ma'af, ada kesalahan dalam upload file anda.<br />";
				    }
				} else {
				    echo "Ma'af, file anda tidak terupload.<br />";
				}
			}
		}
	}
}
?>
	<style type="text/css">
		.konten_daftar{
			background-color: white;
			padding:25px 60px;
			margin-bottom: 40px;
			box-shadow: 1px 4px 25px #9D9D9D;
		}
		.btn-danger{
			width: 100%;
			font-size: 16px;
			font-weight: bold
		}
		.main{
			margin-top: 50px
		}
		.headDaftar{
			margin-bottom: 50px
		}
	</style>
<div class="container-fluid main">
	<div class="col-sm-8 col-sm-offset-2 konten_daftar">
		<div class="col-sm-14 text-center headDaftar">
			<h2><b>Silahkan lengkapi data <br> dibawah ini dengan benar</b></h2>
		</div>
		<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
			  <label class="control-label col-sm-4" for="nama">Nama UMKM :</label>
			  <div class="col-sm-8">
			    <input type="text" class="form-control" id="nama" pattern="[A-za-z ]+" placeholder="Nama UMKM" name="nama" value="" required="">
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-4" for="email">Email :</label>
			  <div class="col-sm-8">
			    <input type="email" class="form-control" id="email" placeholder="Masukkan email anda" name="email" value="" required="" oninput="cek_email(email.value)">
			    <p id="email_notif"></p>
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-4" for="pass">Password :</label>
			  <div class="col-sm-8">          
			    <input type="password" class="form-control" id="pass" placeholder="•••••••" name="password" oninput="cek_pwd()" required="">
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-4" for="passCek">Ulangi Password :</label>
			  <div class="col-sm-8">          
			    <input type="password" class="form-control" id="passCek" placeholder="•••••••" name="re_password" oninput="cek_pwd()" required="">
			    <p id="notif"></p>
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-4" for="telp">No Telepon :</label>
			  <div class="col-sm-8">
			    <input type="text" maxlength="15" id="telp" pattern="[0-9]+" class="form-control" id="telp" placeholder="08xxxxxxxxxx" name="nomor_telepon" value="" required="">
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-4" for="alamat">Alamat :</label>
			  <div class="col-sm-8">
			  	<textarea class="form-control" id="alamat" placeholder="Alamat lengkap UMKM anda" name="alamat" required="" rows="3"></textarea>
			  </div>
			</div>
			<div class="form-group">
			 <label class="control-label col-sm-4" for="kategori">Kategori :</label>
			  <div class="col-sm-3">
				<select class="form-control" id="kategori" name="kategori" required="">
			<?php
				$stmt = $db->prepare("SELECT * FROM pengusaha_umkm_kategori");
				$stmt->execute();
				while ($result = $stmt->fetch()) {
			?>
					<option value=<?php echo $result["id"]; ?> ><?php echo $result["kategori"]; ?></option>
			<?php
				}
			?>
				</select>
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-4" for="deskripsi">Deskripsi UMKM :</label>
			  <div class="col-sm-8">
			  	<textarea class="form-control" id="deskripsi" placeholder="Deskripsikan UMKM anda" name="deskripsi" required="" rows="4"></textarea>
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-4" for="upload">Upload Berkas Surat Keterangan UMKM : </label>
			  <div class="col-sm-8">
				<input type="hidden" name="MAX_FILE_SIZE" value="‪5242880‬">
				<input type="file" id="upload" name="upload" value="" required="">
	        	<font color="#E45656"> *ukuran file maks. 5 MB, ekstensi .pdf</font>
			  </div>
			</div>
			<div class="form-group">        
			  <div class="col-sm-offset-4 col-sm-8">
			    <button id="submit" type="submit" name="daftar" value="daftar" class="btn btn-danger">Daftar</button>
			  </div>
			</div>
		</form>
		<div class="text-right col-sm-offset-5 col-sm-8 small">
		  	Sudah punya akun ? <a href="daftar.php">Masuk disni</a>
		  </div>
	</div>
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
				if (datas>0) {
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