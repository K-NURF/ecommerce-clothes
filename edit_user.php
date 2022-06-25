<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User edit</title>
    <link rel="stylesheet" href="CSS/products_admin.css">

</head>
<body>
    <div class="wrapper">
        <header class="fixed-header">
         <a href="home_page.html"><img src="resources/fashionee_logo-removebg-preview.png" alt="logo" class="logo"></a>
        </header>   
        <p class = "edit-intro">Edit required fields and click save:</p>

        <form action="edit_user_2.php" method = "POST">

        <?php
        require("connect.php");

        $selected_id = $_POST['id'];
        
        $sql = "SELECT * FROM `users` WHERE `id` = '".$selected_id."'";

        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            echo "<input type='hidden' name='id' value='".$row['id']."'>";
            echo "<label>First Name</label><br>";
            echo "<input type='text' name='first_name' value='".$row['first_name']."'><br><br>";

            echo "<label>Last Name</label><br>";
            echo "<input type='text' name='last_name' value='".$row['last_name']."'><br><br>";

            echo "<label>email</label><br>";
            echo "<input type='text' name='email' value='".$row['email']."'><br><br>";

            echo "<label>Password</label><br>";
            echo "<input type='text' name='password' value='".$row['password']."'><br><br>";

            echo "<label>Confirm Password</label><br>";
            echo "<input type='text' name='c_password' value='".$row['c_password']."'><br><br>";

            echo "<label>Card account number</label><br>";
            echo "<input type='text' name='acc_number' value='".$row['acc_number']."'><br><br>";

            echo "<label>Card Security Code</label><br>";
            echo "<input type='text' name='security_code' value='".$row['security_code']."'><br><br>";

            echo "<label>Picture</label><br>";
            echo "<input type='file' name='picture'><br><br>";

            echo "<label>Role</label><br>";
            echo "<input type='text' name='role' value='".$row['role']."'><br><br>";

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