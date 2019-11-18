<?php
/** 
 * The File to store your Configuration paramaters.
 * 
 * Before starting you should make a copy of folder `config/` and store it outside your `vendor/` Composer repository in a non-public area of your website e.g.: 
 * ```
 * ~/mywebsite/includes/config/
 * ```
 * 
 * Failing to do so will expose you to lose all your settings in case of a future Composer udpate.
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
 * @version v1.2.0
 */
return array(
    'domain'        =>  'example.com',
    'selector'      =>  'selector',
    'passphrase'    =>  'myPassPhrase',
    'private_key'   =>  file_get_contents('private.pem', true) ,
    'public_key'    =>  file_get_contents('public.pem', true) ,
    'identity'      =>  NULL,
) ;