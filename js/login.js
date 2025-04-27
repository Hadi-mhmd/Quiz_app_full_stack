$(document).ready(function() {
    $('#loginForm').on('submit', function(event) {
        event.preventDefault(); // prevent default form submit

        $.ajax({
            url: 'loginn.php',   // your backend PHP
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                let messageDiv = $('#responseMessage');
                messageDiv.empty(); // clear previous message

                if (response.status === 'success') {
                    messageDiv.html('<div class="alert alert-success"><strong>Success!</strong> ' + response.message + '</div>');
                    setTimeout(function() {
                        window.location.href = 'select_exam.php';
                    }, 1000);
                } else if (response.status === 'failure') {
                    messageDiv.html('<div class="alert alert-danger"><strong>Login Failed!</strong> ' + response.message + '</div>');
                } else {
                    messageDiv.html('<div class="alert alert-danger"><strong>Error!</strong> ' + response.message + '</div>');
                }
            },
            error: function(xhr, status, error) {
                $('#responseMessage').html('<div class="alert alert-danger"><strong>Error!</strong> Something went wrong. Try again later.</div>');
            }
        });
    });
});