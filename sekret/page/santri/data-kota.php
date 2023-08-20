<?php
				include('../../config/config.php');
				
				if(isset($_POST['id_kota'])){
						$id_kota = $_POST['id_kota'];
						
						$sql2 = "SELECT * FROM kota WHERE `id_prov` = '$id_kota' ORDER BY kota ASC";
						$result2=$db->Execute($sql2);
						 while (!$result2->EOF) {
						$id = $result2->fields["id"];
						$kota = $result2->fields["kota"];
						echo "<option id='kota' class='".$id."' value='".$id."' >".$kota." </option> ";
					
						$result2->MoveNext();
						}
				}
?>