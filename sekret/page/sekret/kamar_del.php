<?php
 	include('../../config/config.php');
	$id =$_GET['id'];
	$sql = "DELETE FROM komplek where id_komplek=$id";
 
	if($db->Execute($sql) === false) {
		  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $db->ErrorMsg(), E_USER_ERROR);
		} else {
		  $affected_rows = $db->Affected_Rows();
		}
	header("Location: ../menu_sekret.php?a=add_kamar");
?>