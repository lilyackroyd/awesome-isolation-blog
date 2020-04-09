
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



<?php
 include_once 'controllers/comment_controller.php';
 ?>
<div class="comment-block">
        <!----comment section---------------------------------------------------------------->    
        


	<div class="row">
		
		<div class="col-md-6 col-md-offset-3 comments-section">
			<!-- if user is not signed in, tell them to sign in. If signed in, present them with comment form -->
			<?php if (isset($_SESSION)): ?>
                        <form class="clearfix" action="?controller=blog&action=read&id=<?php echo $_GET['id']?>" method="post" id="comment_form">
					<textarea name="comment_text" id="comment_text" class="form-control" cols="30" rows="3"></textarea>
                                        <button class="btn btn-primary btn-sm pull-right" name="submit_comment" id="submit_comment" >Submit comment</button>
				</form>
			<?php else: ?>
				<div class="well" style="margin-top: 20px;">
					<h4 class="text-center"><a href="?controller=user&action=login">Log in</a> to post a comment</h4>
				</div>
			<?php endif ?>
			
                        
                        
                        <!-- Display total number of comments on this post  -->
			<h2><span id="comments_count"><?php $comments=commentController::readComments();echo count($comments) ?></span> Comment(s)</h2>
			<hr>
                        
                        
                        
                        
			<!-- comments wrapper -->
			<div id="comments-wrapper">
			<?php if (isset($comments)): ?>
				<!-- Display comments -->
				<?php foreach ($comments as $comment): ?>
				<!-- comment -->
				<div class="comment clearfix">
					<img src="<?php echo commentController::getProfileImagebyID($comment->userid)?>" alt="" class="profile_pic">
					
                                        <div class="comment-details">
						<span class="comment-name"><?php echo commentController::getUsernameById($comment->userid) ?></span>
						
                                         <p><?php echo $comment->text;?></p>   
                                         
                                        <!-- reply link -->        
						<a class="reply-btn" href="" data-id="<?php echo $comment->commid;?>">reply</a>
                                                <a class ="flag-btn" href="">report  &#128681;</a>
					</div>
                                        
                                        
                                        
                                        
                                        
                                        
					<!-- reply form -->
                                        <form action="" class="reply_form clearfix" id="comment_reply_form_<?php echo $comment->commid; ?>" data-id="<?php echo $comment->commid; ?>">
						<textarea class="form-control" name="reply_text" id="reply_text" cols="30" rows="2"></textarea>
						<button class="btn btn-primary btn-xs pull-right submit-reply">Submit reply</button>
					</form>

                                        
                                        
					<!-- GET ALL REPLIES -->
					<?php $replies = commentController::readReplies($comment->commid) ?>
					<div class="replies_wrapper_<?php echo $comment->commid; ?>">
						<?php if (isset($replies)): ?>
							<?php foreach ($replies as $reply): ?>
								
                                            
                                            <!-- reply -->
								<div class="comment reply clearfix">
									<img src="<?php echo commentController::getProfileImagebyID($comment->userid)?>" alt="" class="profile_pic">
									<div class="comment-details">
										<span class="comment-name"><?php echo commentController::getUsernameById($reply['ruser_ID']) ?></span>
										
										<p><?php echo $reply['reply_TXT']; ?></p>
										<a class="reply-btn" href="#">reply</a>
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

<script>
$(document).ready(function(){
	// When user clicks on submit comment to add comment under post
	$(document).on('click', '#submit_comment', function(e) {
		e.preventDefault();
		var comment_text = $('#comment_text').val();
		var url = $('#comment_form').attr('action');
		// Stop executing if not value is entered
		if (comment_text === "" ) return;
		$.ajax({
			url: url,
			type: "POST",
			data: {
				comment_text: comment_text,
				comment_posted: 1
			},
			success: function(data){
				var response = JSON.parse(data);
				if (data === "error") {
					alert('There was an error adding comment. Please try again');
				} else {
					$('#comments-wrapper').prepend(response.comment)
					$('#comments_count').text(response.comments_count); 
					$('#comment_text').val('');
				}
			}
		});
	});
	// When user clicks on submit reply to add reply under comment
	$(document).on('click', '.reply-btn', function(e){
		e.preventDefault();
		// Get the comment id from the reply button's data-id attribute
		var comment_id = $(this).data('id');
                
                
                
                
                
		// show/hide the appropriate reply form (from the reply-btn (this), go to the parent element (comment-details)
		// and then its siblings which is a form element with id comment_reply_form_ + comment_id)
		$(this).parent().siblings('form#comment_reply_form_' + comment_id).toggle(500);
		$(document).on('click', '.submit-reply', function(e){
			e.preventDefault();
			// elements
			var reply_textarea = $(this).siblings('textarea'); // reply textarea element
			var reply_text = $(this).siblings('textarea').val();
			var url = $(this).parent().attr('action');
			$.ajax({
				url: url,
				type: "POST",
				data: {
					comment_id: comment_id,
					reply_text: reply_text,
					reply_posted: 1
				},
				success: function(data){
					if (data === "error") {
						alert('There was an error adding reply. Please try again');
					} else {
						$('.replies_wrapper_' + comment_id).append(data);
						reply_textarea.val('');
					}
				}
			});
		});
                
                
                
                
                
                
                
	});
});

</script>
        </div>



























