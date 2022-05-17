<?php
function nav($item)
{
    if (empty($_SESSION['login'])) {
        $items = [
            "index.php" => "О нас",
            "catalog.php" => "Каталог",
            "contacts.php" => "Где нас найти",
            "register.php" => "Регистрация",
            "login.php" => "Авторизация"
        ];
        $welcome = "Гость";
    } elseif ($_SESSION['login'] == 'Admin') {
        $items = [
            "index.php" => "О нас",
            "user.php" => "Заявления",
            "admin.php" => "Администрирование",
            "php/logout.php" => "Выход"
        ];
        $welcome = "Гость";
    } else {
        $items = [
            "index.php" => "Онас",
            "catalog.php" => "Каталог",
            "contacts.php" => "Где нас найти",
            "user.php" => "Личный кабинет",
            "basket.php" => "Корзина",
            "php/logout.php" => "Выход"
        ];
        $welcome = "Гость";
    }
?>
    <header class="flexbox">
        <img src="image/logo.png" alt="logo">
        <article>
            <h1>"Copy Star"</h1>
            <h2>продажа копировального оборудования. Наша компания самая-самая лучшая</h2>
            <?php
            echo "<p>Добро пожаловать, <b>$welcome!</b></p>"
            ?>
        </article>
    </header>
<?php
    echo "<nav class='menu flexbox'>";
    foreach ($items as $key => $value) {
        if ($key == $item) {
            echo "<a href='$key'class='active'>$value</a>";
        } else {
            echo "<a href='$key'class='noactive'>$value</a>";
        }
    }
    echo "</nav>";
}
