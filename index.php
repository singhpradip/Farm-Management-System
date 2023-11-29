<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="css\index_new.css">
    <title>Farm Management System</title>
</head>
<body>
    <?php include "_topnav.php" ?>
    <section>
        <div class="form-box">
            <div class="form-value">
                <button id="adminBtn" onclick="showForm('adminForm')">Admin</button>
                <button id="staffBtn" onclick="showForm('staffForm')">Staff</button>
                <button id="farmerBtn" onclick="showForm('farmerForm')">Farmer</button>

                <div id="adminForm" class="form-container">
                    <h2>Admin Form</h2>
                </div>

                <div id="staffForm" class="form-container">
                    <h2>Staff Form</h2>
                </div>

                <div id="farmerForm" class="form-container">
                    <h2>Farmer Form</h2>
                </div>

                <script>
                    function showForm(formId) {
                    // Hide all forms
                    document.getElementById('adminForm').style.display = 'none';
                    document.getElementById('staffForm').style.display = 'none';
                    document.getElementById('farmerForm').style.display = 'none';

                    // Show the selected form
                    document.getElementById(formId).style.display = 'block';
                    }

                </script>

            </div>
        </div>
    </section>
    <script src="home.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>