<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username1"];
    $password = $_POST["password1"];

    // Check if the username and password match
    if ($username === "admin" && $password === "admin") {
        $_SESSION['usersession'] = $username;
        header("Location: ../sections/adminPanel.php"); // Redirects to admin_users.php after successful login
        exit;
    } else {
        // Display error message
        echo '<div>Wrong username or password</div>';
    }
}
