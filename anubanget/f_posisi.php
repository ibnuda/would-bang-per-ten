<?php

function get_kolom($kalimat, $baris)
{
	$panjang_kalimat = count($kalimat);
//	if ($panjang_kalimat < $baris || $baris == 0) {
//		$kolom = $panjang_kalimat / 2;
//	} else {
		$kolom = (($panjang_kalimat - ($panjang_kalimat % $baris)) / $baris ) + 1;
//	}
	return $kolom;
}
function preti_prin($array_dua)
{
	$asdf = array();
	$itung = 0;
	for ($k=0; $k < count($array_dua); $k++) { 
		for ($l=0; $l < count($array_dua[$k]); $l++) { 
			$asdf[$itung] = $array_dua[$k][$l];
			$itung++;
		}
	}
	//print_r($asdf);
	return implode($asdf);
}

function transpos($array_satu, $array_dua)
{
	for ($i=0; $i < count($array_satu); $i++) { 
		for ($j=0; $j < count($array_satu[$i]); $j++) { 
			//if ($array_satu[$i][$j] != null) {
				$array_dua[$j][$i] = $array_satu[$i][$j];
			//}
		}
	}
	print_r($array_dua);
	//return preti_prin($array_dua);
	return $array_dua;
}

function prep_t($array_karakter, $kolom)
{
	$array_pra_enkrip = array_chunk($array_karakter, $kolom);
	//print_r($array_pra_enkrip);
	$array_enkrip = array(array());
	return array($array_pra_enkrip, $array_enkrip);
	//return transpos($array_pra_enkrip, $array_enkrip);
}

function enkrip_trans($karakter)
{
	$array_karakter = str_split($karakter);
	$kolom = get_kolom($array_karakter, 3);
	$preparasi = prep_t($array_karakter, $kolom);
	$array_hasil_transpos = transpos($preparasi[0], $preparasi[1]);
	//$hasil_transpos = transpos($array_hasil_transpos);
	$hasil_enkripsi = preti_prin($array_hasil_transpos);
	return $hasil_enkripsi;
//	return prep_t($array_karakter, $kolom);
}

function dekrip_trans($karakter)
{
	$karakter = str_split($karakter);
	for ($i=0; $i < count($karakter); $i++) { 
		if (($i * 3) > (count($karakter) * 2)) {
			echo $karakter[($i * 3) - ((count($karakter) * 2))];
		} else if ((($i * 3) < (count($karakter) * 2)) && ($i * 3 ) > (count($karakter) * 1)){
			echo $karakter[($i * 3) - count($karakter)];
		} else {
			echo $karakter[($i * 3)];
		}
	}
}
