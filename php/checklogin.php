<?php
include 'db.php';
if (!empty($_POST)) {
    $login = $_POST['login'];
    $zapros = "SELECT * FROM `users` WHERE `login`= '$login'";
    $result = $con->query($zapros);
    $con->close();
    if ($result->num_rows == 0) {
        $response = ['status' => 'Ok'];
    } else {
        $message = "Логин занят!";
        $response = ['status' => 'error', 'message' => $message];
    }
    echo json_encode($response);
}
