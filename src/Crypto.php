<?php

/**
 * Crypto - Encrypt or Decrypt strings and Arrays in PHP
 * PHP Version: At least 5.6
 *
 * You're wellcome to see the repository of this project: https://github.com/robertogriel/crypt-array
 *
 * @author    Roberto Griel Filho <roberto@griel.com.br>
 * @copyright 2020 - 2022 - Roberto Griel Filho
 * You can use this project, but THERE IS NO WARRANTY, without even implited 
 * @note: You can use this project, but THERE IS NO WARRANTY, without even implited 
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

namespace Griel\Crypto;

class Crypto
{

    private $secret;
    private $secret_iv;
    private $base64;
    private $alg;

    public function __construct($secret,  $secret_iv, $options = [
        'base64'=>false
    ])
    {
        $this->secret = pack('a16', $secret);
        $this->secret_iv = pack('a16', $secret_iv);
        $this->base64 = ($options['base64']) ? $options['base64'] : false;
        $this->alg = "AES-128-CBC";
    }

    private function crypt($data, $q = null) 
    {


        if (!isset($q) && $q < 1) {
            $keys = array_keys($data);
            $values = array_values($data);
            $final = [];
            $qnty = count($data);

            for ($a = 0; $a < $qnty; $a++) {


                $crypt = openssl_encrypt(
                    $values[$a],
                    $this->alg,
                    $this->secret,
                    0,
                    $this->secret_iv
                );
                
                $this->base64 ? array_push($final, base64_encode($crypt)) : array_push($final, $crypt);
    
                array_merge($data, $final);
            }

            $implodeKeys = implode(',', $keys);

            $implodeValue = implode(',', $final);

            $encrypted = array_combine (explode(',', $implodeKeys), explode(',', $implodeValue));

            return $encrypted;

        } else {

            $crypt = openssl_encrypt(
                $data,
                $this->alg,
                $this->secret,
                0,
                $this->secret_iv
            );

            if ($this->base64) {
                return base64_encode($crypt);
            } else {
                return $crypt;
            }

        }    

    }

    private function decrypt($data, $q = null) 
    {

        if (!isset($q) && $q < 1) {
            $keys = array_keys($data);
            $values = array_values($data);
            $final = [];
            $qnty = count($data);

            for ($a = 0; $a < $qnty; $a++) {

                ($this->base64) ? $values[$a] = base64_decode($values[$a]) : $values[$a];

                $crypt = openssl_decrypt(
                    $values[$a],
                    $this->alg,
                    $this->secret,
                    0,
                    $this->secret_iv
                );
    
                array_push($final, $crypt);
    
                array_merge($data, $final);
            }

            $implodeKeys = implode(',', $keys);

            $implodeValue = implode(',', $final);

            $decrypted = array_combine (explode(',', $implodeKeys), explode(',', $implodeValue));

            return $decrypted;

        } else {

            ($this->base64) ? $data = base64_decode($data) : $data;
            
            $decript = openssl_decrypt(
                $data,
                $this->alg,
                $this->secret,
                0,
                $this->secret_iv
            );


            return $decript;

        }    

    }
  
    public function getEncrypted($data, $q = null)
    {

        $result = $this->crypt($data, $q);

        return $result;

    }

    public function getDecrypted($data, $q = null)
    {
        $result = $this->decrypt($data, $q);

        return $result;
    }
}