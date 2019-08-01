<?php
// ARRAY to JSON (encode)
// $mahasiswa =[
//     [
//         "nama"  => "tria bagus",
//         "kelas" => 3,
//         "email" => "triatop9@gmail.com"
//     ],[
//         "nama"  => "nur taufik",
//         "kelas" => 3,
//         "email" => "triatop10@gmail.com"
//         ]
//     ];
// $dataM = json_encode($mahasiswa);
// echo $dataM;

// ARRAY TO JSON with Database
$db     = new PDO('mysql:host=localhost;dbname=survei_santri','toor','1');
$table  = $db->prepare('SELECT * FROM user');
$table->execute();
$santri = $table->fetchAll(PDO::FETCH_ASSOC);

$data = json_encode($santri);
echo $data;