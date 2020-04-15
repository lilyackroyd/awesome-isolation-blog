

<?php include_once 'models/user.php'; ?>


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


<div class="register-section">




    <div class="register-container">
        <div class="welcome">
            <h1 class="register-title">Create an account</h1>

        </div>

        <div class="regblock">

            <form method="post" action="" enctype="multipart/form-data" id="register-form">
                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>   

                <!-- user type input fields -->
                <p class="usertype-label"> I want to register as a: </p>
                <div class="form-check usertype-options">
                    <input type ='radio'  id='admin' class="form-check-input" name='usertype' value='admin'>
                    <label for="admin" class="form-check-label">Admin</label>
                    <input type = 'radio'  id='blogger' class="form-check-input" name ='usertype' value='blogger'>
                    <label for="blogger" class="form-check-label">Blogger</label>
                    <input type ='radio'  id="subscriber"  class="form-check-input" name='usertype' value='subscriber'>
                    <label for="subscriber" class="form-check-label">Subscriber</label>
                </div>


                <!-- admin input fields -->
                <div class="admin box">
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="firstname">First name:</label>
                                <input class="admin-list form-control" placeholder="Your firstname" name='firstname' id='admin-firstname' > 
                            </div>
                            <div class="col">
                                <label for="firstname">Surname:</label>
                                <input class="admin-list form-control " placeholder="Your surname" name='surname' id='admin-surname' >
                            </div>
                        </div></div>
                    <br/>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="email">Email:</label>
                                <input type="email" class="admin-list form-control " id='admin-email' name='email' autofocus placeholder="Your email" required >
                            </div>
                            <div class="col">   
                                <label for="username">Username:</label>
                                <input class="admin-list  form-control " placeholder="Create a username" id='admin-username' name='username' >
                                <div id="a_username-error"></div>
                            </div>
                        </div></div>
                    <br/>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="password">Password:</label>
                                <input type="password" class="admin-list  form-control " placeholder="Create a password" id='admin-password' name='password' >
                            </div>
                            <div class="col">
                                <label for="password_confirm">Confirm password:</label>
                                <input type="password" class="admin-list  form-control " placeholder="Confirm your password" id='admin-password_confirm' name='password_confirm' >
                            </div>
                        </div>

                        <div id="a_password-match-error"></div>
                        <div id="a_password-error"></div>        
                    </div>
                    <br/>       

                    <div class="form-group row">     
                        <label for="img" class="col col-form-label">Upload your profile image:</label>
                        <input type="file" id="img" class="admin-list form-control-file col-7" name="userimage" id='admin-image' accept="image/*" align="center">
                    </div>  

                    <div class="form-group row">
                        <label for="admin_code" class="col col-form-label">Enter code [office use only]:</label>
                        <input type="password" class="admin-list form-control col-7" placeholder="Enter code:" name='admin_code' id="admin_code">
                    </div>
                    <div id="admin-code-error"></div>
                    
                </div>




                <!-- blogger input fields -->


                <div class="blogger box">
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="firstname">First name:</label>
                                <input class="blogger-list form-control" placeholder="Your firstname" name='firstname' id='firstname' > 
                            </div>
                            <div class="col">
                                <label for="firstname">Surname:</label>
                                <input class="blogger-list form-control" placeholder="Your surname" name='surname' id='surname' >
                            </div>
                        </div></div>
                    <br/>     


                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="email">Email:</label>
                                <input type="email" class="blogger-list form-control" id='blogger-email' name='email' autofocus placeholder="Your email" >
                            </div>
                            <div class="col">
                                <label for="username">Username:</label>
                                <input class="blogger-list blogger-list form-control" placeholder="Create a username" id='blogger-username' name='username' >
                                <div id="b_username-error"></div>
                            </div>
                        </div></div>
                    <br/>  


                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="password">Password:</label>
                                <input type="password" class="blogger-list form-control" placeholder="Create a password" id='blogger-password' name='password' >
                            </div>
                            <div class="col">
                                <label for="password_confirm">Confirm password:</label>
                                <input type="password" class="blogger-list form-control" placeholder="Confirm your password" id='blogger-password_confirm' name='password_confirm' >
                            </div></div>
                        <div id="b_password-match-error"></div>
                        <div id="b_password-error"></div>
                    </div>
                    <br/> 

                    <div class="form-group row">  
                        <label for="img" class="col col-form-label">Upload your profile image:</label>
                        <input type="file" id="img" class="blogger-list form-control-file col-7" name="userimage" id='blogger-image' accept="image/*" align="center">
                    </div>
                </div>


                <!-- subscriber input fields -->

                <div class="subscriber box">
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="email">Your email:</label>
                                <input type="email" class="subscriber-list form-control" id='sub_email' name='email' autofocus placeholder="Your email" >
                            </div>
                            <div class="col">
                                <label for="username">Username:</label>
                                <input class="subscriber-list form-control" placeholder="Create a username" id='sub_username' name='username' >
            <div id="s_username-error"></div>    
                            </div>
                        </div></div>
                    <br/> 


                    <div class="form-group">
                        <div class="row">
                            <div class="col">  
                                <label for="password">Password:</label>
                                <input type="password" class="subscriber-list form-control" placeholder="Create a password" id='sub_password' name='password' >
                            </div>
                            <div class="col">
                                <label for="password_confirm">Confirm password:</label>
                                <input type="password" class="subscriber-list form-control" placeholder="Confirm your password" id='sub_password_confirm' name='password_confirm' >
                            </div></div>
                        <div id="s_password-match-error" ></div>
                        <div id="s_password-error"></div>
                    </div> <br/> 
 
                </div>

<div class="buttonbox">
                        <button type="submit" value="submit"  name='btnsubmit' id="btnsubmit" class="btn-register">Create account</button> 
                    </div>

            </form>


        </div>
    </div>





    <!-- Javascripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Bootstrap Javascript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- validate registration js -->
    <script src="Views/javascript/verifyRegistration.js"></script>
</div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


<!-- script to make relevant input fields required / disabled based on user type selection -->
<script>
    $("#subscriber").click(function () {
        $(".blogger-list").prop("required", false);
        $(".blogger-list").prop("disabled", true);
        $(".admin-list").prop("required", false);
        $(".admin-list").prop("disabled", true);
        $(".subscriber-list").prop("required", true);
        $(".subscriber-list").prop("disabled", false);
        $(".subscriber-list").focus();
    });
    $("#admin").click(function () {
        $(".blogger-list").prop("required", false);
        $(".blogger-list").prop("disabled", true);
        $(".subscriber-list").prop("required", false);
        $(".subscriber-list").prop("disabled", true);
        $(".admin-list").prop("required", true);
        $(".admin-list").prop("disabled", false);
        $(".admin-list").focus();
    });

    $("#blogger").click(function () {
        $(".admin-list").prop("required", false);
        $(".admin-list").prop("disabled", true);
        $(".subscriber-list").prop("required", false);
        $(".subscriber-list").prop("disabled", true);
        $(".blogger-list").prop("required", true);
        $(".blogger-list").prop("disabled", false);
        $(".blogger-list").focus();
    });

</script> 

