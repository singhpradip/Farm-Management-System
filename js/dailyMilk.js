

// -----------------------------Fetch Farmer Full Name-------------------------------
function fetchFarmer() {
    var userId = document.getElementById('userId').value;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '_fetchFarmer.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.send('userId=' + encodeURIComponent(userId));

    xhr.onload = function () {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);

            if (response.status === 'success') {
                document.getElementById('farmerName').value = response.fullName;
            } else {
                alert(response.message);
                document.getElementById('userId').value = "";
                document.getElementById('farmerName').value = "";
                document.getElementById('temp').value = "";
                document.getElementById('fat').value = "";
                document.getElementById('qty').value = "";
            }
        } else {
            alert('Error fetching farmer information');
        }
    };
}

// -----------------------Fetch Temp and Fat---------------------------------------
function fetchTempFat() {
    var userId = document.getElementById('userId').value;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '_fetchTempFat.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.send('userId=' + encodeURIComponent(userId));

    xhr.onload = function () {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);

            if (response.status === 'success') {
                document.getElementById('temp').value = response.temp;
                document.getElementById('fat').value = response.fat;
            } else {
                // alert(response.message);
                // document.getElementById('userId').value = "";
                // document.getElementById('farmerName').value = "";
                document.getElementById('temp').value = "";
                document.getElementById('fat').value = "";
                // document.getElementById('qty').value = "";
            }
        } else {
            alert('Error fetching farmer information');
        }
    };
}


// ----------------------------Submitting Daily Milk Form----------------------------------
$(document).ready(function() {
    $('#dailyMilkForm').submit(function(event) {
        event.preventDefault();

        // Manually create the formData object and populate it with form fields
        // const temp = document.getElementById('temp')
        // if (temp == 0){
        //     temp=null;
        // }
        var formData = new FormData();
        formData.append('userId', $('#userId').val());
        formData.append('farmerName', $('#farmerName').val());
        formData.append('temp', $('#temp').val());
        // formData.append('temp', temp);
        formData.append('fat', $('#fat').val());
        formData.append('qty', $('#qty').val());
        // console.log (formData);

        $.ajax({
            type: 'POST',
            url: '_submitdailyMilkForm.php',
            data: formData,
            contentType: false, // Required for FormData
            processData: false, // Required for FormData
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Display success message
                    alert(response.message);
                    location.reload();

                    // Optionally, you can perform additional actions upon success
                } else {
                    // Display error message
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('XHR Status:', status);
                console.error('Error:', error);
                // You can also check xhr.responseText for the detailed error message from the server
                console.error('Response Text:', xhr.responseText);
                alert('An error occurred while processing your request.');
            }
            
        });
    });
});

    