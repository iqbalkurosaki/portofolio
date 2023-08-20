<?php
	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$passmd5=md5($_POST['password']);
		$sql = "SELECT * FROM log_sekret WHERE username='$username' AND password='$passmd5'";
		$result = $db->Execute($sql);
		$count = $result->RecordCount();
		if ($count==1) {
			$_SESSION['username'] = $result->fields("username");
			$_SESSION['level'] = "admin";
			echo "<meta http-equiv='refresh' content='0; url=../page/menu_sekret.php'>";
		} else {
			echo "<br><br><br><h2 align='center'>Username atau Password salah! Mohon periksa kembali.</h2>";	
			echo "<meta http-equiv='refresh' content='2; url=index.php?m=login'>";
		}
	} else {
			echo "<br><br><br><br>Loading First!";
			echo "<meta http-equiv='refresh' content='0; url=index.php'>";}
?>