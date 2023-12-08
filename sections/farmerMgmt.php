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
    <link rel="stylesheet" href="../css/farmerMgmt.css">
    <link rel="stylesheet" href="../css/_topnavStaff.css">

    

    <title>Farm Management System</title>
</head>
<body>
<?php include '_topnavStaff.php' ?>


    <!-- add new Staff button -->
    <button type="button" id="addUserBtn" class="right-button" onclick="openSignUpForm()">Add New Staff</button>
    <!-- form  for adding new Staff -->
    <div id="signupModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal1()">&times;</span>
            <h3 class="loginHeading">Register new Farmer !</h3>
                    <form id="farmerForm" method="post">
                        <div class="input-group">
                            <input type="text" placeholder="First Name *" name="firstName" id="firstName" onkeydown="return alphaOnly(event);" required>
                            <input type="text" placeholder="Last Name" name="lastName" id="lastName" onkeydown="return alphaOnly(event);" required>
                        </div>
                        <div class="input-group">
                            <input type="text" placeholder="Address *" name="address" id="address" required>
                            <input type="text" placeholder="Contact No *" name="contactNo" id="contactNo" onkeydown="numOnly(event);" required>
                        </div>
                        <div class="input-group">
                            <input type="password" placeholder="Password *" name="password" id="password" required>
                            <input type="password" placeholder="Confirm Password *" name="confirmPassword" id="confirmPassword" required>
                        </div>
                        <div class="radio-group">
                            <input type="radio" name="gender" value="male" id="male" required> <span class="label">Male</span>
                            <input type="radio" name="gender" value="female" id="female" required> <span class="label">Female</span>
                            <button type="submit" id="farmerRegBtn" class="formBtn" name="farmerReg">Register</button>
                        </div>
                    </form>


        </div>
    </div>

    
    <!-- Edit form-button inside table  -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal2()">&times;</span>

                <h3 class="loginHeading">Update Farmer Information !</h3>
                    <form id="farmerEditForm" method="post">
                        <div class="input-group">
                            <input type="text" placeholder="First Name *" name="firstName" id="firstName1" onkeydown="return alphaOnly(event);" required>
                            <input type="text" placeholder="Last Name" name="lastName" id="lastName1" onkeydown="return alphaOnly(event);" required>
                        </div>
                        <div class="input-group">
                            <input type="text" placeholder="Address *" name="address" id="address1" required>
                            <input type="text" placeholder="Contact No *" name="contactNo" id="contactNo1" onkeydown="numOnly(event);" required>
                        </div>
                        <div class="input-group">
                            <input type="password" placeholder="Set New Password *" name="password" id="password1" required>
                            <input type="password" placeholder="Confirm New Password *" name="confirmPassword" id="confirmPassword1" required>
                        </div>
                        <div class="radio-group">
                            <input type="radio" name="gender" value="male" id="male1" required> <span class="label">Male</span>
                            <input type="radio" name="gender" value="female" id="female1" required> <span class="label">Female</span>
                            <!-- <button type="submit" id="farmerRegBtn" class="formBtn" name="farmerReg">Register</button> -->
                        <button type="button" class="formBtn" id="saveChangesBtn">Save Changes</button>

                        </div>
                    </form>

        </div>
    </div>


    <main class="todaysRec">
        <section class="recHeader">
            <h1>Registered Farmers</h1>
        </section>
        <section class="recBody">
            <div class="tableContainer">
                <table id="recTable">
                    <thead>
                    <tr>
                        <th scope="col">Farmer Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Contact No.</th>
                        <th scope="col">Password</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Operation:</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                    // DB connection and selecting all data to display below in the table
                    include "../_connect.php";

                    // Fetch data from the correct table
                    $sql = "SELECT id, CONCAT(first_name, ' ', last_name) AS full_name, address, contact_no, password, gender FROM farmer_login";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['full_name']}</td>
                                    <td>{$row['address']}</td>
                                    <td>{$row['contact_no']}</td>
                                    <td>{$row['password']}</td>
                                    <td>{$row['gender']}</td>
                                    <td>
                                        <button type='button' class='editBtn' data-user-id='{$row['id']}'>Edit</button>
                                        <a href='_deleteFarmer.php?deleteid={$row['id']}'><button type='button' class='deleteBtn'>Delete</button></a>
                                    </td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No data available</td></tr>";
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
<script src="../js/farmerMgmt.js"></script>
<script src="../js/global.js"></script>

<!-- <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> -->
</body>
</html>