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
    <?php include('header.php') ?>
    <div class="container2">
        <?php include('clipboard.php') ?>
        <div class="content">
            <div class="options-list">
                <ul class="options">
                    <li><a href="settings" id="clicked">Edytuj profil</a> </li>
                    <li><a href="settings">Ustawienia</a> </li>

                    <li><p onclick="myFunction()">Wyloguj się</p>
                        <script>
                            function myFunction() {
                                if (confirm('Czy na pewno chcesz się wylogować?')) {
                                    <?php
                                    session_start();
                                    unset($_SESSION["userId"]);
                                    $_SESSION["zalogowany"] = 0;
                                    session_destroy();
                                    $url = "http://$_SERVER[HTTP_HOST]";
                                    header("Location: {$url}/login");
                                    ?>
                                }
                            }
                        </script>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php') ?>
</body>