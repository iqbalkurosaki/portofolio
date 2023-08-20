<html>
<head>
<?php
include ('../secure/secure_admin.php');
?>
</head>
<body>
		<form method="post" enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF'];?>" onSubmit="return cekLogin();"> 
			<div class="table-responsive">
			<table  class="table table-stripped">
			<tr class="success">
				<td colspan="6"><h4 class="judul">Berikut form untuk menulis pesan</h4></td>
			</tr>
				<tr>
					<td width="15%" scope="col">Subject</td>
					<td width="1%" scope="col">:</td>
					<td width="70%" scope="col"><div class="col-md-6"><input type="text" id="subject" name="subject" required="required" class="form-control" value="<?php
					echo isset($_POST['subject'])? $_POST['subject'] : '';?>" placeholder="isikan subject"/></div></td>
				</tr>
				<tr>
					<td>Isi</td>
					<td>:</td>
					<td><div class="col-md-12"><textarea class="form-control" rows="5" id="isi" required="required" name="isi" value="<?php
					echo isset($_POST['isi'])?$_POST['isi'] : '';?>" /></textarea></div></td>
							
			<tr>
					<td> <input type="submit" value="Simpan" name="submit" /></td>
					</tr>
			
			<?php 
			if(($_POST['submit']=="Simpan")){
					$subject=code($_POST["subject"]);
					$isi=code($_POST["isi"]);
					$user=$_SESSION["nmuser"];

					$cek = $db->Execute("select * from draft_pesan where id_draft = '".$user."'");

					if($cek->fields){
						// Update
					$sql="UPDATE draft_pesan SET subject='".$subject."',isi='".$isi."' WHERE id_draft='".$user."'";
					}else{
						// Insert
						$sql="INSERT INTO draft_pesan(id_draft,subject,isi)
													VALUES('".$user."','".$subject."','".$isi."')";
					}
					$result=$db->Execute($sql);
					if($result){
					echo "<div class='alert alert-success' role='alert'>Pesan berhasil tersimpan</div>";
					}else{
					 print "<div class='alert alert-warning' role='alert'>error inserting: ".$db->ErrorMsg()."</div><BR>";
					}
					
									}
				?>
				</table>
	
		<table  class="table table-bordered">
		<tr class="success">
				<td colspan="6"><h4 class="judul">Berikut Konsep Pesan</h4></td>
			</tr>
            <tr><th width="15%" scope="col">Subject</th><th width="45%" scope="col">Isi Pesan</th></tr>
            <?php
           	$sql2 = "SELECT * FROM draft_pesan";
			$result2=$db->execute($sql2);
		
			while(!$result2->EOF){
				
				
				$subject= $result2->fields["subject"];
				$isi = $result2->fields["isi"];
				echo '<tr><td>'.$subject.'</td><td>'.$isi.'</td></tr>';
				
				$result2->MoveNext();
            }
            
			?>
					
				
			</table>	
							
			<br><br>
		</div>
		</form>
	
</body>
</html>	