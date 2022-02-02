<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/add_event.css">
    <link rel="stylesheet" type="text/css" href="public/css/main_menu.css">
    <script src="https://kit.fontawesome.com/fe5f9ac612.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title>Dodaj wydarzenie</title>
</head>
<body>
<div class="container">
    <?php include('header.php') ?>
    <div class="container2">
        <?php include('clipboard.php') ?>
        <div class="content">
            <form class="add-event" action="addEvent" method="post" enctype="multipart/form-data">
                <?php if (isset($messages)) {
                    foreach ($messages as $message) {
                        echo $message;
                    }
                }
                ?>
                <h4>Miejsce/Opis:</h4>
                <input type="text" name="place" placeholder="Miejsce/Opis">
                <h4>Początek:</h4>
                <input type="date" name="date_start">
                <h4>Koniec:</h4>
                <input type="date" name="date_end" >
                <input id="add" type="submit" name="add" placeholder="Prześlij">
            </form>
</div>
<div class="footer"></div>
</body>