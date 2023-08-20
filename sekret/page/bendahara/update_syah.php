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
					$nama=code($_POST["nama"]);
					$TTL=code($_POST["TTL"]);
					$tgl_lahir=code($_POST["tgl_lahir"]);
					
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
				<td><b>Tanggal Lahir</td>
			</tr>
			<td width="4%" scope="col"></td><td >
			 <input type="date" name="tgl_lahir" required placeholder="yy-mm-dd" class="form-control" value="<?php
					echo (isset($_POST['tgl_lahir'])) ?	htmlspecialchars($_POST['tgl_lahir']) : "";?>"/></div></td>
			
			</td>
			</tr>
			
			<tr>
				<td width="4%" scope="col"><b>A4</td>
				<td ><b>Apa Profesi Anda ?</td>
			</tr>
			<tr><td width="4%" scope="col"></td><td >
			 <!--profesi-->
            <select id="profesi" name="profesi">
                <option value="">Pilih profesi</option>
                <?php
           
				$sql = "SELECT * FROM profesi ORDER BY nama_profesi";
				$result=$db->Execute($sql);
				 while (!$result->EOF) {
            	$id = $result->fields["id_profesi"];
				$profesi = $result->fields["nama_profesi"];
				?>
                    <option value="<?php echo $id; ?>">
                        <?php echo $profesi; ?>
                    </option>
                <?php
				$result->MoveNext();
                }
				?>
            </select>
			</td></tr>
			</tr>
			</tr>
			
            <tr>
                <td width="4%" scope="col"><b>A13</td>
                <td ><b>Apa Anda sudah lunas administrasi santri baru ?</td>
            </tr>
            <tr><td width="4%" scope="col"></td><td >
            
            <select id="lunas_administrasi" name="lunas_administrasi">
                <option value="">Pilih Kelunasan</option>
               
                    <option value="0">Belum  </option>
                    <option value="1">Sudah  </option>
               
            </select>
            </td></tr>	
			</table>
			<tr><td colspan="3"><input type="submit" class="btn btn-primary"  value="Simpan" name="submit"></td></tr>
			</table>
			 </div>
		</form>
	
	 </div>
	
	
	 </body> 
	 

</html> 
