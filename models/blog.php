<?php

class Blog {

    public $id;
    public $genre;
    public $userid;
    public $title;
    public $text;
    public $img;
    public $video;
    public $status;
    public $date;
    public $commentno;
    public $authorfirstname;
    public $authorlastname;
    public $authorimage;
    public $keywords;

    public function __construct($id, $genre, $userid, $title, $text, $img, $video, $status, $date, $commentno, $authorfirstname, $authorlastname, $authorimage, $keywords) {
        $this->id = $id;
        $this->genre = $genre;
        $this->userid = $userid;
        $this->title = $title;
        $this->text = $text;
        $this->img = $img;
        $this->video = $video;
        $this->status = $status;
        $this->date = $date;
        $this->commentno = $commentno;
        $this->authorfirstname = $authorfirstname;
        $this->authorlastname = $authorlastname;
        $this->authorimage = $authorimage;
        $this->keywords = $keywords;
    }

    public static function find($id) {
        $db = Db::getInstance();
        //use intval to make sure $id is an integer
        $id = intval($id);

        $req = $db->prepare('SELECT blog_posts.blog_ID, blog_posts.genre_TAG, blog_posts.user_ID, blog_posts.blog_TITLE, blog_posts.blog_TXT, blog_posts.blog_IMG,blog_posts.blog_VIDEO,blog_posts.blog_STATUS,blog_posts.date_PUB,blog_posts.comm_COUNT,blog_posts.KEYWORDS,Users.user_FN, Users.user_LN, Users.user_IMG
                        FROM blog_posts
                        INNER JOIN Users ON blog_posts.user_ID=Users.user_ID WHERE blog_ID = :id;');
        //the query was prepared, now replace :id with the actual $id value
        $req->execute(array('id' => $id));
        $blog = $req->fetch();
        if ($blog) {
            return new Blog($blog['blog_ID'], $blog['genre_TAG'], $blog['user_ID'], $blog['blog_TITLE'], $blog['blog_TXT'], $blog['blog_IMG'], $blog['blog_VIDEO'], $blog['blog_STATUS'], $blog['date_PUB'], $blog['comm_COUNT'], $blog['user_FN'], $blog['user_LN'], $blog['user_IMG'], $blog['KEYWORDS']);
        } else {
            //replace with a more meaningful exception
            throw new Exception('Blog could not be found, sorry!');
        }
    }

    public static function all($tag) {
        $db = Db::getInstance();
        $blogtag = ucfirst($tag);
        $list = [];

        if ($blogtag === "Food") {
            $req = $db->query("SELECT blog_posts.blog_ID, blog_posts.genre_TAG, blog_posts.user_ID, blog_posts.blog_TITLE, blog_posts.blog_TXT, blog_posts.blog_IMG,blog_posts.blog_VIDEO,blog_posts.blog_STATUS,blog_posts.date_PUB,blog_posts.comm_COUNT, blog_posts.KEYWORDS,Users.user_FN, Users.user_LN, Users.user_IMG
                        FROM blog_posts 
                        INNER JOIN Users ON blog_posts.user_ID=Users.user_ID WHERE blog_ID >0 AND genre_TAG ='Food' AND blog_posts.blog_STATUS='Published'
                        ORDER by blog_posts.date_PUB DESC;");

            foreach ($req->fetchAll() as $blog) {
                $list[] = new Blog(
                        $blog['blog_ID'], $blog['genre_TAG'], $blog['user_ID'], $blog['blog_TITLE'], $blog['blog_TXT'], $blog['blog_IMG'], $blog['blog_VIDEO'], $blog['blog_STATUS'], $blog['date_PUB'], $blog['comm_COUNT'], $blog['user_FN'], $blog['user_LN'], $blog['user_IMG'], $blog['KEYWORDS']);
            }
            return $list;
        } elseif ($blogtag === "Family") {
            $req = $db->query("SELECT blog_posts.blog_ID, blog_posts.genre_TAG, blog_posts.user_ID, blog_posts.blog_TITLE, blog_posts.blog_TXT, blog_posts.blog_IMG,blog_posts.blog_VIDEO,blog_posts.blog_STATUS,blog_posts.date_PUB,blog_posts.comm_COUNT,blog_posts.KEYWORDS,Users.user_FN, Users.user_LN, Users.user_IMG
                        FROM blog_posts 
                        INNER JOIN Users ON blog_posts.user_ID=Users.user_ID WHERE blog_ID >0 AND genre_TAG ='Family' AND blog_posts.blog_STATUS='Published'
                        ORDER by blog_posts.date_PUB DESC;");

            foreach ($req->fetchAll() as $blog) {
                $list[] = new Blog(
                        $blog['blog_ID'], $blog['genre_TAG'], $blog['user_ID'], $blog['blog_TITLE'], $blog['blog_TXT'], $blog['blog_IMG'], $blog['blog_VIDEO'], $blog['blog_STATUS'], $blog['date_PUB'], $blog['comm_COUNT'], $blog['user_FN'], $blog['user_LN'], $blog['user_IMG'], $blog['KEYWORDS']);
            }
            return $list;
        } elseif ($blogtag === "Fitness") {
            $req = $db->query("SELECT blog_posts.blog_ID, blog_posts.genre_TAG, blog_posts.user_ID, blog_posts.blog_TITLE, blog_posts.blog_TXT, blog_posts.blog_IMG,blog_posts.blog_VIDEO,blog_posts.blog_STATUS,blog_posts.date_PUB,blog_posts.comm_COUNT,blog_posts.KEYWORDS,Users.user_FN, Users.user_LN, Users.user_IMG
                        FROM blog_posts 
                        INNER JOIN Users ON blog_posts.user_ID=Users.user_ID WHERE blog_ID >0 AND genre_TAG ='Fitness' AND blog_posts.blog_STATUS='Published'
                        ORDER by blog_posts.date_PUB DESC;");

            foreach ($req->fetchAll() as $blog) {
                $list[] = new Blog(
                        $blog['blog_ID'], $blog['genre_TAG'], $blog['user_ID'], $blog['blog_TITLE'], $blog['blog_TXT'], $blog['blog_IMG'], $blog['blog_VIDEO'], $blog['blog_STATUS'], $blog['date_PUB'], $blog['comm_COUNT'], $blog['user_FN'], $blog['user_LN'], $blog['user_IMG'], $blog['KEYWORDS']);
            }
            return $list;
        } elseif ($blogtag === "Craft") {
            $req = $db->query("SELECT blog_posts.blog_ID, blog_posts.genre_TAG, blog_posts.user_ID, blog_posts.blog_TITLE, blog_posts.blog_TXT, blog_posts.blog_IMG,blog_posts.blog_VIDEO,blog_posts.blog_STATUS,blog_posts.date_PUB,blog_posts.comm_COUNT,blog_posts.KEYWORDS,Users.user_FN, Users.user_LN, Users.user_IMG
                        FROM blog_posts 
                        INNER JOIN Users ON blog_posts.user_ID=Users.user_ID WHERE blog_ID >0 AND genre_TAG ='Craft' AND blog_posts.blog_STATUS='Published'
                        ORDER by blog_posts.date_PUB DESC;");

            foreach ($req->fetchAll() as $blog) {
                $list[] = new Blog(
                        $blog['blog_ID'], $blog['genre_TAG'], $blog['user_ID'], $blog['blog_TITLE'], $blog['blog_TXT'], $blog['blog_IMG'], $blog['blog_VIDEO'], $blog['blog_STATUS'], $blog['date_PUB'], $blog['comm_COUNT'], $blog['user_FN'], $blog['user_LN'], $blog['user_IMG'], $blog['KEYWORDS']);
            }
            return $list;
        }
    }

    public static function allHome() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query(
                "(
SELECT blog_posts.blog_ID, blog_posts.genre_TAG, blog_posts.user_ID, blog_posts.blog_TITLE, blog_posts.blog_TXT, blog_posts.blog_IMG,blog_posts.blog_VIDEO,blog_posts.blog_STATUS,blog_posts.date_PUB,blog_posts.comm_COUNT,blog_posts.KEYWORDS,Users.user_FN, Users.user_LN, Users.user_IMG
FROM blog_posts 
INNER JOIN Users ON blog_posts.user_ID=Users.user_ID 
WHERE blog_ID >0  AND  genre_TAG = 'Food' AND blog_STATUS='Published'
ORDER by blog_posts.date_PUB DESC
LIMIT 3
)
UNION
(
SELECT blog_posts.blog_ID, blog_posts.genre_TAG, blog_posts.user_ID, blog_posts.blog_TITLE, blog_posts.blog_TXT, blog_posts.blog_IMG,blog_posts.blog_VIDEO,blog_posts.blog_STATUS,blog_posts.date_PUB,blog_posts.comm_COUNT,blog_posts.KEYWORDS,Users.user_FN, Users.user_LN, Users.user_IMG
FROM blog_posts 
INNER JOIN Users ON blog_posts.user_ID=Users.user_ID 
WHERE blog_ID >0  AND  genre_TAG = 'Craft' AND blog_STATUS='Published'
ORDER by blog_posts.date_PUB DESC
LIMIT 3
)
UNION
(
SELECT blog_posts.blog_ID, blog_posts.genre_TAG, blog_posts.user_ID, blog_posts.blog_TITLE, blog_posts.blog_TXT, blog_posts.blog_IMG,blog_posts.blog_VIDEO,blog_posts.blog_STATUS,blog_posts.date_PUB,blog_posts.comm_COUNT,blog_posts.KEYWORDS,Users.user_FN, Users.user_LN, Users.user_IMG
FROM blog_posts 
INNER JOIN Users ON blog_posts.user_ID=Users.user_ID 
WHERE blog_ID >0  AND  genre_TAG = 'Family' AND blog_STATUS='Published'
ORDER by blog_posts.date_PUB DESC
LIMIT 3
)
UNION
(
 SELECT blog_posts.blog_ID, blog_posts.genre_TAG, blog_posts.user_ID, blog_posts.blog_TITLE, blog_posts.blog_TXT, blog_posts.blog_IMG,blog_posts.blog_VIDEO,blog_posts.blog_STATUS,blog_posts.date_PUB,blog_posts.comm_COUNT,blog_posts.KEYWORDS,Users.user_FN, Users.user_LN, Users.user_IMG
FROM blog_posts 
INNER JOIN Users ON blog_posts.user_ID=Users.user_ID 
WHERE blog_ID >0  AND  genre_TAG = 'Fitness' AND blog_STATUS='Published'
ORDER by blog_posts.date_PUB DESC
LIMIT 3
);"
        );
        foreach ($req->fetchAll() as $blog) {
            $list[] = new Blog(
                    $blog['blog_ID'], $blog['genre_TAG'], $blog['user_ID'], $blog['blog_TITLE'], $blog['blog_TXT'], $blog['blog_IMG'], $blog['blog_VIDEO'], $blog['blog_STATUS'], $blog['date_PUB'], $blog['comm_COUNT'], $blog['user_FN'], $blog['user_LN'], $blog['user_IMG'], $blog['KEYWORDS']);
        }
        return $list;
    }

    public static function search($searches) {
        $db = Db::getInstance();

        $stmt = $db->prepare("SELECT * FROM `blog_posts` WHERE `blog_TITLE` LIKE '%$searches%' OR `KEYWORDS` LIKE '%$searches%'");
        $stmt->execute(["%" . $searches . "%"]);
        $results = $stmt->fetchAll();
        return $results;
    }

    public static function getUserBlogs($id) {
        $db = Db::getInstance();
        $userid = intval($id);
        $list = [];
        $req = $db->prepare("SELECT blog_posts.blog_ID, blog_posts.genre_TAG, blog_posts.user_ID, blog_posts.blog_TITLE, blog_posts.blog_TXT, blog_posts.blog_IMG,blog_posts.blog_VIDEO,blog_posts.blog_STATUS,blog_posts.date_PUB,blog_posts.comm_COUNT,blog_posts.KEYWORDS,Users.user_FN, Users.user_LN, Users.user_IMG
                        FROM blog_posts
                        INNER JOIN Users ON blog_posts.user_ID=Users.user_ID WHERE blog_posts.user_ID = '" . $userid . "';");
        $req->execute();
        foreach ($req->fetchAll() as $blog) {
            $list[] = new Blog(
                    $blog['blog_ID'], $blog['genre_TAG'], $blog['user_ID'], $blog['blog_TITLE'], $blog['blog_TXT'], $blog['blog_IMG'], $blog['blog_VIDEO'], $blog['blog_STATUS'], $blog['date_PUB'], $blog['comm_COUNT'], $blog['user_FN'], $blog['user_LN'], $blog['user_IMG'], $blog['KEYWORDS']);
        }
        return $list;
    }

    public static function deleteBlog($id) {
        $db = Db::getInstance();

        $blog = intval($id);
        self::removeAllBlogComments($id);
        $req = $db->prepare('delete FROM blog_posts WHERE blog_ID = :blogid');
        $req->execute(array('blogid' => $blog));
//                
        //BlogPost::deleteBlogImage($blog);
    }

    public static function removeAllBlogComments($id) {
        $db = Db::getInstance();
        $blogid = intval($id);
        self::removeAllCommentReplies($blogid);
        $req = $db->prepare('delete FROM Comments WHERE blog_ID = :id');
        $req->execute(array('id' => $id));
    }

    public static function removeAllCommentReplies($blogid) {
        $db = Db::getInstance();
        $req = $db->prepare('delete FROM Replies WHERE rblog_ID = :blogid');
        $req->execute(array('blogid' => $blogid));
    }

//    //attempt to write method to delete blog image so image folder doesn't get clogged up
//    public static function deleteBlogImage($blogid) {
//        if($blogid == ($_GET['blogid'])) {
//    $path =   join(DIRECTORY_SEPARATOR, array(__DIR__,'..','views','images', $blogid));
//    $blogfile = $path . '.jpeg';
//    	if (file_exists($blogfile)) {
//		unlink($blogfile); 
//	}  
//    } 
//    }




    public static function update($id) {
        $db = Db::getInstance();

        if (!empty($_SESSION)) {
            $userid = $_SESSION["userid"];
        }
        //checks blog title 
        if (isset($_POST['blogTitle']) && $_POST['blogTitle'] != "") {
            $filteredTitle = filter_input(INPUT_POST, 'blogTitle', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        //checks blog text
        if (isset($_POST['blogContent']) && $_POST['blogContent'] != "") {
            $filteredText = $_POST['blogContent']; //filter_input(INPUT_POST,'blogContent', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        //checks genre
        if (isset($_POST['genretag']) && $_POST['genretag'] != "") {
            $filteredGenre = filter_input(INPUT_POST, 'genretag', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        //if a new blog image is uploaded - uploaded and replace it
        if ($_FILES['blogimage']['size'] > 0) {
            $imagepath = "Views/images/" . $id . "-" . $userid . "-image.jpg";
            self::uploadFile($imagepath);
            //if no new blog image is uploaded - keep the original one
        } elseif ($_FILES['blogimage']['size'] == 0) {
            $stmt = $db->prepare("SELECT blog_IMG from blog_posts WHERE blog_ID = $id");
            $stmt->execute();
            $existingimage = $stmt->fetchAll();
            $imagepath = $existingimage['0']['blog_IMG'];
        }

        //checks blog text
        if (isset($_POST['blogstatus']) && $_POST['blogstatus'] != "") {
            $filteredStatus = filter_input(INPUT_POST, 'blogstatus', FILTER_SANITIZE_SPECIAL_CHARS);
        }


        if (isset($_POST['videolink']) && $_POST['videolink'] != "") {
            //video link pasted into input, so sanitize URL
            $filteredVideo = filter_input(INPUT_POST, 'videolink', FILTER_SANITIZE_URL);
            //every youtube video link ends with a unique 11 character code so reduce string to just the 11 characters 
            $videolink = substr($filteredVideo, -11);
        }


        $req = $db->prepare("Update blog_posts set blog_TITLE=:title, blog_TXT=:text, blog_IMG=:image, blog_VIDEO=:video, genre_TAG=:genre, blog_STATUS=:status, date_PUB = CURRENT_DATE  WHERE user_ID = :userid AND blog_ID = :id");
        $req->bindParam(':userid', $userid);
        $req->bindParam(':title', $filteredTitle);
        $req->bindParam(':text', $filteredText);
        $req->bindParam(':id', $id);
        $req->bindParam(':image', $imagepath);
        $req->bindParam(':video', $videolink);
        $req->bindParam(':status', $filteredStatus);
        $req->bindParam(':genre', $filteredGenre);

        $req->execute();
//        //upload blog image if it exists
//        if (!empty($_FILES[self::InputKey]['blogid'])) {
//            self::uploadFile($id);
//	}
    }

    public static function add() {
        $db = Db::getInstance();
        $req = $db->prepare("Insert into blog_posts(genre_TAG, user_ID, blog_TITLE, blog_TXT, blog_IMG, blog_VIDEO, blog_STATUS, date_PUB, KEYWORDS) values (:genretag, (SELECT user_ID from Users WHERE user_UN = :username), :blogTitle, :blogContent, :caption, :videolink, :blogstatus, CURRENT_DATE, :keywords)");
        $req->bindParam(':genretag', $genre);
        $req->bindParam(':username', $username);
        $req->bindParam(':blogTitle', $title);
        $req->bindParam(':blogContent', $text);
        $req->bindParam(':caption', $img);
        $req->bindParam(':videolink', $video);
        $req->bindParam(':blogstatus', $status);
        $req->bindParam(':keywords', $keywords);
        // set parameters and execute
        if (!empty($_SESSION)) {
            $username = $_SESSION["username"];
        }
        if (isset($_POST['blogTitle']) && $_POST['blogTitle'] != "") {
            $filteredTitle = filter_input(INPUT_POST, 'blogTitle', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['blogContent']) && $_POST['blogContent'] != "") {
            $filteredContent = $_POST['blogContent']; //filter_input(INPUT_POST,'blogContent', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['videolink']) && $_POST['videolink'] != "") {
            //video link pasted into input, so sanitize URL
            $filteredvideo = filter_input(INPUT_POST, 'videolink', FILTER_SANITIZE_URL);
            //every youtube video link ends with a unique 11 character code so reduce string to just the 11 characters 
            $videolink = substr($filteredvideo, -11);
        } elseif ($_POST['videolink'] == "") {
            $videolink = "";
        }
        if (isset($_POST['keywords']) && $_POST['keywords'] != "") {
            $filteredkeywords = filter_input(INPUT_POST, 'keywords', FILTER_SANITIZE_SPECIAL_CHARS);
        } elseif ($_POST['keywords'] == "") {
            $filteredkeywords = "";
        }
        if (isset($_POST['caption']) && $_POST['caption'] != "") {
            $filteredcaption = "Views/images/" . filter_input(INPUT_POST, 'caption', FILTER_SANITIZE_SPECIAL_CHARS) . ".jpeg";
        } elseif ($_POST['caption'] == "") {
            $filteredcaption = "";
        }
//        if(isset($_FILES['myUploader'])&& $_FILES['myUploader']!=""){
//            $filteredImage = filter_input(INPUT_POST,'myUploader', FILTER_SANITIZE_SPECIAL_CHARS);
//        }
        $title = $filteredTitle;
        $text = $filteredContent;
        $video = $videolink;
        $keywords = $filteredkeywords;
        $genre = $_POST['genretag'];
        $status = $_POST['blogstatus'];
        $img = $filteredcaption;
//            $img = $filteredImage;
        $req->execute();
        //upload blog image
        Blog::uploadFile($img);
        $inserted_id = $db->lastInsertId();
        return $inserted_id;
    }

    const AllowedTypes = ['image/jpeg', 'image/jpg'];
    const InputKey = 'blogimage';

//die() function calls replaced with trigger_error() calls
//replace with structured exception handling

    public static function uploadFile(string $img) {
//
//        if (empty($_FILES[self::InputKey])) {
//            //die("File Missing!");
//            trigger_error("File Missing!");
//        }
//
//        if ($_FILES[self::InputKey]['error'] > 0) {
//            trigger_error("Handle the error! " . $_FILES[InputKey]['error']);
//        }
//
//
//        if (!in_array($_FILES[self::InputKey]['type'], self::AllowedTypes)) {
//            trigger_error("Handle File Type Not Allowed: " . $_FILES[self::InputKey]['type']);
//        }
//
//        $tempFile = $_FILES[self::InputKey]['tmp_name'];
//        $path = "C:/xampp/htdocs/awesome/";
//        $destinationFile = $path . $img;
//
//        if (!move_uploaded_file($tempFile, $destinationFile)) {
//            trigger_error("Handle Error");
//        }
//
//        //Clean up the temp file
//        if (file_exists($tempFile)) {
//            unlink($tempFile);
//        }
//    }   
//    


        $tempFile = $_FILES[self::InputKey]['tmp_name'];
        $path = realpath(__DIR__ . '/..') . '/' . $img;
        $destinationFile = $path;
        $error = $_FILES[self::InputKey]['error'];

//        if($error === 0) {

        if (!move_uploaded_file($tempFile, $destinationFile)) {
            echo "";
        }
        if (file_exists($tempFile)) {
            unlink($tempFile);
        }
    }

    public static function insertLike($blogid, $userid) {
        $db = Db::getInstance();
        $req = $db->prepare("INSERT INTO Likes (luser_ID, lblog_ID) VALUES (:userid, :blogid)");
        $req->execute(array('userid' => $userid, 'blogid' => $blogid,));
        $stmt = $db->prepare("SELECT blog_LIKES FROM blog_posts WHERE blog_ID=:blogid");
        $stmt->execute(array('blogid' => $blogid,));
        $stmt->fetchAll();
        $n = $stmt['0']['blog_LIKES'];
//        echo $n+1;
        return $likes = "1";
    }

    public static function removeLike($blogid, $userid) {
        $db = Db::getInstance();
        $req = $db->prepare("delete from Likes where luser_ID=:userid AND lblog_ID =:blogid;");
        $req->execute(array('userid' => $userid, 'blogid' => $blogid,));
        $stmt = $db->execute("Update blog_posts SET blog_LIKES = blog_LIKES -1 WHERE blog_ID = :blogid");
        $stmt->execute(array('blogid' => $blogid,));
    }

    public static function myLikes($userid) {
        $db = Db::getInstance();
        $stmt = $db->prepare("select distinct lblog_ID from Likes where luser_ID = :userid;");
        $stmt->execute(array('userid' => $userid));
       
        $ids = [];
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $ids[] = htmlspecialchars($result['lblog_ID'], ENT_NOQUOTES, 'UTF-8');
        }
        //print_r($ids);
        
        if (!empty($ids)){
        $list = [];
        $req = $db->prepare("SELECT blog_posts.blog_ID, blog_posts.genre_TAG, blog_posts.user_ID, blog_posts.blog_TITLE, blog_posts.blog_TXT, blog_posts.blog_IMG,blog_posts.blog_VIDEO,blog_posts.blog_STATUS,blog_posts.date_PUB,blog_posts.comm_COUNT,blog_posts.KEYWORDS,Users.user_FN, Users.user_LN, Users.user_IMG
                        FROM blog_posts
                        INNER JOIN Users ON blog_posts.user_ID=Users.user_ID WHERE blog_posts.blog_ID = " . implode("  OR blog_posts.blog_ID=  ", $ids) . "");
        $req->execute();
        foreach ($req->fetchAll() as $blog) {
            $list[] = new Blog(
                    $blog['blog_ID'], $blog['genre_TAG'], $blog['user_ID'], $blog['blog_TITLE'], $blog['blog_TXT'], $blog['blog_IMG'], $blog['blog_VIDEO'], $blog['blog_STATUS'], $blog['date_PUB'], $blog['comm_COUNT'], $blog['user_FN'], $blog['user_LN'], $blog['user_IMG'], $blog['KEYWORDS']);
        }
        return $list;
        
    }elseif(empty($ids)){
        $blog=[];
        return $blog;}


    }
}

?>
