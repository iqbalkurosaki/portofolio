<?php
if (!session_id()) {
	session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
<h2 align="center">Respond Time</h2>
<?php
$arrUrl = array("index.php","data.php", "login_page.php", "perkembangan.php", "signup_page.php", "admin_bank/index.php", "admin_reksadana/index.php", "klien/alih_reksadana.php", "klien/beli_reksadana.php", "klien/daftar_transaksi.php", "klien/jual_reksadana.php", "klien/pengalihan.php", "klien/penjualan.php", "klien/profil.php", "klien/reksadana.php", "klien/rincian.php", "klien/struk.php", "klien/strukPenjualan.php");
?>
<div class="row table-responsive" style="margin-left: 5px">
<div style="height: 600px; overflow: scroll;">
<table class="table table-bordered">
<thead>
	<tr class="success">
		<th>Page</th>
		<th>Respond Time (ms)</th>
	</tr>
</thead>
<tbody>
<?php
$times = 0.0;
for ($i=0; $i<count($arrUrl); $i++) { 
	$url = 'https://reksafund.000webhostapp.com/';
	$url .= $arrUrl[$i];
	// Create a cURL handle
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	// Execute
	curl_exec($ch);
	// Check HTTP status code
	if (!curl_errno($ch)) {
	    $info = curl_getinfo($ch);
	    $time = $info['total_time']*1000;
//	    $time = number_format(($info['total_time'] * 1000), 2, ",", ".");
    	echo "<tr>
	 		<td>".$info['url']."</td>
	 		<td>".number_format($time, 2, ",", ".")."</td>
	 	</tr>";
	}
	// Close handle
	curl_close($ch);
	$times += $time;
}
$times = $times/count($arrUrl);
?>
</tbody>
</table>
</div>
</div>
<?php echo number_format($times, 2, ",", "."); ?>
</body>
</html>
