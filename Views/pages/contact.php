

<html>
<head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>


/* style the container */
.contact-container {
   margin-left: 80px;
   margin-right: 84px;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px 0 30px 0;
} 

/* style inputs and link buttons */
input,
.btn {
  width: 100%;
  padding: 12px;
  border: none;
  border-radius: 4px;
  margin: 5px 0;
  opacity: 0.85;
  display: inline-block;
  font-size: 17px;
  line-height: 20px;
  text-decoration: none; /* remove underline from anchors */
}

input:hover,
.btn:hover {
  opacity: 1;
}

/* add appropriate colors to fb, twitter and google buttons */
.fb {
  background-color: #3B5998;
  color: white;
}

.twitter {
  background-color: #55ACEE;
  color: white;
}

.insta {
  background-color: #f58529;
  color: white;
}

/* style the submit button */
input[type=submit] {
  background-color: #dd4b39;
  color: white;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

/* Two-column layout */
.col {
  float: left;
  width: 50%;
  margin: auto;
  padding: 0 50px;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* vertical line */
.vl {
  position: absolute;
  left: 50%;
  transform: translate(-50%);
  border: 2px solid #ddd;
  height: 175px;
}

/* text inside the vertical line */
.vl-innertext {
  position: absolute;
  top: 50%;
  transform: translate(-50%, -50%);
  background-color: #f1f1f1;
  border: 1px solid #ccc;
  border-radius: 50%;
  padding: 8px 10px;
}

/* hide some text on medium and large screens */
.hide-md-lg {
  display: none;
}

/* bottom container */
.bottom-container {
  text-align: center;
  background-color: #666;
  border-radius: 0px 0px 4px 4px;
     margin-left: 80px;
   margin-right: 84px;
}

</style>


    
  <section class="intro-section">

                    <h1>Contact us</h1>
                    <p>Team Awesome are happy to know that you visited our site. Please feel free to contact us if you need any help. 
    You can contact via any means below. We will be glad to hear from you.</p>

                </section>   
    


<div class="contact-container">
    <h2 style="text-align:center">Contact us on social media or login</h2>
     
    
 
    <div class="row">
      
      <div class="vl">
        <span class="vl-innertext">or</span>
      </div>

      <div class="col">
        <a href="https://www.facebook.com/" class="fb btn">
          <i class="fa fa-facebook fa-fw"></i> Via Facebook
         </a>
        <a href="https://twitter.com/home?lang=en-gb" class="twitter btn">
          <i class="fa fa-twitter fa-fw"></i> Via Twitter
        </a>
        <a href="https://www.instagram.com/accounts/login/?hl=en" class="insta btn"><i class="fa fa-instagram fa-fw">
          </i> Via Instagram
        </a>
      </div>

      <div class="col">
        <div class="hide-md-lg">
          <p>Or login:</p>
        </div>
        <form action="">
        <input type="password" class="contact" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
        </form>
      </div>
      
    </div>

</div>

<div class="bottom-container">
  <div class="row">
    <div class="col">
      <a href="?controller=user&action=register" style="color:white" class="btn">Subscribe for updates</a>
    </div>
    <div class="col">
      <a href="#" style="color:white" class="btn">Forgot password?</a>
    </div>
  </div>
</div>

</body>
</html>
