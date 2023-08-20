<?php
				include('../../config/config.php');
				
				if(isset($_POST['program_keahlian'])){
				
					$program_keahlian=$_POST["program_keahlian"];
           
			$sql2 = "SELECT * from user where program_keahlian='".$program_keahlian."' ";
			$result2=$db->execute($sql2);
			$nomor=1;
			 while (!$result2->EOF) {
				$nis=$result2->fields["nis"];
				$nama=$result2->fields["nama"];
				$program=$result2->fields["program_keahlian"];
            	$no_hp=$result2->fields["no_hp"];
				$email=$result2->fields["email"];
				echo "<tr><td>".$nomor."</td><td>".$nis."</td><td>".$nama."</td><td>".$program."</td><td></td></tr>";
				$nomor++;
				$result2->MoveNext();
                }
			}
			
?>