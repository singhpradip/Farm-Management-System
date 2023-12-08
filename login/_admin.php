<?php
    session_start();

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // if (isset($_POST['submit1'])) {

        $username = $_POST["username1"];
        $password = $_POST["password1"];

        // Check if the username and password match
        if ($username === "admin" && $password === "admin") {
            $_SESSION['adminSession'] = $username;
            echo json_encode(['success' => true, 'message' => 'Redirecting to admin panel...']);
            exit;
        } else {
            echo json_encode(['message' => true, 'message' => 'Username and Password do not matched']);
            exit;
        }
    }