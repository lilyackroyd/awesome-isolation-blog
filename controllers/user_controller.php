<?php

/**
 * @author Claire Winterbottom
 */
class userController {

  
    function login(){
         require_once('views/users/login.php');      
//        if (empty($_POST)){
//        return call('pages','error');
//     try{
    if (!empty($_POST)){
        $usn= filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $psw= filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $login=new User($usn, $psw);
        $login->loginUser();  
      }  
//    }
//    catch (Exception $ex){
//   return call('pages','error');

//    }
    }
    
   function blogger(){ 
       
       require_once('views/users/blogger.php');  
//       if (empty($_SESSION)){
//     return call('pages','error');
     
//    try{
     $usn = $_SESSION['username'];
  

     $blogger=User::getUser($usn); 

     return $blogger;

//    } catch (Exception $ex) {
//   return call('pages','error');
//   }
       
   }
   
     function logout(){ 
       
         
       session_unset();
       session_destroy();
       header('Location: index.php');
       
   }
   
   
   
   
   
   
}

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    


    

    
