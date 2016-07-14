<?php

namespace MT4;

Class SaltCriptModel {

    public static $salt = '!x#@1*-SyrDuJIxK7&l&Z&Ou(^H7Z5iz';

    public static function encrypt($plain, $key, $hmacSalt = null) {
        self::_checkKey($key, 'encrypt()');

        if ($hmacSalt === null) {
            $hmacSalt = self::$salt;
        }

        $key = substr(hash('sha256', $key . $hmacSalt), 0, 32);
        $algorithm = MCRYPT_RIJNDAEL_128;
        $mode = MCRYPT_MODE_CBC;

        $ivSize = mcrypt_get_iv_size($algorithm, $mode);
        $iv = mcrypt_create_iv($ivSize, MCRYPT_DEV_URANDOM);
        $ciphertext = $iv . mcrypt_encrypt($algorithm, $key, $plain, $mode, $iv);
        $hmac = hash_hmac('sha256', $ciphertext, $key);
        return $hmac . $ciphertext;
    }

    # Check key
    protected static function _checkKey($key, $method) {
        if (strlen($key) < 32) {
            echo "Invalid public key $key, key must be at least 256 bits (32 bytes) long."; die();
        }
    }

    # Decrypt a value using AES-256.
    public static function decrypt($cipher, $key, $hmacSalt = null) {
        self::_checkKey($key, 'decrypt()');
        if (empty($cipher)) {
            echo 'The data to decrypt cannot be empty.'; die();
        }
        if ($hmacSalt === null) {
            $hmacSalt = self::$salt;
        }

        $key = substr(hash('sha256', $key . $hmacSalt), 0, 32); # Generate the encryption and hmac key.

        $macSize = 64;
        $hmac = substr($cipher, 0, $macSize);
        $cipher = substr($cipher, $macSize);

        $compareHmac = hash_hmac('sha256', $cipher, $key);
        if ($hmac !== $compareHmac) {
            return false;
        }

        $algorithm = MCRYPT_RIJNDAEL_128;
        $mode = MCRYPT_MODE_CBC;
        $ivSize = mcrypt_get_iv_size($algorithm, $mode);

        $iv = substr($cipher, 0, $ivSize);
        $cipher = substr($cipher, $ivSize);
        $plain = mcrypt_decrypt($algorithm, $key, $cipher, $mode, $iv);
        return rtrim($plain, "\0");
    }


    public function genRandString($length = 0) {
        $charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $str = '';
        $count = strlen($charset);
        while ($length-- > 0) {
            $str .= $charset[mt_rand(0, $count-1)];
        }
        return $str;
    }


}