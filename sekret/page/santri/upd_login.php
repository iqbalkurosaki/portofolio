<html>
<?php 	
		include ('../secure/secure_alumni.php');
		$sql = "SELECT * FROM alumni where email='".$_SESSION['FULLNAME']."'";
		$result=$db->execute($sql);
		$name = $result->fields["email"];
?>
    <body>
     <form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
        <div class="table-responsive">
		<table  class="table table-striped"><tr class="success">
		<td colspan="3"><h4 class="judul">Ganti Login</h4></td>
		</tr>
	
	
        <tr><td width="25%" scope="col">Username  lama </td>
		<td width="1%" scope="col">:</td>
		<td width="50%" scope="col"><div class="col-md-6">
		<input type="text" name="judul" class="form-control" disabled="true" value="<?php echo $name ?>"/></div></td>
        <tr><td>Username baru </td>
		<td>:</td>
		<td><div class="col-md-6"><input type="text" name="username" class="form-control" required="required"/></div></td>
		</tr>
        <tr><td>Kata sandi yang lama</td>
		<td >:</td>
        <td><div class="col-md-4"><input type="password" name="cur_pass" class="form-control" /></div></td></tr>
		<tr><td>Kata sandi yang baru </td>
		<td >:</td>
        <td><div class="col-md-4"><input type="password" name="new_password" class="form-control" /></div></td></tr>
        <tr><td>Ulangi kata sandi baru </td>
		<td >:</td>
        <td><div class="col-md-4"><input type="password" name="confirm_pass" class="form-control" /></div></td></tr>
     	 <tr><td colspan="2">     
		<input name="submit" type="submit" value="Simpan" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Jika perubahan berhasil, anda dialihkan ke halaman utama untuk login kembali"/>
		</td></tr>
    
</table>
</div>    
	
<?php 
	if(($_POST['submit']=="Simpan")){
	include('../config/config.php');
	$passwordvalue=md5($_POST["cur_pass"]);
	$new_password=$_POST["new_password"];
	$confirm_pass=$_POST["confirm_pass"];   
	$data_pass=$result->fields["password"];
	$newuser=code($_POST["username"]);
	
	if($new_password==$confirm_pass && $data_pass==$passwordvalue)
	{
	
	$newpass=md5($new_password);
	$sql2="UPDATE alumni SET password='$newpass',email='$newuser' where email='$name'";
	$result2=$db->Execute($sql2);
 		if(!$result2) {
		echo "<div class='alert alert-warning' role='alert'>Password tidak sama</div>";
		} else {
		  $affected_rows = $db->Affected_Rows();
		require_once("home_page/logout.php");
		}
		
		$db->Close();
	}else{
	echo "<div class='alert alert-warning' role='alert'>Ada kesalahan pengisian password</div>";}
}
?>	
</body>
</html>