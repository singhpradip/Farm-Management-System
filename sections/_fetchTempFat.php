<?php
include '../_connect.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['userId'];

    $sql = "SELECT temp, fat FROM dailyMilk WHERE temp IS NOT NULL AND fat IS NOT NULL AND user_id= '$userId' OR contact_no = '$userId' ORDER BY date DESC LIMIT 1";

    $response = array(); // Prepare a response array

    try {
        $result = $conn->query($sql);

        if (!$result) {
            throw new Exception("Error executing query: " . $conn->error);
        }

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $response['status'] = 'success';
            $response['temp'] = $row['temp'];
            $response['fat'] = $row['fat'];
        } else {
            $response['status'] = 'error';
            $response['message'] = 'No recent data';
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
