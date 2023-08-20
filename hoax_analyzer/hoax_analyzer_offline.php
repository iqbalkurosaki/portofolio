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
	require_once 'koneksi.php';
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

	//database detik.com

	for ($o=1; $o<=count($kal); $o++) { 
		$arrSkor = array();
		$jumlah[$o] = 0;
		for ($p=0; $p<=count($kal)-$o; $p++) { 
			$tmpKal = "";
			for ($q=0; $q<$o; $q++) { 
				$tmpKal .= $kal[$p+$q];
				if ($q!=($o-1)) {
					$tmpKal .= " ";
				}
			}
			//tmpKal jadi disini
			$stmt = $db->query("SELECT COUNT(*) FROM berita WHERE berita LIKE '%".$tmpKal."%'");
			$res = $stmt->fetch();
			($res[0] > 0) ? $jumlah[$o] += 1 : 1==1;
			$tmpKal = "";
		}
		array_push($arrSkor, $jumlah);
	}

		print_r($arrSkor);
		echo "<br>";
		$skor_hoax = 0;
		for ($p=0; $p<count($arrSkor); $p++) { 
			$key_skor = array_keys($arrSkor[$p]);
			for ($s=0; $s<count($key_skor); $s++) { 
				$skor_hoax += ($arrSkor[$p][$key_skor[$s]] * $key_skor[$s]);
			}
		}
		$stmt = $db->query("SELECT COUNT(*) FROM berita");
		$jumlah = $stmt->fetch();
		$jumlah = $jumlah[0];
		$max_skor = 0;
		for ($i=count($kal), $skor_i=1; $i>0 ; $i--, $skor_i++) { 
			$max_skor += ($i*$skor_i);
		}
		echo "<br>Skor : ".$skor_hoax/$max_skor."<br>";
		if ($skor_hoax/$max_skor > 0.5) {
			echo "Berita tersebut benar (BUKAN HOAX).<br>";
		} else {
			echo "Berita tersebut tidak benar (HOAX).<br>";
		}
}
?>

</body>
</html>