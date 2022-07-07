<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="CSS/products_admin.css">
</head>
<body>
    <div class="wrapper-users">

    <header class="fixed-header">
            <a href="home_page.html"><img src="resources/fashionee_logo-removebg-preview.png" alt="logo" class="logo"></a>

        </header>
        <div class="cart_table">
            <h1 style >CART</h1>
            <?php
                require("connect.php");
                $stmt = $conn->prepare('SELECT `id` FROM `cart` WHERE `customer_id` = ?');
                $stmt->bind_param('i', $_SESSION['id']);
                $stmt->execute();
                $stmt->bind_result($cart_id);
                $stmt->fetch();
                $stmt->close();

                $sql = "SELECT `product_id`,`product_price`,`order_units`,`order_total` FROM `cart_details` WHERE `cart_id` = $cart_id";
                $result = mysqli_query($conn, $sql);

                echo "<table>";
            echo "<thead>
                        <th>Product ID</th>
                        <th>Price</th>
                        <th>Units</th>
                        <th>Total</th>

                    </thead>";
            for ($x = 0; $x < mysqli_num_rows($result); $x++) {
                $row = mysqli_fetch_array($result);
                echo "<tr>";

                for ($y = 0; $y < mysqli_num_fields($result); $y++) {
                    echo "<td>";
                    // echo "<pre>";
                    print_r($row[$y]);

                    // echo "</pre>";
                    echo "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            ?>
        </div>

    </div>
</body>
</html>