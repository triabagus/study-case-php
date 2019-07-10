<?php
// $waktu = 4000;
// function waktu($waktu){
//     if(($waktu>0) and ($waktu<60)){
//         $lama=number_format($waktu,2)." detik";
//         return $lama;
//     }
//     if(($waktu>60) and ($waktu<3600)){
//         $detik=fmod($waktu,60);
//         $menit=$waktu-$detik;
//         $menit=$menit/60;
//         $lama=$menit." Menit ".number_format($detik,2)." detik";
//         return $lama;
//     }
//     elseif($waktu >3600){
//         $detik=fmod($waktu,60);
//         $tempmenit=($waktu-$detik)/60;
//         $menit=fmod($tempmenit,60);
//         $jam=($tempmenit-$menit)/60;    
//         $lama=$jam." Jam ".$menit." Menit ".number_format($detik,2)." detik";
//         return $lama;
//     }
// }

$waktuYangDiminta = 4567; // nilai detik yang diminta, (BISA DIUBAH)

if($waktuYangDiminta > 3600){
    $detik=fmod($waktuYangDiminta,60);
    $tempmenit=($waktuYangDiminta-$detik)/60;
    $menit=fmod($tempmenit,60);
    $jam=($tempmenit-$menit)/60;    
    $lama=$jam." Jam ".$menit." Menit ".number_format($detik,2)." detik";
}
echo "Detik = ".$waktuYangDiminta."<br>";
echo "Hasil = ".$lama;
?>