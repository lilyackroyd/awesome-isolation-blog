<?php


function getLoginText(){
if (!empty($_SESSION)) {
    $btntext=" Log out ";
    return $btntext;
;}elseif (empty($_SESSION)){
    $btntext=" Log in ";
    return $btntext;
}else {
        $btntext=" Log in ";
    return $btntext;
}
}

function getLoginAction(){
if (!empty($_SESSION)) {
   $action='?controller=pages&action=logout';   
      return $action;
}else {
$action='?controller=user&action=login';
    return $action;
}
}


function getAccountPage(){
   if (empty($_SESSION)){
       $action='?controller=user&action=login';
    return $action;
   }
elseif (!empty($_SESSION) && $_SESSION["usertype"]==='Admin') {
     $action='?controller=user&action=admin';
    return $action;
}elseif (!empty($_SESSION) && $_SESSION["usertype"]==='Blogger'){
      $action='?controller=user&action=blogger';
    return $action;
}
}


function myLikesAction(){
   if (empty($_SESSION)){
       $likesaction='?controller=user&action=login';
    return $likesaction;
   }
elseif (!empty($_SESSION)) {
     $likesaction='?controller=blog&action=mylikes';
      return $likesaction;
}

}