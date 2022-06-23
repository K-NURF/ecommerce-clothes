<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="CSS/products_admin.css">
</head>

<body>
    <div class="wrapper">
        <header>
            <a href="home_page.html"><img src="resources/fashionee_logo-removebg-preview.png" alt="logo" class="logo"></a>
            <h1>Adding New Product</h1>
        </header>

        <form action="process_admin.php" method="post" enctype="multipart/form-data">
            <div class="choosing">
                <div class="category">
                    <div class="existing-categories">
                        <p><u>Select category or create a new category</u></p>
                        <select name="category" class="drop-down" id="category">
                            <option value="">-select-</option>
                            <?php

                            require("connect.php");

                            $sql = "SELECT * FROM `categories`";
                            $result = mysqli_query($conn, $sql);

                            for ($x = 0; $x < mysqli_num_rows($result); $x++) {
                                $row = mysqli_fetch_array($result);
                                for ($y = 0; $y < mysqli_num_fields($result); $y++) {
                                    echo "<option value='".$row[$y]."'>".$row[$y]."</option>";
                                }

                            }
                            ?>
                        </select>
                    </div>

                    <label for="or" class="or">OR</label>

                    <div class="new-category">
                        <p><u>Type name of the new category</u></p>
                        <input type="text" name="new_category" id="new_category">
                    </div>
                </div>

                <div class="department">
                    <div class="existing-categories">
                        <p><u>Select department or create a new department</u></p>
                        <select name="department" class="drop-down" id="department">
                            <option value="">-select-</option>
                            <?php

                            require("connect.php");

                            $sql = "SELECT * FROM `department`";
                            $result = mysqli_query($conn, $sql);

                            for ($x = 0; $x < mysqli_num_rows($result); $x++) {
                                $row = mysqli_fetch_array($result);
                                for ($y = 0; $y < mysqli_num_fields($result); $y++) {
                                    echo "<option value='".$row[$y]."'>".$row[$y]."</option>";
                                }

                            }
                            ?>
                        </select>
                    </div>

                    <label for="or" class="or">OR</label>

                    <div class="new-department">
                        <p><u>Type name of the new department</u></p>
                        <input type="text" name="new_department" id="new_department">
                    </div>
                </div>


            </div>

            <hr>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name"><br><br>

            <label for="price">Price:</label>
            <input type="text" id="price" name="price"><br><br>

            <label for="description">Description:</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea><br><br>

            <label for="image">Image:</label>
            <input type="file" id="image" name="image" multiple=""><br><br>

            <button type="submit">Add Product</button>
        </form>
        <br>
        <a href="admin.php"><button>Back to Admin</button></a>
    </div>
</body>

</html>