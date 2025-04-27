$(document).ready(function() {
    $('#registerForm').on('submit', function(event) {
        event.preventDefault(); // Stop form from submitting normally

        $.ajax({
            url: 'registeration.php',  // this is your PHP processing file
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                let messageDiv = $('#responseMessage');
                messageDiv.empty(); // Clear any previous messages
                
                if (response.status === 'success') {
                    messageDiv.html('<div class="alert alert-success"><strong>Success!</strong> ' + response.message + '</div>');
                    $('#registerForm')[0].reset(); // Reset form fields
                } else if (response.status === 'failure') {
                    messageDiv.html('<div class="alert alert-danger"><strong>Already Exist!</strong> ' + response.message + '</div>');
                } else {
                    messageDiv.html('<div class="alert alert-danger"><strong>Error!</strong> ' + response.message + '</div>');
                }
            },
            error: function(xhr, status, error) {
                $('#responseMessage').html('<div class="alert alert-danger"><strong>Error!</strong> Could not complete the request.</div>');
            }
        });
    });
});