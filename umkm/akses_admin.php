<?php
	if (!session_id()) {
		session_start();
	}
	if (isset($_SESSION['level'])){
		if ($_SESSION['level'] == "umkm") {
			header('Location: umkm_produk.php');
		}
	} else {
		header('Location: index.php');
	}
?>