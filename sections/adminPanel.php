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
    <link rel="stylesheet" href="../css/adminPanel.css">
    

    <title>Farm Management System</title>
</head>
<body>
    <!-- top Nav---------------------------- -->
    <header>
        <div class="container">
            <h1>Admin Zone</h1>
            <nav>
                <ul>
                    <li><a href="../login/_logout.php" id="logoutLink">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <button type="button" id="addImageBtn" class="left-button" onclick="openAddImageForm()">Add Image to Gallery</button>
    <!-- form  for adding images -->
    <div id="addImageModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeAddImageForm()">&times;</span>
            <h2>Add Image to Gallery</h2>

            <form action="_uploadImage.php" method="post" enctype="multipart/form-data">

                <div class="formGroup">
                    <div class="inputWrapper">
                        <input type="file" name="image" accept="image/*" required/>
                    </div>
                </div>

                <div class="formGroup">
                    <div class="inputWrapper">
                        <button type="submit" id="addImageSubmitBtn" class="formBtn" name="submit">Add Image</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    
    
    
    
    <!-- add new Staff button -->
    <button type="button" id="addUserBtn" class="right-button" onclick="openSignUpForm()">Add New Staff</button>
    <!-- form  for adding new Staff -->
    <div id="signupModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal1()">&times;</span>
            <h2>Signup New Staff</h2>

            <form method="post" class="loginForm" id="signupForm">
                <div class="formGroup">
                    <div class="inputWrapper">
                        <input type="text" placeholder="User Name *" name="username" onkeydown="return alphaOnly(event);" required/>
                    </div>
                </div>
                <div class="formGroup">
                    <div class="inputWrapper">
                        <input type="password" placeholder="Password *" name="password" required/>
                    </div>
                </div>

                <div class="formGroup">
                    <div class="inputWrapper">
                        <input type="password" placeholder="Confirm Password *" name="cpassword" required/>
                    </div>
                </div>

                <div class="formGroup">
                    <div class="inputWrapper">
                        <button type="submit" id="signupBtn" class="formBtn" name="submit">Sign Up</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    
    <!-- Edit form-button inside table  -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal2()">&times;</span>
            <h2>Edit Staff Info.</h2>
            <div id="responseMessage"></div>

            <form method="post" class="loginForm" id="editForm">
                <div class="formGroup">
                    <div class="inputWrapper">
                        <input type="text" placeholder="User Name *" name="username" onkeydown="return alphaOnly(event);" required/>
                    </div>
                </div>
                <div class="formGroup">
                    <div class="inputWrapper">
                        <input type="password" placeholder="Set New Password *" name="password" required/>
                    </div>
                </div>

                <div class="formGroup">
                    <div class="inputWrapper">
                        <input type="password" placeholder="Confirm New Password *" name="cpassword" required/>
                    </div>
                </div>

                <div class="formGroup">
                    <div class="inputWrapper">
                        <button type="button" class="formBtn" id="saveChangesBtn">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <main>
        <section id="heading">
            <h1>Authorized Users:</h1>
        </section>
        
        <section>
            <table>
                <thead>
                    <!-- Creating table header -->
                    <tr>
                        <th scope="col">User_id</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Operation:</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // DB connection and selecting all data to display below in the table
                        include "../_connect.php";
                        $sql = "SELECT * FROM users_table";
                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                            // Fetch data in descending order by key
                            $sql = "SELECT * FROM `users_table` ORDER BY `user_id` DESC";
                            $result = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $key = $row['user_id'];
                                $name = $row['username'];
                                $password = $row['password'];
                                echo '<tr>
                                    <th scope="row">' . $key . '</th>
                                    <td>' . $name . '</td>
                                    <td>' . $password . '</td>
                                    <td>

                                        <button type="button" class="editBtn" data-user-id="' . $key . '">Edit</button>

                                        <a href="_deleteuser.php?deleteid=' . $key . '"><button type="button" class="deleteBtn">Delete</button></a>
                                    </td>
                                </tr>';
                            }
                        } else {
                            echo "<tr><td colspan='3'>No data available</td></tr>";
                        }
                    ?>

                </tbody>
            </table>

        </section>
    </main>

    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
    <!-- offline setup--------- -->
    <script src="../vendor/jquery-3.6.4.min.js"></script>


    <script src="../js/adminPanel.js"></script>
    <script src="../js/global.js"></script>

    <!-- <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> -->
</body>



</html>