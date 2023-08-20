<?php
 	include('../../config/config.php');
	$id =$_REQUEST['id'];
	$sql = "DELETE FROM t_santri where nis=$id";
 
	if($db->Execute($sql) === false) {
		  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $db->ErrorMsg(), E_USER_ERROR);
	} else {
		$affected_rows = $db->Affected_Rows();
		header("Location: ../menu_sekret.php?a=cek_data");
	}
?>