<!DOCTYPE html>
<html>
<head>

<?php

include ('../secure/secure_admin.php');
?>
</head>
	<body>


<?php
		require "map/haversine.php";
		echo "<div class='table-responsive'>
				<table  class='table table-bordered'>
				<tr class='success'>
				<td colspan='6' align='center'><h4 class='menu'>Peta Persebaran Alumni SMKN 1 Pasuruan</h4></td>
				</tr>
				</table>

				</div>  ";
	    
		require "map/get_IP.php";
		require "map/marking.php";
		
		
?>
   
	</body>
</html>