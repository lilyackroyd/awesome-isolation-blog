<?php

class BlogController{


    public function read() {
      // we expect a url of form ?controller=posts&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      if (!isset($_GET['id']))
       return call('pages', 'error');
      try{
      // we use the given id to get the correct post
      $blog = Blog::find($_GET['id']);
      require_once('views/blogs/read.php');
      }
 catch (Exception $ex){
     return call('pages','error');
 }
    }


 
     public function readAll() {
      // we expect a url of form ?controller=posts&action=show&tag=x
      // without a tag we just redirect to the error page as we need it to find the right blogs in the database
              if (!isset($_GET['tag']))
      return call('pages', 'error');
     try{
      // we use the given tags to get the blogs by genre
    $blogs = Blog::all($_GET['tag']);
     require_once('views/blogs/readAll.php');
    }
 catch (Exception $ex){
   return call('pages','error');
 }

} 


    
    
    
    
}


?>