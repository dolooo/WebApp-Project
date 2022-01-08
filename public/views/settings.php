<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/main_menu.css">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/settings.css">
    <script src="https://kit.fontawesome.com/fe5f9ac612.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title>Ustawienia</title>
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
                <li id="active">
                    <a href="settings">Konto<img class="avatar" src="/public/img/Nope,_Wojnarze,_nope..jpg"></a>
                </li>
            </ul>
        </nav>
    </header>
    <div class="container2">
        <?php include('clipboard.php') ?>
        <div class="content">
            <div class="options-list">
                <ul class="options">
                    <li><a href="settings" id="clicked">Edytuj profil</a> </li>
                    <li><a href="settings">Ustawienia</a> </li>
                    <li><a href="settings">Wyloguj się</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="footer"></div>
</body>