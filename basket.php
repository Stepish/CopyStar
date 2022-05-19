<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Users</title>
</head>

<body>
    <?php
    include 'php/nav.php';
    nav('basket.php');
    if (!empty($_SESSION)) {
        include 'php/db.php';
        $sql = "SELECT orders.id,orders.name AS orders_name,orders.status,custom_products.countnumber,products.name AS products_name,products.photo,products.price,products.country,products.year,products.model,products.timestamp,products.countnumbers,categories.name AS categories_name
        FROM `orders`,`products`,`custom_products`,`categories`
        WHERE orders.id=`order_id` 
        AND products.id=`product_id` 
        AND categories.id=products.category
        AND orders.user_id=$_SESSION[userid]
        AND orders.status=0
        ORDER BY orders.id";
        $result = mysqli_query($con, $sql);
        echo "<section class='orders'>";
        $order_name = "";
        while ($row = mysqli_fetch_object($result)) {
            echo  "<article class='order'>";
            if ($order_name != $row->orders_name) {
                echo "<div class='item1'><h2>Заказ: $row->orders_name";
                $order_name = $row->orders_name;
                echo "(В корзине)</h2>";
                echo "<form action='' name='order'>";
                echo "<input type='hidden' value=$row->id>";
                echo "<input type='button' value='Оформить заказ' class='button'>";
                echo "<input type='button' value='Очистить корзину' class='button'>";
                echo "</form></div>";
            };
            echo "<div class='item2'><h2>$row->products_name</h2>";
            echo "<a href='product.php?id=$row->id'><img src='image/$row->photo' alt='product' class='images'></a></div>";
            echo "<div class='item3'><p>Производитель: <b>$row->country</b></p>";
            echo "<p>Производство: <b>$row->year</b></p>";
            echo "<p>Модель: <b>$row->model</b></p>";
            echo "<p>Категория: <b>$row->categories_name</b></p>";
            echo "<p>Добавлено: <b>$row->timestamp</b></p></div>";
            echo "<div class='item4'><p>Количество: <b>$row->countnumber</b></p>";
            echo "<p>Цена: <b>$row->price &#8381;</b></p></div>";
            echo "</article>";
        };

        echo "</section>";
    } else {
        echo "Вы должны быть авторизованы!";
    }

    ?>
</body>

</html>