<?php

function buat_kamus()
{
	$kamus = array();
	for ($top = 0, $i=126; $i > 31; $i--, $top++) { 
		$kamus[$top] = chr($i);
	}
	return $kamus;
}

function cari_di_kamus($karakter)
{
	$kamus = buat_kamus();
	$nilai_karakter = ord($karakter) - 32;
	return $kamus[$nilai_karakter];
}
function balik_ke_kamus($karakter)
{
	$kamus = buat_kamus();
	$itungan = 0;
	$panjang = count($kamus);
	while ($karakter !== $kamus[$itungan] || $itungan > $panjang) {
		$itungan++;
	}
	return $kamus[$panjang - $itungan - 1];
}
function enkrip_kamus($kalimat)
{
	$array_kalimat = str_split($kalimat);
	for ($i=0; $i < count($array_kalimat); $i++) { 
		$array_kalimat[$i] = cari_di_kamus($array_kalimat[$i]);
	}
	return implode($array_kalimat);
}
function dekrip_kamus($kalimat)
{
	$array_kalimat = str_split($kalimat);
	for ($i=0; $i < count($array_kalimat); $i++) { 
		$array_kalimat[$i] = balik_ke_kamus($array_kalimat[$i]);
	}
	return implode($array_kalimat);
}
/*
echo count($kamus);
print_r($kamus);

*/