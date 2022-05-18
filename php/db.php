<?php
$con=new mysqli('CopyStar', 'root', '', 'copystar');
if ($con->connect_error) {
    echo"Ошибка подключения к БД: $con->connect_error";
}