<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    <meta charset="utf-8">
    <title>Zaloguj się</title>
</head>
<body>
<div class="container">
    <div class="theme">
        <div class="logo">
            <img src="public/img/logo.svg">
        </div>
        <div class="title">
            <p>Stwórz swoją wirtualną szafę</p>
        </div>
        <div class="subtitle">
            <p>Stylizacje, planery, porady...</p>
        </div>
    </div>
    <div class="login-container">
        <form class="login" action="login" method="post">
            <div class="messages">
                <?php if (isset($messages)) {
                    foreach ($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <input name="email" type="text" placeholder="email@email.com">
            <input name="password" type="password" placeholder="password">
            <button type="submit">Zaloguj się</button>
        </form>
        <p>Nie masz konta?</p>
        <button>Zarejestruj się</button>
    </div>
</div>
</body>