<?php
	if (!session_id()) {
		session_start();
	}
	if (isset($_SESSION['level'])){
		switch ($_SESSION['level']) {
			case 'Pelajar':
				header('Location: pelajar/');
				break;
			case 'Umum':
				header('Location: umum/');
				break;
			case 'Pengajar':
				header('Location: pengajar/');
				break;
		}
	}
?>