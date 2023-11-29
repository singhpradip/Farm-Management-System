<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "_connect.php";

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $imageName = $_FILES["image"]["name"];
        $imagePath = "uploads/" . $imageName; // Adjust the path as needed

        // Move the uploaded file to the server
        move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);

        // Insert the file information into the database
        $sql = "INSERT INTO Gallery (ImageName, ImagePath) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $imageName, $imagePath);
        $stmt->execute();

        $stmt->close();
    } else {
        echo "Error uploading the image.";
    }

    $conn->close();
    header("Location: index.php"); // Redirect to the gallery page after upload
    exit();
}
?>
