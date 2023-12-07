<?php
include '../_connect.php';
// Get the new rate from the JSON request
$data = json_decode(file_get_contents('php://input'), true);
$newRate = $data["newRate"];

// Update the rate in the database
$sql = "UPDATE rate SET current_rate = '$newRate' WHERE id=1 ";
if ($conn->query($sql) === TRUE) {
    echo json_encode(["message" => "Rate updated successfully"]);
} else {
    echo json_encode(["message" => "Error updating rate: " . $conn->error]);
}

// Close the database connection
$conn->close();
