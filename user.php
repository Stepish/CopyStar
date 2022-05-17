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
        $sql = "SELECT orders.id,orders.name AS orders_name,orders.status,custom_products.countnumber,products.name AS products_name,products.photo,products.price,products.country,products.year,products.model,products.timestamp,products.countnumbers,categories.name
        FROM `orders`,`products`,`custom_products`,`categories`
        WHERE orders.id=`order_id` 
        AND products.id=`product_id` 
        AND categories.id=products.category
        AND orders.user_id=2";
        $result = mysqli_query($con, $sql);
        echo "<section class='orders'>";
        while ($row = mysqli_fetch_object($result)) {
            echo "<h2>" . $row->orders_name . "</h2>" .
                "<article class='order'>
                <div><h2>" . $row->products_name . "</h2>
                <a href='product.php?id=$row->id'><img src='image/" . $row->photo . "' alt='product' class='images'></a></div>" .
                '<div><p>Цена: <b>' . $row->price . ' &#8381;</b></p>' .
                '<p>Призводитель: <b>' . $row->country . '</b></p>' .
                '<p>Производство: <b>' . $row->year . '</b></p>' .
                '<p>Модель: <b>' . $row->model . '</b></p></div>' .
                '<div><p>Категория: <b>' . $row->category . '</b></p></div>' .
                '<div><p>Количество: <b>' . $row->countnumber . '</b></p>' .
                '<p>Добавлено: <b>' . $row->timestamp . '</b></p>' .
                "<form action=''>
            <input type='hidden' value='$row->id'>
            <input type='button' value='В корзину' class='button'>
        </form></div></article>";
        };
        echo "</section>";
    } else {
        echo "Вы должны быть авторизованы!";
    }

    ?>
</body>

</html>