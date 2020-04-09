<?php

include_once '/Applications/XAMPP/xamppfiles/htdocs/awesome/connection.php';

class Comments {

    public $commid;
    public $text;
    public $status;
    public $userid;
    public $blogid;

    public function __construct($commid, $text, $status, $userid, $blogid) {
        $this->commid = $commid;
        $this->text = $text;
        $this->status = $status;
        $this->userid = $userid;
        $this->blogid = $blogid;
    }

    //FUNCTION TO GET ALL COMMENTS FROM DB BY BLOG ID

    public static function getComments($blogid) {
        $db = Db::getInstance();

        $blogid = intval($blogid);
        $list = [];
        $req = $db->prepare('SELECT * FROM Comments WHERE blog_ID = :id');
        $req->execute(['id' => $blogid]);

        foreach ($req->fetchAll() as $comments) {
            $list[] = new Comments(
                    $comments['comm_ID'], $comments['comm_TXT'], $comments['comm_STATUS'], $comments['user_ID'], $comments['blog_ID']
            );
        }
        return $list;
    }

    
    
    //FUNCTION TO USERNAME BY ID
    public static function getUsername($id) {
        $db = Db::getInstance();
        $req = $db->prepare('SELECT user_UN FROM Users WHERE user_ID=:id LIMIT 1');
        $req->execute(array('id' => $id));
        $username = $req->fetch();
        return $username['user_UN'];
    }

    
    
    //FUNCTION TO PROFILE IMG BY ID
    public static function getProfileImage($id) {
        $db = Db::getInstance();
        $req = $db->prepare('SELECT user_IMG FROM Users WHERE user_ID=:id LIMIT 1');
        $req->execute(array('id' => $id));
        $username = $req->fetch();
        return $username['user_IMG'];
    }

    
    
    // Receives a comment id and returns the replies
    public static function getReplies($id) {
        $db = Db::getInstance();
        $req = $db->prepare('SELECT * FROM Replies WHERE comm_ID=:id');
        $req->execute(array('id' => $id));
        $replies = $req->fetchAll();
        return $replies;
    }
    
    
    //Gets comment count by blog id
    public static function getCommentsCount($blogid){
	$db = Db::getInstance();
        $req = $db->prepare('SELECT COUNT(*) AS total FROM Comments where blog_ID=:id');
	$req->execute(['id' => $blogid]);
        $cmdata = $req->fetch();
        $data= $cmdata['total'];
        return $data;
        }

        
      //Gets comment count by blog id
    public static function addRetrieve($blogid, $userid, $comment_text){
        
	$db = Db::getInstance();
        
        // insert comment into database
	  $request = $db->prepare('INSERT INTO Comments (blog_ID, user_ID, comm_TXT) VALUES (:blogid, (SELECT user_ID from Users WHERE user_UN = :username), :text)');
	  $request->execute(array('blogid' => $blogid, 'userid' => $userid,'text' => $comment_text));

          if($request){    
              	// Query same comment from database to send back to be displayed
	$inserted_id = $db->lastInsertId();
       
         $req = $db->prepare('SELECT * FROM Comments WHERE comm_ID=:id');
	 $req->execute(array('id' => $inserted_id));
         $inserted_comment = $req->fetch();
          }
          
         return  $inserted_comment;
          
        }      
        

        
        
        
        	
}

?>

