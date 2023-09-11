<?php

require("connect.php");

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$password=$_POST['password'];
$gender=$_POST['gender'];
$role = "customer";
$profile_pic = $_FILES['profile_pic']['name'];
$destination = "profile_pics/" . basename($_FILES['profile_pic']['name']);


$sql = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `gender`, `picture`, `role` )VALUES ('$firstname', '$lastname', '$email', '$password', '$gender','$profile_pic', '$role')";

if(mysqli_query($conn, $sql)){
    move_uploaded_file($_FILES['profile_pic']['tmp_name'], $destination);
    header("Location:home_page_2.php");

}else{
    echo "User registration failed".mysqli_error($conn);
}
?>