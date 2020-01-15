<?php
    require 'vendor/autoload.php';

    use GuzzleHttp\Client;

    $client = new Client();
    $response = $client->request('GET','http://omdbapi.com', [
        'query' =>[
            'apikey' => '8a96e3fa',
            's' => 'cinta'
        ]
    ]);

    // query = params in postman
    // var_dump($response->getBody()->getContents()); // back string 
    // echo $response->getBody()->getContents(); // back json 
    $result = json_decode($response->getBody()->getContents(), true); // back to array
    // var_dump($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Guzzle Rest</title>
</head>
<body>
    <?php foreach($result['Search'] as $movie):?>
    <ul>
        <li>Title : <?= $movie['Title'];?></li>
        <li>Year : <?= $movie['Year'];?></li>
        <li>
            <img src="<?= $movie['Poster'];?>" width="80">
        </li>
    </ul>
    <?php endforeach;?>
</body>
</html>