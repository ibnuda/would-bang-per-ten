<?php

$data = $_POST['data'];

$publickey = openssl_pkey_get_public('file://C:/xampp/htdocs/eskade/would-bang-per-ten/publik.key');
$privatkey = openssl_pkey_get_private('file://C:/xampp/htdocs/eskade/would-bang-per-ten/privat.key');

echo $data . " dienkrip jadi ..... <br>";
openssl_public_encrypt($data, $enkriptet, $publickey);
echo $enkriptet;

echo "<br>----------------------------------------------<br>";

echo "benda ruwet tadi didekrip jadi...... <br>";
openssl_private_decrypt($enkriptet, $dekriptet, $privatkey);
echo $dekriptet;

?>