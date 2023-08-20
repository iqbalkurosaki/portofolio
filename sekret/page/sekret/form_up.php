
<!-- 	<link  href="../js/cropperjs-master/cropper.min.css" rel="stylesheet">
	<script src="../js/cropperjs-master/cropper.min.js"></script> -->

	<style type="text/css">
	.form-control{
		margin: 5px;
	}
	</style>   


<?php
		
		// url_encode() url_decode()

	   // echo $id;
    $sql3="UPDATE t_santri SET last_update=NOW() WHERE id_kelas NOT IN (17, 18) and id_status not like 'B'";
    $result3=$db->Execute($sql3);					
				
if(!$result3) {
      echo "<br><div class='alert alert-warning' role='alert'>".$id."maaf, ada kesalahan NIM</div>";
    } else {
    	$id =$_POST['id'];
    	
        echo "<br><div class='alert alert-success' role='alert'>Selamat".$id.", Anda Layak Mendapat Tanda Tangan dan Stempel</div>";
    }

					?>
