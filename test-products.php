<?php

require("connect.php");

$sql = "SELECT * FROM `products`";
$result = mysqli_query($conn, $sql);
echo "<pre>";
print_r($result);
echo "</pre>";

if(mysqli_num_rows($result)>0){

    do {
        echo "<pre>";
    print_r($row);
    echo "</pre>";
    } while ($row = mysqli_fetch_array($result));
}
