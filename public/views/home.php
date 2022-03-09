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
    <header>
        <h1><a href="home">Wieszak</a></h1>
        <nav>
            <ul class="nav-list">
                <li id="active"><a href="home">Start</a></li>
                <li><a href="wardrobe">Szafa</a></li>
                <li><a href="stylizations">Stylizacje</a></li>
                <li><a href="suitcases">Walizki</a></li>
                <li id="last">
                    <a href="settings">Konto<img class="avatar" src="/public/img/Nope,_Wojnarze,_nope..jpg"></a>
                </li>
                <!--                        <select name="Ustawienia">-->
                <!--                            <option>Konto</option>-->
                <!--                            <option>Powiadomienia</option>-->
                <!--                            <option>Ustawienia</option>-->
                <!--                            <option>Wyloguj się</option>-->
                <!--                        </select>-->

                <!--                    <li><a href="community"><i class="far fa-bell"></i></a></li>-->
            </ul>
        </nav>
    </header>
    <div class="container2">
        <?php include('clipboard.php') ?>
        <div class="content">
            <p>Ostatnio dodane</p>
            <div class="items">
                <?php foreach (array_reverse($items) as $item):?>
                    <div id="project">
                        <img src="/public/uploads/<?= $item->getFile(); ?>">
                    </div>
                <?php endforeach; ?>
            </div>
            <p>Kolekcje</p>
            <div class="collections">
                <p id="item">Casual</p>
                <p id="item">Beach</p>
            </div>
            <p>Wydarzenia</p>
            <div class="events">
                <p id="item">Tajlandia 27.01.2022</p>
            </div>
            <!--            <p>Ulubione sklepy i marki</p>-->
            <!--            <div class="favourite-shops">-->
            <!--                <p id="item">NIKE</p>-->
            <!--            </div>-->
        </div>
    </div>
</div>
<div class="footer"></div>
</body>