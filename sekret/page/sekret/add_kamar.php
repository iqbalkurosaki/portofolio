<?php 

if(isset($_POST['submit']) && ($_POST['submit'] == "+ Tambahkan")){
	$nama_kamar = code($_POST["nama_kamar"]);
	$kapasitas = $_POST["kapasitas"];
	$namakomplek = $_POST["namakomplek"];
	$id_komplek = $_POST['id_komplek'];
	$sql = "SELECT nama_komplek FROM nama_komplek WHERE id_namakomplek = ".$id_komplek;
	$result=$db->Execute($sql);
	$nama_komplek = $result->fields["nama_komplek"];
	
	//membuat id kamar
	$id_komplek = ($id_komplek.substr($nama_kamar, 1));

	$sql="INSERT INTO komplek
			VALUES('".$id_komplek."','".$nama_kamar."','".$nama_komplek."','".$kapasitas."')";
	$result=$db->Execute($sql);
	if ( !$result) {
			 print 'error inserting: '.$db->ErrorMsg().'<BR>';
	}
}
?>
<style type="text/css">
	a:hover{
		text-decoration: none;
	}
</style>
	<form id="login" method="post" action="<?php $_SERVER['PHP_SELF'];?>"> 
		<div class="table-responsive">
		<br>


			<table  class="table table-stripped">
			<tr class="active"><td width="3%" scope="col"><h5>1</h5></td><td colspan="3"><h5>Tambah Kamar</h5></td>
			</tr>

				<tr>
				<td></td>
					<td width="20%" scope="col">Komplek</td>
					<td width="1%" scope="col"> : </td>
					<td width="70%" scope="col"><div class="col-md-5"> <select id="komplek" name="id_komplek" class="form-control" required="">
                		<option disabled="" selected="">Pilih Komplek</option>
                       <?php
           
				$sql = "SELECT * FROM nama_komplek ORDER BY id_namakomplek";
				$result=$db->Execute($sql);
				 while (!$result->EOF) {
            	$id = $result->fields["id_namakomplek"];
				$nama_komplek = $result->fields["nama_komplek"];
				?>
                    <option value="<?php echo $id; ?>" <?php if((isset($_POST['id_komplek']) && $_POST['id_komplek'] == $id)) { echo "selected"; } ?> >
                        <?php echo $nama_komplek; ?>
                    </option>
                <?php
				$result->MoveNext();
                }
				?>
            		</select></div>
        			</td>
            	</tr>
				<tr>
					<td></td>
					<td width="20%" scope="col">Nama Kamar</td>
					<td width="1%" scope="col"> : </td>
					<td width="70%" scope="col"><div class="col-md-10"><input type="text" name="nama_kamar" required="required" class="form-control" value="<?php
					echo isset($_POST['nama_kamar']) ? $_POST['nama_kamar'] : '';?>" placeholder="Isikan nama kamar"/></div></td>
				</tr>
				<tr>
					<td></td>
					<td>Kapasitas</td>
					<td> : </td>
					<td><div class="col-md-5"><input type="number" name="kapasitas" required="required" min="1" class="form-control" value="<?php
					echo isset($_POST['kapasitas']) ? $_POST['kapasitas'] : '';?>" placeholder="Isikan jumlah kapasitas"/>
					</div></td>
				</tr>
				
				<tr>
					<td colspan="4"> <input type="submit" value="+ Tambahkan" name="submit" class="btn btn-primary" />
			</td></tr>
		</table>
	</form>
			</table>
			<table  class="table table-stripped">
			<tr class="active"><td><h5>2</h5></td><td colspan="4"><h5>Edit dan Hapus Kamar</h5></td>
			</tr>
			    <tr><th width="3%" scope="col">No</th><th width="30%" scope="col">Nama Kamar</th><th width="25%" scope="col">Kapasitas</th><th width="30%" scope="col">Aksi</th></tr>
            <?php
           		        
            $sql2="SELECT * FROM komplek";
			$result2=$db->execute($sql2);
			$no="1";
            while(!$result2->EOF){
				$id=$result2->fields["id_komplek"];
            	$nama_komplek= $result2->fields["nama_komplek"];
            	$kapasitas = $result2->fields["kapasitas"];
				
				echo '<tr><td>'.$no.'</td><td>'.$nama_komplek.'</td><td>'.$kapasitas.'</td><td class=eddel> <a href ="menu_sekret.php?a=kamar_edit&id='.$id.'">'; ?> 
               <font style="font-size:14px; color:#337AB7"><span class="glyphicon glyphicon-edit"></span> Ubah </font>
				<?php echo '</a>&nbsp;&nbsp;&nbsp;<a href ="sekret/kamar_del.php?id='.$id.'" onclick="return confirm(\'Apakah anda yakin?\');">'; ?> 
                <font style="font-size:14px; color:#C7143A"><span class="glyphicon glyphicon-trash"></span> Hapus </font> <?php echo '</a></td></tr>';
				$no++;
				$result2->MoveNext();
            }
            	
            ?>
			
				</tr>
			</table>
	
		</div>