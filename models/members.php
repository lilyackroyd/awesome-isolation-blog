<?php

class Members extends User{
    public $id;
    public $img;
    public $firstname;
    public $lastname;
    public $username;
    public $email;
    public $totallikes;
 
    
public function __construct($id, $img, $firstname, $lastname,$username,$email,$totallikes) {
                $this->id = $id;
                $this->img = $img;
                $this->firstname = $firstname;
                $this->lastname = $lastname;
                $this->username = $username;
                $this->email = $email;
                $this->totallikes = $totallikes;
	}    


   
}
