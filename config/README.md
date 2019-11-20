# Make your own copy and move this folder

[![Packagist Version](https://img.shields.io/packagist/v/jv-conseil/dkim-php-mail-signature?color=orange)](https://packagist.org/packages/jv-conseil/dkim-php-mail-signature)
[![Donate with PayPal](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=P3DGL6EANDY96&source=url)
[![License BSD 3-Clause](https://img.shields.io/badge/License-BSD%203--Clause-blue.svg)](LICENSE)
[![Follow JV conseil – Internet Consulting on Twitter](https://img.shields.io/twitter/follow/JVconseil.svg?style=social&logo=twitter)](https://twitter.com/JVconseil)

Before starting you should make a copy of folder `config/` and store it outside your `vendor/` Composer repository in a non-public area of your website e.g.: 
```
/www/inc/config/jv-conseil/dkim-php-mail-signature/
```

Failing to do so will expose you to lose all your settings in case of a future Composer udpate.

## Generate your Public & Private Encryption keys

In Terminal enter this command line to start working under the path of your `config/` folder:
```
cd /www/inc/config/jv-conseil/dkim-php-mail-signature/
```

In Terminal enter this command line to generate a new **private 2048 bit encryption key**:
```
openssl genrsa -des3 -out private.pem 2048
```

Enter your **Pass Phrase** and save it for editing your `config.inc.php` file in the next step.

Then retrieve your **public key**:
```
openssl rsa -in private.pem -out public.pem -outform PEM -pubout
```

_You can delete the two originals `*.pem` file keys stored in the `config/` folder if they create a conflict in the creation process of your keys._


# Sponsorship

If this project helps you reduce time to develop, you can give me a cup of coffee ☕️ :-)

[![Donate with PayPal](https://www.paypalobjects.com/en_US/FR/i/btn/btn_donateCC_LG.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=P3DGL6EANDY96&source=url)