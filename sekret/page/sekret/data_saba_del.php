<?php
 	//include('../../config/config.php');
	$id =$_REQUEST['id'];
	$sql = "DELETE FROM t_santri where nis=$id";
 
	if($db->Execute($sql) === false) {
		  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $db->ErrorMsg(), E_USER_ERROR);
		} else {
		  $affected_rows = $db->Affected_Rows();
		 ?>
		 <h4>Data Berhasil terhapus</h4>
		 <a class="btn btn-warning" href ="menu_sekret.php?a=data_saba" style="margin: 5px">
			                				<span class="glyphicon glyphicon-arrow-left"></span> Kembali 
			                			</a>
	
		 <?php
		 
		}
		
?>