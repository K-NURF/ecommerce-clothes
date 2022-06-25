<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product edit</title>
    <link rel="stylesheet" href="CSS/products_admin.css">

</head>
<body>
    <div class="wrapper">
        <header class="fixed-header">
         <a href="home_page.html"><img src="resources/fashionee_logo-removebg-preview.png" alt="logo" class="logo"></a>
        </header>   
        <p class = "edit-intro">Edit required fields and click save:</p>

        <form action="edit_product_2.php" method = "POST">

        <?php
        require("connect.php");

        $selected_id = $_POST['id'];
        
        $sql = "SELECT * FROM `products` WHERE `products_id` = '".$selected_id."'";

        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            echo "<input type='hidden' name='id' value='".$row['products_id']."'>";
            echo "<label>Name</label><br>";
            echo "<input type='text' name='name' value='".$row['name']."'><br><br>";

            echo "<label>Price</label><br>";
            echo "<input type='text' name='price' value='".$row['price']."'><br><br>";

            echo "<label>Description</label><br>";
            echo "<input type='text' name='description' value='".$row['description']."'><br><br>";

            echo "<label>category</label><br>";
            echo "<input type='text' name='category' value='".$row['category']."'><br><br>";

            echo "<label>Department</label><br>";
            echo "<input type='text' name='department' value='".$row['department']."'><br><br>";

            // echo "<label>Image</label><br>";
            // echo "<input type='text' name='image' value='".$row['image']."'><br><br>";

            echo "<label>Status</label><br>";
            echo "<input type='text' name='is_deleted' value='".$row['is_deleted']."'><br><br>";
        }
        ?>

        <button type="submit">Save</button>
        </form>
        <a href="users_display.php"><button>Cancel</button></a>

    </div>
    
</body>
</html>