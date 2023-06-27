$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});
// LOGIN FUNCTION
    $('#loginForm').on( 'submit' , function(e){
        e.preventDefault();
        var data = $('#loginForm').serialize();
        $.ajax({
        url:"/loginFunction",
        method:"POST",
        dataType:"text",
        data:data
        })
        .done(function(response) {
            if(response == 1){
                window.location = "/adminDashboardRoutes";
            }else if(response == 0){
                var el = document.querySelector('.d-none');
                el.classList.remove('d-none');
                el.classList.add('d-block');               
                setTimeout(function() {
                  el.classList.remove('d-block');
                  el.classList.add('d-none');
                }, 5000);
            }
        });
    });
// LOGIN FUNCTION

// FUNCTION FOR PASSWORD ENABLE
    function seePassword() {
        var x = document.getElementById("password");
        if (x.type === 'password'){
            x.type ="text";
        }else{
            x.type="password";
        }

    }
// FUNCTION FOR PASSWORD ENABLE