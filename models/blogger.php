<?php

class Blogger extends User{
    public $id;
    public $img;
    public $firstname;
    public $lastname;
 
    
public function __construct($id, $img, $firstname, $lastname) {
                $this->id = $id;
                $this->img = $image;
                $this->firstname = $firstname;
                $this->lastname = $lastname;
	}    


   
}
