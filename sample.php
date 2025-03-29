<?php

require_once 'vendor/autoload.php';

use Crypto\Crypto;

$array = [
    "Color" => "Yellow",
    "Car" => "Camaro",
    "Country" => "Brazil",
    "You Are" => "Amazing"
];

$string = "Code is Poetry";

$secretKey = 'my-super-secret-key';
$secretIV = 'my-very-secret-iv';

$crypto = new Crypto($secretKey, $secretIV, true);

$encryptedArray = $crypto->encrypt($array);
$decryptedArray = $crypto->decrypt($encryptedArray);

$encryptedString = $crypto->encrypt($string);
$decryptedString = $crypto->decrypt($encryptedString);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crypto Sample</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            max-width: 900px;
            margin: auto;
        }

        h1, h2 {
            color: #333;
        }

        pre {
            background: #f4f4f4;
            padding: 10px;
            border-radius: 5px;
            overflow-x: auto;
        }

        code {
            font-family: monospace;
            background: #eef;
            padding: 3px 6px;
            border-radius: 4px;
            display: inline-block;
        }

        .block {
            margin-bottom: 40px;
        }
    </style>
</head>
<body>

<h1>Crypto Sample Output</h1>

<div class="block">
    <h2>Original Array</h2>
    <code>$array</code>
    <pre><?php print_r($array); ?></pre>
</div>

<div class="block">
    <h2>Encrypted Array</h2>
    <code>$encryptedArray = $crypto->encrypt($array);</code>
    <pre><?php foreach ($encryptedArray as $key => $value) {
            echo "$key: $value\n";
        } ?></pre>
</div>

<div class="block">
    <h2>Decrypted Array</h2>
    <code>$decryptedArray = $crypto->decrypt($encryptedArray);</code>
    <pre><?php foreach ($decryptedArray as $key => $value) {
            echo "$key: $value\n";
        } ?></pre>
</div>

<div class="block">
    <h2>Original String</h2>
    <code>$string = "Code is Poetry";</code>
    <pre><?php echo $string; ?></pre>
</div>

<div class="block">
    <h2>Encrypted String</h2>
    <code>$encryptedString = $crypto->encrypt($string);</code>
    <pre><?php echo $encryptedString; ?></pre>
</div>

<div class="block">
    <h2>Decrypted String</h2>
    <code>$decryptedString = $crypto->decrypt($encryptedString);</code>
    <pre><?php echo $decryptedString; ?></pre>
</div>

</body>
</html>
