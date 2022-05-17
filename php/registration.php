<?php
if (empty($_POST)) {
    exit();
}
$name = $_POST['name'];
$surname = $_POST['surname'];
$patronymic = $_POST['patronymic'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = md5($_POST['password']);

include 'db.php';
$zapros = "INSERT INTO `users` (`name`,`surname`,`patronymic`, `login`, `email`, `password`) 
VALUE('$name', '$surname','$patronymic','$login', '$email', '$password')";
$con->query($zapros) or die('$con->error');
$con->close();
header("Location: ../index.php");