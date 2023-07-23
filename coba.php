<?php
	date_default_timezone_set('Asia/Jakarta');
	$t = microtime(true);
	$micro = sprintf("%06d",($t - floor($t)) * 1000000);
	$d = new DateTime(date('Y-m-d H:i:s.'.$micro, $t));

	$date = $d->format("Y-m-d H:i:s.u");
	$id = md5($d->format("Y-m-d H:i:s.u"));
	echo $id;
	echo "<br>";
	echo $d->format("Y-m-d H:i:s.u");
	echo "<br>";
	echo crc32($date);
	echo "<br>";
	echo hash("adler32", $date);
	echo "<br>";
	echo crypt($date, "elearning");
?>