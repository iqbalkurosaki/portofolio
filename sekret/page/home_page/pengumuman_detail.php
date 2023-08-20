<!DOCTYPE html>
<html>
<head>

	<?php


	 $id =$_REQUEST['id'];

	 $sql = "SELECT * FROM pengumuman WHERE id ='$id'";
	 $result = $db->Execute($sql);
		
	?>
</head>
	<body>
	
	<div class="container-fluid">
		<div class="row-fluid">
        <div class="span12">
          <div class="well sidebar-nav">	
		<?php
			
			while (!$result->EOF) {
				$id = $result->fields["id"];
				$judul = $result->fields["judul"];
				$isi = $result->fields["isi"];
				$sumber = $result->fields["sumber"];
				$tglupdt= $result->fields["tglupdt"];
				$foto= $result->fields["foto"];
				$result->MoveNext();
			}
	
				
				echo '<h4 class="page-header"><b>'.$judul.'</b></h4><br>';
				echo  $isi; 
				echo  '<br><br>Sumber : '.$sumber.'. Tanggal Update : ' .$tglupdt. '</font><br>';

			?>
			<img itemprop="image" src="<?php echo $foto; ?>" width="500" height="600"><br>
			<a href="?m=pengumuman"><span class='glyphicon glyphicon-circle-arrow-left' style='font-size:25px; color:blue'>Back</span></a><br><br><br>
			
		</div>
		</div>
		</div>
		</div>
		

	</body>
</html>