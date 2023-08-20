<html>
	<head>
	<?php
			
		//	require "call_class_sekret.php";
			/* <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
     <title>Angket</title> 
        <style type="text/css" media="print">
		 	@page { size: potrait; }
			
        	h4 { margin : 5px 0; }
				
			.printtable td{
				border : 1px solid #000;
			}
		</style>
        <script>
			window.print();
		</script>*/
	?>
    
	
	

	
	<body>
	<div class="well sidebar-nav">
		
		  <!-- Le styles -->
		
		<div class="table-responsive">
			<table  class="table table-bordered">
			<tr class="success">
				<td width="4%" scope="col"><h4>A</h4></td>
				<td colspan="6"><h4>Laporan Data Santri</h4></td>
			</tr>
			 <tr class="active"><th>No</th><th>Nis</th><th>Nama</th><th>Tempat, Tanggal Lahir</th><th>Alamat</th><th>Status</th></tr>
           
				<?php
            
            
            $sql = "SELECT * FROM t_santri";
            $no = 1;
            $result=$db->execute($sql);
            while (!$result->EOF) {
				$nis= $result->fields["nis"];
				$nama = $result->fields["nama"];
            	$tempat_l = $result->fields["tempat_lahir"];
				$tgl_l = $result->fields["tgl_lahir"];
				$alamat = $result->fields["alamat"];
				$kota = $result->fields["kota"];
				$id_status = $result->fields["id_status"];
				$tgl_masuk = $result->fields["tgl_masuk"];
				
				echo '<tr><td>'.$no.'</td><td>'.$nis.'</td><td>'.$nama.'</td><td>'.$tempat_l.','.$tgl_l.'</td><td>'.$alamat.','.$kota.'</td><td>'.$id_status.'</td></tr>'; 
				$no++;

				$result->MoveNext();
            }

			
			?>
				
			</table>
		
				
	
     </div>
		
	 </div>
	 
	
	 </body> 
	 

</html> 
