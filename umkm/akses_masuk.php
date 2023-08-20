<?php
	if (!session_id()) {
		session_start();
	}
	if (isset($_SESSION['level'])){
		switch ($_SESSION['level']) {
			case 'umkm':
				header('Location: umkm_produk.php');
				break;
			case 'admin':
				header('Location: admin_daftar_umkm.php');
				break;
		}
	}
?>