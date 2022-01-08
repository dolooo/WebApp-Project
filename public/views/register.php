<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/register.css">
    <link rel="shortcut icon" href="public/img/logo2.svg">
    <meta charset="utf-8">
    <title>Zarejestruj się</title>
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
    <div class="register-container">
        <form class="register" action="register" method="post">
            <div class="register1">
                <input name="name" type="text" placeholder="Imie">
                <input name="surname" type="text" placeholder="Nazwisko">
                <input name="phone" type="number" placeholder="Nr Telefonu">
            </div>
            <div class="register2">
                <input name="email" type="text" placeholder="email@email.com">
                <input name="password" type="password" placeholder="Hasło">
                <input name="confirmedPassword" type="password" placeholder="Potwierdź hasło">
            </div>
            <button type="submit">Zarejestruj się</button>
        </form>
        <div class="messages">
            <?php if (isset($messages)) {
                foreach ($messages as $message) {
                    echo $message;
                }
            }
            ?>
        </div>
        <div class="register3">
            <p>Masz już konto?</p>
            <a href="login"><button>Zaloguj się</button></a>
        </div>
    </div>
</div>
</body>