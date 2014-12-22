<?php

/**
 * Nama  = Ibnu Daru Aji.
 * NIM   = M3112073
 * Kelas = TIB
 * Shift = 1
 * Angkatan = 2012
 *
 *
 * https://engineering.purdue.edu/kak/compsec/NewLectures/Lecture15.pdf
 * karena punya bapak ndak jelas, je. ._.
 *
 * langkah yang dilakuken.
 * 1. mbuat pesan jadi kelipatan 4 bit.
 * 2. mbuat array dengan ukuran 4 bit dari pesan diatas.
 * 3. untuk tiap komponen lakukan sebagai berikut
 *      tiap komponen dipecah jadi 4 bagian biner.
 *      jika komponen == no 1, lakukan rutin kompres dengan variabel key.
 *      jika komponen != no 1,
 *          lakukan rutin kompres dengan variabel keyhasil.
 *          hasil rutin kompres jadi variabel keyhasil.
 * 4. cetak keyhasil (6 bit).
 * 5. selesai.
 *
 */


function buatarray4bit($kalimat)
{
  $arrayKembalian = array();
  $itung = 0;
  while (($itung * 4) < strlen($kalimat)) {
    $mulai = $itung * 4;
    $arrayKembalian[$itung] = substr($kalimat, $mulai, 4);
    $itung++;
  }
  return $arrayKembalian;
}

function buatkelipatan4bit($kalimat)
{
  $itung = strlen($kalimat);
  if ((strlen($kalimat) % 4) != 0) {
    while (($itung % 4) != 0) {
      $kalimat = $kalimat . '0';
      $itung++;
    }
  }
  return $kalimat;
}
/*
 * rutin kompres.
 * 1. mulai perulangan 10 kali
 *      jika perulangan kurang dari 6
          $key = '010101010101010101010101';
          $geser = ($abc & $key) ;//^ ((~$ccd) & $aba);
 *      selainnya
          $geser = ($ccd | $key) ;//^ ((~$cbd) & $ccd);
     selesai perulangan.
 * 2. kembalian geser;
 */
function kompres($pecahanKalimat, $key)
{
  $a = '0' . decbin(ord($pecahanKalimat[0]));
  $b = '0' . decbin(ord($pecahanKalimat[1]));
  $c = '0' . decbin(ord($pecahanKalimat[2]));
  $d = '0' . decbin(ord($pecahanKalimat[3]));
  $abc = $a . $b . $c;
  $cdb = $c . $d . $b;
  $ccd = $c . $c . $d;
  $aba = $a . $b . $a;
  if (!(isset($geser))) {
    $geser = '101010101010101010101010';
  }
  for ($i = 0; $i < 10; $i++) {
    if ($i < 5) {
      //$key = '010101010101010101010101';
      $geser = ($abc ^ $geser) ;//^ ((~$ccd) & $aba);
    } else {
      $geser = ($ccd | $geser) ;//^ ((~$cbd) & $ccd);
    }
  }
  return $geser;
}

function inihashingkan($kalimat)
{
  $key = 0x7;
  for ($i = 0; $i < strlen($kalimat) - 3; $i++) {
    if ($i == 0) {
      $kembalian = kompres(substr($kalimat, $i, 4), $key);
    } else {
      $kembalian = kompres(substr($kalimat, $i, 4), $kembalian);
    }
    $i = $i + 3;
  }
  return bindec(substr($kembalian, 0, 4)) . ' ' .
         bindec(substr($kembalian, 4, 4)) . ' ' .
         bindec(substr($kembalian, 8, 4)) . ' ' .
         bindec(substr($kembalian, 12, 4)) . ' ' .
         bindec(substr($kembalian, 16, 4)) . ' ' .
         bindec(substr($kembalian, 20, 4)) . ' ' ;
}

/*
$kalimat = "saya kurang dolan dan lapar sangat";
$kalimat = buatkelipatan4bit($kalimat);
//echo $kalimat;
//echo strlen($kalimat);
//print_r(buatarray4bit($kalimat));
echo inihashingkan($kalimat);
echo '<br> ibnu daru aji ';
echo inihashingkan('ibnu daru aji');
echo '<br> tom kerkie ';
echo inihashingkan('tom kerkie');
echo '<br> tom   kerkie ';
echo inihashingkan('tom   kerkie');
echo '<br> tom                                              kerkie ';
echo inihashingkan('tom                                              kerkie');
echo '<br> tomi 182 kerkie ';
echo inihashingkan("tomi 182 kerkie");
echo '<br> lemper ';
echo inihashingkan('lemper');
echo '<br> lelle ';
echo inihashingkan('lelle');
echo '<br> nama saya ibnu daru aji. saya senang bermain main dengan mainan ';
echo inihashingkan('nama saya ibnu daru aji. saya senang bermain main dengan mainan');
echo '<br> saya kebelet ee\'';
echo inihashingkan("saya kebelet ee'");
echo '<br> saya kebelet  ee\'';
echo inihashingkan("saya kebelet  ee'");
echo '<br> saya kurang dolan ';
echo inihashingkan('saya kurang dolan');
echo '<br> sistem keamanan data ';
echo inihashingkan('sistem keamanan data');
echo '<br> kemerdekaan indonesia pada tahun 1945 ';
echo inihashingkan('kemerdekaan indonesia pada tahun 1945');
echo '<br> (null) ';
echo inihashingkan('null');
echo '<br> 1 ';
echo inihashingkan('1');
echo '<br> 22222 ';
echo inihashingkan('22222');

// Lisensi : ngikutin lisensinya panduan diatas.
*/