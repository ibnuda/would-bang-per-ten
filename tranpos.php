<?php

$karakter = $_GET['kalimat'];
$kolom = $_GET['kolom'];

$panjangKarakter = strlen($karakter);

echo "panjang karakter = " . $panjangKarakter . "<br>";

if ($panjangKarakter < $kolom) {
	echo "karena kolom lebih panjang dari karakter, ";
	echo "ngatur kolom jadi 3 aja.<br>";
	$kolom = 3;
}
echo "kolom = " . $kolom . "<br>";
$matriks = (($panjangKarakter - ($panjangKarakter % $kolom)) / $kolom )  + 1;
echo "jadi panjang matriks dimensi matriks = " . $matriks . " x " . $kolom . "<br>";

/* ENKRIP */
/*
   IBNUDARUAJI (3) => IBNU
   					  DARU
   					  AJI
   					   i
   					   v
   					  IDABAJNRIUU
 */

$arrayKarakter = str_split($karakter);

// mbuat array dua dimensi pakai array_chunk.
$arrayPraEnkrip = array_chunk($arrayKarakter, $matriks);
$arrayEnkrip = array(array());

for ($i=0; $i < count($arrayPraEnkrip); $i++) { 
	for ($j=0; $j < count($arrayPraEnkrip[$i]); $j++) { 
		if ($arrayPraEnkrip[$i][$j] != null) {
			$arrayEnkrip[$j][$i] = $arrayPraEnkrip[$i][$j];
		} 
	}
}
echo "hasil enkrip untuk " . $karakter . " adalah = ";

for ($k=0; $k < count($arrayEnkrip); $k++) { 
	for ($l=0; $l < count($arrayEnkrip[$k]); $l++) { 
		echo $arrayEnkrip[$k][$l];
	}
}
echo "<br>";

/* DEKRIP */
$arrayDekrip = array(array());
for ($m=0; $m < count($arrayEnkrip); $m++) { 
	for ($n=0; $n < count($arrayEnkrip[$m]); $n++) { 
		if ($arrayEnkrip[$m][$n] != null) {
			$arrayDekrip[$n][$m] = $arrayEnkrip[$m][$n];
		} else {
			# code...
		}
		
	}
}

echo "sedangkan untuk dekripnya = " ;
for ($o=0; $o < count($arrayDekrip); $o++) { 
	for ($p=0; $p < count($arrayDekrip[$o]); $p++) { 
		echo $arrayDekrip[$o][$p];
	}
}
