// Set the default form to be displayed
var currentFormId = 'farmerForm';
document.getElementById(currentFormId).style.display = 'block';

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


//show farmer login form --------------------------------------
function showForm(formId) {
    
    // Check if the form is already displayed
    if (currentFormId === formId) {
        return;
    }

    // Hide the current form
    var currentForm = document.getElementById(currentFormId);
    currentForm.style.display = 'none';

    // Reset input fields in the current form
    var inputFields = currentForm.querySelectorAll('input');
    inputFields.forEach(input => {
        if (input.type !== 'radio') {
            input.value = '';
        } else {
            // For radio buttons, uncheck all options
            input.checked = false;
        }
    });

    // Show the selected form with fade-in animation
    var selectedForm = document.getElementById(formId);
    selectedForm.style.display = 'block';
    fadeIn(selectedForm);

    // Update the current form ID
    currentFormId = formId;

    // Update button styles to highlight the active button
    document.querySelectorAll('.buttons button').forEach(button => {
        button.classList.remove('active');
    });
    document.getElementById(formId.replace('Form', 'Btn')).classList.add('active');

}

// --------------------------Prevent default form submission of admin------------------
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("adminLoginBtn").addEventListener("click", function(e) {
        e.preventDefault(); // Prevent default form submission

        // Get form data
        var formData = new FormData(document.getElementById("adminLogin"));

        // Send AJAX request
        fetch("login/_admin.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Redirect to admin panel or show success message
                window.location.href = "sections/adminPanel.php";
            } else {
                // Display the error message
                alert(data.message);

                // Clear the password field
                document.getElementById("adminLogin").reset();
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
    });
});



// --------------------------Prevent default form submission of Staff ------------------
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("staffLoginBtn").addEventListener("click", function(e) {
        e.preventDefault(); // Prevent default form submission

        // Get form data
        var formData = new FormData(document.getElementById("staffLogin"));

        // Send AJAX request
        fetch("login/_staff.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Redirect to admin panel or show success message
                window.location.href = "sections/staffPanel.php";
            } else {
                // Display the error message
                alert(data.message);

                // Clear the password field
                document.getElementById("staffLogin").reset();
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
    });
});




// --------------------------Prevent default form submission and proceed to send data to php of Farmer SignUP ------------------


$(document).ready(function() {
    $('#farmerForm').submit(function(event) {
        event.preventDefault();

        // Manually create the formData object and populate it with form fields
        var formData = new FormData();
        formData.append('firstName', $('#firstName').val());
        formData.append('lastName', $('#lastName').val());
        formData.append('address', $('#address').val());
        formData.append('contactNo', $('#contactNo').val());
        formData.append('password', $('#password').val());
        formData.append('confirmPassword', $('#confirmPassword').val());

        // Get the selected gender value
        var genderValue = $("input[name='gender']:checked").val();
        formData.append('gender', genderValue);
        // console.log(formData);
        $.ajax({
            type: 'POST',
            url: 'sections/_addFarmer.php',
            data: formData,
            contentType: false, // Required for FormData
            processData: false, // Required for FormData
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Display success message
                    alert(response.message);
                    location.reload();
                } else {
                    // Display error message
                    alert(response.message);
                }
            }
        });
    });
});





// --------------------------Prevent default form submission of Farmer ------------------
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("farmerLoginBtn").addEventListener("click", function(e) {
        e.preventDefault(); // Prevent default form submission

        // Get form data
        var formData = new FormData(document.getElementById("farmerLogin"));

        // Send AJAX request
        fetch("login/_farmer.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Redirect to admin panel or show success message
                window.location.href = "sections/farmerPanel.php";
            } else {
                // Display the error message
                alert(data.message);

                // Clear the password field
                document.getElementById("farmerLogin").reset();
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
    });
});