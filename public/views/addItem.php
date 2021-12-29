<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/add_item.css">
    <link rel="stylesheet" type="text/css" href="public/css/main_menu.css">
    <meta charset="utf-8">
    <title>Dodaj nową rzecz</title>
</head>
<body>
<div class="container">
    <div class="navigation">
        <div class="logo">
            <img class="logo">
        </div>
        <a href="home"> <p>Strona Główna</p></a>
        <a href="wardrobe"><p>Szafa</p></a>
        <a href="store"><p>Zakupy</p></a>
        <a href="community"><p>Społeczność</p></a>
        <a href="settings"><p>Ustawienia</p></a>
        <div class="icons">
            <img class="search">
            <img class="notifications">
            <img class="account">
        </div>
        </div>
    <div class="container2">
        <div class="quick-access">
            <div class="clipboard">
                <p>Schowek</p>
            </div>
            <div class="quick-add">
                <a href="addItem"><button>+Dodaj nową rzecz</button></a>
                <button>+Stwórz walizkę</button>
                <button>+Stwórz stylizację</button>
            </div>
            <div class="calendar">
                <p>Kalendarz</p>
            </div>
            <div class="add-event">
                <button>+Dodaj wydarzenie</button>
            </div>
        </div>
        <div class="content">
            <div class="add">

            </div>
            <div class="container3">
                <form class="add-item" action="addItem" method="post" enctype="multipart/form-data">
                    <?php if (isset($messages)) {
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                    <input type="text" name="kategoria" placeholder="Kategoria">
                    <input type="color" name="kolor" placeholder="kolor">
                    <input type="text" name="marka" placeholder="Marka">
                    <input type="text" name="rozmiar" placeholder="Rozmiar">
                    <input type="text" name="tagi" placeholder="Tagi">
                    <h4>Zdjęcia:</h4>
                    <input type="file" name="zdjecie" placeholder="Zdjecie">
                    <textarea rows="5" type="text" name="opis" placeholder="Opis"></textarea>
                    <input type="submit" name="add" placeholder="Prześlij">
                </form>
                <button>Dodaj kolejną rzecz</button>


            </div>
        </div>
    </div>
    <div class="footer"></div>
</div>
</body>