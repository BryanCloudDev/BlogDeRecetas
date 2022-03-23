<?php
// Unset all the session variables
$_SESSION = array();

// Destroy the session.
session_destroy();

// Redirect to login page
header("location: ../Vista/login.php");
exit;
?>