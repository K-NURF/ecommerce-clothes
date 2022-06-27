<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="CSS/products_admin.css">
</head>

<body>
    <div class="wrapper-users">
        <header class="fixed-header">
            <a href="home_page.html"><img src="resources/fashionee_logo-removebg-preview.png" alt="logo" class="logo"></a>

            <div class="edit-div">
                <form action="edit_product.php" method="POST">
                    <label>Enter ID to edit:</label>
                    <input type="text" name="id" placeholder="eg., 5">
                    <button class="top-edit-button" type="submit"><svg fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="50px" height="50px">
                            <path d="M 43.050781 1.9746094 C 41.800781 1.9746094 40.549609 2.4503906 39.599609 3.4003906 L 38.800781 4.1992188 L 45.699219 11.099609 L 46.5 10.300781 C 48.4 8.4007812 48.4 5.3003906 46.5 3.4003906 C 45.55 2.4503906 44.300781 1.9746094 43.050781 1.9746094 z M 37.482422 6.0898438 A 1.0001 1.0001 0 0 0 36.794922 6.3925781 L 4.2949219 38.791016 A 1.0001 1.0001 0 0 0 4.0332031 39.242188 L 2.0332031 46.742188 A 1.0001 1.0001 0 0 0 3.2578125 47.966797 L 10.757812 45.966797 A 1.0001 1.0001 0 0 0 11.208984 45.705078 L 43.607422 13.205078 A 1.0001 1.0001 0 1 0 42.191406 11.794922 L 9.9921875 44.09375 L 5.90625 40.007812 L 38.205078 7.8085938 A 1.0001 1.0001 0 0 0 37.482422 6.0898438 z" />
                        </svg>edit</button>
                </form>
            </div>        </header>
        <div class="users-table">
            <h1>Products Table</h1>
            <?php

            require("connect.php");

            $sql = "SELECT * FROM `products` WHERE `is_deleted` = 0";
            $result = mysqli_query($conn, $sql);

            echo "<table>";
            echo "<tr>
                        <th>Image</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Department</th>
                        <th>Image Name</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>";
            for ($x = 0; $x < mysqli_num_rows($result); $x++) {
                $row = mysqli_fetch_array($result);
                echo "<tr>";
                echo "<td style = 'width:10%;'> <img style = 'width:50%;' src='product_images/".$row[6]."'></td>";

                for ($y = 0; $y < mysqli_num_fields($result); $y++) {
                    echo "<td>";
                    // echo "<pre>";
                    print_r($row[$y]);
                    // echo "</pre>";
                    echo "</td>";

                }
                
                echo "<td style = 'width:5%;'> <a href='#' ><svg fill='#000000' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 50 50' width='50px' height='50px'>
                <path d='M 43.050781 1.9746094 C 41.800781 1.9746094 40.549609 2.4503906 39.599609 3.4003906 L 38.800781 4.1992188 L 45.699219 11.099609 L 46.5 10.300781 C 48.4 8.4007812 48.4 5.3003906 46.5 3.4003906 C 45.55 2.4503906 44.300781 1.9746094 43.050781 1.9746094 z M 37.482422 6.0898438 A 1.0001 1.0001 0 0 0 36.794922 6.3925781 L 4.2949219 38.791016 A 1.0001 1.0001 0 0 0 4.0332031 39.242188 L 2.0332031 46.742188 A 1.0001 1.0001 0 0 0 3.2578125 47.966797 L 10.757812 45.966797 A 1.0001 1.0001 0 0 0 11.208984 45.705078 L 43.607422 13.205078 A 1.0001 1.0001 0 1 0 42.191406 11.794922 L 9.9921875 44.09375 L 5.90625 40.007812 L 38.205078 7.8085938 A 1.0001 1.0001 0 0 0 37.482422 6.0898438 z' />
            </svg></a> </td> ";
                echo "<td style = 'width:5%;'> <a href='#' ><svg class = 'delete-button' xmlns='http://www.w3.org/2000/svg' height='48' width='48'><path d='M13.05 42Q11.85 42 10.95 41.1Q10.05 40.2 10.05 39V10.5H8V7.5H17.4V6H30.6V7.5H40V10.5H37.95V39Q37.95 40.2 37.05 41.1Q36.15 42 34.95 42ZM34.95 10.5H13.05V39Q13.05 39 13.05 39Q13.05 39 13.05 39H34.95Q34.95 39 34.95 39Q34.95 39 34.95 39ZM18.35 34.7H21.35V14.75H18.35ZM26.65 34.7H29.65V14.75H26.65ZM13.05 10.5V39Q13.05 39 13.05 39Q13.05 39 13.05 39Q13.05 39 13.05 39Q13.05 39 13.05 39Z'/></svg></a> </td> ";
                echo "</tr>";
            }
            echo "</table>";

            
            ?>
        </div>
        <br>
        <br>
        <a href="admin.php"><button type="button">Back</button></a>
    </div>

</body>

</html>