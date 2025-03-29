# 🔐 Crypt Array

Encrypt or decrypt **strings** and **associative arrays** in PHP using OpenSSL and AES-128-CBC.

> ✅ Compatible with **PHP 8.2+**

---

## 📦 Installation

Install via Composer:

```bash
composer require robertogriel/crypt-array
```

---

## 🚀 Usage

### 1. Create a Crypto instance

```php
use Crypto\Crypto;

$crypto = new Crypto('YOUR_SECRET_KEY', 'YOUR_SECRET_IV', true); // true = use Base64
```

---

### 2. Encrypting an array

```php
$data = [
    'username' => 'john',
    'email'    => 'john@example.com'
];

$encrypted = $crypto->encrypt($data);
```

---

### 3. Decrypting an array

```php
$decrypted = $crypto->decrypt($encrypted);
```

---

### 4. Encrypting a string

```php
$encrypted = $crypto->encrypt('Hello world');
```

---

### 5. Decrypting a string

```php
$decrypted = $crypto->decrypt($encrypted);
```

---

## ⚙️ Options

The third parameter of the constructor is a boolean to enable **Base64 encoding**:

```php
$crypto = new Crypto('key', 'iv', true); // true = enable Base64
```

---

## 📁 Full Example

See the full example file: [`sample.php`](sample.php)

It includes:
- Input data
- Encrypted values
- Decrypted results
- Code snippets used

---

## 🧯 Migration Guide (v1.x → v2.x)

Previous versions used `getEncrypted()` and `getDecrypted()` and required a second argument to indicate a string.

### 🔄 Old usage:

```php
$crypto->getEncrypted('string', 1);
$crypto->getDecrypted('string', 1);
```

### ✅ Now:

```php
$crypto->encrypt('string');
$crypto->decrypt('string');
```

The methods are now smart enough to detect whether you're using a string or an array.

---

## ✅ Requirements

- PHP >= 8.2
- OpenSSL extension enabled

---

## 🧪 Testing

Run the full test suite with [Pest](https://pestphp.com):

```bash
./vendor/bin/pest
```

---

## 📘 License

MIT © [robertogriel](mailto:roberto@griel.com.br)
