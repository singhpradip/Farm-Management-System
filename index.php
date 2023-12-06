

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/index.css">
    <!-- <link rel="stylesheet" href="css/vendor.css"> -->
    <title>Farm Management System</title>
</head>
<body>
    <?php include "sections/_topnav.php" ?>
    <section>
        <div class="form-box">
            <div class="login-as">
                <h3>Login as:</h3>
            </div>
            
            <div class="buttons">
                <button id="farmerBtn" onclick="showForm('farmerForm')" class="active">Farmer</button>
                <button id="staffBtn" onclick="showForm('staffForm')">Staff</button>
                <button id="adminBtn" onclick="showForm('adminForm')">Admin</button>
            </div>

            <div class="form-value">

                <!-- Admin Login----------------------------------- -->
                <div id="adminForm" class="form-container">
                    <!-- <h2>Code for log as Admin Form goes here...</h2> -->
                    <div id="adminLoginForm">
                        <h3 class="loginHeading">Login as Admin</h3>
                        
                        <form method="post" class="loginForm" id="adminLogin">
                            <div class="formGroup">
                                <div class="inputWrapper">
                                    <input type="text" placeholder="User Name *" name="username1" onkeydown="return alphaOnly(event);" required/>
                                </div>
                            </div>
                            <div class="formGroup">
                                <div class="inputWrapper">
                                    <input type="password" placeholder="Password *" name="password1" required/>
                                </div>
                                <!-- <input type="submit" class="formBtn" name="submit1" value="Login"/> -->
                                <button type="submit" id="adminLoginBtn" class="formBtn" name="submit1">Login</button>

                            </div>
                        </form>
                    </div>

                </div>



                <!-- Staff Login----------------------------------- -->
                <div id="staffForm" class="form-container">
                    <!-- <h2>Code for log as Staff Form goes here...</h2> -->
                    <div id="adminLoginForm">
                        <h3 class="loginHeading">Login as Staff</h3>
                        <form method="post" class="loginForm" id="staffLogin">
                            <div class="formGroup">
                                <div class="inputWrapper">
                                    <input type="text" placeholder="User Name *" name="username2" onkeydown="return alphaOnly(event);" required/>
                                </div>
                            </div>
                            <div class="formGroup">
                                <div class="inputWrapper">
                                    <input type="password" placeholder="Password *" name="password2" required/>
                                </div>
                                <button type="submit" id="staffLoginBtn" class="formBtn" name="submit2">Login</button>
                            </div>
                        </form>
                    </div>

                </div>



                <!-- Farmer Register----------------------------------- -->
                <div id="farmerForm" class="form-container">
                    <!-- <h2>Code for log as Farmer Form goes here...</h2> -->
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

                        <div id="or">
                            -- or --
                        </div>
                        <span id="farmerLoginlink">
                            <button onclick="showForm('farmerLoginForm')"><u>Already has an Account ? LogIn Now</u></button>
                        </span>

                    </form>
                </div>


                <!-- Farmer Login------------------------------------------ -->
                <div id="farmerLoginForm" class="form-container">
                    <!-- <h2>Code for log as Farmer Form goes here...</h2> -->
                    <div id="adminLoginForm">
                        <h3 class="loginHeading">Login as Farmer</h3>
                        <form method="post" class="loginForm" id="farmerLogin">
                            <div class="formGroup">
                                <div class="inputWrapper">
                                    <input type="text" placeholder="Phone Number *" name="phoneNo" onkeydown="numOnly(event);" required/>
                                </div>
                            </div>
                            <div class="formGroup">
                                <div class="inputWrapper">
                                    <input type="password" placeholder="Password *" name="password3" required/>
                                </div>
                                <button type="submit" id="farmerLoginBtn" class="formBtn" name="submit3">Login</button>

                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
    <!-- offline setup--- -->
    <script src="vendor/jquery-3.6.4.min.js"></script>

    <script src="js/global.js"></script>
    <script src="js/home.js"></script>
    <!-- <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> -->
</body>



</html>