<?php 
 //fungsi entropi
    function e($item, $col, $arr,$jum){
		$count = 0;
		for ($i=0; $i<$jum ; $i++) {
			if ($arr[$i][$col]==$item) {
				$count+=1;
			}
		}
		return (-($count/$jum)*log10($count/$jum));
	}
//fungsi Decsision Tree
	function Tree($in_nab,$in_ytd,$col1,$col2,$keputusan,array $arr,$jum){
		$arr_kep = array();
		$arr_con = array();
	$es = e(1, $keputusan, $arr,$jum) + e(2, $keputusan, $arr, $jum) + e(3, $keputusan, $arr, $jum) + e(4, $keputusan, $arr, $jum) + e(5, $keputusan, $arr, $jum);
	$gainCol1 = $es - (e(1, $col1, $arr, $jum) + e(2, $col1, $arr, $jum) + e(3, $col1, $arr, $jum) + e(4, $col1, $arr, $jum) + e(5, $col1, $arr, $jum));
	$gainCol2 = $es - (e(1, $col2, $arr, $jum) + e(2, $col1, $arr, $jum) + e(3, $col2, $arr, $jum) + e(4, $col2, $arr, $jum) + e(5, $col2, $arr, $jum));

		if ($gainCol1 >= $gainCol2){
			for ($i=0; $i<$jum; $i++){
				if ($arr[$i][$col1]==$in_nab){
					if (isset($kepawal)) {
						if ($kepawal!=$arr[$i][$keputusan]) {
							unset($kepawal);
							for ($i=0; $i<$jum; $i++){
								if ($arr[$i][$col1]==$in_nab && $arr[$i][$col2]==$in_ytd){
									if (isset($kepawal)) {
										if ($kepawal!=$arr[$i][$keputusan]) {
											array_push($arr_kep, $arr[$i][$keputusan]);
											if (isset($arr_kep)) {
												$kepawal=$arr_kep[array_rand($arr_kep)];
											}
										} 
									} else {
										array_push($arr_kep, $arr[$i][$keputusan]);
										$kepawal = $arr[$i][$keputusan];
									}
								} else {
									if (!isset($arr_kep) && $i == $jum-1) {
										$kepawal = rand(1,5);
										break;
									}
								}
							}
							break;
						}
					}	 else {
						$kepawal = $arr[$i][$keputusan];
					}
				} else {
					if ($i == $jum-1) {
						$kepawal = rand(1,5);
						break;
					}
				}
			}
		} else {
			for ($i=0; $i<$jum; $i++){
				if ($arr[$i][$col2]==$in_ytd){
					if (isset($kepawal)) {
						if ($kepawal!=$arr[$i][$keputusan]) {
							unset($kepawal);
							for ($i=0; $i<$jum; $i++){
								if ($arr[$i][$col2]==$in_ytd && $arr[$i][$col1]==$in_nab){
									array_push($arr_kep, (int) $arr[$i][$keputusan]);
								} else {
									if ($i == $jum-1 && count($arr_kep)!=0) {
										$kepawal = rand(1,5);
										break;
									}
								}
							}
							break;
						}
					} else {
						$kepawal = $arr[$i][$keputusan];
					}
				} else {
					if ($i == $jum-1) {
						$kepawal = rand(1,5);
						break;
					}
				}
			} 
			if (count($arr_kep)) {
				$arr_con = array_count_values($arr_kep);
				$arr_key = array_keys($arr_con);
				$tmp = array();
				$arr_max= max($arr_con);
				for ($i=0; $i <count($arr_con) ; $i++) { 
					if ($arr_max==$arr_con[$arr_key[$i]]) {
						array_push($tmp, $arr_key[$i]);
					} 
				}
				$kepawal= $tmp[rand(0, count($tmp)-1)];
			} else {
				$kepawal= rand(1, 5);
			}
		}
		return isset($kepawal) ? $kepawal.' <br />' : 'axccx<br />';
		
	}
 ?>