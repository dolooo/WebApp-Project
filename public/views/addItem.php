<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/add_item.css">
    <link rel="stylesheet" type="text/css" href="public/css/main_menu.css">
    <script src="https://kit.fontawesome.com/fe5f9ac612.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title>Dodaj nową rzecz</title>
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
                <form class="add-item" action="addItem" method="post" enctype="multipart/form-data">
                    <?php if (isset($messages)) {
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                    <input id="category" type="text" name="kategoria" placeholder="Kategoria">
                    <input id="file" type="file" name="zdjecie" placeholder="Zdjecie" accept="image/*">
                    <input type="text" name="marka" placeholder="Marka">
                    <input type="text" name="rozmiar" placeholder="Rozmiar">
                    <input type="color" name="kolor" placeholder="kolor">
                    <textarea rows="5" type="text" name="opis" placeholder="Opis"></textarea>
                    <input type="submit" name="add" placeholder="Prześlij">
                </form>


            </div>
    </div>
</div>
<div class="footer"></div>
</body>