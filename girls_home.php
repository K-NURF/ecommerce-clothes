<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Women</title>
    <link rel="stylesheet" href="CSS/home_page.css">
</head>

<body>
    <div class="wrapper">
        <header class="fixed-header">
            <a href="home_page.html"><img style="margin: 0;" src="resources/fashionee_logo-removebg-preview.png" alt="logo" class="logo"></a>

        </header>

        <section class="top-clothes" style="margin-top: 6em;">

                <?php
                require("connect.php");

                $sql = "SELECT * FROM `products` WHERE `category` = 'Girls'";
                $result = mysqli_query($conn, $sql);

                for ($x = 0; $x < mysqli_num_rows($result); $x++) {
                    $row = mysqli_fetch_array($result);
                    echo "<div class='gallery-item'>";
                    echo "<img alt = 'product' style = 'width:13em; height: 15em;' src='product_images/" . $row[6] . "'>";
                    echo "<div>";
                    echo "<p class = 'item-name'>" . $row['name'] . "</p>";
                    echo "<p class = 'item-desc'>" . $row['description'] . "</p>";
                    echo "<p class = 'item-price'>Ksh " . $row['price'] . "</p>";
                    echo "<button style = 'width: 100%; height: 3.5em; border-radius: 5px; font-size: .9em;' class = 'add-to-cart'>ADD TO CART</button>";
                    echo "</div>";
                    echo "</div>";
                }   


                ?>
        </section>
    </div>
</body>

</html>