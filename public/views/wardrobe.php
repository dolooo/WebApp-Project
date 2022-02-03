<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/wardrobe.css">
    <link rel="stylesheet" type="text/css" href="public/css/main_menu.css">
    <script type="text/javascript" src="/public/js/search.js" defer></script>
    <script type="text/javascript" src="/public/js/deleteItem.js" defer></script>
    <script type="text/javascript" src="/public/js/filter.js" defer></script>
    <script src="https://kit.fontawesome.com/fe5f9ac612.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title>Szafa</title>
</head>
<body>
<div class="container">
    <?php include('header.php') ?>
    <div class="container2">
        <?php include('clipboard.php') ?>
        <div class="content">
            <div class="searchbar">
                <input name="searchbar" type="text" placeholder="Czego szukasz?">
                <i class="fas fa-search"></i>
            </div>
<!--                        <div class="wardrobes">-->
<!--                            <p id="ward">szafa w domu</p>-->
<!--                            <p id="ward">szafa w mieszkaniu</p>-->
<!--                            <p id="ward">+Dodaj szafę</p>-->
<!--                        </div>-->
            <div class="categories">
                <p onclick="filter('')">Wszystko</p>
                <p onclick="filter('Swetry i kardigany')">Swetry i kardigany</p>
                <p onclick="filter('Kurtki i płaszcze')">Kurtki i płaszcze</p>
                <p onclick="filter('Koszule')">Koszule</p>
                <p onclick="filter('Spodnie')">Spodnie</p>
                <p onclick="filter('Bluzy')">Bluzy</p>
                <p onclick="filter('Koszulki')">Koszulki</p>
                <p onclick="filter('Dodatki')">Dodatki</p>
                <p onclick="filter('Obuwie')">Obuwie</p>
                <p onclick="filter('Dżinsy')">Dżinsy</p>
                <p onclick="filter('Marynarki i garnitury')">Marynarki i garnitury</p>
                <p onclick="filter('Szorty')">Szorty</p>
                <p onclick="filter('Bielizna')">Bielizna</p>
                <p onclick="filter('Inne')">Inne</p>
            </div>
            <div class="items">
                <?php foreach (array_reverse($items) as $item): ?>
                    <div id="item">
                        <img id="file" src="/public/uploads/<?= $item->getFile(); ?>" title="<?= $item->getFile(); ?>">
                        <div>
                            <div class="information">
                                <div class="details">
                                    <p><?= $item->getBrand(); ?></p>
                                    <p><?= $item->getSize(); ?></p>
                                </div>
                                <div class="manage">
                                    <i class="fas fa-pencil-alt"></i>
                                    <i class="fas fa-trash-alt"></i>
                                </div>
                            </div>
                            <p id="description"><?= $item->getDescription(); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php') ?>
</body>

<template id="items-template">
    <div class="items">
        <div id="item">
            <img src="">
            <div>
                <div class="information">
                    <div class="details">
                        <p id="detail1"></p>
                        <p id="detail2"></p>
                    </div>
                    <div class="manage">
                        <i class="fas fa-pencil-alt"></i>
                        <i class="fas fa-trash-alt"></i>
                    </div>
                </div>
                <p id="description"></p>
            </div>
        </div>
    </div>
</template>