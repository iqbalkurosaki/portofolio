<html>
	<head>
	<title>Formulir</title> 

<?php
	
	$id =$_REQUEST['id'];
	
	$sql = "SELECT * FROM alumni WHERE id='$id'";
	$result=$db->Execute($sql);
	
		$nm = $result->fields["nama"] ;					
		$ttl = $result->fields["ttl"] ;
		$hp = $result->fields["hp"] ;
		$pass = $result->fields["password"] ;

	if(($_POST['submit']=="Update")){	
		$nmup = code($_POST["nama"]);					
		$ttlup = $_POST["ttl"];
		$hpup = $_POST["hp"];
		
		$passwordvalue=md5($_POST["cur_pass"]);
	
			if($pass==$passwordvalue)
			{
			$sql2="UPDATE alumni SET nama='$nmup',ttl='$ttlup',hp='$hpup'WHERE id = '$id'";
			$result2=$db->Execute($sql2);
				if(!$result2) {
					echo "<div class='alert alert-warning' role='alert'>Gagal Merubah biodata</div>";
				} else {
				$affected_rows = $db->Affected_Rows();
				require_once("redirect.php");
				}
				
				$db->Close();
			}else{
			echo "<div class='alert alert-danger' role='alert'>Isikan password dengan benar</div>";
			
			}
		}	

?>	
</head> 
	<body>
	<div class="table-responsive">
		
		<form id="login" method="post" action="<?php $_SERVER['PHP_SELF'];?>"> 
		<table class="table table-stripped">
				<tr class="success">
				<td colspan="4"><h4 class="judul">Update Biodata</h4></td>
			</tr>
				
				<tr>		
					<td>Nama</td>
					<td>:</td>
					<td><div class="col-md-4"><input type="text" name="nama" required="required" class="form-control" value="<?php echo $nm ?>" placeholder="Nama Alumni"/>
					</div></td>
				</tr>
				<tr>	  
					<td>Tgl Lahir</td>
					<td>:</td>
					<td><div class="col-md-3"><input type="date" name="ttl" class="form-control" required="required" placeholder="dd/mm/yy" value="
						<?php echo (isset($_POST['ttl'])) ?	htmlspecialchars($_POST['ttl']) : "";?>"/></div></td>
				</tr>
				<tr>
					<td>No HP</td>
					<td>:</td>
					<td><div class="col-md-3"><input type="text" name="hp" class="form-control" value="<?php echo $hp ?>" placeholder="Nomor HP Siswa"/></td>
				</tr>
				
				<tr>
					<td colspan="3">Untuk perubahan biodata masukan kata sandi</td></tr>
				<tr>	
					<td colspan="3"><input type="password" name="cur_pass"/></td>
				</tr>
				
					<td> <input type="submit" value="Update" class="btn btn-primary" name="submit" /></td>
				</tr>
				
		
			</table>
	   </form>
	   </div>
	</body> 
</html> 