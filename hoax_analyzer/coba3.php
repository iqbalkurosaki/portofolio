<?php
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



	//detik.com
	$page = 1;
	$url = 'https://news.detik.com/indeks/berita/';
	$url .= $page;
	$url .= '?date=';
	$tanggal = urlencode('05/06/2018');
	$url .= $tanggal;
	$link = get_url_content($url, '<ul id="indeks-container">', '</ul>');
	$link = explode('<a href="', $link);
	unset($link[0]);
	$link = array_values($link);
	for ($i=0; $i<count($link); $i++) { 
		$z = 0;
		while ($link[$i][$z] != '"') {
			$z++;
		}
		$link[$i] = substr($link[$i], 0, $z);

		$content[$i] = get_url_content($link[$i], 'class="detail_text"', '<div class="clearfix mb20">');
		$z = 0;
		while ($content[$i][$z] != ">") {
			$z++;
		}
		$content[$i] = substr($content[$i], $z+1, strlen($content[$i])-($z+1));
		$content[$i] = strip_tags($content[$i]);
		echo $content[$i];
		echo "<br><br><br>";
	}
?>