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


// ======================================================================================
function openSection(section) {
    // Handle opening different sections based on the clicked item
    switch (section) {
        case 'dailyRec':
            // Code to open the daily record section
            console.log('See Daily Rec section opened');
            break;
        case 'farmerMgmt':
            // Code to open the farmer management section
            console.log('Farmer Management section opened');
            break;
        case 'payment':
            // Code to open the payment section
            console.log('Payment section opened');
            break;
        default:
            console.log('Invalid section');
    }
}
