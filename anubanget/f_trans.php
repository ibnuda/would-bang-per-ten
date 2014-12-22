<?php

function dekrip_shit($kalimat)
{
	$kalimat = str_split($kalimat);
	$panjang = count($kalimat);
	$p1 = $panjang; 
	$p2 = $panjang * 2; 
	//$p3 = $panjang * 3; 
	for ($i=0; $i < $panjang; $i++) { 
		if (($i * 2) > $p2) {
			echo $kalimat[($i * 2) - $p2];
		} else {
			echo $kalimat[($i * 2) - $p];
		}
	}
}

function enkrip_shit($kalimat)
{
	
}