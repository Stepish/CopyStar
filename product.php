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
        echo  "<article class='product'>";
        echo "<h2>$row->name</h2>";
        echo "<a href='product.php?id=$row->id'><img src='image/$row->photo' alt='product' class='images'></a>";
        echo "<p>Цена: <b>$row->price &#8381;</b></p>";
        echo "<p>Призводитель: <b>$row->country</b></p>";
        echo "<p>Производство: <b>$row->year</b></p>";
        echo "<p>Модель: <b>$row->model</b></p>";
        echo "<p>Категория: <b>$row->category</b></p>";
        echo "<p>Количество: <b>$row->countnumbers</b></p>";
        echo "<p>Добавлено: <b>$row->timestamp</b></p>";
        echo "<form action=''>";
        echo "<input type='hidden' value=$row->id>";
        echo "<input type='button' value='В корзину' class='button'>";
        echo "</form></article>";
    };
    echo "</section>";
    ?>
</body>

</html>