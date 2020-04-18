<?php

class userController {

    function login() {
        require_once('views/users/login.php');
//        if (empty($_POST)){
//        return call('pages','error');}
//     try{
        if (!empty($_POST)) {
            echo
            $usn = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
            $psw = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
            $login = new User($usn, $psw);
            $login->loginUser(); 
        }
    }
//    catch (Exception $ex){
//   return call('pages','error');
//    }


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

    
    function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (empty($_SESSION)) {
                return call('pages', 'error');
            }
            $usn = $_SESSION['username'];
            $blogger = User::getUser($usn);
            require_once('views/users/update.php');
        } else {
            User::update($_SESSION['userid']);
            header("Location: index.php?controller=user&action=blogger");
        }
    }

    function admin() {
        require_once('controllers/comments_controller.php');
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

    function bloggerList() {
        require_once('models/members.php');
        $blogger = User::getallBloggers();
        return $blogger;
    }

    function subscriberList() {
        require_once('models/members.php');
        $subscriber = User::getallSubscribers();
        return $subscriber;
    }

//    function registertwo() {
//        require_once('views/users/register.php');
//        require_once('models/register.php');
//        include_once('User_validation.php');
//        if (isset($_POST['submit'])) {
//            require_once('User_validation.php');
//            if (isset($_POST['submit'])) {
//                $validation = new User_validation($_POST);
//                $errors = $validation->validateForm();
//                return ($errors);
//            }
//            if (!empty($errors)) {
//                echo "There was a problem submitting your form. See below for help.";
//            } else if (isset($_POST['submit']) && empty($errors)) {
//                $blogger1 = new Register(
//                        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS), $password = password_hash('password', PASSWORD_BCRYPT), $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS), $lastname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_SPECIAL_CHARS), $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS), $usertype = $_POST['usertype'], $image = $_FILES['image']);
//            }
//            Register::registerBlogger($blogger1);
//        }
//    }

    function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require_once('views/users/register.php');
        } else {
            User::createUser();
        }
    }

    function verifyRegistration($pwd1, $pwd2) {
        if ($pwd1 == $pwd2) {
            $errors = '';
            return $errors;
        } else {
            $errors = "Passwords do not match";
            return $errors;
        }
    }

}
