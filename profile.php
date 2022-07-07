 <?php
    session_start();
    require("connect.php");
    if (!isset($_SESSION['loggedin'])) {
        header('Location: login.php');
        exit;
    }

    $stmt = $conn->prepare('SELECT `email`, `password`, `gender`, `last_name` FROM `users` WHERE id = ?');
    $stmt->bind_param('i', $_SESSION['id']);
    $stmt->execute();
    $stmt->bind_result($email, $password, $gender, $last_name);
    $stmt->fetch();
    $stmt->close();

    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Profile</title>
     <link rel="stylesheet" href="CSS/products_admin.css">

 </head>

 <body>
     <div class="wrapper">
         <header class="fixed-header">
             <a href="home_page_2.php"><img src="resources/fashionee_logo-removebg-preview.png" alt="logo" class="logo"></a>

             <div class="navi">
                 <ul>
                     <li><a href="#" target="_blank" title="View Profile"><img src="profile_pics/<?= $_SESSION['picture'] ?>" class="profile-pic"></a></li>
                     <li><a href="logout.php" target="_blank" title="logout"><img src="resources/logout.png" class="icons"></a></li>
                 </ul>
             </div>
         </header>
         <h2 style="margin-top:5em;"><u>Your Details</u></h2>
         <h3>Picture</h3>
         <img style="width:10em; height: 10em; border: 3px solid #0ABAB5; border-radius: 5px;" src="profile_pics/<?= $_SESSION['picture'] ?>">

         <table>
             <tr>
                 <td>First Name:</td>
                 <td><?= $_SESSION['first_name'] ?></td>
             </tr>
             <tr>
                 <td>Last Name:</td>
                 <td><?= $last_name ?></td>
             </tr>
             <tr>
                 <td>email:</td>
                 <td><?= $email ?></td>
             </tr>
             <tr>
                 <td>Password:</td>
                 <td><?= $password ?></td>
             </tr>
             <tr>
                 <td>Gender:</td>
                 <td><?= $gender ?></td>
             </tr>
         </table>

         <p>Click here to see your <a style = "text-decoration:none; color: #0ABAB5;" href="#">purchase history</a></p>
         <button type="button"><a href="home_page_2.php">Back</a></button>

 </body>

 </html>