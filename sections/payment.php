<?php
    //session start and keep loggedin or redirect to login page.
    session_start();
    $userprofile=$_SESSION['usersession'];
    if($userprofile==false){
        header('location:../index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/_table.css">
    <link rel="stylesheet" href="../css/staffPanel.css">
    <link rel="stylesheet" href="../css/_topnavStaff.css">

    

    <title>Farm Management System</title>
</head>
<body>
<?php include '_topnavStaff.php' ?>


<script src="../vendor/jquery-3.6.4.min.js"></script>


<script src="../js/staffPanel.js"></script>
<script src="../js/global.js"></script>

<!-- <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> -->
</body>
</html>