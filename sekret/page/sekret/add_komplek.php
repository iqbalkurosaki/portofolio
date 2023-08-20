<style type="text/css">
	a:hover{
		text-decoration: none;	
	}
</style>
		<form id="login" method="post" action="<?php $_SERVER['PHP_SELF'];?>" onSubmit="return cekLogin();"> 
		<div class="table-responsive">
		<br>

			<table  class="table table-stripped">
			<tr class="success"><td colspan="4"><h4 class="judul">Form Tambah dan Hapus Komplek</h4></td>
			</tr>
			<tr class="active"><td width="3%" scope="col"><h5>1</h5></td><td colspan="3"><h5>Tambah Komplek</h5></td>
			</tr>
			<tr>
				<td></td>
					<td width="20%" scope="col">Komplek</td>
					<td width="1%" scope="col"> : </td>
					<td width="70%" scope="col"><div class="col-md-10"><input type="text" name="keterangan" required="required" class="form-control" value="<?php
					echo isset($_POST['keterangan'])? $_POST['keterangan'] : '';?>" placeholder="isikan nama"/></div></td>
				</tr>
			
				
				<tr>
					<td colspan="4"> <input type="submit" value="+ Tambahkan" name="submit" class="btn btn-primary" />
				<?php 
				
				if(($_POST['submit']=="+ Tambahkan")){
					
					$komplek=code($_POST["keterangan"]);
					
					
					$sql1="INSERT INTO nama_komplek(nama_komplek)
							VALUES('".$komplek."')";
					$result1=$db->Execute($sql1);
					if ( !$result1) {
							 print 'error inserting: '.$db->ErrorMsg().'<BR>';
					}								
				}
					?>
			</td></tr>
			</table>
			<table  class="table table-stripped">
			</tr>
			    <tr><th width="3%" scope="col">No</th><th width="25%" scope="col">Nama Komplek</th><th width="30%" scope="col">Aksi</th></tr>
            <?php
           		        
            $sql2="SELECT * FROM nama_komplek";
			$result2=$db->execute($sql2);
			$no="1";
            while(!$result2->EOF){
				$id=$result2->fields["id_namakomplek"];
            	$nama_komplek= $result2->fields["nama_komplek"];
            	
				
				echo '<tr><td>'.$no.'</td><td>'.$nama_komplek.'</td><td class=eddel> <a href ="sekret/komplek_del.php?id='.$id.'" onclick="return confirm(\'Apakah anda yakin?\');">'; ?> 
               <font style="font-size:14px; color:#C7143A"><span class="glyphicon glyphicon-trash"></span> Hapus </font> <?php echo '</a></td></tr>';
				$no++;
				$result2->MoveNext();
            }
            	
            ?>
			
				</tr>
			</table>
	
		</div>
		</form>