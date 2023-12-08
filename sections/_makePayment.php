<?php
// Include your database connection file
include "../_connect.php";

// Retrieve data from the AJAX request
$farmerId = isset($_POST['farmerId']) ? $_POST['farmerId'] : '';
$paidAmount = isset($_POST['paidAmount']) ? $_POST['paidAmount'] : '';

// Validate and sanitize data (you should perform more thorough validation)
$farmerId = filter_var($farmerId, FILTER_SANITIZE_NUMBER_INT);
$paidAmount = filter_var($paidAmount, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

// Perform the database insertion
$sql = "INSERT INTO payments (user_id, amount, payment_date) VALUES (?, ?, NOW())";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "id", $farmerId, $paidAmount);
$result = mysqli_stmt_execute($stmt);

// Check the result and send response
if ($result) {
    $response = array('status' => 'success', 'message' => 'Payment successful!');
} else {
    $response = array('status' => 'error', 'message' => 'An error occurred while making the payment.');
}

// Close the database connection
mysqli_stmt_close($stmt);
mysqli_close($conn);

// Send the JSON response
header('Content-Type: application/json');
echo json_encode($response);