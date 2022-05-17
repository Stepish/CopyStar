<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js" defer></script>
    <title>CopyStar</title>
</head>

<body>
    <?php
    include 'php/nav.php';
    nav('register.php');
    ?>
    <form action="php/registration.php" method="post" id="regform">
        <input type="text" required placeholder="Фамилия" name="surname" id="surname" class="validate">
        <input type="text" required placeholder="Имя" name="name" id="name" class="validate">
        <input type="text" required placeholder="Отчество" name="patronymic" id="patronymic" class="validate">
        <input type="text" required placeholder="Логин" name="login" id="login" class="validate">
        <input type="email" required placeholder="email" name="email" id="email" class="validate">
        <input type="password" required placeholder="Пароль" name="password" id="password" class="validate">
        <input type="password" required placeholder="Повтор пароля" name="confirm" id="confirm" class="validate">
        <label><input type="checkbox" id="check"> Согласие на обработку</label>
        <button class="button">Зарегистрироваться</button>
        <p class="error" id="error"></p>
    </form>
</body>

</html>