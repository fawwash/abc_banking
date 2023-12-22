$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".login").validate({
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
       errorElement: 'div',
       errorClass : "error",
       rules:{
           email:{email: true,
           required: true
            
        },
        password: {
            required: true
        }
       },
       messages: {
           
           email:{email:"Enter Valid Email!",
               required:"Please enter email"
           },
           password: {
               required:"Please enter password"
           }
       }
    });
    $(".fade_msg").show().delay(5000).fadeOut();     
});

validateEmail =function($email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test( $email );
}