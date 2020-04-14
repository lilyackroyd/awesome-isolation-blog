

<?php include_once '/Applications/XAMPP/xamppfiles/htdocs/awesome/models/user.php'; ?>


<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<script>
    $(document).ready(function () {
        $(".box").hide();
        $('input[type="radio"]').click(function () {
            var inputValue = $(this).attr("value");
            var targetBox = $("." + inputValue);
            $(".box").not(targetBox).hide();
            $(targetBox).show();
        });
    });
     
</script>





<section class="intro-section">
    <h1>Sign up below  </h1> 
</section>

    


    
    
    

<div class= "login_login-container">
    <div class ="login_welcome">


        <div class="usertype">
            

        <div class="pure-control-group"> 
            <p> I want to register as a </p>

            <form method="post"  enctype="multipart/form-data">
             <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>   
                
                
            <input type ='radio'  id='admin' name='usertype' value='admin'>
            <label for="admin">Admin</label>
            <input type = 'radio'  id='blogger' name ='usertype' value='blogger'>
            <label for="blogger">Blogger</label>
            <input type ='radio'  id="subscriber" name='usertype' value='subscriber'>
            <label for="subscriber">Subscriber</label>
             </div> </div>
            

            <div class="admin box">
                <input type="email" class="admin-list shadow-sm p-3 mb-5 bg-white rounded form" id='email' name='email' autofocus placeholder="Your email" required >
                <input class="admin-list shadow-sm p-3 mb-5 bg-white rounded form" placeholder="Create a username" id='username' name='username' >
                <input type="password" class="admin-list shadow-sm p-3 mb-5 bg-white rounded form" placeholder="Create a password" id='password' name='password' >
                <input type="password" class="admin-list shadow-sm p-3 mb-5 bg-white rounded form" placeholder="Confirm your password" id='password_confirm' name='password_confirm' >
                <input class="admin-list shadow-sm p-3 mb-5 bg-white rounded form" placeholder="Your firstname" name='firstname' id='firstname' > 
                <input class="admin-list shadow-sm p-3 mb-5 bg-white rounded form" placeholder="Your surname" name='surname' id='surname' >
                <label for="img">Upload your profile image:</label>
                <input type="file" id="img" class="admin-list" name="userimage" id='image' accept="image/*" align="center">
                <input type="password" class="admin-list shadow-sm p-3 mb-5 bg-white rounded form" placeholder="(Office only) Enter your Admin code:" name='admin_code' id="admin_code">
            </div>






            <div class="blogger box">
                 <input type="email" class="blogger-list shadow-sm p-3 mb-5 bg-white rounded form" id='email' name='email' autofocus placeholder="Your email" >
                <input class="blogger-list blogger-list shadow-sm p-3 mb-5 bg-white rounded form" placeholder="Create a username" id='username' name='username' >
                <input type="password" class="blogger-list shadow-sm p-3 mb-5 bg-white rounded form" placeholder="Create a password" id='password' name='password' >
                <input type="password" class="blogger-list shadow-sm p-3 mb-5 bg-white rounded form" placeholder="Confirm your password" id='password_confirm' name='password_confirm' >
                <input class="blogger-list shadow-sm p-3 mb-5 bg-white rounded form" placeholder="Your firstname" name='firstname' id='firstname' > 
                <input class="blogger-list shadow-sm p-3 mb-5 bg-white rounded form" placeholder="Your surname" name='surname' id='surname' >
                <label for="img">Upload your profile image:</label>
                <input type="file" id="img" class="blogger-list shadow-sm p-3 mb-5 bg-white rounded form" name="userimage" id='image' accept="image/*" align="center">
            </div>



            <div class="subscriber box">
               <input type="email" class="subscriber-list shadow-sm p-3 mb-5 bg-white rounded form" id='email' name='email' autofocus placeholder="Your email" >
                <input class="subscriber-list shadow-sm p-3 mb-5 bg-white rounded form" placeholder="Create a username" id='username' name='username' >
                <input type="password" class="subscriber-list shadow-sm p-3 mb-5 bg-white rounded form" placeholder="Create a password" id='password' name='password' >
                <input type="password" class="subscriber-list shadow-sm p-3 mb-5 bg-white rounded form" placeholder="Confirm your password" id='password_confirm' name='password_confirm' >
            </div>

            
            <div class="pure-form pure-form-aligned container-btn">
        <button type="submit" value="submit"  name='submit'  >Create account</button> 
        </div>
            </form>
            
        </div>




    </div>







<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script>
        $("#subscriber").click(function() {
            $(".blogger-list").prop("required", false);
            $(".blogger-list").prop("disabled", true);
             $(".admin-list").prop("required", false);
            $(".admin-list").prop("disabled", true);
             $(".subscriber-list").prop("required", true);
            $(".subscriber-list").prop("disabled", false);
            $(".subscriber-list").focus();
        });
        $("#admin").click(function() {
            $(".blogger-list").prop("required", false);
            $(".blogger-list").prop("disabled", true);
             $(".subscriber-list").prop("required", false);
            $(".subscriber-list").prop("disabled", true);
             $(".admin-list").prop("required", true);
            $(".admin-list").prop("disabled", false);
            $(".admin-list").focus();
        });
        
        $("#blogger").click(function() {
             $(".admin-list").prop("required", false);
            $(".admin-list").prop("disabled", true);
             $(".subscriber-list").prop("required", false);
            $(".subscriber-list").prop("disabled", true);
             $(".blogger-list").prop("required", true);
            $(".blogger-list").prop("disabled", false);
            $(".blogger-list").focus();
        });
      
    </script> 