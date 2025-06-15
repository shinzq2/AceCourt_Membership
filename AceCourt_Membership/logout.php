<?php
// Start the session to access session variables
session_start();

// Unset all session variables
session_unset();  // Removes all variables in the session

// Destroy the session completely
session_destroy();  // Ends the session and deletes the session data

// Redirect the user back to the login page
header("Location: login.php");
exit();  // Ensure no further code is executed after the redirect
?>
