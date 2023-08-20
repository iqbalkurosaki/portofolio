<html>
<head>
<?php

?>		
</head>
<body>
		
		<form method="post" action="<?php $_SERVER['PHP_SELF'];?>" > 
			
			<div class="table-responsive">
			<table class="table table-bordered">
			<tr class="success">
				<td colspan="6"><h4 class="judul">Biodata</h4></td>
			</tr>
            <tr class="active"><th>No</th><th>Nama</th><th>Tanggal Lahir</th><th>Nomer HP</th><th>Aksi</th></tr>
            <?php
            
            

            $sql = "SELECT * FROM alumni where email = '".$_SESSION['FULLNAME']."'";
            $result=$db->Execute($sql);
            $no = 1;

            while (!$result->EOF) {
            	$id = $result->fields["id"];
				$nama = $result->fields["nama"];
				$ttl = $result->fields["ttl"];
				$hp = $result->fields["hp"];
				echo '<tr><td>'.$no.'</td><td>'.$nama.'</td><td>'.$ttl.'</td><td>'.$hp.'</td><td class=eddel> <a href ="menu_alumni.php?a=editbiodata&id='.$id.'"> '; ?>
                <span class="glyphicon glyphicon-edit" style="font-size:18px; color:#337AB7">Edit</td></tr>
				<?php
				$no++;

				$result->MoveNext();
            }
			?>

			
		</table>	
		</div>
		</form>
		
</body>
</html>