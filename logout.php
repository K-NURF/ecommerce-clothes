<?php
session_start();
session_destroy();
// Redirect to the login page:
header('Location: home_page.php');
?>