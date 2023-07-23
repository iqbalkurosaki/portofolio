<?php
	if (!session_id()) {
		session_start();
	}
	if (isset($_SESSION['level'])){
		switch ($_SESSION['level']) {
			case 'Pengajar':
				break;
			case 'Pelajar':
				header('Location: ../pelajar/');
				break;
			case 'Umum':
				header('Location: ../umum/');
				break;
			default :
				header('Location: ../index.php');
				break;
		}
	} else {
		header('Location: ../index.php');
	}
?>