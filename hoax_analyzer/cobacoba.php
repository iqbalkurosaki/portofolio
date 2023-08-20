<?php
for ($i=0; $i<10; $i++) { 
	echo "$i<br>";
	for ($p=11; $p <20 ; $p++) { 
		if ($p==13) {
			continue;
		echo "$p<br>";
		}
	}
}
?>