$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#nextCompanyBtn').click(function() {
        if (!$('#company_name').val()) {
            displayError('Please Enter the Company Name.');
            return;
        }

        var companyName = $('#company_name').val();
        if (!isValidCompanyName(companyName)) {
            displayError('Company Name should not contain special characters.');
            return;
        }

        function isValidCompanyName(companyName) {
            var regex = /^[a-zA-Z0-9 ]*$/;
            return regex.test(companyName);
        }

        $.ajax({
            type: "POST",
            url: 'check-company',
            data: { company_name: companyName },
            statusCode: {
                200: function(response) {
                    $('#companySection').hide();
                    $('#userSection').show();
                },
                400: function(response) {
                    displayError(response.responseJSON.error);
                }
            }
        });        
    });

    $('#registerBtn').click(function(event) {
        event.preventDefault();

        if (!$('#email').val()) {
            displayError('Please enter the Email.');
            return;
        }

        if (!$('#password').val()) {
            displayError('Please enter the Password.');
            return;
        }

        if (!$('#confirm_password').val()) {
            displayError('Please confirm the Password.');
            return;
        }

        if ($('#password').val() !== $('#confirm_password').val()) {
            displayError('Confirm Password does not match with the Password.');
            return;
        }

        $('#registrationForm').submit();
    });
    

    $(document).on('submit', '#registrationForm', function (event) {
        event.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        var formData = form.serialize();

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            success: function(response) {
                if (response.error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.error,
                    });
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Registration Successful',
                        text: 'Please check your email to activate your account',
                    }).then(function() {
                        $('#registrationForm')[0].reset();
                        window.location.href = 'login';
                    })
                }
            }
        });
    });

    function displayError(message) {
        $('.error-section').html('<div class="alert alert-danger">' + message + '</div>');
    }      

    function displaySuccess(message) {
        $('.error-section').html('<div class="alert alert-success">' + message + '</div>');
    }

    function hideError() {
        $('.error-section').empty();
    }

    $('input').focus(function() {
        hideError();
    });
});

    document.getElementById('generatePasswordBtn').addEventListener('click', function() {
        var passwordField = document.getElementById('password');
        var confirmPasswordField = document.getElementById('confirm_password');

        var password = generatePassword(8);
        passwordField.value = password;
        confirmPasswordField.value = password;
    });

    function generatePassword(length) {
        var charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#$%^&*';
        var password = '';
        for (var i = 0; i < length; i++) {
            var randomIndex = Math.floor(Math.random() * charset.length);
            password += charset.charAt(randomIndex);
        }
        return password;
    }

    var togglePassword = document.querySelector('.toggle-password');
    var passwordInput = document.getElementById('password');
    var confirmPasswordInput = document.getElementById('confirm_password');
    
    togglePassword.addEventListener('click', function() {
        var type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        confirmPasswordInput.setAttribute('type', type);
    
        var eyeIcon = this.querySelector('.eye');
        console.log(this,eyeIcon);
        if (eyeIcon.classList.contains('fa-eye')) {
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    }); 

    $('#confirm_password').on('input', function() {
        var password = $('#password').val();
        var confirmPassword = $(this).val();
        validateConfirmPassword(password, confirmPassword);
    });

    function validateConfirmPassword(password, confirmPassword) {
        var confirmField = $('#confirm_password');
        if (password !== confirmPassword) {
            confirmField.addClass('invalid');
        } else {
            confirmField.removeClass('invalid');
            hideError();
        }
    }