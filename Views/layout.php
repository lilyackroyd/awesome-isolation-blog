  <?php 
  include_once 'controllers/header_controller.php';
  session_start();?>   

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>The Awesome Isolation Blog</title>
        <link rel=stylesheet href="views/css/site-wide.css">
        <link href="https://fonts.googleapis.com/css2?family=Cabin&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="http://code.jquery.com/jquery-1.8.3.min.js "  crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    </head>
    <body>
 <header class="header">

        <input class="menu-btn" type="checkbox" id="menu-btn" />
        <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>

        <div class="logo">
            <a href="?controller=blog&action=home"><img src="Views/images/blog-logo-long.png" alt="logo" style="width:175px;border:0;"></a>
        </div>

        <ul class="menu">
            <div id="menu-left">
                <li><a id="item-1" href="/awesome/index.php?controller=blog&action=readAll&tag=family">FAMILY</a></li>
                <li><a id="item-2" href="/awesome/index.php?controller=blog&action=readAll&tag=food">FOOD</a></li>
                <li><a  id="item-3"href="/awesome/index.php?controller=blog&action=readAll&tag=fitness">KEEP FIT</a></li>
                <li> <a  id="item-4"href="/awesome/index.php?controller=blog&action=readAll&tag=craft">CRAFT</a></li>
            </div>
            <div id="menu-right">
                <li><a  id="item-5"href="<?php echo $accountAction= getAccountPage();?>">My Account</a></li>
                <li><a id="log-in"  href="<?php echo $loginAction=getLoginAction();?>"><?php echo $loginText=getLoginText();?></a></li>
                <li>
                    <form method="post" action="?controller=blog&action=search" name="search" class="search-bar">
                        <input type="text" name="search" placeholder="search...">
                    </form>
                </li>
            </div>
        </ul>


    </header>
        
        <!----page-container - This is the container that wraps the whole page including header and footer---->
        <div id="page-container">
            
       
            
            
        <!----Including the header / navigation menu------------------------------------------------->    
           
        
        
        
        
        <!----content-wrap  - this is the container that holds just the content, minus the header & footer--->
            <div id="content-wrap">
                
                    <?php require_once('routes.php'); ?> 
                
                
        <!----intro-section  - if needed. This is where the page title and subheading go------------>        
             
        
        
        
        
        
        
            
        
        
       <!----end of content-wrap div---------------------------------------------------------------->
            </div> 
        
        
        
        <!----Including the footer------------------------------------------------------------------>   
                    <footer id="footer">
            <div class="footer-container">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <h6>The Awesome Isolation Blog</h6>
                        <ul class="list-unstyled two-column">
                            <li><a href="?controller=pages&action=about">About</a></li>
                              <li><a href="?controller=pages&action=contact">Contact</a></li>
                               <li><a href="?controller=pages&action=faq">FAQs</a></li>
                                  <li><a href="?controller=user&action=login">Log in</a></li>

                        </ul>

                    </div>


                    <div class="col-lg-4 col-md-4 ">
                        <ul class="list-unstyled socila-list">
                            <li><img src="Views/images/facebook.png" alt="" style="width:48px;height:48px;"/></li>
                            <li  ><img src="Views/images/twitter.png" alt="" style="width:48px;height:48px;"/></li>
                            <li><img  src="Views/images/instagram.png" alt="" style="width:48px;height:48px;"/></li>
                            <li class="social-item-1"><img  src="Views/images/youtube.png" alt="" style="width:48px;height:48px;"/></li>
                        </ul>

                    </div>

                </div>
            </div>

        </footer>
        </div>
            <script>
$('.card')
    .on('mouseenter', function(){
        var div = $(this);
        div.stop(true, true).animate({ 
            margin: -10,
            width: "+=10",
            height: "+=10"
        }, 'fast');
    })
    .on('mouseleave', function(){
        var div = $(this);
        div.stop(true, true).animate({ 
            margin: 0,
            width: "-=10",
            height: "-=10"
        }, 'fast');
    })
</script>
    </body>

</html>
