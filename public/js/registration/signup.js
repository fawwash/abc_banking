$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".registration").validate({
        errorPlacement: function (error, element) {
            error.insertAfter(element);
        },
        errorElement: 'div',
        errorClass: "error",
        rules: {
            email: {
                email: true,
                required: true,
                remote: {
                    url: "check-email",
                    type: "post"
                }
            },
            password: {
                minlength: 8,
                required: true,
                hasUppercase: true,
                hasLowercase: true,
                hasnumber: true
            },
            confirm_password: {
                required: true,
                equalTo: "#password-input"
            }
        },
        messages: {
            email: {
                remote: "Email id is already exist!",
                email: "Enter Valid Email!",
                required: "Please enter email"
            },
            password: {
                required: "Please enter password",
                minlength: "Minimum 8 characters"
            },
            confirm_password: {
                required: "Please re enter password",
                equalTo: "Password is not match"
            }
        },
        submitHandler: function (form) {
            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                'beforeSend': function (request) {
                    $('#preloader').show();
                },
                success: function () {
                    $('#preloader').hide();
                    Swal.fire({
                        title: "Done",
                        text: "Created successfully",
                        icon: "success",
                        confirmButtonClass: "btn btn-primary w-xs mt-2",
                        buttonsStyling: false,
                        timer: 2000,
                        showConfirmButton: false
                    }).then(function () {
                        window.location.replace($('#signin_link').val());
                    });
                }
            });
        }
    });
    $.validator.addMethod("hasUppercase", function (value, element) {
        if (this.optional(element)) {
            return true;
        }
        return /[A-Z]/.test(value);
    }, "Must contain uppercase");

    $.validator.addMethod("hasLowercase", function (value, element) {
        if (this.optional(element)) {
            return true;
        }
        return /[a-z]/.test(value);
    }, "Must contain lowercase");

    $.validator.addMethod("hasnumber", function (value, element) {
        if (this.optional(element)) {
            return true;
        }
        return /[0-9]/.test(value);
    }, "Must contain a number");
})