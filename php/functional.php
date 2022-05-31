<?php
session_start();

print_r($_POST);

if (empty($_POST)) {
    exit();
};
if (isset($_POST['new_order'])) {
    $new_order = ($_POST['new_order']);
    include 'db.php';
    $sql = "UPDATE `orders` SET `status` = 1 WHERE `id` = $new_order";
    $con->query($sql) or die($con->error);
    $con->close();
    header("Location: ../user.php");
};
if (isset($_POST['cancel_order'])) {
    $cancel_order = ($_POST['cancel_order']);
    $cause = ($_POST['cause']);
    include 'db.php';
    $sql = "UPDATE `orders` SET `status` = 2, `cause`='$cause' WHERE `id` = $cancel_order";
    $con->query($sql) or die($con->error);
    $con->close();
    header("Location: ../user.php");
};
if (isset($_POST['confirm_order'])) {
    $confirm_order = ($_POST['confirm_order']);
    $cause = ($_POST['cause']);
    include 'db.php';
    $sql = "UPDATE `orders` SET `status` = 3, `cause`='$cause' WHERE `id` = $confirm_order";
    $con->query($sql) or die($con->error);
    $con->close();
    header("Location: ../user.php");
};
if (isset($_POST['delete_order'])) {
    $delete_order = ($_POST['delete_order']);
    include 'db.php';
    $sql = "DELETE FROM `custom_products` WHERE `order_id` = $delete_order";
    $con->query($sql) or die($con->error);
    $sql = "DELETE FROM `orders` WHERE `id` = $delete_order";
    $con->query($sql) or die($con->error);
    $con->close();
    header("Location: ../user.php");
};

if (isset($_POST['new_categories'])) {
    $categories = ($_POST['categories']);
    include 'db.php';
    $sql = "INSERT INTO `categories` (`name`) VALUES ('$categories')";
    $con->query($sql) or die($con->error);
    $con->close();
    header("Location: ../admin.php");
};
if (isset($_POST['delete_categories'])) {
    $delete_categories = ($_POST['delete_categories']);
    include 'db.php';
    $sql = "DELETE FROM `categories` WHERE `id` = $delete_categories";
    $con->query($sql) or die($con->error);
    $con->close();
    header("Location: ../admin.php");
};
if (isset($_POST['basket'])) {
    $basket = ($_POST['basket']);
    $user = $_SESSION['userid'];
    $name = rand(50000, 55000);
    $status = 0;
    $date = date("Y-m-d H:i:s");
    include 'db.php';
    $sql = "SELECT `id` FROM `orders` WHERE `user_id`= $user AND `status`= 0";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_object($result);
    if ($result->num_rows != 0) {
        $order_id =  $row->id;
    } else {
        $sql = "SELECT max(id) AS `id` FROM `orders`";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_object($result);
        $order_id =  $row->id + 1;
        $sql = "INSERT INTO `orders` (`id`,`user_id`, `name`, `status`, `cause`, `time`) VALUES ('$order_id', '$user', '$name', '$status', '', '$date')";
        $con->query($sql) or die($con->error);
    }
    $sql = "INSERT INTO `custom_products` (`order_id`, `product_id`, `countnumber`) VALUES ('$order_id', '$basket', 1)";
    $con->query($sql) or die($con->error);
    $con->close();
    header("Location: ../basket.php");
} else {
};
