<?php

function public_encrypt($plaintext){
    $fp=fopen("./mykey.pub","r");
    $pub_key=fread($fp,8192);
    fclose($fp);
    openssl_get_publickey($pub_key);
    openssl_public_encrypt($plaintext,$crypttext, $pub_key );
    return(base64_encode($crypttext));
}

function private_decrypt($encryptedext){
    $fp=fopen("./mykey.pem","r");
    $priv_key=fread($fp,8192);
    fclose($fp);
    $private_key = openssl_get_privatekey($priv_key);
    openssl_private_decrypt(base64_decode($encryptedext), $decrypted, $private_key);
    return $decrypted;
}

/*
$kalimat = "saya suka susu";

$asdf = public_encrypt($kalimat);
echo $asdf;
echo "<br>";
echo private_decrypt($asdf);

*/