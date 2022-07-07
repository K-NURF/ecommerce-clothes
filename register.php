<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashionee</title>
    <link rel="stylesheet" href="CSS/register.css">
</head>
<body>
    <div class="wrapper">
        <header>
            <a href="home_page.html"><img src="resources/fashionee_logo-removebg-preview.png" alt="logo" class="logo"></a>
            <h1>CREATE ACCOUNT</h1>
        </header>
        <form method="post" action="process_register.php" enctype="multipart/form-data">
                <input type="text" id = "fname" name="firstname" placeholder="first name" class = "input-fields"><br>
                <input type="text" id = "lname" name="lastname" placeholder="last name" class = "input-fields"><br>
                <input type="email" id = "email" name="email" placeholder="email" class = "input-fields"><br>
                <input type="password" id = "pass" name="password" placeholder="password" class = "input-fields"><br>
                <label for = "gender"> <u>Gender</u></label><br>
                <input type="radio" id = "gender" name="gender"  value = "male">
                <label for = "gender">Male</label>
                <input type="radio" id = "gender" name="gender"  value = "female">
                <label for = "gender">Female</label><br>
                <label for = "profile_pic"> <u>Profile Picture</u></label><br>
                <input type="file" id = "profile_pic" name="profile_pic" class = "input-fields"><br>

                <button type="submit">CREATE</button>
        </form>
        <p>Already have an account? <a href="login.php">Login</a> </p>
    </div>
</body> 
</html>