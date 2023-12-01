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
    <?php include "_topnav.php" ?>
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
                    
                    <form method="post" action="login/admin.php" class="loginForm" id="adminLogin">
                        <div class="formGroup">
                            <div class="inputWrapper">
                                <input type="text" placeholder="User Name *" name="username1" onkeydown="return alphaOnly(event);" required/>
                            </div>
                        </div>
                        <div class="formGroup">
                            <div class="inputWrapper">
                                <input type="password" placeholder="Password *" name="password1" required/>
                            </div>
                            <input type="submit" class="loginButton" name="submit1" value="Login"/>
                        </div>
                    </form>
                </div>

            </div>


            <!-- Staff Login----------------------------------- -->
            <div id="staffForm" class="form-container">
                <!-- <h2>Code for log as Staff Form goes here...</h2> -->
                <div id="adminLoginForm">
                    <h3 class="loginHeading">Login as Staff</h3>
                    <form method="post" action="func3.php" class="loginForm">
                        <div class="formGroup">
                            <div class="inputWrapper">
                                <input type="text" placeholder="User Name *" name="username2" onkeydown="return alphaOnly(event);" required/>
                            </div>
                        </div>
                        <div class="formGroup">
                            <div class="inputWrapper">
                                <input type="password" placeholder="Password *" name="password2" required/>
                            </div>
                            <input type="submit" class="loginButton" name="submit2" value="Login"/>
                        </div>
                    </form>
                </div>

            </div>


            <!-- Farmer Login----------------------------------- -->
            <div id="farmerForm" class="form-container">
                <!-- <h2>Code for log as Farmer Form goes here...</h2> -->
                <h3 class="loginHeading">Register new Farmer !</h3>
                <form id="farmerForm" action="register_farmer.php" method="post">
                    <div class="input-group">
                        <input type="text" placeholder="First Name *" name="firstName" id="firstName" required>
                        <input type="text" placeholder="Last Name" name="lastName" id="lastName" required>
                    </div>
                    <div class="input-group">
                        <input type="text" placeholder="Address" name="address" id="address" required>
                        <input type="text" placeholder="Contact No" name="contactNo" id="contactNo" required>
                    </div>
                    <div class="input-group">
                        <input type="password" placeholder="Password" name="password" id="password" required>
                        <input type="password" placeholder="Confirm Password" name="confirmPassword" id="confirmPassword" required>
                    </div>
                    <div class="radio-group">
                        <input type="radio" name="gender" value="male" id="male"> <span class="label">Male</span>
                        <input type="radio" name="gender" value="female" id="female"> <span class="label">Female</span>
                        <span id="submit"><input type="submit" id="submitBtn" value="Register"></span>
                    </div>
                    <div id="or">
                        -- or --
                    </div>
                    <span id="farmerLoginlink">
                        <button id="farmerLoginBtn" onclick="showForm('farmerLoginForm')">Already has an Account ? LogIn Now</button>
                    </span>

                </form>
            </div>


            <div id="farmerLoginForm" class="form-container">
                <!-- <h2>Code for log as Staff Form goes here...</h2> -->
                <div id="adminLoginForm">
                    <h3 class="loginHeading">Login as Farmer</h3>
                    <form method="post" action="func3.php" class="loginForm">
                        <div class="formGroup">
                            <div class="inputWrapper">
                                <input type="text" placeholder="User Name *" name="username3" onkeydown="return alphaOnly(event);" required/>
                            </div>
                        </div>
                        <div class="formGroup">
                            <div class="inputWrapper">
                                <input type="password" placeholder="Password *" name="password3" required/>
                            </div>
                            <input type="submit" class="loginButton" name="submit3" value="Login"/>
                        </div>
                    </form>
                </div>

            </div>


        </div>
    </div>
</section>


<script>
    // Set the default form to be displayed
    document.getElementById('farmerForm').style.display = 'block';

    function fadeIn(element) {
        var opacity = 0;
        element.style.opacity = opacity;
        var interval = setInterval(function () {
            if (opacity < 1) {
                opacity += 0.1;
                element.style.opacity = opacity;
            } else {
                clearInterval(interval);
            }
        }, 50);
    }

    function showForm(formId) {
        // Hide all forms
        document.querySelectorAll('.form-container').forEach(form => {
            form.style.display = 'none';
        });

        // Show the selected form with fade-in animation
        var selectedForm = document.getElementById(formId);
        selectedForm.style.display = 'block';
        fadeIn(selectedForm);

        // Update button styles to highlight the active button (form vitra kai mathi ko nav button)
        document.querySelectorAll('.buttons button').forEach(button => {
            button.classList.remove('active');
        });
        document.getElementById(formId.replace('Form', 'Btn')).classList.add('active');
    }

</script>


    <script src="js/home.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>



</html>