<?php
require_once "vendor/autoload.php";
use Endroid\QrCode\QrCode;
$qr = new QrCode("irfan");
header('Content-Type: '.$qr->getContentType());
echo $qr->writeString();
?>