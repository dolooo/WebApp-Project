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
            <div class="stylizations">
                <p id="item">stylizacja1</p>
                <p id="item">stylizacja2</p>
                <p id="item">stylizacja3</p>
                <p id="item">stylizacja4</p>
                <p id="item">stylizacja5</p>
                <p id="item">stylizacja6</p>
                <p id="item">stylizacja7</p>
            </div>
        </div>
    </div>
    <div class="footer"></div>
</div>
</body>