<?php

class Register extends User{
    public $img;
    public $firstname;
    public $lastname;
 
    
public function __construct($id, $img, $firstname, $lastname) {
    parent::__construct($username, $password, $email, $usertype);
                $this->username = $username;
                $this->password = $password;
                $this->email = $email;
                $this->usertype = $usertype;
                $this->img = $image;
                $this->firstname = $firstname;
                $this->lastname = $lastname;
	}    


public function registerBlogger() {
    //require_once 'controllers/user_controller.php';
    $db = Db::getInstance();
    $new_mem = $db->prepare("INSERT INTO Users ( user_UN, user_PWD, user_FN, user_LN, user_EMAIL, user_IMG, user_TYPE)
              VALUES (  :username, :password, :userfn, :userln, :email, :img, :type, )");

        $new_mem->execute([
            'username' => $username,
            'password' => $password,
            'userfn' =>  $firstname,
            'userln' => $lastname,
            'email' => $email,
            'img' => $image,
            'type' => $usertype,
                ]);

        $loginMsg = '<div class="alert alert-success alert-dismissible fade show">
                <strong> <i class="icon fa fa-check"></i> You have successfully registered! Please <a href="?controller=user&action=login" >login.</a></strong>
             <button type="button" class="close" data-dismiss="alert">&times;</button></div>';
        return $loginMsg;
    }
    
}
