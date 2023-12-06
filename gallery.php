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

<h2 id="gallerytext">Gallery</h2>

<div class="Imgcontainer">
    <div class="gallery-container">
        <?php
        $uploadFolder = 'uploads';
        $uploadPath = __DIR__ . '/' . $uploadFolder;

        $files = glob($uploadPath . '/*.{jpg,jpeg,png,gif}', GLOB_BRACE);

        if ($files) {
            foreach ($files as $file) {
                $filename = basename($file);
                echo '<div class="gallery-item">';
                echo '<img src="' . $uploadFolder . '/' . $filename . '" alt="' . $filename . '">';
                echo '</div>';
            }
        } else {
            echo "No images found.";
        }
        ?>
    </div>
</div>



<script src="js/home.js"></script>
</body>
</html>
