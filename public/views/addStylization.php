<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/add_item.css">
    <link rel="stylesheet" type="text/css" href="public/css/main_menu.css">
    <script src="https://kit.fontawesome.com/fe5f9ac612.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title>Dodaj nową stylizację</title>
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
            </ul>
        </nav>
    </header>
    <div class="container2">
        <?php include('clipboard.php') ?>
        <div class="content">
            <div class="add">

            </div>
            <div class="container3">
                <form class="add-stylization">
                    <input class="text-input" type="text" name="kategoria" placeholder="Kategoria">
                    <input type="checkbox">
                    <input class="text-input" type="text" name="marka" placeholder="Marka">
                    <input class="text-input" type="text" name="rozmiar" placeholder="Rozmiar">
                    <input class="text-input" type="text" name="tagi" placeholder="Tagi">
                    <input type="image" name="zdjecia" placeholder="Zdjecia">
                    <input class="text-input" type="text" name="notatki" placeholder="Notatki">
                    <h1>Ustal do czego pasuje nowa rzecz:</h1>
                    <input type="checkbox" name="universal">
                    <input type="submit" name="add" placeholder="Dodaj nową rzecz">
                </form>
                <button>Dodaj kolejną stylizację</button>

            </div>
        </div>
    </div>
</div>
<div class="footer"></div>
</body>