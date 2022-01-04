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
                    <p id="item">rzecz1</p>
                    <p id="item">rzecz1</p>
                    <p id="item">rzecz1</p>
                    <p id="item">rzecz1</p>
                    <p id="item">rzecz1</p>
                    <p id="item">rzecz1</p>
                    <p id="item">rzecz1</p>
                </div>

        </div>
    </div>
</div>
<div class="footer"></div>
</body>