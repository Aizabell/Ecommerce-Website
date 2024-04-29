<?php
session_start();

// Unset all of the session variables
$_SESSION = array();
unset($_SESSION['user']);
unset($_SESSION['role']);
session_destroy();
// Destroy the session.


// Redirect to homepage after logout
header("Location: Home.php");
exit();
