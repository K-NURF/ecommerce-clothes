<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashionee</title>
    <link rel="stylesheet" href="CSS/login.css">
</head>

<body>
    <div class="wrapper">
        <header>
            <a href="home_page.html"><img src="resources/fashionee_logo-removebg-preview.png" alt="logo"
                    class="logo"></a>
            <h1>LOGIN</h1>
        </header>

        <section>
            <form method="POST" action="validate.php">
                <input type="email" id="email" name="email" placeholder="email" class="input-fields" required><br>
                <input type="password" id="password" name="password" placeholder="password" class="input-fields" required>
                <p style = "color:red;">*wrong email address &/or password</p>
            <div class="rem-for">
                <div class="remember-me"> <input type="checkbox" name="remember me" id="remember_me">
                    <label for="remember me">Remember me</label>
                </div>
                <div class="forgot"><a href="#">forgot password?</a></div>

            </div>
            <button type="submit">LOGIN</button>
            </form>

            <p>Don't have an account? <a href="register.php">create an account</a></p>
            </p>
        </section>

    </div>
</body>

</html>