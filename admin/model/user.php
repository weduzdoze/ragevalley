<?php

class User{
	private $username, $password, $firstName, $lastName, $email;

    //44.
    //define the __construct function for creating a new product object
	//accepts category,code,name,and price as parameters
    public function __construct($username,$password,$firstname,$lastname,$email) {
        $this->username = $username;
        $this->password = $password;
        $this->firstName = $firstname;
        $this->lastName = $lastname;
		$this->email = $email;
    }
	
	public function getFirstName() {
		return $this->firstName;
	}
}

?>