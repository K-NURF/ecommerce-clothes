<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="CSS/products_admin.css">
</head>

<body>
    <div class="wrapper-users">

        <header class="fixed-header">
            <a href="home_page_2.php"><img src="resources/fashionee_logo-removebg-preview.png" alt="logo" class="logo"></a>

        </header>
        <div class="cart_table">
            <h1 style="margin-top:3em;">CHECKOUT</h1>
            <h2>Confirm Payment Details and Address</h2>
            <label for="total"><u>Total Amount</u> </label>
            <?php
            require("connect.php");

            $total = $_POST['total'];
            echo "<p>";
            echo $total;
            echo "</p>";

            $stmt = $conn->prepare('SELECT MAX(id) FROM `cart` WHERE `customer_id` = ?');
            $stmt->bind_param('i', $_SESSION['id']);
            $stmt->execute();
            $stmt->bind_result($cart_id);
            $stmt->fetch();
            $stmt->close();

            $sql = "UPDATE `cart` SET `status` = 'paid', `total_amount` = '$total' WHERE `id` = $cart_id;";
            mysqli_query($conn, $sql);
            ?>
            <label for="payment">Select Payment Type:</label>
            <!-- <form method="post" action = "payment_update.php"> -->
            <select class="drop-down" style="width:10em;" name="payment_types">
                <option value="">-select-</option>
                <?php

                require("connect.php");

                $sql = "SELECT * FROM `payment`";
                $result = mysqli_query($conn, $sql);

                for ($x = 0; $x < mysqli_num_rows($result); $x++) {
                    $row = mysqli_fetch_array($result);
                    for ($y = 0; $y < mysqli_num_fields($result); $y++) {
                        echo "<option value='" . $row[$y] . "'>" . $row[$y] . "</option>";
                    }
                }
                ?>


            </select>
        <!-- <button type = "submit">Confirm</button>
        </form> -->

            <br><br>
            <a href="complete_purchase.php"><button>COMPLETE PURCHASE</button></a>


        </div>

    </div>
</body>

</html>