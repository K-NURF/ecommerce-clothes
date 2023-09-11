<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashionee</title>
    <link rel="stylesheet" href="CSS/products_admin.css">
</head>

<body>
    <div class="wrapper">
    <header class="fixed-header">
            <a href="home_page.php"><img src="resources/fashionee_logo-removebg-preview.png" alt="logo" class="logo"></a>
        </header>

        <div>
            <?php
            require("connect.php");

            $idd = $_GET['id'];

            $display_sql = "SELECT * FROM `products` WHERE `id` = $idd";
            $result = mysqli_query($conn, $display_sql);
            while ($row = mysqli_fetch_array($result)) {
                echo "<h2 style='margin-top:4em;'>".$row['category']." Fashion</h2>";
                echo "<h3>".$row['department']."</h3>";
                echo "<img style = 'width:25%;' src = 'product_images/" . $row['image'] . "'>";
                echo "<h4 style ='color: rgb(57,57,59);'>" . $row['name'] . "</h4>";
                echo "<p>Price: Ksh " . $row['price'] . "</p>";
                echo "<p>Description: " . $row['description'] . "</p>";
            }
            

            ?>
        </div>
        <br><br>
        
        <a href="products_admin.php"><button>Add another Product</button></a>
            <br><br>
        <a href="admin.php"><button>Back to Admin</button></a>
    </div>
</body>

</html>