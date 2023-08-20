<?php
	if (!session_id()) {
		session_start();
	}
	if (isset($_SESSION['level'])){
		if ($_SESSION['level'] == "admin") {
			header('Location: admin_daftar_umkm.php');
		}
	} else {
		header('Location: index.php');
	}
?>