<?php
$con=new mysqli('user', 'root', '', 'demoexam');
if ($con->connect_error) {
    echo"Ошибка подключения к БД: $con->connect_error";
}