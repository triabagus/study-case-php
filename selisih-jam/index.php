<?php
$jam_awal   = "10:00";
$jam_akhir  = "11:00";

$date_time_selisih_awal = new DateTime($jam_awal);
$date_time_selisih_akhir = new DateTime($jam_akhir);
$selisih = $date_time_selisih_akhir->diff($date_time_selisih_awal);

$jam = $selisih->format('%h');
$menit = $selisih->format('%i');

if($menit >= 0 && $menit <= 9){
    $menit = "0".$menit;
}

$hasil = $jam.":".$menit;
// $hasil = number_format($hasil,2);
echo "Selisih antara ".$jam_awal." dan ".$jam_akhir." adalah : ".$hasil;
echo "<br>".gettype($hasil);
