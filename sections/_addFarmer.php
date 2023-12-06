<?php


$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure that the necessary fields are set
    if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['address']) &&
        isset($_POST['contactNo']) && isset($_POST['password']) && isset($_POST['confirmPassword']) && isset($_POST['gender'])) {

        // Retrieve form data
        $firstName = htmlspecialchars($_POST['firstName']);
        $lastName = htmlspecialchars($_POST['lastName']);
        $address = htmlspecialchars($_POST['address']);
        $contactNo = htmlspecialchars($_POST['contactNo']);
        $password = htmlspecialchars($_POST['password']);
        $cPassword = htmlspecialchars($_POST['confirmPassword']);
        $gender = htmlspecialchars($_POST['gender']);

        // Validate the necessary fields
        if (empty($firstName) || empty($lastName) || empty($address) || empty($contactNo) || empty($password) || empty($cPassword) || empty($gender)) {
            $response['status'] = 'error';
            $response['message'] = 'All fields are required.';
            echo json_encode($response);
            exit;
        }

        // Validate first name and last name
        if (!preg_match('/^[a-zA-Z]+$/', $firstName) || !preg_match('/^[a-zA-Z]+$/', $lastName)) {
            $response['status'] = 'error';
            $response['message'] = 'Invalid format for first name or last name. Only alphabets are allowed.';
            echo json_encode($response);
            exit;
        }

        // Validate contact number
        if (!preg_match('/^\d{10}$/', $contactNo)) {
            $response['status'] = 'error';
            $response['message'] = 'Invalid contact number.';
            echo json_encode($response);
            exit;
        }

        // Validate password
        if (strlen($password) < 6 || !preg_match('/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]+$/', $password)) {
            $response['status'] = 'error';
            $response['message'] = 'Invalid password format.';
            echo json_encode($response);
            exit;
        }

        // Validate password confirmation
        if ($password !== $cPassword) {
            $response['status'] = 'error';
            $response['message'] = 'Passwords do not match.';
            echo json_encode($response);
            exit;
        }

       include '../_connect.php';

        // Validate contact number uniqueness
        $sqlCheckContact = "SELECT id FROM farmer_login WHERE contact_no = '$contactNo'";
        $resultCheckContact = $conn->query($sqlCheckContact);

        if ($resultCheckContact->num_rows > 0) {
            // Contact number already exists
            $response['status'] = 'error';
            $response['message'] = 'User already exists!';
            echo json_encode($response);
            exit;
        }

        $epassword = sha1($password);
        // Insert data into the database (Assuming you are using MySQLi)
        $sql = "INSERT INTO farmer_login (first_name, last_name, address, contact_no, password, gender)
                VALUES ('$firstName', '$lastName', '$address', '$contactNo', '$epassword', '$gender')";

        if ($conn->query($sql) === TRUE) {
            $response['status'] = 'success';
            $response['message'] = 'Registration successful.';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error inserting data into the database: ' . $conn->error;
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

