
<!----intro-section  - if needed. This is where the page title and subheading go------------>        
<section class="intro-section">



    <div class="blog-image"> 
        <img class="blog-image-image" src="<?php echo $blog->img ?>" alt="" >
    </div> 

    <div class="blog-header">
        <div class="title">   <h1><?php echo $blog->title ?></h1>
        </div> 
        <div class="blog-details"> 
            <ul class="blog-details-list">
                <li> <img class="author-image" src="Views/<?php  echo $blog->authorimage?>"/></li>
                <li> <p class="date">By <?php echo $blog->authorfirstname.' '.$blog->authorlastname.' ';?><span class="dot">&#9679</span></p></li>
                <li> <p class="date">Published <?php   $sqldate = $blog->date; $date = strtotime($sqldate);echo $displaydate = date('j F Y', $date);?><span class="dot">&#9679</span></p></li>
                <li> <p class="date"><?php echo $blog->genre ?></p></li>
      
    
            </ul>
        </div>
    </div>
</section>





<!----main-section  - if needed. This is where the rest of the page content goes------------> 
<section class="main-section">

    <div class="blog-text">  
        <p><?php echo $blog->text ?></p> 
    </div>  


</section>


<div class="video-block"> 
    <iframe class="video" width="560" height="315" src="https://www.youtube.com/embed/<?php echo $blog->video ?>" frameborder="none" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div> 


























