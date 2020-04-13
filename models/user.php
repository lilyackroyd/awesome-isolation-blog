<?php



class User{
 protected $email;
 protected $username;
 protected $password ;
 protected $usertype;
 
 function getEmail() {
     return $this->email;
 }

 function getUsername() {
     return $this->username;
 }

 function getPassword() {
     return $this->password;
 }

 function setEmail($email) {
     $this->email = $email;
 }

 function setUsername($username) {
     $this->username = $username;
 }

 function setPassword($password) {
     $this->password = $password;
 }

 function getUsertype() {
     return $this->usertype;
 }

 function setUsertype($usertype) {
     $this->usertype = $usertype;
 }
 
 public function __construct($username, $password) {
		$this->username = $username;
                $this->password = $password;
	}
 
 
 
 public function getUser($usn) {
        $db = Db::getInstance();
        $sql = "SELECT * FROM Users WHERE user_UN= :username";
        $req = $db->prepare($sql);
        $req->execute(['username' => $usn]);
        $result = $req->fetch();
        return $result;
        
    }
    
    public function loginUser() {
        $usn=$this->username;
        $user = User::getUser($usn);
        $pwd=$this->password;
        if ($pwd===$user['user_PWD']){
          $pwd=TRUE;  
        }
       // for when we have hashed passwords - $isVerified=password_verify($this->password, $user['user_PWD']);
        if ($pwd===TRUE && $user['user_TYPE']==="Admin") {
            $_SESSION['username'] = $user['user_UN'];
            $_SESSION['userid']= $user['user_ID'];
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['usertype'] = $user['user_TYPE'];
            echo "<script> location.href='/awesome/index.php?controller=user&action=admin';</script>";
           
        }
       else if ($pwd===TRUE && $user['user_TYPE']==="Blogger") {
            $_SESSION['username'] = $user['user_UN'];
            $_SESSION['userid']= $user['user_ID'];
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['usertype'] = $user['user_TYPE'];
           echo "<script> location.href='/awesome/index.php?controller=user&action=blogger';</script>";
       }   
        else if ($pwd===TRUE && $user['user_TYPE']==="Subscriber") {
            $_SESSION['username'] =  $user['user_UN'];
            $_SESSION['userid']= $user['user_ID'];
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['usertype'] = $user['user_TYPE'];
          echo "<script> location.href='/awesome/index.php?controller=blog&action=home';</script>";
      
        } else {
            die("Incorrect details");
        }
        
    }
    
    public function getallBloggers(){
        
        $db = Db::getInstance();
        $sql = "SELECT * FROM Users WHERE user_TYPE='Blogger'";
        $req = $db->query($sql);
        //$result = $req->fetchall();
        //return $result;
        foreach ($req->fetchAll() as $blogger) {
            $list[] = new Members(
                    $blogger['user_ID'], $blogger['user_IMG'], $blogger['user_FN'], $blogger['user_LN']);
        }
        return $list;
    }
   
 }
    
    

 
 
 
 
 
 
 


