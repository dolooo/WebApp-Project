<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/main_menu.css">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/notes.css">
    <script defer type="text/javascript" src="public/js/noteValidation.js"></script>
    <script src="https://kit.fontawesome.com/fe5f9ac612.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title>Notatki</title>
</head>
<body>
<div class="container">
    <?php include('header.php') ?>
    <div class="container2">
        <?php include('clipboard.php') ?>
        <div class="content">
            <div class="notes">
                <?php foreach ($notes as $note): ?>
                    <div id="note">
                        <p><?= $note->getText(); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <p>Dodaj nową notatkę</p>
            <div id="numberOfCharacters"></div>
            <form class="add-note" action="addNote" method="post" enctype="multipart/form-data">
                <textarea rows="5" type="text" name="text" placeholder="Nowa notatka"></textarea>
                <input id="add" type="submit" name="add" placeholder="Dodaj">
            </form>
        </div>
    </div>
</div>
<div class="footer"></div>
</body>