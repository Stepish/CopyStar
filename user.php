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
    nav('user.php');
    if (!empty($_SESSION)) {
        include 'php/db.php';
        $sql = "SELECT orders.id,orders.name AS orders_name,orders.status,custom_products.countnumber,products.name AS products_name,products.photo,products.price,products.country,products.year,products.model,products.timestamp,products.countnumbers,categories.name AS categories_name
        FROM `orders`,`products`,`custom_products`,`categories`
        WHERE orders.id=`order_id` 
        AND products.id=`product_id` 
        AND categories.id=products.category
        AND orders.user_id=2";
        $result = mysqli_query($con, $sql);
        echo "<section class='orders'>";
        while ($row = mysqli_fetch_object($result)) {
            echo "<h2>$row->orders_name</h2>";
            echo  "<article class='order'>";
            echo "<h2>$row->products_name</h2>";
            echo "<a href='product.php?id=$row->id'><img src='image/$row->photo' alt='product' class='images'></a>";
            echo "<p>Цена: <b>$row->price &#8381;</b></p>";
            echo "<p>Призводитель: <b>$row->country</b></p>";
            echo "<p>Производство: <b>$row->year</b></p>";
            echo "<p>Модель: <b>$row->model</b></p>";
            echo "<p>Категория: <b>$row->categories_name</b></p>";
            echo "<p>Количество: <b>$row->countnumbers</b></p>";
            echo "<p>Добавлено: <b>$row->timestamp</b></p>";
            echo "<form action=''>";
            echo "<input type='hidden' value=$row->id>";
            echo "<input type='button' value='В корзину' class='button'>";
            echo "</form></article>";
        };
        echo "</section>";
    } else {
        echo "Вы должны быть авторизованы!";
    }

    ?>
</body>

</html>