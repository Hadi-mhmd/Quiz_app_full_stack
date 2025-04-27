$(document).ready(function() {
    $('#loginForm').on('submit', function(event) {
        event.preventDefault();

        var formData = $(this).serialize();

        // Send the data to the back-end using AJAX
        $.ajax({
            url: 'login.php',
            method: 'POST',
            data: formData,
            success: function(response) {
                if (response === 'success') {
                    window.location.href = 'demo.php';
                } else {
                    $('#errorMessage').show(); // Show error message if login failed
                }
            },
            error: function() {
                alert('Error occurred. Please try again.');
            }
        });
    });
});