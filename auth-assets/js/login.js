$("form#login").submit(function(e) {
    e.preventDefault();    
    var formData = new FormData(this);
    
    $.ajax({
        url: 'trade/includes/login.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        beforeSend:function(){
            $("#errorshow").hide();
			$('#btnLogin').html("<i class='fa fa-spinner fa-spin'></i> Signing In").attr("disabled", true);
		},
        success: function (data) {
			if (data == "ok") {
                $('#btnLogin').html("<i class='fa fa-spinner fa-spin'></i> Login Successful! Redirecting to Dashboard").attr("disabled", true);
                $('#errorshow').addClass('alert alert-success');
				$("#errorshow").fadeIn();
				$("#errorshow").html("<i class='fa fa-spinner fa-spin'></i> Login Successful! Redirecting to Dashboard");
			    setTimeout(' window.location.href = "trade/"; ', 2000);
			} else {
                $('#btnLogin').html("login <i class='fa fa-sign-in'></i>").attr("disabled", false);
                 $('#errorshow').addClass('alert alert-danger');
				$("#errorshow").fadeIn();
				$("#errorshow").html(data);
                document.getElementById("alertDisplay").scrollIntoView(true);
			}   
        },
        error:function(e){
            $('#btnLogin').html("login <span class='fa fa-sign-in'></span>").attr("disabled", false);
          
			alert("Please check your internet connection");
		}
    });
});

function viewPassword(){
    var password = document.getElementById('password');
    if (password.type == 'password') {
        password.type = 'text';
        $('#passText').html("Hide Password <i class= 'fa fa-eye' aria-hidden='true'></i>");
    }else{
        password.type = 'password';
        $('#passText').html("Show Password <i class= 'fa fa-eye-slash' aria-hidden='true'></i>");
    }
}

$('#passText').click(function(){
viewPassword();
});