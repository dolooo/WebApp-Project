<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    <link rel="shortcut icon" href="public/img/logo2.svg">
    <meta charset="utf-8">
    <title>Zaloguj się</title>
</head>
<body>
<div class="container">
    <div class="theme">
        <div class="logo">
            <img src="public/img/logo2.svg">
        </div>
        <div class="title">
            Wieszak
        </div>
        <div class="subtitle">
            Twoja wirtualna garderoba
        </div>
    </div>
    <div class="login-container">
        <form class="login" action="login" method="post">
            <input name="email" type="text" placeholder="email@email.com">
            <input name="password" type="password" placeholder="hasło">
            <button type="submit">Zaloguj się</button>

        </form>
        <div class="messages">
            <?php if (isset($messages)) {
                foreach ($messages as $message) {
                    echo $message;
                }
            }
            ?>
        </div>
        <p>Nie masz konta?</p>
        <button>Zarejestruj się</button>
    </div>
</div>
</body>