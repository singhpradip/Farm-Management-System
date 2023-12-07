<?php
include '../_connect.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['userId'];

    $sql = "SELECT CONCAT(`first_name`, ' ', `last_name`) AS fullName FROM `farmer_login` WHERE `id` = '$userId' OR `contact_no` = '$userId'";

    $response = array(); // Prepare a response array

    try {
        $result = $conn->query($sql);

        if (!$result) {
            throw new Exception("Error executing query: " . $conn->error);
        }

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $response['status'] = 'success';
            $response['fullName'] = $row['fullName'];
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Farmer not registered';
        }
    } catch (Exception $e) {
        $response['status'] = 'error';
        $response['message'] = 'Error: ' . $e->getMessage();
    }

    // Send the JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}

$conn->close();
