<div class="navbar-wrapper">
	<div class="sidebar-collapse">
		<br>
		<center><img src="../img/logo.png" width="400" /></center>
		<div class="alert alert-success">
			<center>
				<b>Assalamualaikum. Selamat Datang Pengunjung !</b>
				<br>
				Website ini berisi pelaporan akademik seperti raport, keaktifan dan SPP Santri PP. Miftahul Huda, Jalan. Gading Pesantren 38 Malang
			</center>
		</div>
		<!--end  Welcome -->
	</div>
	<!-- end page-wrapper -->
</div>
<!-- end wrapper -->
<!-- <style>
	.container {
		width: 90%;
		margin: 35px auto;
	}

	body {
		text-align: center;
		color: green;
	}

	h2 {
		text-align: center;
		font-family: "Verdana", sans-serif;
		font-size: 30px;
	}
</style>
<div class="container">
	<h2>Kapasitas</h2>
	<div>
		<canvas id="myChart"></canvas>
	</div>
</div>
<?php
$sql = ("SELECT * from komplek");
$result = $db->Execute($sql);
$nama_komplek = [];
$kapasitas = [];
while (!$result->EOF) {
	$nama_komplek[] = $result->fields["nama_komplek"];
	$keterangan[] = $result->fields["keterangan"];
	$kapasitas[] = $result->fields["kapasitas"];

	$result->MoveNext();
}

?>
<script>
	var ctx = document.getElementById("myChart").getContext("2d");
	var myChart = new Chart(ctx, {
		type: "line",
		data: {
			labels: <?php echo json_encode($nama_komplek) ?>,
			datasets: [{
				label: "Kapasitas",
				data: <?php echo json_encode($kapasitas) ?>,
				backgroundColor: "rgba(11,156,49,0.5)",
			}, ],
		},
	});
</script> -->