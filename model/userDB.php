<?php 
class userDB {   

   public static function login($username,$password) {   
        $db = Database::getDB();
        $query = "SELECT * FROM users
                  WHERE username = '$username'
				  AND password = '$password'";
        $result = $db->query($query);
        $row = $result->fetch();
		if ($row){	    
			$user = new User($row['userID'],
							 $row['userName'],
                             $row['password'],
						     $row['firstName'],
						     $row['lastName'],
						     $row['email']);	
		$_SESSION['isLoggedIn'] = "1";
		$_SESSION['userID'] = $row['userID'];
		$_SESSION['username'] = $row['userName'];
		$_SESSION['firstName'] = $row['firstName'];
		return $user;
      }
	  else{
		throw new Exception("No user found.");
	  }
	} 
	
	public static function addUser($username,$password,$firstname,$lastname,$email){
		$db = Database::getDB();
        $query = "INSERT INTO users (username,password,firstName,lastName,email)
				  VALUES ('$username','$password','$firstname','$lastname','$email')";
        $user = $db->exec($query);
		
		if (!$user){
			throw new Exception("Error adding user.");
		}
		else {
			return true;
		}	
	}
}
?>	