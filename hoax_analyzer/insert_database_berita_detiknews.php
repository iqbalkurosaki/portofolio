<?php
if (!session_id()) {
	session_start();
}
if (isset($_POST['reset'])) {
	session_destroy();
	session_start();
}
if ((isset($_SESSION['ke'])) && ($_SESSION['ke'] < 10)) {
require_once 'koneksi.php';
date_default_timezone_set('Asia/Jakarta');
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
	$stmt = $db->query("SELECT MIN(tanggal) FROM berita");
	$last_date = $stmt->fetch();
	$last_date = $last_date[0];
	$tanggal_asli = date("Y-m-d", strtotime($last_date." -1 days"));
	$jumlah = 0;
		$tanggal_cari = date("m/d/Y", strtotime($tanggal_asli));
		//detik.com
		$pages = 1;
		$url = 'https://news.detik.com/indeks/berita/';
		$url .= $pages;
		$url .= '?date=';
		$tanggal = urlencode($tanggal_cari);
		$url .= $tanggal;
		$pages = get_url_content($url, '<div class="paging paging2">', '</div>');
		// $page = explode('</a>', $page);
		// $page = $page[count($page)-2];
		$pages = explode('">', $pages);
		$pages = $pages[count($pages)-2];
		$pages = intval($pages);
		for ($page=1; $page<=$pages; $page++) { 
			$link = array();
			$content = array();
			$url = 'https://news.detik.com/indeks/berita/';
			$url .= $page;
			$url .= '?date=';
			$tanggal = urlencode($tanggal_cari);
			$url .= $tanggal;
			$link = get_url_content($url, '<ul id="indeks-container">', '</ul>');
			$link = explode('<a href="', $link);
			unset($link[0]);
			$link = array_values($link);
			for ($i=0; $i<count($link); $i++) { 
				$jumlah++;
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
				$content[$i] = strip_tags(strtolower($content[$i]));
				$stmt = $db->prepare("INSERT INTO berita VALUES(?, ?)");
				$stmt->bindParam(1, $tanggal_asli);
				$stmt->bindParam(2, $content[$i]);
				$stmt->execute();
			}
		}
	echo $tanggal_asli;
	echo $jumlah;

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert Database Berita Detiknews</title>
</head>
<body>
<?php
// $stmt = $db->query("SELECT MIN(tanggal) FROM berita");
// $last_date = $stmt->fetch();
// $last_date = $last_date[0];
?>
<h2>Insert Database Berita</h2>

<!-- <form method="post" action="">
	<table>
		<tr>
			<td>Tanggal</td>
			<td>:</td>
			<td>
				<input type="hidden" name="tanggal_asli" required="" autofocus="" size="100" value="<?php echo date("Y-m-d", strtotime($last_date." -1 days")); ?>">
				<input type="text" name="tanggal_view" required="" autofocus="" size="100" value="<?php echo date("d-m-Y", strtotime($last_date." -1 days")); ?>" disabled>
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><input type="submit" name="insert" value="Insert"></td>
		</tr>
	</table>
</form> -->
<form method="post" action="">
	<input type="submit" name="reset" value="Reset">
</form>

<?php
if ((isset($_SESSION['ke'])) && ($_SESSION['ke'] < 10)) {
	$_SESSION['ke']++;
	header('Location: insert_database_berita_detiknews.php');
} else {
	$_SESSION['ke'] = 0;
}
if (!isset($_SESSION['ke'])) {
	$_SESSION['ke'] = 0;
}
?>
</body>
</html>