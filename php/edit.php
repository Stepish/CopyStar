<?php
session_start();
if (empty($_POST)) {
    exit();
};
$name = $_POST['name'];
$photo = 'photo/' . $_FILES['photo']['name'];
$price = $_POST['price'];
$country = $_POST['country'];
$year = $_POST['year'];
$model = $_POST['model'];
$select = $_POST['select'];
$countnumbers = $_POST['countnumbers'];
$date = date("Y-m-d H:i:s");
$edit = $_POST['edit'];
include 'db.php';
$sql = "INSERT INTO `products` (`name`, `photo`, `price`, `country`, `year`, `model`, `category`, `countnumbers`, `timestamp`)
VALUES ('$name', '$photo', '$price', '$country', '$year', '$model', '$select', '$countnumbers', '$date')";
$con->query($sql) or die($con->error);
$path = '../image/photo/';
if (!@copy($_FILES['photo']['tmp_name'], $path . $_FILES['photo']['name']))
    echo 'Что-то пошло не так';
else
    echo 'Загрузка удачна';



$con->close();
header("Location: ../admin.php");
