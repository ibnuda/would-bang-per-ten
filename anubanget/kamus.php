<?php

//$kamus=array("q","a","z","w","s","x","e","d","c","r","f","v","t","g","b","y","h","n","u","j","m","i","k","o","l","p","Q","A","Z","W","S","X","E","D","C","R","F","V","+","G","B","Y","!","N","U","J","M","@","K","O","L","P","2","5","7","1","3","4","6","0","8","9","-","=");

function buat_kamus()
{
	$kamus = array();
	for ($top = 0, $i=126; $i > 31; $i--, $top++) { 
		$kamus[$top] = chr($i);
	}
	return $kamus;
}

echo count($kamus);
print_r($kamus);
