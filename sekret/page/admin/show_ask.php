<html>
<head>
 <?php
 
 include ('../secure/secure_admin.php');
 ?>
</head>
<body>
		
		<form id="login" method="post" action="<?php $_SERVER['PHP_SELF'];?>" onSubmit="return cekLogin();"> 
		<div class="table-responsive">
			<table  class="table table-bordered">
			<tr class="success">
				<td colspan="6"><h4 class="judul">Berikut form untuk jawab pertanyaan</h4></td>
			</tr>
				<tr><th width="4%" scope="col">No</th><th width="15%" scope="col">Subjek</th><th width="40%" scope="col">Isi Pertanyaan</th><th width="30%" scope="col">Jawaban</th><th width="10%" scope="col">Aksi</th></tr>
            <?php
			
            $sql = "SELECT * FROM pertanyaan";
			$result=$db->execute($sql);
			$no="1";
			while(!$result->EOF){
				$id = $result->fields["id_ask"];
				$subject = $result->fields["subject"];
				$isi = $result->fields["isi"];
				$jawaban = $result->fields["jawaban"];
				echo '<tr><td>'.$no.'</td><td>'.$subject.'</td><td>'.$isi.'</td><td>'.$jawaban.'</td><td class=eddel> <a href ="menu_admin.php?a=jawab_ask&id='.$id.'">'; ?> 
                 <span class="glyphicon glyphicon-edit" style="font-size:18px; color:#337AB7">Jawab
				<?php echo '</a>&nbsp;&nbsp;&nbsp;<a href ="admin/pertanyaan_del.php?id='.$id.'" onclick="return confirm(\'Apakah anda yakin?\');">'; ?> 
                <span class="glyphicon glyphicon-trash" style="font-size:18px; color:#C7143A">Hapus <?php echo '</a></td></tr>';
				$no++;
				$result->MoveNext();
            }
            
			?>
					
				</tr>
			</table>	
		</div>
		</form>

</body>
</html>