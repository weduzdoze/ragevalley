<?php 
class userDB {   
	//method to validate a user logging in
   public static function login($username,$password) {   
        $db = Database::getDB();
        //query the users table for a row with a username AND password
		//the query will only return a row if a row exists with both the username and password
		$query = "SELECT * FROM users
                  WHERE username = '$username'
				  AND password = '$password'";
        //execute the query
		$result = $db->query($query);
		$row = $result->fetch();
		//if $row = true (meaning a row was found)
		if ($row){	    
			//create a new User object for the user
			$user = new User($row['userID'],
							 $row['userName'],
                             $row['password'],
						     $row['firstName'],
						     $row['lastName'],
						     $row['email']);	
		//create a session variable isLoggedIn and set it to 1
		$_SESSION['isLoggedIn'] = "1";
		//create a session variable userID and set it equal to the userID of the current user
		$_SESSION['userID'] = $row['userID'];
		//create a session variable username and set it equal to the username of the current user
		$_SESSION['username'] = $row['userName'];
		//create a session variable firstname and set it equal to the firstname of the current user
		$_SESSION['firstName'] = $row['firstName'];
		//return the new user object
		return $user;
      }
	  //if now row was found (meaning the users credentials were not matched in the database
	  else{
		//throw an exception
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