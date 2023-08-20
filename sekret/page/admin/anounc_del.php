<?php
 	include('../../config/config.php');
	$id =$_REQUEST['id'];
	$sql = "DELETE FROM pengumuman where id=$id";
 
	if($db->Execute($sql) === false) {
		  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $db->ErrorMsg(), E_USER_ERROR);
		} else {
		  $affected_rows = $db->Affected_Rows();
		}
	header("Location: ../menu_admin.php?a=anounc_input");
?>