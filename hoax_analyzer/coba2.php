<?php
$tmpKal = "";
$tmpContent = "";
$content = array("r", "b", "c", "d", "p", "d", "p", "a");
$kal = array("a", "b", "c", "d", "e");
for ($o=1; $o<=count($kal); $o++) { 
	$arrSkor[$o] = 0;
	for ($p=0; $p<=count($kal)-$o; $p++) { 
		for ($q=0; $q<$o; $q++) { 
			$tmpKal .= $kal[$p+$q];
			$tmpKal .= ",";
		}
		for ($r=0; $r<=count($content)-$o; $r++) { 
			for ($s=0; $s<$o; $s++) { 
				$tmpContent .= $content[$r+$s];
				$tmpContent .= ",";
				if ($tmpKal == $tmpContent) {
					$arrSkor[$o]++;
				}
			}
			$tmpContent = "";
		}
		$tmpKal = "";
	}
}
print_r($arrSkor);
?>
