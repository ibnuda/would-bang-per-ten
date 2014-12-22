<?php

function kek_chip($karakter)
{
	$nilai = ord($karakter);
	if ($nilai > 116) {
		return chr($nilai - 85);
	} else {
		return chr($nilai + 10);
	}
}

function lel_chip($karakter)
{
	$nilai = ord($karakter);
	if ($nilai < 42) {
		return chr($nilai + 85);
	} else {
		return chr($nilai - 10);
	}
}
function enkrip_chip($kalimat)
{
	$kalimat = str_split($kalimat);
	for ($i=0; $i < count($kalimat); $i++) { 
		$kalimat[$i] = kek_chip($kalimat[$i]);
	}
	return implode($kalimat);
}

function dekrip_chip($kalimat)
{
	$kalimat = str_split($kalimat);
	for ($i=0; $i < count($kalimat); $i++) { 
		$kalimat[$i] = lel_chip($kalimat[$i]);
	}
	return implode($kalimat);
}