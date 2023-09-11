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
            <a href="home_page_2.php"><img src="resources/fashionee_logo-removebg-preview.png" alt="logo" class="logo"></a>

        </header>
        <div class="cart_table">
            <h1 style = "margin-top:3em;">CART</h1>
            <?php
            require("connect.php");
            $stmt = $conn->prepare('SELECT MAX(`id`) FROM `cart` WHERE `customer_id` = ?');
            $stmt->bind_param('i', $_SESSION['id']);
            $stmt->execute();
            $stmt->bind_result($cart_id);
            $stmt->fetch();
            $stmt->close();

            $sql = "SELECT `product_id`, `name`, `product_price`, (COUNT(`product_id`)+`order_units`-1) order_units, `image`, SUM(`product_price`*`order_units`) total FROM `cart_details` INNER JOIN `products` ON `cart_details`.`product_id` = `products`.`id` AND `cart_details`.`cart_id` = $cart_id GROUP BY `cart_details`.`product_id`;";
            $result = mysqli_query($conn, $sql);

            echo "<table>";
            echo "<thead>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Units</th>
                        <th>Total</th>

                    </thead>";
            $grand_total = 0;
            for ($x = 0; $x < mysqli_num_rows($result); $x++) {
                $row = mysqli_fetch_array($result);
                echo "<tr>";

                echo "<td style = 'width:12em; height: 9em;'>";
                echo "<img style = 'object-fit:cover; padding:.2em; width:6em; height:8em;' src= 'product_images/" . $row['image'] . "'>";
                echo "</td>";
                echo "<td>";
                print_r($row['name']);
                echo "</td>";
                echo "<td>";
                print_r($row['product_price']);
                echo "</td>";
                echo "<td style = 'width:6em;'>";
                $orderunits = $row['order_units'];
                echo "<div class = 'quantity-adjust'>
                <form method = 'post'>
                <input type = 'hidden' name = 'order_units' value = '" . $orderunits . "'>
                <input type = 'hidden' name = 'product_id' value = '" . $row['product_id'] . "'>
                <input style='border:none;background-color:transparent;' type = 'text' name = 'quantity' value = '" . $row['order_units'] . "'>
                <button class = 'pluus' name = 'plus'>edit</button>
                </form></div>
                ";
                echo "</td>";
                echo "<td>";
                print_r($row['total']);
                echo "</td>";

                $grand_total = $grand_total + $row['total'];

                echo "</tr>";
            }
            echo "</table>";

            // if (isset($_POST['minus'])) {
            //     $product_id = $_POST['product_id'];
            //     $stmt = $conn->prepare('SELECT MAX(`id`) FROM `cart_details` WHERE `product_id` = ?');
            //     $stmt->bind_param('i', $product_id);
            //     $stmt->execute();
            //     $stmt->bind_result($cart_detail_id);    
            //     $stmt->fetch();
            //     $stmt->close();
            //     $sql1 = "DELETE FROM `cart_details` WHERE `cart_details`.`id` = $cart_detail_id";
            //     mysqli_query($conn, $sql1);
            // }
            if (isset($_POST['plus'])) {
                $product_id = $_POST['product_id'];
                $quantity = $_POST['quantity'];
                $stmt = $conn->prepare('SELECT MAX(`id`) FROM `cart_details` WHERE `product_id` = ?');
                $stmt->bind_param('i', $product_id);
                $stmt->execute();
                $stmt->bind_result($cart_detail_id);    
                $stmt->fetch();
                $stmt->close();
                $sql2 = "UPDATE `cart_details` SET `order_units` = '$quantity' WHERE `cart_details`.`id` = $cart_detail_id";
                mysqli_query($conn, $sql2);
            }
            ?>
            <div class="grand-total">
                <form action="checkout.php" method="POST">
                    <p><strong>TOTAL</strong></p>
                    <input name="total" readonly="readonly" style="border:none;background-color:transparent;" type="text" value="<?php echo $grand_total; ?>"><br>
                    <button type="submit">CHECKOUT</button>
                </form>
            </div>
        </div>

    </div>
</body>

</html>