//============================== JavaScript for displaying current date and time ================================
            
function updateCurrentDateTime() {
    const currentDate = new Date();

    // Define custom date and time
    const options = {
        weekday: 'long', 
        year: 'numeric', 
        month: 'short', 
        day: 'numeric', 
        hour: '2-digit', 
        minute: '2-digit', 
        second: '2-digit',
        hour12: true, 
    };

    const formattedDate = currentDate.toLocaleDateString('en-US', options);
    document.getElementById('current-date-time').textContent = formattedDate;
    }

// Update the date and time initially and then every second
updateCurrentDateTime();
setInterval(updateCurrentDateTime, 1000);


// ==================================to show selected menu page====================================================
function openSection(section) {
    // Handle opening different sections based on the clicked item
    switch (section) {
        case 'dailyRec':
            // console.log('See Daily Rec section opened');
            window.location.href='dailyMilk.php';
            break;
        case 'farmerMgmt':
            // console.log('Farmer Management section opened');
            window.location.href='farmerMgmt.php';
            break;
        case 'payment':
            // console.log('Payment section opened');
            window.location.href='payment.php';
            break;
        default:
            console.log('Invalid section');
    }
}
