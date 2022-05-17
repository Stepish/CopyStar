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
    nav('admin.php');
    if ($_SESSION['login'] == 'Admin') {
        include 'php/db.php';
        $result = mysqli_query($con, "SELECT * FROM `products` ORDER BY  `timestamp` DESC");
        echo "<section class='catalog'>";
        while ($row = mysqli_fetch_object($result)) {
            echo  "<article class='products'>" .
                "<h2>" . $row->name . "</h2>" .
                "<a href='product.php?id=$row->id'><img src='image/" . $row->photo . "' alt='product' class='images'></a>" .
                '<p>Цена: <b>' . $row->price . ' &#8381;</b></p>' .
                '<p>Призводитель: <b>' . $row->country . '</b></p>' .
                '<p>Производство: <b>' . $row->year . '</b></p>' .
                '<p>Модель: <b>' . $row->model . '</b></p>' .
                '<p>Категория: <b>' . $row->category . '</b></p>' .
                '<p>Количество: <b>' . $row->countnumber . '</b></p>' .
                '<p>Добавлено: <b>' . $row->timestamp . '</b></p>' .
                "<form action=''>
                <input type='hidden' value='$row->id'>
                <input type='button' value='В корзину' class='button'>
            </form></article>";
        };
        echo "</section>";
    } else {
        echo "Вы должны быть администратором";
    }
    ?>
</body>

</html>