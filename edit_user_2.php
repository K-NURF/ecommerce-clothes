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
            <a href="home_page.php"><img src="resources/fashionee_logo-removebg-preview.png" alt="logo" class="logo"></a>
        </header>
        <div class="php-div">
            <?php
            require("connect.php");

            $id = $_POST['id'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $gender = $_POST['gender'];
            // $picture = $_FILES['picture']['name'];
            $role = $_POST['role'];
            $is_deleted = $_POST['is_deleted'];
            // $destination = "users_pictures/" . basename($_FILES['picture']['name']);

            $sql = "UPDATE `users` SET `first_name` = '$first_name', `last_name` = '$last_name', `email` = '$email', `password` = '$password', `gender` = '$gender', `role` = '$role', `is_deleted` = '$is_deleted' WHERE `id` = '$id'";

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
                echo "<script>alert('Failed to edit User');</script>";
            }


            ?>
        </div>

            <a href="users_display.php"><button>Back to Users</button></a>
        <a href="admin.php"><button>Back to Admin</button></a>
    </div>
</body>

</html>