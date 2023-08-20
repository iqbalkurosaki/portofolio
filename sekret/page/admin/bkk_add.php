<html>
<head>
<?php
include('../config/config.php');
?>
</head>
<body>
		
		<form id="login" method="post" action="<?php $_SERVER['PHP_SELF'];?>" onSubmit="return cekLogin();"> 
		<div class="table-responsive">
			<table  class="table table-stripped">
			<tr class="success"><td colspan="4"><h4 class="judul">Form user BKK SMKN 1 Pasuruan</h4></td>
			</tr>
			<tr class="active"><td width="3%" scope="col"><h5>1</h5></td><td colspan="3"><h5>Tambah Akun BKK</h5></td>
			</tr>
			<tr>
					<td></td>
					<td width="20%" scope="col">Nama BKK</td>
					<td width="1%" scope="col"> : </td>
					<td width="70%" scope="col"><div class="col-md-10"><input type="text" name="nama" required="required" class="form-control" value="<?php
					echo isset($_POST['nama'])? $_POST['nama'] : '';?>" placeholder="isikan nama"/></div></td>
				</tr>
			<tr>	  
					<td></td>
					<td>E-mail</td>
					<td> : </td>
					<td><div class="col-md-6"><input type="email" name="email" placeholder="Alamat E-mail" class="form-control" value="
						<?php echo (isset($_POST['email'])) ? htmlspecialchars($_POST['email']) : "";?>" placeholder="Contoh : example@mail.com"/></div></td>
				</tr>
				<tr>
					<td></td>
					<td>Kata sandi</td>
					<td> : </td>
					<td><div class="col-md-5"><input type="password" name="password" class="form-control" /></div></td>
				</tr>
				<tr>
					<td></td>
					<td>Ulangi kata sandi</td>
					<td>:</td>
					<td> <div class="col-md-5"> <input type="password" name="confirm_pass" class="form-control"/></div></td>
				</tr>
				
				<tr>
					<td colspan="4"> <input type="submit" value="Tambahkan" name="submit" class="btn btn-primary" />
				<?php 
				
				if(($_POST['submit']=="Tambahkan")){
					$nama=code($_POST["nama"]);
					$email=code($_POST["email"]);
					$password=$_POST["password"];
					$confirm_pass=$_POST["confirm_pass"];
					
						
					if($password==$confirm_pass){
					$newpass=md5($password);
					//menambah bkk
					$sql="INSERT INTO bkk(nama,email,pass)
							VALUES('".$nama."','".$email."','".$newpass."')";
					$result=$db->Execute($sql);
					if ( !$result) {
							 print 'error inserting: '.$db->ErrorMsg().'<BR>';
					}			
				
					}else{
					echo "<div class='alert alert-danger' role='alert'>Password tidak sama, coba masukkan data dengan benar</div>";
					}
					
				}
					?>
			</td></tr>
			</table>
			<table  class="table table-stripped">
			<tr class="active"><td><h5>2</h5></td><td colspan="3"><h5>Hapus akun BKK</h5></td>
			</tr>
			    <tr><th width="3%" scope="col">No</th><th width="30%" scope="col">Nama User</th><th width="25%" scope="col">email</th><th width="30%" scope="col">Aksi</th></tr>
            <?php
           		        
            $sql2="SELECT * FROM bkk";
			$result2=$db->execute($sql2);
			$no="1";
            while(!$result2->EOF){
            	$id = $result2->fields["id"];
				$nama = $result2->fields["nama"];
				$email= $result2->fields["email"];
				echo '<tr><td>'.$no.'</td><td>'.$nama.'</td><td>'.$email.'</td><td><a href ="admin/bkk_del.php?id='.$id.'" onclick="return confirm(\'Apakah anda yakin?\');">'; ?> 
                 <span class="glyphicon glyphicon-trash" style="font-size:18px; color:#C7143A"></span> Hapus <?php echo '</a></td></tr>';
				$no++;
				$result2->MoveNext();
            }
            ?>
					
				</tr>
			</table>
	
		</div>
		</form>
	
</body>
</html>