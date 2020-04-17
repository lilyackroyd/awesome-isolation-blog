<?php

include_once $_SERVER ['DOCUMENT_ROOT'] .DIRECTORY_SEPARATOR . 'awesome' . DIRECTORY_SEPARATOR.'connection.php';




        function likeHistory($userid, $blogid) {
            
        $db = Db::getInstance();
        
        $req = $db->prepare("SELECT * FROM Likes WHERE luser_ID=:userid AND lblog_ID=:blogid");
        $req->execute(array('userid' => $userid, 'blogid' => $blogid));
        $likes = $req->fetchAll();
        $numlikes = count($likes);
        if($numlikes >0){
            $liked=TRUE;
        return $liked;
        }
        elseif($numlikes==0){
        $liked=FALSE;
        return $liked;
        
    }
    
    
    
        }
        
    