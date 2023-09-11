<?php
            require("connect.php");

                $payment = $_POST['payment_types'];

                $stmt = $conn->prepare('SELECT MAX(id) FROM `cart` WHERE `customer_id` = ?');
                $stmt->bind_param('i', $_SESSION['id']);
                $stmt->execute();
                $stmt->bind_result($cart_id);
                $stmt->fetch();
                $stmt->close();

                $sql1 = "UPDATE `cart` SET `payment_type` = $payment WHERE `id` = $cart_id;";
                header("Location: checkout.php");