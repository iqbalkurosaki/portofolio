<html>
<script src="../js/custom.js"></script>
<body>

<div class="table-responsive">
	<form class="form-inline" role="form" id="login" name="form" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
					
			<table  class="table table-bordered">
			<tr class="success">
				<td colspan="6"><h4 class="judul">Berikut Laporan pengiriman pesan</h4></td>
			</tr>
			<tr><td colspan ="6" width="4%" scope="col"><div class="col-md-6"> 
			 <!--program_keahlian-->
            <select id="program_keahlian" name="program_keahlian" class="form-control" onchange="this.form.submit();">
			
                <option value="">Pilih Program Keahlian</option>
                <?php
				 include('../config/config.php');
				$sql = "SELECT DISTINCT program_keahlian FROM user";
				$result=$db->Execute($sql);
				 while (!$result->EOF) {
            	
				$program_keahlian = $result->fields["program_keahlian"];
				?>
                    <option value="<?php echo $program_keahlian; ?>">
					<?php echo $program_keahlian; ?>
                    </option>
                <?php
				$result->MoveNext();
                }
				?>
            </select><br>
			<input type="submit" class="btn btn-primary"  value="Tampilkan" name="submit">
			</div></td></tr>
			
				<tr class="success">
					<td width="7%" scope="col"><h4 class="menu"><center>No</center></h4></td>
					<td width="10%" scope="col"><h4 class="menu"><center>NIS</center></h4></td>
					<td width="30%" scope="col"><h4 class="menu"><center>Nama</center></h4></td>
					<td width="25%" scope="col"><h4 class="menu"><center>Program Keahlian</center></h4></td>
					<td width="10%" scope="col"><h4 class="menu"><center>Email</center></h4></div></td>
					<td width="10%" scope="col"><h4 class="menu"><center>SMS</center></h4></td>
				</tr>
				<?php
            if(($_POST['submit']=="Tampilkan")){
					$program_keahlian=$_POST["program_keahlian"];
           
			$sql2 = "SELECT * from user where program_keahlian='".$program_keahlian."' ";
			$result2=$db->execute($sql2);
			$nomor=1;
			 while (!$result2->EOF) {
				$nis=$result2->fields["nis"];
				$nama=$result2->fields["nama"];
				$program=$result2->fields["program_keahlian"];
            	$report_email=$result2->fields["report_email"];
				$report_sms=$result2->fields["report_sms"];
				echo "<tr><td>".$nomor."</td><td>".$nis."</td><td>".$nama."</td><td>".$program."</td><td>".$report_email."</td><td>".$report_sms."</td></tr>";
				$nomor++;
				$result2->MoveNext();
                }
			}
			
			
			?>
			
			</table>
	</form>
				
		</div>
	
			</body>
			</html>