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
	$page = get_url_content($url, '<div class="paging paging2">', '</div>');
	// $page = explode('</a>', $page);
	// $page = $page[count($page)-2];
	$page = explode('">', $page);
	$page = $page[count($page)-2];
	$page = intval($page);
	echo $page."<br>";
	for ($i=$page; $i>0; $i--) { 
		echo "$i<br>";
	}
	//print_r($page);
?>