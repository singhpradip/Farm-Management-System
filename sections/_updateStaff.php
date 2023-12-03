<?php

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure that the necessary fields are set
    if (isset($_POST['userId']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['cpassword'])) {
        // Retrieve form data
        $userId = htmlspecialchars(trim($_POST['userId']));
        $username = htmlspecialchars(trim($_POST['username']));
        $password = htmlspecialchars($_POST['password']);
        $cpassword = htmlspecialchars($_POST['cpassword']);

        // Validate username
        if (empty($username)) {
            $response['status'] = 'error';
            $response['message'] = 'Username is required.';
        } elseif (preg_match('/\s/', $username)) {
            $response['status'] = 'error';
            $response['message'] = 'Username must not contain any space.';
        } else {
            // Validate password
            if (empty($password) || empty($cpassword)) {
                $response['status'] = 'error';
                $response['message'] = 'Password and Confirm Password are required.';
            } elseif (!preg_match('/[a-zA-Z]/', $password) || !preg_match('/[0-9]/', $password) || strlen($password) < 6) {
                $response['status'] = 'error';
                $response['message'] = 'Password must contain both characters and numbers, and be at least 6 characters long.';
            } elseif ($password !== $cpassword) {
                $response['status'] = 'error';
                $response['message'] = 'Password does not match.';
            } else {
                // Sample database connection (Replace with your database connection code)
                include '../_connect.php';

                // Update user data in the database
                $hashed_password = sha1($password);
                $sql_update_user = "UPDATE `users_table` SET `username` = '$username', `password` = '$hashed_password' WHERE `user_id` = $userId";
                $result_update_user = mysqli_query($conn, $sql_update_user);

                if ($result_update_user) {
                    $response['status'] = 'success';
                    $response['message'] = 'User data updated successfully.';
                } else {
                    $response['status'] = 'error';
                    $response['message'] = 'Error updating user data in the database.';
                }

                // Close database connection (Replace with your database connection closing code)
                mysqli_close($conn);
            }
        }
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
