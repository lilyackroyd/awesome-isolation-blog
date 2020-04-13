<?php

class BlogController {

    public function read() {
        // we expect a url of form ?controller=posts&action=show&id=x
        // without an id we just redirect to the error page as we need the post id to find it in the database
        if (!isset($_GET['id']))
            return call('pages', 'error');
        try {
            // we use the given id to get the correct post
            $blog = Blog::find($_GET['id']);
            require_once('views/blogs/read.php');
        } catch (Exception $ex) {
            return call('pages', 'error');
        }
    }

    public function readAll() {
        // we expect a url of form ?controller=posts&action=show&tag=x
        // without a tag we just redirect to the error page as we need it to find the right blogs in the database
        if (!isset($_GET['tag']))
            return call('pages', 'error');
        try {
            // we use the given tags to get the blogs by genre
            $blogs = Blog::all($_GET['tag']);
            require_once('views/blogs/readAll.php');
        } catch (Exception $ex) {
            return call('pages', 'error');
        }
    }

    public function home() {
        try {
            $blogs = Blog::allHome();
            require_once('views/blogs/home.php');
        } catch (Exception $ex) {
            return call('pages', 'error');
        }
    }

    public function search() {
        if (!isset($_POST['search']))
            return call('pages', 'error');
        try {
            $searches = filter_var($_POST['search'], FILTER_SANITIZE_STRING);
            $results = Blog::search($searches);
            require_once('views/blogs/search.php');
            return json_encode($results);
        } catch (Exception $ex) {
            return call('pages', 'error');
        }
    }

    public function myblogs() {
        $id = $_SESSION['userid'];
        if (empty($id)) {
            return call('pages', 'error');
        }
        try {
            $blogs = Blog::getUserBlogs($id);
            require_once('views/users/myblogs.php');
            return $blogs;
        } catch (Exception $ex) {
            return call('pages', 'error');
        }
    }
    
    
        public function delete() {
        Blog::deleteBlog($_GET['id']);
        require_once('Views/user/myblogs.php');
        }
        
        
        public function update() {
      if($_SERVER['REQUEST_METHOD'] == 'GET'){
          if (!isset($_GET['id'])) {
          return call('pages', 'error');}
     
        $blog = Blog::find($_GET['id']);
        require_once('views/blogs/update.php');
        }
        else
          { 
            $id = $_GET['id'];
            Blog::update($id);       
            $blog = Blog::find($id);
            header("Location: index.php?controller=blog&action=read&id=$id"); 
      }
    }
     


  
  
  
  
  
    public function create() {
        //URL is ?controller=products&action=create (directed from my account page)
        //if the request is a GET request then there is no blog to add yet so direct to create new blog post
        //otherwise if its a POST then the form has been submitted so the blog post is added to the database
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require_once('Views/blogs/create.php');
        } else {
            $inserted_id=blog::add();
            //$blogs = Blog::all(); //$products is used within the view
            //require_once('views/blogs/readAll.php');
            header("Location: index.php?controller=blog&action=read&id=$inserted_id"); 
        }
    }

}

?>