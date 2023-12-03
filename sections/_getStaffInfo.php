<?php
// _getUserData.php

// Include your database connection script
include '../_connect.php';

// Check if userId is provided
if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];

    // Fetch user data from the database
    $sql = "SELECT * FROM users_table WHERE user_id = $userId";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $userData = mysqli_fetch_assoc($result);

        // Return user data as JSON
        echo json_encode(['status' => 'success', 'data' => $userData]);
        exit;
    } else {
        // Handle database error
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
        exit;
    }
} else {
    // Handle missing userId parameter
    echo json_encode(['status' => 'error', 'message' => 'userId parameter is missing']);
    exit;
}
?>
