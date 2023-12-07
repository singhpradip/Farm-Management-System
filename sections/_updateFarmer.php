<?php

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure that the necessary fields are set
    if (isset($_POST['farmerId']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['address']) && isset($_POST['contactNo']) && isset($_POST['password']) && isset($_POST['gender'])) {
        // Retrieve form data
        $farmerId = htmlspecialchars(trim($_POST['farmerId']));
        $firstName = htmlspecialchars(trim($_POST['firstName']));
        $lastName = htmlspecialchars(trim($_POST['lastName']));
        $address = htmlspecialchars(trim($_POST['address']));
        $contactNo = htmlspecialchars(trim($_POST['contactNo']));
        $password = htmlspecialchars($_POST['password']);
        $gender = htmlspecialchars(trim($_POST['gender']));

        // TODO: Validate data


        // if ($farmerId){
        //     $response['status'] = 'success';
        //     $response['message'] = $farmerId . $firstName;

        // }

        // Sample database connection (Replace with your database connection code)
        include '../_connect.php';

        // Update farmer data in the database
        $hashed_password = sha1($password); // Use a secure hashing algorithm
        $sql_update_farmer = "UPDATE `farmer_login` SET 
                              `first_name` = '$firstName', 
                              `last_name` = '$lastName', 
                              `address` = '$address', 
                              `contact_no` = '$contactNo', 
                              `password` = '$hashed_password', 
                              `gender` = '$gender' 
                              WHERE `id` = $farmerId";
        $result_update_farmer = mysqli_query($conn, $sql_update_farmer);

        if ($result_update_farmer) {
            $response['status'] = 'success';
            $response['message'] = 'Farmer data updated successfully.';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error updating farmer data in the database.';
        }

        // Close database connection (Replace with your database connection closing code)
        mysqli_close($conn);
    } else {
        $response['status'] = 'error';
        $response['message'] = 'All fields are required.';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request method.';
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);