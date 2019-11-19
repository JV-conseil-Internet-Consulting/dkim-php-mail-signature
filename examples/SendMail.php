<?php
/**
 * Class example with config file accessed through a class.
 * 
 * To test this example enter in Terminal this command line:
 * ```
 * php ~/dkim-php-mail-signature/examples/ClassMethod.php
 * ``` 
 * 
 * @author JV conseil — Internet Consulting <contact@jv-conseil.net>
 * @see http://www.jv-conseil.net
 * @see https://github.com/JV-conseil-Internet-Consulting/dkim-php-mail-signature
 * @see https://packagist.org/packages/jv-conseil/dkim-php-mail-signature
 * @license BSD 3-Clause License, Copyright (c) 2019, JV conseil – Internet Consulting, All rights reserved.
 * @version v1.2.2
 */


 /** Call Composer Package JVconseil\DkimPhpMailSignature */
require_once __DIR__ . '/../vendor/autoload.php' ; // Autoload files using Composer autoload

use JVconseil\DkimPhpMailSignature\DKIMmail ;

$mail = new DKIMmail(__DIR__ . '/../config/config.sample.inc.php') ;

// YOUR E-MAIL
$mail->to = '"Recipient" <recipient@' . $config->domain . '>' ;

$mail->from = '"Sender" <sender@' . $mail->config->domain . '>' ;

$mail->subject = 'DKIM e-mail test for domain ' . $mail->config->domain ;

$mail->body =
'<html>
	<header></header>
	<body>
		<p>Hello,</p>
		
		<p>This a <b>DKIM</b> e-mail test with an attachment.</p>

		<p>Cheers,<br>' . htmlspecialchars($mail->from) . '</p>
	</body>
</html>';

$mail->attach(__DIR__ . '/SendMail.attachment.sample.pdf', 'SendMail.attachment.sample.pdf') ;

try {
	if ($mail->send() == true) {
		// header('Content-Type: text/plain') ;
		echo $mail->signed_headers . $mail->headers . "\r\n" ;
		echo 'To: ' . $mail->to . "\r\n" ;
		echo 'Subject: ' . $mail->subject . "\r\n" ;
		echo $mail->body . "\r\n" ;
	}
} catch (Exception $e) {
    die('Caught exception: ' . $e->getMessage() . "\r\n") ;
}