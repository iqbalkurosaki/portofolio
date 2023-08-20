<html>
<body>
<div class="alert alert-success" role="alert">*Fitur map akan berfungsi jika mendapat dukungan browser anda, jika anda menggunakan hp silahkan aktifkan gps anda.</div>


				<?php
           
        include('../config/config.php');
           
		session_start();
		$user=$_SESSION['FULLNAME'];
		
function getDistance($latitude1, $longitude1, $latitude2, $longitude2) {  
    $earth_radius = 6371;  //Earth's radius in km.
      
    $dLat = deg2rad($latitude2 - $latitude1);  //deg2rad berfungsi Mengubah derajat ke radians(radian itu bilangan real)
    $dLon = deg2rad($longitude2 - $longitude1);  
      
    $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);  
    $c = 2 * asin(sqrt($a));  //asin berfungsi merupakan sebuah fungsi trigonometri yang digunakan untuk menghitung nilai inverse sinus , sqrt berfungsi untuk menghitung nilai akar kuadrat dari suatu bilangan
    $distance = $earth_radius * $c;  //jarak sesungguhnya
    $jarak=round($distance,3);  //pembulatan 3 angka dibelakan koma
    return $jarak;  
}  
	
			?>
			
	</body>
</html>