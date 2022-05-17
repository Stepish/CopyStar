<?php
session_start();
if (empty($_POST)) {
    exit();
}
$login = $_POST['login'];
$password = md5($_POST['password']);
include 'db.php';
$zapros = "SELECT * FROM `users` WHERE `login`='$login' AND `password`='$password'";
$result = $con->query($zapros) or die($con->error);
if ($result->num_rows == 0) {
    header("Location: ../login.php?error=Попробуйте еще раз!");
}
$row = $result->fetch_assoc();
$userid = $row['id'];
$login = $row['login'];
$_SESSION['userid'] = $userid;
$_SESSION['login'] = $login;
$con->close();
if ($login == 'Admin') {
    header("Location: ../admin.php");
} else {
    header("Location: ../user.php");
};
