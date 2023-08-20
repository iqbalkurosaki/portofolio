<!-- Hanya pencarian detik di halaman pertama yang dipakai -->
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
	$url = 'https://www.detik.com/search/searchnews?query=';
	$search = $_POST['kalimat'];
	$search = urlencode($search);
	$url .= $search;
	$url .= '&sortby=time&siteid=3';
	$hasil = get_url_content($url);
	$count_search = explode('<span class="fl text">', $hasil);
	$count_search = $count_search[1];
	$count_search = explode('</span>', $count_search);
	$count_search = $count_search[0];
	$count_search = explode("</b>, ", $count_search);
	$count_search = $count_search[1];
	$count_search = explode(" ", $count_search);
	$count_search = $count_search[0];
	if ($count_search > 0) {
		$del_link = array();
		$link = explode('<article>', $hasil);
		unset($link[0]);
		$link = array_values($link);
		for ($i=0; $i<count($link); $i++) { 
			$link[$i] = explode("</article>", $link[$i]);
			$link[$i] = $link[$i][0];
			$link[$i] = explode('<a href="', $link[$i]);
			$link[$i] = $link[$i][1];
			$link[$i] = explode('">', $link[$i]);
			$link[$i] = $link[$i][0];
			$jenis = explode('/', $link[$i]);
			$jenis = $jenis[3];
			if (($jenis != 'detiktv') && ($jenis != 'readfoto')) {
				$content[$i] = get_url_content($link[$i], 'class="detail_text"', '<div class="clearfix mb20">');
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
				$content[$i] = strip_tags($content[$i]);
				$konten_kata[$i] = nlp(strtolower($content[$i]));
				$skor = 0;
				$count_konten[$i] = count($konten_kata[$i]);

				$tmpKal = "";
				$tmpContent = "";
				for ($o=1; $o<=count($kal); $o++) { 
					$arrSkor[$i][$o] = 0;
					for ($p=0; $p<=count($kal)-$o; $p++) { 
						for ($q=0; $q<$o; $q++) { 
							$tmpKal .= $kal[$p+$q];
							$tmpKal .= ",";
						}
						for ($r=0; $r<=count($konten_kata[$i])-$o; $r++) { 
							for ($s=0; $s<$o; $s++) { 
								$tmpContent .= $konten_kata[$i][$r+$s];
								$tmpContent .= ",";
								if ($tmpKal == $tmpContent) {
									$arrSkor[$i][$o]++;
								}
							}
							$tmpContent = "";
						}
						$tmpKal = "";
					}
				}
			} else {
				array_push($del_link, $i);
			}
		}
		for ($i=0; $i<count($del_link); $i++) { 
			unset($link[$del_link[$i]]);
		}
		$link = array_values($link);
		$content = array_values($content);
		$konten_kata = array_values($konten_kata);
		$count_konten = array_values($count_konten);
		$arrSkor = array_values($arrSkor);
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
		echo "<br>Skor : ".$skor_hoax/count($link)/count($kal)."<br>";
		if (($skor_hoax/count($link)/count($kal)) > 3) {
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