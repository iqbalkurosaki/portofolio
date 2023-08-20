<?php
//kurang isset post nis dan padding logo
// if (isset($_POST['nis'])) {
// 	header('Location: menu_sekret.php?a=lap_detail&k=1');
// }
// if (isset($_POST['nis'])) {
	function str_upper( $string, $key, $action = 'e' ) {
	    // you may change these values to your own
	    $secret_key = $key.'_key';
	    $secret_iv = $key.'_iv';
	 
	    $output = false;
	    $encrypt_method = "AES-256-CBC";
	    $key = hash( 'sha256', $secret_key );
	    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
	 
	    if( $action == 'e' ) {
	        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
	    }
	    else if( $action == 'd' ){
	        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
	    }
	 
	    return $output;
	}

	require_once "../library/qr-code-master/vendor/autoload.php";
	use Endroid\QrCode\ErrorCorrectionLevel;
	use Endroid\QrCode\LabelAlignment;
	use Endroid\QrCode\QrCode;
	use Endroid\QrCode\Response\QrCodeResponse;

	// Create a basic QR code
	$qrCode = new QrCode(str_upper($_POST["nis"], "kode_nis_santri"));
	$qrCode->setSize(300);

	// Set advanced options
	$qrCode->setWriterByName('png');
	$qrCode->setMargin(10);
	// $qrCode->setPadding(2);
	$qrCode->setErrorCorrectionLevel(ErrorCorrectionLevel::HIGH);
	$qrCode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
	$qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
	$qrCode->setLogoPath('../img/ppmh.png');
	$qrCode->setLogoSize(100, 100);
	$qrCode->setRoundBlockSize(true);
	$qrCode->setValidateResult(false);
	$qrCode->setWriterOptions(['exclude_xml_declaration' => true]);

	// Directly output the QR code
	header('Content-Type: '.$qrCode->getContentType());
	$qrCode->writeString();

	// Save it to a file
	$qrCode->writeFile('../img/qr/'.$_POST["nis"].'.png');

	echo '<img src="../img/qr/'.$_POST["nis"].'.png">';

	// use Endroid\QrCode\QrCode;
	// $qrCode = new QrCode();
	// $qrCode->setText(str_upper($_POST["nis"], "kode_nis_santri"))
	// 	->setSize(300)
	//     ->setPadding(10)
	//     ->setErrorCorrection('high')
	//     ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
	//     ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
	//     // Path to your logo with transparency
	//     ->setLogo("logo.png")
	//     // Set the size of your logo, default is 48
	//     ->setLogoSize(98)
	//     ->setImageType(QrCode::IMAGE_TYPE_PNG)
	// ;

	// // Send output of the QRCode directly
	// header('Content-Type: '.$qrCode->getContentType());
	// // $qrCode->render();
	// $qrCode->writeFile('../img/qr/'.$_POST["nis"].'.png');
	// echo $qr->writeString();
// }
?>