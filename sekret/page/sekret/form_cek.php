
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
    $sql3="UPDATE t_santri SET last_update=NOW() WHERE nis=$id";
    $result3=$db->Execute($sql3);					
				
if(!$result3) {
      echo "<br><div class='alert alert-warning' role='alert'>".$id." maaf, ada kesalahan NIM</div>";
    } else {
    	$id =$_POST['id'];
    	
        echo "<br><div class='alert alert-success' role='alert'>Selamat ".$id.", Anda Layak Mendapat Tanda Tangan dan Stempel</div>";
    }
}
					?>
					<body>
	<div class="sidebar-nav">
		
	<form method="post" action="">
    <div class="table-responsive">
        <table  class="table table-stripped">
        </tr>
    
        <tr>
            
            <td><b>Masukan NIS</td>
        </tr>
        <tr><td><input type="text" name="id" required="required" class="form-control" />
        </tr>
			<tr><td>	<button type="submit" class="btn btn-primary" value="Simpan" name="submit"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button></td>
			</tr>
		</tbody>
		</table>
		 </div>
		</form>
	
	 </div>
	</body>