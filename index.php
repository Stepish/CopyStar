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
    nav('index.php');
    ?>
    <h2>Новинки компании</h2>
    <section class="new flexbox">
        <img src="image/left.png" alt="left" id="left">
        <div class="slider"></div>
        <img src="image/right.png" alt="right" id="right">
    </section>
    <?php
    include 'php/db.php';
    $result = mysqli_query($con, "SELECT * FROM `products` ORDER BY  `timestamp` DESC LIMIT 5");
    echo "<section class='main'>";
    while ($row = mysqli_fetch_object($result)) {
        echo  "<article class='new'>" .
            "<h2>" . $row->name . "</h2>" .
            "<a href='product.php?id=$row->id'><img src='image/" . $row->photo . "' alt='product' class='images'></a>" .
            "<form action=''>
            <input type='hidden' value='1'>
            <input type='button' value='В корзину' class='button'>
        </form></article>";
    };
    echo "</section>";
    ?>
</body>

</html>