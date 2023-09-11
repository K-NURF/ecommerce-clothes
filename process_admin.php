<?php
require("connect.php");

$category = $_POST['category'];
$department = $_POST['department'];
$new_category = $_POST['new_category'];
$new_department = $_POST['new_department'];
$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$image = $_FILES['image']['name'];
$destination = "product_images/" . basename($_FILES['image']['name']);

//case where existing categories and sub-categories are chosen
if ($new_category == "" && $new_department == "") {
    $sql1 = "INSERT INTO `products` (`name`, `price`, `description`, `category`, `department`, `image`)VALUES ('$name', '$price', '$description', '$category', '$department', '$image')";

    if (mysqli_query($conn, $sql1)) {
        move_uploaded_file($_FILES['image']['tmp_name'], $destination);
        echo "<script>alert('Product added successfully');</script>";
    } else {
        echo "<script>alert('Failed to add product');</script>";
    }
}
//case where only new sub-category is created
if ($new_category == "" && $department == "") {
    $sql2 = "INSERT IGNORE `department` (`department`) VALUES ('$new_department')";
    $sql3 = "INSERT INTO `products` (`name`, `price`, `description`, `category`, `department`, `image`)VALUES ('$name', '$price', '$description', '$category', '$new_department', '$image')";

    mysqli_query($conn, $sql2);
    if (mysqli_query($conn, $sql3)) {
        move_uploaded_file($_FILES['image']['tmp_name'], $destination);
        echo "<script>alert('Product added successfully');</script>";
    } else {
        echo "<script>alert('Failed to add product');</script>";
    }
}
// case where only new category is created
if ($category == "" && $new_department == "") {
    $sql4 = "INSERT IGNORE `categories` (`category`) VALUES ('$new_category')";
    $sql5 = "INSERT INTO `products` (`name`, `price`, `description`, `category`, `department`, `image`)VALUES ('$name', '$price', '$description', '$new_category', '$department', '$image')";

    mysqli_query($conn, $sql4);
    if (mysqli_query($conn, $sql5)) {
        move_uploaded_file($_FILES['image']['tmp_name'], $destination);
        echo "<script>alert('Product added successfully');</script>";
    } else {
        echo "<script>alert('Failed to add product');</script>";
    }
}
//case where admin creates new category and new sub category
if ($category == "" && $department == "") {
    $sql6 = "INSERT IGNORE `categories` (`category`) VALUES ('$new_category')";
    $sql7 = "INSERT IGNORE `department` (`department`) VALUES ('$new_department')";
    $sql8 = "INSERT INTO `products` (`name`, `price`, `description`, `category`, `department`, `image`)VALUES ('$name', '$price', '$description', '$new_category', '$new_department', '$image')";

    mysqli_query($conn, $sql6);
    mysqli_query($conn, $sql7);
    if (mysqli_query($conn, $sql8)) {
        move_uploaded_file($_FILES['image']['tmp_name'], $destination);
        echo "<script>alert('Product added successfully');</script>";
    } else {
        echo "<script>alert('Failed to add product');</script>";
    }
}

if ($category != "" && $new_category != "") {
    echo "<script>alert('Product not added. Please do not select a category when creating a new category');</script>";
}
if ($department != "" && $new_department != "") {
    echo "<script>alert('Product not added. Please do not select a department when creating a new department');</script>";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="CSS/products_admin.css">
</head>

<body>
    <div class="wrapper">
        <header>
            <a href="home_page.php"><img src="resources/fashionee_logo-removebg-preview.png" alt="logo" class="logo"></a>
            <h1>PREVIEW</h1>
        </header>

        <div class="preview">
            <?php
            require("connect.php");
            $display_sql = "SELECT * FROM `products` ORDER BY `id` DESC LIMIT 1;";
            $result = mysqli_query($conn, $display_sql);
            while ($row = mysqli_fetch_array($result)) {
                echo "<h2 style ='color: rgb(57,57,59);'>" . $row['name'] . "</h2>";
                echo "<img style = 'width:25%;' src = 'product_images/" . $row['image'] . "'>";
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