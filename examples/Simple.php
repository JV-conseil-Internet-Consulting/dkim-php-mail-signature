<?php
/**
 * Simple example test with config file accessed through a var.
 * 
 * @author JV conseil — Internet Consulting <contact@jv-conseil.net>
 * @see http://www.jv-conseil.net
 * @license BSD 3-Clause License, Copyright (c) 2019, JV conseil – Internet Consulting, All rights reserved.
 * @version v1.0.4
 */


require_once __DIR__ . '/../vendor/autoload.php' ; // Autoload files using Composer autoload

use JVconseil\DkimPhpMailSignature\DKIMsign ;

// after setting up the config file and your DNS records :
$config = include_once(__DIR__ . '/../config/config.sample.inc.php') ;


// YOUR E-MAIL
$to = 'recipient@' . $config['domain'] ;

$subject = 'DKIM e-mail test for domain ' . $config['domain'] ;

$headers =
'MIME-Version: 1.0
From: "Sender" <sender@' . $config['domain'] . '>
Content-type: text/html; charset=utf8';

$message =
'<html>
	<header></header>
	<body>
		Hello, this a DKIM e-mail test
	</body>
</html>';
	

// Make sure linefeeds are in CRLF format - it is essential for signing
$message = preg_replace('/(?<!\r)\n/', "\r\n", $message) ;
$headers = preg_replace('/(?<!\r)\n/', "\r\n", $headers) ;


// 1) YOU USUALLY DID :
// mail($to, $subject, $message, $headers);


// 2) NOW YOU WILL DO (you can use options to add some flavor) :

$options = array(
	'use_dkim' => false,
	'use_domainKeys' => true,
	'identity' => $config['identity'],
	// if you prefer simple canonicalization (though the default "relaxed"
	// is recommended)
	'dkim_body_canonicalization' => 'simple',
	'dk_canonicalization' => 'nofws',
	// if you want to sign the mail on a different list of headers than the
	// default one (see class constructor). Case-insensitive.
	'signed_headers' => array(
		'message-Id',
		'Content-type',
		'To',
		'subject'
	)
);

$signature = new DKIMsign(
	// $options,
	$config['private_key'],
	$config['passphrase'],
	$config['domain'],
	$config['selector']
);

$signed_headers = $signature -> get_signed_headers($to, $subject, $message, $headers) ;

try {
	if (mail($to, $subject, $message, $signed_headers.$headers) == true) {
		header('Content-Type: text/plain') ;
		echo $signed_headers . $headers . "\r\n" ;
		echo 'To: ' . $to . "\r\n" ;
		echo 'Subject: ' . $subject . "\r\n" ;
		echo $message . "\r\n" ;
	}
} catch (Exception $e) {
    die('Caught exception: ' . $e->getMessage() . "\r\n") ;
}