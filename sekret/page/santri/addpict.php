<html>
<body>
<head>        
		
</head>

<div class="table-responsive">
			<table class="table table-bordered">
<tr class="success"><td><h4 class="judul">Update Foto Profil</h4></td></tr>
<tr><td>
<form method="post" enctype="multipart/form-data" name="FUpload" id="FUpload">
    File Gambar :   
    <input name="nama_file" type="file" id="nama_file" size="30" /><br>
<input type="submit" class="btn btn-primary" name="saveimage" id="saveimage" value="Simpan" />
</form>

<?php 
	
	require_once('../config/config.php');


	if(isset($_POST['saveimage'])){
		$namafolder="../images/upload/alumni/";
	if (!empty($_FILES["nama_file"]["tmp_name"]))
		{$jenis_gambar=$_FILES['nama_file']['type'];     
			if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")
			{
			$gambar = $namafolder . $_SESSION['FULLNAME'] . basename($_FILES['nama_file']['name']);
			if (move_uploaded_file($_FILES['nama_file']['tmp_name'],$gambar)){echo "Gambar berhasil dikirim ".$gambar;  

					$sql="UPDATE alumni SET foto='$gambar' WHERE email = '". $_SESSION['FULLNAME'] ."'";   //salah email= 

					 if($db->Execute($sql) === false) 
					 {
					 	trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $db->ErrorMsg(), E_USER_ERROR);
					 }     
					header("Location: menu_alumni.php?a=update_akun");    
				} else {echo "Gambar gagal dikirim";}
			} else {echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";}
	} else {echo "Anda belum memilih gambar";
	} }
?>
</td></tr>
</table>
</div>
</body>
</html>