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
			/*body{display: none;}*/
			table{
				border-spacing: 0;
				border-collapse: collapse;
			}
			td {
				margin: 0;
				padding: 0;
		 	}
		</style>

	</head>
	<body>        
        <?php
    	if (isset($_POST['array_nis']) && count($_POST['array_nis']) > 0) {
    		require_once '../../config/config.php';
    		$nis_cetak = $_POST['array_nis'][0];
    		if (!is_file("../../img/kts/".$_POST['array_nis'][0].".jpg")) {
	           	?>
	           	<script>
					$(document).ready(function(){
						var array_nis = <?php echo json_encode($nis_cetak); ?>;
						kanvas(array_nis);
					});

					function save_img(data, nis_kirim, array_kanvas){
						$.ajax({
							type : 'post',
							url : 'save_kts.php',
							data : {data: data, nis: nis_kirim},
							success : function(data){
								if(data != "success"){
									alert('something wrong');
								} else {
									form_kirim_ulang.submit();
								}
							}
						});
					}

					
					function kanvas(array_kanvas){	
						var nis_kirim = array_kanvas;
						var id_canvas = "#canvas_"+nis_kirim;
						div_content = document.querySelector(id_canvas);
						//make it as html5 canvas
						html2canvas(div_content, { 
							dpi: 100
						}).then(function(canvas) {
							//change the canvas to jpeg image
							var data = canvas.toDataURL('image/png');
							//then call a super hero php to save the image
							save_img(data, nis_kirim);
						});
					}
				</script>
	           	<?php
	           		if (!is_file('../../img/qr/'.$nis_cetak.'.png')) {

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
						$qrCode->writeFile('../../img/qr/'.$nis_cetak.'.png');
	            	};

		            $sql = "SELECT * FROM t_santri WHERE nis = '".$nis_cetak."'";
		            $result=$db->execute($sql);
					$nis= $result->fields["nis"];
					$nama = $result->fields["nama"];
					$ttl = $result->fields["tempat_lahir"].", ".date("d-m-Y", strtotime($result->fields["tgl_lahir"]));
					$alamat = $result->fields["alamat"];
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
					<div id="canvas_<?php echo $nis; ?>" style='justify-content:center;display: flex;margin: 2px;padding-top:65mm;height: 180mm; width: 270mm; font-size: 20px; background-color: white;background-image: url("../../img/bg_kts/depan.png");background-size: cover;'>
						<div style="margin-left: 19mm">
							<img src="../../img/bg_kts/user.jpg" style="height: 77mm;width: 53mm;">
							<img src="../../img/qr/<?php echo $nis?>.png" style="margin-top:3mm;margin-left:11mm;max-height: 30mm; max-width: 100%">
						</div>
						<div style="margin-right: 5mm;font-size: 20pt;font-family: Futura Md BT; font-weight: bold;"> 
							<table cellpadding='0' cellspacing="0" style="width: 184mm;border-collapse: collapse;">
								<tbody>
									<tr >
										<td class="namadata" valign="top" width="32%">Nomor Induk</td>
										<td align="center" valign="top" width="5%">:</td>
										<td class="data" valign="top"><?php echo $nis ?></td>
									</tr>
									<tr >
										<td class="namadata" valign="top">Nama</td>
										<td align="center" valign="top">:</td>
										<td class="data" valign="top"><?php echo $nama; ?></td>
									</tr>
									<tr >
										<td class="namadata" valign="top">TTL</td>
										<td align="center" valign="top">:</td>
										<td class="data" valign="top"><?php echo $ttl; ?></td>
									</tr>
									<tr >
										<td class="namadata" valign="top" height="">Alamat</td>
										<td align="center" valign="top">:</td>
										<td class="data" valign="top" style="height:20mm;font-size: 1.3vw"><?php echo $alamat.', '.$nama_kota.'. '.$nama_provinsi; ?></td>
									</tr>
									<tr >
										<td class="namadata" valign="top">Bilik/Kamar</td>
										<td align="center" valign="top">:</td>
										<td class="data" valign="top"><?php echo $komplek;?></td>
									</tr>
									<tr>
										<td class="namadata" valign="top">Tanggal Masuk</td>
										<td align="center" valign="top">:</td>
										<td class="data" valign="top"><?php echo date("d-m-Y", strtotime($tgl_masuk)); ?></td>
									</tr>
								</tbody>
							</table> 
						</div>
					</div> 
				<?php 
						echo $nis_cetak;
			           	unset($_POST['array_nis'][0]);
			           	$_POST['array_nis'] = array_values($_POST['array_nis']);
				?> 
				<form method="post" id="form_kirim_ulang">
					<?php 
						foreach ($_POST['array_nis'] as $val) {
				         	?>
				         	<input type="text" name="array_nis[]" value="<?php echo $val ?>">
				         	<?php
				         }
					 ?><br>
					 <input type="submit" name="kirim" value="kirim_ulang" class="btn btn-primary" style="padding: 20px;margin: 20px;width: 100%">
				</form>
			<?php 
			} else {
				unset($_POST['array_nis'][0]);
				$_POST['array_nis'] = array_values($_POST['array_nis']);
				?>
				<script type="text/javascript">
					$(document).ready(function(){
						form_kirim_ulang.submit();
					})
				</script> 
				<form method="post" id="form_kirim_ulang">
					<?php 
						foreach ($_POST['array_nis'] as $val) {
				         	?>
				         	<input type="text" name="array_nis[]" value="<?php echo $val ?>">
				         	<?php
				         }
					 ?><br>
					 <input type="submit" name="kirim" value="kirim_ulang" class="btn btn-primary" style="padding: 20px;margin: 20px;width: 100%">
				</form>
<?php
			}
		} else {
			echo "Tidak ada santri yang dipilih untuk mencetak kartu.<br>";
			echo "<meta http-equiv='refresh' content='3; url=close.php'>";
		};
?>
	 </body> 
</html> 