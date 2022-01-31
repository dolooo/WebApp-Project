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
    <?php include('header.php') ?>
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
                <h4>Wybierz kolekcję do której chcesz przypisać stylizację:</h4>
                <input list="collections" id="collection" type="text" name="collection" placeholder="Kolekcja">
                <datalist id="collections">
                    <option>Codzienne</option>
                    <option>Praca</option>
                    <option>Wieczorowe</option>
                    <option>Vintage</option>
                </datalist>
                <h4>Wybierz górną część garderoby:</h4>
                <label class="items">
                    <?php foreach (array_reverse($topItems) as $item):?>
                    <div id="item">
                        <img src="/public/uploads/<?= $item->getFile(); ?>">
                        <input type="radio" name="top" value="<?= $item->getFile(); ?>">
                    </div>
                    <?php endforeach; ?>
                </label>
                <h4>Wybierz dolną część garderoby:</h4>
                <label class="items">
                    <?php foreach (array_reverse($bottomItems) as $item):?>
                    <div id="item">
                            <img src="/public/uploads/<?= $item->getFile(); ?>">
                            <input type="radio" name="bottom" value="<?= $item->getFile(); ?>">
                    </div>
                    <?php endforeach; ?>
                </label>
                <h4>Wybierz obuwie:</h4>
                <label class="items">
                    <?php foreach (array_reverse($footwear) as $item):?>
                    <div id="item">
                            <img src="/public/uploads/<?= $item->getFile(); ?>">
                            <input type="radio" name="footwear" value="<?= $item->getFile(); ?>">
                    </div>
                    <?php endforeach; ?>
                </label>
                <h4>Wybierz dodatki:</h4>
                <label class="items">
                    <?php foreach (array_reverse($accessories) as $item):?>
                    <div id="item">
                            <img src="/public/uploads/<?= $item->getFile(); ?>">
                        <input type="radio" name="accesories" value="<?= $item->getFile(); ?>">
                    </div>
                    <?php endforeach; ?>
                </label>
                <input type="submit" name="add" placeholder="Prześlij">
            </form>
        </div>
</div>
<div class="footer"></div>
</body>