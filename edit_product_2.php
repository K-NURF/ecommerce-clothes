<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saving</title>
    <link rel="stylesheet" href="CSS/edit_save.css">
</head>

<body>
    <div class="wrapper">
        <header class="fixed-header">
            <a href="home_page.html"><img src="resources/fashionee_logo-removebg-preview.png" alt="logo" class="logo"></a>
        </header>
        <div class="php-div">
            <?php
            require("connect.php");

            $id = $_POST['id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $category = $_POST['category'];
            $department = $_POST['department'];
            // $image = $_POST['image'];
            // $picture = $_FILES['picture']['name'];
            // $role = $_POST['role'];
            $is_deleted = $_POST['is_deleted'];
            // $destination = "users_pictures/" . basename($_FILES['picture']['name']);

            $sql = "UPDATE `products` SET `name` = '$name', `price` = '$price', `description` = '$description', `category` = '$category', `department` = '$department', `is_deleted` = '$is_deleted' WHERE `products_id` = '$id'";

            if (mysqli_query($conn, $sql)) {
                // move_uploaded_file($_FILES['picture']['tmp_name'], $destination);
                echo "<p class = 'edit-intro' >Changes have been updated successfully</p>";
                echo "<div class='success-checkmark'>
            <div class='check-icon'>
               <span class='icon-line line-tip'></span>
               <span class='icon-line line-long'></span>
               <div class='icon-circle'></div>
               <div class='icon-fix'></div>
            </div>
         </div>";
            } else {
                echo "<script>alert('Failed to add product');</script>";
            }


            ?>
        </div>

            <a href="products_display.php"><button>Back to Products</button></a>
        <a href="admin.php"><button>Back to Admin</button></a>
    </div>
</body>

</html>