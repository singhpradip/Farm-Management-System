        // Fetch current rate when the page loads
        document.addEventListener("DOMContentLoaded", function() {
            fetchRate();
        });

        // Function to fetch and display the current rate
        function fetchRate() {
            fetch("_getRate.php")
                .then(response => response.json())
                .then(data => {
                    document.getElementById("currentRate").value = data.current_rate;
                })
                .catch(error => console.error('Error:', error));
        }

        // Function to update the rate
        function updateRate() {
            var newRate = document.getElementById("currentRate").value;

            // Send an asynchronous request to update the rate
            fetch("_updateRate.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ newRate: newRate }),
            })
            .then(response => response.json())
            .then(data => {
                // Show an alert with the message from the server
                alert(data.message);

                // Reload the page
                location.reload();
            })
            .catch(error => console.error('Error:', error));
        }


    // ----------------------------------------------------------------------------

    // Function to open payment form with farmer ID and total amount
    function openPaymentForm(farmerId, totalAmount) {
        $('#editModal').show();
        $('#farmerEditForm input[name="farmerId"]').val(farmerId);
        $('#farmerEditForm input[name="deuAmount"]').val(totalAmount);
    }

    // Event listener for "PAY" button click
    $('.payBtn').on('click', function () {
        var farmerId = $(this).data('user-id');
        var totalAmount = $(this).data('total-amount');
        openPaymentForm(farmerId, totalAmount);
    });

    // Function to close modal and clear form
    function closeModal2() {
        // Code to close modal...
        $('#editModal').hide();
        // Clear the form and response message
        $('#farmerEditForm')[0].reset();
        $('#responseMessage').empty();
    }


    // Function to handle "Make Payment" button click

    document.getElementById('makePayment').addEventListener('click', function () {
        // Get values from the form
        var farmerId = $('#farmerEditForm input[name="farmerId"]').val();
        var deuAmount = $('#farmerEditForm input[name="deuAmount"]').val();
        var paidAmount = $('#farmerEditForm input[name="paid"]').val();

        // Make an AJAX request to your PHP script
        $.ajax({
            type: 'POST',
            url: '_makePayment.php',
            data: {
                farmerId: farmerId,
                deuAmount: deuAmount,
                paidAmount: paidAmount
            },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    alert('Payment successful!');
                    location.reload();
                } else {
                    alert('Payment failed. ' + response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', xhr.responseText);

                // Show an error alert with more details
                alert('An error occurred while making the payment. Please check the console for details.');
            }
        });
    });