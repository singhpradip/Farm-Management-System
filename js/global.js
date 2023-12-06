function alphaOnly(event) {
    var key = event.keyCode;
    return (
        (key >= 65 && key <= 90) || // A-Z
        (key >= 97 && key <= 122) || // a-z
        key === 8 || // Backspace
        key === 9 || // Tab
        key === 32 || // Space
        key === 46 // Delete
    );
}

function numOnly(event) {
    // Allow: backspace, delete, tab, escape, enter, and . (decimal point)
    if (event.key === 'Backspace' || event.key === 'Delete' || event.key === 'Tab' ||
        event.key === 'Escape' || event.key === 'Enter' || event.key === '.' || event.key === '+' ||
        event.key === 'ArrowLeft' || event.key === 'ArrowRight' || event.key === 'ArrowUp' || event.key === 'ArrowDown') {
        return;
    }

    // Allow: Ctrl+A/Ctrl+C/Ctrl+X
    if ((event.ctrlKey === true || event.metaKey === true) && (event.key === 'a' || event.key === 'c' || event.key === 'x')) {
        return;
    }

    // Ensure that it is a number and stop the keypress
    if (event.key < '0' || event.key > '9') {
        event.preventDefault();
    }
}


