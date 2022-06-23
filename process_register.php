<?php

require("connect.php");

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$password=$_POST['password'];
$confirm_password=$_POST['c_password'];
$account_number=$_POST['acc_number'];
$security_code=$_POST['security_code'];
$role = "customer";

$sql = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `c_password`, `acc_number`, `security_code`, `role` )VALUES ('$firstname', '$lastname', '$email', '$password', '$confirm_password', '$account_number', '$security_code', '$role')";

if(mysqli_query($conn, $sql)){
    echo "New user added successfully";
}else{
    echo "User registration failed".mysqli_error($conn);
}
?>