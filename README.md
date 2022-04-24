<h1>Encrypt or Decrypt strings and Arrays in PHP</h1>
<p>Using this code you can encrypt/decrypt your arrays, like $_POST or any $array that you have, and you can also encrypt/decrypt one string using the same object.</p>

<hr>
<h2>Install with composer:</h2>

<p>Download the <a  href="https://github.com/robzgf/crypt-array/blob/master/crypt-array.min.php">crypt-array.min.php</a> code or copy the code contents in your php file, and call the method using:</p>


    $object = new Crypto('YOUR SECRET HERE','YOUR SECRET_IV HERE' [options]);

Options is a array with aditionals informations. 
**base64** = If setted to true, the crypted or decrypted information will be converted or reverted to base64.

**To encrypt a array:**

    $result = $object->getEncrypted($array);
Show the results:

    print_r($result);

  ---

**To decrypt a array:**

    $result = $object->getDecrypted($array);

Show the results:

    print_r(result)

---

You can also encrypt a single string, just passing the *argument 1* after the string that will be encrypted.

    $result = $object->getEncrypted("String here", 1);

Show the results:

    echo $result;


To decrypt a single string, add the argument 1 after the string that will be decrypted.

    $result = $object->getDecrypted("3NCRYPT3D STR1NG", 1);

Show the results:

    echo $result;

---

<p>You can see the <a  href="https://github.com/robzgf/crypt-array/blob/master/sample.php">sample.php</a> file.