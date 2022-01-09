<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/wardrobe.css">
    <link rel="stylesheet" type="text/css" href="public/css/main_menu.css">
    <script src="https://kit.fontawesome.com/fe5f9ac612.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title>Szafa</title>
</head>
<body>
<div class="container">
    <header>
        <h1><a href="home">Wieszak</a></h1>
        <div class="searchbar">
            <input name="email" type="text" placeholder="Czego szukasz?">
            <i class="fas fa-search"></i>
        </div>
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
            <div class="wardrobes">
                <p id="ward">szafa w domu</p>
                <p id="ward">szafa w mieszkaniu</p>
                <p id="ward">+Dodaj szafę</p>
            </div>
            <div class="categories">
                <p id="cat">Wszystko</p>
                <p id="cat">Swetry i kardigany</p>
                <p id="cat">Kurtki i płaszcze</p>
                <p id="cat">Koszule</p>
                <p id="cat">Spodnie</p>
                <p id="cat">Bluzy</p>
                <p id="cat">Koszulki</p>
                <p id="cat">Dodatki</p>
                <p id="cat">Obuwie</p>
                <p id="cat">Dżinsy</p>
                <p id="cat">Marynarki i garnitury</p>
                <p id="cat">Szorty</p>
                <p id="cat">Bielizna</p>
                <p id="cat">Inne</p>
            </div>
            <div class="items">
                <?php foreach($items as $item):?>
                <div id="project">
                    <img src="/public/uploads/<?= $item->getFile(); ?>">
                    <div>
                        <div class="details">
                            <p><?= $item->getBrand(); ?></p>
                            <p><?= $item->getSize(); ?></p>
                        </div>
                        <p><?= $item->getDescription(); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<div class="footer"></div>
</body>