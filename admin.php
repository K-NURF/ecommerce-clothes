<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
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
    <title>ADMINISTRATOR</title>
    <link rel="stylesheet" href="CSS/products_admin.css">

</head>
<body>
    <div class="wrapper">
        <header>
        <a href="home_page.php"><img src="resources/fashionee_logo-removebg-preview.png" alt="logo" class="logo"></a>
        <a href="logout.php" target = "_blank" title = "logout"><img src = "resources/logout.png" class = "icons"></a>

        <h1>ADMINISTRATOR</h1>
        </header>

        <div class="hero">
        <h3>What would you like to do?</h3>

        <a href="products_admin.php"><button type="button">Add a Product</button></a><br><br>
        <a href="users_display.php"><button type="button">Display users</button></a><br><br>
        <a href="products_display.php"><button type="button">Display all products</button></a><br><br>
        <a href="view_purchases.php"><button type="button">View purchases</button></a><br><br>
   
        </div>


    </div>
</body>
</html>