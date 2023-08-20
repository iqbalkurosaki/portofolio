<?php
error_reporting(0);

?>
<html>
	<head>
	  <!-- Le styles -->
  <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/kuisioner.js"></script>
	<script src="../js/custom.js"></script>
		<?php 
			require_once '../config/config.php';
			if(($_POST['submit']=="Selesai")){
					$user=$_SESSION['FULLNAME'];
					
					$E4_1=$_POST["E4_1"];
					$E4_2=$_POST["E4_2"];
					$E4_3=$_POST["E4_3"];
					$E4_4=$_POST["E4_4"];
					$E4_5=$_POST["E4_5"];
					$E4_6=$_POST["E4_6"];
					$E5_1=$_POST["E5_1"];
					$E5_2=$_POST["E5_2"];
					$E5_3=$_POST["E5_3"];
					$E5_4=$_POST["E5_4"];
					$E5_5=$_POST["E5_5"];
					$E5_6=$_POST["E5_6"];
					$E5_7=$_POST["E5_7"];
					$E5_8=$_POST["E5_8"];
					$E5_9=$_POST["E5_9"];
					$E5_10=$_POST["E5_10"];
					$E5_11=$_POST["E5_11"];
					$E5_12=$_POST["E5_12"];
					$E5_13=$_POST["E5_13"];
					$E5_14=$_POST["E5_14"];
					$E5_15=$_POST["E5_15"];
					$E5_16=$_POST["E5_16"];
					$E5_17=$_POST["E5_17"];
					$E5_18=$_POST["E5_18"];
					$E5_19=$_POST["E5_19"];
					$E5_20=$_POST["E5_20"];
					$E5_21=$_POST["E5_21"];
					$E5_22=$_POST["E5_22"];
					$E5_23=$_POST["E5_23"];
					$E5_24=$_POST["E5_24"];
					$E5_25=$_POST["E5_25"];
					$E6=$_POST["E6"];
					$E7=$_POST["E7"];
					$E8_1=$_POST["E8_1"];
					$E8_2=$_POST["E8_2"];
					$E8_3=$_POST["E8_3"];
					$E8_4=$_POST["E8_4"];
					$E8_5=$_POST["E8_5"];
					$E8_6=$_POST["E8_6"];
					$E8_7=$_POST["E8_7"];
					$E8_8=$_POST["E8_8"];
					$E8_9=$_POST["E8_9"];
					$E8_10=$_POST["E8_10"];
					$E8_11=$_POST["E8_11"];
					$E8_12=$_POST["E8_12"];
					
					$E813= $_POST["E8_13"]?$_POST["E8_13"]:$_POST["E8_lainnya"];
					$E8_13=code($E813);
					$sql="INSERT INTO kuisioner_e(id_kuisE,E4_1,E4_2,E4_3,E4_4,E4_5,E4_6,E5_1,E5_2,E5_3,E5_4,E5_5,E5_6,E5_7,E5_8,E5_9,E5_10,E5_11,E5_12,E5_13,E5_14,E5_15,E5_16,E5_17,E5_18,E5_19,E5_20,E5_21,E5_22,E5_23,E5_24,E5_25,E6,E7,E8_1,E8_2,E8_3,E8_4,E8_5,E8_6,E8_7,E8_8,E8_9,E8_10,E8_11,E8_12,E8_13)
							VALUES('".$user."','".$E4_1."','".$E4_2."','".$E4_3."','".$E4_4."','".$E4_5."','".$E4_6."','".$E5_1."','".$E5_2."','".$E5_3."','".$E5_4."','".$E5_5."','".$E5_6."','".$E5_7."','".$E5_8."','".$E5_9."','".$E5_10."','".$E5_11."','".$E5_12."','".$E5_13."','".$E5_14."','".$E5_15."','".$E5_16."','".$E5_17."','".$E5_18."','".$E5_19."','".$E5_20."','".$E5_21."','".$E5_22."','".$E5_23."','".$E5_24."','".$E5_25."','".$E6."','".$E7."','".$E8_1."','".$E8_2."','".$E8_3."','".$E8_4."','".$E8_5."','".$E8_6."','".$E8_7."','".$E8_8."','".$E8_9."','".$E8_10."','".$E8_11."','".$E8_12."','".$E8_13."')";
					
					$result=$db->Execute($sql);
					if($result){
						echo "<div class='alert alert-success' role='alert'>Selamat ! terimkasih telah mengisi kuisioner E<a href='menu_alumni.php?a=kuisioner'> kembali</a></div>";
						
					}else{
						echo "<div class='alert alert-warning' role='alert'>Gagal Menambah<br/></div>";
						 print "<div class='alert alert-warning' role='alert'>error inserting: ".$db->ErrorMsg()."</div>";
					}
					}
		?>
	<body>
	<div>
		
		  <!-- Le styles -->
		<form class="form-inline" role="form"  id="login" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
		
		<div class="table-responsive">
			<table  class="table table-striped">
			<tr class="success">
				<td><h4>E</h4></td>
				<td><h4>PEKERJAAN DAN KOMPETENSI, HUBUNGAN ANTARA STUDI DENGAN KERJA</h4></td>
			</tr>
			
		</table>
			<table  class="table table-striped">
			<tr>
				<td><b>E1</td>
				<td colspan="6"><b>Sejauh mana program keahlian anda bermanfaat untuk hal-hal di bawah ini?</b></td>
			</tr>
			<tr align="center"><td></td><td><font size="2">Sangat besar</font></td><td><font size="2">Besar</font></td><td><font size="2">Cukup</font></td><td><font size="2">Kurang</font></td><td><font size="2">Tidak sama sekali<font size="1"></td><td></td></tr>
			<tr align="center"><td></td>
			<td><input type="radio"  name="E4_1" value="Sangat besar" <?php if( isset($_POST['E4_1']) && $_POST['E4_1'] == 'Sangat besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E4_1" value="Besar" <?php if( isset($_POST['E4_1']) && $_POST['E4_1'] == 'Besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E4_1" value="Cukup" <?php if( isset($_POST['E4_1']) && $_POST['E4_1'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E4_1" value="Kurang" <?php if( isset($_POST['E4_1']) && $_POST['E4_1'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E4_1" value="Tidak sama sekali" <?php if( isset($_POST['E4_1']) && $_POST['E4_1'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td align="left">Memulai pekerjaan?</td></tr>
			<tr align="center">
			<td></td>
			<td><input type="radio"  name="E4_2" value="Sangat besar" <?php if( isset($_POST['E4_2']) && $_POST['E4_2'] == 'Sangat besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E4_2" value="Besar" <?php if( isset($_POST['E4_2']) && $_POST['E4_2'] == 'Besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E4_2" value="Cukup" <?php if( isset($_POST['E4_2']) && $_POST['E4_2'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E4_2" value="Kurang" <?php if( isset($_POST['E4_2']) && $_POST['E4_2'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E4_2" value="Tidak sama sekali" <?php if( isset($_POST['E4_2']) && $_POST['E4_2'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td align="left">Pembelajaran lanjut dalam pekerjaan?</td></tr>
			<tr align="center">
			<td></td>
			<td><input type="radio"  name="E4_3" value="Sangat besar" <?php if( isset($_POST['E4_3']) && $_POST['E4_3'] == 'Sangat besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E4_3" value="Besar" <?php if( isset($_POST['E4_3']) && $_POST['E4_3'] == 'Besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E4_3" value="Cukup" <?php if( isset($_POST['E4_3']) && $_POST['E4_3'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E4_3" value="Kurang" <?php if( isset($_POST['E4_3']) && $_POST['E4_3'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E4_3" value="Tidak sama sekali" <?php if( isset($_POST['E4_3']) && $_POST['E4_3'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td align="left">Kinerja dalam menjalankan tugas?</td></tr>
			<tr align="center">
			<td></td>
			<td><input type="radio"  name="E4_4" value="Sangat besar" <?php if( isset($_POST['E4_4']) && $_POST['E4_4'] == 'Sangat besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E4_4" value="Besar" <?php if( isset($_POST['E4_4']) && $_POST['E4_4'] == 'Besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E4_4" value="Cukup" <?php if( isset($_POST['E4_4']) && $_POST['E4_4'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E4_4" value="Kurang" <?php if( isset($_POST['E4_4']) && $_POST['E4_4'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E4_4" value="Tidak sama sekali" <?php if( isset($_POST['E4_4']) && $_POST['E4_4'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td align="left">Karir di masa depan?</td></tr>
			<tr align="center">
			<td></td>
			<td><input type="radio"  name="E4_5" value="Sangat besar" <?php if( isset($_POST['E4_5']) && $_POST['E4_5'] == 'Sangat besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E4_5" value="Besar" <?php if( isset($_POST['E4_5']) && $_POST['E4_5'] == 'Besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E4_5" value="Cukup" <?php if( isset($_POST['E4_5']) && $_POST['E4_5'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E4_5" value="Kurang" <?php if( isset($_POST['E4_5']) && $_POST['E4_5'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E4_5" value="Tidak sama sekali" <?php if( isset($_POST['E4_5']) && $_POST['E4_5'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td align="left">Pengembangan diri?</td></tr>
			<tr align="center">
			<td></td>
			<td><input type="radio"  name="E4_6" value="Sangat besar" <?php if( isset($_POST['E4_6']) && $_POST['E4_6'] == 'Sangat besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E4_6" value="Besar" <?php if( isset($_POST['E4_6']) && $_POST['E4_6'] == 'Besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E4_6" value="Cukup" <?php if( isset($_POST['E4_6']) && $_POST['E4_6'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E4_6" value="Kurang" <?php if( isset($_POST['E4_6']) && $_POST['E4_6'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E4_6" value="Tidak sama sekali" <?php if( isset($_POST['E4_6']) && $_POST['E4_6'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td align="left">Meningkatkan ketrampilan kewirausahaan?</td></tr>
			<tr></tr>
			<tr>
				<td><b>E2</td>
				<td colspan="6"><b>Seberapa besar peran kompetensi yang diperoleh di sekolah berikut ini dalam melaksanakan pekerjaan anda?</b></td>
			</tr>
			<tr align="center"><td></td><td><font size="2">Sangat besar</font></td><td><font size="2">Besar</font></td><td><font size="2">Cukup</font></td><td><font size="2">Kurang</font></td><td><font size="2">Tidak sama sekali<font size="1"></td><td></td></tr>
			
			<tr align="center">
			<td></td>
			<td><input type="radio"  name="E5_1" value="Sangat besar" <?php if( isset($_POST['E5_1']) && $_POST['E5_1'] == 'Sangat besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_1" value="Besar" <?php if( isset($_POST['E5_1']) && $_POST['E5_1'] == 'Besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_1" value="Cukup" <?php if( isset($_POST['E5_1']) && $_POST['E5_1'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_1" value="Kurang" <?php if( isset($_POST['E5_1']) && $_POST['E5_1'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_1" value="Tidak sama sekali" <?php if( isset($_POST['E5_1']) && $_POST['E5_1'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td align="left">Pengetahuan di bidang atau disiplin ilmu anda</td></tr>
			<tr align="center">
			<td></td>
			<td><input type="radio"  name="E5_2" value="Sangat besar" <?php if( isset($_POST['E5_2']) && $_POST['E5_2'] == 'Sangat besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_2" value="Besar" <?php if( isset($_POST['E5_2']) && $_POST['E5_2'] == 'Besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_2" value="Cukup" <?php if( isset($_POST['E5_2']) && $_POST['E5_2'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_2" value="Kurang" <?php if( isset($_POST['E5_2']) && $_POST['E5_2'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_2" value="Tidak sama sekali" <?php if( isset($_POST['E5_2']) && $_POST['E5_2'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td align="left">Pengetahuan di luar bidang atau disiplin ilmu anda</td></tr>
			<tr align="center">
			<td></td>
			<td><input type="radio"  name="E5_3" value="Sangat besar" <?php if( isset($_POST['E5_3']) && $_POST['E5_3'] == 'Sangat besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_3" value="Besar" <?php if( isset($_POST['E5_3']) && $_POST['E5_3'] == 'Besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_3" value="Cukup" <?php if( isset($_POST['E5_3']) && $_POST['E5_3'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_3" value="Kurang" <?php if( isset($_POST['E5_3']) && $_POST['E5_3'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_3" value="Tidak sama sekali" <?php if( isset($_POST['E5_3']) && $_POST['E5_3'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td align="left">Pengetahuan umum</td></tr>
			<tr align="center">
			<td></td>
			<td><input type="radio"  name="E5_4" value="Sangat besar" <?php if( isset($_POST['E5_4']) && $_POST['E5_4'] == 'Sangat besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_4" value="Besar" <?php if( isset($_POST['E5_4']) && $_POST['E5_4'] == 'Besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_4" value="Cukup" <?php if( isset($_POST['E5_4']) && $_POST['E5_4'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_4" value="Kurang" <?php if( isset($_POST['E5_4']) && $_POST['E5_4'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_4" value="Tidak sama sekali" <?php if( isset($_POST['E5_4']) && $_POST['E5_4'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td align="left">Ketrampilan internet</td></tr>
			<tr align="center">
			<td></td>
			<td><input type="radio"  name="E5_5" value="Sangat besar" <?php if( isset($_POST['E5_5']) && $_POST['E5_5'] == 'Sangat besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_5" value="Besar" <?php if( isset($_POST['E5_5']) && $_POST['E5_5'] == 'Besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_5" value="Cukup" <?php if( isset($_POST['E5_5']) && $_POST['E5_5'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_5" value="Kurang" <?php if( isset($_POST['E5_5']) && $_POST['E5_5'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_5" value="Tidak sama sekali" <?php if( isset($_POST['E5_5']) && $_POST['E5_5'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td align="left">Ketrampilan komputer</td></tr>
			<tr align="center">
			<td></td>
			<td><input type="radio"  name="E5_6" value="Sangat besar" <?php if( isset($_POST['E5_6']) && $_POST['E5_6'] == 'Sangat besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_6" value="Besar" <?php if( isset($_POST['E5_6']) && $_POST['E5_6'] == 'Besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_6" value="Cukup" <?php if( isset($_POST['E5_6']) && $_POST['E5_6'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_6" value="Kurang" <?php if( isset($_POST['E5_6']) && $_POST['E5_6'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_6" value="Tidak sama sekali" <?php if( isset($_POST['E5_6']) && $_POST['E5_6'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td align="left">Kemampuan belajar</td></tr>
			<tr align="center">
			<td></td>
			<td><input type="radio"  name="E5_7" value="Sangat besar" <?php if( isset($_POST['E5_7']) && $_POST['E5_7'] == 'Sangat besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_7" value="Besar" <?php if( isset($_POST['E5_7']) && $_POST['E5_7'] == 'Besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_7" value="Cukup" <?php if( isset($_POST['E5_7']) && $_POST['E5_7'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_7" value="Kurang" <?php if( isset($_POST['E5_7']) && $_POST['E5_7'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_7" value="Tidak sama sekali" <?php if( isset($_POST['E5_7']) && $_POST['E5_7'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td align="left">Kemampuan berkomunikasi</td></tr>
			<tr align="center">
			<td></td>
			<td><input type="radio"  name="E5_8" value="Sangat besar" <?php if( isset($_POST['E5_8']) && $_POST['E5_8'] == 'Sangat besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_8" value="Besar" <?php if( isset($_POST['E5_8']) && $_POST['E5_8'] == 'Besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_8" value="Cukup" <?php if( isset($_POST['E5_8']) && $_POST['E5_8'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_8" value="Kurang" <?php if( isset($_POST['E5_8']) && $_POST['E5_8'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_8" value="Tidak sama sekali" <?php if( isset($_POST['E5_8']) && $_POST['E5_8'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td align="left">Bekerja di bawah tekanan</td></tr>
			<tr align="center">
			<td></td>
			<td><input type="radio"  name="E5_9" value="Sangat besar" <?php if( isset($_POST['E5_9']) && $_POST['E5_9'] == 'Sangat besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_9" value="Besar" <?php if( isset($_POST['E5_9']) && $_POST['E5_9'] == 'Besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_9" value="Cukup" <?php if( isset($_POST['E5_9']) && $_POST['E5_9'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_9" value="Kurang" <?php if( isset($_POST['E5_9']) && $_POST['E5_9'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_9" value="Tidak sama sekali" <?php if( isset($_POST['E5_9']) && $_POST['E5_9'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td align="left">Manajemen waktu</td></tr>
			<tr align="center">
			<td></td>
			<td><input type="radio"  name="E5_10" value="Sangat besar" <?php if( isset($_POST['E5_10']) && $_POST['E5_10'] == 'Sangat besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_10" value="Besar" <?php if( isset($_POST['E5_10']) && $_POST['E5_10'] == 'Besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_10" value="Cukup" <?php if( isset($_POST['E5_10']) && $_POST['E5_10'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_10" value="Kurang" <?php if( isset($_POST['E5_10']) && $_POST['E5_10'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_10" value="Tidak sama sekali" <?php if( isset($_POST['E5_10']) && $_POST['E5_10'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td align="left">Bekerja secara mandiri</td></tr>
			<tr align="center">
			<td></td>
			<td><input type="radio"  name="E5_11" value="Sangat besar" <?php if( isset($_POST['E5_11']) && $_POST['E5_11'] == 'Sangat besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_11" value="Besar" <?php if( isset($_POST['E5_11']) && $_POST['E5_11'] == 'Besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_11" value="Cukup" <?php if( isset($_POST['E5_11']) && $_POST['E5_11'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_11" value="Kurang" <?php if( isset($_POST['E5_11']) && $_POST['E5_11'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_11" value="Tidak sama sekali" <?php if( isset($_POST['E5_11']) && $_POST['E5_11'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td align="left">Bekerja dalam tim/bekerjasama dengan orang lain</td></tr>
			<tr align="center">
			<td></td>
			<td><input type="radio"  name="E5_12" value="Sangat besar" <?php if( isset($_POST['E5_12']) && $_POST['E5_12'] == 'Sangat besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_12" value="Besar" <?php if( isset($_POST['E5_12']) && $_POST['E5_12'] == 'Besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_12" value="Cukup" <?php if( isset($_POST['E5_12']) && $_POST['E5_12'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_12" value="Kurang" <?php if( isset($_POST['E5_12']) && $_POST['E5_12'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_12" value="Tidak sama sekali" <?php if( isset($_POST['E5_12']) && $_POST['E5_12'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td align="left">Kemampuan dalam memecahkan masalah</td></tr>
			<tr align="center">
			<td></td>
			<td><input type="radio"  name="E5_13" value="Sangat besar" <?php if( isset($_POST['E5_13']) && $_POST['E5_13'] == 'Sangat besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_13" value="Besar" <?php if( isset($_POST['E5_13']) && $_POST['E5_13'] == 'Besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_13" value="Cukup" <?php if( isset($_POST['E5_13']) && $_POST['E5_13'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_13" value="Kurang" <?php if( isset($_POST['E5_13']) && $_POST['E5_13'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_13" value="Tidak sama sekali" <?php if( isset($_POST['E5_13']) && $_POST['E5_13'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td align="left">Negosiasi</td></tr>
			<tr align="center">
			<td></td>
			<td><input type="radio"  name="E5_14" value="Sangat besar" <?php if( isset($_POST['E5_14']) && $_POST['E5_14'] == 'Sangat besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_14" value="Besar" <?php if( isset($_POST['E5_14']) && $_POST['E5_14'] == 'Besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_14" value="Cukup" <?php if( isset($_POST['E5_14']) && $_POST['E5_14'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_14" value="Kurang" <?php if( isset($_POST['E5_14']) && $_POST['E5_14'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_14" value="Tidak sama sekali" <?php if( isset($_POST['E5_14']) && $_POST['E5_14'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td align="left">Kemampuan analisis</td></tr>
			<tr align="center">
			<td></td>
			<td><input type="radio"  name="E5_15" value="Sangat besar" <?php if( isset($_POST['E5_15']) && $_POST['E5_15'] == 'Sangat besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_15" value="Besar" <?php if( isset($_POST['E5_15']) && $_POST['E5_15'] == 'Besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_15" value="Cukup" <?php if( isset($_POST['E5_15']) && $_POST['E5_15'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_15" value="Kurang" <?php if( isset($_POST['E5_15']) && $_POST['E5_15'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_15" value="Tidak sama sekali" <?php if( isset($_POST['E5_15']) && $_POST['E5_15'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td align="left">Toleransi</td></tr>
			<tr align="center">
			<td></td>
			<td><input type="radio"  name="E5_16" value="Sangat besar" <?php if( isset($_POST['E5_16']) && $_POST['E5_16'] == 'Sangat besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_16" value="Besar" <?php if( isset($_POST['E5_16']) && $_POST['E5_16'] == 'Besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_16" value="Cukup" <?php if( isset($_POST['E5_16']) && $_POST['E5_16'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_16" value="Kurang" <?php if( isset($_POST['E5_16']) && $_POST['E5_16'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_16" value="Tidak sama sekali" <?php if( isset($_POST['E5_16']) && $_POST['E5_16'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td align="left">Kemampuan adaptasi</td></tr>
			<tr align="center">
			<td></td>
			<td><input type="radio"  name="E5_17" value="Sangat besar" <?php if( isset($_POST['E5_17']) && $_POST['E5_17'] == 'Sangat besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_17" value="Besar" <?php if( isset($_POST['E5_17']) && $_POST['E5_17'] == 'Besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_17" value="Cukup" <?php if( isset($_POST['E5_17']) && $_POST['E5_17'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_17" value="Kurang" <?php if( isset($_POST['E5_17']) && $_POST['E5_17'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_17" value="Tidak sama sekali" <?php if( isset($_POST['E5_17']) && $_POST['E5_17'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td align="left">Loyalitas dan integritas</td></tr>
			<tr align="center">
			<td></td>
			<td><input type="radio"  name="E5_18" value="Sangat besar" <?php if( isset($_POST['E5_18']) && $_POST['E5_18'] == 'Sangat besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_18" value="Besar" <?php if( isset($_POST['E5_18']) && $_POST['E5_18'] == 'Besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_18" value="Cukup" <?php if( isset($_POST['E5_18']) && $_POST['E5_18'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_18" value="Kurang" <?php if( isset($_POST['E5_18']) && $_POST['E5_18'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_18" value="Tidak sama sekali" <?php if( isset($_POST['E5_18']) && $_POST['E5_18'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td align="left">Bekerja dengan orang yang berbeda budaya maupun latar belakang</td></tr>
			<tr align="center">
			<td></td>
			<td><input type="radio"  name="E5_19" value="Sangat besar" <?php if( isset($_POST['E5_19']) && $_POST['E5_19'] == 'Sangat besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_19" value="Besar" <?php if( isset($_POST['E5_19']) && $_POST['E5_19'] == 'Besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_19" value="Cukup" <?php if( isset($_POST['E5_19']) && $_POST['E5_19'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_19" value="Kurang" <?php if( isset($_POST['E5_19']) && $_POST['E5_19'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_19" value="Tidak sama sekali" <?php if( isset($_POST['E5_19']) && $_POST['E5_19'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td align="left">Kepemimpinan</td></tr>
			<tr align="center">
			<td></td>
			<td><input type="radio"  name="E5_20" value="Sangat besar" <?php if( isset($_POST['E5_20']) && $_POST['E5_20'] == 'Sangat besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_20" value="Besar" <?php if( isset($_POST['E5_20']) && $_POST['E5_20'] == 'Besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_20" value="Cukup" <?php if( isset($_POST['E5_20']) && $_POST['E5_20'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_20" value="Kurang" <?php if( isset($_POST['E5_20']) && $_POST['E5_20'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_20" value="Tidak sama sekali" <?php if( isset($_POST['E5_20']) && $_POST['E5_20'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td align="left">Kemampuan dalam memegang tanggungjawab</td></tr>
			<tr align="center">
			<td></td>
			<td><input type="radio"  name="E5_21" value="Sangat besar" <?php if( isset($_POST['E5_21']) && $_POST['E5_21'] == 'Sangat besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_21" value="Besar" <?php if( isset($_POST['E5_21']) && $_POST['E5_21'] == 'Besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_21" value="Cukup" <?php if( isset($_POST['E5_21']) && $_POST['E5_21'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_21" value="Kurang" <?php if( isset($_POST['E5_21']) && $_POST['E5_21'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_21" value="Tidak sama sekali" <?php if( isset($_POST['E5_21']) && $_POST['E5_21'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td align="left">Inisiatif</td></tr>
			<tr align="center">
			<td></td>
			<td><input type="radio"  name="E5_22" value="Sangat besar" <?php if( isset($_POST['E5_22']) && $_POST['E5_22'] == 'Sangat besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_22" value="Besar" <?php if( isset($_POST['E5_22']) && $_POST['E5_22'] == 'Besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_22" value="Cukup" <?php if( isset($_POST['E5_22']) && $_POST['E5_22'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_22" value="Kurang" <?php if( isset($_POST['E5_22']) && $_POST['E5_22'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_22" value="Tidak sama sekali" <?php if( isset($_POST['E5_22']) && $_POST['E5_22'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td align="left">Manajemen proyek/program</td></tr>
			<tr align="center">
			<td></td>
			<td><input type="radio"  name="E5_23" value="Sangat besar" <?php if( isset($_POST['E5_23']) && $_POST['E5_23'] == 'Sangat besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_23" value="Besar" <?php if( isset($_POST['E5_23']) && $_POST['E5_23'] == 'Besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_23" value="Cukup" <?php if( isset($_POST['E5_23']) && $_POST['E5_23'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_23" value="Kurang" <?php if( isset($_POST['E5_23']) && $_POST['E5_23'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_23" value="Tidak sama sekali" <?php if( isset($_POST['E5_23']) && $_POST['E5_23'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td align="left">Kemampuan untuk memresentasikan ide/produk/laporan</td></tr>
			<tr align="center">
			<td></td>
			<td><input type="radio"  name="E5_24" value="Sangat besar" <?php if( isset($_POST['E5_24']) && $_POST['E5_24'] == 'Sangat besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_24" value="Besar" <?php if( isset($_POST['E5_24']) && $_POST['E5_24'] == 'Besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_24" value="Cukup" <?php if( isset($_POST['E5_24']) && $_POST['E5_24'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_24" value="Kurang" <?php if( isset($_POST['E5_24']) && $_POST['E5_24'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_24" value="Tidak sama sekali" <?php if( isset($_POST['E5_24']) && $_POST['E5_24'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td align="left">Kemampuan dalam menulis laporan, memo dan dokumen</td></tr>
			<tr align="center">
			<td></td>
			<td><input type="radio"  name="E5_25" value="Sangat besar" <?php if( isset($_POST['E5_25']) && $_POST['E5_25'] == 'Sangat besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_25" value="Besar" <?php if( isset($_POST['E5_25']) && $_POST['E5_25'] == 'Besar' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_25" value="Cukup" <?php if( isset($_POST['E5_25']) && $_POST['E5_25'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_25" value="Kurang" <?php if( isset($_POST['E5_25']) && $_POST['E5_25'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E5_25" value="Tidak sama sekali" <?php if( isset($_POST['E5_25']) && $_POST['E5_25'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td align="left">Kemampuan untuk terus belajar sepanjang hayat</td></tr>
			
			<tr>
				<td><b>E3</td>
				<td colspan="6"><b>Seberapa erat hubungan antara bidang studi dengan pekerjaan anda?</b></td>
			</tr>
			<tr align="center"><td></td><td><font size="2">Sangat erat</font></td><td><font size="2">Erat</font></td><td><font size="2">Cukup</font></td><td><font size="2">Kurang</font></td><td><font size="2">Tidak sama sekali<font size="1"></td><td></td></tr>
			<tr align="center">
			<td></td>
			<td><input type="radio"  name="E6" value="Sangat erat" <?php if( isset($_POST['E6']) && $_POST['E6'] == 'Sangat erat' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E6" value="Erat" <?php if( isset($_POST['E6']) && $_POST['E6'] == 'Erat' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E6" value="Cukup" <?php if( isset($_POST['E6']) && $_POST['E6'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E6" value="Kurang" <?php if( isset($_POST['E6']) && $_POST['E6'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="E6" value="Tidak sama sekali" <?php if( isset($_POST['E6']) && $_POST['E6'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td align="left">Hubungan bidang studi dengan pekerjaan</td></tr>
			</table>
			<table class="table table-striped">
			<tr>
				<td width="60"><b>E4</td>
				<td colspan="6"><b>Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan anda saat ini?</b></td>
			</tr>
			<tr>
			<td></td>
			<td width="30" colspan="6"><div class="radio"><label><input type="radio"  name="E7" value="Setingkat lebih tinggi" <?php if( isset($_POST['E7']) && $_POST['E7'] == 'Setingkat lebih tinggi' ){ echo "checked='checked'"; }?> />Setingkat lebih tinggi</label></div></td>
			</tr>
			<tr>
			<td></td>
			<td width="30" colspan="6"><div class="radio"><label><input type="radio"  name="E7" value="Tingkat yang sama" <?php if( isset($_POST['E7']) && $_POST['E7'] == 'Tingkat yang sama' ){ echo "checked='checked'"; }?> />Tingkat yang sama</label></div></td>
			</tr>
			<tr>
			<td></td>
			<td width="30" colspan="6"><div class="radio"><label><input type="radio"  name="E7" value="Setingkat lebih rendah" <?php if( isset($_POST['E7']) && $_POST['E7'] == 'Setingkat lebih rendah' ){ echo "checked='checked'"; }?> />Setingkat lebih rendah</label></div></td>
			</tr>	
			<tr>
			<td></td>
			<td width="30" colspan="6"><div class="radio"><label><input type="radio"  name="E7" value="Tidak perlu pendidikan tinggi" <?php if( isset($_POST['E7']) && $_POST['E7'] == 'Tidak perlu pendidikan tinggi' ){ echo "checked='checked'"; }?> />Tidak perlu pendidikan tinggi</label></div></td>
			</tr>	
			</table>
			<table class="table table-striped">
			<tr></tr>
			<tr>
				<td><b>E5</td>
				<td colspan="6"><b>Jika menurut anda pekerjaan anda saat ini tidak sesuai dengan pendidikan anda, mengapa anda mengambilnya?</b><i><font size="2">Jawaban bisa lebih dari satu</b></td>
			</tr>
			<tr><td></td><td width="30" colspan="8"><div class="checkbox"><label><input type="checkbox" name="E8_1" value="Pertanyaan tidak sesuai; pekerjaan saya sekarang sudah sesuai dengan pendidikan saya."/>Pertanyaan tidak sesuai; pekerjaan saya sekarang sudah sesuai dengan pendidikan saya.</label></div></td></tr>
			<tr><td></td><td width="30" colspan="8"><div class="checkbox"><label><input type="checkbox" name="E8_2" value="Saya belum mendapatkan pekerjaan yang lebih sesuai."/>Saya belum mendapatkan pekerjaan yang lebih sesuai.</label></div></td></tr>
			<tr><td></td><td width="30" colspan="8"><div class="checkbox"><label><input type="checkbox" name="E8_3" value="Di pekerjaan ini saya memeroleh prospek karir yang baik."/>Di pekerjaan ini saya memeroleh prospek karir yang baik.</label></div></td></tr>
			<tr><td></td><td width="30" colspan="8"><div class="checkbox"><label><input type="checkbox" name="E8_4" value="Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan pendidikan saya"/>Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan pendidikan saya</label></div></td></tr>
			<tr><td></td><td width="30" colspan="8"><div class="checkbox"><label><input type="checkbox" name="E8_5" value="Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya."/>Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya.</label></div></td></tr>
			<tr><td></td><td width="30" colspan="8"><div class="checkbox"><label><input type="checkbox" name="E8_6" value="Saya dapat memeroleh pendapatn yang lebih tinggi di pekerjaan ini."/>Saya dapat memeroleh pendapatn yang lebih tinggi di pekerjaan ini.</label></div></td></tr>
			<tr><td></td><td width="30" colspan="8"><div class="checkbox"><label><input type="checkbox" name="E8_7" value="Pekerjaan saya saat ini lebih aman/terjamin/secure"/>Pekerjaan saya saat ini lebih aman/terjamin/secure</label></div></td></tr>
			<tr><td></td><td width="30" colspan="8"><div class="checkbox"><label><input type="checkbox" name="E8_8" value="Pekerjaan saya saat ini lebih menarik"/>Pekerjaan saya saat ini lebih menarik</label></div></td></tr>
			<tr><td></td><td width="30" colspan="8"><div class="checkbox"><label><input type="checkbox" name="E8_9" value="Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal yang fleksibel, dll."/>Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal yang fleksibel, dll.</label></div></td></tr>
			<tr><td></td><td width="30" colspan="8"><div class="checkbox"><label><input type="checkbox" name="E8_10" value="Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya."/>Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya.</label></div></td></tr>
			<tr><td></td><td width="30" colspan="8"><div class="checkbox"><label><input type="checkbox" name="E8_11" value="Pekerjaan saya saat ini dapat lebih menjamin kebutuhan keluarga saya."/>Pekerjaan saya saat ini dapat lebih menjamin kebutuhan keluarga saya.</label></div></td></tr>
			<tr><td></td><td width="30" colspan="8"><div class="checkbox"><label><input type="checkbox" name="E8_12" value="Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan saya."/>Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan saya.</label></div></td></tr>
			<tr><td></td><td width="30" colspan="8"><div class="checkbox"><label><input type="checkbox" name="E8_13" id="E8_13" value="0"/>Lainnya : </label><input type="text" id="E8_lainnya" name="E8_lainnya" disabled="true" value="<?php	echo isset ($_POST['E8_13']) ? $_POST['E8_13'] : '';?>" placeholder="Mohon tuliskan"/></td></tr>
			
		</table>
			
		<input type="submit" value="Selesai" name="submit" /><br><br>
		
		<table>
		
		</table>
			
	</div>	
</form>
	 </div>
	 
	 
	 </div>
	 </body> 
</html> 