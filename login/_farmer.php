<?php
    session_start();

    include '../_connect.php';

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $phoneNo = $_POST["phoneNo"];
        $password = sha1($_POST["password3"]);

        $sql = "SELECT id  FROM `farmer_login` WHERE contact_no='$phoneNo' and password='$password'";
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_assoc($result);
        
            if (!empty($data)) {
        
                // Store the user_id in the session
                $_SESSION['farmerSession'] = $phoneNo;
                echo json_encode(['success' => true, 'message' => 'Redirecting to farmer panel...']);
                exit;
            } else {
                echo json_encode(['message' => true, 'message' => 'Phone Number and Password do not matched !']);
                exit;
            }
    }