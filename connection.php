<?php


class DB {
    
    private static $instance = NULL;

    //Singleton Design Pattern
    public static function getInstance() {
      if (!isset(self::$instance)) {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        self::$instance = new PDO('mysql:host=gitt-blog.ctvgumwjz1vf.eu-west-2.rds.amazonaws.com;dbname=tadb', 'awesomeuser', 'WShJFmG1HUuL2kyTQcIG', $pdo_options);
      }
      return self::$instance;
    }
}


