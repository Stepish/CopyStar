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
    nav('admin.php');
    if ($_SESSION['login'] == 'Admin') {
        include 'php/db.php';
        $sql = "SELECT * FROM `categories`";
        $result = mysqli_query($con, $sql);
        echo "<section class='categories gridbox'>";
        echo "<div class='newcategory'>";
        echo "<form action='' name='order'>";
        echo "<input type='button' value='Добавить новую категорию' class='button'>";
        echo "</form></div>";
        echo "</div>";
        while ($row = mysqli_fetch_object($result)) {
            echo  "<div class='category flexbox'>";
            echo "<h2>$row->name</h2>";
            echo "<form action='' name='order'>";
            echo "<input type='hidden' value=$row->id>";
            echo "<input type='button' value='Удалить' class='button'>";
            echo "</form></div>";
            echo "</div>";
        };
        echo "</section>";
        echo "<section class='gridbox'>
        <form action='php/registration.php' method='post' id='regform' class='form'>
        <button class='button'>Добавить товар</button>    
        <input type='text' required placeholder='Фамилия' name='surname' id='surname' class='validate'>
            <input type='text' required placeholder='Имя' name='name' id='name' class='validate'>
            <input type='text' required placeholder='Отчество' name='patronymic' id='patronymic' class='validate'>
            <input type='text' required placeholder='Логин' name='login' id='login' class='validate'>
            <input type='email' required placeholder='email' name='email' id='email' class='validate'>
            
            <p class='error' id='error'></p>
        </form>
    </section>";
    } else {
        echo "Вы должны быть администратором";
    }
    ?>
</body>

</html>