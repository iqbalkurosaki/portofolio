<html>
	<head>
	
	<?php
		
		$user=$_SESSION['FULLNAME'];
	?>
	<title>Angket</title> 
	</head> 
	<body>
	
		<h3 class="nama_web">Angket Pelacakan Alumni</h3><hr/>
		
	<div class="table-responsive">
		<table  class="table table-striped table-hover table-condensed">
		<tr>
		
		<td>
		<?php
		
		$cek = $db->Execute("select * from kuisioner_a where id_kuisA = '".$user."'");
		
					if($cek->fields){
					echo "<div class='alert alert-success' role='alert'>A) KARAKTERISTIK SOSIO-BIOGRAFI, PENDIDIKAN DAN PENGALAMAN BELAJAR di SMK</div>";
					}else{
					echo "<a href ='menu_alumni.php?a=kuisioner_A'><div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-pencil' style='font-size:15px; '> A) KARAKTERISTIK SOSIO-BIOGRAFI, PENDIDIKAN DAN PENGALAMAN BELAJAR di SMK</span></div></a>";
					}
		?>
		</td>
		</tr>
		<tr>
		
		<td>
		<?php
		
		$cek = $db->Execute("select * from kuisioner_b where id_kuisB = '".$user."'");

		
					if($cek->fields){
					echo "<div class='alert alert-success' role='alert'>B) KEGIATAN PENDIDIKAN </div>";
					}else{
					echo "<a href ='menu_alumni.php?a=kuisioner_B'> <div class='alert alert-danger' role='alert'> <span class='glyphicon glyphicon-pencil' style='font-size:15px; '> B) KEGIATAN PENDIDIKAN </span></div></a>";
					}
		?>
		</td>
		</tr>
		<tr>
		
		<td>
		<?php
		
		$cek = $db->Execute("select * from kuisioner_c where id_kuisC = '".$user."'");

		
					if($cek->fields){
					echo "<div class='alert alert-success' role='alert'>C) PENCARIAN KERJA DAN TRANSISI KE DUNIA KERJA</div>";
					}else{
					echo "<a href ='menu_alumni.php?a=kuisioner_C'><div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-pencil' style='font-size:15px; '> C) PENCARIAN KERJA DAN TRANSISI KE DUNIA KERJA</span></div></a>";
					}
		?>
		</td>
		</tr>
		<tr>
		
		<td>
		<?php
		$cek = $db->Execute("select * from kuisioner_d where id_kuisD = '".$user."'");

		
					if($cek->fields){
					echo "<div class='alert alert-success' role='alert'>D) PEKERJAAN</div>";
					}else{
					echo " <a href ='menu_alumni.php?a=kuisioner_D'> <div class='alert alert-danger' role='alert'> <span class='glyphicon glyphicon-pencil' style='font-size:15px; '> D) PEKERJAAN</span></div></a>";
					}
		?>
		</td>
		</tr>
		<tr>
		
		<td>
		<?php
		$cek = $db->Execute("select * from kuisioner_e where id_kuisE = '".$user."'");

		
					if($cek->fields){
					echo "<div class='alert alert-success' role='alert'>E) PEKERJAAN DAN KOMPETENSI, HUBUNGAN ANTARA STUDI DENGAN KERJA</div>";
					}else{
					echo "<a href ='menu_alumni.php?a=kuisioner_E'><div class='alert alert-danger' role='alert'>  <span class='glyphicon glyphicon-pencil' style='font-size:15px; '> E) PEKERJAAN DAN KOMPETENSI, HUBUNGAN ANTARA STUDI DENGAN KERJA</span></div></a>";
					}
		?>
		</td>
		</tr>
		<tr><td colspan="2"><font size="2"><br>* Angket bisa diisi secara bertahap tidak harus sekaligus dari poin A sampai E. <br>
		<a href="http://goo.gl/forms/0dgSpRXVDg" target="_blank">* Untuk keperluan penelitian silahkan isi juga Instrumen Validasi Usabilitas Sistem Informasi Tracer Study SMKN 1 Pasuruan. (klik)</a></font></td></tr>
		<tr><td>
		<h3 class="nama_web">Laporan Pelacakan Alumni</h3><hr/>
		</td></tr>
		<tr><td colspan="2">
		<a href ="menu_alumni.php?a=lap_kuisioner_A"><div class='alert alert-info' role='alert'>   <span class='glyphicon glyphicon-file' style='font-size:15px; color:#032C88'></span>A) KARAKTERISTIK SOSIO-BIOGRAFI, PENDIDIKAN DAN PENGALAMAN BELAJAR di SMK </div></a>
		</td></tr>
		<tr><td colspan="2">
		<a href ="menu_alumni.php?a=lap_kuisioner_B"> <div class='alert alert-info' role='alert'>  <span class='glyphicon glyphicon-file' style='font-size:15px; color:#032C88'></span>B) KEGIATAN PENDIDIKAN </div></a>
		</td></tr>
		<tr><td colspan="2">
		<a href ="menu_alumni.php?a=lap_kuisioner_C"> <div class='alert alert-info' role='alert'> <span class='glyphicon glyphicon-file' style='font-size:15px; color:#032C88'></span>C) PENCARIAN KERJA DAN TRANSISI KE DUNIA KERJA  </div></a>
		</td></tr>
		<tr><td colspan="2">
		<a href ="menu_alumni.php?a=lap_kuisioner_D"> <div class='alert alert-info' role='alert'>  <span class='glyphicon glyphicon-file' style='font-size:15px; color:#032C88'></span>D) PEKERJAAN  </div></a>
		</td></tr>
		<tr><td colspan="2">
		<a href ="menu_alumni.php?a=lap_kuisioner_E"> <div class='alert alert-info' role='alert'>  <span class='glyphicon glyphicon-file' style='font-size:15px; color:#032C88'></span>E) PEKERJAAN DAN KOMPETENSI, HUBUNGAN ANTARA STUDI DENGAN KERJA  </div></a>
		</td></tr>
		</table>
		
	 </div>
	 </body> 
</html> 
	