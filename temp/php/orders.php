<?php

include 'db.php';
$zapros = "SELECT * FROM `products`,`custom_products` WHERE custom_products.product_id=products.id";
$result = $con->query($zapros);
$con->close();
$i = 1;
while ($row = mysqli_fetch_object($result)) {
    $a[$i] = array('name' => $row->name);
    $i++;
};

if ($result->num_rows == 0) {
    $message = "Заявок нет!";
    $response = [
        'status' => 'error',
        'message' => $message
    ];
} else {
    $response = [
        'status' => 'Ok',
        'orders' => $a
    ];
}

echo json_encode($response);
