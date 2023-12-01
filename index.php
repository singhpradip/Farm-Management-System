<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css\index.css">
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
            <div id="adminForm" class="form-container">
                <h2>Code for log as Admin Form goes here...</h2>
            </div>
            <div id="staffForm" class="form-container">
                <h2>Code for log as Staff Form goes here...</h2>
            </div>
            <div id="farmerForm" class="form-container">
                <h2>Code for log as Farmer Form goes here...</h2>
            </div>
        </div>
    </div>
</section>

<script>
    // Set the default form to be displayed
    document.getElementById('farmerForm').style.display = 'block';

    function showForm(formId) {
        // Hide all forms
        document.getElementById('adminForm').style.display = 'none';
        document.getElementById('staffForm').style.display = 'none';
        document.getElementById('farmerForm').style.display = 'none';

        // Show the selected form
        document.getElementById(formId).style.display = 'block';

        // Update button styles to highlight the active button
        document.querySelectorAll('.buttons button').forEach(button => {
            button.classList.remove('active');
        });
        document.getElementById(formId.replace('Form', 'Btn')).classList.add('active');
    }
</script>

    <script src="home.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>



</html>