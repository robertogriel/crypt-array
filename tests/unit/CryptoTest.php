<?php

use Crypto\Crypto;

beforeEach(function () {
    $this->key = 'test-secret-key';
    $this->iv = 'test-secret-iv';
});

it('should encrypt and decrypt a simple string', function () {
    $crypto = new Crypto($this->key, $this->iv);
    $original = 'Hello World';

    $encrypted = $crypto->encrypt($original);
    $decrypted = $crypto->decrypt($encrypted);

    expect($decrypted)->toBe($original);
});

it('should encrypt and decrypt an associative array', function () {
    $crypto = new Crypto($this->key, $this->iv);
    $data = ['name' => 'Alice', 'city' => 'Wonderland'];

    $encrypted = $crypto->encrypt($data);
    $decrypted = $crypto->decrypt($encrypted);

    expect($decrypted)->toBe($data);
});

it('should encrypt and decrypt using base64', function () {
    $crypto = new Crypto($this->key, $this->iv, true);
    $string = 'Base64 Test';

    $encrypted = $crypto->encrypt($string);
    expect(base64_decode($encrypted))->not()->toBeFalse();

    $decrypted = $crypto->decrypt($encrypted);
    expect($decrypted)->toBe($string);
});

it('should throw exception when base64 decode fails', function () {
    $crypto = new Crypto($this->key, $this->iv, true);
    $crypto->decrypt('invalid-base64$$$');
})->throws(RuntimeException::class, 'Base64 decoding failed.');

it('should throw exception when decryption fails', function () {
    $crypto = new Crypto($this->key, $this->iv);
    $crypto->decrypt('invalid-raw-encrypted-data');
})->throws(RuntimeException::class, 'Decryption failed.');

it('should encrypt and decrypt a complex associative array', function () {
    $crypto = new Crypto($this->key, $this->iv);
    $data = [
        'name' => 'John',
        'email' => 'john@example.com',
        'address' => '123 Main St',
        'city' => 'Nowhere',
        'zip' => '00000'
    ];

    $encrypted = $crypto->encrypt($data);
    $decrypted = $crypto->decrypt($encrypted);

    expect($decrypted)->toBe($data);
});

it('should encrypt and decrypt an empty string', function () {
    $crypto = new Crypto($this->key, $this->iv);
    $encrypted = $crypto->encrypt('');
    $decrypted = $crypto->decrypt($encrypted);

    expect($decrypted)->toBe('');
});

it('should encrypt and decrypt an empty array', function () {
    $crypto = new Crypto($this->key, $this->iv);
    $encrypted = $crypto->encrypt([]);
    $decrypted = $crypto->decrypt($encrypted);

    expect($decrypted)->toBe([]);
});

it('should encrypt and decrypt numeric strings and zero values', function () {
    $crypto = new Crypto($this->key, $this->iv);
    $data = [
        'zero' => '0',
        'number' => '12345',
        'float' => '3.1415'
    ];

    $encrypted = $crypto->encrypt($data);
    $decrypted = $crypto->decrypt($encrypted);

    expect($decrypted)->toBe($data);
});

it('should encrypt and decrypt booleans and nulls as strings', function () {
    $crypto = new Crypto($this->key, $this->iv);
    $data = [
        'true' => '1',
        'false' => '',
        'null' => ''
    ];

    $encrypted = $crypto->encrypt($data);
    $decrypted = $crypto->decrypt($encrypted);

    expect($decrypted)->toBe($data);
});

it('should encrypt and decrypt special characters and unicode', function () {
    $crypto = new Crypto($this->key, $this->iv);
    $data = [
        'emoji' => '🚀🔥✨',
        'specialchars' => '!@#$%^&*()_+-=[]{}|;\':",.<>/?',
        'accented' => 'çáéíóúâêîôûãõ'
    ];

    $encrypted = $crypto->encrypt($data);
    $decrypted = $crypto->decrypt($encrypted);

    expect($decrypted)->toBe($data);
});

it('should handle long strings and large arrays', function () {
    $crypto = new Crypto($this->key, $this->iv);

    $string = str_repeat('A', 10000);
    $encryptedStr = $crypto->encrypt($string);
    $decryptedStr = $crypto->decrypt($encryptedStr);
    expect($decryptedStr)->toBe($string);

    $array = [];
    for ($i = 0; $i < 100; $i++) {
        $array["key_$i"] = str_repeat('x', 100);
    }
    $encryptedArr = $crypto->encrypt($array);
    $decryptedArr = $crypto->decrypt($encryptedArr);

    expect($decryptedArr)->toBe($array);
});
