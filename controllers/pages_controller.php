<?php
include '/Applications/XAMPP/xamppfiles/htdocs/awesome/models/user.php';

class PagesController {
   
    public function home() {
//      //example data to use in the home page
//      $first_name = 'Lisa';
//      $last_name  = 'Simpson';
      require_once('views/pages/home.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }
    
    public function logout() {
      require_once('views/pages/logout.php');
    }

    
    
    
    
}
