<?php
include '../_connect.php';

// Fetch the current rate from the database
$sql = "SELECT current_rate FROM rate WHERE id = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $currentRate = $row["current_rate"];

    // Return the current rate as JSON
    echo json_encode(["current_rate" => $currentRate]);
} else {
    echo json_encode(["current_rate" => null]);
}

// Close the database connection
$conn->close();