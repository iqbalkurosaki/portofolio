<?php
require_once "akses_umkm.php";
require_once "header.php";
if (isset($_POST["upload"])) {
	koneksi();
	$_POST["deskripsi"] = code($_POST["deskripsi"]);
	$db->beginTransaction();
	$stmt = $db->prepare("INSERT INTO pengusaha_umkm_produk(id_pengusaha_umkm, nama, harga, deskripsi) VALUES(?, ?, ?, ?)");
	$stmt->bindParam(1, $_SESSION["id"]);
	$stmt->bindParam(2, $_POST["nama"]);
	$stmt->bindParam(3, $_POST["harga"]);
	$stmt->bindParam(4, $_POST["deskripsi"]);
	if ($stmt->execute()) {
		if (is_file($_FILES["gambar"]["tmp_name"])) {
			$mustEkstensi = "jpg";
			$target_dir = "upload/produk/";
			$nama_file = basename($_FILES["gambar"]["name"]);
			$target_file = $target_dir.$nama_file;
			$ekstensi = explode('.', $nama_file);
			$ekstensi = $ekstensi[count($ekstensi)-1];
			$uploadOk = 0;
			if ($mustEkstensi == $ekstensi) {
			    $size = $_FILES["gambar"]["size"];
			    if (intval($size) <= 1048576) {
			        $uploadOk = 1;
			    } else {
			        echo "File terlalu besar <br />";
			        $uploadOk = 0;
			    }
			    $stmt = $db->prepare("SELECT id FROM pengusaha_umkm_produk WHERE id_pengusaha_umkm = ? ORDER BY id DESC LIMIT 1");
			    $stmt->bindParam(1, $_SESSION["id"]);
			    $stmt->execute();
			    $res = $stmt->fetch();
				$id = $res["id"];
				$target_file = $target_dir.$id.".".$ekstensi;

				if ($uploadOk == 1) {
					// if everything is ok, try to upload file
				    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
				        $db->commit();
				        echo "Produk berhasil diupload.";
				        echo "<meta http-equiv='refresh' content='2; url=umkm_produk.php'>";
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
	.satu{
		background-color: #ECECEC;
		padding: 0px
	}
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
		.navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover{
			border-radius: 10px;
			background-color: #B90000;
			color: white
		}
		.satu>.navbar-default .navbar-nav>li>a{
		margin: 0px 5px;
		}
		.navbar-default .navbar-nav>li>a:hover{
			border-radius: 10px;
			background-color: #B90000;
			color: white;
		}
	</style>
<div class="container-fluid main">
<div class="container satu">
	<nav class="navbar navbar-default">
		<div class="container">
			<ul class="nav navbar-nav">
				<li><a href="umkm_produk.php"><i class="glyphicon glyphicon-th-list"></i> <b>Daftar Produk Anda</b></a></li>
				<li class="active"><a><i class="glyphicon glyphicon-bullhorn"></i> <b>Upload Produk</b></a></li>
			</ul>
		</div>
	</nav>
	<div class="container headDaftar">
		<div class="col-sm-14 text-center headDaftar">
			<h2><b>Silahkan Lengkapi Data Produk Anda</b></h2>
		</div>
		<div class="col-sm-10 col-sm-offset-1">
			<form class="form-horizontal text-left" action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
				  <label class="control-label col-sm-4" for="nama">Nama Produk :</label>
				  <div class="col-sm-8">
				    <input type="text" class="form-control" id="nama" pattern="[A-za-z ]+" placeholder="Nama UMKM" name="nama" value="" required="">
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-4" for="harga">Harga :</label>
				  <div class="col-sm-8">
				  	<input type="number" class="form-control" id="harga" placeholder="Harga" name="harga" value="" required="" step="500" min="500">
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-4" for="deskripsi">Deskripsi Produk :</label>
				  <div class="col-sm-8">
				  	<textarea class="form-control" id="deskripsi" placeholder="Deskripsikan UMKM anda" name="deskripsi" required="" rows="4"></textarea>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-4" for="gambar">Upload Gambar Produk :</label>
				  <div class="col-sm-8">
					<input type="hidden" name="MAX_FILE_SIZE" value="‪1048576‬">
					<input type="file" id="gambar" name="gambar" value="" required="" accept="image/jpeg">
		        	<font color="#E45656"> *ukuran file maks. 1 MB, ekstensi .jpg</font>
		        	<font size="large"><?php echo (isset($uploadOk) && ($uploadOk != 1)) ? "Error dalam mengupload gambar. Data tidak tersimpan" : ""; ?></font>
				  </div>
				</div>
				<div class="form-group">        
				  <div class="col-sm-offset-4 col-sm-8">
				    <button id="submit" type="submit" name="upload" value="upload" class="btn btn-danger">Upload</button>
				  </div>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
<?php
require_once "footer.php";
?>