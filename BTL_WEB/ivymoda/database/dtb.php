<?php
    $hostName = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "website_ivy";
    $conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
    if(!$conn) {
        die("Something went wrong");
    }
?>