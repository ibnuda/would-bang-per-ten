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

$arrayAnu = array();
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
	// karena $sementara3 adalah array yang isinya biner, digabung jadi 7 bit data ascii. (y)
	// bindec => dari biner ke desimal.
	$arrayAnu[$i] = implode($sementara3);
	$arraySementara[$i] = bindec(implode($sementara3));
}

$arrayHasilEnkrip = array();
for ($l=0; $l < count($arraySementara); $l++) { 
	// mengembalikan dari kode ascii ke karakter
 	$arrayHasilEnkrip[$l] = chr($arraySementara[$l]);
	//echo chr($arraySementara[$l]);
}
$hasilEnkrip = implode($arrayHasilEnkrip);
echo $hasilEnkrip;
echo "<br>------------------------------------------------------------------<br>";

/* DEKRIP */
echo $hasilEnkrip . " di dekrip jadi .... : ";

for ($i=0; $i < count($arrayAnu); $i++) { 
	$sementara = str_split($arrayAnu[$i]);
	$sementara2 = array();
	for ($j = count($sementara) - 1; $j >= 0; $j--) { 
		if ($j == 0) {
			$sementara2[$j] = $sementara[$j];
		} else if ($j != 1) {
			$sementara2[$j] = $sementara[$j - 1];
		} else if ($j == 1) {
			$sementara2[$j] = $sementara[count($sementara) - 1];
		}
	}
	$sementara3 = array();
	for ($k=0; $k < count($sementara2); $k++) { 
		$sementara3[$k] = $sementara2[$k];
	}
	// karena $sementara3 adalah array yang isinya biner, digabung jadi 7 bit data ascii. (y)
	// bindec => dari biner ke desimal.
	$arrayAnu[$i] = implode($sementara3);
	$arraySementara[$i] = bindec(implode($sementara3));
}
$arrayHasilDekrip = array();
for ($l=0; $l < count($arraySementara); $l++) { 
	// mengembalikan dari kode ascii ke karakter
 	$arrayHasilDekrip[$l] = chr($arraySementara[$l]);
	//echo chr($arraySementara[$l]);
}
$hasilDekrip = implode($arrayHasilDekrip);
echo $hasilDekrip;
