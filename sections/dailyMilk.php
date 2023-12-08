<?php
    //session start and keep loggedin or redirect to login page.
    session_start();
    $userprofile=$_SESSION['staffSession'];
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
    <link rel="stylesheet" href="../css/dailyMilk.css">
    <link rel="stylesheet" href="../css/_topnavStaff.css">
    

    <title>Farm Management System</title>
</head>
<body>
<?php include '_topnavStaff.php' ?>


<!-- -------------------------------------------------------------------- -->
<section class="milkFormContainer">
    <h1>Daily Milk Record</h1>
    <form id="dailyMilkForm" method="POST">
        <table id="dailyMilkTable">
            <tr>
                <th><label for="userId" >User ID / Phone Number</label></th>
                <th><label for="farmerName">Farmer Name</label></th>
                <th><label for="temp">Tempreture</label></th>
                <th><label for="fat">Fat</label></th>
                <th><label for="qty">Quantity</label></th>
            </tr>
            <tr>
                <td><input type="text" id="userId" onblur="fetchFarmer(),fetchTempFat();" required> </td>
                <td><input type="text" id="farmerName" readonly required></td>
                <td><input type="text" id="temp" ></td>
                <td><input type="text" id="fat" ></td>
                <td><input type="text" id="qty" required></td>
            </tr>       
            <tr>
                <td colspan="4">
                </td>
                <td>
                    <!-- <button type="button" value="submit" id="addMilkRec"">Add Record</button> -->
                    <!-- <button type="submit" value="submit" >Add Record</button> -->
                    <!-- <button type="button" value="submit" id="addMilkRec">Add Record</button> -->
                    <button type="submit" id="addMilkRec" name="submit">Add Record</button>


                </td>
            </tr>    
        </table>
    </form>
</section>



<!-- ============== show Milk records ========================== -->
<main class="todaysRec">
        <section class="recHeader">
            <h1>Today's History</h1>
        </section>
        <section class="recBody">
            <div class="tableContainer">
                <table id="recTable">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Farmer ID</th>
                            <th>Contact Number</th>
                            <th>Farmer Name</th>
                            <th>Tempreture</th>
                            <th>Fat</th>
                            <th>Quantity (ltr)</th>
                        </tr>
                    </thead>
                        <tbody>
                            <?php
                            // Include your database connection file
                            include '../_connect.php';

                            // Fetch data from the dailyMilk table in descending order of id
                            $sql = "SELECT date, user_id, contact_no, farmer_name, temp, fat, qty
                                    FROM dailyMilk
                                    ORDER BY id DESC";

                            $result = $conn->query($sql);

                            // Check if there are any records
                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                            <td>{$row['date']}</td>
                                            <td>{$row['user_id']}</td>
                                            <td>{$row['contact_no']}</td>
                                            <td>{$row['farmer_name']}</td>
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