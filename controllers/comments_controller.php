<?php 
 
//include __DIR__ . '../awesome/connection.php';
include_once '/Applications/XAMPP/xamppfiles/htdocs/awesome/models/comments.php'; 


class CommentsController {
      public function report() {
        Comments::reportComment($_GET['commid']);
        //require_once('Views/user/myblogs.php');
        
        }
}




        // Retrieves the blogs comments from the blog id
        function getBlogComments(){
      $blogid = ($_GET['id']);
      $comments = Comments::getComments($blogid);
      return $comments;
        }
      
        
	// Receives a user id and returns the username
      function getUsernameById($id)
	{ $username= Comments::getUsername($id);
        return $username;       
        }
        

	// Receives a comment id and returns the username
	function getRepliesByCommentId($id)
	{ $replies=Comments::getReplies($id);
        return $replies;       
	}
        
        // Receives a user id and returns the profile image
        function getProfileImagebyID($id) {
        $profileimage= Comments::getProfileImage($id);
        return $profileimage;
        }
        
  
        
        
        

// If the user clicked submit on comment form...
        
if (isset($_POST['comment_posted'])) {
        
	$blogid = $_POST['blog_id']; 
        $user_id = $_POST['user_id']; 
        
	// grab the comment that was submitted through Ajax call
	$comment_text = $_POST['comment_text'];
        
        // insert comment into database
        $request=Comments::insertComments($blogid, $user_id,$comment_text);	
    
        // Query same comment from database to send back to be displayed
        $inserted_comment=Comments::retrieveNewComment();
        
	// if insert was successful, get that same comment from the database and return it
	if ($request) {
                $image=Comments::getProfileImage($user_id);
                
		$comment = "<div class='comment clearfix'>
					<img src='Views/".$image."' alt='' class='profile_pic'>
					<div class='comment-details'>
						<span class='comment-name'>" . getUsernameById($inserted_comment['user_ID']) . "</span>
						
						<p>" . $inserted_comment['comm_TXT'] . "</p>
						<a class='reply-btn' href='#' data-id='" . $inserted_comment['comm_ID'] . "'>reply</a>
					</div>
					<!-- reply form -->
					<form action='Views/blogs/read.php' class='reply_form clearfix' id='comment_reply_form_".$inserted_comment['comm_ID']."' data-id='" . $inserted_comment['comm_ID'] . "'>
						<textarea class='form-control' name='reply_text' id='reply_text' cols='30' rows='2'></textarea>
						<button class='btn btn-primary btn-xs pull-right submit-reply'>Submit reply</button>
					</form>
				</div>";
		$comment_info = array(
			'comment' => $comment,
			'comments_count' => Comments::getCommentsCount($blogid)
		);
		echo json_encode($comment_info);
		exit();
	} else {
		echo "error";
		exit();
	}
}




// If the user clicked submit on reply form...
if (isset($_POST['reply_posted'])) {
	
        
	// grab the reply that was submitted through Ajax call
	$reply_text = $_POST['reply_text']; 
	$comment_id = $_POST['comment_id']; 
        $user_id = $_POST['user_id']; 
        
        // insert reply into database
        $request=Comments::insertReply($user_id, $comment_id, $reply_text);

        // Query same reply from database to send back to be displayed
        $inserted_reply=Comments::retrieveNewReply();
         

	// if insert was successful, get that same reply from the database and return it
	if ($request) {
                $image=Comments::getProfileImage($user_id);
		$reply = "<div class='comment reply clearfix'>
					<img src='Views/".$image."' alt='' class='profile_pic'>
					<div class='comment-details'>
						<span class='comment-name'>" . getUsernameById($inserted_reply['ruser_ID']) . "</span>
					
						<p>" . $inserted_reply['reply_TXT'] . "</p>
						<a class='reply-btn' href='#'>reply</a>
					</div>
				</div>";
		echo $reply;
		exit();
	} else {
		echo "error";
		exit();
	}
}