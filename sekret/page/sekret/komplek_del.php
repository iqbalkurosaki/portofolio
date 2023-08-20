<?php
 	include('../../config/config.php');
	$id =$_REQUEST['id'];
	$sql = "DELETE FROM nama_komplek where id_namakomplek=$id";
 
	if($db->Execute($sql) === false) {
		  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $db->ErrorMsg(), E_USER_ERROR);
		} else {
		  $affected_rows = $db->Affected_Rows();
		}
	header("Location: ../menu_sekret.php?a=add_komplek");
?>