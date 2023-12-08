error_reporting(E_ALL);
ini_set('display_errors', 1);

<?php
// _makePayment.php

// Check if the required keys are present in the $_POST array
if (isset($_POST['farmerId'], $_POST['deuAmount'], $_POST['paidAmount'])) {
    $farmerId = $_POST['farmerId'];
    $deuAmount = $_POST['deuAmount'];
    $paidAmount = $_POST['paidAmount'];

    // Include your database connection code here
    include "../_connect.php";

    // Prepare and execute the SQL query using a prepared statement
    $sql = "UPDATE payments SET amount = amount + ?, payment_date = CURRENT_TIMESTAMP WHERE user_id = ?";
    
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        // Bind parameters and execute the statement
        mysqli_stmt_bind_param($stmt, "di", $paidAmount, $farmerId);
        $success = mysqli_stmt_execute($stmt);
        
        if ($success) {
            $response = [
                'status' => 'success',
                'message' => 'Payment successful!'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Payment failed. Please try again.'
            ];
        }

        // Close the statement
        mysqli_stmt_close($stmt);

    } else {
        $response = [
            'status' => 'error',
            'message' => 'Failed to prepare the SQL statement.'
        ];
    }

    // Close the database connection
    mysqli_close($conn);

} else {
    $response = [
        'status' => 'error',
        'message' => 'Missing required parameters in the request.'
    ];
}

// Return the JSON response
header('Content-Type: application/json');
echo json_encode($response);
