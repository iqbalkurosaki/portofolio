<?php
 	include('../../config/config.php');
	$id =$_REQUEST['id'];
	$sql = "INSERT INTO t_santri SELECT * FROM t_santri_temp where nis=$id";
	$result=$db->Execute($sql);
	/*if($db->Execute($sql) === false) {
		  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $db->ErrorMsg(), E_USER_ERROR);
		} else {
		  $affected_rows = $db->Affected_Rows();
		}
		*/
		if($result){
			$sql2 = "DELETE FROM t_santri_temp where nis=$id";
 
			if($db->Execute($sql2) === false) {
			trigger_error('Wrong SQL: ' . $sql2 . ' Error: ' . $db->ErrorMsg(), E_USER_ERROR);
			} else {
			$affected_rows = $db->Affected_Rows();
			}
		<?php
			require_once("lapdetail_redirect.php");
		}else{
			echo "<br><div class='alert alert-warning' role='alert'>Gagal Memindah data</div>";
			print "<br><div class='alert alert-warning' role='alert'>error inserting: ".$db->ErrorMsg()."<BR></div>";
				}
	header("Location: ../menu_sekret.php?a=data_saba");
?>