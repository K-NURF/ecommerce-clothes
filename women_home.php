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

        <section class="selections"  style="margin-top: 4.9em;">
            <hr>
            <ul>
                <li class="women"><p><a href="women_home.php">Women</a></p>
                <div class="women-selections sec-selections">
                    <p>Clothing</p>
                    <p>Shoes & Boots</p>
                    <p>Accessories & Bags</p>
                    <p>Maternity</p>
                    <p>Petite</p>
                    <p>Tall</p>
                    <p>Brands</p>
                </div>
                </li>
                <li class = "men"><p><a href="men_home.php">Men</a></p>
                <div class="men-selections sec-selections">
                    <p>Clothing</p>
                    <p>Brands</p>
                    <p>Shoes & Boots</p>
                    <p>Accessories</p>
                </div>
                </li>
                <li class="girls"> <p><a href="girls_home.php">Girls</a></p>
                <div class="girls-selections sec-selections">
                    <p>Clothing</p>
                    <p>Shoes & Boots</p>
                    <p>Accessories</p>
                    <p>Brands</p>
                </div>
                </li>
                <li class = "boys"><p><a href="boys_home.php">Boys</a></p>
                <div class="boys-selections sec-selections">
                    <p>Clothing</p>
                </div>
                </li>
            </ul>
            <hr>
        </section>


        <section class="top-clothes">

                <?php
                require("connect.php");

                $sql = "SELECT * FROM `products` WHERE `category` = 'Women'";
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