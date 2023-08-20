<?php
	if (!session_id()) {
		session_start();
	}
	if (isset($_SESSION['akses'])){
		switch ($_SESSION['akses']) {
			case 'klien':
				header('Location: data.php');
				break;
			case 'admin_reksadana':
				header('Location: admin_reksadana/');
				break;
			case 'admin_bank':
				header('Location: admin_bank/');
				break;
			default :
				break;
		}
	}
?>