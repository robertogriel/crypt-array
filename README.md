Encrypt or Decrypt Strings and Arrays in PHP

A simple PHP library to encrypt/decrypt strings or associative arrays using OpenSSL and AES-128-CBC.

Installation

Install via Composer:

composer require robertogriel/crypt-array

Usage

Create a Crypto instance

use Crypto\Crypto;

$crypto = new Crypto('YOUR_SECRET_KEY', 'YOUR_SECRET_IV', true); // true = use base64

Encrypting an array:

$data = [
'username' => 'john',
'email' => 'john@example.com'
];

$encrypted = $crypto->encrypt($data);

Decrypting an array:

$decrypted = $crypto->decrypt($encrypted);

Encrypting a string:

$encrypted = $crypto->encrypt('Hello world');

Decrypting a string:

$decrypted = $crypto->decrypt($encrypted);

Options

The third parameter in the constructor is a boolean to enable Base64 encoding.

$crypto = new Crypto('key', 'iv', true); // enable Base64

Example

Check the full example in sample.php

Migration from older versions

In previous versions, the methods were named getEncrypted() and getDecrypted(), and an additional numeric argument (1) was required to handle strings. In the new version, the library automatically detects whether you're encrypting or decrypting a string or an array.

Before:

$crypto->getEncrypted('string', 1);
$crypto->getDecrypted('string', 1);

Now:

$crypto->encrypt('string');
$crypto->decrypt('string');

Also, getEncrypted() → encrypt() and getDecrypted() → decrypt().
