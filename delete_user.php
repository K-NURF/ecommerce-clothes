<?php
require("connect.php");

$idd = $_GET['id'];

$sql = "UPDATE `users` SET `is_deleted` = 1 WHERE `id` = $idd";
if(mysqli_query($conn, $sql)){
    header("Location: users_display.php");
}else{
    echo "<script>alert('Failed to delete product');</script>";

}