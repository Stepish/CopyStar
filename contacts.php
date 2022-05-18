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
    nav('contacts.php');
    ?>
    <h2>Контакты:</h2>
    <section class="contact">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8977.659738594626!2d38.67721796978584!3d55.76866501418561!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x414ae0ee2eaa653b%3A0xf2141002082f1f15!2z0JPQkdCf0J7QoyDQnNCeICLQn9Cw0LLQu9C-0LLQvi3Qn9C-0YHQsNC00YHQutC40Lkg0YLQtdGF0L3QuNC60YPQvCI!5e0!3m2!1sru!2sru!4v1652810154976!5m2!1sru!2sru" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="info">
            <p>Адрес:<br>ул. Кузьмина, 33, Павловский Посад, Московская обл., 142507</p>
            <p>Номер телефона:<br>8 (999) 999-99-99</p>
            <p>e-mail:<br>admin@mail.ru</p>
        </div>
    </section>
</body>

</html>