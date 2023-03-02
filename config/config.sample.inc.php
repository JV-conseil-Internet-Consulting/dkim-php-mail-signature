<?php
/** 
 * The File to store your Configuration paramaters.
 * 
 * Before starting you should make a copy of folder `config/` and store it outside your `vendor/` Composer repository in a non-public area of your website e.g.: 
 * 
 * ```
 * /www/inc/config/jv-conseil/dkim-php-mail-signature/
 * ```
 * 
 * Failing to do so will expose you to lose all your settings in case of a future Composer udpate.
 * 
 * ## Generate your Public & Private Encryption keys
 * 
 * In Terminal enter this command line to start working under the path of your `config/` folder:
 * ```
 * cd /www/inc/config/jv-conseil/dkim-php-mail-signature/
 * ```
 * 
 * In Terminal enter this command line to generate a new **private 2048 bit encryption key**:
 * ```
 * openssl genrsa -des3 -out private.pem 2048
 * ```
 * 
 * Enter your **Pass Phrase** and save it for editing your `config.inc.php` file in the next step.
 * 
 * Then retrieve your **public key**:
 * ```
 * openssl rsa -in private.pem -out public.pem -outform PEM -pubout
 * ```
 * 
 * _You can delete the two originals `*.pem` file keys stored in the `config/` folder if they create a conflict in the creation process of your keys._
 * 
 * 
 * # Sponsorship
 * 
 * If this project helps you reduce time to develop, you can give me a cup of coffee ☕️ :-)
 * 
 * [![Become a sponsor to JV-conseil](https://img.shields.io/static/v1?label=Sponsor&message=%E2%9D%A4&logo=GitHub&color=%23fe8e86)](https://github.com/sponsors/JV-conseil "Become a sponsor to JV-conseil")
 * 
 * @var string domain: domain name e.g.: google.com.
 * @var string selector: selector used in your DKIM DNS record, e.g.: selector._domainkey.MAIL_DKIM_DOMAIN
 * @var string passphrase: your pass phrase used to generate your keys e.g.: myPassPhrase.
 * @var string private_key: string retrieved from private.pem file. 
 * @var string public_key: string retrieved from public.pem file.
 * @var string identity: Allowed user, defaults is "@<MAIL_DKIM_DOMAIN>", meaning anybody in the MAIL_DKIM_DOMAIN domain. Ex: 'admin@mydomain.tld'. You'll never have to use this unless you do not control the "From" value in the e-mails you send. 
 * 
 * @return array an array of configuration paramaters.
 * 
 * @author JV conseil — Internet Consulting <contact@jv-conseil.net>
 * @see http://www.jv-conseil.net
 * @see https://github.com/JV-conseil-Internet-Consulting/dkim-php-mail-signature
 * @see https://packagist.org/packages/jv-conseil/dkim-php-mail-signature
 * @license BSD 3-Clause License, Copyright (c) 2019, JV conseil – Internet Consulting, All rights reserved.
 * @version v1.2.2
 */
return array(
    'domain'        =>  'example.com',
    'selector'      =>  'selector',
    'passphrase'    =>  'myPassPhrase',
    'private_key'   =>  file_get_contents('private.pem', true) ,
    'public_key'    =>  file_get_contents('public.pem', true) ,
    'identity'      =>  NULL,
) ;