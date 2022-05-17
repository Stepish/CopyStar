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
    <title>CopyStar</title>
</head>

<body>
    <?php
    include 'php/nav.php';
    nav('login.php');
    ?>
    <form action="php/loginaction.php" method="post" id="loginform">
        <input type="text" placeholder="Логин" name="login" required class="validate" id="login">
        <input type="password" placeholder="Пароль" name="password" required class="validate" id="password">
        <button class="button">Авторизоваться</button>
        <?php
        if (isset($_GET["error"])) {
            $error = $_GET["error"];
            echo "<p class='error' id='error'>$error</p>";
        }
        ?>
    </form>
</body>

</html>