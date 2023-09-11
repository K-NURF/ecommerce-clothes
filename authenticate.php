<?php

session_start();
require("connect.php");

if ( !isset($_POST['email'], $_POST['password']) ) {
	exit('Please fill both the username and password fields!');
}

if ($stmt = $conn->prepare('SELECT `id`,`first_name`, `password`, `picture`,`role` FROM `users` WHERE email = ?')) {
	$stmt->bind_param('s', $_POST['email']);
	$stmt->execute();
	$stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $first_name, $password, $picture, $role);
        $stmt->fetch();
        // Account exists, now we verify the password.
        // Note: remember to use password_hash in your registration file to store the hashed passwords.
        if ($_POST['password'] === $password) {            // Verification success! User has logged-in!
            if($role == 'admin') {
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $_POST['email'];
                $_SESSION['admin_id'] = $id;
                $_SESSION['first_name'] = $first_name;
                $_SESSION['picture'] = $picture;
                header('Location: admin.php'); 
            }else{
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['email'];
            $_SESSION['id'] = $id;
            $_SESSION['first_name'] = $first_name;
            $_SESSION['picture'] = $picture;

            $status = "pending";
        
            $sql1 = "INSERT INTO `cart` (`customer_id`, `status`) VALUES ('$id', '$status')";
            mysqli_query($conn, $sql1);

            header('Location: home_page_2.php');                
            }

        } else {
            // Incorrect password
            echo 'Incorrect email and/or password!';
        }
    } else {
        // Incorrect username
        echo 'Account does not exist';
    }

	$stmt->close();
}
?>