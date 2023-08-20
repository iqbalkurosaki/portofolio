<?php
	if (!session_id()) {
		session_start();
	}
	require_once 'dynamic_nab.php';
?>
<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<title>Perkembangan Reksadana</title>
<meta charset="UTF-8">

<?php 
	require_once 'koneksi.php';
	if (isset($_GET['t'])) {
		$stmt = $db->prepare("SELECT * FROM perkembangan WHERE perkembangan.id_reksadana = ? && perkembangan.tanggal >= ? ORDER BY tanggal ASC");
		$date_min = date('Y-m-d',strtotime($_GET['t']));
		$stmt->bindParam(1, $_GET['r']);
		$stmt->bindParam(2, $date_min);
	} else {
		$stmt = $db->prepare("SELECT * FROM perkembangan WHERE perkembangan.id_reksadana = ? ORDER BY tanggal ASC");
		$stmt->bindParam(1, $_GET['r']);
	}
	$stmt->execute();
	$row = $stmt->rowCount();
	$res=$stmt->fetchAll();
	$res2 = $res[0];
	$nama=$res2[3];
	$tanggal = array();
	$nab = array();
	for ($j=0; $j <count($res2)/2; $j++) { 
		for ($i=0; $i <$row ; $i++) { 
			if ($j == 1) {
				$res[$i][$j] = date('Y, m, d', strtotime($res[$i][$j]));
				array_push($tanggal, $res[$i][$j]);
			} else if ($j == 2) {
				array_push($nab, ($res[$i][$j]));
			}
		}
	}
 ?>
<script>


window.onload = function () {
var tanggal = <?php echo json_encode($tanggal); ?>;
var nab = <?php echo json_encode($nab); ?>;
var dataPoints = [];
for (var i = 0; i < tanggal.length ; i++) {
dataPoints.push({
    x: new Date(tanggal[i]),
    y: Number(nab[i])
  })
}

var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
	theme: "light2",
	title:{
		text: "<?php echo $nama; ?>"
	},
	axisX:{
		interval: 1,
		intervalType: "day"
	},
	axisY:{
		includeZero: false,
		valueFormatString: "'Rp.'#,###.##"
	},
	toolTip: {
		shared: "true"
	},
	legend:{
		cursor:"pointer"
	},
	data: [{
	    type: "spline",
	    markerType: "square",
	    color: "#A2FF00",
	    name:"<?php echo $nama ?>",
	    yValueFormatString: "'Rp.'#,###.##",
	    dataPoints: dataPoints
	  }]
});

chart.render();
}
</script>
</head>
<body>
<div style="padding: 25px;">
		<a href="index.php"><img src="img/RF.png" style="max-width: 150px;"></a>
</div>
<div style='border-top: 1px solid #56B700; margin:0px auto; width:90%;' class="text-center"><b><h4>Perkembangan Reksadana</h4></b></div>
<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
<script src="js/canvasjs.min.js"></script>
<br>
<button class="btn btn-danger" style="margin-left: 10%;margin-bottom: 50px" onclick="window.history.go(-1)"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</button>
</body>
</html>