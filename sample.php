<?php
class Crypto{private $secret="YOUR_SECRET_HERE";private $secret_iv="YOUR_SECRET-IV_HERE";private function crypt($data,$q=null){define('SECRET_IV',pack('a16',$this->secret_iv));define('SECRET',pack('a16',$this->secret));if(!isset($q)&&$q<1){$keys=array_keys($data);$values=array_values($data);$final=[];$qnty=count($data);for($a=0;$a<$qnty;$a++){$crypt=openssl_encrypt($values[$a],"AES-128-CBC",SECRET,0,SECRET_IV);array_push($final,$crypt);array_merge($data,$final);}$implodeKeys=implode(',',$keys);$implodeValue=implode(',',$final);$encrypted=array_combine(explode(',',$implodeKeys),explode(',',$implodeValue));return $encrypted;}else{$qnty=$q;$crypt=openssl_encrypt($data,"AES-128-CBC",SECRET,0,SECRET_IV);return $crypt;}}private function decrypt($data,$q=null){define('SECRET_IV',pack('a16',$this->secret_iv));define('SECRET',pack('a16',$this->secret));if(!isset($q)&&$q<1){$keys=array_keys($data);$values=array_values($data);$final=[];$qnty=count($data);for($a=0;$a<$qnty;$a++){$crypt=openssl_decrypt($values[$a],"AES-128-CBC",SECRET,0,SECRET_IV);array_push($final,$crypt);array_merge($data,$final);}$implodeKeys=implode(',',$keys);$implodeValue=implode(',',$final);$decrypted=array_combine(explode(',',$implodeKeys),explode(',',$implodeValue));return $decrypted;}else{$qnty=$q;$decript=openssl_decrypt($data,"AES-128-CBC",SECRET,0,SECRET_IV);return $decript;}}public function getEncrypted($data,$q=null){$result=$this->crypt($data,$q);return $result;}public function getDecrypted($data,$q=null){$result=$this->decrypt($data,$q);return $result;}}
#is extreme important to change the $secret and $secret_iv.

$array = array (
    "Color"=>"Yellow",
    "Car"=>"Camaro",
    "Country"=>"Brazil",
    "You Are"=>"Amazing"
);

$cryptedArray = array (
    "Color" => "DlK99HMb8OwYYe3+AM2sAA==",
    "Car" => "JsfOpj/z4qY4h1zWqZaitw==",
    "Country" => "GNkxpWeRnF3Pzg99TTde/A==",
    "You Are" => "4vVoPEZrhTaRyJt7UQMA8w=="
);

$string = "Code is Poetry";

$encryptString = "gPsQc+7e+tM5iUAXifjzjQ==";

#### DO NOT RUN ALL METHODS AT THE SAME TIME

$crypto = new Crypto();

$encryptedArr = $crypto->getEncrypted($array);
print_r($encryptedArr);
/* Output:

Array
(
    [Color] => DlK99HMb8OwYYe3+AM2sAA==
    [Car] => JsfOpj/z4qY4h1zWqZaitw==
    [Country] => GNkxpWeRnF3Pzg99TTde/A==
    [You Are] => 4vVoPEZrhTaRyJt7UQMA8w==
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

?>
