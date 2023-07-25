<?php
	if (!session_id()) {
		session_start();
	}
	if (isset($_SESSION['level'])){
		switch ($_SESSION['level']) {
			case 'Pelajar':
				break;
			case 'Umum':
				header('Location: ../umum/');
				break;
			case 'Pengajar':
				header('Location: ../pengajar/');
				break;
		}
	} else {
		header('Location: ../index.php');
	}
?>