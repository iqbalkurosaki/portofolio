<!DOCTYPE html>
<html>
<head>
	<title>Hoax Analyzer</title>
</head>
<body>

<h2>Hoax Analyzer</h2>

<form method="post" action="">
	<table>
		<tr>
			<td>Masukkan kalimat</td>
			<td>:</td>
			<td><input name="kalimat" required="" autofocus="" size="100" value="<?php echo isset($_POST['kalimat']) ? $_POST['kalimat'] : ''; ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><input type="submit" name="submit" value="Periksa"></td>
		</tr>
	</table>
</form>

<?php
if (isset($_POST['submit'])) {
	function get_url_content($url, $start_delimiter = false, $end_delimiter = false){
		// Create a cURL handle
		$ch = curl_init($url);
		curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:7.0.1) Gecko/20100101 Firefox/7.0.1');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		// Execute
		$hasil = curl_exec($ch);
		if (!curl_errno($ch)) {
			if ($start_delimiter == false || $end_delimiter == false) {
				return $hasil;
			} else {
				$hasil = explode($start_delimiter, $hasil);
				$hasil = explode($end_delimiter, $hasil[1]);
				$hasil = $hasil[0];
				return $hasil;
			}
		} else {
			return false;
		}
	}

	function nlp($kalimat) {
		$kal = array();
		$kalimat .= " ";
		$tmp = "";
		$symbol = array(" ", ".", ",", "!", "?", ":", "/", "&", "(", ")", "-", "'", "\"", "\\", "\n");
		for ($i=0; $i<strlen($kalimat); $i++) { 
			if (in_array($kalimat[$i], $symbol)) {
				if (strlen($tmp) > 0) {
					array_push($kal, $tmp);
					$tmp = "";
				}
			} else {
				$tmp .= $kalimat[$i];
			}
		}
		if (count($kal) > 0) {
			return $kal;
		} else {
			return false;
		}
	}

	$kal = nlp(strtolower($_POST['kalimat']));
	// kompas.com masih gagal
	// $url = 'https://search.kompas.com/search/?q=';
	// $search = "walikota malang korupsi";
	// $search = urlencode($search);
	// $url .= $search;
	// $url .= "&submit=Submit+Query";

	//detik.com
	$url = 'https://www.detik.com/search/searchall?query=';
	$search = $_POST['kalimat'];
	$search = urlencode($search);
	$url .= $search;
	$url .= '&sortby=time';
	$hasil = get_url_content($url);
	$count_search = explode('<span class="fl text">', $hasil);
	$count_search = $count_search[1];
	$count_search = explode('</span>', $count_search);
	$count_search = $count_search[0];
	$count_search = explode("</b>, ", $count_search);
	$count_search = $count_search[1];
	$count_search = explode(" ", $count_search);
	$count_search = $count_search[0];
	print_r($count_search);
	echo "<br>";
	if ($count_search > 0) {
		$link = array();
		$page = floor($count_search/9);
		for ($c_page=1; $c_page<=$page; $c_page++) {
			$last_count = count($link);
			$url = 'https://www.detik.com/search/searchall?query=';
			$url .= $search;
			$url .= '&sortby=time&page=';
			$url .= $c_page;
			$hasil = get_url_content($url);
			$del_link = array();
			$link2 = explode('<article>', $hasil);
			unset($link2[0]);
			$link2 = array_values($link2);
			for ($i=$last_count; $i<count($link2)+$last_count; $i++) { 
				$link[$i] = explode("</article>", $link2[$i-$last_count]);
				$link[$i] = $link[$i][0];
				$link[$i] = explode('<a href="', $link[$i]);
				$link[$i] = $link[$i][1];
				$link[$i] = explode('" onclick=', $link[$i]);
				$link[$i] = $link[$i][0];
				$jenis = explode('/', $link[$i]);
				print_r($link[$i]);
				$jenis = $jenis[3];
				if (($jenis != 'detiktv') && ($jenis != 'readfoto')) {
					$content[$i] = get_url_content($link[$i], 'detail__body-text itp_bodycontent"', '<strong>Simak');
					if ($content[$i] == false) {
						array_push($del_link, $i);
						unset($content[$i]);
						continue;
					}
					$z = 0;
					while ($content[$i][$z] != ">") {
						$z++;
					}
					$content[$i] = substr($content[$i], $z+1, strlen($content[$i])-($z+1));
					print_r($content[$i]);
					$content[$i] = strip_tags($content[$i]);
					$konten_kata[$i] = nlp(strtolower($content[$i]));
					$skor = 0;
					$count_konten[$i] = count($konten_kata[$i]);

					$tmpKal = "";
					$tmpContent = "";
					for ($o=1; $o<=count($kal); $o++) { 
						for ($p=0; $p<=count($kal)-$o; $p++) { 
							$arrSkor[$i][$o] = 0;
							for ($q=0; $q<$o; $q++) { 
								$tmpKal .= $kal[$p+$q];
								$tmpKal .= ",";
							}
							for ($r=0; $r<=count($konten_kata[$i])-$o; $r++) { 
								for ($s=0; $s<$o; $s++) { 
									$tmpContent .= $konten_kata[$i][$r+$s];
									$tmpContent .= ",";
									}
								// echo "<br>---<br>";
								// echo $tmpKal;
								// echo "<br>$tmpContent<br>";
								// echo "<br>---<br>";
								if ($tmpKal == $tmpContent) {
									$arrSkor[$i][$o]++;
									// echo "////////////////////ketemu///////////////////////<br>";
								}
								$tmpContent = "";
							}
							$tmpKal = "";
						}
					}
				} else {
					array_push($del_link, $i);
				}
				// break;
			}
			for ($i=0; $i<count($del_link); $i++) { 
				unset($link[$del_link[$i]]);
			}
			$link = array_values($link);
			$content = array_values($content);
			$konten_kata = array_values($konten_kata);
			$count_konten = array_values($count_konten);
			$arrSkor = array_values($arrSkor);
			// break;
		}
		print_r($arrSkor);
		echo "<br>";
		print_r($link);
		echo "<br>";
		print_r($count_konten);
		echo "<br>";
		print_r($konten_kata);
		$skor_hoax = 0;
		for ($p=0; $p<count($arrSkor); $p++) { 
			$key_skor = array_keys($arrSkor[$i]);
			for ($s=0; $s<count($key_skor); $s++) { 
				$skor_hoax += ($arrSkor[$p][$key_skor[$s]] * $key_skor[$s]);
			}
		}
		$max_skor = 0;
		for ($i=count($kal), $skor_i=1; $i>0 ; $i--, $skor_i++) { 
			$max_skor += ($i*$skor_i);
		}
		echo "<br>Skor : ".$skor_hoax/count($link)/count($kal)."<br>";
		if (($skor_hoax/count($link)/count($kal)) > 0.7) {
			echo "Berita tersebut benar (BUKAN HOAX).<br>";
		} else {
			echo "Berita tersebut tidak benar (HOAX).<br>";
		}
	} else {
		echo "Maaf, hasil tidak ditemukan. Coba cari dengan kata kunci lain.<br>";
	}
}
?>

</body>
</html>