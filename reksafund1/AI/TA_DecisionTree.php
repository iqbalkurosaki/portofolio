<?php
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Decision Tree</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="../js/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<style type="text/css">
		.preview{
			overflow: auto;
			height: 400px;
			padding: 0px;
		}
		.table>tbody>tr>td, 
		.table>tbody>tr>th{
			border: none;
			text-align: center;
		}
	</style>
</head>
<body>
<div class="container-fluid" style="padding-bottom: 50px">
	<div class="row text-center" style="color: #1D9900; padding:20px"><h1><i class="glyphicon glyphicon-grain"></i><b>Decision Tree</b></h1></div>
	<div class="row" style="margin-bottom: 70px">
		<H3 align="center"><b>Data Reksadana Reksafund</b></H3>
			<div class="preview" style="height: 500px;">
				<table class='table table-striped' >
				      <tr style="background-color: #1D9900; color: white; ">
				        <th>No</th>
				        <th>Reksadana</th>
				        <th>Jenis</th>
				        <th>NAB</th>
				        <th>1hr</th>
				        <th>1Bln</th>
				        <th>YTD</th>
				        <th>1Th</th>
				        <th>3Th</th>
				        <th>Rating</th>
				      </tr>
				<?php
					require_once '../koneksi.php' ;
					require_once 'Func_DecisionTree.php' ;
					$stmt = $db->query("SELECT * FROM reksadana");
					$no=0;
					while ($res = $stmt -> fetch()) {
						$no++;
					    	echo "<tr>";
							echo "<td>".$no."</td>";
							echo "<td>".$res[1]."</td>";
							echo "<td>".$res[2]."</td>"; 
							echo "<td >".$res[3]."</td>";
							echo "<td >".$res[4]."</td>";
							echo "<td >".$res[5]."</td>";
					        echo "<td >".$res[6]."</td>";
							echo "<td >".$res[7]."</td>";
							echo "<td >".$res[8]."</td>";
							echo "<td ><i style='color: #FFE400' class='glyphicon glyphicon-star'></i> ".$res[9]."</td>";
					      echo "</tr>";
					} ;
				 ?>
				</table>
			</div>
	</div>
	<div class="row">
		<div class="col-sm-4" style="background-color: #1D9900;color: #FFFFFF;font-weight: bold;">
			<H2><b>Aturan Kategori</b></H2>
			<div class="row">
				<div class="col-sm-6" >
					<h3 style="border-bottom: 2px solid white;"><i></i> <b>NAB</b></h3>
					<table class="table color">
						<tr >
							<th >Kategori</th><th>Rentang</th>
						</tr>
						<tr>
							<td>1</td><td>< 1000</td>
						</tr>
						<tr>
							<td>2</td><td>1000 <=> 1500</td>
						</tr>
						<tr>
							<td>3</td><td>1500 <=> 2000</td>
						</tr>
						<tr>
							<td>4</td><td>2000 <=> 2500</td>
						</tr>
						<tr>
							<td>5</td><td>> 2500</td>
						</tr>
					</table>
				</div>
				<div class="col-sm-6" >
					<h3 style="border-bottom: 2px solid white;"><i></i> <b>1 Hari</b></h3>
					<table class="table">
						<tr >
							<th >Kategori</th><th>Rentang</th>
						</tr>
						<tr>
							<td>1</td><td>< -0,5</td>
						</tr>
						<tr>
							<td>2</td><td>-0,5 <=> 0</td>
						</tr>
						<tr>
							<td>3</td><td>0 <=> 0,5</td>
						</tr>
						<tr>
							<td>4</td><td>0,5 <=> 1</td>
						</tr>
						<tr>
							<td>5</td><td>> 1</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6" >
					<h3 style="border-bottom: 2px solid white;"><i></i> <b>1 Bulan</b></h3>
					<table class="table">
						<tr >
							<th >Kategori</th><th>Rentang</th>
						</tr>
						<tr>
							<td>1</td><td>< -6</td>
						</tr>
						<tr>
							<td>2</td><td>-6 <=> -4</td>
						</tr>
						<tr>
							<td>3</td><td>-4 <=> -2</td>
						</tr>
						<tr>
							<td>4</td><td>-2 <=> 0</td>
						</tr>
						<tr>
							<td>5</td><td>> 0 </td>
						</tr>
					</table>
				</div>
				<div class="col-sm-6" >
					<h3 style="border-bottom: 2px solid white;"><i></i> <b>YTD</b></h3>
					<table class="table">
						<tr >
							<th >Kategori</th><th>Rentang</th>
						</tr>
						<tr>
							<td>1</td><td>< -15</td>
						</tr>
						<tr>
							<td>2</td><td>-15 <=> -10</td>
						</tr>
						<tr>
							<td>3</td><td>-10 <=> -5</td>
						</tr>
						<tr>
							<td>4</td><td>-5 <=> 0</td>
						</tr>
						<tr>
							<td>5</td><td>> 0</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6" >
					<h3 style="border-bottom: 2px solid white;"><i></i> <b>1 Tahun</b></h3>
					<table class="table">
						<tr >
							<th >Kategori</th><th>Rentang</th>
						</tr>
						<tr>
							<td>1</td><td>< 0</td>
						</tr>
						<tr>
							<td>2</td><td>0 <=> 4</td>
						</tr>
						<tr>
							<td>3</td><td>4 <=> 8</td>
						</tr>
						<tr>
							<td>4</td><td>8 <=> 16</td>
						</tr>
						<tr>
							<td>5</td><td>> 16</td>
						</tr>
					</table>
				</div>
				<div class="col-sm-6" >
					<h3 style="border-bottom: 2px solid white;"><i></i> <b>3 Tahun</b></h3>
					<table class="table">
						<tr >
							<th >Kategori</th><th>Rentang</th>
						</tr>
						<tr>
							<td>1</td><td>< 0</td>
						</tr>
						<tr>
							<td>2</td><td>0 <=> 10</td>
						</tr>
						<tr>
							<td>3</td><td>10 <=> 20</td>
						</tr>
						<tr>
							<td>4</td><td>20 <=> 30</td>
						</tr>
						<tr>
							<td>5</td><td>> 30</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<H3 align="center"><b>Data Latih Reksadana 1 - 50</b></H3>
			<div class="preview">
				<table class='table table-striped' >
				      <tr style="background-color: #1D9900; color: white; ">
				        <th>No</th>
				        <th>Reksadana</th>
				        <th>Jenis</th>
				        <th>NAB</th>
				        <th>1hr</th>
				        <th>1Bln</th>
				        <th>YTD</th>
				        <th>1Th</th>
				        <th>3Th</th>
				        <th>Rating</th>
				      </tr>
				<?php
					$stmt = $db->query("SELECT * FROM reksadana");
					$Arr_Dt = array(array());

					for ($i=0; $i <50; $i++) { 
						$no=$i+1;
					 	$res = $stmt -> fetch();

					 	$Arr_Dt[$i]['Reksadana'] = $res[1];
						$Arr_Dt[$i]['Jenis'] = $res[2];
					 	$arr_bef[$i] = $res[9]; 
				        $Arr_Dt[$i]['Rating'] = $res[9]; 

						if ($res[3]<1000 ) {
					    	$Arr_Dt[$i]['NAB'] = 1 ;
					    } else if ($res[3]>=1000 && $res[3]<=1500) {
					    	$Arr_Dt[$i]['NAB'] = 2 ;
					    } else if ($res[3]>1500 && $res[3]<=2000) {
					    	$Arr_Dt[$i]['NAB'] = 3 ;
					    } else if ($res[3]>2000 && $res[3]<=2500) {
					    	$Arr_Dt[$i]['NAB'] = 4 ;
					    } else if ($res[3]>2500) {
					    	$Arr_Dt[$i]['NAB'] = 5 ;
					    }

					    if ($res[4]<-0.5 ) {
					    	$Arr_Dt[$i]['1hr'] = 1 ;
					    } else if ($res[4]>= -0.5 && $res[4]<= 0) {
					    	$Arr_Dt[$i]['1hr'] = 2 ;
					    } else if ($res[4]> 0 && $res[4]<=0.5) {
					    	$Arr_Dt[$i]['1hr'] = 3 ;
					    } else if ($res[4]> 0.5 && $res[4]<=1) {
					    	$Arr_Dt[$i]['1hr'] = 4 ;
					    } else if ($res[4]> 1) {
					    	$Arr_Dt[$i]['1hr'] = 5 ;
					    }

					    if ($res[5]<-6 ) {
					    	$Arr_Dt[$i]['1Bln'] = 1 ;
					    } else if ($res[5]>= -6 && $res[5]<= -4) {
					    	$Arr_Dt[$i]['1Bln'] = 2 ;
					    } else if ($res[5]> -4 && $res[5]<=-2) {
					    	$Arr_Dt[$i]['1Bln'] = 3 ;
					    } else if ($res[5]> -2 && $res[5]<=0) {
					    	$Arr_Dt[$i]['1Bln'] = 4 ;
					    } else if ($res[5]> 0) {
					    	$Arr_Dt[$i]['1Bln'] = 5 ;
					    }

					    if ($res[6]<-15 ) {
					    	$Arr_Dt[$i]['YTD'] = 1 ;
					    } else if ($res[6]>= -15 && $res[6]<= -10) {
					    	$Arr_Dt[$i]['YTD'] = 2 ;
					    } else if ($res[6]> -10 && $res[6]<=-5) {
					    	$Arr_Dt[$i]['YTD'] = 3 ;
					    } else if ($res[6]> -5 && $res[6]<=0) {
					    	$Arr_Dt[$i]['YTD'] = 4 ;
					    } else if ($res[6]> 0) {
					    	$Arr_Dt[$i]['YTD'] = 5 ;
					    }

					    if ($res[7]<0 ) {
					    	$Arr_Dt[$i]['1Th'] = 1 ;
					    } else if ($res[7]>= 0 && $res[7]<= 4) {
					    	$Arr_Dt[$i]['1Th'] = 2 ;
					    } else if ($res[7]> 4 && $res[7]<=8) {
					    	$Arr_Dt[$i]['1Th'] = 3 ;
					    } else if ($res[7]> 8 && $res[7]<=12) {
					    	$Arr_Dt[$i]['1Th'] = 4 ;
					    } else if ($res[7]> 12) {
					    	$Arr_Dt[$i]['1Th'] = 5 ;
					    }

					    if ($res[8]<0 ) {
					    	$Arr_Dt[$i]['3Th'] = 1 ;
					    } else if ($res[8]>= 0 && $res[8]<= 10) {
					    	$Arr_Dt[$i]['3Th'] = 2 ;
					    } else if ($res[8]> 10 && $res[8]<=20) {
					    	$Arr_Dt[$i]['3Th'] = 3 ;
					    } else if ($res[8]> 20 && $res[8]<=30) {
					    	$Arr_Dt[$i]['3Th'] = 4 ;
					    } else if ($res[8]> 30) {
					    	$Arr_Dt[$i]['3Th'] = 5 ;
					    }
					    	echo "<tr>";
							echo "<td>".$no."</td>";
							echo "<td>".$Arr_Dt[$i]['Reksadana']."</td>";
							echo "<td>".$Arr_Dt[$i]['Jenis']."</td>"; 
							echo "<td >".$Arr_Dt[$i]['NAB']."</td>";
							echo "<td >".$Arr_Dt[$i]['1hr']."</td>";
							echo "<td >".$Arr_Dt[$i]['1Bln']."</td>";
					        echo "<td >".$Arr_Dt[$i]['YTD']."</td>";
							echo "<td >".$Arr_Dt[$i]['1Th']."</td>";
							echo "<td >".$Arr_Dt[$i]['3Th']."</td>";
							echo "<td ><i style='color: #FFE400' class='glyphicon glyphicon-star'></i> ".$Arr_Dt[$i]['Rating']."</td>";
					      echo "</tr>";
					}  
				 ?>
				</table>
			</div>
			<div class="col-sm-6">
					<H3 align="center"><b>Data Reksadana 50 - 100</b></H3>
				<div class="preview">
					<table class='table table-striped' >
					      <tr style="background-color: #1D9900; color: white; ">
					        <th>No</th>
					        <th>Reksadana</th>
					        <th>Jenis</th>
					        <th>NAB</th>
					        <th>1hr</th>
					        <th>1Bln</th>
					        <th>YTD</th>
					        <th>1Th</th>
					        <th>3Th</th>
					        <th>Rating</th>
					      </tr>
					<?php
						require_once '../koneksi.php' ;
						$stmt = $db->query("SELECT * FROM reksadana LIMIT 50,50 ");

						for ($i=50; $i <100; $i++) { 
							$no=$i+1;
						 	$res = $stmt -> fetch();

						 	$Arr_Dt[$i]['Reksadana'] = $res[1];
							$Arr_Dt[$i]['Jenis'] = $res[2];
						 	$arr_bef[$i] = $res[9]; 
					        $Arr_Dt[$i]['Rating'] = $res[9]; 

							if ($res[3]<1000 ) {
						    	$Arr_Dt[$i]['NAB'] = 1 ;
						    } else if ($res[3]>=1000 && $res[3]<=1500) {
						    	$Arr_Dt[$i]['NAB'] = 2 ;
						    } else if ($res[3]>1500 && $res[3]<=2000) {
						    	$Arr_Dt[$i]['NAB'] = 3 ;
						    } else if ($res[3]>2000 && $res[3]<=2500) {
						    	$Arr_Dt[$i]['NAB'] = 4 ;
						    } else if ($res[3]>2500) {
						    	$Arr_Dt[$i]['NAB'] = 5 ;
						    }

						    if ($res[4]<-0.5 ) {
						    	$Arr_Dt[$i]['1hr'] = 1 ;
						    } else if ($res[4]>= -0.5 && $res[4]<= 0) {
						    	$Arr_Dt[$i]['1hr'] = 2 ;
						    } else if ($res[4]> 0 && $res[4]<=0.5) {
						    	$Arr_Dt[$i]['1hr'] = 3 ;
						    } else if ($res[4]> 0.5 && $res[4]<=1) {
						    	$Arr_Dt[$i]['1hr'] = 4 ;
						    } else if ($res[4]> 1) {
						    	$Arr_Dt[$i]['1hr'] = 5 ;
						    }

						    if ($res[5]<-6 ) {
						    	$Arr_Dt[$i]['1Bln'] = 1 ;
						    } else if ($res[5]>= -6 && $res[5]<= -4) {
						    	$Arr_Dt[$i]['1Bln'] = 2 ;
						    } else if ($res[5]> -4 && $res[5]<=-2) {
						    	$Arr_Dt[$i]['1Bln'] = 3 ;
						    } else if ($res[5]> -2 && $res[5]<=0) {
						    	$Arr_Dt[$i]['1Bln'] = 4 ;
						    } else if ($res[5]> 0) {
						    	$Arr_Dt[$i]['1Bln'] = 5 ;
						    }

						    if ($res[6]<-15 ) {
						    	$Arr_Dt[$i]['YTD'] = 1 ;
						    } else if ($res[6]>= -15 && $res[6]<= -10) {
						    	$Arr_Dt[$i]['YTD'] = 2 ;
						    } else if ($res[6]> -10 && $res[6]<=-5) {
						    	$Arr_Dt[$i]['YTD'] = 3 ;
						    } else if ($res[6]> -5 && $res[6]<=0) {
						    	$Arr_Dt[$i]['YTD'] = 4 ;
						    } else if ($res[6]> 0) {
						    	$Arr_Dt[$i]['YTD'] = 5 ;
						    }

						    if ($res[7]<0 ) {
						    	$Arr_Dt[$i]['1Th'] = 1 ;
						    } else if ($res[7]>= 0 && $res[7]<= 4) {
						    	$Arr_Dt[$i]['1Th'] = 2 ;
						    } else if ($res[7]> 4 && $res[7]<=8) {
						    	$Arr_Dt[$i]['1Th'] = 3 ;
						    } else if ($res[7]> 8 && $res[7]<=12) {
						    	$Arr_Dt[$i]['1Th'] = 4 ;
						    } else if ($res[7]> 12) {
						    	$Arr_Dt[$i]['1Th'] = 5 ;
						    }

						    if ($res[8]<0 ) {
						    	$Arr_Dt[$i]['3Th'] = 1 ;
						    } else if ($res[8]>= 0 && $res[8]<= 10) {
						    	$Arr_Dt[$i]['3Th'] = 2 ;
						    } else if ($res[8]> 10 && $res[8]<=20) {
						    	$Arr_Dt[$i]['3Th'] = 3 ;
						    } else if ($res[8]> 20 && $res[8]<=30) {
						    	$Arr_Dt[$i]['3Th'] = 4 ;
						    } else if ($res[8]> 30) {
						    	$Arr_Dt[$i]['3Th'] = 5 ;
						    }
						    	echo "<tr>";
								echo "<td>".$no."</td>";
								echo "<td>".$Arr_Dt[$i]['Reksadana']."</td>";
								echo "<td>".$Arr_Dt[$i]['Jenis']."</td>"; 
								echo "<td >".$Arr_Dt[$i]['NAB']."</td>";
								echo "<td >".$Arr_Dt[$i]['1hr']."</td>";
								echo "<td >".$Arr_Dt[$i]['1Bln']."</td>";
						        echo "<td >".$Arr_Dt[$i]['YTD']."</td>";
								echo "<td >".$Arr_Dt[$i]['1Th']."</td>";
								echo "<td >".$Arr_Dt[$i]['3Th']."</td>";
								echo "<td ><i style='color: #FFE400' class='glyphicon glyphicon-star'></i> ".$Arr_Dt[$i]['Rating']."</td>";
						      echo "</tr>";
						}  
					 ?>
					</table>
				</div>
			</div>
				<div class="col-sm-6">
					<H3 align="center"><b>Data Uji Reksadana 50 - 100</b></H3>
					<div class="preview">
						<table class='table table-striped' >
						      <tr style="background-color: #1D9900; color: white; ">
						        <th>No</th>
						        <th>Reksadana</th>
						        <th>Jenis</th>
						        <th>NAB</th>
						        <th>1hr</th>
						        <th>1Bln</th>
						        <th>YTD</th>
						        <th>1Th</th>
						        <th>3Th</th>
						        <th>Rating</th>
						        <th>Mape</th>
						      </tr>
					<?php 
					$c=0;	
					$iter = 0;
					$arr_var1 = array();
					$arr_var2 = array();
					$arr_err = array();
		      			do {
		      				$err=0;
		      				$c++;
		      				if ($c==1) { $var1='NAB'; $var2='1hr'; }
		      				elseif ($c==2) { $var1='1Bln'; $var2='YTD'; }
		      				elseif ($c==3) { $var1='1Th'; $var2='3Th'; $c=0; }
			      			for ($i=50; $i <count($Arr_Dt) ; $i++) { 
			      				$Arr_Dt[$i]['Rating']= Tree($Arr_Dt[$i][$var1],$Arr_Dt[$i][$var2],$var1,$var2,'Rating',$Arr_Dt,50);
								$err=$err+(abs((intval($Arr_Dt[$i]['Rating'])-$arr_bef[$i])/$arr_bef[$i]));
								$arr_rat[$iter][$i-50]=$Arr_Dt[$i]['Rating'];
			      			}
			      			$sigmaerr=$err;
			      			$err=$err*100/50;
			      			array_push($arr_var2, $var2);
			      			array_push($arr_var1, $var1);
			      			array_push($arr_err, $err);

			      			$iter++;
							$time = microtime();
							$time = explode(' ', $time);
							$time = $time[1] + $time[0];
							$now = $time;
							$break = round(($now - $start), 4);
			      			if ($break>29.5) {
			      				$sigmaerr = 0;
			      				$err=0;
			      				$var1 = $arr_var1[array_search(min($arr_err),$arr_err)];
			      				$var2 = $arr_var2[array_search(min($arr_err),$arr_err)];
			      				for ($i=50; $i <count($Arr_Dt) ; $i++) { 
				      				$Arr_Dt[$i]['Rating']= $arr_rat[array_search(min($arr_err),$arr_err)][$i-50];
									$err=$err+(abs((intval($Arr_Dt[$i]['Rating'])-$arr_bef[$i])/$arr_bef[$i]));
				      			}
				      			$sigmaerr=$err;
			      				$err=$err*100/50;
			      				break;
			      			}
		      			} while (true);
			      		for ($i=50; $i <count($Arr_Dt) ; $i++) { 
							$no=$i+1;
		      				echo "<tr>";
								echo "<td>".$no."</td>";
								echo "<td>".$Arr_Dt[$i]['Reksadana']."</td>";
								echo "<td>".$Arr_Dt[$i]['Jenis']."</td>"; 
								echo "<td >".$Arr_Dt[$i]['NAB']."</td>";
								echo "<td >".$Arr_Dt[$i]['1hr']."</td>";
								echo "<td >".$Arr_Dt[$i]['1Bln']."</td>";
					            echo "<td >".$Arr_Dt[$i]['YTD']."</td>";
								echo "<td >".$Arr_Dt[$i]['1Th']."</td>";
								echo "<td >".$Arr_Dt[$i]['3Th']."</td>";
								echo "<td ><i style='color: #FFE400' class='glyphicon glyphicon-star'></i> ".$Arr_Dt[$i]['Rating']."</td>";
								echo "<td >".round(abs((intval($Arr_Dt[$i]['Rating'])-$arr_bef[$i])/$arr_bef[$i]),3)."</td>";
				              	echo "</tr>";
		      			}
		      		 ?>
			      		</table>
			      	</div>
				</div>
			</div>
		</div>
		<div class="text-center" >
			<h2><u><b>Kesimpulan</u></b></h2>
			<h3 style='margin:0px'><b>Sigma Error = <?php echo $sigmaerr; ?></br>Nilai MAPE = <?php echo $err/100; ?>%</b></h3>
			<h4><b>Variabel1 = <?php echo $var1; ?> Variabel2 = <?php echo $var2; ?></b></h4>

		      			<?php 
		      				echo "Variabel1 = ".$arr_var1[array_search(min($arr_err),$arr_err)]."<br>Variabel 2 = ".$arr_var2[array_search(min($arr_err),$arr_err)]."<br>Error = ".array_search(min($arr_err),$arr_err);
		      			echo "<h1>$iter</h1>";

							$time = microtime();
							$time = explode(' ', $time);
							$time = $time[1] + $time[0];
							$finish = $time;
							$total_time = round(($finish - $start), 4);
							echo "page loaded in ".$total_time." seconds";
		      			?>
		</div>
	</div>
</div>
</body>
</html>