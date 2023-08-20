
<!-- 	<link  href="../js/cropperjs-master/cropper.min.css" rel="stylesheet">
	<script src="../js/cropperjs-master/cropper.min.js"></script> -->

	<style type="text/css">
	.form-control{
		margin: 5px;
	}
	</style>   

       
<?php
		
		// url_encode() url_decode()
if(($_POST['submit']=="Simpan")){
		//$user=$_SESSION['FULLNAME'];
			
			
			
			
					// update
    $id =$_POST['id'];
	   // echo $id;
     $kelas_up=code($_POST["kelas_up"]);
      $status_santri_up=code($_POST["status_santri_up"]);
	
    $sql3="UPDATE t_santri SET id_status='$status_santri_up',id_kelas='$kelas_up',last_update=NOW() WHERE nis=$id";
    $result3=$db->Execute($sql3);					
				if(!$result3) {
    echo "<br><div class='alert alert-warning' role='alert'>".$id." maaf, ada kesalahan NIM</div>";
    } else {
    	$id =$_POST['id'];
    	
echo "<br><div class='alert alert-success' role='alert'>Selamat ".$id.",update data berhasil</div>";
    }
}

					?>
					 
	<form method="post" action="">
 <div class="table-responsive">
 <table  class="table table-stripped">
  
        
    
        <tr>
            
            <td><b>Masukan NIS</td>
        </tr>
        <tr><td><input type="text" name="id" required="required" class="form-control" />
        </tr>
        <tr>
                
                <td ><b>Apa kelas Anda ?</td>
            </tr>
            <tr><td >
             <!--kelas-->
            <select id="kelas" name="kelas_up">
                <option value="" disabled="disabled">Pilih kelas</option>
                <?php
           
                $sql = "SELECT * FROM kelas ORDER BY id_kelas";
                $result=$db->Execute($sql);
                 while (!$result->EOF) {
                $id = $result->fields["id_kelas"];
                $kelas = $result->fields["kelas"];
                ?>
                    <option value="<?php echo $id; ?>" <?php if ($id == $id_kelas) {echo "selected";} ?> >
                        <?php echo $kelas; ?>
                    </option>
                <?php
                $result->MoveNext();
                }
                ?>
            </select>
            </td></tr> 
            <tr>
                
                <td ><b>Apa Status Anda ?</td>
            </tr>
            <tr><td >
             <!--status_santri-->
            <select id="status_santri" name="status_santri_up">
                <option value="" disabled="disabled">Pilih Status</option>
                <?php
           
                $sql = "SELECT * FROM status_santri ORDER BY id_status";
                $result=$db->Execute($sql);
                 while (!$result->EOF) {
                $id = $result->fields["id_status"];
                $status_santri = $result->fields["status_santri"];
                ?>
                    <option value="<?php echo $id; ?>" <?php if ($id == $id_status) {echo "selected";} ?> >
                        <?php echo $status_santri; ?>
                    </option>
                <?php
                $result->MoveNext();
                }
                ?>
            </select>
            </td></tr> 
			<tr><td>	<button type="submit" class="btn btn-primary" value="Simpan" name="submit"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button></td>
			</tr>
		</tbody>
		</table>
		 </div>
     </div>
		</form>
		

