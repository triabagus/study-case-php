<?php

$data   = file_get_contents('coba.json');
$siswa  = json_decode($data,true);

var_dump($siswa);

echo "<br>".$siswa[0]['pembimbing']['pembimbing1'];


