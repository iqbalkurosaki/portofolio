<?php
$tmpKal = "";
$tmpContent = "";
$content = array("r", "b", "c", "d", "p", "d", "p", "a");
$kal = array("a", "b", "c", "d", "e");
for ($i=1; $i<=count($kal); $i++) { 
	$arrSkor[$i] = 0;
	for ($j=0; $j<=count($kal)-$i; $j++) { 
		for ($k=0; $k<$i; $k++) { 
			$tmpKal .= $kal[$j+$k];
				$tmpKal .= ",";
		}
		echo " <=====> ";
		for ($l=0; $l<=count($content)-$i; $l++) { 
			for ($m=0; $m<$i; $m++) { 
				echo $content[$l+$m];
				$tmpContent .= $content[$l+$m];
				$tmpContent .= ",";
			}
			if ($tmpKal == $tmpContent) {
				$arrSkor[$i]++;
			}
			echo " <=> ".$tmpKal;
			echo " <---> ";
			echo " <=> ".$tmpContent;
			$tmpContent = "";
			echo " - ";
		}
		$tmpKal = "";
		echo ",<br>";
	}
	echo "/<br>";
}
print_r($arrSkor);
?>