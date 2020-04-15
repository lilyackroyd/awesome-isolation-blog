$(document).ready(function(){
	
    // When submits the form, prevent it immediately being sent server side
    $(document).on('click', '#btnsubmit', function (e) {
        e.preventDefault();
        //console.log('here');
        // assign all the post values to variables 
        var admin_type = $('#admin').val();
        var blogger_type = $('#blogger').val();
        var subscriber_type = $('#subsriber').val();
        
        
        var b_email = $('#blogger-email').val();
        var b_username = $("#blogger-username").val();
        var b_password = $('#blogger-password').val();
        //console.log('password is'+b_password);
        var b_password_confirm = $('#blogger-password_confirm').val();
        //console.log('password confirm is'+b_password_confirm);
        var b_firstname = $('#blogger-firstname').val();
        var b_surname = $('#blogger-surname').val();
        var b_image = $('#blogger-image').val();
        
        var a_email = $('#admin-email').val();
        var a_username = $("#admin-username").val();
        var a_password = $('#admin-password').val();
        var a_password_confirm = $('#admin-password_confirm').val();
        //console.log('password confirm is'+a_password_confirm);
        var a_firstname = $('#admin-firstname').val();
        var a_surname = $('#admin-surname').val();
        var a_image = $('#admin-image').val();
        var admin_code = $('#admin_code').val();
        
        var s_email = $('#sub_email').val();
        var s_username = $("#sub_username").val();
        var s_password = $('#sub_password').val();
        var s_password_confirm = $('#sub_password_confirm').val();
       
        // get the form action url
        var url = $('#register-form').attr('action');
        
        
        //check passwords match
        if (b_password !== b_password_confirm ){
        document.getElementById("b_password-match-error").innerHTML = "Passwords entered do not match";
        return;
        }
        if (a_password !== a_password_confirm){
        document.getElementById("a_password-match-error").innerHTML = "Passwords entered do not match";
        return;
        }
        if(s_password !== s_password_confirm){
        document.getElementById("s_password-match-error").innerHTML = "Passwords entered do not match";
        return;
        }
        
        //check admin password
        if (admin_code !== '' ){
            if(admin_code!=="Ryan"){
        document.getElementById("admin-code-error").innerHTML = "Admin code is incorrect";
        return;
        }}
        
        //check password
//          var pwdRegex = new RegExp('^[a-zA-Z0-9]{6,12}$');
//
//          if(!pwdRegex.test(b_password)){
//        document.getElementById("b_password-error").innerHTML = "Password must contain numbers and have between 6 - 12 characters";
//        return;
//        }
//         if(!pwdRegex.test(a_password)){
//        document.getElementById("a_password-error").innerHTML = "Password must contain numbers and have between 6 - 12 characters";
//        return;
//        }
//           if(!pwdRegex.test(s_password)){
//        document.getElementById("s_password-error").innerHTML = "Password must contain numbers and have between 6 - 12 characters";
//        return;
//        }
        
        //check username
//        var usnRegex = new RegExp('^[a-zA-Z0-9]{6,12}$');
//
//          if(!usnRegex.test(b_password)){
//        document.getElementById("b_username-error").innerHTML = "Username must contain numbers and have between 6 - 12 characters";
//        return;
//        }
//         if(!usnRegex.test(a_password)){
//        document.getElementById("a_username-error").innerHTML = "Username must contain numbers and have between 6 - 12 characters";
//        return;
//        }
//           if(!usnRegex.test(s_password)){
//        document.getElementById("s_username-error").innerHTML = "Username must contain numbers and have between 6 - 12 characters";
//        return;
//        }
        

        
        
        
        
        
        
        
        
        
        
        document.getElementById("register-form").submit();
        

    });





    })




