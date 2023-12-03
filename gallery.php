<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/gallery.css">
    <title>Farm Management System - Gallery</title>
</head>
<body>

<?php include "sections/_topnav.php" ?>

<div class="container">
    <h2>Gallery</h2>

    <form action="sections/_upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/*">
        <button type="submit">Upload Image</button>
    </form>

    <div class="gallery-container">
        <?php
        include "_connect.php";

        // Fetch and display images
        $sql = "SELECT ID, ImageName, ImagePath FROM Gallery";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="gallery-item">';
                echo '<img src="' . $row['ImagePath'] . '" alt="' . $row['ImageName'] . '">';
                echo '</div>';
            }
        } else {
            echo "No images found.";
        }

        $conn->close();
        ?>
    </div>
</div>

<script src="js/home.js"></script>
</body>
</html>
