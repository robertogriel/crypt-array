<h1>Encrypt or Decrypt strings and Arrays in PHP</h1>

<p>Using this code you can encrypt/decrypt your arrays, like $_POST or any $array that you have, and you can also encrypt/decrypt one string using the same object.</p>

<hr>

  ## Installation

<p>Install from Composer, running:</p>

    composer require robertogriel/crypt-array

Call the class, passing your SECRET and SECRET_V inside the parameters of Crypto class. 

Optionally you can pass a third parameter inside a array to receive the data with base64.

Crypto\Crypto(SECRET: String, SECRET_V: String, ["base64": Boolean])

By default, base64 option are setted to false.

## Examples:
  
*Check a full example inside a file: [sample.php](https://github.com/robertogriel/crypt-array/blob/master/sample.php)*

    $object = new new Crypto\Crypto('YOUR SECRET HERE','YOUR SECRET_IV HERE');

**To encrypt a array:**

    $object->getEncrypted([]);

---

**To decrypt a array:**
  

    $object->getDecrypted([]);


You can also encrypt a single string, just passing the *argument 1* after the string that will be encrypted.

    $object->getEncrypted("String", 1);

To decrypt a single string, add the argument 1 after the string that will be decrypted.

    $object->getDecrypted("String", 1);
