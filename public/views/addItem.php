<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/add_item.css">
    <link rel="stylesheet" type="text/css" href="public/css/main_menu.css">
    <script src="https://kit.fontawesome.com/fe5f9ac612.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title>Dodaj rzecz</title>
</head>
<body>
<div class="container">
    <?php include('header.php') ?>
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
                    <input list="categories" id="category" type="text" name="kategoria" placeholder="Kategoria">
                    <datalist id="categories">
                        <option>Swetry i kardigany</option>
                        <option>Kurtki i płaszcze</option>
                        <option>Koszule</option>
                        <option>Spodnie</option>
                        <option>Bluzy</option>
                        <option>Koszulki</option>
                        <option>Dodatki</option>
                        <option>Obuwie</option>
                        <option>Dżinsy</option>
                        <option>Marynarki i garnitury</option>
                        <option>Szorty</option>
                        <option>Bielizna</option>
                        <option>Inne</option>
                    </datalist>
<!--                    <input id="category" type="text" name="kategoria" placeholder="Kategoria">-->
                    <input id="file" type="file" name="zdjecie" placeholder="Zdjecie" accept="image/*">
                    <input type="text" name="marka" placeholder="Marka">
                    <input type="text" name="rozmiar" placeholder="Rozmiar">
                    <label class="color-list">
                        <div id="color">
                            <div id="color-circle" style="background: black"></div>
                            <input type="radio" name="kolor" value="black">
                        </div>
                        <div id="color">
                            <div id="color-circle" style="background: brown"></div>
                            <input type="radio" name="kolor" value="brown">
                        </div>
                        <div id="color">
                            <div id="color-circle" style="background: beige"></div>
                            <input type="radio" name="kolor" value="beige">
                        </div>
                        <div id="color">
                            <div id="color-circle" style="background: grey"></div>
                            <input type="radio" name="kolor" value="grey">
                        </div>
                        <div id="color">
                            <div id="color-circle" style="background: blue"></div>
                            <input type="radio" name="kolor" value="blue">
                        </div>
                        <div id="color">
                            <div id="color-circle" style="background: lightseagreen"></div>
                            <input type="radio" name="kolor" value="lightseagreen">
                        </div>
                        <div id="color">
                            <div id="color-circle" style="background: turquoise"></div>
                            <input type="radio" name="kolor" value="turquoise">
                        </div>
                        <div id="color">
                            <div id="color-circle" style="background: green"></div>
                            <input type="radio" name="kolor" value="green">
                        </div>
                        <div id="color">
                            <div id="color-circle" style="background: orange"></div>
                            <input type="radio" name="kolor" value="orange">
                        </div>
                        <div id="color">
                            <div id="color-circle" style="background: red"></div>
                            <input type="radio" name="kolor" value="red">
                        </div>
                        <div id="color">
                            <div id="color-circle" style="background: pink"></div>
                            <input type="radio" name="kolor" value="pink">
                        </div>
                        <div id="color">
                            <div id="color-circle" style="background: purple"></div>
                            <input type="radio" name="kolor" value="purple">
                        </div>
                        <div id="color">
                            <div id="color-circle" style="background: gold"></div>
                            <input type="radio" name="kolor" value="gold">
                        </div>
                        <div id="color">
                            <div id="color-circle" style="background: silver"></div>
                            <input type="radio" name="kolor" value="silver">
                        </div>
                    </label>
                    <textarea rows="5" type="text" name="opis" placeholder="Opis"></textarea>
                    <input id="add" type="submit" name="add" placeholder="Prześlij">
                </form>
            </div>
    </div>
</div>
<?php include('footer.php') ?>
</body>