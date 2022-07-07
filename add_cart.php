<?php
    session_start();
    require("connect.php");
    if (!isset($_SESSION['loggedin'])) {
        header('Location: login.php');
        exit;
    }

    $product_id = $_GET['id'];

    $stmt = $conn->prepare('SELECT `price` FROM `products` WHERE id = ?');
    $stmt->bind_param('i', $product_id);
    $stmt->execute();
    $stmt->bind_result($price);
    $stmt->fetch();
    $stmt->close();

    $stmt = $conn->prepare('SELECT MAX(id) FROM `cart` WHERE `customer_id` = ?');
    $stmt->bind_param('i', $_SESSION['id']);
    $stmt->execute();
    $stmt->bind_result($cart_id);
    $stmt->fetch();
    $stmt->close();

    $sql2 = "INSERT INTO `cart_details` (`cart_id`, `product_id`, `product_price`, `order_total`) VALUES ('$cart_id', '$product_id', '$price','$price')";
    mysqli_query($conn, $sql2);

    header("Location:women_home.php");
    