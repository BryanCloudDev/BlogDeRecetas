<?php
// Unset all the session variables
session_start();
if(!isset($_SESSION["user"])){
    header("Location: ../login.php");
}
$_SESSION = array();
// Destroy the session.
session_destroy();

// Redirect to login page
header("location: ../login.php");
exit;
?>