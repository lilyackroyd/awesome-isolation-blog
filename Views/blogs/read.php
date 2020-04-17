<?php
include_once $_SERVER ['DOCUMENT_ROOT'] .DIRECTORY_SEPARATOR . 'awesome' . DIRECTORY_SEPARATOR.'controllers/comments_controller.php';
//include_once '/Applications/XAMPP/xamppfiles/htdocs/awesome/controllers/comments_controller.php';
//include_once 'controllers/comments_controller.php';
?>


<section class="intro-section">


<!------edit and delete buttons that appear above the image if the user is an admin or the author----->
    <?php
    if ($blog->status === 'Draft') {
        $msg = '<div class="alert alert-secondary draft-banner" role="alert">
            This is blog is still in draft. <a href="?controller=blog&action=update&id=' . $blog->id . '"/>Publish</a> it now.
            </div>';
        echo $msg;
    } elseif ($blog->status === 'Published') {
        ?>
        <script type="text/javascript">$('.draft-banner').hide()</script>
    <?php } ?>

    <div class="blog-popups"> 
        <?php
        //checks if the user is eligible
        if (!empty($_SESSION)) {
            if ($_SESSION['usertype'] === 'Admin' | $_SESSION['userid'] === $blog->userid) {
                $alloweduser = TRUE;
            } else {
                $alloweduser = FALSE;
            }

            // shows the edit / delete buttons if true, otherwise hides them
            if ($alloweduser === TRUE) {
                ?>
                <div class="editdelete">
                    <button id="editdelete" class="btn btn-primary" onclick="updateBlog(<?php echo $blog->id; ?>)"><i class="fas fa-edit"></i> Edit blog</button>
                    <button id="editdelete" class="btn btn-danger" onclick="deleteBlog(<?php echo $blog->id; ?>)"><i class="fas fa-trash-alt"></i> Delete blog</button>
                </div>
            <?php } else { ?>
                <script type="text/javascript">$('.editdelete').hide();</script>
            <?php
            }
        }
        ?>
                
<!------------------------like a blog icon----------------------->
   <div id="favourite">        
            <svg class="ico" id="ico" width="24" height="24" viewBox="0 0 24 24" data-status="unliked" data-id="<?php echo $_GET['id']?>" data-user="<?php echo $_SESSION['userid']?>">
            <path d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z"></path>
            </svg>
        </div>
    <?php if (empty($_SESSION)) {
        ?>
       <script type="text/javascript">$('.ico').hide()</script>
    <?php } ?>

       



    </div>


<!------------------------blog content----------------------->
    <div class="blog-image"> 
        <img class="blog-image-image" src="<?php echo $blog->img ?>" alt="" >
    </div> 

    <div class="blog-header">
        <div class="title">   <h1><?php echo $blog->title ?></h1>
        </div> 
        <div class="blog-details"> 
            <ul class="blog-details-list">
                <li> <img class="author-image" src="<?php echo $blog->authorimage ?>"/></li>
                <li> <p class="date">By <?php echo $blog->authorfirstname . ' ' . $blog->authorlastname . ' '; ?><span class="dot">&#9679</span></p></li>
                <li> <p class="date">Published <?php
                        $sqldate = $blog->date;
                        $date = strtotime($sqldate);
                        echo $displaydate = date('j F Y', $date);
                        ?><span class="dot">&#9679</span></p></li>
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


<?php
$video = $blog->video;
if ($video != "") {
    echo
    '<div class="video-block" id="video"> 
    <iframe class="video" width="560" height="315" src="https://www.youtube.com/embed/' . $video . '" frameborder="none" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>';
} else {
    ?>
    <script type="text/javascript">$('#video').hide()</script>;
<?php }
?>












<!-------------------------------------comment section---------------------------------------------------------------->    


<div class="comment-block">




    <div class="row">

        <div class="col-md-6 col-md-offset-3 comments-section">
            <!-- if user is not signed in, tell them to sign in. If signed in, present them with comment form -->
