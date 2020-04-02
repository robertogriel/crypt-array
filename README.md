<h1>Encrypt or Decrypt strings and Arrays in PHP</h1>

<p>Using this code you can encrypt/decrypt your arrays, like $_POST or any $array that you have, and you can also encrypt/decrypt one string using the same object.</p>

<hr>
<p>Download the <a href="https://github.com/robzgf/crypt-array/blob/master/crypt-array.min.php">crypt-array.min.php</a> code or copy the code contents in your php file, and call the method using:</p>
<br>


#Your code here#
<br><br>
#The crypt code or include() the crypt file here#
<br><br>
#Call the class
<br><br>
$object = new Crypto();
<br><br>
#To encrypt a array:
<br><br>
$result = $object->getEncrypted($array);
<br><br>
print_r($result);
<br><br>
#To decrypt a array:
<br><br>
$result = $object->getDecrypted($array);
<br><br>
print_r(result)
<br><br><br>
#To encrypt a single word or string:
<br><br>
$result = $object->getEncrypted("String here", 1);
<br><br>
echo $result;
<br><br>
#To decrypt a single word or string:
<br><br>
$result = $object->getDecrypted("3NCRYPT3D STR1NG", 1);
<br><br>
echo $result;
<br><br><br>
<p>You can see the <a href="https://github.com/robzgf/crypt-array/blob/master/sample.php">sample.php</a> file.
