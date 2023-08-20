<?php
	if (!session_id()) {
		session_start();
	}
	if (!isset($_SESSION['akses']) || $_SESSION['akses']!='klien') {
		header('Location: ../index.php');
	}
?>