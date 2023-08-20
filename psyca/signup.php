<?php
	require_once 'koneksi_database.php';
	session_start();
	if(count($_POST) == 6){
		$sql2 = "SELECT * FROM user where id_pengguna = '".$_POST['id_pengguna']."';";
		$res2 = mysqli_query($cnn, $sql2);
		$ada = mysqli_num_rows($res2);
		if ($ada>0) {
			$_SESSION['pesan'] = "<script>alert('username ".$_POST['id_pengguna']." telah terpakai!');</script>";
			header('Location: signup_page.php');
		} else {
	 		$profil = array();
			$_SESSION['logged_in'] = true;
			foreach ($_POST as $key => $value) {
				$_SESSION[$key] = $value;
			}
			$sql = "INSERT INTO user(nama, id_pengguna, password, email, jenis_kelamin, tanggal_lahir) values('".$_SESSION['nama']."', '".$_SESSION['id_pengguna']."', '".md5($_SESSION['password'])."', '".$_SESSION['email']."', '".$_SESSION['jenis_kelamin']."', '".$_SESSION['tanggal_lahir']."');";
			$res = mysqli_query($cnn, $sql);
			unset($_SESSION['password']);
			if ($res) {
				header('Location: beranda.php');
			} else {
				echo "<script>alert(".mysqli_error($cnn).")</script>";
				header('Location: signup_page.php');
			}
		}
	} else {
		$_SESSION['logged_in'] = false;
		header('Location: index.php');
	}

?>