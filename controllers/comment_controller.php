<?php 
include_once '/Applications/XAMPP/xamppfiles/htdocs/awesome/connection.php';  
//include __DIR__ . '../awesome/connection.php';
include_once 'models/comments.php'; 
   $db = Db::getInstance();
   
 class commentController{       
        
     
	

        // Retrieves the blogs comments from the blog id
        function readComments(){
      $blogid = ($_GET['id']);
      $comments = Comments::getComments($blogid);
      return $comments;
        }
        
        // Receives a comment id and returns the username
	function readReplies($id)
	{ $replies=Comments::getReplies($id);
        return $replies;       
	}
      
        // Receives a post id and returns the total number of comments on that post
	function getCommentsCountByPostId($blogid)
	{global $db;
        $req = $db->prepare('SELECT COUNT(*) AS total FROM Comments where blog_ID=:id');
	$req->execute(['id' => $blogid]);
        $data = $req->fetch();
        return $data['total'];
        }
        
	// Receives a user id and returns the username
      function getUsernameById($id)
	{ $username= Comments::getUsername($id);
        return $username;       
        }
        
         // Receives a user id and returns the profile image
        function getProfileImagebyID($id) {
        $profileimage= Comments::getProfileImage($id);
        return $profileimage;
        }
        


// If the user clicked submit on comment form...
        function addComment(){

        if (isset($_POST['comment_posted'])) {
  
        $username=$_SESSION['username'];
        $blogid=$_GET['id'];
	// grab the comment that was submitted through Ajax call
	$comment_text = $_POST['comment_text'];
        
        
        $inserted_comment=Comments::addRetrieve($blogid, $userid, $comment_text);	
    
        
	// if insert was successful, get that same comment from the database and return it
	if ( $inserted_comment) {
            
		$comment = "<div class='comment clearfix'>
					<img src='profile.png' alt='' class='profile_pic'>
					<div class='comment-details'>
						<span class='comment-name'>" . getUsernameById($inserted_comment['user_ID']) . "</span>
						
						<p>" . $inserted_comment['comm_TXT'] . "</p>
						<a class='reply-btn' href='#' data-id='" . $inserted_comment['comm_ID'] . "'>reply</a>
					</div>
					<!-- reply form -->
					<form action='post_details.php' class='reply_form clearfix' id='comment_reply_form_".$inserted_comment['comm_ID']."' data-id='" . $inserted_comment['comm_ID'] . "'>
						<textarea class='form-control' name='reply_text' id='reply_text' cols='30' rows='2'></textarea>
						<button class='btn btn-primary btn-xs pull-right submit-reply'>Submit reply</button>
					</form>
				</div>";
		$comment_info = array(
			'comment' => $comment,
			'comments_count' => getCommentsCountByPostId($blogid)
		);
		echo json_encode($comment_info);
		exit();
	} else {
		echo "error";
		exit();
	}
}

        }

function addReply(){
// If the user clicked submit on reply form...
if (isset($_POST['reply_posted'])) {
	global $db;
	// grab the reply that was submitted through Ajax call
	$reply_text = $_POST['reply_text']; 
	$comment_id = $_POST['comment_id']; 
        
        
	// insert reply into database
         $request = $db->prepare('INSERT INTO Replies (ruser_ID, comm_ID, reply_TXT) VALUES ( :id , :comm_ID, :reply_TXT)');
	 $request->execute(array('id' => $user_id,
                 'comm_ID' => $comment_id,
                 'reply_TXT' => $reply_text
                 ));
         
         
       $inserted_id = $db->lastInsertId();
       
          $req = $db->prepare('SELECT * FROM Replies WHERE reply_ID=:id');
	 $req->execute(array('id' => $inserted_id));
         $inserted_reply = $req->fetch();
        

        
        
        
        
	// if insert was successful, get that same reply from the database and return it
	if ($request) {
            
		$reply = "<div class='comment reply clearfix'>
					<img src='profile.png' alt='' class='profile_pic'>
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
		//exit();
	}
}}












 }