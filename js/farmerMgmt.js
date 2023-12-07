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
// Function to open the edit form
function openEditForm(farmerId) {
    // Code to open modal...
    $('#editModal').show();

    // Set the farmerId as a data attribute in the form
    $('#farmerEditForm').attr('data-farmer-id', farmerId);

    // Populate the form fields with existing farmer data
    fetchFarmerData(farmerId);
}

// Function to fetch farmer data and populate the form fields
function fetchFarmerData(farmerId) {
    $.ajax({
        type: 'GET',
        url: '_getFarmerInfo.php',
        data: { farmerId: farmerId },
        dataType: 'json',
        success: function (response) {
            if (response.status === 'success') {
                // Populate the form fields with farmer data
                var farmerData = response.data;

                $('#farmerEditForm input[name="firstName"]').val(farmerData.first_name);
                $('#farmerEditForm input[name="lastName"]').val(farmerData.last_name);
                $('#farmerEditForm input[name="address"]').val(farmerData.address);
                $('#farmerEditForm input[name="contactNo"]').val(farmerData.contact_no);
                $('#farmerEditForm input[name="password"]').val(''); // Clear password field for security
                $('#farmerEditForm input[name="confirmPassword"]').val(''); // Clear confirm password field
                // Select the gender radio button based on the fetched data
                $('#farmerEditForm input[name="gender"]').prop('checked', false); // Clear previous selection
                if (farmerData.gender === 'male') {
                    $('#farmerEditForm input[name="gender"][value="male"]').prop('checked', true);
                } else if (farmerData.gender === 'female') {
                    $('#farmerEditForm input[name="gender"][value="female"]').prop('checked', true);
                }
            } else {
                console.error(response.message);
            }
        },
        error: function (xhr, status, error) {
            console.error('Error fetching farmer data:', error);
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

//submiting update form-------------------------------------------
$(document).ready(function () {
    // Handle click events for the Edit buttons to open edit form
    $('.editBtn').click(function () {
        var farmerId = $(this).data('user-id');
        openEditForm(farmerId);
    });

    // Handle click event for Save Changes button
    $('#saveChangesBtn').click(function () {
        submitEditForm();
    });

    // Handle form submission
    function submitEditForm() {
        // Get farmerId from the data attribute
        var farmerId = $('#farmerEditForm').data('farmer-id');

        $.ajax({
            type: 'POST',
            url: '_updateFarmer.php',
            data: $('#farmerEditForm').serialize() + '&farmerId=' + farmerId,
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    // Display success message
                    alert(response.message);
                    location.reload();
                } else {
                    // Display error message
                    alert(response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error updating farmer data:', error);
            }
        });
    }
});





