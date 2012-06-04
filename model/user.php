<?php

class User{
	private $username, $password, $firstName, $lastName, $email;

    public function __construct($id, $username,$password,$firstname,$lastname,$email) {
        $this->id = $id;
		$this->username = $username;
        $this->password = $password;
        $this->firstName = $firstname;
        $this->lastName = $lastname;
		$this->email = $email;
    }
	
	public static function getUsers() {   
        $db = Database::getDB();
        $query = "SELECT * FROM users
				  ORDER BY username DESC";
        $result = $db->query($query);
		$users = array();
		
		foreach ($result as $row){ 
			$user = new User($row['userID'],
							 $row['userName'],
							 $row['password'],
							 $row['firstName'],
							 $row['lastName'],
							 $row['email']);			
			$users[] = $user;
		}
		return $users;
}
	
	public function getID() {
		return $this->id;
	}
	
	public function getUserName(){
		return $this->username;
	}
	
	public function getFirstName() {
		return $this->firstName;
	}
	
	public function getLastName() {
		return $this->lastName;
	}
	
	public function getPassword() {
		return $this->password;
	}
}

?>