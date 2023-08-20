<form id="user" method="post" action="<?php $_SERVER['PHP_SELF'];?>" onSubmit="return cekLogin();"> 
<div class="table-responsive">
	<table  class="table table-stripped">
	<tr class="success"><td colspan="4"><h4 class="judul">Form user Sekbid PPMH</h4></td>
	</tr>
	<tr class="active"><td width="3%" scope="col"><h5>1</h5></td><td colspan="3"><h5>Tambah Akun Sekbid</h5></td>
	</tr>
		<tr>
		<td></td>
			<td width="20%" scope="col">Sekbid</td>
			<td width="1%" scope="col"> : </td>
			<td width="70%" scope="col"><div class="col-md-5"> <select id="sekbid" name="sekbid" class="form-control">
        		<option value="">Pilih Seksi Bidang</option>
                <option value="log_sekret">Kesekret</option>
                <option value="log_bendahara">Bendahara</option>
       			<option value="log_kegiatan">Kegiatan</option>
       			<option value="log_keamanan">Keamanan</option>
    </select></div>
    	</tr>
		<tr>
			<td></td>
			<td width="20%" scope="col">User Name</td>
			<td width="1%" scope="col"> : </td>
			<td width="70%" scope="col"><div class="col-md-10"> <input type="email" id="inputEmail" class="form-control" name="nama" required="required" placeholder="Email address" required autofocus value="<?php
			echo isset($_POST['nama'])? $_POST['nama'] : '';?>" placeholder="isikan nama"/></div></td>
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
			<td colspan="4"> <input type="submit" value=" + Tambahkan" name="submit" class="btn btn-primary" />
		<?php 
		
		if(($_POST['submit']=="Tambahkan")){
			$nama=code($_POST["nama"]);
			$sekbid=code($_POST["sekbid"]);
			$password=$_POST["password"];
			$confirm_pass=$_POST["confirm_pass"];
			
				
			if($password==$confirm_pass){
			$newpass=md5($password);
			//menambah bkk
			$sql="INSERT INTO ".$sekbid."(username,password)
					VALUES('".$nama."','".$newpass."')";
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
	<tr class="active"><td><h5>2</h5></td><td colspan="3"><h5>Hapus akun Sekbid</h5></td>
	</tr>
	    <tr><th width="3%" scope="col">No</th><th width="30%" scope="col">Nama User</th><th width="25%" scope="col">Seksi Bidang</th><th width="30%" scope="col">Aksi</th></tr>
    <?php
   		        
    $sql2="SELECT * FROM log_sekret";
	$result2=$db->execute($sql2);
	$no="1";
    while(!$result2->EOF){
    	$id = $result2->fields["id"];
    	$nama = $result2->fields["username"];
		
		echo '<tr><td>'.$no.'</td><td>'.$nama.'</td><td>Sekretariatan</td><td><a href ="sekret/sekret_del.php?id='.$id.'" onclick="return confirm(\'Apakah anda yakin?\');">'; ?> 
        <font style="font-size:14px; color:#C7143A"><span class="glyphicon glyphicon-trash"></span> Hapus </font> <?php echo '</a></td></tr>';
		$no++;
		$result2->MoveNext();
    }
    $sql3="SELECT * FROM log_bendahara";
	$result3=$db->execute($sql3);
	
    while(!$result3->EOF){
    	$id = $result3->fields["id"];
    	$nama = $result3->fields["username"];
		
		echo '<tr><td>'.$no.'</td><td>'.$nama.'</td><td>Bendahara</td><td><a href ="sekret/bendahara_del.php?id='.$id.'" onclick="return confirm(\'Apakah anda yakin?\');">'; ?> 
        <font style="font-size:14px; color:#C7143A"><span class="glyphicon glyphicon-trash"></span> Hapus </font> <?php echo '</a></td></tr>';
		$no++;
		$result3->MoveNext();
    }
    $sql4="SELECT * FROM log_madrasah";
	$result4=$db->execute($sql4);
	
    while(!$result4->EOF){
    	$nama = $result4->fields["username"];
		
		echo '<tr><td>'.$no.'</td><td>'.$nama.'</td><td>Madrasah</td><td><a href ="sekret/madrasah_del.php?id='.$id.'" onclick="return confirm(\'Apakah anda yakin?\');">'; ?> 
        <font style="font-size:14px; color:#C7143A"><span class="glyphicon glyphicon-trash"></span> Hapus </font> <?php echo '</a></td></tr>';
		$no++;
		$result4->MoveNext();
    }	
    $sql5="SELECT * FROM log_keamanan";
	$result5=$db->execute($sql5);
    while(!$result5->EOF){
    	$nama = $result5->fields["username"];
		
		echo '<tr><td>'.$no.'</td><td>'.$nama.'</td><td>Keamanan</td><td><a href ="sekret/keamanan_del.php?id='.$id.'" onclick="return confirm(\'Apakah anda yakin?\');">'; ?> 
        <font style="font-size:14px; color:#C7143A"><span class="glyphicon glyphicon-trash"></span> Hapus </font> <?php echo '</a></td></tr>';
		$no++;
		$result5->MoveNext();
    }
    $sql6="SELECT * FROM log_kegiatan";
	$result6=$db->execute($sql6);

    while(!$result6->EOF){
    	$nama = $result6->fields["username"];
		
		echo '<tr><td>'.$no.'</td><td>'.$nama.'</td><td>Kegiatan</td><td><a href ="sekret/kegiatan_del.php?id='.$id.'" onclick="return confirm(\'Apakah anda yakin?\');">'; ?> 
        <font style="font-size:14px; color:#C7143A"><span class="glyphicon glyphicon-trash"></span> Hapus </font> <?php echo '</a></td></tr>';
		$no++;
		$result6->MoveNext();
    }	
    ?>
	
		</tr>
	</table>

</div>
</form>