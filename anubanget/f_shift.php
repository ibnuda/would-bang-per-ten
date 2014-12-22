<?php

function urutkan($array_ndak_urut)
{
	$array_urut = array();
	for ($i=0; $i < count($array_ndak_urut); $i++) { 
		$array_urut[$i] = $array_ndak_urut[$i];
	}
	return $array_urut;
}
function ke_array_aski($kalimat)
{
	$array_karakter = str_split($kalimat);
	$array_kode = array();

	for ($i=0; $i < count($array_karakter); $i++) { 
		$array_kode[$i] = decbin(ord($array_karakter[$i]));
	}

	return $array_kode;
}

function shifting_kiri($kode_aski)
{
	$array_sementara = array();
	$array_kembalian = array();
	for ($j = count($kode_aski) - 1; $j >= 0; $j--) { 
		if ($j == 0) {
			$array_sementara[$j] = $kode_aski[$j];
		} else if ($j != 1) {
			$array_sementara[$j - 1] = $kode_aski[$j];
		} else if ($j == 1) {
			$array_sementara[count($kode_aski) - 1] = $kode_aski[$j];
		}
	}
	return urutkan($array_sementara);
}
function shifting_kanan($kode_aski)
{
	$array_sementara = array();
	$array_kembalian = array();
	for ($j = count($kode_aski) - 1; $j >= 0; $j--) { 
		if ($j == 0) {
			$array_sementara[$j] = $kode_aski[$j];
		} else if ($j != 1) {
			$array_sementara[$j] = $kode_aski[$j - 1];
		} else if ($j == 1) {
			$array_sementara[$j] = $kode_aski[count($kode_aski) - 1];
		}
	}
	return urutkan($array_sementara);
}
function enkrip_shift($kalimat)
{
	$array_kode = ke_array_aski($kalimat);
	$array_enkrip = array();
	for ($i=0; $i < count($array_kode); $i++) { 
		$kode = shifting_kiri(str_split($array_kode[$i]));
		$array_enkrip[$i] = chr(bindec(implode($kode)));
	}
	return implode($array_enkrip);
}

function dekrip_shift($kalimat)
{
	$array_kode = ke_array_aski($kalimat);
	$array_dekrip = array();
	for ($i=0; $i < count($array_kode); $i++) { 
		$kode = shifting_kanan(str_split($array_kode[$i]));
		$array_dekrip[$i] = chr(bindec(implode($kode)));
	}
	return implode($array_dekrip);
}