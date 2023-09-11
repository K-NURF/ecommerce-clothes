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
    <title>Users</title>
    <link rel="stylesheet" href="CSS/products_admin.css">
</head>

<body>
    <div class="wrapper-users">
        <header class="fixed-header">
            <a href="home_page.php"><img src="resources/fashionee_logo-removebg-preview.png" alt="logo" class="logo"></a>


        </header>

        <div class="users-table">
            <h1>Purchase History</h1>
            <?php

            require("connect.php");

            $iddd = $_SESSION['id'];

            $sql = "SELECT * FROM `cart` WHERE `customer_id` = $iddd";
            $result = mysqli_query($conn, $sql);

            echo "<table>";
            echo "<thead>
                        <th>Date</th>
                        <th>Status</th>
                        
                    </thead>";
            for ($x = 0; $x < mysqli_num_rows($result); $x++) {
                $row = mysqli_fetch_array($result);
                echo "<tr>";

                    echo "<td>";
                    // echo "<pre>";
                    print_r($row['created_at']);

                    // echo "</pre>";
                    echo "</td>";
                    echo "<td>";
                    // echo "<pre>";
                    print_r($row['status']);

                    // echo "</pre>";
                    echo "</td>";
                
                echo "<td style = 'width: 10em;'> <a href = 'purchase_details.php?id=". $row['id']."'><button>View Details</button></a></td> ";
                echo "</tr>";
            }
            echo "</table>";
            ?>
        </div>
        <br>
        <br>
        <a href="profile.php"><button type="button">Back</button></a>
    </div>

</body>

</html>