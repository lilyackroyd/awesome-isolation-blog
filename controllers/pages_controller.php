<?php
//include 'models/user.php';

class PagesController {
   

    public function error() {
      require_once('views/pages/error.php');
    }
    
    public function logout() {
      require_once('views/pages/logout.php');
    }

        public function about() {
      require_once('views/pages/about.php');
    }
    
        public function contact() {
      require_once('views/pages/contact.php');
    }
    
          public function faq() {
      require_once('views/pages/faq.php');
    }
    
        public function test() {
      require_once('views/pages/test.php');
    }
}
