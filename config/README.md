# Make your own copy and move this folder

[![Packagist Version](https://img.shields.io/packagist/v/jv-conseil/dkim-php-mail-signature?color=orange)](https://packagist.org/packages/jv-conseil/dkim-php-mail-signature)
[![License EUPL 1.2](https://img.shields.io/badge/License-EUPL--1.2-blue.svg)](LICENSE)
[![Become a sponsor to JV-conseil](https://img.shields.io/static/v1?label=Sponsor&message=%E2%9D%A4&logo=GitHub&color=%23fe8e86)](https://github.com/sponsors/JV-conseil "Become a sponsor to JV-conseil")
[![Follow JV conseil on StackOverflow](https://img.shields.io/stackexchange/stackoverflow/r/2477854)](https://stackoverflow.com/users/2477854/jv-conseil "Follow JV conseil on StackOverflow")
[![Follow JVconseil on Twitter](https://img.shields.io/twitter/follow/JVconseil.svg?style=social&logo=twitter)](https://twitter.com/JVconseil "Follow JVconseil on Twitter")
[![Follow JVconseil on Mastodon](https://img.shields.io/mastodon/follow/110950122046692405)](https://mastodon.social/@JVconseil "Follow JVconseil@mastodon.social on Mastodon")
[![Follow JV conseil on GitHub](https://img.shields.io/github/followers/JV-conseil?label=JV-conseil&style=social)](https://github.com/JV-conseil "Follow JV-conseil on GitHub")

Before starting you should make a copy of folder `config/` and store it outside your `vendor/` Composer repository in a non-public area of your website e.g.:

```bash
/www/inc/config/jv-conseil/dkim-php-mail-signature/
```

Failing to do so will expose you to lose all your settings in case of a future Composer udpate.

## Generate your Public & Private Encryption keys

In Terminal enter this command line to start working under the path of your `config/` folder:

```bash
cd /www/inc/config/jv-conseil/dkim-php-mail-signature/
```

In Terminal enter this command line to generate a new **private 2048 bit encryption key**:

```bash
openssl genrsa -des3 -out private.pem 2048
```

Enter your **Pass Phrase** and save it for editing your `config.inc.php` file in the next step.

Then retrieve your **public key**:

```bash
openssl rsa -in private.pem -out public.pem -outform PEM -pubout
```

_You can delete the two originals `*.pem` file keys stored in the `config/` folder if they create a conflict in the creation process of your keys._

## Sponsorship

If this project helps you reduce time to develop, you can give me a cup of coffee ☕️ :-)

[![Become a sponsor to JV-conseil](https://img.shields.io/static/v1?label=Sponsor&message=%E2%9D%A4&logo=GitHub&color=%23fe8e86)](https://github.com/sponsors/JV-conseil)
