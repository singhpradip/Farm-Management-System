<?php



$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure that the necessary fields are set
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['cpassword'])) {
        // Retrieve form data
        $username = htmlspecialchars(trim($_POST['username']));
        $password = htmlspecialchars($_POST['password']);
        $cpassword = htmlspecialchars($_POST['cpassword']);
        // if($password){
        //     $response['status'] = 'data';
        //     $response['message'] = 'Username: '.$username .' password:' .$password;
        // }

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
     
                //Check if the username is unique
                $sql_check_username = "SELECT * FROM `users_table` WHERE `username` = '$username'";
                $result_check_username = mysqli_query($conn, $sql_check_username);

                if (mysqli_num_rows($result_check_username) > 0) {
                    $response['status'] = 'error';
                    $response['message'] = 'Username already exists.';

                } else {
                    //Insert user into the database
                    $hashed_password = sha1($password);
                    $sql_insert_user = "INSERT INTO `users_table` (`username`, `password`) VALUES ('$username', '$hashed_password')";
                    $result_insert_user = mysqli_query($conn, $sql_insert_user);

                    if ($result_insert_user) {
                        $response['status'] = 'success';
                        $response['message'] = 'User registration successful.';
                    } else {
                        $response['status'] = 'error';
                        $response['message'] = 'Error inserting user into the database.';
                    }
                }

                // Close database connection (Replace with your database connection closing code)
                mysqli_close($conn);
            }
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Invalid request.';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request method.';
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);

