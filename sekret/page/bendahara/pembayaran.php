<html>
	<head>
	
	
    <title>Angket</title> 

   	<script src="../assets/scripts/jquery.js"></script>
   	<script src="../assets/scripts/form_sekret/profesi.js"></script>
   	<script src="../assets/scripts/form_sekret/kota.js"></script>
   	<script src="../assets/scripts/form_sekret/kodepos.js"></script>
   	<script src="../assets/scripts/form_sekret/komplek.js"></script>


		<?php
		
		// url_encode() url_decode()
		if(($_POST['submit']=="Simpan")){
					//$user=$_SESSION['FULLNAME'];
					$mapel1=code($_POST["mapel1"]);
					$TTL=code($_POST["TTL"]);
					$tgl_skr=code($_POST["tgl_skr"]);
					
					// Insert

					
					$result=$db->Execute($sql);
					if($result){
						echo "<br><div class='alert alert-success' role='alert'>Selamat telah terkirim. </div>";
					}else{
						echo "<br><div class='alert alert-warning' role='alert'>Gagal Menambah data</div>";
						 print "<br><div class='alert alert-warning' role='alert'>error inserting: ".$db->ErrorMsg()."<BR></div>";
					}
					}
		?>
    
	<body>
	<div class="well sidebar-nav">
		
		  <!-- Le styles -->
		<form class="form-inline" role="form"  id="login" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
		
		<div class="table-responsive">
			<table  class="table table-striped">
			<tr class="success">
				<td width="4%" scope="col"><h4>A</h4></td>
				<td><h4>Data Santri</h4></td>
			</tr>
			
			<tr></tr>
			
			<tr>
				<td width="4%" scope="col"><b>A2</td>
				<td><b>Tanggal Sekarang</td>
			</tr>
			<td width="4%" scope="col"></td><td >
			 <input type="date" name="tgl_skr" required placeholder="yy-mm-dd" class="form-control" value="<?php
					echo (isset($_POST['tgl_skr'])) ?	htmlspecialchars($_POST['tgl_skr']) : "";?>"/></div></td>
			
			</td>
			</tr>
			
			<tr>
				<td width="4%" scope="col"><b>A1</td>
				<td><b>Mata Pelajaran</td>
			</tr>
			<tr><td width="4%" scope="col"></td><td><input type="text"  class="input-xlarge" id="mapel1" name="mapel1" value="<?php
					echo isset ($_POST['mapel1']) ? $_POST['mapel1'] : '';?>" placeholder="mohon tuliskan"/>
			</tr>
			<tr>
				<td width="4%" scope="col"><b>A2</td>
				<td><b>Mata Pelajaran</td>
			</tr>
			<tr><td width="4%" scope="col"></td><td><input type="text"  class="input-xlarge" id="mapel1" name="mapel1" value="<?php
					echo isset ($_POST['mapel1']) ? $_POST['mapel1'] : '';?>" placeholder="mohon tuliskan"/>
			</tr>
			</table>
			<tr><td colspan="3"><input type="submit" class="btn btn-primary"  value="Simpan" name="submit"></td></tr>
			</table>
			 </div>
		</form>
	
	 </div>
	
	
	 </body> 
	 

</html> 
