<?php

namespace Crypto;

use RuntimeException;

class Crypto
{
    private string $key;
    private string $iv;
    private bool $useBase64;
    protected string $cipher = 'AES-128-CBC';

    public function __construct(string $key, string $iv, bool $useBase64 = false)
    {
        $this->key = substr(hash('sha256', $key), 0, 16);
        $this->iv = substr(hash('sha256', $iv), 0, 16);
        $this->useBase64 = $useBase64;
    }

    public function encrypt($data)
    {
        if (is_array($data)) {
            $result = [];
            foreach ($data as $key => $value) {
                $result[$key] = $this->encryptValue($value);
            }
            return $result;
        }

        return $this->encryptValue($data);
    }

    public function decrypt($data)
    {
        if (is_array($data)) {
            $result = [];
            foreach ($data as $key => $value) {
                $result[$key] = $this->decryptValue($value);
            }
            return $result;
        }

        return $this->decryptValue($data);
    }

    private function encryptValue(string $value): string
    {
        $encrypted = openssl_encrypt($value, $this->cipher, $this->key, OPENSSL_RAW_DATA, $this->iv);

        if ($encrypted === false) {
            throw new RuntimeException('Encryption failed.');
        }

        return $this->useBase64 ? base64_encode($encrypted) : $encrypted;
    }

    private function decryptValue(string $value): string
    {
        if ($this->useBase64) {
            $decoded = base64_decode($value, true);
            if ($decoded === false) {
                throw new RuntimeException('Base64 decoding failed.');
            }
            $value = $decoded;
        }

        $decrypted = openssl_decrypt($value, $this->cipher, $this->key, OPENSSL_RAW_DATA, $this->iv);

        if ($decrypted === false) {
            throw new RuntimeException('Decryption failed.');
        }

        return $decrypted;
    }
}
