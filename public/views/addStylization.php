<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/add_stylization.css">
    <link rel="stylesheet" type="text/css" href="public/css/main_menu.css">
    <script src="https://kit.fontawesome.com/fe5f9ac612.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title>Dodaj stylizację</title>
</head>
<body>
<div class="container">
    <header>
        <h1><a href="home">Wieszak</a></h1>
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
            <form class="add-stylization" action="addStylization" method="post" enctype="multipart/form-data">
                <?php if (isset($messages)) {
                    foreach ($messages as $message) {
                        echo $message;
                    }
                }
                ?>
                <p>Wybierz górną część garderoby:</p>
                <label class="items">
                    <?php foreach (array_reverse($topItems) as $item):?>
                    <div id="item">
                        <img src="/public/uploads/<?= $item->getFile(); ?>">
                        <input type="radio" name="up" value="<?= $item->getFile(); ?>">
                    </div>
                    <?php endforeach; ?>
                </label>
                <p>Wybierz dolną część garderoby:</p>
                <label class="items">
                    <?php foreach (array_reverse($bottomItems) as $item):?>
                    <div id="item">
                            <img src="/public/uploads/<?= $item->getFile(); ?>">
                            <input type="radio" name="bottom" value="<?= $item->getFile(); ?>">
                    </div>
                    <?php endforeach; ?>
                </label>
                <p>Wybierz obuwie:</p>
                <label class="items">
                    <?php foreach (array_reverse($footwear) as $item):?>
                    <div id="item">
                            <img src="/public/uploads/<?= $item->getFile(); ?>">
                            <input type="radio" name="footwear" value="<?= $item->getFile(); ?>">
                    </div>
                    <?php endforeach; ?>
                </label>
                <p>Wybierz dodatki:</p>
                <label class="items">
                    <?php foreach (array_reverse($accessories) as $item):?>
                    <div id="item">
                            <img src="/public/uploads/<?= $item->getFile(); ?>">
                        <input type="radio" name="accessories" value="<?= $item->getFile(); ?>">
                    </div>
                    <?php endforeach; ?>
                </label>
                <input type="submit" name="add" placeholder="Prześlij">
            </form>
        </div>
</div>
<div class="footer"></div>
</body>