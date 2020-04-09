
 <section class="intro-section">
              <h1 class="login_sign-in">Enter your details below to start blogging.  </h1> 
            </section>
        
       
        <!----main-section  - if needed. This is where the rest of the page content goes------------> 
            
            <div class= "login_login-container">
            <div class ="login_welcome">
                
    <p>    
     
    </p><div><?php //echo $loginMsg; ?></div>
    
    <div class="login-welcome">
    <form action='../Controllers/registrationController.php' method="POST">
        
        <div class="pure-form pure-form-aligned">
            <div class="pure-control-group"> 
                <p> I want to register as a </p>
               
                <input type ='radio' id='admin' name='usertype' value='admin'>
                <label for="admin">Admin</label>
                <input type = 'radio' id='blogger' name ='usertype' value='blogger'>
                <label for="blogger">Blogger</label>
                <input type ='radio' id='subscriber' name='usertype' value='subscriber'>
                <label for="subscriber">Subscriber</label>
            </div>
            
        </div> 
    <div class="pure-form pure-form-aligned" >
        <div class="pure-control-group">
            <input class="shadow-sm p-3 mb-5 bg-white rounded form" placeholder="Your firstname" name='firstname' autofocus="" required=""> 
            <div class='error'>
                <?php echo $errors['firstname'] ?? '' ?>
            </div>
        </div>
    </div>
    <div class="pure-form pure-form-aligned">
        <div class="pure-control-group">
            <input class="shadow-sm p-3 mb-5 bg-white rounded form" placeholder="Your surname" name='surname' required="">
            <div class='error'>
                <?php echo $errors['surname'] ?? '' ?>
            </div>
        </div>
    </div>      
    <div class="pure-form pure-form-aligned">
        <div class="pure-control-group">
            <input type="email" class="shadow-sm p-3 mb-5 bg-white rounded form" name='email' placeholder="Your email" required="">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            <div class='error'>
                <?php echo $errors['email'] ?? '' ?>
            </div>
        </div>
    </div>
    <div class="pure-form pure-form-aligned">
        <div class="pure-control-group" >
            <input class="shadow-sm p-3 mb-5 bg-white rounded form" placeholder="Create a username" name='username' required="">
            <div class='error'>
                <?php echo $errors['username'] ?? '' ?>
            </div>
        </div>
    </div>
    <div class="pure-form pure-form-aligned">
        <div class="pure-control-group" >
            <input type="password" class="shadow-sm p-3 mb-5 bg-white rounded form" placeholder="Create a password" name='password' required="">
            <div class='error'>
                <?php echo $errors['password'] ?? '' ?>
            </div>
        </div>
    </div>
    <div class="pure-form pure-form-aligned">
        <div class="pure-control-group" >
            <input type="password" class="shadow-sm p-3 mb-5 bg-white rounded form" placeholder="Confirm your password" name='password_confirm' required="">
            <div class='error'>
                <?php echo $errors['password_confirm'] ?? '' ?>
            </div>
        </div>
    
    </div>
 <!--   <div>        
        <div class="pure-form pure-form-aligned">
            <div class="pure-control-group" >
            
            (Office only) Enter your Library code:<input class="shadow-sm p-3 mb-5 bg-white rounded form" name='lib_code' id="lib_code">
            <?php //echo $errors['lib_code'] ?? '' ?>
            </div>
            
        </div>
   </div> -->     
        <div class="pure-form pure-form-aligned container-btn">
        <button type="submit" id="submit" value="register" form="form1" name='login' class="form">REGISTER</button> 
        </div>
        </form>

</div>    
                    
                </section>
