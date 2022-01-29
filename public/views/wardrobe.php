<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/wardrobe.css">
    <link rel="stylesheet" type="text/css" href="public/css/main_menu.css">
    <script type="text/javascript" src="/public/js/search.js" defer></script>
    <script type="text/javascript" src="/public/js/deleteItem.js" defer></script>
    <script src="https://kit.fontawesome.com/fe5f9ac612.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title>Szafa</title>
</head>
<body>
<div class="container">
    <header>
        <h1><a href="home">Wieszak</a></h1>
        <nav>
            <ul class="nav-list">
                <li><a href="home">Start</a></li>
                <li id="active"><a href="wardrobe">Szafa</a></li>
                <li><a href="stylizations">Stylizacje</a></li>
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
            <div class="searchbar">
                <input name="searchbar" type="text" placeholder="Czego szukasz?">
                <i class="fas fa-search"></i>
            </div>
            <!--            <div class="wardrobes">-->
            <!--                <p id="ward">szafa w domu</p>-->
            <!--                <p id="ward">szafa w mieszkaniu</p>-->
            <!--                <p id="ward">+Dodaj szafę</p>-->
            <!--            </div>-->
            <div class="categories">
                <p id="active2">Wszystko</p>
                <p>Swetry i kardigany</p>
                <p>Kurtki i płaszcze</p>
                <p>Koszule</p>
                <p>Spodnie</p>
                <p>Bluzy</p>
                <p>Koszulki</p>
                <p>Dodatki</p>
                <p>Obuwie</p>
                <p>Dżinsy</p>
                <p>Marynarki i garnitury</p>
                <p>Szorty</p>
                <p>Bielizna</p>
                <p>Inne</p>
            </div>
            <div class="items">
                <?php foreach (array_reverse($items) as $item): ?>
                    <div id="item">
                        <img src="/public/uploads/<?= $item->getFile(); ?>">
                        <div>
                            <div class="information">
                                <div class="details">
                                    <p><?= $item->getBrand(); ?></p>
                                    <p><?= $item->getSize(); ?></p>
                                </div>
                                <div class="manage">
                                    <i class="fas fa-pencil-alt"></i>
                                    <i class="fas fa-trash-alt" onclick="deleteItem(<?$item?>)"></i>
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
<div class="footer"></div>
</body>

<template id="items-template">
    <div class="items">
        <div id="item">
            <img src="">
            <div>
                <div class="information">
                    <div class="details">
                        <p id="detail1"><?= $item->getBrand(); ?></p>
                        <p id="detail2"><?= $item->getSize(); ?></p>
                    </div>
                    <div class="manage">
                        <i onclick="" class="fas fa-pencil-alt"></i>
                        <i class="fas fa-trash-alt"></i>
                    </div>
                </div>
                <p id="description"><?= $item->getDescription(); ?></p>
            </div>
        </div>
    </div>
</template>