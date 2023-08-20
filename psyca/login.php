<?php
	if (!session_id()) {
		session_start();
	}
	require_once 'koneksi_database.php';
	if (isset($_POST['username']) and isset($_POST['password'])) {
		$sql = "SELECT * FROM user WHERE id_pengguna = '".$_POST['username']."';";
		$res = mysqli_query($cnn, $sql);
		$data = mysqli_fetch_row($res);
		if ($res) {
			if ($data[2]==md5($_POST['password'])) {
				if ($data[6] == 'User') {
					$_SESSION['logged_in'] = true;
					$_SESSION['nama'] = $data[0];
					$_SESSION['id_pengguna'] = $data[1];
					$_SESSION['email'] = $data[3];
					$_SESSION['jenis_kelamin'] = $data[4];
					$_SESSION['tanggal_lahir'] = $data[5];
					header('Location: beranda.php');
				} elseif ($data[6] == 'Admin') {
					$_SESSION['logged_in'] = true;
					$_SESSION['admin'] = true;
					$_SESSION['nama'] = $data[0];
					$_SESSION['id_pengguna'] = $data[1];
					$_SESSION['email'] = $data[3];
					$_SESSION['jenis_kelamin'] = $data[4];
					$_SESSION['tanggal_lahir'] = $data[5];
					header('Location: beranda.php');
				}
			} else {
				$_SESSION['logged_in'] = false;
				header('Location: login_page.php');
			}
		} else {
			$_SESSION['logged_in'] = false;
			header('Location: login_page.php');
		}
	} else {
		header('Location: index.php');
	}
?>