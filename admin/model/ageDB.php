<?php

class AgeDB {
	
	static function getAgeByID($id){
		$db = Database::getDB();
		$query = "SELECT * FROM ages WHERE ageID = $id";		  
		$age = $db->query($query);
		$age = $age->fetch();
		
		$ageByID = new Age($age['ageID'],$age['name']);
		
		return $ageByID;
	}
	
	public static function addAge($age){
	$db = Database::getDB();
	$query = "INSERT INTO ages (name)
			  VALUES ('$age')";
	$age = $db->exec($query);
	return $age;
	}
}

?>