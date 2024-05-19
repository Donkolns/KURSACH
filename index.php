<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>6frames</title>
    <link rel="stylesheet" href="/css/style-index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:ital,wght@0,100..900;1,100..900&family=Martel+Sans:wght@200;300;400;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="header-block">
        <h1>6frames</h1>
        <div class="modal">
        <p class="h1-model">Добро пожаловать!</p>
        
        <form action="database/signin-db.php" method="post">

            <div class="form__item">
                <label for="" class="h2-model">Почта</label>
                <input type="email" class="input-model" name="email" required>
            </div>

        <div class="form__item">
                <label for="" class="h2-model">Пароль</label>
                <input type="password" class="input-model" name="password" minlength="6" required>
        </div>
        <button type="submit" class="send">Войти</button>
        <a href="index2.php" class="reset">Забыли пароль?</a>
        </form>
        </div>
    </div>
</body>
</html>