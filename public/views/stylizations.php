<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/main_menu.css">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/stylizations.css">
    <script src="https://kit.fontawesome.com/fe5f9ac612.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title>Stylizacje</title>
</head>
<body>
<div class="container">
    <header>
        <h1><a href="home">Wieszak</a></h1>
        <nav>
            <ul class="nav-list">
                <li><a href="home">Start</a></li>
                <li><a href="wardrobe">Szafa</a></li>
                <li id="active"><a href="stylizations">Stylizacje</a></li>
                <li><a href="suitcases">Walizki</a></li>
                <li id="last">
                    <a href="settings">Konto<img class="avatar" src="/public/img/Nope,_Wojnarze,_nope..jpg"></a>
                </li>
            </ul>
        </nav>
    </header>
    <div class="container2">
        <?php include('clipboard.php') ?>
        <div class="content">
            <div class="categories">
                <p id="active2">Wszystko</p>
                <p>Codzienne</p>
                <p>Praca</p>
                <p>Sportowe</p>
                <p>Wieczorowe</p>
            </div>
            <p>Losowa stylizacja:</p>
            <div id="random-stylization">
                <img src="/public/uploads/<?=$topItems[random_int(0,sizeof($topItems)-1)]->getFile() ?>">
                <img src="/public/uploads/<?= $bottomItems[random_int(0,sizeof($bottomItems)-1)]->getFile() ?>">
                <img src="/public/uploads/<?= $footwear[random_int(0,sizeof($footwear)-1)]->getFile() ?>">
                <img src="/public/uploads/<?= $accessories[random_int(0,sizeof($accessories)-1)]->getFile() ?>">
            </div>
            <div class="stylizations">
                <?php foreach(array_reverse($stylizations) as $stylization):?>
                <div id="stylization">
                    <img src="/public/<?php if(is_null($stylization->getUp())) {
                        echo 'img/top.jpg';
                    } else echo "uploads/".$stylization->getUp(); ?> ">
                    <img src="/public/<?php if(is_null($stylization->getBottom())) {
                        echo 'img/bottom.jpg';
                    } else echo "uploads/".$stylization->getBottom(); ?> ">
                    <img src="/public/<?php if(is_null($stylization->getFootwear())) {
                        echo 'img/footwear.jpg';
                    } else echo "uploads/".$stylization->getFootwear(); ?> ">
                    <img src="/public/<?php if(is_null($stylization->getAccessories())) {
                        echo 'img/accesories.jpg';
                    } else echo "uploads/".$stylization->getAccessories(); ?> ">
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="footer"></div>
</div>
</body>