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
        echo "<section class='categories gridbox'>";
        echo "<div class='newcategory'>";
        echo "<form action='php/functional.php' method='post'>";
        echo "<input type='text' required placeholder='Наименование категории' name='categories' id='categories' class='validate'>";
        echo "<button class='button' name='new_categories' value='new'>Добавить новую категорию</button>";
        echo "</form></div>";
        echo "</div>";
        include 'php/db.php';
        $sql = "SELECT * FROM `categories`";
        $result = mysqli_query($con, $sql);
        $con->close();
        while ($row = mysqli_fetch_object($result)) {
            echo  "<div class='category flexbox'>";
            echo "<h2>$row->name</h2>";
            echo "<form action='php/functional.php' method='post'>";
            echo "<button class='button' name='delete_categories' value='$row->id'>Удалить</button>";
            echo "</form></div>";
            echo "</div>";
        };
        echo "</section>";
        echo "<section class='gridbox'>
            <form action='php/edit.php' method='post' class='form' enctype='multipart/form-data'>
            <input type='text' required placeholder='Наименование' name='name' id='name' class='validate'>
            <label for='photo'>Фотография продукта: </label>
            <input  type='file' multiple accept='image/*,image/jpeg' required name='photo' id='photo' class='validate'>
            <input type='text' required placeholder='Цена' name='price' id='price' class='validate'>
            <input type='text' required placeholder='Страна' name='country' id='country' class='validate'>
            <input type='date' required placeholder='Год выпуска' name='year' id='year' class='validate'>
            <input type='text' required placeholder='Модель' name='model' id='model' class='validate'>
            <p>Выбери категорию</p>
            <select name='select' size='1'>";
        include 'php/db.php';
        $sql = "SELECT * FROM `categories`";
        $result = mysqli_query($con, $sql);
        $con->close();
        while ($row = mysqli_fetch_object($result)) {
            echo "<option name='categories' value='$row->id'>" . $row->name . "</option>";
        };
        echo "</select>
            <input type='text' required placeholder='Количество' name='countnumbers' id='countnumbers' class='validate'>
            <button class='button' name='edit' value='12345'>Добавить товар</button>  
            <p class='error' id='error'></p>
            </form>
        </section>";
    } else {
        echo "Вы должны быть администратором";
    }
    ?>
</body>

</html>