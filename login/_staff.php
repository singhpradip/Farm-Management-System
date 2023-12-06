<?php
    session_start();

    include '../_connect.php';

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $username = $_POST["username2"];
        $password = sha1($_POST["password2"]);

        $sql = "SELECT user_id FROM `users_table` WHERE username='$username' and password='$password'";
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_assoc($result);
        
            if (!empty($data)) {
        
                // Store the user_id in the session
                $_SESSION['usersession'] = $username;
                echo json_encode(['success' => true, 'message' => 'Redirecting to staff panel...']);
                exit;
            } else {
                echo json_encode(['message' => true, 'message' => 'Username and Password do not matched']);
                exit;
            }
    }