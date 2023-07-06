<?php
session_start();

// Destroy all session data
session_destroy();

// Redirect to the login page
// header("Location: ../process/login.php");
header("location:../process/login.php");
exit();
?>
