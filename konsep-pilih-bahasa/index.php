<?php
    session_start();
    $default_lang = 'id';

    if($_GET['lang']){
        $_SESSION['lang']   = $_GET['lang'];
        header('location:index.php');
    }

    if(!$_SESSION['lang']){
        $_SESSION['lang']   = $default_lang;
    }

    include $_SESSION['lang'].'.php';
?>

<!DOCTYPE html>
<html lang="<?= $_SESSION['lang'];?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $lang_judul; ?></title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="?lang=en"><?= $lang_en; ?></a></li>
            <li><a href="?lang=id"><?= $lang_id; ?></a></li>
            
        </ul>
    </nav>
    <nav>
        <ul>            
            <li><a href="#"><?= $lang_menu_home; ?></a></li>
            <li><a href="#"><?= $lang_menu_profile; ?></a></li>
            <li><a href="#"><?= $lang_menu_contact; ?></a></li>
        </ul>
    </nav>

    <h2><?= $lang_text; ?></h2>
    <p><?= $lang_welcome; ?></p>
</body>
</html>