<?php if (!empty($_SESSION)): ?>
                <form class="clearfix" action="Views/blogs/read.php" method="post" id="comment_form">
                    <textarea name="comment_text" id="comment_text" class="form-control" cols="30" rows="3"></textarea>
                    <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['userid'] ?>">
                    <input type="hidden" id="blog_id" name="blog_id" value="<?php echo $_GET['id'] ?>">
                    <button class="btn btn-primary btn-sm pull-right" name="submit_comment" id="submit_comment" >Submit comment</button>
                </form>
<?php else: ?>
                <div class="well" style="margin-top: 20px;">
                    <h4 class="text-center"><a href="?controller=user&action=login">Log in</a> to post a comment</h4>
                </div>
<?php endif ?>



            <!-- Display total number of comments on this post  -->
            <h2><span id="comments_count"><?php
                    $comments = getBlogComments();
                    echo count($comments)
                    ?></span> Comment(s)</h2>
            <hr>




            <!-- comments wrapper -->
            <div id="comments-wrapper">
                <?php if (isset($comments)): ?>
                    <!-- Display comments -->
    <?php foreach ($comments as $comment): ?>
                        <!-- comment -->
                        <div class="comment clearfix">
                            <img src="<?php echo getProfileImagebyID($comment->userid) ?>" alt="" class="profile_pic">

                            <div class="comment-details">
                                <span class="comment-name"><?php echo getUsernameById($comment->userid) ?></span>

                                <p><?php echo $comment->text; ?></p>   

                                <!-- reply link -->    
                                <?php if (!empty($_SESSION)): ?>
                                    <a class="reply-btn" href="" data-id="<?php echo $comment->commid; ?>">reply</a>
                                <?php else: ?>
                                    <a href="?controller=user&action=login" class="reply-btnlogin">Log in to reply</a>
        <?php endif ?>
                                <button  class="report" id="report-<?php echo $comment->commid; ?>" onclick="reportComment(<?php echo $comment->commid; ?>,<?php echo $_GET['id']; ?>)">report <i class="fa fa-flag" aria-hidden="true"></i></button>
                            </div>








                            <!-- reply form -->

                            <form action="Views/blogs/read.php" class="reply_form clearfix" id="comment_reply_form_<?php echo $comment->commid; ?>" data-id="<?php echo $comment->commid; ?>">
                                <form action="Views/blogs/read.php" class="reply_form clearfix" id="comment_reply_form_<?php echo $comment->commid; ?>" data-id="<?php echo $comment->commid; ?>">
                                    <textarea class="form-control" name="reply_text" id="reply_text" cols="30" rows="2"></textarea>
                                    <input type="hidden" id="user_id_reply" name="user_id" value="<?php echo $_SESSION['userid'] ?>">
                                    <input type="hidden" id="blog_id_reply" name="blog_id" value="<?php echo $_GET['id'] ?>">
                                    <button class="btn btn-primary btn-xs pull-right submit-reply" >Submit reply</button>

                                </form>



                                <!-- GET ALL REPLIES -->
                                    <?php $replies = getRepliesByCommentId($comment->commid) ?>
                                <div class="replies_wrapper_<?php echo $comment->commid; ?>">
        <?php if (isset($replies)): ?>
            <?php foreach ($replies as $reply): ?>


                                            <!-- reply -->
                                            <div class="comment reply clearfix">
                                                <img src="<?php echo getProfileImagebyID($reply['ruser_ID']) ?>" alt="" class="profile_pic">
                                                <div class="comment-details">
                                                    <span class="comment-name"><?php echo getUsernameById($reply['ruser_ID']) ?></span>

                                                    <p><?php echo $reply['reply_TXT']; ?></p>


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
    <!-- Comment section Javascript & AJAX -->
    <script src="Views/javascript/commentScript.js"></script>
    <!-- delete blog js -->
    <script src="Views/javascript/deleteBlog.js"></script>
    <!-- update blog js -->
    <script src="Views/javascript/updateBlog.js"></script>
    <!-- report comment js -->
    <script src="Views/javascript/reportComment.js"></script>
       <!-- like blog js -->
    <script src="Views/javascript/likeBlog.js"></script>