<?php

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure that the necessary fields are set
    if (isset($_POST['userId']) && isset($_POST['farmerName']) && isset($_POST['temp']) &&
        isset($_POST['fat']) && isset($_POST['qty'])) {

        // Retrieve form data
        $userId = htmlspecialchars($_POST['userId']);
        $farmerName = htmlspecialchars($_POST['farmerName']);
        $temp = htmlspecialchars($_POST['temp']);
        $fat = htmlspecialchars($_POST['fat']);
        $qty = htmlspecialchars($_POST['qty']);

        // Validate the necessary fields
        if (empty($userId) || empty($farmerName) || empty($qty)) {
            $response['status'] = 'error';
            $response['message'] = 'Require fields are Empty !.';
            echo json_encode($response);
            exit;
        }

        include '../_connect.php';

        // Check if the user ID or contact number exists in the database
        $sqlCheckUser = "SELECT id FROM farmer_login WHERE contact_no = '$userId' OR id = '$userId'";
        $resultCheckUser = $conn->query($sqlCheckUser);

        if ($resultCheckUser->num_rows > 0) {
            // User found, proceed with inserting data into the database
            $sqlInsert = "INSERT INTO dailyMilk (user_id, contact_no, farmer_name, temp, fat, qty)
                        SELECT id, contact_no, '$farmerName', '$temp', '$fat', '$qty'
                        FROM farmer_login
                        WHERE contact_no = '$userId' OR id = '$userId'";

            if ($conn->query($sqlInsert) === TRUE) {
                $response['status'] = 'success';
                $response['message'] = 'Record added successfully.';
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Error inserting data into the database: ' . $conn->error;
            }
        } else {
            // User not found
            $response['status'] = 'error';
            $response['message'] = 'Farmer is not registered.';
        }

        $conn->close();

    } else {
        // Set error message
        $response['status'] = 'error';
        $response['message'] = 'Incomplete data received.';
    }
} else {
    // Set error message
    $response['status'] = 'error';
    $response['message'] = 'Invalid request method.';
}

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
exit;

?>
