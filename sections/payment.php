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
    <link rel="stylesheet" href="../css/paymentPanel.css">
    <link rel="stylesheet" href="../css/farmerMgmt.css">

    <link rel="stylesheet" href="../css/dailyMilk.css">

    <link rel="stylesheet" href="../css/_topnavStaff.css">

    <title>Farm Management System</title>
</head>
<body>
    <?php include '_topnavStaff.php' ?>


    <form id="rateForm">
        <label for="currentRate">Current Rate:</label>
        <input type="text" id="currentRate" class="rateInput">
        <button type="button" id="updateButton" onclick="updateRate()">Update</button>
    </form>




 
    <!-- Edit form-button inside table  -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal2()">&times;</span>

            <h3 class="loginHeading">Payment Information !</h3>
            <form id="farmerEditForm" method="post">
                <div class="center-text">
                    <input type="hidden" name="farmerId" id="farmerId" value="YOUR_FARMER_ID">
                    <label for="deuAmount">Deu Amount:</label>
                    <input type="text" name="deuAmount" id="deuAmount" style="color: red; font-weight: bold; text-align: center; font-size: 1rem; "; readonly required><br>
                    <label for="paid">Paying ?</label>
                    <input type="text" name="paid" id="paid" style=" font-weight: bold; text-align: center; font-size: 1rem; " required>
                    <button type="button" class="formBtn" id="makePayment">Make Payment</button>
                </div>
            </form>
        </div>
    </div>



    <main class="todaysRec">
        <section class="recHeader">
            <h1>Payment Information</h1>
        </section>
        <section class="recBody">
            <div class="tableContainer">
                <table id="recTable">
                    <thead>
                    <tr>
                        <th scope="col">Farmer Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Contact No.</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Deu Amount</th>
                        <th scope="col">Operation:</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    // DB connection
                    include "../_connect.php";

                    // Fetch data from the correct tables and calculate total quantity and amount
                    $sql = "SELECT 
                            farmer_id,
                            farmer_name,
                            contact_no,
                            total_qty,
                            total_amount,
                            due_amount
                        FROM view_totalMilk
                        HAVING due_amount > 0";
        


                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['farmer_id']}</td>
                                    <td>{$row['farmer_name']}</td>
                                    <td>{$row['contact_no']}</td>
                                    <td>{$row['total_qty']}</td>
                                    <td>{$row['total_amount']}</td>
                                    <td>{$row['due_amount']}</td>
                                    <td>
                                    <button type='button' class='editBtn payBtn' data-user-id='{$row['farmer_id']}' 
                                data-total-amount='{$row['due_amount']}'>PAY</button>

                                    </td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No data available</td></tr>";
                    }

                    // Close the database connection
                    mysqli_close($conn);
                    ?>


                </tbody>
                </table>
            </div>
        </section>
</main>



<script src="../vendor/jquery-3.6.4.min.js"></script>
<script src="../js/payment.js"></script>
<script src="../js/global.js"></script>

<!-- <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> -->
</body>
</html>