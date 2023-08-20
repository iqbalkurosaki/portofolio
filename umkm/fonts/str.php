<?php
	function str_upper( $string, $key) {
	    // you may change these values to your own
	    $secret_key = $key.'_key';
	    $secret_iv = $key.'_iv';
	 
	    $output = false;
	    $encrypt_method = "AES-256-CBC";
	    $key = hash( 'sha512', $secret_key );
	    $iv = substr( hash( 'sha512', $secret_iv ), 0, 16 );
	 
	    $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
	 
	    return $output;
	}
?>