$(document).ready(function () {
    $('#transferForm').validate({
        rules: {
            amount: {
                required: true
            },
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            amount: {
                required: 'Amount is required'
            },
            email: {
                required: 'Email is required',
                email: "Enter a valid email"
            }
        },
        errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            error.insertAfter(element);
        },
        highlight: function (element) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function (element) {
            $(element).removeClass("is-invalid");
        },
        submitHandler: function (form) {
            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                dataType: 'json',
                async: false,
                success: function (data) {
                    if (data.status == 1) {
                        Swal.fire({
                            title: data.title,
                            text: data.message,
                            icon: data.type,
                            showConfirmButton: false,
                            timer: 1500,
                        })
                        if (data.Type == 'insert') {
                            $('#transferForm')[0].reset();
                            $('#transferForm').validate().resetForm();
                            fetchNewBalance();
                        } 
                    } else {
                        Swal.fire({
                            icon: data.type,
                            title: data.title,
                            text: data.message,
                            showConfirmButton: true,
                            confirmButtonClass: "d-flex align-items-center justify-content-center",
                            confirmButtonText: "<i class='ri-checkbox-circle-line icons align-middle me-1'></i> Ok",
                            customClass: {
                                confirmButton: 'sweet-theme-confirm-btn'
                            },
                        })
                    }
                }
            });
        }
    });
    var availBalance = $('#availBalance').val();
    function fetchNewBalance() {
        $.ajax({
            url: availBalance,
            type: 'POST',
            success: function (response) {
                const numericBalance = parseFloat(response.balance);
                if (!isNaN(numericBalance)) {
                    $('#availBalanceLabel').html('Avail Balance: ' + numericBalance.toFixed(2));
                } else {
                    console.error('Invalid balance value received:', response.balance);
                }
                },
        });
    }
});