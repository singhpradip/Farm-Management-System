<?php
$uploadFolder = '../uploads/';

if (isset($_POST['submit'])) {
    $file = $_FILES['image'];

    // Check if the file is an image
    $fileType = pathinfo($file['name'], PATHINFO_EXTENSION);
    $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');

    if (in_array(strtolower($fileType), $allowedTypes)) {
        $destination = $uploadFolder . uniqid() . '.' . $fileType;

        // Move the uploaded file to the destination folder
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            // Image uploaded successfully
            echo '<script>alert("Image uploaded successfully.");</script>';
            echo '<script>document.getElementById("uploadForm").reset();</script>';
            echo '<script>window.location.href = "adminPanel.php";</script>';
        } else {
            // Error in moving the file
            echo '<script>alert("Error uploading the image.");</script>';
            echo '<script>window.location.href = "adminPanel.php";</script>';
        }
    } else {
        // Invalid file type
        echo '<script>alert("Invalid file type. Please upload a valid image.");</script>';
        echo '<script>window.location.href = "adminPanel.php";</script>';
    }
}