<?php
	if (!session_id()) {
		session_start();
	}
	if (isset($_SESSION['level'])){
		switch ($_SESSION['level']) {
			case 'Umum':
				break;
			case 'Pelajar':
				header('Location: ../pelajar/');
				break;
			case 'Pengajar':
				header('Location: ../pengajar/');
				break;
			default :
				header('Location: ../index.php');
				break;
		}
	} else {
		header('Location: ../index.php');
	}
?>