<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="CSS/products_admin.css">
</head>

<body>
    <div class="wrapper-users">
        <header class="fixed-header">
            <a href="home_page.php"><img src="resources/fashionee_logo-removebg-preview.png" alt="logo" class="logo"></a>

     </header>
        <div class="users-table">
            <h1>Purchase Details</h1>
            <?php

            require("connect.php");

            $idd = $_GET['id'];

            $sql = "SELECT `name`, `product_price`, `order_units` FROM `cart_details` INNER JOIN `products` WHERE `cart_id` = $idd";
            $result = mysqli_query($conn, $sql);

            echo "<table>";
            echo "<tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Units</th>

                    </tr>";
            for ($x = 0; $x < mysqli_num_rows($result); $x++) {
                $row = mysqli_fetch_array($result);
                echo "<tr>";

                    echo "<td>";
                    // echo "<pre>";
                    print_r($row['name']);
                    // echo "</pre>";
                    echo "</td>";
                    echo "<td>";
                    // echo "<pre>";
                    print_r($row['product_price']);
                    // echo "</pre>";
                    echo "</td>";
                    echo "<td>";
                    // echo "<pre>";
                    print_r($row['order_units']);
                    // echo "</pre>";
                    echo "</td>";

                
                

                echo "</tr>";
            }
            echo "</table>";

            
            ?>
        </div>
        <br>
        <br>
        <a href="admin.php"><button type="button">Back</button></a>
    </div>

</body>

</html>