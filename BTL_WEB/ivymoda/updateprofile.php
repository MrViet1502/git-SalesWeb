<?php

// Include necessary files and initialize objects
require_once("database/dtb.php");

// Assume you have a session started already
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user"])) {
    // Return an error response
    $response = array("success" => false, "message" => "User not logged in.");
    echo json_encode($response);
    exit();
}

// Get user information from the session
$userEmail = $_SESSION["user"]["email"];

// Check if the request is a POST request and contains the necessary data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updateProfile"])) {
    $newProvince = isset($_POST["province"]) ? $_POST["province"] : '';
    $newDistrict = isset($_POST["district"]) ? $_POST["district"] : '';
    $newWard = isset($_POST["ward"]) ? $_POST["ward"] : '';
    $newAddress = isset($_POST["address"]) ? $_POST["address"] : '';
    $newEmail = isset($_POST["email"]) ? $_POST["email"] : '';

    // Validate the data if needed

    // Update the user profile in the database
    $updateSql = "UPDATE tbl_users SET tinh=?, huyen=?, xa=?, diachi=?, email=? WHERE email=?";
    $updateStmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($updateStmt, $updateSql)) {
        mysqli_stmt_bind_param($updateStmt, "ssssss", $newProvince, $newDistrict, $newWard, $newAddress, $newEmail, $userEmail);
        mysqli_stmt_execute($updateStmt);
        mysqli_stmt_close($updateStmt);

        // Update the user information in the session
        $_SESSION["user"]["tinh"] = $newProvince;
        $_SESSION["user"]["huyen"] = $newDistrict;
        $_SESSION["user"]["xa"] = $newWard;
        $_SESSION["user"]["diachi"] = $newAddress;
        $_SESSION["user"]["email"] = $newEmail;

        // Return a success response
        $response = array("success" => true, "message" => "Profile updated successfully.");
        echo json_encode($response);
    } else {
        // Return an error response
        $response = array("success" => false, "message" => "Error in preparing SQL statement.");
        echo json_encode($response);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Return an error response
    $response = array("success" => false, "message" => "Invalid request.");
    echo json_encode($response);
}
?>