<?php

/* The Composer Autoload could be here */

use Crypto\Crypto;

$array = array (
    "Color"=>"Yellow",
    "Car"=>"Camaro",
    "Country"=>"Brazil",
    "You Are"=>"Amazing"
);

$cryptedArray = array (
    "Color" => "VzNOamFMRXZmU2dDWDd6YkFNbXFDUT09",
    "Car" => "Z01xcnAyRFc5VTlIWnJ1RG11OXE3UT09",
    "Country" => "WHl6UTVhYjkrMkhKWjZVb2xJWS9hUT09",
    "You Are" => "MmdldnRsc1J1cHVMN3FaVFg4SXJQQT09"
);

$string = "Code is Poetry";

$encryptString = "gPsQc+7e+tM5iUAXifjzjQ==";



$crypto = new Crypto('YOUR_SECRET_KEY', 'YOUR_SECRET_IV', ['base64' => true]);

$encryptedArr = $crypto->getEncrypted($array);
print_r($encryptedArr);
/* Output:
Array
(
    [Color] => VzNOamFMRXZmU2dDWDd6YkFNbXFDUT09
    [Car] => Z01xcnAyRFc5VTlIWnJ1RG11OXE3UT09
    [Country] => WHl6UTVhYjkrMkhKWjZVb2xJWS9hUT09
    [You Are] => MmdldnRsc1J1cHVMN3FaVFg4SXJQQT09
)
*/

$decryptedArr = $crypto->getDecrypted($cryptedArray);
print_r($decryptedArr);
/* Output:
Array
(
    [Color] => Yellow
    [Car] => Camaro
    [Country] => Brazil
    [You Are] => Amazing
)
*/

$encryptedStr = $crypto->getEncrypted($string, 1);
echo $encryptedStr;
/* Output:
gPsQc+7e+tM5iUAXifjzjQ==
*/

$decryptedStr = $crypto->getDecrypted($encryptString, 1);
echo $decryptedStr;
/* Output:
Code is Poetry
*/
