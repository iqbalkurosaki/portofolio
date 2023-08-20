<?php
if (isset($_GET['nis']) && $_GET['nis'] != '') {
	$sql = "SELECT COUNT(*) AS ada FROM t_santri WHERE nis = '".$_GET['nis']."'";
	$res = $db->execute($sql);
	$ada = $res->fields["ada"];
	if ($ada > 0) {
		$nis = $_GET['nis'];
		$upload_komplek = substr($nis, 0, 1);
		$upload_kamar = substr($nis, 1, 1);
		if (isset($_POST['submit'])) {
			$target_dir = "../foto/".$upload_komplek."/".$upload_kamar."/"; //menyimpan file foto perkamar
			$nama_file = basename($_FILES["foto"]["name"]);
			$target_file = $target_dir.$nama_file;
			$ekstensi = '.jpg';
			$uploadok = 1;
			$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["foto"]["tmp_name"]);
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ". <br />";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image. But ".$imageFileType.". <br />";
			        $uploadOk = 0;
			    }
			}

			$target_file = $target_dir.$nis.$ekstensi; //membuat nama file foto sesuai nis
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded. <br />";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
			        echo "The file ". basename( $_FILES["foto"]["name"]). " has been uploaded. <br />";
			    } else {
			        echo "Sorry, there was an error uploading your file. <br />";
			    }
			}
		}

		if(file_exists('../foto/'.$upload_komplek.'/'.$upload_kamar.'/'.$nis.'.jpg')) {
			echo '<img src="../foto/'.$upload_komplek.'/'.$upload_kamar.'/'.$nis.'.jpg" width="150" height="200"/>';
			?>
				<form id="foto" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
					Ubah Foto Santri (ukuran gambar maks. 2MB, ekstensi .jpg)
					<input type="hidden" name="MAX_FILE_SIZE" value="2097152">
					<input id="foto" type="file" name="foto" required="required" accept="image/*">
					<input type="submit" name="submit" value="Upload">
				</form>
			<?php
		} else {
			echo "Silahkan upload foto santri untuk ".$nis.".";
			?>
				<form id="foto" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
					Upload Foto Santri (ukuran gambar maks. 2MB, ekstensi .jpg)
					<input type="hidden" name="MAX_FILE_SIZE" value="2097152">
					<input id="foto" type="file" name="foto" required="required" accept="image/*">
					<input type="submit" name="submit" value="Upload">
				</form>
			<?php
		}
	} else {
		echo "Santri dengan nis ".$_GET['nis']." tidak ada.";
	}
} else {
	?>
	<meta http-equiv='refresh' content='0; url=menu_sekret.php?a=lap_detail'>
	<?php
}
	?>
<a href="menu_sekret.php?a=lap_detail&k=<?php echo substr($_GET['nis'], 0, 1); ?>">Kembali</a>