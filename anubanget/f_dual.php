<?php
//function public_encrypt($plaintext){
function enkrip_dual($teks_biasa_wae){
    $fp=fopen("./mykey.pub","r");
    $pub_key=fread($fp,8192);
    fclose($fp);
    openssl_get_publickey($pub_key);
    openssl_public_encrypt($teks_biasa_wae, $teks_ruwet_banget, $pub_key );
    return(base64_encode($teks_ruwet_banget));
}

//function private_decrypt($encryptedext){
function dekrip_dual($teks_ruwet_banget){
    $fp=fopen("./mykey.pem","r");
    $pri_key=fread($fp,8192);
    fclose($fp);
    $private_key = openssl_get_privatekey($pri_key);
    openssl_private_decrypt(base64_decode($teks_ruwet_banget), $teks_biasa_wae, $private_key);
    return $teks_biasa_wae;
}
