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
        <div class="searchbar">
            <input name="email" type="text" placeholder="Czego szukasz?">
            <i class="fas fa-search"></i>
        </div>
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
        <div class="quick-access">
            <p>Schowek</p>
            <div class="clipboard">
                <p>notatka1</p>
                <p>notatka2</p>
            </div>
            <div class="quick-add">
                <a href="addItem">
                    <button>+Dodaj nową rzecz</button>
                </a>
                <button>+Stwórz walizkę</button>
                <button>+Stwórz stylizację</button>
                <button>+Dodaj wydarzenie</button>
            </div>
            <!--            <p>Kalendarz</p>-->
            <!--            <div class="calendar">-->
            <!--                <p>Wydarzenie 1</p>-->
            <!--                <p>Wydarzenie 2 - ślub</p>-->
            <!--            </div>-->
        </div>
        <div class="content">
            <p>Ostatnio dodane</p>
            <div class="recently-added">
                <p id="item">Rzecz 1</p>
                <p id="item">Rzecz 2</p>
                <p id="item">Rzecz 3</p>
                <p id="item">Rzecz 4</p>
                <p id="item">Rzecz 5</p>
                <p id="item">Rzecz 6</p>
                <p id="item">Rzecz 7</p>
                <p id="item">Rzecz 8</p>
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