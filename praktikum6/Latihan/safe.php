<?php
    $chipering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($chipering);
    $options = 0;

    $encription_iv = "1234567890123456";

    $encription_key = "K3519076";
    // cookie value encryption
    function encryption($value){
        return openssl_encrypt($value, $GLOBALS["chipering"], $GLOBALS["encription_key"], $GLOBALS["options"], $GLOBALS["encription_iv"]);
    }

    // cookie value decryption
    function decryption($value){
        return openssl_decrypt($value, $GLOBALS["chipering"], $GLOBALS["encription_key"], $GLOBALS["options"], $GLOBALS["encription_iv"]);

    }


?>