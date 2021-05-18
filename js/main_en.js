/****** function to Toggle ******/
function Toggle (item){
    $(item).slideToggle(1000);
}

function login () {
    event.preventDefault();

    var Username = $("#Username");
    var Password = $("#Password");
    var msg = "";
    
    Username.removeClass('input-error');
    Password.removeClass('input-error');
    var input_error = false;

    if (Username.val() == "" || Username.val() == " ") {
        Username.addClass('input-error');
        input_error = true;
    }

    if (Password.val() == "" || Password.val() == " ") {
        Password.addClass('input-error');
        input_error = true;
    }

    if (input_error == false) {
        $.ajax ({
            url: "./php/login.php",
            type: 'post',
            data: $("#login-form").serialize(),
            success: function (data) {
                if (data == 0) {
                    //zero is returned for no error and forwarded to vendor's page
                    window.location.href = 'vendor/index.html';
                }
                else {
                    $(".response .error-message").html(data);
                }
            }
        });
    }

    else {
        msg = "Please fill out the field(s) in red!";
        $(".response").html(msg);    
    }
}

//function to check whether a variable is numerci
function is_Numeric (num) {
    $.post("./php/is_numeric.php", {
        num: num
        }, function (data){
            // zero is returned if num is numeric 
            if (data != 0) {
                $("#btn-submit").attr("disabled", "disabled");
                $("#Mobile").addClass("input-error");
                $(".response").addClass("error");
                var msg = "Please enter proper mobile number 09505050!";
                $(".response").html(msg);
            }
            else {
                $("#btn-submit").removeAttr("disabled");
                $("#Mobile").removeClass("input-error");
                $(".response").removeClass("error");
                var msg = "";
                $(".response").html(msg);
            }
     });
}

//function to check passwords set by the user during sign up
function checkPasswords () {
    var password1 = $("#password1");
    var password2 = $("#password2");
    var l = password1.val().trim().length; 

    //checking the length of password if there are 8 letters
    if (l < 8) {
        $(".pswd").addClass('error');
        $(".pswd").html('Password must be at least 8 letters!');
    }

    else {
        if (password1.val() != password2.val()){
            $(".pswd").addClass("error");
            $(".pswd").html("Your passwords do not match!");
            $("#btn-submit").attr("disabled", "disabled");
        }
        else {
            $(".pswd").removeClass("error");
            $(".pswd").html("Passwords match!");
            $("#btn-submit").removeAttr("disabled");
        }
    }
}

//function to check a agreement checkbox before submitting a form
function checkboxChecker () {
    var checkbox = document.getElementById("agree");
    if (checkbox.checked == true) {
        $("#btn-submit").removeAttr("disabled");
    }

    else {
        $("#btn-submit").attr("disabled", "disabled");
        alert("You must agree to our terms of service");
    }
}

//funciton to submit signup form 
function submitSignupForm () {
    var Mobile = $("#Mobile");
    var password1 = $("#password1");
    var password2 = $("#password2");
    var Title = $("input[name='Title']:checked").val();
    var Name = $("#Name");
    var Address = $("#Address");
    var Town = $("#Town");
    var Dob = $("#Dob");

    $(".response").removeClass("error");

    var error = false;
 
    if (Mobile.val() == "" || Mobile.val() == " "){
        Mobile.addClass("input-error");
        error = true;
    }

    if (password2.val() == "" || password2.val() == " ") {
        password1.addClass("input-error");
        password2.addClass("input-error");
        error = true;
    }

    if (Name.val() == "" || Name.val() == " ") {
        Name.addClass("input-error");
        error = true;
    }

    if (Address.val() == "" || Address.val() == " ") {
        Address.addClass("input-error");
        error = true;
    }

    if (Town.val() == "" || Town.val() == " ") {
        Town.addClass("input-error");
        error = true;
    }

    if (error == true) {
        $(".response").addClass("error");
        $(".response").html("Please fill out all the field(s) in red!"); 
    }

    if (error == false) {
        $.ajax({
            url: "./php/signup.php",
            type: "post",
            data: $("#signup-form").serialize(),
            success: function (data) {
                $(".response").html(data);
            }
        });
    }
}
