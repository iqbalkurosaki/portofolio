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
			tr {
		 		vertical-align: top;
		 	}
		 	.namadata {
		 		width: 10mm;
		 	}
		 	.data {
		 		width: 52mm;
		 	}
		</style>

	</head>
	<body>         
           	<?php
    	if (isset($_POST['array_nis']) && count($_POST['array_nis']) > 0) {
    		require_once '../../config/config.php';
           	$nis_cetak = $_POST['array_nis'];
            for ($i=0; $i<count($nis_cetak); $i++) {
            	if (!is_file('../../img/qr/'.$nis_cetak[$i].'.png')) {

					// Create a basic QR code
					$qrCode = new QrCode($nis_cetak[$i]);
					$qrCode->setSize(300);

					// Set advanced options
					$qrCode->setWriterByName('png');
					$qrCode->setMargin(10);
					// $qrCode->setPadding(2);
					$qrCode->setErrorCorrectionLevel(ErrorCorrectionLevel::HIGH);
					$qrCode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
					$qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
					$qrCode->setLogoPath('../../img/ppmh.png');
					$qrCode->setLogoSize(100, 100);
					$qrCode->setRoundBlockSize(true);
					$qrCode->setValidateResult(false);
					$qrCode->setWriterOptions(['exclude_xml_declaration' => true]);

					// Directly output the QR code
					// header('Content-Type: '.$qrCode->getContentType());
					$qrCode->writeString();

					// Save it to a file
					$qrCode->writeFile('../../img/qr/'.$nis_cetak[$i].'.png');
            	}
	            $sql = "SELECT * FROM t_santri WHERE nis = '".$nis_cetak[$i]."'";
	            $result=$db->execute($sql);
				$nis= $result->fields["nis"];
				$nama = $result->fields["nama"];

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
				$sql5 = "SELECT * FROM komplek where id_komplek=$id_komplek";
                $result5=$db->execute($sql5);
                $komplek = $result5->fields["nama_komplek"];
?>
					<table id="canvas_<?php echo $nis; ?>" border='0' cellspacing='0' style='display: inline-block; margin: 2px; padding: 10px; border: 1px black solid; height: 60mm; width: 90mm; font-size: 8px; background-color: white;'>
						<thead>
							<tr class='success' style='; vertical-align: middle;'>
								<th colspan='4' style='text-align:center;' width='400px' height="30px">
									Kartu Tanda Santri<br>
									Pondok Pesantren Miftaful Huda Gading - Malang
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="4" height="7px"></td>
							</tr>
							<tr style="height: 2mm; vertical-align: middle;">
								<td class="namadata">NIS</td>
								<td width="4px" align="center">:</td>
								<td class="data"><?php echo $nis ?></td>
								<td class="foto-santri" rowspan="5" align="center" style="width: 19mm; height: 20mm;"><img src='<?php echo "../../foto/".substr($nis, 0, 1)."/".substr($nis, 1, 1)."/".$nis.".jpg";?>' style="width: 100%; padding: 0.7mm;">
								</td>
							</tr>
							<tr style="height: 2mm;">
								<td class="namadata">Nama</td>
								<td width="4px" align="center">:</td>
								<td class="data"><?php echo $nama; ?></td>
							</tr>
							<tr style="height: 1mm;">
								<td class="namadata">Kamar</td>
								<td width="4px" align="center">:</td>
								<td class="data"><?php echo $komplek;?></td>
							</tr>
							<tr style="height: 10mm;">
								<td class="namadata">Alamat</td>
								<td width="4px" align="center">:</td>
								<td class="data"><?php echo $alamat.', '.$nama_kota.'. '.$nama_provinsi; ?></td>
							</tr>
							<tr>
								<td class="namadata">Tgl. Masuk</td>
								<td width="4px" align="center">:</td>
								<td class="data"><?php echo date("d-m-Y", strtotime($tgl_masuk)); ?></td>
							</tr>
							<tr>
								
							</tr>
							<tr style="height: 2mm;">
								<td colspan="2" rowspan="3" style="vertical-align: middle;"><img src="../../img/qr/<?php echo $nis?>.png" style="max-height: 100%; max-width: 100%"></td>
								<td colspan="2" align="center">Pengasuh PPMH-Malang</td>
							</tr>
							<tr style="vertical-align: middle;">
								<td colspan="2" align="center" style="height: 13mm;"><img src="../../img/ttd.jpg" style="height: 100%; padding: 0.5mm;"></td>
							</tr>
							<tr style="height: 2mm;">
								<td colspan="2" align="center">KH. Abdurrohman Yahya</td>
							</tr>
						</tbody>
					</table>

<?php
				
            } 
			?>
				
	

<script>
	// window.print();
	// window.close();

	function save_img(data, nis_kirim){
		//ajax method.
		// alert(nis);
		// alert(nis_kirim);
		$.ajax({
			type : 'post',
			url : 'save_kts.php',
			data : {data: data, nis: nis_kirim},
			cache : false,
			dataType: 'json',
			success : function(data){
				if(data != "success"){
					alert('something wrong');
				}
			}
		});
		// $.post('save_kts.php', {data: data, nis: nis}, function(res){
		// 	//if the file saved properly, trigger a popup to the user.
		// 	if(res != "success"){
		// 		alert('something wrong');
		// 	}
		// });
	}

	var array_nis = <?php echo json_encode($nis_cetak); ?>;

	for (var i = 0; i < array_nis.length; i++) {
		// alert(array_nis);
		var nis_kirim = "";
		nis_kirim = array_nis[i];
		var id_canvas = "#canvas_"+nis_kirim;
		div_content = document.querySelector(id_canvas);
		//make it as html5 canvas
		// alert(nis_kirim);
		html2canvas(div_content, { dpi: 300 }).then(function(canvas) {
			//change the canvas to jpeg image
			var data = canvas.toDataURL();
			//then call a super hero php to save the image
			save_img(data, nis_kirim);
		});
	}
</script>
<?php
		} else {
			echo "Tidak ada santri yang dipilih untuk mencetak kartu.<br>";
			echo "<meta http-equiv='refresh' content='3; url=close.php'>";
		}
?>
	 </body> 
</html> 