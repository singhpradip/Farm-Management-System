


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