<?php
include "header.php"; // Include header at the top

session_start();

if (isset($_SESSION["user"])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Regenerate session ID
    session_regenerate_id(true);

    // Redirect to the home page
    header("Location: index.php");
    exit();
} else {
    // If the user is not logged in, redirect to the home page
    header("Location: index.php");
    exit();
}

?>