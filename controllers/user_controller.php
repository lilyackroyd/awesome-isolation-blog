<?php

/**
 * @author Claire Winterbottom
 */
class userController {

    function login() {
        require_once('views/users/login.php');
//        if (empty($_POST)){
//        return call('pages','error');
//     try{
        if (!empty($_POST)) {
            $usn = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
            $psw = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
            $login = new User($usn, $psw);
            $login->loginUser();
        }
//    }
//    catch (Exception $ex){
//   return call('pages','error');
//    }
    }

    function blogger() {
        require_once('views/users/blogger.php');
//       if (empty($_SESSION)){
//     return call('pages','error');     
//    try{
        $usn = $_SESSION['username'];
        $blogger = User::getUser($usn);
        return $blogger;
//    } catch (Exception $ex) {
//   return call('pages','error');
//   }     
    }

  

    function admin() {
        require_once('views/users/admin.php');
//       if (empty($_SESSION)){
//     return call('pages','error');     
//    try{
        $usn = $_SESSION['username'];
        $admin = User::getUser($usn);
        return $admin;
//    } catch (Exception $ex) {
//   return call('pages','error');
//   }     
    }

  
    
      public function myblogs() {
         $id=$_SESSION['userid'];
        if (empty($id)){
        return call('pages', 'error');}
        try {
        $blogs = User::getUserBlogs($id);
             require_once('views/users/myblogs.php');
             return $blogs;
        } catch (Exception $ex) {
            return call('pages', 'error');
        }
      }
      
    
    
    
    
    
    
    
    
    
    
    
    
    function register() {
        require_once('views/users/register.php');
    }

    function adminSelect() {
        echo "You're an admin";
    }

    function bloggerSelect() {
        echo "You're a blogger";
    }

    function subscriberSelect() {
        echo "You're a subscriber";
    }

    //if (empty($_POST)){
//        return call('pages','error');s
    //  if ((!empty($_POST)) && (isset($_POST['submit']))) {
    //      $member1 = new Member (
    //           $userName = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS),
    //           $password = password_hash($password, PASSWORD_BCRYPT),
    //           $firstName = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS),
    //           $lastName = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_SPECIAL_CHARS),
    //           $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS),
    //           $userType = filter_input(INPUT_POST, 'usertype', FILTER_SANITIZE_SPECIAL_CHARS) );
}
