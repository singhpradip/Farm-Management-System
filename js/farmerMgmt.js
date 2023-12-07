// Add Farmer form-----------------------------------------------------
function openSignUpForm() {
    // Code to open modal...
    $('#signupModal').show();
}

function closeModal1() {
    // Code to close modal...
    $('#signupModal').hide();
    // Clear the form and response message
    $('#signupForm')[0].reset();
    $('#responseMessage').empty();
}

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
            url: '_addFarmer.php',
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


// Update form - button-----------------------------------------------------------------

function openEditForm(userId) {
    // Code to open modal...
    $('#editModal').show();

    // Set the userId as a data attribute in the form
    $('#editForm').attr('data-user-id', userId); // Fix here

    // Populate the form fields with existing user data
    fetchUserData(userId);
}


// Function to fetch user data and populate the form fields
function fetchUserData(userId) {
    $.ajax({
        type: 'GET',
        url: '_getStaffInfo.php', 
        data: { userId: userId },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                // Populate the form fields with user data
                $('#editForm input[name="username"]').val(response.data.username);
            } else {
                console.error(response.message);
            }
        }
    });
}


// Function to close modal and clear form
function closeModal2() {
    // Code to close modal...
    $('#editModal').hide();
    // Clear the form and response message
    $('#editForm')[0].reset();
    $('#responseMessage').empty();
}


$(document).ready(function() {
    // Handle click events for the Edit buttons
    $('.editBtn').click(function() {
        var userId = $(this).data('user-id');
        openEditForm(userId);
    });

    // Handle click event for Save Changes button
    $('#saveChangesBtn').click(function() {
        submitEditForm();
    });

    // Handle form submission
    function submitEditForm() {
        // Get userId from the data attribute
        var userId = $('#editForm').data('user-id'); 

        $.ajax({
            type: 'POST',
            url: '_updateStaff.php',
            data: $('#editForm').serialize() + '&userId=' + userId,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Display success message
                    // $('#responseMessage').html('<p style="color: blue; font-weight: bold;">' + response.message + '</p>');
                    alert(response.message);
                    location.reload();
                } else {
                    // Display error message
                    // $('#responseMessage').html('<p style="color: red; font-weight: bold;">' + response.message + '</p>');
                    alert(response.message);

                }
            }
        });
    }
});




