<!DOCTYPE html>
<html>
<head>

<?php


?>
</head>
	<body>
	
<div class="table-responsive">
				<table  class="table table-bordered">
				<tr class="success">
				<td colspan="6" align="center"><h4 class="menu">Berikut Alumni yang berada 1 km sekitar anda</h4></td>
				</tr>
				<tr class="success">
					<td width="7%" scope="col"><h4 class="menu"><center>No</center></h4></td>
					<td width="25%" scope="col"><h4 class="menu"><center>Nama</center></h4></td>
					<td width="20%" scope="col"><h4 class="menu"><center>Posisi</center></h4></td>
					<td width="10%" scope="col"><h4 class="menu"><center>Jarak</center></h4></td>
					<td width="20%" scope="col"><h4 class="menu"><center>Email</center></h4></td>
					<td width="20%" scope="col"><h4 class="menu"><center>No HP</center></h4></td>
				</tr>


<?php
		require "map/haversine.php";
		
	$sql_haver_user2 = "SELECT alumni.nama, alumni.hp,alumni.email, map.lat,map.lon FROM alumni INNER JOIN map ON alumni.email = map.user_nm where map.user_nm = '".$user."'";
	$sql_havers2_user2=$db->execute($sql_haver_user2);
	
	$sql_havers2 = "SELECT alumni.nama, alumni.hp,alumni.email, map.lat,map.lon FROM alumni INNER JOIN map ON alumni.email = map.user_nm";
	$sql_havers2=$db->execute($sql_havers2);
	$no = 0;
	$nomor=1;
			 while (!$sql_havers2->EOF) {
				//orang lain
			$lat_haver = $sql_havers2->fields["lat"];
			$lon_haver = $sql_havers2->fields["lon"];
			
			// dirinya sendiri
			$lats_haver = $sql_havers2_user2->fields["lat"];
			$lons_haver = $sql_havers2_user2->fields["lon"];
			
			
			$haver = getDistance($lats_haver, $lons_haver, $lat_haver, $lon_haver);
			$jarak[$no] = $haver;
			/*$found[$no]=array(
				"user_id"=>$sql_havers2->fields["user_nm"],
				"latitude"=>$sql_havers2->fields["lat"],
				"longitude"=>$sql_havers2->fields["lon"],
				"jarak"=>$haver
			);*/
			
			// cek dirinya sendiri
			
			if( $user == $sql_havers2->fields["nama"] ){
					
				echo "<tr><td>".$nomor++."</td><td>".$sql_havers2->fields["nama"]."</td><td>".$sql_havers2->fields["lat"]."<br>". $sql_havers2->fields["lon"]."</td><td> ". $haver." km </td><td>".$sql_havers2->fields["email"]."</td><td>".$sql_havers2->fields["hp"]." </td></tr>";
				
					}else{
				
				if( $haver <= 1 )
					echo "<tr><td>".$nomor++."</td><td>".$sql_havers2->fields["nama"]."</td><td>".$sql_havers2->fields["lat"]."<br> ". $sql_havers2->fields["lon"]."</td><td> ". $haver." km </td><td>".$sql_havers2->fields["email"]."</td><td>".$sql_havers2->fields["hp"]." </td></tr>";
				
			}
			
			$no++;
			
			$sql_havers2->MoveNext();
        }
		
		
		
?>
	</table>

				</div>  
<?php
		require "map/get_IP.php";
		require "map/marking.php";
?>				

	</body>
</html>