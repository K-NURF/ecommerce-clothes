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
        <form method="post" action="process_register.php">
                <input type="text" id = "fname" name="firstname" placeholder="first name" class = "input-fields"><br>
                <input type="text" id = "lname" name="lastname" placeholder="last name" class = "input-fields"><br>
                <input type="email" id = "email" name="email" placeholder="email" class = "input-fields"><br>
                <input type="password" id = "pass" name="password" placeholder="password" class = "input-fields"><br>
                <input type="password" id = "pass" name="c_password" placeholder="confirm password" class = "input-fields"><br>

                <h3><u>CARD DETAILS</u></h3>
                <input type="text" id = "acc_number" name="acc_number" placeholder="account number" class = "input-fields"><br>
                <input type="text" id = "security_code" name="security_code" placeholder="security code" class = "input-fields"><br>
                <button type="submit">CREATE</button>
        </form>
        <p>Already have an account? <a href="login.php">Login</a> </p>
    </div>
</body> 
</html>