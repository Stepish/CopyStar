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
    nav('catalog.php');
    include 'php/db.php';
    $id_product = $_GET['id'];
    $result = mysqli_query($con, "SELECT * FROM `products` WHERE `id`=$id_product");
    echo "<section class='catalog'>";
    while ($row = mysqli_fetch_object($result)) {
        echo  "<article class='product'>" .
            "<h2>" . $row->name . "</h2>" .
            "<br><img src='image/" . $row->photo . "' alt='product' class='images'>" .
            '<br><p>Цена: <b>' . $row->price . ' &#8381;</b></p>' .
            '<br><p>Призводитель: <b>' . $row->country . '</b></p>' .
            '<br><p>Производство: <b>' . $row->year . '</b></p>' .
            '<br><p>Модель: <b>' . $row->model . '</b></p>' .
            '<br><p>Категория: <b>' . $row->category . '</b></p>' .
            '<br><p>Количество: <b>' . $row->countnumber . '</b></p>' .
            '<br><p>Добавлено: <b>' . $row->timestamp . '</b></p>' .
            "<br><form action=''>
            <input type='hidden' value='$row->id'>
            <input type='button' value='В корзину' class='button'>
        </form></article>";
    };
    echo "</section>";
    ?>
</body>

</html>