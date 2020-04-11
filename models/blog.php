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

    public function __construct($id, $genre, $userid, $title, $text, $img, $video, $status, $date, $commentno, $authorfirstname, $authorlastname, $authorimage) {
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
    }

    public static function find($id) {
        $db = Db::getInstance();
        //use intval to make sure $id is an integer
        $id = intval($id);

        $req = $db->prepare('SELECT blog_posts.blog_ID, blog_posts.genre_TAG, blog_posts.user_ID, blog_posts.blog_TITLE, blog_posts.blog_TXT, blog_posts.blog_IMG,blog_posts.blog_VIDEO,blog_posts.blog_STATUS,blog_posts.date_PUB,blog_posts.comm_COUNT,Users.user_FN, Users.user_LN, Users.user_IMG
                        FROM blog_posts
                        INNER JOIN Users ON blog_posts.user_ID=Users.user_ID WHERE blog_ID = :id;');
        //the query was prepared, now replace :id with the actual $id value
        $req->execute(array('id' => $id));
        $blog = $req->fetch();
        if ($blog) {
            return new Blog($blog['blog_ID'], $blog['genre_TAG'], $blog['user_ID'], $blog['blog_TITLE'], $blog['blog_TXT'], $blog['blog_IMG'], $blog['blog_VIDEO'], $blog['blog_STATUS'], $blog['date_PUB'], $blog['comm_COUNT'], $blog['user_FN'], $blog['user_LN'], $blog['user_IMG']);
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
            $req = $db->query("SELECT blog_posts.blog_ID, blog_posts.genre_TAG, blog_posts.user_ID, blog_posts.blog_TITLE, blog_posts.blog_TXT, blog_posts.blog_IMG,blog_posts.blog_VIDEO,blog_posts.blog_STATUS,blog_posts.date_PUB,blog_posts.comm_COUNT,Users.user_FN, Users.user_LN, Users.user_IMG
                        FROM blog_posts 
                        INNER JOIN Users ON blog_posts.user_ID=Users.user_ID WHERE blog_ID >0 AND genre_TAG ='Food' AND blog_posts.blog_STATUS='Published'
                        ORDER by blog_posts.date_PUB DESC;");

            foreach ($req->fetchAll() as $blog) {
                $list[] = new Blog(
                        $blog['blog_ID'], $blog['genre_TAG'], $blog['user_ID'], $blog['blog_TITLE'], $blog['blog_TXT'], $blog['blog_IMG'], $blog['blog_VIDEO'], $blog['blog_STATUS'], $blog['date_PUB'], $blog['comm_COUNT'], $blog['user_FN'], $blog['user_LN'], $blog['user_IMG']);
            }
            return $list;
        } elseif ($blogtag === "Family") {
            $req = $db->query("SELECT blog_posts.blog_ID, blog_posts.genre_TAG, blog_posts.user_ID, blog_posts.blog_TITLE, blog_posts.blog_TXT, blog_posts.blog_IMG,blog_posts.blog_VIDEO,blog_posts.blog_STATUS,blog_posts.date_PUB,blog_posts.comm_COUNT,Users.user_FN, Users.user_LN, Users.user_IMG
                        FROM blog_posts 
                        INNER JOIN Users ON blog_posts.user_ID=Users.user_ID WHERE blog_ID >0 AND genre_TAG ='Family' AND blog_posts.blog_STATUS='Published'
                        ORDER by blog_posts.date_PUB DESC;");

            foreach ($req->fetchAll() as $blog) {
                $list[] = new Blog(
                        $blog['blog_ID'], $blog['genre_TAG'], $blog['user_ID'], $blog['blog_TITLE'], $blog['blog_TXT'], $blog['blog_IMG'], $blog['blog_VIDEO'], $blog['blog_STATUS'], $blog['date_PUB'], $blog['comm_COUNT'], $blog['user_FN'], $blog['user_LN'], $blog['user_IMG']);
            }
            return $list;
        } elseif ($blogtag === "Fitness") {
            $req = $db->query("SELECT blog_posts.blog_ID, blog_posts.genre_TAG, blog_posts.user_ID, blog_posts.blog_TITLE, blog_posts.blog_TXT, blog_posts.blog_IMG,blog_posts.blog_VIDEO,blog_posts.blog_STATUS,blog_posts.date_PUB,blog_posts.comm_COUNT,Users.user_FN, Users.user_LN, Users.user_IMG
                        FROM blog_posts 
                        INNER JOIN Users ON blog_posts.user_ID=Users.user_ID WHERE blog_ID >0 AND genre_TAG ='Fitness' AND blog_posts.blog_STATUS='Published'
                        ORDER by blog_posts.date_PUB DESC;");

            foreach ($req->fetchAll() as $blog) {
                $list[] = new Blog(
                        $blog['blog_ID'], $blog['genre_TAG'], $blog['user_ID'], $blog['blog_TITLE'], $blog['blog_TXT'], $blog['blog_IMG'], $blog['blog_VIDEO'], $blog['blog_STATUS'], $blog['date_PUB'], $blog['comm_COUNT'], $blog['user_FN'], $blog['user_LN'], $blog['user_IMG']);
            }
            return $list;
        } elseif ($blogtag === "Craft") {
            $req = $db->query("SELECT blog_posts.blog_ID, blog_posts.genre_TAG, blog_posts.user_ID, blog_posts.blog_TITLE, blog_posts.blog_TXT, blog_posts.blog_IMG,blog_posts.blog_VIDEO,blog_posts.blog_STATUS,blog_posts.date_PUB,blog_posts.comm_COUNT,Users.user_FN, Users.user_LN, Users.user_IMG
                        FROM blog_posts 
                        INNER JOIN Users ON blog_posts.user_ID=Users.user_ID WHERE blog_ID >0 AND genre_TAG ='Craft' AND blog_posts.blog_STATUS='Published'
                        ORDER by blog_posts.date_PUB DESC;");

            foreach ($req->fetchAll() as $blog) {
                $list[] = new Blog(
                        $blog['blog_ID'], $blog['genre_TAG'], $blog['user_ID'], $blog['blog_TITLE'], $blog['blog_TXT'], $blog['blog_IMG'], $blog['blog_VIDEO'], $blog['blog_STATUS'], $blog['date_PUB'], $blog['comm_COUNT'], $blog['user_FN'], $blog['user_LN'], $blog['user_IMG']);
            }
            return $list;
        }
    }

    public static function allHome() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query(
                "(
SELECT blog_posts.blog_ID, blog_posts.genre_TAG, blog_posts.user_ID, blog_posts.blog_TITLE, blog_posts.blog_TXT, blog_posts.blog_IMG,blog_posts.blog_VIDEO,blog_posts.blog_STATUS,blog_posts.date_PUB,blog_posts.comm_COUNT,Users.user_FN, Users.user_LN, Users.user_IMG
FROM blog_posts 
INNER JOIN Users ON blog_posts.user_ID=Users.user_ID 
WHERE blog_ID >0  AND  genre_TAG = 'Food' AND blog_STATUS='Published'
ORDER by blog_posts.date_PUB DESC
LIMIT 3
)
UNION
(
SELECT blog_posts.blog_ID, blog_posts.genre_TAG, blog_posts.user_ID, blog_posts.blog_TITLE, blog_posts.blog_TXT, blog_posts.blog_IMG,blog_posts.blog_VIDEO,blog_posts.blog_STATUS,blog_posts.date_PUB,blog_posts.comm_COUNT,Users.user_FN, Users.user_LN, Users.user_IMG
FROM blog_posts 
INNER JOIN Users ON blog_posts.user_ID=Users.user_ID 
WHERE blog_ID >0  AND  genre_TAG = 'Craft' AND blog_STATUS='Published'
ORDER by blog_posts.date_PUB DESC
LIMIT 3
)
UNION
(
SELECT blog_posts.blog_ID, blog_posts.genre_TAG, blog_posts.user_ID, blog_posts.blog_TITLE, blog_posts.blog_TXT, blog_posts.blog_IMG,blog_posts.blog_VIDEO,blog_posts.blog_STATUS,blog_posts.date_PUB,blog_posts.comm_COUNT,Users.user_FN, Users.user_LN, Users.user_IMG
FROM blog_posts 
INNER JOIN Users ON blog_posts.user_ID=Users.user_ID 
WHERE blog_ID >0  AND  genre_TAG = 'Family' AND blog_STATUS='Published'
ORDER by blog_posts.date_PUB DESC
LIMIT 3
)
UNION
(
 SELECT blog_posts.blog_ID, blog_posts.genre_TAG, blog_posts.user_ID, blog_posts.blog_TITLE, blog_posts.blog_TXT, blog_posts.blog_IMG,blog_posts.blog_VIDEO,blog_posts.blog_STATUS,blog_posts.date_PUB,blog_posts.comm_COUNT,Users.user_FN, Users.user_LN, Users.user_IMG
FROM blog_posts 
INNER JOIN Users ON blog_posts.user_ID=Users.user_ID 
WHERE blog_ID >0  AND  genre_TAG = 'Fitness' AND blog_STATUS='Published'
ORDER by blog_posts.date_PUB DESC
LIMIT 3
);"
        );
        foreach ($req->fetchAll() as $blog) {
            $list[] = new Blog(
                    $blog['blog_ID'], $blog['genre_TAG'], $blog['user_ID'], $blog['blog_TITLE'], $blog['blog_TXT'], $blog['blog_IMG'], $blog['blog_VIDEO'], $blog['blog_STATUS'], $blog['date_PUB'], $blog['comm_COUNT'], $blog['user_FN'], $blog['user_LN'], $blog['user_IMG']);
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
        $req = $db->prepare("SELECT blog_posts.blog_ID, blog_posts.genre_TAG, blog_posts.user_ID, blog_posts.blog_TITLE, blog_posts.blog_TXT, blog_posts.blog_IMG,blog_posts.blog_VIDEO,blog_posts.blog_STATUS,blog_posts.date_PUB,blog_posts.comm_COUNT,Users.user_FN, Users.user_LN, Users.user_IMG
                        FROM blog_posts
                        INNER JOIN Users ON blog_posts.user_ID=Users.user_ID WHERE blog_posts.user_ID = '" . $userid . "';");
        $req->execute();
        foreach ($req->fetchAll() as $blog) {
            $list[] = new Blog(
                    $blog['blog_ID'], $blog['genre_TAG'], $blog['user_ID'], $blog['blog_TITLE'], $blog['blog_TXT'], $blog['blog_IMG'], $blog['blog_VIDEO'], $blog['blog_STATUS'], $blog['date_PUB'], $blog['comm_COUNT'], $blog['user_FN'], $blog['user_LN'], $blog['user_IMG']);
        }
        return $list;
    }

}

?>
