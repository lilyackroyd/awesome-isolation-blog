<?php
 include_once '/Applications/XAMPP/xamppfiles/htdocs/awesome/controllers/comment_controller.php';
 ?>
<!----intro-section  - if needed. This is where the page title and subheading go------------>        
<section class="intro-section">

    <div class="editdelete">  
 <?php 
if(!empty ($_SESSION)) {
if($_SESSION['usertype']==='Admin'|$_SESSION['usertype']==='Blogger' ) {
    $alloweduser=TRUE;
}

if ($alloweduser===TRUE){
     
        echo "<input type='button' class='btn btn-danger' id='editdelete' value='Edit blog' >";
        echo "<input type='button' class='btn btn-danger' id='editdelete' value='Delete blog' >";
}else{?>
    <script type="text/javascript">$('#editdelete').hide()</script>;
<?php
}}?>
    </div> 
    
    


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


<?php $video=$blog->video ;
if ($video != ""){
    echo 
    '<div class="video-block" id="video"> 
    <iframe class="video" width="560" height="315" src="https://www.youtube.com/embed/'.$video.'" frameborder="none" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>';
}else{?>
    <script type="text/javascript">$('#video').hide()</script>;
<?php
}?>


 









<!-------------------------------------comment section---------------------------------------------------------------->    


<div class="comment-block">
     
        


	<div class="row">
		
		<div class="col-md-6 col-md-offset-3 comments-section">
			<!-- if user is not signed in, tell them to sign in. If signed in, present them with comment form -->
			<?php if (!empty($_SESSION)): ?>
                        <form class="clearfix" action="Views/blogs/read.php" method="post" id="comment_form">
					<textarea name="comment_text" id="comment_text" class="form-control" cols="30" rows="3"></textarea>
                                        <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['userid']?>">
                                        <input type="hidden" id="blog_id" name="blog_id" value="<?php echo $_GET['id']?>">
                                        <button class="btn btn-primary btn-sm pull-right" name="submit_comment" id="submit_comment" >Submit comment</button>
				</form>
			<?php else: ?>
				<div class="well" style="margin-top: 20px;">
					<h4 class="text-center"><a href="?controller=user&action=login">Log in</a> to post a comment</h4>
				</div>
			<?php endif ?>
			
                        
                        
                        <!-- Display total number of comments on this post  -->
			<h2><span id="comments_count"><?php $comments=getBlogComments();echo count($comments) ?></span> Comment(s)</h2>
			<hr>
                        
                        
                        
                        
			<!-- comments wrapper -->
			<div id="comments-wrapper">
			<?php if (isset($comments)): ?>
				<!-- Display comments -->
				<?php foreach ($comments as $comment): ?>
				<!-- comment -->
				<div class="comment clearfix">
					<img src="Views/<?php echo getProfileImagebyID($comment->userid)?>" alt="" class="profile_pic">
					
                                        <div class="comment-details">
						<span class="comment-name"><?php echo getUsernameById($comment->userid) ?></span>
						
                                         <p><?php echo $comment->text;?></p>   
                                         
                                        <!-- reply link -->        
						<a class="reply-btn" href="" data-id="<?php echo $comment->commid;?>">reply</a>
                                                <a class ="flag-btn" id="demo" href="">report  &#128681;</a>
					</div>
                                        
                                        <script>
                                        function myFunction() {
                                        document.getElementById("demo").innerHTML = "Reported";
                                        }
                                        </script>
                                        
                                        
                                        
                                        
                                        
					<!-- reply form -->
                                        <form action="Views/blogs/read.php" class="reply_form clearfix" id="comment_reply_form_<?php echo $comment->commid; ?>" data-id="<?php echo $comment->commid; ?>">
						<textarea class="form-control" name="reply_text" id="reply_text" cols="30" rows="2"></textarea>
						<button class="btn btn-primary btn-xs pull-right submit-reply">Submit reply</button>
                                                
					</form>

                                        
                                        
					<!-- GET ALL REPLIES -->
					<?php $replies = getRepliesByCommentId($comment->commid) ?>
					<div class="replies_wrapper_<?php echo $comment->commid; ?>">
						<?php if (isset($replies)): ?>
							<?php foreach ($replies as $reply): ?>
								
                                            
                                            <!-- reply -->
								<div class="comment reply clearfix">
									<img src="Views/<?php echo getProfileImagebyID($reply['ruser_ID'])?>" alt="" class="profile_pic">
									<div class="comment-details">
										<span class="comment-name"><?php echo getUsernameById($reply['ruser_ID']) ?></span>
										
										<p><?php echo $reply['reply_TXT']; ?></p>
										<a class="reply-btn" href="" data-id="<?php echo $comment->commid;?>">reply</a>
                                                                                <a class ="flag-btn" id="demo" href="">report  &#128681;</a>
									</div>
								</div>
							<?php endforeach ?>
						<?php endif ?>
					</div>
				</div>
					<!-- // comment -->
				<?php endforeach ?>
			<?php else: ?>
				<h2>Be the first to comment on this post</h2>
			<?php endif ?>
			</div><!-- comments wrapper -->
		</div><!-- // all comments -->
	</div>

<!-- Javascripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap Javascript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="Views/blogs/commentScript.js"></script>