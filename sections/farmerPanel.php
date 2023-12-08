<?php
    //session start and keep loggedin or redirect to login page.
    session_start();
    $userprofile=$_SESSION['usersession'];
    if($userprofile==false){
        header('location:../index.php');
    }

    include '../_connect.php';

    // Fetch farmer information from the database
    $sql1 = "SELECT * FROM farmer_login WHERE contact_no = '$userprofile'";
    $result1 = mysqli_query($conn, $sql1);

    if ($result1 && mysqli_num_rows($result1) > 0) {
        $row = mysqli_fetch_assoc($result1);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/_table.css">
    <link rel="stylesheet" href="../css/dailyMilk.css">
    <link rel="stylesheet" href="../css/_topnavStaff.css">
    <link rel="stylesheet" href="../css/farmerPanel.css">
    

    <title>Farm Management System</title>
</head>
<body>
<?php include '_topnavFarmer.php' ?>


<!-- -------------------------------------------------------------------- -->
<section class="milkFormContainer">
<fieldset>
        <legend>Farmer Information</legend>
        <div class="infoRow">
            <span class="label">ID:</span>
            <span class="detail"><?php echo $row['id']; ?></span>
        </div>
        <div class="infoRow">
            <span class="label">Name:</span>
            <span class="detail"><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></span>
        </div>
        <div class="infoRow">
            <span class="label">Contact No:</span>
            <span class="detail"><?php echo $row['contact_no']; ?></span>
        </div>
        <div class="infoRow">
            <span class="label">Address:</span>
            <span class="detail"><?php echo $row['address']; ?></span>
        </div>
    </fieldset>

    <?php
    } else {
        echo "No data available";
    }?>



<!-- ============== show Milk records ========================== -->
<main class="todaysRec">
        <section class="recHeader">
            <h1>Information about Sales</h1>
        </section>
        <section class="recBody">
            <div class="tableContainer">
                <table id="recTable">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Tempreture</th>
                            <th>Fat</th>
                            <th>Quantity (ltr)</th>
                        </tr>
                    </thead>
                        <tbody>
                            <?php

                            // Fetch data from the dailyMilk table in descending order of id
                            $sql = "SELECT date, temp, fat, qty
                                    FROM dailyMilk WHERE contact_no= '$userprofile'
                                    ORDER BY id DESC";

                            $result = $conn->query($sql);

                            // Check if there are any records
                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                            <td>{$row['date']}</td>
                                            <td>{$row['temp']}</td>
                                            <td>{$row['fat']}</td>
                                            <td>{$row['qty']}</td>
                                        </tr>";
                                }
                            } else {
                                // No records found
                                echo "<tr><td colspan='6'>No records found</td></tr>";
                            }

                            // Close the database connection
                            $conn->close();
                            ?>

                        </tbody>
                </table>
            </div>
        </section>
</main>





<!-- --------------------------------------------------------------------- -->






<script src="../vendor/jquery-3.6.4.min.js"></script>

<script src="../js/dailyMilk.js"></script>
<script src="../js/global.js"></script>

<!-- <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> -->
</body>
</html>