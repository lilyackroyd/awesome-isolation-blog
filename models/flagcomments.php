<?php

class Flaggedc extends comments{
    public $flag;
    public $commid;
    public $text;
    public $status;
    public $userid;
    public $blogid; 
    public $username; 
    
public function __construct($flag, $commid, $text, $status, $userid, $blogid,$username) {
                $this->flag = $flag;
                $this->commid = $commid;
                $this->text = $text;
                $this->status = $status;
                $this->userid = $userid;
                $this->blogid = $blogid;
                 $this->username = $username;
	}    


 public function listflaggedc() {
        $db = Db::getInstance();
        $sql = "SELECT * FROM tadb.Comments LEFT JOIN Users ON Comments.user_ID=Users.user_ID WHERE flag='1'";
        $req = $db->query($sql);
        //$result = $req->fetchall();
        //return $result;
        foreach ($req->fetchAll() as $flagged) {
            $list[] = new Flaggedc(
                    $flagged['flag'], $flagged['comm_ID'], $flagged['comm_TXT'], $flagged['comm_STATUS'],$flagged['user_ID'],$flagged['blog_ID'],$flagged['user_UN']);
        }
        return $list;
    }
    public function removeflaggedc($id) {
        $db = Db::getInstance();

         
        $req = $db->prepare("update Comments set comm_TXT='This comment has been removed' WHERE comm_ID = :commid");
      $req->execute(array('commid' => $id));
         
        
    }  
}