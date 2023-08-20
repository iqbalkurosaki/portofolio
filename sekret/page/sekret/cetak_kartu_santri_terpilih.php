<?php
if (!session_id()) {
	session_start();
}

require_once "../../library/qr-code-master/vendor/autoload.php";
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cetak Kartu Santri</title>

	    <link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css" />
	    <link rel="stylesheet" type="text/css" href="../../font-awesome/css/font-awesome.min.css" />
	    <!-- <link rel="stylesheet" type="text/css" href="../../css/local.css" /> -->

	    <script type="text/javascript" src="../../js/jquery-1.10.2.min.js"></script>
	    <script type="text/javascript" src="../../js/jquery-ui.min.js"></script>
	    <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>

	    <script src="../../js/html2canvas.js"></script>

	    <!-- you need to include the shieldui css and js assets in order for the charts to work -->
<!-- 	    <link rel="stylesheet" type="text/css" href="https://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
	    <script type="text/javascript" src="https://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
	    <script type="text/javascript" src="https://www.prepbootstrap.com/Content/js/gridData.js"></script> -->

        <style type="text/css" media="print">
		 	@page { size: landscape;}
		 	body{display: block !important}
		</style>
		<style type="text/css">
			/*body{background-color: black;}*/
			table{
				border-spacing: 0;
				border-collapse: collapse;
			}
			td {
				margin: 0;
				padding: 0;
		 	}
		 	@font-face {
			    font-family: Myriad Pro;
			    src: url(../../css/MyriadPro-Bold.otf);
			}
		</style>

	</head>
	<body>        
        <?php
	if (!isset($_SESSION['cetak_kts'])) {
    	if (isset($_POST['array_nis']) && count($_POST['array_nis']) > 0) {
			$_SESSION['cetak_kts']['array_nis'] = $_POST['array_nis'];
		}
		if (isset($_POST['kts'])) {
			$_SESSION['cetak_kts']['action_kts'] = $_POST['kts'];
		}
	}
    	if (isset($_SESSION['cetak_kts']['array_nis']) && count($_SESSION['cetak_kts']['array_nis']) > 0) {
    		require_once '../../config/config.php';
    		if (isset($_SESSION['cetak_kts']['action_kts'])) {
        		$nis = $_SESSION['cetak_kts']['array_nis'][0];
        		if (strlen($nis) == 13) {
		        	$upload_komplek = substr($nis, 0, 1);
		        	$upload_kamar = substr($nis, 1, 1);

        		} else {
		        	$upload_komplek = substr($nis, 0, 2);
		        	$upload_kamar = substr($nis, 2, 1);
        		}
	        	if ($_SESSION['cetak_kts']['action_kts'] == "update") {
	        		if (is_file("../../img/kts/".$upload_komplek."/".$upload_kamar."/".$nis.".png")) {
	        			unlink("../../img/kts/".$upload_komplek."/".$upload_kamar."/".$nis.".png");
	        		}
	        		if (is_file("../../img/kts_resize/".$upload_komplek."/".$upload_kamar."/".$nis.".png")) {
	        			unlink("../../img/kts_resize/".$upload_komplek."/".$upload_kamar."/".$nis.".png");
	        		}
					if (is_file("../../img/qr/".$upload_komplek."/".$upload_kamar."/".$nis.".png")) {
						unlink("../../img/qr/".$upload_komplek."/".$upload_kamar."/".$nis.".png");
					}
	        	} elseif ($_SESSION['cetak_kts']['action_kts'] == "hapus") {
					$sql2 = "UPDATE t_santri SET kts = 0 WHERE nis = '".$nis."'";
					$result2=$db->Execute($sql2);
	        		if (is_file("../../img/kts/".$upload_komplek."/".$upload_kamar."/".$nis.".png")) {
	        			unlink("../../img/kts/".$upload_komplek."/".$upload_kamar."/".$nis.".png");
	        		}
	        		if (is_file("../../img/kts_resize/".$upload_komplek."/".$upload_kamar."/".$nis.".png")) {
	        			unlink("../../img/kts_resize/".$upload_komplek."/".$upload_kamar."/".$nis.".png");
	        		}
					if (is_file("../../img/qr/".$upload_komplek."/".$upload_kamar."/".$nis.".png")) {
						unlink("../../img/qr/".$upload_komplek."/".$upload_kamar."/".$nis.".png");
					}
	        	}
	        }

    		$nis_cetak = $_SESSION['cetak_kts']['array_nis'][0];
        		if (strlen($nis_cetak) == 13) {
		        	$upload_komplek = substr($nis_cetak, 0, 1);
		        	$upload_kamar = substr($nis_cetak, 1, 1);
		        	
        		} else {
		        	$upload_komplek = substr($nis_cetak, 0, 2);
		        	$upload_kamar = substr($nis_cetak, 2, 1);
        		}
    		if ((!isset($_SESSION['cetak_kts']['action_kts']) || ($_SESSION['cetak_kts']['action_kts'] != "hapus")) && (!is_file("../../img/kts/".$upload_komplek."/".$upload_kamar."/".$_SESSION['cetak_kts']['array_nis'][0].".png"))) {
	           	?>
	           	<script>
					$(document).ready(function(){
						kanvas();
					});

					// function update_periode_kts(nis_kirim) {
					// 	alert("akan update periode"+nis_kirim);
					// 	$.ajax({
					// 		type : 'post',
					// 		url : 'update_periode_kats.php',
					// 		data : {nis: nis_kirim},
					// 		success : function(data){
					// 			alert(data);
					// 		}
					// 	});
					// }

					function save_img(datas, nis_kirim){
						// alert("save image"+nis_kirim);
						$.ajax({
							type : 'post',
							url : 'save_kts.php',
							data : {datas: datas, nis: nis_kirim},
							success : function(data){
								if(data != nis_kirim){
									alert(data);
								} else {
									// alert("mau update periode"+nis_kirim);
									// update_periode_kts(nis_kirim);
									window.location='cetak_kartu_santri_terpilih.php';
								}
							}
						});
					}
					
					function kanvas(){	
						var nis_kirim = <?php echo json_encode($nis_cetak); ?>;
						div_content = document.querySelector('#canvas');
						//make it as html5 canvas
						html2canvas(div_content, { 
							dpi: 200
						}).then(function(canvas) {
							//change the canvas to jpeg image
							var datas = canvas.toDataURL('image/png');
							//then call a super hero php to save the image
							save_img(datas, nis_kirim);
						});
					}
				</script>
	           	<?php
	           		if ((!isset($_SESSION['cetak_kts']['action_kts']) || ($_SESSION['cetak_kts']['action_kts'] != "hapus")) && (!is_file('../../img/qr/'.$upload_komplek."/".$upload_kamar."/".$nis_cetak.'.png'))) {
						// Create a basic QR code
						$qrCode = new QrCode($nis_cetak);
						$qrCode->setSize(300);

						// Set advanced options
						$qrCode->setWriterByName('png');
						$qrCode->setMargin(10);
						// $qrCode->setPadding(2);
						$qrCode->setErrorCorrectionLevel(ErrorCorrectionLevel::HIGH);
						$qrCode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
						$qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
						// $qrCode->setLogoPath('../../img/ppmh.png');
						// $qrCode->setLogoSize(100, 100);
						$qrCode->setRoundBlockSize(true);
						$qrCode->setValidateResult(false);
						$qrCode->setWriterOptions(['exclude_xml_declaration' => true]);

						// Directly output the QR code
						// header('Content-Type: '.$qrCode->getContentType());
						$qrCode->writeString();

						// Save it to a file
						$qrCode->writeFile('../../img/qr/'.$upload_komplek."/".$upload_kamar."/".$nis_cetak.'.png');
	            	}

		            $sql = "SELECT * FROM t_santri WHERE nis = '".$nis_cetak."'";
		            $result=$db->execute($sql);
					$nis= $result->fields["nis"];
					$nama = $result->fields["nama"];
					$ttl = $result->fields["tempat_lahir"].", ".date("d-m-Y", strtotime($result->fields["tgl_lahir"]));
					$alamat = $result->fields["alamat"];
					$kelurahan = $result->fields["kelurahan"];
					$sql6 = "SELECT * FROM kelurahan WHERE id = $kelurahan";
					$result6 = $db->execute($sql6);
					$nama_kelurahan = $result6->fields["kelurahan"];
					$kecamatan = $result->fields["kecamatan"];
					$sql6 = "SELECT * FROM kecamatan WHERE id = $kecamatan";
					$result6 = $db->execute($sql6);
					$nama_kecamatan = $result6->fields["kecamatan"];
					$kota = $result->fields["kota"];
					$sql3 = "SELECT * FROM kota where id=$kota";
	                $result3=$db->execute($sql3);
	                $nama_kota = $result3->fields["kota"];
					$provinsi=$result->fields["provinsi"];
					$sql4 = "SELECT * FROM provinsi where id=$provinsi";
	                $result4=$db->execute($sql4);
	                $nama_provinsi = $result4->fields["provinsi"];

					$tgl_masuk=$result->fields["tgl_masuk"];

					$id_komplek=$result->fields["id_komplek"];
					$sql5 = "SELECT * FROM komplek where id_komplek = ".$id_komplek;
	                $result5=$db->execute($sql5);
	                $komplek = $result5->fields["nama_komplek"];
	?>				
					<div id="canvas" style='display: flex;padding-top:6.129cm;height: 21.592cm; width: 34.24cm; background-color: white;background-image: url("../../img/bg_kts/1.png");background-size: cover;/*border-radius: 65px;*/'>
						<div style="margin-left: 1.11cm;width: 8cm;">
							
						<?php
			        		if (strlen($nis) == 13) {
					        	$upload_komplek = substr($nis, 0, 1);
					        	$upload_kamar = substr($nis, 1, 1);
					        	
			        		} else {
					        	$upload_komplek = substr($nis, 0, 2);
					        	$upload_kamar = substr($nis, 2, 1);
			        		}
							if (is_file("../../foto/".$upload_komplek."/".$upload_kamar."/".$nis.".jpg")) {
							?>
								<img src="../../foto/<?php echo $upload_komplek; ?>/<?php echo $upload_kamar; ?>/<?php echo $nis; ?>.jpg?rand=<?php echo rand(); ?>" style="height: 10cm;width: 8cm;">
							<?php
							} else { ?>
								<img src="../../img/bg_kts/user.jpg" style="height: 10cm;width: 8cm;">
							<?php
							}

						?>
							<img src="../../img/qr/<?php echo $upload_komplek; ?>/<?php echo $upload_kamar; ?>/<?php echo $nis?>.png?rand=<?php echo rand(); ?>" style="margin-top:0.231cm;margin-left:1.5cm;max-height: 5cm; max-width: 100%">
						</div>
						<div style="font-size: 23pt;margin: 0cm 0.969cm;font-family: Myriad Pro; font-weight: bold;flex:1;"> 
							<table cellpadding='0' cellspacing="0" width="100%" style="line-height: 130%;"> <!-- jarak antar baris tulisan di tabel-->
								<tbody>
									<tr >
										<td class="namadata" valign="top" width="29%">NIS</td>
										<td class="colon" align="center" valign="top" width="2%">:</td>
										<td class="data" valign="top"><?php echo strtoupper($nis) ?></td>
									</tr>
									<tr >
										<td class="namadata" valign="top">NAMA</td>
										<td class="colon" align="center" valign="top">:</td>
										<td class="data" valign="top"><?php echo strtoupper($nama); ?></td>
									</tr>
									<tr >
										<td class="namadata" valign="top">TTL</td>
										<td class="colon" align="center" valign="top">:</td>
										<td class="data" valign="top"><?php echo strtoupper($ttl); ?></td>
									</tr>
									<tr >
										<td class="namadata" valign="top">ALAMAT</td>
										<td class="colon" align="center" valign="top">:</td>
										<td class="data" valign="top" style="height:4.6cm;"> <!-- tinggi baris alamat konstan -->
											<?php echo strtoupper($alamat).' '.strtoupper($nama_kelurahan).' KEC. '.strtoupper($nama_kecamatan).'<br>'.strtoupper($nama_kota).'<br>PROVINSI '.strtoupper($nama_provinsi); ?>
										</td>
									</tr>
									<tr >
										<td class="namadata" valign="top">BILIK</td>
										<td class="colon" align="center" valign="top">:</td>
										<td class="data" valign="top"><?php echo strtoupper($komplek);?></td>
									</tr>
									<tr>
										<td class="namadata" valign="top">TANGGAL MASUK</td>
										<td class="colon" align="center" valign="top">:</td>
										<td class="data" valign="top"><?php echo strtoupper(date("d-m-Y", strtotime($tgl_masuk))); ?></td>
									</tr>
								</tbody>
							</table> 
						</div>
					</div> 
				<?php 
						echo $nis_cetak;
			           	unset($_SESSION['cetak_kts']['array_nis'][0]);
			           	$_SESSION['cetak_kts']['array_nis'] = array_values($_SESSION['cetak_kts']['array_nis']);
				?> 
						<!-- <script type="text/javascript">window.location='cetak_kartu_santri_terpilih.php';</script> -->
<!-- 				<form method="post" id="form_kirim_ulang">
					<?php 
						foreach ($_SESSION['cetak_kts']['array_nis'] as $val) {
				         	?>
				         	<input type="text" name="array_nis[]" value="<?php echo $val ?>">
				         	<?php
				         }
					 	if (isset($_SESSION['cetak_kts']['action_kts'])) {
					?>
					 		<input type="hidden" name="kts" value="<?php echo $_SESSION['cetak_kts']['action_kts']; ?>">;
					<?php
					 	}
					 ?>
					 <br>
					 <input type="submit" name="kirim" value="kirim_ulang" class="btn btn-primary" style="padding: 20px;margin: 20px;width: 100%">
				</form> -->
			<?php 
			} else {
				unset($_SESSION['cetak_kts']['array_nis'][0]);
				$_SESSION['cetak_kts']['array_nis'] = array_values($_SESSION['cetak_kts']['array_nis']);
				?>
				<script type="text/javascript">
					$(document).ready(function(){
						window.location='cetak_kartu_santri_terpilih.php';
					})
				</script> 
<!-- 				<form method="post" id="form_kirim_ulang">
					<?php 
						foreach ($_SESSION['cetak_kts']['array_nis'] as $val) {
				         	?>
				         	<input type="text" name="array_nis[]" value="<?php echo $val ?>" style="display: none;">
				         	<?php
				         }
					 	if (isset($_SESSION['cetak_kts']['action_kts'])) {
					?>
					 		<input type="hidden" name="kts" value="<?php echo $_SESSION['cetak_kts']['action_kts']; ?>">;
					<?php
					 	}
					 ?>
					 <br>
					 <input type="submit" name="kirim" value="kirim_ulang" class="btn btn-primary" style="padding: 20px;margin: 20px;width: 100%">
				</form> -->
<?php
			}
		} else {
			unset($_SESSION['cetak_kts']);
			echo "Tidak ada santri yang dipilih untuk mencetak kartu.<br>";
			echo "<meta http-equiv='refresh' content='0; url=close.php'>";
		};
?>
	 </body> 
</html> 