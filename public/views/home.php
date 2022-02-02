<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/home.css">
    <link rel="stylesheet" type="text/css" href="public/css/main_menu.css">
    <script src="https://kit.fontawesome.com/fe5f9ac612.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title>Strona główna</title>
</head>
<body>
<div class="container">
    <?php include('header.php') ?>
    <div class="container2">
        <?php include('clipboard.php') ?>
        <div class="content">
            <p>Ostatnio dodane rzeczy</p>
            <div class="items">
                <?php foreach (array_reverse($items) as $item):?>
                    <div id="project">
                        <img src="/public/uploads/<?= $item->getFile(); ?>">
                    </div>
                <?php endforeach; ?>
            </div>
            <p>Ostatnio dodane stylizacje</p>
            <div class="collections">
                    <?php foreach (array_reverse($stylizations) as $stylization): ?>
                    <div class="stylization">
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
                        <p><?= $stylization->getCollection(); ?></p>
                    </div>
                    <?php endforeach;?>
            </div>
            <p>Nadchodzące wydarzenia</p>
            <div class="events">
            <?php foreach (array_reverse($events) as $event): ?>
                <div id="event">
                    <p><?=$event->getPlace();?></p>
                    <p>Od: <?=$event->getStartDate();?></p>
                    <p>Do: <?=$event->getEndDate();?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<div class="footer"></div>
</body>