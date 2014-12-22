<?php

include './f_chip.php';
include './f_shift.php';
include './f_posisi.php';
include './f_dual.php';
include './f_kamus.php';
include './f_hash.php';

/*
$asdf = enkrip_chip("abcdefghijklmopqrstuvwxyz1234567890~!@#$%^&*()_+ABCDEFGHIJKLMNOPQRSTUVWXYZ[]{};'\"<>?,./|\\");
echo $asdf . "<br>";
echo dekrip_chip($asdf);
//print_r(buat_kamus());
//$asdf = enkrip_trans("saya uska susu sapi");
$asdf = enkrip_trans("saya suka susu sapi");
echo $asdf . "<br>";
$poiu = dekrip_trans($asdf);
echo $poiu . "<br>";

echo inihashingkan($asdf);
$anu = enkrip_trans("sistem keamanan data");
echo $anu . "<br>";
echo dekrip_trans($anu);
$are = str_split("kami pramuka indonesia");
echo enkrip_trans("kami pramuka indonesia", 8);
$are = ke_array_aski("toppestkek");

for ($i=0; $i < count($are); $i++) { 
	//print_r(shifting_kiri(str_split($are[$i])));
	shifting_kiri(str_split($are[$i]));
}
//print_r(enkrip_shift("topkek"));
$kamus = array();
for ($i=32; $i < 127; $i++) { 
	//echo "<br>" . $i . " = '" . chr($i) . "'";
	$kamus[$i - 32] = chr($i);
}
$kamusanu = implode($kamus);
//$lel = enkrip_shift("saya suka susu sapi");
$lel = enkrip_shift($kamusanu);

echo $lel . "<br>";

$kek = dekrip_shift($lel);

echo $kek;*/
