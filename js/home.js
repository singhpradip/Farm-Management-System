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

