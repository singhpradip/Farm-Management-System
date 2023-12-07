<?php
// _getFarmerInfo.php

// Include your database connection script
include '../_connect.php';

// Check if farmerId is provided
if (isset($_GET['farmerId'])) {
    $farmerId = $_GET['farmerId'];

    // Fetch farmer data from the database
    $sql = "SELECT * FROM farmer_login WHERE id = $farmerId";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $farmerData = mysqli_fetch_assoc($result);

        // Return farmer data as JSON
        echo json_encode(['status' => 'success', 'data' => $farmerData]);
        exit;
    } else {
        // Handle database error
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
        exit;
    }
} else {
    // Handle missing farmerId parameter
    echo json_encode(['status' => 'error', 'message' => 'farmerId parameter is missing']);
    exit;
}
?>
