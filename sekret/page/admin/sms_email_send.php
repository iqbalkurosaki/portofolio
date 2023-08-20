<html>
<script src="../js/custom.js"></script>
<body>

<div class="table-responsive">
	<form class="form-inline" role="form" id="login" name="form" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
					
			<table  class="table table-bordered">
			<tr class="success">
				<td colspan="6"><h4 class="judul">Berikut fasilitas kirim pesan kepada alumni</h4></td>
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
					<td width="30%" scope="col"><h4 class="menu"><center>Nama</center></h4></td>
					<td width="25%" scope="col"><h4 class="menu"><center>Program Keahlian</center></h4></td>
					<td width="10%" scope="col"><h4 class="menu"><center>Email</center></h4><br><div class="radio"><label><input type="checkbox" id="selectall1"/> Select All</label></div></td>
					<td width="10%" scope="col"><h4 class="menu"><center>SMS</center></h4><br><div class="radio"><label> <input type="checkbox" id="selectall2" /> Select All</label></div></td>
				</tr>
				<?php
            if(($_POST['submit']=="Tampilkan")){
					$program_keahlian=$_POST["program_keahlian"];
           
			$sql2 = "SELECT * from user where program_keahlian='".$program_keahlian."' ";
			$result2=$db->execute($sql2);
			$nomor=1;
			 while (!$result2->EOF) {
				$nama=$result2->fields["nama"];
				$program=$result2->fields["program_keahlian"];
            	$no_hp=$result2->fields["no_hp"];
				$email=$result2->fields["email"];
				echo "<tr><td>".$nomor."</td><td>".$nama."</td><td>".$program."</td><td><div class=checkbox><label><input class=checkbox1 type=checkbox name='email[]' value='".$email."'/></label></div>
				</td><td><div class=checkbox><label><input class=checkbox2 type=checkbox name='no_hp[]' value='".$no_hp."'/></label></div>
				</td></tr>";
				$nomor++;
				$result2->MoveNext();
                }
				echo "<tr><td><input type='submit' class='btn btn-primary'  value='Kirim' name='submit'></td></tr>";
			}
			if(($_POST['submit']=="Kirim")){
			
			 $sql3 = "SELECT subject,isi from draft_pesan";
					$result3=$db->Execute($sql3);
					$message = $result3->fields["isi"];
					$judul = $result3->fields["subject"];
				if(!empty($_POST['no_hp'])){
					// Loop to store and display values of individual checked checkbox.
					$no_hp = $_POST['no_hp'];
					foreach( $no_hp as $no_tujuan){
					
					include('../config/config_sms.php');
					$sql4= "INSERT INTO outbox (DestinationNumber, TextDecoded)
					VALUES ('$no_tujuan', '$message')";	
					$result4=$db_gammu->Execute($sql4);
										if($result4){
											echo "<div class='alert alert-success' role='alert'>Selamat telah terkirim</a></div>";
											 $report_sms="Sukses";
											 $sql5="UPDATE user SET report_sms ='$report_sms' WHERE no_hp = '$no_hp'";
							$result5=$db->Execute($sql5);
								if (!$result5) {
										 print "<div class='alert alert-warning' role='alert'>error inserting: ".$db->ErrorMsg()."</div><BR>";

								 
								}
										}else{
											echo "<div class='alert alert-warning' role='alert'>Gagal terkirim</div>";
											 $report_sms="Gagal";
											
										}
					}
				}else if(!empty($_POST['email'])){
					// Loop to store and display values of individual checked checkbox.
					$email = $_POST['email'];
					foreach( $email as $email_tujuan){
					
					
$to = $email_tujuan;
$subject=$judul;



// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <tracerskensa@tracerstudy.cf>' . "\r\n";
$headers .= 'Cc:tracerskensa@tracerstudy.cf' . "\r\n";
if(mail($to,$subject,$message,$headers))
{
   echo"<div class='alert alert-success' role='alert'> mail sent to ".$to."</div>";
   $report_email="Sukses";
}
else
{
  echo"<div class='alert alert-warning' role='alert'> mail not sent ".$to."</div>";
  $report_email="Gagal";
}
$sql4="UPDATE user SET report_email ='$report_email' WHERE email = '$to'";
							$result4=$db->Execute($sql4);
								if (!$result4) {
										 print "<div class='alert alert-warning' role='alert'>error inserting: ".$db->ErrorMsg()."</div><BR>";

								 
							} 



					}
				}
			}
			?>
			
			</table>
	</form>
				
		</div>
		<script>
		$(document).ready(function(){ 
    $("#selectall1").change(function(){
      $(".checkbox1").prop('checked', $(this).prop("checked"));
      });
	$("#selectall2").change(function(){
      $(".checkbox2").prop('checked', $(this).prop("checked"));
      });
	  });
</script>
			</body>
			</html>