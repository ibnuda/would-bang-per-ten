<?php

$karakter = $_GET['karakter'];

$arrayKarakter = str_split($karakter);
$arrayKode = array();
for ($i=0; $i < count($arrayKarakter); $i++) { 
	$arrayKode[$i] = decbin(ord($arrayKarakter[$i]));
}
//print_r($arrayKode);
echo $karakter . " di enkrip : ";

/* ENKRIP */

$arraySementara = array();
for ($i=0; $i < count($arrayKode); $i++) { 
	$sementara = str_split($arrayKode[$i]);
	$sementara2 = array();
	for ($j = count($sementara) - 1; $j >= 0; $j--) { 
		if ($j == 0) {
			$sementara2[$j] = $sementara[$j];
		} else if ($j != 1) {
			$sementara2[$j - 1] = $sementara[$j];
		} else if ($j == 1) {
			$sementara2[count($sementara) - 1] = $sementara[$j];
		}
	}
	// urutan key pada array $sementara2 tidak urut.
	// ini memang solusi naif dan pelan, tapi it werks. -_-
	$sementara3 = array();
	for ($k=0; $k < count($sementara2); $k++) { 
		$sementara3[$k] = $sementara2[$k];
	}
	$arraySementara[$i] = bindec(implode($sementara3));
}

for ($l=0; $l < count($arraySementara); $l++) { 
	echo chr($arraySementara[$l]);
}
//print_r($arraySementara);